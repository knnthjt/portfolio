<?php
/**
 * Simple Pure-PHP PDF 1.4 Generator for Kenneth James B. Tolentino's Resume
 * Generates assets/kenneth_james_tolentino_resume.pdf with zero dependencies.
 */

class MinimalPDF {
    private $objects = [];
    private $pageObjects = [];
    private $streamContent = '';

    public function addText($text, $x, $y, $size = 11, $font = 'F1', $r = 0, $g = 0, $b = 0) {
        $r = sprintf('%.3f', $r / 255);
        $g = sprintf('%.3f', $g / 255);
        $b = sprintf('%.3f', $b / 255);
        // Escape special PDF characters: (, ), \
        $escaped = str_replace(['\\', '(', ')'], ['\\\\', '\\(', '\\)'], $text);
        $this->streamContent .= "BT\n";
        $this->streamContent .= "/$font $size Tf\n";
        $this->streamContent .= "$r $g $b rg\n";
        $this->streamContent .= "1 0 0 1 $x $y Tm\n";
        $this->streamContent .= "($escaped) Tj\n";
        $this->streamContent .= "ET\n";
    }

    public function addLine($x1, $y1, $x2, $y2, $width = 1, $r = 100, $g = 116, $b = 139) {
        $r = sprintf('%.3f', $r / 255);
        $g = sprintf('%.3f', $g / 255);
        $b = sprintf('%.3f', $b / 255);
        $this->streamContent .= "$width w\n";
        $this->streamContent .= "$r $g $b RG\n";
        $this->streamContent .= "$x1 $y1 m\n";
        $this->streamContent .= "$x2 $y2 l\n";
        $this->streamContent .= "S\n";
    }

    public function addRect($x, $y, $w, $h, $r = 241, $g = 245, $b = 249) {
        $r = sprintf('%.3f', $r / 255);
        $g = sprintf('%.3f', $g / 255);
        $b = sprintf('%.3f', $b / 255);
        $this->streamContent .= "$r $g $b rg\n";
        $this->streamContent .= "$x $y $w $h re\n";
        $this->streamContent .= "f\n";
    }

    public function render() {
        $out = "%PDF-1.4\n%\xE2\xE3\xCF\xD3\n";
        $offsets = [];

        // 1: Catalog
        $offsets[1] = strlen($out);
        $out .= "1 0 obj\n<< /Type /Catalog /Pages 2 0 R >>\nendobj\n";

        // 2: Pages
        $offsets[2] = strlen($out);
        $out .= "2 0 obj\n<< /Type /Pages /Kids [3 0 R] /Count 1 >>\nendobj\n";

        // 3: Page (Letter / A4: 595 x 842 pt)
        $offsets[3] = strlen($out);
        $out .= "3 0 obj\n<< /Type /Page /Parent 2 0 R /MediaBox [0 0 595 842] /Contents 4 0 R /Resources << /Font << /F1 5 0 R /F2 6 0 R >> >> >>\nendobj\n";

        // 4: Stream Contents
        $streamLen = strlen($this->streamContent);
        $offsets[4] = strlen($out);
        $out .= "4 0 obj\n<< /Length $streamLen >>\nstream\n" . $this->streamContent . "\nendstream\nendobj\n";

        // 5: Font F1 (Helvetica)
        $offsets[5] = strlen($out);
        $out .= "5 0 obj\n<< /Type /Font /Subtype /Type1 /BaseFont /Helvetica >>\nendobj\n";

        // 6: Font F2 (Helvetica-Bold)
        $offsets[6] = strlen($out);
        $out .= "6 0 obj\n<< /Type /Font /Subtype /Type1 /BaseFont /Helvetica-Bold >>\nendobj\n";

        // XRef table
        $xrefOffset = strlen($out);
        $out .= "xref\n";
        $out .= "0 7\n";
        $out .= "0000000000 65535 f \n";
        for ($i = 1; $i <= 6; $i++) {
            $out .= sprintf("%010d 00000 n \n", $offsets[$i]);
        }
        $out .= "trailer\n<< /Size 7 /Root 1 0 R >>\n";
        $out .= "startxref\n$xrefOffset\n%%EOF";

        return $out;
    }
}

$pdf = new MinimalPDF();

// Header background accent
$pdf->addRect(40, 770, 515, 45, 238, 242, 255);

// Header details
$pdf->addText("KENNETH JAMES B. TOLENTINO", 50, 792, 18, 'F2', 15, 23, 42);
$pdf->addText("4th-Year BSIT Student | Aspiring IT Support Specialist & Systems Administrator", 50, 778, 10, 'F1', 79, 70, 229);

$pdf->addText("Location: Barangay Cupang, Muntinlupa City, Metro Manila, Philippines", 50, 755, 9, 'F1', 51, 65, 85);
$pdf->addText("LinkedIn: linkedin.com/in/kenneth-james-tolentino-b1217a442   |   GitHub: github.com/knnthjt", 50, 742, 9, 'F1', 51, 65, 85);
$pdf->addLine(40, 730, 555, 730, 1, 203, 213, 225);

// Professional Summary
$pdf->addText("PROFESSIONAL SUMMARY", 50, 712, 11, 'F2', 15, 23, 42);
$pdf->addLine(50, 707, 555, 707, 0.75, 226, 232, 240);
$pdf->addText("Detail-oriented 4th-year Bachelor of Science in Information Technology (BSIT) student at STI College Alabang", 50, 693, 9, 'F1', 51, 65, 85);
$pdf->addText("with hands-on competencies in computer systems servicing, network configuration and packet analysis,", 50, 681, 9, 'F1', 51, 65, 85);
$pdf->addText("Windows OS troubleshooting, and system documentation / QA testing.", 50, 669, 9, 'F1', 51, 65, 85);

// Certifications
$pdf->addText("CERTIFICATIONS", 50, 648, 11, 'F2', 15, 23, 42);
$pdf->addLine(50, 643, 555, 643, 0.75, 226, 232, 240);
$pdf->addText("TESDA National Certificate II (NC II) in Computer Systems Servicing", 50, 629, 9.5, 'F2', 15, 23, 42);
$pdf->addText("Technical Education and Skills Development Authority (TESDA)", 50, 617, 8.5, 'F1', 100, 116, 139);
$pdf->addText("- Certified in system installation, network/server setup, and hardware & software maintenance and repair.", 60, 606, 8.5, 'F1', 51, 65, 85);

$pdf->addText("Oracle Java Fundamentals Certification", 50, 589, 9.5, 'F2', 15, 23, 42);
$pdf->addText("Oracle Academy", 50, 577, 8.5, 'F1', 100, 116, 139);
$pdf->addText("- Core object-oriented programming, data structures, algorithms, and Java software development fundamentals.", 60, 566, 8.5, 'F1', 51, 65, 85);

// Education
$pdf->addText("EDUCATION", 50, 545, 11, 'F2', 15, 23, 42);
$pdf->addLine(50, 540, 555, 540, 0.75, 226, 232, 240);
$pdf->addText("Bachelor of Science in Information Technology (BSIT) - 4th Year Senior", 50, 526, 9.5, 'F2', 15, 23, 42);
$pdf->addText("STI College Alabang | 2023 - Present", 50, 514, 8.5, 'F1', 100, 116, 139);
$pdf->addText("Senior High School (SHS)", 50, 498, 9.5, 'F2', 15, 23, 42);
$pdf->addText("Cupang Senior High School | Graduated 2023", 50, 486, 8.5, 'F1', 100, 116, 139);

// Technical Skills
$pdf->addText("TECHNICAL SKILLS", 50, 465, 11, 'F2', 15, 23, 42);
$pdf->addLine(50, 460, 555, 460, 0.75, 226, 232, 240);
$pdf->addText("IT Support & Systems:", 50, 446, 9, 'F2', 15, 23, 42);
$pdf->addText("Computer Systems Servicing, Hardware Diagnostics & Repair, Windows Administration", 165, 446, 8.5, 'F1', 51, 65, 85);
$pdf->addText("(PowerShell, Command Prompt, DISM, SFC, diskpart), OS Installation & Configuration", 165, 434, 8.5, 'F1', 51, 65, 85);

$pdf->addText("Enterprise Systems:", 50, 416, 9, 'F2', 15, 23, 42);
$pdf->addText("SAP System Administration (Basic & Advanced ERP Navigation, User Profiles & Workflows)", 165, 416, 8.5, 'F1', 51, 65, 85);

$pdf->addText("Networking & Cloud:", 50, 396, 9, 'F2', 15, 23, 42);
$pdf->addText("AWS Cloud Fundamentals (VPC, EC2, RDS, S3), Network Protocols", 165, 396, 8.5, 'F1', 51, 65, 85);
$pdf->addText("(TCP/IP, DNS, DHCP, Subnetting, NAT, Port Forwarding)", 165, 384, 8.5, 'F1', 51, 65, 85);

$pdf->addText("Professional Skills:", 50, 362, 9, 'F2', 15, 23, 42);
$pdf->addText("Technical Documentation Writing, System QA Testing, Time Management, Adaptability", 165, 362, 8.5, 'F1', 51, 65, 85);

// Projects & Experience
$pdf->addText("PROJECTS & EXPERIENCE", 50, 340, 11, 'F2', 15, 23, 42);
$pdf->addLine(50, 335, 555, 335, 0.75, 226, 232, 240);

$pdf->addText("Lumina Library Management System (STI College Alabang Capstone)", 50, 320, 9.5, 'F2', 15, 23, 42);
$pdf->addText("Role: System Documentation & Quality Assurance (QA) Lead", 50, 308, 8.5, 'F1', 79, 70, 229);
$pdf->addText("- Authored formal system specifications, functional requirements matrices, and user role permission tables.", 60, 296, 8.5, 'F1', 51, 65, 85);
$pdf->addText("- Executed end-to-end integration and QR-scanning verification testing across student checkout cycles.", 60, 284, 8.5, 'F1', 51, 65, 85);

$pdf->addText("Barangay Alabang Pre-Blotter Reporting System", 50, 265, 9.5, 'F2', 15, 23, 42);
$pdf->addText("Role: System Analyst & Documentation", 50, 253, 8.5, 'F1', 79, 70, 229);
$pdf->addText("- Designed and documented a web-based local pre-blotter workflow and barangay kiosk reporting specification.", 60, 241, 8.5, 'F1', 51, 65, 85);

$pdf->addText("Custom Creator Web Platforms & Community Tools", 50, 222, 9.5, 'F2', 15, 23, 42);
$pdf->addText("Role: Freelance Developer", 50, 210, 8.5, 'F1', 79, 70, 229);
$pdf->addText("- Built responsive web pages and streaming tools using HTML, CSS, JavaScript, Next.js, and React.", 60, 198, 8.5, 'F1', 51, 65, 85);

$pdf->addText("3D Graphics & Unity Game Prototypes", 50, 179, 9.5, 'F2', 15, 23, 42);
$pdf->addText("Role: Interactive Systems Developer", 50, 167, 8.5, 'F1', 79, 70, 229);
$pdf->addText("- Built interactive 3D wireframe scene graphs in Python (PyOpenGL/Pygame) and 2D/3D mechanics in Unity (C#).", 60, 155, 8.5, 'F1', 51, 65, 85);

// Output file
$targetPath = __DIR__ . '/assets/kenneth_james_tolentino_resume.pdf';
file_put_contents($targetPath, $pdf->render());
echo "Resume generated at: " . $targetPath . " (" . filesize($targetPath) . " bytes)\n";
