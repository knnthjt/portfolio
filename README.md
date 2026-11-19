# Kenneth James B. Tolentino — Digital Portfolio

A complete, high-performance, responsive Digital Portfolio web application built with **PHP 8**, vanilla **CSS3**, and vanilla **JavaScript** (no external frontend frameworks or heavy dependencies).

Designed specifically for **Kenneth James B. Tolentino**, 4th-Year BSIT Student at STI College Alabang and Aspiring IT Support Specialist & Systems Administrator.

---

## 🚀 Quick Start & Local Execution

The project requires zero external Composer dependencies and runs cleanly out-of-the-box on **XAMPP**, **Laragon**, or the native **PHP built-in server**.

### Option A: Using XAMPP (Apache)
1. Open the **XAMPP Control Panel**.
2. Start the **Apache** module.
3. Open your browser and navigate to:
   ```
   http://localhost/Tolentino%20Portfolio/
   ```

### Option B: Using PHP Built-In CLI Server
Open a terminal in the project directory (`c:\xampp\htdocs\Tolentino Portfolio`) and run:
```bash
php -S localhost:8000
```
*(If `php` is not in your global PATH, run `C:\xampp\php\php.exe -S localhost:8000`)*

Then browse to:
```
http://localhost:8000/
```

---

## 📁 Project Architecture & File Breakdown

```
Tolentino Portfolio/
│
├── index.php                      # Main single-page portfolio layout with dynamic PHP loops
├── contact_handler.php            # Server-side PHP form processor (sanitization, validation, JSON/POST response)
├── generate_resume_pdf.php        # Standalone PHP utility used to generate the resume PDF
├── README.md                      # Documentation & setup guide
│
├── data/
│   ├── portfolio_data.php         # Centralized PHP associative array with all profile & project data
│   └── contact_submissions.json   # Local secure audit log storing verified contact messages
│
├── includes/
│   ├── header.php                 # Reusable sticky navigation, theme switch, and mobile drawer
│   ├── footer.php                 # Reusable footer, status badge, direct links, and copyright
│   └── icons.php                  # Crisp, lightweight inline SVG icons (zero external CDN dependencies)
│
└── assets/
    ├── css/
    │   └── style.css              # Modern, minimalist dark/light mode stylesheet (CSS Grid & Flexbox)
    ├── js/
    │   └── main.js                # Theme switcher, typing effect, skill filter tabs, scroll-spy, async fetch
    └── kenneth_james_tolentino_resume.pdf # Formatted, valid PDF resume ready for recruiter download
```

---

## ✨ Features & User Experience

1. **Dark & Light Mode Toggle:**
   - Seamless high-contrast theming with CSS Custom Properties.
   - Saves selection to `localStorage` and detects OS `prefers-color-scheme`.
   - Script runs in the `<head>` prior to first paint to prevent theme flicker (FOUT).

2. **Skill Category Filter Tabs:**
   - Real-time tab filtering across **IT Support & Systems**, **Networking & Cloud**, **Programming & Databases**, and **Soft Skills**.
   - Live badge counters displaying the number of skills per category.
   - Smooth CSS transitions when toggling categories.

3. **Active Nav Link Scroll-Spy & Mobile Drawer:**
   - Dynamically highlights active navigation links as you scroll through sections.
   - Full-featured mobile hamburger menu with smooth slide-down animation and backdrop blur.

4. **Dynamic Typing Effect:**
   - Cycles through Kenneth's specialized roles in the Hero section with realistic typing, pause, and deletion intervals.

5. **Asynchronous Contact Form with Dual-Mode Support:**
   - Intercepted by JavaScript using modern `fetch()` for a smooth single-page AJAX experience.
   - Client-side validation + server-side PHP validation (length checks, email formatting, anti-spam honeypot).
   - Provides live spinner feedback and clean success/error banners.
   - Includes full traditional POST fallback if JavaScript is disabled.
   - Stores submissions securely in `data/contact_submissions.json`.

6. **Prominent "Download Resume (PDF)" Action:**
   - Download buttons located in both the Hero section and navigation.
   - Links to a valid, clean PDF resume generated directly at `assets/kenneth_james_tolentino_resume.pdf`.

---

## ✏️ How to Customize Personal Details

All personal information, links, skills, certifications, and project entries are stored in **`data/portfolio_data.php`**:

- **Update Email & Phone:** Change `'email'` and `'phone'` in `data/portfolio_data.php`.
- **Update Social Links:** Update `'github'` and `'linkedin'` URLs.
- **Add / Edit Skills:** Append new entries to the `'skills'` array under the appropriate category (`it_systems`, `networking_cloud`, `programming_db`, or `soft_skills`).
- **Add Projects:** Add new project objects to the `'projects'` array with titles, roles, badges, descriptions, and tags.

---

## 📜 Recruiter-Ready Profile Summary

- **Candidate:** Kenneth James B. Tolentino
- **Education:** 4th-Year BSIT Senior at STI College Alabang
- **Target Roles:** IT Support Specialist, Junior Systems Administrator, QA Lead
- **Key Credentials:** 
  - TESDA NC II in Computer Systems Servicing
  - Oracle Java Fundamentals Certification
- **Capstone Leadership:** QA & System Documentation Lead on Lumina Library Management System
