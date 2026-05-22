# VaultEdge WordPress Theme

VaultEdge is a custom WordPress theme developed by converting a static HTML template into a fully functional WordPress theme. This project demonstrates how to integrate frontend assets (HTML, CSS, JS) into WordPress structure using PHP templating and WordPress best practices.

---

## 🚀 Features

* Custom WordPress theme structure
* Dynamic asset loading using `functions.php`
* Reusable components (`header.php`, `footer.php`)
* Responsive layout (Bootstrap-based)
* Animated UI (WOW.js, CounterUp, etc.)
* Multi-page support (Home, About, Services, Contact)
* Clean and modern financial company profile design

---

## 🛠️ Tech Stack

* WordPress (PHP)
* HTML5
* CSS3 / SCSS
* JavaScript (jQuery)
* Bootstrap
* WOW.js & CounterUp (for animations)

---

## 📁 Project Structure

```
vaultedge-theme/
│── assets/
│   ├── css/
│   ├── fonts/
│   ├── img/
│   ├── js/
│── header.php
│── footer.php
│── functions.php
│── index.php
│── page-about.php
│── page-contact.php
│── page-post.php
│── page-single-post.php
│── page-services.php
│── style.css   <-- Theme metadata (IMPORTANT)
```

---

## ⚙️ Installation

1. Clone this repository:

   ```bash
   git clone https://github.com/your-username/vaultedge-theme.git
   ```

2. Copy the theme folder into your WordPress directory:

   ```
   wp-content/themes/
   ```

3. Go to WordPress Dashboard:

   ```
   Appearance → Themes
   ```

4. Activate **VaultEdge Theme**

---

## 🔧 Important Configuration

### 1. Permalink Settings

Make sure to set:

```
Settings → Permalinks → Post Name
```

---

### 2. Page Setup

Create pages in WordPress dashboard:

* Home
* About
* Services
* Contact

Make sure the slug matches:

```
/about
/services
/contact
```

---

### 3. Template Usage

Custom page templates:

* `page-about.php` → About Page
* `page-contact.php` → Contact Page

---

## 🎯 Key Learnings

This project covers:

* Converting static HTML into WordPress theme
* Using `get_header()` and `get_footer()`
* Proper asset management with `wp_enqueue_scripts`
* Debugging common issues:

  * CSS not loading (404)
  * Layout breaking
  * JavaScript not working
  * Counter animation issues
* Fixing WordPress routing (`site_url()` vs slug)

---

## ⚠️ Common Issues & Fixes

### ❌ CSS not applied

✔️ Fix:

* Ensure correct path using:

  ```php
  get_template_directory_uri()
  ```

---

### ❌ Layout broken

✔️ Fix:

* Check missing CSS dependencies
* Verify Bootstrap & plugin files loaded

---

### ❌ Counter not working

✔️ Fix:

* Ensure `waypoints` and `counterUp` loaded correctly
* Avoid multiple triggers

---

### ❌ Page not found (404)

✔️ Fix:

* Match slug with URL
* Check Permalink settings

---

### ❌ Infinite loading page

✔️ Fix:

* Make sure:

  ```php
  get_footer();
  ```

  is used instead of calling `get_header()` twice

---

## 📌 Notes

* `style.css` in root is used **only for theme registration**, not for main styling.
* Main styling is located in:

  ```
  /assets/css/
  ```
* SCSS files are not required unless you want to recompile styles.

---

## 👨‍💻 Author

**Danniel**

---

## 📄 License

This project is for educational and portfolio purposes.

---

## ⭐ Support

If you find this project useful, feel free to give it a ⭐ on GitHub!
