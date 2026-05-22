<?php

/**
 * Custom nav walker — maps WordPress menu classes to VaultEdge markup.
 *
 * Preserves:
 *   has-drop    → triggers CSS hover dropdown (.ve-nav .has-drop:hover .ve-dropdown)
 *   ve-dropdown → submenu <ul> class
 *   active      → current page link styling (a.active in CSS)
 */
class VaultEdge_Nav_Walker extends Walker_Nav_Menu {

    public function start_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '<ul class="ve-dropdown">';
    }

    public function end_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '</ul>';
    }

    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $classes      = empty( $item->classes ) ? [] : (array) $item->classes;
        $has_children = in_array( 'menu-item-has-children', $classes, true );
        $is_current   = in_array( 'current-menu-item', $classes, true )
                     || in_array( 'current-menu-ancestor', $classes, true )
                     || in_array( 'current-menu-parent', $classes, true );

        // Build <li> classes
        $li_classes = [];
        if ( $has_children ) {
            $li_classes[] = 'has-drop';
        }
        if ( $is_current ) {
            $li_classes[] = 'current-menu-item';
        }

        $li_attr = $li_classes ? ' class="' . implode( ' ', $li_classes ) . '"' : '';
        $output .= '<li' . $li_attr . '>';

        // Build <a> attributes
        $url     = ! empty( $item->url ) ? esc_url( $item->url ) : '#';
        $target  = ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
        $rel     = ! empty( $item->xfn )    ? ' rel="' . esc_attr( $item->xfn ) . '"'       : '';
        $a_class = $is_current ? ' class="active"' : '';

        $title = apply_filters( 'the_title', $item->title, $item->ID );
        // Dropdown caret only on top-level parent items
        $caret = ( $has_children && 0 === $depth ) ? ' <i class="fa fa-angle-down"></i>' : '';

        $output .= '<a href="' . $url . '"' . $target . $rel . $a_class . '>'
                 . $title . $caret
                 . '</a>';
    }

    public function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= '</li>';
    }
}


/**
 * Retrieves a field value — uses ACF if available, falls back to post meta.
 *
 * @param string     $name     Field name.
 * @param int|null   $post_id  Post ID (null = current post).
 * @param mixed      $default  Value returned when field is empty.
 */
function ve_get_field( $name, $post_id = null, $default = '' ) {
    $id = $post_id ?: get_the_ID();

    if ( function_exists( 'get_field' ) ) {
        $value = get_field( $name, $id );
        return ( $value !== false && $value !== null && $value !== '' ) ? $value : $default;
    }

    $value = get_post_meta( $id, $name, true );
    return $value !== '' ? $value : $default;
}


/**
 * Returns estimated read time string for a post (e.g. "4 min read").
 */
function vaultedge_read_time( $post_id = null ) {
    $content    = get_post_field( 'post_content', $post_id ?: get_the_ID() );
    $word_count = str_word_count( strip_tags( $content ) );
    $minutes    = max( 1, (int) ceil( $word_count / 200 ) );
    return $minutes . ' min read';
}


/**
 * Outputs the site logo — custom logo image if set, otherwise text fallback.
 */
function vaultedge_logo() {
    if ( has_custom_logo() ) {
        the_custom_logo();
        return;
    }
    echo '<span class="ve-logo-icon">V</span>';
    echo '<span class="ve-logo-text">Vault<strong>Edge</strong></span>';
}
