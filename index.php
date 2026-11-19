<?php
/**
 * Kenneth James B. Tolentino - Digital Portfolio
 * Main entry point: index.php
 */

require_once __DIR__ . '/data/portfolio_data.php';
require_once __DIR__ . '/includes/icons.php';

// Check for any session alert from non-JS fallback submission
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$formStatus = $_SESSION['contact_status'] ?? null;
unset($_SESSION['contact_status']);

// Include Header
require_once __DIR__ . '/includes/header.php';
?>

<!-- =========================================================================
     HERO SECTION
========================================================================= -->
<section class="hero-section" id="hero">
    <div class="container hero-container">
        <!-- Hero Content (Left) -->
        <div class="hero-content">
            <div class="hero-badge-wrap">
                <span class="pulse-indicator" aria-hidden="true"></span>
                <span class="hero-badge"><?= htmlspecialchars($portfolio['personal']['status_badge']) ?></span>
            </div>

            <h1 class="hero-title">
                <span class="hero-greeting">Hello, I'm</span>
                <span class="hero-name"><?= htmlspecialchars($portfolio['personal']['full_name']) ?></span>
            </h1>

            <!-- Animated Typing Subtitle -->
            <div class="hero-subtitle-container" aria-label="Role titles">
                <span class="hero-subtitle-static">Specializing in</span>
                <span class="hero-subtitle-dynamic" id="role-typed" data-roles='<?= json_encode($portfolio['personal']['roles']) ?>'>
                    <?= htmlspecialchars($portfolio['personal']['roles'][0]) ?>
                </span>
                <span class="typing-cursor" aria-hidden="true">|</span>
            </div>

            <p class="hero-description">
                <?= htmlspecialchars($portfolio['about']['lead']) ?>
            </p>

            <!-- Hero Call To Actions -->
            <div class="hero-actions">
                <!-- Prominent Download Resume Button -->
                <a href="<?= htmlspecialchars($portfolio['personal']['resume_path']) ?>" class="btn btn-primary btn-lg btn-download-resume" download="Kenneth_James_Tolentino_Resume.pdf" target="_blank" rel="noopener noreferrer">
                    <?= render_icon('download', 'btn-icon') ?>
                    <span>Download Resume (PDF)</span>
                </a>

                <a href="#projects" class="btn btn-outline btn-lg">
                    <span>View Projects</span>
                    <?= render_icon('arrow-right', 'btn-icon') ?>
                </a>

                <a href="#contact" class="btn btn-ghost btn-lg">
                    <?= render_icon('send', 'btn-icon') ?>
                    <span>Contact Me</span>
                </a>
            </div>

            <!-- Hero Meta Badges & Social Links -->
            <div class="hero-meta">
                <div class="hero-meta-item">
                    <?= render_icon('map-pin', 'meta-icon') ?>
                    <span><?= htmlspecialchars($portfolio['personal']['location_short']) ?></span>
                </div>
                <div class="hero-meta-divider" aria-hidden="true">|</div>
                <div class="hero-meta-item">
                    <?= render_icon('academic-cap', 'meta-icon') ?>
                    <span>STI College Alabang (4th Year)</span>
                </div>
                <div class="hero-meta-divider" aria-hidden="true">|</div>
                <div class="hero-social-links">
                    <a href="<?= htmlspecialchars($portfolio['personal']['github']) ?>" target="_blank" rel="noopener noreferrer" class="social-icon-btn" aria-label="GitHub Profile" title="GitHub">
                        <?= render_icon('github') ?>
                    </a>
                    <a href="<?= htmlspecialchars($portfolio['personal']['linkedin']) ?>" target="_blank" rel="noopener noreferrer" class="social-icon-btn" aria-label="LinkedIn Profile" title="LinkedIn">
                        <?= render_icon('linkedin') ?>
                    </a>
                    <a href="mailto:<?= htmlspecialchars($portfolio['personal']['email']) ?>" class="social-icon-btn" aria-label="Send Email" title="Email">
                        <?= render_icon('email') ?>
                    </a>
                </div>
            </div>
        </div>

        <!-- Hero Visual Diagnostic Card (Right) -->
        <div class="hero-visual">
            <div class="terminal-card">
                <div class="terminal-header">
                    <div class="terminal-dots">
                        <span class="dot dot-red"></span>
                        <span class="dot dot-yellow"></span>
                        <span class="dot dot-green"></span>
                    </div>
                    <div class="terminal-title">Windows PowerShell — Diagnostic Profile</div>
                    <div class="terminal-badge">SYSADMIN // QA</div>
                </div>
                <div class="terminal-body">
                    <div class="cmd-line">
                        <span class="cmd-prompt">PS C:\Users\kenneth&gt;</span>
                        <span class="cmd-text">Get-CandidateSummary -Identity "Kenneth James B. Tolentino"</span>
                    </div>
                    <div class="cmd-output">
                        <div class="cmd-keyval"><span class="k">Academic Status:</span> <span class="v status-val">4th Year BSIT Senior @ STI College Alabang</span></div>
                        <div class="cmd-keyval"><span class="k">Primary Track:</span> <span class="v">IT Support &amp; Systems Administration</span></div>
                        <div class="cmd-keyval"><span class="k">Certifications:</span> <span class="v cert-val">TESDA NC II (CSS), Oracle Java Fundamentals</span></div>
                        <div class="cmd-keyval"><span class="k">Diagnostics:</span> <span class="v">DISM, SFC, PowerShell, Wireshark, Hardware Bench</span></div>
                        <div class="cmd-keyval"><span class="k">Capstone Role:</span> <span class="v highlight-val">QA &amp; System Documentation Lead (Lumina LMS)</span></div>
                    </div>

                    <div class="cmd-line cmd-mt">
                        <span class="cmd-prompt">PS C:\Users\kenneth&gt;</span>
                        <span class="cmd-text">Test-Connection -Target "RecruiterAvailability" -Quiet</span>
                    </div>
                    <div class="cmd-output">
                        <div class="cmd-success">
                            <span class="success-glyph">&#x2714;</span> True &mdash; Ready for Technical Support, Systems Admin, or QA Roles
                        </div>
                    </div>
                </div>
                <div class="terminal-footer">
                    <span class="terminal-stat"><span class="terminal-status-light"></span> Host Online</span>
                    <span class="terminal-stat">Uptime: 99.9%</span>
                    <span class="terminal-stat">Zone: Metro Manila, PH</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================================
     ABOUT SECTION
========================================================================= -->
<section class="section about-section" id="about">
    <div class="container">
        <div class="section-header">
            <div class="section-tag">Profile Overview</div>
            <h2 class="section-title">About Kenneth James</h2>
            <p class="section-subtitle">
                Blending hands-on computer systems servicing, network packet diagnostics, and disciplined QA documentation leadership.
            </p>
        </div>

        <div class="about-grid">
            <!-- Left: Biography & Philosophy -->
            <div class="about-bio-card card">
                <h3 class="card-title">Professional Background</h3>
                <p class="lead-text"><?= htmlspecialchars($portfolio['about']['lead']) ?></p>
                <?php foreach ($portfolio['about']['paragraphs'] as $p): ?>
                    <p class="body-text"><?= htmlspecialchars($p) ?></p>
                <?php endforeach; ?>

                <div class="about-quick-specs">
                    <div class="spec-row">
                        <span class="spec-label">Education:</span>
                        <span class="spec-value">BSIT, STI College Alabang (Senior, 4th Year)</span>
                    </div>
                    <div class="spec-row">
                        <span class="spec-label">Certifications:</span>
                        <span class="spec-value">TESDA NC II (CSS) &bull; Oracle Java Fundamentals</span>
                    </div>
                    <div class="spec-row">
                        <span class="spec-label">Location:</span>
                        <span class="spec-value"><?= htmlspecialchars($portfolio['personal']['location']) ?></span>
                    </div>
                    <div class="spec-row">
                        <span class="spec-label">Availability:</span>
                        <span class="spec-value status-open">Immediately Open for OJT &amp; Opportunities</span>
                    </div>
                </div>
            </div>

            <!-- Right: 4 Focus Pillars -->
            <div class="about-pillars-grid">
                <?php foreach ($portfolio['about']['key_highlights'] as $highlight): ?>
                    <div class="pillar-card card">
                        <div class="pillar-icon-box" aria-hidden="true">
                            <?= render_icon($highlight['icon'], 'pillar-icon') ?>
                        </div>
                        <div class="pillar-content">
                            <h4 class="pillar-title"><?= htmlspecialchars($highlight['title']) ?></h4>
                            <p class="pillar-desc"><?= htmlspecialchars($highlight['description']) ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Metric Counters / Stats Grid -->
        <div class="stats-grid">
            <?php foreach ($portfolio['about']['stats'] as $stat): ?>
                <div class="stat-card">
                    <div class="stat-value"><?= htmlspecialchars($stat['value']) ?></div>
                    <div class="stat-label"><?= htmlspecialchars($stat['label']) ?></div>
                    <div class="stat-sub"><?= htmlspecialchars($stat['sub']) ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- =========================================================================
     TECHNICAL SKILLS SECTION (With Interactive Category Tabs)
========================================================================= -->
<section class="section skills-section" id="skills">
    <div class="container">
        <div class="section-header">
            <div class="section-tag">Core Competencies</div>
            <h2 class="section-title">Technical &amp; Professional Skills</h2>
            <p class="section-subtitle">
                Filter across IT systems servicing, networking infrastructure, enterprise administration, and professional workflows.
            </p>
        </div>

        <!-- Filter Category Tabs -->
        <div class="skills-filter-nav" role="tablist" aria-label="Skill categories">
            <?php foreach ($portfolio['skill_categories'] as $catKey => $catLabel): ?>
                <button type="button" 
                        class="skill-filter-btn <?= $catKey === 'all' ? 'active' : '' ?>" 
                        data-filter="<?= htmlspecialchars($catKey) ?>" 
                        role="tab"
                        aria-selected="<?= $catKey === 'all' ? 'true' : 'false' ?>">
                    <span><?= htmlspecialchars($catLabel) ?></span>
                    <span class="filter-count" data-count-for="<?= htmlspecialchars($catKey) ?>">
                        <?php
                            if ($catKey === 'all') {
                                echo count($portfolio['skills']);
                            } else {
                                echo count(array_filter($portfolio['skills'], fn($s) => $s['category'] === $catKey));
                            }
                        ?>
                    </span>
                </button>
            <?php endforeach; ?>
        </div>

        <!-- Dynamic Skills Grid -->
        <div class="skills-grid" id="skills-grid">
            <?php foreach ($portfolio['skills'] as $skill): ?>
                <div class="skill-card card" data-category="<?= htmlspecialchars($skill['category']) ?>">
                    <div class="skill-card-top">
                        <div class="skill-icon-wrap" aria-hidden="true">
                            <?= render_icon($skill['icon'], 'skill-icon') ?>
                        </div>
                        <div class="skill-tags">
                            <span class="skill-tag"><?= htmlspecialchars($skill['tag']) ?></span>
                            <span class="skill-level"><?= htmlspecialchars($skill['level']) ?></span>
                        </div>
                    </div>
                    <h3 class="skill-name"><?= htmlspecialchars($skill['name']) ?></h3>
                    <p class="skill-desc"><?= htmlspecialchars($skill['description']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- =========================================================================
     CERTIFICATIONS SECTION
========================================================================= -->
<section class="section certifications-section" id="certifications">
    <div class="container">
        <div class="section-header">
            <div class="section-tag">Credentials &amp; Standards</div>
            <h2 class="section-title">Professional Certifications</h2>
            <p class="section-subtitle">
                Officially accredited competencies verifying hands-on hardware/network systems servicing and software fundamentals.
            </p>
        </div>

        <div class="certifications-grid">
            <?php foreach ($portfolio['certifications'] as $cert): ?>
                <div class="cert-card card">
                    <div class="cert-card-header">
                        <div class="cert-badge-pill <?= htmlspecialchars($cert['badge_color']) ?>">
                            <?= render_icon($cert['icon'], 'cert-badge-icon') ?>
                            <span><?= htmlspecialchars($cert['badge']) ?></span>
                        </div>
                        <span class="cert-status-badge">&#x2713; Verified</span>
                    </div>

                    <div class="cert-body">
                        <h3 class="cert-title"><?= htmlspecialchars($cert['title']) ?></h3>
                        <div class="cert-specialization"><?= htmlspecialchars($cert['specialization']) ?></div>
                        <div class="cert-issuer">
                            <?= render_icon('award', 'issuer-icon') ?>
                            <span><?= htmlspecialchars($cert['issuer']) ?></span>
                        </div>

                        <p class="cert-description"><?= htmlspecialchars($cert['description']) ?></p>

                        <div class="cert-competencies">
                            <h4 class="competencies-title">Certified Competencies:</h4>
                            <ul class="competencies-list">
                                <?php foreach ($cert['competencies'] as $comp): ?>
                                    <li>
                                        <span class="comp-check" aria-hidden="true"><?= render_icon('check-circle') ?></span>
                                        <span><?= htmlspecialchars($comp) ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- =========================================================================
     PROJECTS & EXPERIENCE SECTION
========================================================================= -->
<section class="section projects-section" id="projects">
    <div class="container">
        <div class="section-header">
            <div class="section-tag">Applied Experience</div>
            <h2 class="section-title">Featured Projects &amp; Leadership</h2>
            <p class="section-subtitle">
                Demonstrated leadership in capstone QA verification, community systems analysis, web development, and interactive graphics.
            </p>
        </div>

        <div class="projects-list">
            <?php foreach ($portfolio['projects'] as $index => $proj): ?>
                <article class="project-card card" id="<?= htmlspecialchars($proj['id']) ?>">
                    <div class="project-header-bar">
                        <div class="project-badges">
                            <span class="project-pill project-pill-role"><?= htmlspecialchars($proj['role']) ?></span>
                            <span class="project-pill project-pill-type"><?= htmlspecialchars($proj['badge']) ?></span>
                        </div>
                        <span class="project-meta-year"><?= htmlspecialchars($proj['year']) ?> &bull; <?= htmlspecialchars($proj['institution']) ?></span>
                    </div>

                    <div class="project-content-grid">
                        <!-- Main Left Column -->
                        <div class="project-main-col">
                            <h3 class="project-title"><?= htmlspecialchars($proj['title']) ?></h3>
                            <h4 class="project-subtitle"><?= htmlspecialchars($proj['subtitle']) ?></h4>

                            <p class="project-lead"><?= htmlspecialchars($proj['description']) ?></p>

                            <div class="project-block">
                                <div class="project-block-title">Key Contributions &amp; Methodology:</div>
                                <ul class="project-points">
                                    <?php foreach ($proj['my_contributions'] as $contrib): ?>
                                        <li>
                                            <span class="point-bullet" aria-hidden="true">&rsaquo;</span>
                                            <span><?= htmlspecialchars($contrib) ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>

                        <!-- Sidebar Right Column -->
                        <div class="project-side-col">
                            <div class="project-impact-box">
                                <div class="impact-title">Outcome &amp; Impact</div>
                                <p class="impact-text"><?= htmlspecialchars($proj['impact']) ?></p>
                            </div>

                            <div class="project-tech-box">
                                <div class="tech-box-title">Technologies &amp; Methodologies</div>
                                <div class="tech-tags-wrap">
                                    <?php foreach ($proj['technologies'] as $tech): ?>
                                        <span class="tech-tag"><?= htmlspecialchars($tech) ?></span>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- =========================================================================
     EDUCATION SECTION
========================================================================= -->
<section class="section education-section" id="education">
    <div class="container">
        <div class="section-header">
            <div class="section-tag">Academic Timeline</div>
            <h2 class="section-title">Education Background</h2>
            <p class="section-subtitle">
                Building a rigorous foundation in Information Technology, system diagnostics, and academic problem-solving.
            </p>
        </div>

        <div class="education-timeline">
            <?php foreach ($portfolio['education'] as $edu): ?>
                <div class="timeline-item">
                    <div class="timeline-marker" aria-hidden="true">
                        <?= render_icon($edu['icon'], 'timeline-icon') ?>
                    </div>
                    <div class="timeline-card card">
                        <div class="timeline-meta-row">
                            <span class="edu-period"><?= htmlspecialchars($edu['period']) ?></span>
                            <span class="edu-status-badge"><?= htmlspecialchars($edu['status']) ?></span>
                        </div>
                        <h3 class="edu-degree"><?= htmlspecialchars($edu['degree']) ?></h3>
                        <div class="edu-institution">
                            <?= render_icon('map-pin', 'edu-loc-icon') ?>
                            <span><strong><?= htmlspecialchars($edu['institution']) ?></strong> &mdash; <?= htmlspecialchars($edu['location']) ?></span>
                        </div>
                        <p class="edu-summary"><?= htmlspecialchars($edu['summary']) ?></p>

                        <div class="edu-coursework-wrap">
                            <span class="coursework-title">Key Subject Areas:</span>
                            <div class="coursework-tags">
                                <?php foreach ($edu['key_coursework'] as $course): ?>
                                    <span class="coursework-tag"><?= htmlspecialchars($course) ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- =========================================================================
     CONTACT SECTION
========================================================================= -->
<section class="section contact-section" id="contact">
    <div class="container">
        <div class="section-header">
            <div class="section-tag">Communication</div>
            <h2 class="section-title">Get In Touch</h2>
            <p class="section-subtitle">
                Inquire about technical support opportunities, systems administration roles, capstone collaboration, or OJT recruitment.
            </p>
        </div>

        <div class="contact-grid">
            <!-- Left Info Panel -->
            <div class="contact-info-col">
                <div class="card contact-info-card">
                    <h3 class="card-title">Contact Channels</h3>
                    <p class="contact-lead">
                        I am actively available for technical interviews, IT support roles, and inquiries. Reach out directly or send a message through the form.
                    </p>

                    <div class="contact-detail-items">
                        <div class="contact-item">
                            <div class="contact-icon-box" aria-hidden="true"><?= render_icon('map-pin') ?></div>
                            <div class="contact-item-text">
                                <span class="contact-item-label">Location</span>
                                <span class="contact-item-value"><?= htmlspecialchars($portfolio['personal']['location']) ?></span>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-icon-box" aria-hidden="true"><?= render_icon('email') ?></div>
                            <div class="contact-item-text">
                                <span class="contact-item-label">Direct Email</span>
                                <a href="mailto:<?= htmlspecialchars($portfolio['personal']['email']) ?>" class="contact-link">
                                    <?= htmlspecialchars($portfolio['personal']['email']) ?>
                                </a>
                                <span class="contact-hint"><?= htmlspecialchars($portfolio['personal']['email_display']) ?></span>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-icon-box" aria-hidden="true"><?= render_icon('phone') ?></div>
                            <div class="contact-item-text">
                                <span class="contact-item-label">Telephone / Mobile</span>
                                <span class="contact-item-value"><?= htmlspecialchars($portfolio['personal']['phone']) ?></span>
                                <span class="contact-hint"><?= htmlspecialchars($portfolio['personal']['phone_display']) ?></span>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-icon-box" aria-hidden="true"><?= render_icon('linkedin') ?></div>
                            <div class="contact-item-text">
                                <span class="contact-item-label">LinkedIn</span>
                                <a href="<?= htmlspecialchars($portfolio['personal']['linkedin']) ?>" target="_blank" rel="noopener noreferrer" class="contact-link">
                                    <?= htmlspecialchars($portfolio['personal']['linkedin_name']) ?> <?= render_icon('external-link', 'inline-ext-icon') ?>
                                </a>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-icon-box" aria-hidden="true"><?= render_icon('github') ?></div>
                            <div class="contact-item-text">
                                <span class="contact-item-label">GitHub</span>
                                <a href="<?= htmlspecialchars($portfolio['personal']['github']) ?>" target="_blank" rel="noopener noreferrer" class="contact-link">
                                    github.com/<?= htmlspecialchars($portfolio['personal']['github_username']) ?> <?= render_icon('external-link', 'inline-ext-icon') ?>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="contact-resume-card">
                        <div class="crc-icon" aria-hidden="true"><?= render_icon('file-text') ?></div>
                        <div class="crc-content">
                            <h4>Looking for a verified copy of my CV?</h4>
                            <p>Download my comprehensive resume detailing academic achievements and certifications.</p>
                            <a href="<?= htmlspecialchars($portfolio['personal']['resume_path']) ?>" class="btn btn-sm btn-primary" download target="_blank" rel="noopener noreferrer">
                                <?= render_icon('download', 'btn-icon') ?>
                                <span>Download Resume (PDF)</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Interactive Form -->
            <div class="contact-form-col">
                <div class="card contact-form-card">
                    <h3 class="card-title">Send a Direct Message</h3>
                    <p class="form-instructions">Fill in your contact information below. Messages are processed securely.</p>

                    <!-- Non-JS Fallback Alert (if submitted via standard POST) -->
                    <?php if ($formStatus): ?>
                        <div class="alert alert-<?= $formStatus['success'] ? 'success' : 'danger' ?>" role="alert">
                            <div class="alert-icon"><?= render_icon($formStatus['success'] ? 'check-circle' : 'alert-circle') ?></div>
                            <div class="alert-content">
                                <p><?= htmlspecialchars($formStatus['message']) ?></p>
                                <?php if (!empty($formStatus['errors'])): ?>
                                    <ul class="alert-error-list">
                                        <?php foreach ($formStatus['errors'] as $err): ?>
                                            <li><?= htmlspecialchars($err) ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Dynamic AJAX Status Box -->
                    <div id="contact-status-box" class="alert d-none" role="alert" aria-live="polite"></div>

                    <form id="contact-form" action="contact_handler.php" method="POST" novalidate>
                        <!-- Honeypot anti-spam field (hidden from genuine users) -->
                        <div class="honeypot-field" aria-hidden="true">
                            <label for="website_hp">Leave this field blank</label>
                            <input type="text" name="website_hp" id="website_hp" tabindex="-1" autocomplete="off">
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="contact-name" class="form-label">
                                    Your Full Name <span class="required-star">*</span>
                                </label>
                                <input type="text" name="name" id="contact-name" class="form-input" placeholder="e.g. Jane Doe" required maxlength="100">
                                <span class="form-field-error" id="err-name"></span>
                            </div>

                            <div class="form-group">
                                <label for="contact-email" class="form-label">
                                    Your Email Address <span class="required-star">*</span>
                                </label>
                                <input type="email" name="email" id="contact-email" class="form-input" placeholder="e.g. jane@company.com" required maxlength="120">
                                <span class="form-field-error" id="err-email"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="contact-subject" class="form-label">
                                Inquiry Subject <span class="required-star">*</span>
                            </label>
                            <select name="subject" id="contact-subject" class="form-select" required>
                                <option value="" disabled selected>Select an inquiry topic...</option>
                                <option value="IT Support / Helpdesk Opportunity">IT Support / Helpdesk Opportunity</option>
                                <option value="Junior Systems Administrator Role">Junior Systems Administrator Role</option>
                                <option value="On-the-Job Training (OJT) / Internship">On-the-Job Training (OJT) / Internship</option>
                                <option value="QA / System Documentation Project">QA / System Documentation Project</option>
                                <option value="Freelance Web & Development Inquiry">Freelance Web &amp; Development Inquiry</option>
                                <option value="General Professional Inquiries">General Professional Inquiries</option>
                            </select>
                            <span class="form-field-error" id="err-subject"></span>
                        </div>

                        <div class="form-group">
                            <label for="contact-message" class="form-label">
                                Message <span class="required-star">*</span>
                            </label>
                            <textarea name="message" id="contact-message" class="form-textarea" rows="5" placeholder="Please share details about your role, inquiry, or project..." required maxlength="3000"></textarea>
                            <div class="textarea-footer">
                                <span class="form-field-error" id="err-message"></span>
                                <span class="char-counter" id="char-counter">0 / 3000</span>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block btn-submit" id="btn-submit">
                            <span class="btn-spinner d-none" id="btn-spinner" aria-hidden="true"></span>
                            <span class="btn-text" id="btn-text">
                                <?= render_icon('send', 'btn-icon') ?>
                                <span>Send Message</span>
                            </span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
// Include Footer
require_once __DIR__ . '/includes/footer.php';
?>
