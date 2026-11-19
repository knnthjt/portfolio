<?php
/**
 * Footer Partial
 * Kenneth James B. Tolentino - Digital Portfolio
 */
require_once __DIR__ . '/icons.php';
?>
    </main>

    <!-- Site Footer -->
    <footer class="site-footer">
        <div class="container footer-container">
            <div class="footer-top-grid">
                <!-- Col 1: Bio & Status -->
                <div class="footer-col footer-col-brand">
                    <div class="footer-brand">
                        <span class="logo-avatar" aria-hidden="true"><?= htmlspecialchars($portfolio['personal']['initials']) ?></span>
                        <div>
                            <h3 class="footer-name"><?= htmlspecialchars($portfolio['personal']['full_name']) ?></h3>
                            <p class="footer-tagline"><?= htmlspecialchars($portfolio['personal']['headline']) ?></p>
                        </div>
                    </div>
                    <p class="footer-desc">
                        BSIT senior at STI College Alabang specializing in computer systems servicing, Windows diagnostics, network administration, and quality assurance.
                    </p>
                    <div class="status-indicator">
                        <span class="status-dot"></span>
                        <span class="status-text"><?= htmlspecialchars($portfolio['personal']['status_badge']) ?></span>
                    </div>
                </div>

                <!-- Col 2: Fast Navigation -->
                <div class="footer-col footer-col-links">
                    <h4 class="footer-heading">Navigation</h4>
                    <ul class="footer-nav-list">
                        <li><a href="#about">About Overview</a></li>
                        <li><a href="#skills">Technical Competencies</a></li>
                        <li><a href="#certifications">Credentials & NC II</a></li>
                        <li><a href="#projects">Systems & Capstone Projects</a></li>
                        <li><a href="#education">Academic Background</a></li>
                        <li><a href="#contact">Contact & Inquiry</a></li>
                    </ul>
                </div>

                <!-- Col 3: Direct Connect -->
                <div class="footer-col footer-col-connect">
                    <h4 class="footer-heading">Connect Directly</h4>
                    <ul class="footer-contact-list">
                        <li>
                            <span class="footer-contact-icon" aria-hidden="true"><?= render_icon('map-pin') ?></span>
                            <span><?= htmlspecialchars($portfolio['personal']['location_short']) ?></span>
                        </li>
                        <li>
                            <span class="footer-contact-icon" aria-hidden="true"><?= render_icon('linkedin') ?></span>
                            <a href="<?= htmlspecialchars($portfolio['personal']['linkedin']) ?>" target="_blank" rel="noopener noreferrer">
                                LinkedIn Profile <?= render_icon('external-link', 'inline-ext-icon') ?>
                            </a>
                        </li>
                        <li>
                            <span class="footer-contact-icon" aria-hidden="true"><?= render_icon('github') ?></span>
                            <a href="<?= htmlspecialchars($portfolio['personal']['github']) ?>" target="_blank" rel="noopener noreferrer">
                                GitHub (<?= htmlspecialchars($portfolio['personal']['github_username']) ?>) <?= render_icon('external-link', 'inline-ext-icon') ?>
                            </a>
                        </li>
                        <li>
                            <span class="footer-contact-icon" aria-hidden="true"><?= render_icon('email') ?></span>
                            <a href="mailto:<?= htmlspecialchars($portfolio['personal']['email']) ?>" title="Send Email">
                                <?= htmlspecialchars($portfolio['personal']['email']) ?>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <p class="footer-copy">
                    &copy; <?= date('Y') ?> <strong><?= htmlspecialchars($portfolio['personal']['full_name']) ?></strong>. All rights reserved.
                </p>
                <p class="footer-tech-stack">
                    Built with <span>PHP</span>, vanilla <span>CSS3</span>, and vanilla <span>JavaScript</span>. Zero external dependencies.
                </p>
                <a href="#top" class="back-to-top" id="back-to-top" aria-label="Back to top of page" title="Back to top">
                    <span>Back to Top</span>
                    <?= render_icon('arrow-right', 'rotate-up') ?>
                </a>
            </div>
        </div>
    </footer>

    <!-- Vanilla JavaScript Core Script -->
    <script src="assets/js/main.js"></script>
</body>
</html>
