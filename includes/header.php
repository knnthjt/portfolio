<?php
/**
 * Header Partial
 * Kenneth James B. Tolentino - Digital Portfolio
 */
require_once __DIR__ . '/icons.php';
?>
<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title><?= htmlspecialchars($portfolio['personal']['full_name']) ?> | IT Support Specialist & Systems Administrator</title>
    <meta name="description" content="<?= htmlspecialchars($portfolio['personal']['headline']) ?>. TESDA NC II Certified in Computer Systems Servicing, Oracle Java Certified, STI College Alabang.">
    <meta name="keywords" content="Kenneth James Tolentino, Kenneth Tolentino, IT Support, Systems Administrator, TESDA NC II, Computer Systems Servicing, STI College Alabang, Portfolio">
    <meta name="author" content="<?= htmlspecialchars($portfolio['personal']['full_name']) ?>">
    <meta name="theme-color" content="#0b1120">

    <!-- Open Graph / Meta -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= htmlspecialchars($portfolio['personal']['full_name']) ?> — Digital Portfolio">
    <meta property="og:description" content="<?= htmlspecialchars($portfolio['personal']['headline']) ?>">
    <meta property="og:url" content="http://localhost/Tolentino%20Portfolio/">
    <meta property="og:site_name" content="Kenneth James Tolentino Portfolio">

    <!-- Preload / Fonts & CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Script to prevent Dark/Light Mode Flicker (FOUT) -->
    <script>
        (function() {
            try {
                const savedTheme = localStorage.getItem('portfolio_theme');
                const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
                const theme = savedTheme ? savedTheme : (prefersDark ? 'dark' : 'light');
                document.documentElement.setAttribute('data-theme', theme);
            } catch (e) {
                document.documentElement.setAttribute('data-theme', 'dark');
            }
        })();
    </script>
</head>
<body id="top">
    <!-- Accessible Skip to Content Link -->
    <a href="#main-content" class="skip-to-content">Skip to main content</a>

    <!-- Navigation Header -->
    <header class="site-header" id="site-header">
        <div class="container header-container">
            <!-- Brand / Logo -->
            <a href="#top" class="brand-logo" aria-label="Kenneth Tolentino Portfolio Home">
                <span class="logo-avatar" aria-hidden="true"><?= htmlspecialchars($portfolio['personal']['initials']) ?></span>
                <div class="logo-text">
                    <span class="logo-name"><?= htmlspecialchars($portfolio['personal']['short_name']) ?></span>
                    <span class="logo-tag">IT Support & Systems</span>
                </div>
            </a>

            <!-- Desktop Navigation Links -->
            <nav class="nav-desktop" id="nav-desktop" aria-label="Primary Navigation">
                <ul class="nav-list">
                    <li><a href="#about" class="nav-link">About</a></li>
                    <li><a href="#skills" class="nav-link">Skills</a></li>
                    <li><a href="#certifications" class="nav-link">Certifications</a></li>
                    <li><a href="#projects" class="nav-link">Projects</a></li>
                    <li><a href="#education" class="nav-link">Education</a></li>
                    <li><a href="#contact" class="nav-link">Contact</a></li>
                </ul>
            </nav>

            <!-- Header Action Controls -->
            <div class="header-actions">
                <!-- Dark / Light Theme Toggle -->
                <button type="button" class="theme-toggle-btn" id="theme-toggle" aria-label="Toggle dark/light theme" title="Toggle theme">
                    <span class="theme-icon-sun" aria-hidden="true"><?= render_icon('sun') ?></span>
                    <span class="theme-icon-moon" aria-hidden="true"><?= render_icon('moon') ?></span>
                </button>

                <!-- Quick Resume Button -->
                <a href="<?= htmlspecialchars($portfolio['personal']['resume_path']) ?>" class="btn btn-sm btn-outline btn-resume-nav" download target="_blank" rel="noopener noreferrer">
                    <?= render_icon('download', 'btn-icon') ?>
                    <span>Resume</span>
                </a>

                <!-- Mobile Hamburger Toggle -->
                <button type="button" class="mobile-toggle-btn" id="mobile-toggle" aria-expanded="false" aria-controls="mobile-nav" aria-label="Toggle navigation menu">
                    <span class="hamburger-bar"></span>
                    <span class="hamburger-bar"></span>
                    <span class="hamburger-bar"></span>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation Drawer -->
        <div class="mobile-nav-drawer" id="mobile-nav" aria-hidden="true">
            <div class="container mobile-nav-inner">
                <ul class="mobile-nav-list">
                    <li><a href="#about" class="mobile-nav-link">About</a></li>
                    <li><a href="#skills" class="mobile-nav-link">Skills</a></li>
                    <li><a href="#certifications" class="mobile-nav-link">Certifications</a></li>
                    <li><a href="#projects" class="mobile-nav-link">Projects</a></li>
                    <li><a href="#education" class="mobile-nav-link">Education</a></li>
                    <li><a href="#contact" class="mobile-nav-link">Contact</a></li>
                </ul>
                <div class="mobile-nav-cta">
                    <a href="<?= htmlspecialchars($portfolio['personal']['resume_path']) ?>" class="btn btn-primary btn-block" download target="_blank" rel="noopener noreferrer">
                        <?= render_icon('download', 'btn-icon') ?>
                        <span>Download Resume (PDF)</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="mobile-nav-backdrop" id="mobile-backdrop" aria-hidden="true"></div>
    </header>

    <main id="main-content">
