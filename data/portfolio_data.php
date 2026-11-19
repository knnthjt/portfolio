<?php
/**
 * Kenneth James B. Tolentino - Digital Portfolio Data Store
 * Centralized associative array dynamically loaded by index.php and partials.
 */

$portfolio = [
    'personal' => [
        'first_name' => 'Kenneth James',
        'middle_initial' => 'B.',
        'last_name' => 'Tolentino',
        'full_name' => 'Kenneth James B. Tolentino',
        'short_name' => 'Kenneth Tolentino',
        'initials' => 'KT',
        'headline' => '4th-Year BSIT Student | Aspiring IT Support Specialist & Systems Administrator',
        'roles' => [
            'IT Support Specialist',
            'Aspiring Systems Administrator',
            'TESDA NC II Certified Technician',
            'QA & System Documentation Lead',
            'BSIT 4th-Year Candidate'
        ],
        'location' => 'Barangay Cupang, Muntinlupa City, Metro Manila, Philippines',
        'location_short' => 'Muntinlupa City, Philippines',
        // Easy-to-edit placeholders ready for your actual contact details
        'email' => 'kennethjames.tolentino@example.com',
        'email_display' => '[Email Address: Click to Contact]',
        'phone' => '+63 (9XX) XXX-XXXX',
        'phone_display' => '[Phone Number: Available on Request]',
        'github' => 'https://github.com/knnthjt',
        'github_username' => 'knnthjt',
        'linkedin' => 'https://linkedin.com/in/kenneth-james-tolentino-b1217a442',
        'linkedin_name' => 'kenneth-james-tolentino',
        'resume_path' => 'assets/kenneth_james_tolentino_resume.pdf',
        'status_badge' => 'Open for OJT, Internship & Entry-Level Roles',
        'status_available' => true,
    ],

    'about' => [
        'lead' => 'Detail-oriented 4th-year Bachelor of Science in Information Technology (BSIT) student at STI College Alabang with hands-on competencies in computer systems servicing, network configuration and packet analysis, Windows OS troubleshooting, and system documentation/QA testing.',
        'paragraphs' => [
            'Driven by a passion for dependable IT infrastructure and user-centric technical support, I combine structured academic foundations with practical technical expertise. My background spans hands-on hardware diagnostics, OS deployment, network protocol analysis, and enterprise system administration fundamentals.',
            'In my academic and capstone journey, I have led technical documentation, drafted Software Requirements Specifications (SRS), and spearheaded quality assurance verification across complex multi-user workflows. I thrive in high-accountability environments where uptime, data integrity, and methodical root-cause troubleshooting are mission-critical.'
        ],
        'key_highlights' => [
            [
                'icon' => 'server',
                'title' => 'Systems & Diagnostics',
                'description' => 'Skilled in component-level hardware repair, OS provisioning, and low-level Windows command-line triage (DISM, SFC, PowerShell, diskpart).'
            ],
            [
                'icon' => 'network',
                'title' => 'Networking & Traffic Analysis',
                'description' => 'Configuring LAN/WAN, routing, DHCP/DNS services, with practical packet inspection using Wireshark and A-Packets.'
            ],
            [
                'icon' => 'shield-check',
                'title' => 'QA & Documentation Lead',
                'description' => 'Experienced in formulating formal requirements matrices, role-based access models, and QR-scanning verification tests.'
            ]
        ],
        'stats' => [
            ['value' => '4th', 'label' => 'Year BSIT Student', 'sub' => 'STI College Alabang'],
            ['value' => '2+', 'label' => 'Major Certifications', 'sub' => 'TESDA NC II & Oracle Java'],
            ['value' => '4+', 'label' => 'Technical Projects', 'sub' => 'Capstone & Real-World Systems'],
            ['value' => '100%', 'label' => 'Troubleshooting Mindset', 'sub' => 'Methodical & Documented']
        ]
    ],

    'certifications' => [
        [
            'id' => 'tesda-ncii',
            'title' => 'TESDA National Certificate II (NC II)',
            'specialization' => 'Computer Systems Servicing',
            'issuer' => 'Technical Education and Skills Development Authority (TESDA)',
            'badge' => 'TESDA Certified',
            'badge_color' => 'accent-blue',
            'icon' => 'award',
            'description' => 'Accredited national standard certifying proficiency in installing, configuring, maintaining, and diagnosing computer systems, peripheral devices, networks, and servers.',
            'competencies' => [
                'Install and configure computer systems and peripherals',
                'Set up and maintain computer networks and workgroup servers',
                'Diagnose, inspect, and repair hardware faults and OS defects',
                'Perform preventive maintenance, data backups, and security practices'
            ]
        ],
        [
            'id' => 'oracle-java',
            'title' => 'Oracle Java Fundamentals Certification',
            'specialization' => 'Object-Oriented Programming & Core Java Architecture',
            'issuer' => 'Oracle Academy',
            'badge' => 'Oracle Certified',
            'badge_color' => 'accent-amber',
            'icon' => 'code-circle',
            'description' => 'Demonstrates verified command of object-oriented principles, control structures, encapsulation, inheritance, polymorphism, and Java platform libraries.',
            'competencies' => [
                'Object-Oriented Programming (OOP) design patterns',
                'Algorithm implementation, loops, arrays, and collections',
                'Robust error handling, debugging, and exception safety',
                'Modular software design and compile-time validation'
            ]
        ]
    ],

    'education' => [
        [
            'degree' => 'Bachelor of Science in Information Technology (BSIT)',
            'institution' => 'STI College Alabang',
            'location' => 'Alabang, Muntinlupa City',
            'period' => '2023 – Present (4th Year)',
            'status' => 'Currently Enrolled (Senior)',
            'icon' => 'academic-cap',
            'summary' => 'Undergraduate curriculum specializing in systems servicing, data communications, enterprise database administration, software engineering, and capstone project execution.',
            'key_coursework' => [
                'Computer Systems Servicing & Diagnostics',
                'Network Management & Data Communications',
                'Database Management Systems (SQL / PostgreSQL)',
                'Information Assurance & Security',
                'Systems Analysis, Design & QA Testing',
                'Cloud Architecture & Virtualization'
            ]
        ],
        [
            'degree' => 'Senior High School (SHS)',
            'institution' => 'Cupang Senior High School',
            'location' => 'Brgy. Cupang, Muntinlupa City',
            'period' => 'Graduated 2023',
            'status' => 'Graduated with Honors / Academic Distinction',
            'icon' => 'book-open',
            'summary' => 'Comprehensive academic program building core fundamentals in technology, mathematics, analytical problem-solving, and professional communication.',
            'key_coursework' => [
                'Empowerment Technologies (ICT)',
                'Computer Programming Fundamentals',
                'Oral & Written Professional Communication',
                'Applied Research & Practical Investigations'
            ]
        ]
    ],

    'skill_categories' => [
        'all' => 'All Skills',
        'it_systems' => 'IT Support & Systems',
        'networking_cloud' => 'Networking & Cloud',
        'soft_skills' => 'Professional & Soft Skills'
    ],

    'skills' => [
        // IT Support & Systems
        [
            'name' => 'Computer Systems Servicing',
            'category' => 'it_systems',
            'level' => 'Certified / Advanced',
            'tag' => 'TESDA NC II',
            'icon' => 'cpu',
            'description' => 'Hardware teardown, board diagnostics, peripheral configuration, thermal management, and power supply verification.'
        ],
        [
            'name' => 'Hardware Diagnostics & Repair',
            'category' => 'it_systems',
            'level' => 'Advanced',
            'tag' => 'Hardware',
            'icon' => 'tool',
            'description' => 'Component isolation (RAM, CPU, GPU, storage), POST code diagnostics, multimeter testing, and parts replacement.'
        ],
        [
            'name' => 'Windows Administration',
            'category' => 'it_systems',
            'level' => 'Advanced',
            'tag' => 'SysAdmin',
            'icon' => 'terminal',
            'description' => 'PowerShell scripting, Command Prompt automation, DISM repair, System File Checker (SFC), and diskpart volume management.'
        ],
        [
            'name' => 'OS Installation & Configuration',
            'category' => 'it_systems',
            'level' => 'Advanced',
            'tag' => 'Deployment',
            'icon' => 'disc',
            'description' => 'Clean Windows and Linux provisioning, dual-boot configuration, driver packages, UEFI/BIOS setup, and unattended images.'
        ],
        [
            'name' => 'SAP System Administration (Basic & Advanced)',
            'category' => 'it_systems',
            'level' => 'Foundational',
            'tag' => 'ERP / Enterprise',
            'icon' => 'briefcase',
            'description' => 'SAP enterprise modules overview, user authorization profiles, transaction code navigation, and basic admin workflows.'
        ],

        // Networking & Cloud
        [
            'name' => 'AWS Cloud Fundamentals',
            'category' => 'networking_cloud',
            'level' => 'Foundational',
            'tag' => 'Cloud',
            'icon' => 'cloud',
            'description' => 'Virtual Private Cloud (VPC), EC2 instance provisioning, RDS managed databases, S3 storage buckets, and IAM policy basics.'
        ],
        [
            'name' => 'Network Protocols (TCP/IP, DNS, DHCP)',
            'category' => 'networking_cloud',
            'level' => 'Advanced',
            'tag' => 'Protocols',
            'icon' => 'globe',
            'description' => 'IPv4/IPv6 addressing, subnet masking, default gateways, static IP reservations, NAT translation, and port forwarding.'
        ],

        // Soft Skills
        [
            'name' => 'Technical & Documentation Writing',
            'category' => 'soft_skills',
            'level' => 'Advanced',
            'tag' => 'Core Strength',
            'icon' => 'file-text',
            'description' => 'Drafting formal SRS documents, standard operating procedures (SOPs), QA test plans, and bug tracking reports.'
        ],
        [
            'name' => 'Time Management & Prioritization',
            'category' => 'soft_skills',
            'level' => 'Advanced',
            'tag' => 'Execution',
            'icon' => 'clock',
            'description' => 'Prioritizing critical incidents, meeting project milestones, and delivering structured outputs on schedule.'
        ],
        [
            'name' => 'Adaptability & Continuous Learning',
            'category' => 'soft_skills',
            'level' => 'Advanced',
            'tag' => 'Growth Mindset',
            'icon' => 'trending-up',
            'description' => 'Quickly learning new tech stacks, OS platforms, and cloud utilities while keeping skills aligned with industry shifts.'
        ]
    ],

    'projects' => [
        [
            'id' => 'lumina-lms',
            'title' => 'Lumina Library Management System',
            'subtitle' => 'STI College Alabang Capstone Project',
            'role' => 'System Documentation & Quality Assurance (QA) Lead',
            'badge' => 'Capstone Project',
            'badge_type' => 'featured',
            'year' => '2024 – 2025',
            'institution' => 'STI College Alabang',
            'description' => 'Authored formal system specifications, functional requirements matrices, user role permission tables, and iterative development documentation, and executed integration/QR-scanning verification testing.',
            'challenge' => 'The college required an efficient, accountable campus library system replacing manual book ledgers while supporting instant student verification, dynamic book cataloging, and precise borrowing penalty enforcement.',
            'my_contributions' => [
                'Formulated formal Software Requirements Specifications (SRS) detailing role-based permissions (Admin, Librarian, Student).',
                'Constructed exhaustive functional requirements matrices and validation test cases for loan workflows.',
                'Engineered and executed integration verification test suites for physical QR-code book identification and student badge scanning.',
                'Facilitated iterative bug triage, regression testing, and sign-off meetings with faculty evaluators.'
            ],
            'technologies' => ['System QA', 'Requirements Matrix', 'Documentation', 'Integration Testing', 'QR-Scanning Verification', 'Role-Based Access Control', 'UML Diagrams'],
            'impact' => 'Delivered airtight test coverage, zero critical checkout defects upon defense, and a fully standardized system documentation binder praised by the evaluation panel.'
        ],
        [
            'id' => 'barangay-alabang-preblotter',
            'title' => 'Barangay Alabang Pre-Blotter Reporting System',
            'subtitle' => 'Community Kiosk & Incident Documentation',
            'role' => 'System Analyst & Documentation',
            'badge' => 'Systems Analysis',
            'badge_type' => 'accent',
            'year' => '2024',
            'institution' => 'Community Workflow Initiative',
            'description' => 'Designed and documented a web-based local pre-blotter workflow and barangay kiosk reporting specification for seamless community incident submission and record keeping.',
            'challenge' => 'Barangay desks frequently suffered backlogs, handwriting illegibility, and inconsistent incident classification during manual pre-blotter reporting.',
            'my_contributions' => [
                'Mapped existing frontline intake workflows through stakeholder interviews and observation of barangay peacekeepers.',
                'Designed intuitive wireframe specifications for public touch-screen intake kiosks with data privacy safeguards.',
                'Authored complete system process diagrams, data flow models (DFD Level 0 & 1), and user journey maps.',
                'Standardized complaint categorization schemes to speed up officer blotter logging.'
            ],
            'technologies' => ['Systems Analysis', 'Workflow Design', 'Kiosk Specifications', 'Data Privacy', 'Process Modeling', 'Technical Documentation'],
            'impact' => 'Drafted a blueprint that reduces citizen intake waiting times, eliminates transcription errors, and ensures standard incident archiving.'
        ],
        [
            'id' => 'creator-web-platforms',
            'title' => 'Custom Creator Web Platforms & Community Tools',
            'subtitle' => 'Freelance Client Solutions',
            'role' => 'Freelance Developer',
            'badge' => 'Freelance',
            'badge_type' => 'neutral',
            'year' => '2023 – 2024',
            'institution' => 'Client Engagements',
            'description' => 'Built responsive web pages and streaming tools using HTML, CSS, JavaScript, Next.js, and React tailored for digital content creators and online communities.',
            'challenge' => 'Creators needed custom branded web hubs, interactive streaming widgets, and responsive landing pages with low latency and seamless mobile browsing.',
            'my_contributions' => [
                'Developed modern, mobile-first responsive web layouts ensuring cross-browser rendering consistency.',
                'Built custom streaming overlays and interactive browser source components utilizing vanilla JavaScript and React.',
                'Optimized asset loading and core web vitals for smooth rendering during high-traffic broadcast events.'
            ],
            'technologies' => ['React', 'Next.js', 'JavaScript (ES6+)', 'HTML5', 'CSS3 Flex/Grid', 'Responsive UI', 'Streaming Tools'],
            'impact' => 'Successfully deployed interactive creator tools that enhanced community engagement and delivered fast, responsive viewer experiences.'
        ],
        [
            'id' => 'graphics-unity-prototypes',
            'title' => '3D Graphics & Unity Game Prototypes',
            'subtitle' => 'Interactive Simulation & Computer Graphics',
            'role' => 'Interactive Systems Developer',
            'badge' => 'Interactive 3D',
            'badge_type' => 'neutral',
            'year' => '2023 – 2024',
            'institution' => 'Academic & Independent Research',
            'description' => 'Built interactive 3D wireframe scene graphs in Python (PyOpenGL/Pygame) and 2D/3D mechanics in Unity (C#).',
            'challenge' => 'Understanding fundamental computer graphics mathematics (transformation matrices, projections) and game physics cycles without relying solely on black-box engine features.',
            'my_contributions' => [
                'Engineered interactive 3D wireframe rendering pipelines in Python using PyOpenGL and Pygame from matrix fundamentals.',
                'Implemented translation, rotation, scaling matrices, and orthographic/perspective camera projections.',
                'Programmed responsive character controller physics, state machines, and collision triggers in Unity with C#.'
            ],
            'technologies' => ['Python', 'PyOpenGL', 'Pygame', 'Unity Engine', 'C#', '3D Math & Vectors', 'Computer Graphics'],
            'impact' => 'Solidified deep technical understanding of rendering pipelines, memory utilization, and real-time interactive systems.'
        ]
    ]
];
