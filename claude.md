# CLAUDE.md

# Dynamic WordPress Theme Development Guide

## PROJECT OVERVIEW

This project is a custom WordPress theme originally converted from a static HTML/CSS/Bootstrap website.

The goal of this project is to progressively refactor the theme into a:

- Fully dynamic
- Modular
- Scalable
- Maintainable
- Reusable
- Production-ready WordPress theme

This is NOT a simple static WordPress wrapper.

The project MUST evolve into a professional CMS-ready architecture using:

- WordPress Theme Hierarchy
- Advanced Custom Fields (ACF)
- Custom Post Types (CPT)
- Template Parts
- Dynamic Menus
- Dynamic Forms
- Reusable Components
- SEO Best Practices
- Performance Optimization
- WordPress Coding Standards

Claude is expected to act as:

- Senior WordPress Engineer
- Technical Architect
- Refactoring Assistant
- Clean Code Reviewer
- CMS Structure Advisor

---

# CORE OBJECTIVES

Claude MUST help transform the project into:

- Fully dynamic
- Admin editable
- Reusable
- Modular
- Scalable
- Client-friendly
- Easy to maintain
- SEO friendly
- Performance optimized
- Plugin compatible
- Production ready

---

# REQUIRED PROJECT ANALYSIS

Before modifying ANYTHING, Claude MUST:

1. Inspect the ENTIRE project structure
2. Analyze all relevant files
3. Understand dependencies between files
4. Identify reusable patterns
5. Detect hardcoded sections
6. Understand current frontend behavior
7. Preserve existing UI/UX unless instructed otherwise
8. Understand Bootstrap implementation
9. Understand WordPress template hierarchy usage
10. Understand plugin dependencies if they exist

Claude MUST NEVER make assumptions without inspection.

---

# REQUIRED ACCESS & FILE INSPECTION RULES

Claude MUST recursively inspect and understand all important project directories before making edits.

Important directories include:

```bash
/wp-content/themes/{theme-name}/

---

# THEME STRUCTURE & ARCHITECTURE

# File Directory Blueprint
```text
theme-name/
├── assets/
│   ├── css/
│   │   ├── global.css        # Base styles, resets, typography
│   │   ├── utilities.css     # Utility classes (Bootstrap overrides)
│   │   ├── components.css    # Reusable components (Buttons, Cards, Modals)
│   │   ├── pages.css         # Page-specific layout style patches
│   │   └── responsive.css    # Dedicated media queries if not inline
│   ├── js/
│   │   ├── main.js           # Core theme logic
│   │   └── modules/          # Split JS logic (e.g., ajax-form.js, slider.php)
│   ├── img/
│   └── fonts/
├── inc/
│   ├── enqueue.php          # Style and script registrations
│   ├── cpt.php              # Custom Post Types & Taxonomies definitions
│   ├── customizer.php       # Core site-identity / global options configuration
│   ├── helpers.php           # Global helper functions (formatting, cleanups)
│   ├── setup.php            # Theme support, nav menus, image sizes
│   ├── acf-fields.php       # PHP-fallback fields declaration (if active)
│   ├── security.php         # Hardening, nonce validation, login protection
│   └── optimization.php     # Query speedups, asset minification, lazyload
├── acf-json/                # Crucial: Automates Git tracking for ACF fields
├── template-parts/
│   ├── header/              # Navbars, Top bars
│   ├── footer/              # Footer columns, copyrights
│   ├── components/          # Cards, pagination, breadcrumbs
│   └── sections/            # Hero, Services, Pricing, Testimonials (for front-page)
├── templates/               # Custom Page Templates (e.g., page-about.php)
├── front-page.php           # Landing / Homepage layout container
├── page.php                 # Default single page layout
├── single.php               # Default single blog post layout
├── single-{cpt}.php         # Dedicated CPT single layouts
├── archive.php              # Fallback archive layout
├── archive-{cpt}.php        # Dedicated CPT archive layouts
├── search.php               # Search results template
├── 404.php                  # Not found fallback page
├── functions.php            # Primary theme engine entry-point
├── header.php               # HTML Head and initiation
└── footer.php               # Scripts hook and HTML closing tags