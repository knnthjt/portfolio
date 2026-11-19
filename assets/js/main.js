/**
 * Kenneth James B. Tolentino - Digital Portfolio
 * Vanilla JavaScript Interactive Features
 * Zero external libraries or frameworks
 */

document.addEventListener('DOMContentLoaded', () => {
    'use strict';

    /* ==========================================================================
       1. DARK / LIGHT THEME TOGGLE
       ========================================================================== */
    const initTheme = () => {
        const themeToggleBtn = document.getElementById('theme-toggle');
        if (!themeToggleBtn) return;

        const html = document.documentElement;
        
        // Helper to set theme
        const setTheme = (theme, save = true) => {
            html.setAttribute('data-theme', theme);
            if (save) {
                try {
                    localStorage.setItem('portfolio_theme', theme);
                } catch (e) {
                    console.warn('LocalStorage unavailable for theme persistence', e);
                }
            }
            themeToggleBtn.setAttribute('title', theme === 'dark' ? 'Switch to Light Theme' : 'Switch to Dark Theme');
            themeToggleBtn.setAttribute('aria-label', theme === 'dark' ? 'Switch to Light Theme' : 'Switch to Dark Theme');
        };

        // Initialize from existing attribute or stored pref
        const currentTheme = html.getAttribute('data-theme') || 'dark';
        setTheme(currentTheme, false);

        // Click toggle
        themeToggleBtn.addEventListener('click', () => {
            const activeTheme = html.getAttribute('data-theme') === 'light' ? 'dark' : 'light';
            setTheme(activeTheme, true);
        });

        // Listen for OS system theme changes if user has no stored preference
        try {
            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
                if (!localStorage.getItem('portfolio_theme')) {
                    setTheme(e.matches ? 'dark' : 'light', false);
                }
            });
        } catch (e) {}
    };

    /* ==========================================================================
       2. MOBILE NAVIGATION DRAWER & ACCESSIBILITY
       ========================================================================== */
    const initMobileNav = () => {
        const toggleBtn = document.getElementById('mobile-toggle');
        const drawer = document.getElementById('mobile-nav');
        const backdrop = document.getElementById('mobile-backdrop');
        const mobileLinks = document.querySelectorAll('.mobile-nav-link');

        if (!toggleBtn || !drawer) return;

        const openMenu = () => {
            toggleBtn.classList.add('active');
            toggleBtn.setAttribute('aria-expanded', 'true');
            drawer.classList.add('open');
            drawer.setAttribute('aria-hidden', 'false');
            if (backdrop) backdrop.classList.add('open');
            document.body.style.overflow = 'hidden';
        };

        const closeMenu = () => {
            toggleBtn.classList.remove('active');
            toggleBtn.setAttribute('aria-expanded', 'false');
            drawer.classList.remove('open');
            drawer.setAttribute('aria-hidden', 'true');
            if (backdrop) backdrop.classList.remove('open');
            document.body.style.overflow = '';
        };

        toggleBtn.addEventListener('click', () => {
            const isOpen = drawer.classList.contains('open');
            isOpen ? closeMenu() : openMenu();
        });

        if (backdrop) {
            backdrop.addEventListener('click', closeMenu);
        }

        mobileLinks.forEach(link => {
            link.addEventListener('click', closeMenu);
        });

        // Close on ESC key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && drawer.classList.contains('open')) {
                closeMenu();
            }
        });
    };

    /* ==========================================================================
       3. TYPING & ROLE SUBTITLE EFFECT IN HERO SECTION
       ========================================================================== */
    const initRoleTyping = () => {
        const typedElement = document.getElementById('role-typed');
        if (!typedElement) return;

        let roles = [];
        try {
            roles = JSON.parse(typedElement.getAttribute('data-roles')) || [];
        } catch (e) {
            roles = [
                'IT Support Specialist',
                'Aspiring Systems Administrator',
                'TESDA NC II Certified Technician',
                'QA & System Documentation Lead'
            ];
        }

        if (roles.length === 0) return;

        let roleIndex = 0;
        let charIndex = 0;
        let isDeleting = false;
        let typingSpeed = 90; // Milliseconds per char

        const type = () => {
            const currentRole = roles[roleIndex];

            if (isDeleting) {
                // Deleting text
                typedElement.textContent = currentRole.substring(0, charIndex - 1);
                charIndex--;
                typingSpeed = 45;
            } else {
                // Typing text
                typedElement.textContent = currentRole.substring(0, charIndex + 1);
                charIndex++;
                typingSpeed = 90;
            }

            // Word completed
            if (!isDeleting && charIndex === currentRole.length) {
                isDeleting = true;
                typingSpeed = 1800; // Pause at end of word
            } else if (isDeleting && charIndex === 0) {
                isDeleting = false;
                roleIndex = (roleIndex + 1) % roles.length;
                typingSpeed = 400; // Brief pause before typing next word
            }

            setTimeout(type, typingSpeed);
        };

        // Start typing after initial layout settle
        setTimeout(type, 800);
    };

    /* ==========================================================================
       4. SKILL CATEGORY FILTER TABS
       ========================================================================== */
    const initSkillFilters = () => {
        const filterBtns = document.querySelectorAll('.skill-filter-btn');
        const skillCards = document.querySelectorAll('.skill-card');

        if (!filterBtns.length || !skillCards.length) return;

        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const selectedCategory = btn.getAttribute('data-filter');

                // Update active button state
                filterBtns.forEach(b => {
                    b.classList.remove('active');
                    b.setAttribute('aria-selected', 'false');
                });
                btn.classList.add('active');
                btn.setAttribute('aria-selected', 'true');

                // Filter cards with smooth visibility
                skillCards.forEach(card => {
                    const cardCategory = card.getAttribute('data-category');
                    if (selectedCategory === 'all' || cardCategory === selectedCategory) {
                        card.classList.remove('is-hidden');
                        card.style.opacity = '0';
                        card.style.transform = 'scale(0.95)';
                        setTimeout(() => {
                            card.style.transition = 'all 0.25s ease';
                            card.style.opacity = '1';
                            card.style.transform = 'scale(1)';
                        }, 20);
                    } else {
                        card.classList.add('is-hidden');
                    }
                });
            });
        });
    };

    /* ==========================================================================
       5. ACTIVE NAV LINK SCROLL-SPY
       ========================================================================== */
    const initScrollSpy = () => {
        const sections = document.querySelectorAll('section[id]');
        const desktopLinks = document.querySelectorAll('.nav-desktop .nav-link');
        const mobileLinks = document.querySelectorAll('.mobile-nav-link');

        if (!sections.length) return;

        const updateActiveNav = () => {
            const scrollPos = window.scrollY + 140; // Offset for header

            let currentSectionId = '';

            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.offsetHeight;
                if (scrollPos >= sectionTop && scrollPos < sectionTop + sectionHeight) {
                    currentSectionId = section.getAttribute('id');
                }
            });

            // Highlight desktop links
            desktopLinks.forEach(link => {
                const href = link.getAttribute('href');
                if (href === `#${currentSectionId}`) {
                    link.classList.add('active');
                } else {
                    link.classList.remove('active');
                }
            });

            // Highlight mobile links
            mobileLinks.forEach(link => {
                const href = link.getAttribute('href');
                if (href === `#${currentSectionId}`) {
                    link.classList.add('active');
                } else {
                    link.classList.remove('active');
                }
            });
        };

        window.addEventListener('scroll', updateActiveNav, { passive: true });
        updateActiveNav();
    };

    /* ==========================================================================
       6. CONTACT FORM ASYNC SUBMISSION (FETCH AJAX) & VALIDATION
       ========================================================================== */
    const initContactForm = () => {
        const form = document.getElementById('contact-form');
        const statusBox = document.getElementById('contact-status-box');
        const submitBtn = document.getElementById('btn-submit');
        const submitText = document.getElementById('btn-text');
        const spinner = document.getElementById('btn-spinner');
        const messageTextarea = document.getElementById('contact-message');
        const charCounter = document.getElementById('char-counter');

        if (!form) return;

        // Character counter
        if (messageTextarea && charCounter) {
            messageTextarea.addEventListener('input', () => {
                const len = messageTextarea.value.length;
                charCounter.textContent = `${len} / 3000`;
                if (len > 3000) {
                    charCounter.style.color = 'var(--status-danger)';
                } else {
                    charCounter.style.color = '';
                }
            });
        }

        // Helper to clear error states
        const clearErrors = () => {
            const errorSpans = form.querySelectorAll('.form-field-error');
            errorSpans.forEach(span => { span.textContent = ''; });

            const invalidInputs = form.querySelectorAll('.is-invalid');
            invalidInputs.forEach(input => { input.classList.remove('is-invalid'); });

            if (statusBox) {
                statusBox.className = 'alert d-none';
                statusBox.textContent = '';
            }
        };

        // Helper to show field error
        const setFieldError = (fieldId, errSpanId, errorMsg) => {
            const field = document.getElementById(fieldId);
            const errSpan = document.getElementById(errSpanId);
            if (field) field.classList.add('is-invalid');
            if (errSpan) errSpan.textContent = errorMsg;
        };

        // Email validation regex
        const isValidEmail = (email) => {
            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        };

        // Form Submit Handler
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            clearErrors();

            const nameInput = document.getElementById('contact-name');
            const emailInput = document.getElementById('contact-email');
            const subjectInput = document.getElementById('contact-subject');
            const messageInput = document.getElementById('contact-message');

            const name = nameInput.value.trim();
            const email = emailInput.value.trim();
            const subject = subjectInput.value;
            const message = messageInput.value.trim();

            let hasClientError = false;

            // Client validation
            if (!name) {
                setFieldError('contact-name', 'err-name', 'Please enter your name.');
                hasClientError = true;
            } else if (name.length < 2) {
                setFieldError('contact-name', 'err-name', 'Name must be at least 2 characters.');
                hasClientError = true;
            }

            if (!email) {
                setFieldError('contact-email', 'err-email', 'Please enter your email.');
                hasClientError = true;
            } else if (!isValidEmail(email)) {
                setFieldError('contact-email', 'err-email', 'Please enter a valid email address.');
                hasClientError = true;
            }

            if (!subject) {
                setFieldError('contact-subject', 'err-subject', 'Please select an inquiry topic.');
                hasClientError = true;
            }

            if (!message) {
                setFieldError('contact-message', 'err-message', 'Please write your message.');
                hasClientError = true;
            } else if (message.length < 15) {
                setFieldError('contact-message', 'err-message', 'Message must be at least 15 characters.');
                hasClientError = true;
            }

            if (hasClientError) {
                // Focus first invalid element
                const firstInvalid = form.querySelector('.is-invalid');
                if (firstInvalid) firstInvalid.focus();
                return;
            }

            // Set Loading UI
            submitBtn.disabled = true;
            if (spinner) spinner.classList.remove('d-none');
            if (submitText) submitText.classList.add('d-none');

            // Build form data
            const formData = new FormData(form);
            formData.append('is_ajax', '1');

            try {
                const response = await fetch('contact_handler.php', {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    },
                    body: formData
                });

                const data = await response.json();

                if (data.success) {
                    // Show success
                    statusBox.className = 'alert alert-success';
                    statusBox.innerHTML = `
                        <div class="alert-icon">&#x2714;</div>
                        <div class="alert-content">
                            <strong>Success!</strong> ${data.message}
                        </div>
                    `;
                    form.reset();
                    if (charCounter) charCounter.textContent = '0 / 3000';
                    statusBox.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                } else {
                    // Show server validation errors
                    statusBox.className = 'alert alert-danger';
                    statusBox.innerHTML = `
                        <div class="alert-icon">&#x26A0;</div>
                        <div class="alert-content">
                            <strong>Submission Error:</strong> ${data.message}
                        </div>
                    `;

                    if (data.errors) {
                        if (data.errors.name) setFieldError('contact-name', 'err-name', data.errors.name);
                        if (data.errors.email) setFieldError('contact-email', 'err-email', data.errors.email);
                        if (data.errors.subject) setFieldError('contact-subject', 'err-subject', data.errors.subject);
                        if (data.errors.message) setFieldError('contact-message', 'err-message', data.errors.message);
                    }
                }
            } catch (err) {
                console.error('Submission request failed:', err);
                statusBox.className = 'alert alert-danger';
                statusBox.innerHTML = `
                    <div class="alert-icon">&#x26A0;</div>
                    <div class="alert-content">
                        <strong>Network Error:</strong> Unable to process the request. Please verify your connection or email Kenneth directly.
                    </div>
                `;
            } finally {
                submitBtn.disabled = false;
                if (spinner) spinner.classList.add('d-none');
                if (submitText) submitText.classList.remove('d-none');
            }
        });
    };

    /* ==========================================================================
       7. SMOOTH SCROLL WITH HEADER OFFSET FOR IN-PAGE ANCHORS
       ========================================================================== */
    const initSmoothScroll = () => {
        const internalAnchors = document.querySelectorAll('a[href^="#"]:not([href="#"])');

        internalAnchors.forEach(anchor => {
            anchor.addEventListener('click', (e) => {
                const targetId = anchor.getAttribute('href');
                if (targetId === '#top') {
                    e.preventDefault();
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                    return;
                }

                const targetElem = document.querySelector(targetId);
                if (targetElem) {
                    e.preventDefault();
                    const headerOffset = 76;
                    const elementPosition = targetElem.getBoundingClientRect().top;
                    const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                    window.scrollTo({
                        top: offsetPosition,
                        behavior: 'smooth'
                    });

                    // Update URL hash without jump
                    if (history.pushState) {
                        history.pushState(null, null, targetId);
                    }
                }
            });
        });
    };

    // Initialize all components
    initTheme();
    initMobileNav();
    initRoleTyping();
    initSkillFilters();
    initScrollSpy();
    initContactForm();
    initSmoothScroll();
});
