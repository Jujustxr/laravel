<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Me</title>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

        :root {
            --bg: #0a0a0f;
            --surface: #13131a;
            --border: #1e1e2e;
            --accent: #7c6aff;
            --accent2: #ff6a6a;
            --text: #e8e8f0;
            --muted: #6b6b80;
        }

        html { scroll-behavior: smooth; }

        body {
            background: var(--bg);
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            font-size: 16px;
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* --- CURSOR --- */
        .cursor {
            width: 12px; height: 12px;
            background: var(--accent);
            border-radius: 50%;
            position: fixed;
            pointer-events: none;
            z-index: 9999;
            transition: transform 0.15s ease;
            mix-blend-mode: screen;
        }

        /* --- NOISE OVERLAY --- */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 1000;
            opacity: 0.4;
        }

        /* --- NAV --- */
        nav {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 100;
            padding: 24px 48px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255,255,255,0.04);
            background: rgba(10,10,15,0.8);
        }

        .nav-logo {
            font-family: 'Syne', sans-serif;
            font-weight: 800;
            font-size: 20px;
            letter-spacing: -0.5px;
            color: var(--text);
            text-decoration: none;
        }

        .nav-logo span { color: var(--accent); }

        .nav-links { display: flex; gap: 36px; list-style: none; }
        .nav-links a {
            color: var(--muted);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 0.02em;
            transition: color 0.2s;
        }
        .nav-links a:hover { color: var(--text); }

        /* --- HERO --- */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 120px 48px 80px;
            position: relative;
            overflow: hidden;
        }

        .hero-glow {
            position: absolute;
            width: 600px; height: 600px;
            background: radial-gradient(circle, rgba(124,106,255,0.15) 0%, transparent 70%);
            top: 50%; left: 50%;
            transform: translate(-50%, -50%);
            pointer-events: none;
            animation: pulse 4s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: translate(-50%, -50%) scale(1); opacity: 0.6; }
            50% { transform: translate(-50%, -50%) scale(1.2); opacity: 1; }
        }

        .hero-inner {
            max-width: 1100px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .hero-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 12px;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--accent);
            font-weight: 600;
            margin-bottom: 24px;
        }

        .hero-tag::before {
            content: '';
            width: 24px; height: 1px;
            background: var(--accent);
        }

        .hero-name {
            font-family: 'Syne', sans-serif;
            font-size: clamp(48px, 6vw, 80px);
            font-weight: 800;
            line-height: 1.0;
            letter-spacing: -2px;
            margin-bottom: 24px;
        }

        .hero-name .line2 { color: var(--accent); }

        .hero-desc {
            color: var(--muted);
            font-size: 17px;
            font-weight: 300;
            line-height: 1.75;
            margin-bottom: 40px;
            max-width: 480px;
        }

        .hero-cta {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 14px 28px;
            border-radius: 8px;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.25s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background: var(--accent);
            color: #fff;
            border: none;
        }
        .btn-primary:hover { background: #6a58ef; transform: translateY(-2px); box-shadow: 0 8px 30px rgba(124,106,255,0.3); }

        .btn-outline {
            background: transparent;
            color: var(--text);
            border: 1px solid var(--border);
        }
        .btn-outline:hover { border-color: var(--accent); color: var(--accent); transform: translateY(-2px); }

        /* --- HERO IMAGE --- */
        .hero-visual {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .avatar-wrap {
            position: relative;
            width: 340px; height: 340px;
        }

        .avatar-ring {
            position: absolute;
            inset: -20px;
            border-radius: 50%;
            border: 1px solid rgba(124,106,255,0.3);
            animation: spin 20s linear infinite;
        }

        .avatar-ring::after {
            content: '';
            position: absolute;
            width: 12px; height: 12px;
            background: var(--accent);
            border-radius: 50%;
            top: 20px; left: 50%;
            transform: translateX(-50%);
            box-shadow: 0 0 20px var(--accent);
        }

        @keyframes spin { to { transform: rotate(360deg); } }

        .avatar-img {
            width: 100%; height: 100%;
            border-radius: 50%;
            background: var(--surface);
            border: 3px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .avatar-placeholder {
            font-family: 'Syne', sans-serif;
            font-size: 96px;
            font-weight: 800;
            color: var(--accent);
            opacity: 0.6;
            user-select: none;
        }

        /* --- STATS --- */
        .stats-strip {
            max-width: 1100px;
            margin: 0 auto 100px;
            padding: 0 48px;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1px;
            background: var(--border);
            border: 1px solid var(--border);
            border-radius: 16px;
            overflow: hidden;
        }

        .stat-item {
            background: var(--surface);
            padding: 36px 28px;
            text-align: center;
        }

        .stat-num {
            font-family: 'Syne', sans-serif;
            font-size: 42px;
            font-weight: 800;
            color: var(--accent);
            line-height: 1;
            margin-bottom: 8px;
        }

        .stat-label {
            font-size: 13px;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }

        /* --- SECTIONS --- */
        section {
            max-width: 1100px;
            margin: 0 auto 100px;
            padding: 0 48px;
        }

        .section-label {
            font-family: 'Syne', sans-serif;
            font-size: 12px;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: var(--accent);
            font-weight: 600;
            margin-bottom: 16px;
        }

        .section-title {
            font-family: 'Syne', sans-serif;
            font-size: clamp(28px, 3vw, 42px);
            font-weight: 800;
            letter-spacing: -1px;
            margin-bottom: 48px;
            line-height: 1.1;
        }

        /* --- SKILLS --- */
        .skills-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
        }

        .skill-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 28px;
            transition: all 0.3s ease;
            cursor: default;
        }

        .skill-card:hover {
            border-color: var(--accent);
            transform: translateY(-4px);
            box-shadow: 0 12px 40px rgba(124,106,255,0.15);
        }

        .skill-icon {
            font-size: 28px;
            margin-bottom: 16px;
            display: block;
        }

        .skill-name {
            font-family: 'Syne', sans-serif;
            font-weight: 700;
            font-size: 16px;
            margin-bottom: 8px;
        }

        .skill-desc {
            font-size: 13px;
            color: var(--muted);
            line-height: 1.6;
        }

        .skill-bar-wrap {
            margin-top: 16px;
            background: var(--border);
            border-radius: 100px;
            height: 3px;
            overflow: hidden;
        }

        .skill-bar {
            height: 100%;
            background: linear-gradient(90deg, var(--accent), var(--accent2));
            border-radius: 100px;
            transition: width 1s ease;
        }

        /* --- PROJECTS --- */
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .project-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .project-card:hover {
            border-color: rgba(124,106,255,0.5);
            transform: translateY(-4px);
            box-shadow: 0 20px 60px rgba(0,0,0,0.4);
        }

        .project-thumb {
            height: 180px;
            background: linear-gradient(135deg, var(--surface), var(--border));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 48px;
            border-bottom: 1px solid var(--border);
            position: relative;
            overflow: hidden;
        }

        .project-thumb::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(124,106,255,0.08), rgba(255,106,106,0.08));
        }

        .project-body { padding: 24px; }

        .project-tags {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
            margin-bottom: 12px;
        }

        .tag {
            font-size: 11px;
            padding: 4px 10px;
            border-radius: 100px;
            background: rgba(124,106,255,0.1);
            color: var(--accent);
            font-weight: 500;
            letter-spacing: 0.04em;
        }

        .project-title {
            font-family: 'Syne', sans-serif;
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .project-desc {
            font-size: 14px;
            color: var(--muted);
            line-height: 1.65;
        }

        /* --- CONTACT --- */
        .contact-wrap {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 24px;
            padding: 60px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .contact-wrap::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse at 50% 0%, rgba(124,106,255,0.1) 0%, transparent 60%);
            pointer-events: none;
        }

        .contact-title {
            font-family: 'Syne', sans-serif;
            font-size: clamp(32px, 4vw, 52px);
            font-weight: 800;
            letter-spacing: -1.5px;
            margin-bottom: 16px;
        }

        .contact-sub {
            color: var(--muted);
            font-size: 16px;
            margin-bottom: 36px;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 16px;
            flex-wrap: wrap;
        }

        .social-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            border-radius: 8px;
            border: 1px solid var(--border);
            color: var(--text);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.25s ease;
        }

        .social-btn:hover {
            border-color: var(--accent);
            color: var(--accent);
            background: rgba(124,106,255,0.06);
            transform: translateY(-2px);
        }

        /* --- FOOTER --- */
        footer {
            border-top: 1px solid var(--border);
            padding: 32px 48px;
            text-align: center;
            color: var(--muted);
            font-size: 13px;
        }

        /* --- ANIMATIONS --- */
        .fade-up {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }
        .fade-up.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* --- RESPONSIVE --- */
        @media (max-width: 768px) {
            nav { padding: 20px 24px; }
            .nav-links { display: none; }
            .hero { padding: 100px 24px 60px; }
            .hero-inner { grid-template-columns: 1fr; gap: 40px; text-align: center; }
            .hero-visual { display: none; }
            .hero-cta { justify-content: center; }
            .stats-strip { grid-template-columns: repeat(2, 1fr); }
            section { padding: 0 24px; }
            .skills-grid { grid-template-columns: 1fr; }
            .projects-grid { grid-template-columns: 1fr; }
            .contact-wrap { padding: 40px 24px; }
            footer { padding: 24px; }
        }
    </style>
</head>
<body>

    <div class="cursor" id="cursor"></div>

    <!-- NAV -->
    <nav>
        <a href="#" class="nav-logo">porto<span>.</span></a>
        <ul class="nav-links">
            <li><a href="#about">About</a></li>
            <li><a href="#skills">Skills</a></li>
            <li><a href="#projects">Projects</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
        <a href="#contact" class="btn btn-primary" style="padding: 10px 22px; font-size: 13px;">Hire Me →</a>
    </nav>

    <!-- HERO -->
    <div class="hero" id="about">
        <div class="hero-inner">
            <div class="hero-text">
                <div class="hero-tag">Available for Work</div>
                <h1 class="hero-name">
                    Halo, Saya<br>
                    <span class="line2">Nama Kamu</span>
                </h1>
                <p class="hero-desc">
                    Full-stack developer yang bersemangat membangun pengalaman digital yang bermakna.
                    Spesialisasi di Laravel, Vue.js, dan desain UI/UX yang berpusat pada pengguna.
                </p>
                <div class="hero-cta">
                    <a href="#projects" class="btn btn-primary">Lihat Project ↓</a>
                    <a href="#contact" class="btn btn-outline">Hubungi Saya</a>
                </div>
            </div>
            <div class="hero-visual">
                <div class="avatar-wrap">
                    <div class="avatar-ring"></div>
                    <div class="avatar-img">
                        {{-- Ganti dengan: <img src="{{ asset('img/foto.jpg') }}" alt="Foto Profil"> --}}
                        <span class="avatar-placeholder">NK</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- STATS -->
    <div class="stats-strip fade-up">
        <div class="stat-item">
            <div class="stat-num">2+</div>
            <div class="stat-label">Tahun Pengalaman</div>
        </div>
        <div class="stat-item">
            <div class="stat-num">20+</div>
            <div class="stat-label">Project Selesai</div>
        </div>
        <div class="stat-item">
            <div class="stat-num">15+</div>
            <div class="stat-label">Klien Puas</div>
        </div>
        <div class="stat-item">
            <div class="stat-num">∞</div>
            <div class="stat-label">Semangat Belajar</div>
        </div>
    </div>

    <!-- SKILLS -->
    <section id="skills">
        <div class="section-label fade-up">Keahlian</div>
        <h2 class="section-title fade-up">Tech Stack &<br>Kemampuan Saya</h2>
        <div class="skills-grid">
            <div class="skill-card fade-up">
                <span class="skill-icon">🐘</span>
                <div class="skill-name">Laravel / PHP</div>
                <div class="skill-desc">Backend development dengan Laravel, REST API, Eloquent ORM, dan Blade templating.</div>
                <div class="skill-bar-wrap"><div class="skill-bar" style="width: 85%"></div></div>
            </div>
            <div class="skill-card fade-up">
                <span class="skill-icon">💚</span>
                <div class="skill-name">Vue.js / JavaScript</div>
                <div class="skill-desc">Frontend interaktif dengan Vue 3 Composition API, Pinia, dan Vite.</div>
                <div class="skill-bar-wrap"><div class="skill-bar" style="width: 78%"></div></div>
            </div>
            <div class="skill-card fade-up">
                <span class="skill-icon">🗄️</span>
                <div class="skill-name">Database</div>
                <div class="skill-desc">MySQL, PostgreSQL, query optimization, dan database design yang efisien.</div>
                <div class="skill-bar-wrap"><div class="skill-bar" style="width: 80%"></div></div>
            </div>
            <div class="skill-card fade-up">
                <span class="skill-icon">🎨</span>
                <div class="skill-name">UI/UX Design</div>
                <div class="skill-desc">Figma, Tailwind CSS, desain yang responsif dan berpusat pada pengalaman pengguna.</div>
                <div class="skill-bar-wrap"><div class="skill-bar" style="width: 70%"></div></div>
            </div>
            <div class="skill-card fade-up">
                <span class="skill-icon">🐋</span>
                <div class="skill-name">DevOps</div>
                <div class="skill-desc">Docker, Git, CI/CD pipeline, dan deployment ke VPS atau cloud server.</div>
                <div class="skill-bar-wrap"><div class="skill-bar" style="width: 65%"></div></div>
            </div>
            <div class="skill-card fade-up">
                <span class="skill-icon">📱</span>
                <div class="skill-name">Mobile (Flutter)</div>
                <div class="skill-desc">Pengembangan aplikasi mobile cross-platform dengan Flutter dan Dart.</div>
                <div class="skill-bar-wrap"><div class="skill-bar" style="width: 60%"></div></div>
            </div>
        </div>
    </section>

    <!-- PROJECTS -->
    <section id="projects">
        <div class="section-label fade-up">Portfolio</div>
        <h2 class="section-title fade-up">Project yang<br>Pernah Saya Buat</h2>
        <div class="projects-grid">
            <div class="project-card fade-up">
                <div class="project-thumb">🛒</div>
                <div class="project-body">
                    <div class="project-tags">
                        <span class="tag">Laravel</span>
                        <span class="tag">Vue.js</span>
                        <span class="tag">MySQL</span>
                    </div>
                    <div class="project-title">E-Commerce Platform</div>
                    <p class="project-desc">Platform belanja online dengan fitur manajemen produk, keranjang belanja, payment gateway, dan dashboard admin lengkap.</p>
                </div>
            </div>
            <div class="project-card fade-up">
                <div class="project-thumb">📊</div>
                <div class="project-body">
                    <div class="project-tags">
                        <span class="tag">Laravel</span>
                        <span class="tag">Tailwind</span>
                        <span class="tag">Chart.js</span>
                    </div>
                    <div class="project-title">Sistem Manajemen Inventory</div>
                    <p class="project-desc">Aplikasi pengelolaan stok barang dengan laporan real-time, notifikasi stok menipis, dan ekspor data ke Excel/PDF.</p>
                </div>
            </div>
            <div class="project-card fade-up">
                <div class="project-thumb">🎓</div>
                <div class="project-body">
                    <div class="project-tags">
                        <span class="tag">Laravel</span>
                        <span class="tag">Livewire</span>
                        <span class="tag">Alpine.js</span>
                    </div>
                    <div class="project-title">Platform E-Learning</div>
                    <p class="project-desc">Sistem pembelajaran online dengan manajemen kursus, video streaming, kuis interaktif, dan sertifikat otomatis.</p>
                </div>
            </div>
            <div class="project-card fade-up">
                <div class="project-thumb">📱</div>
                <div class="project-body">
                    <div class="project-tags">
                        <span class="tag">Flutter</span>
                        <span class="tag">Laravel API</span>
                        <span class="tag">Firebase</span>
                    </div>
                    <div class="project-title">Aplikasi Point of Sale</div>
                    <p class="project-desc">Aplikasi kasir mobile untuk UMKM dengan fitur scan barcode, laporan penjualan, dan sinkronisasi cloud real-time.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTACT -->
    <section id="contact">
        <div class="contact-wrap fade-up">
            <div class="section-label" style="justify-content: center; display: flex;">Kontak</div>
            <h2 class="contact-title">Mari Bekerja<br>Sama! 🤝</h2>
            <p class="contact-sub">Terbuka untuk peluang freelance, kolaborasi, atau sekadar ngobrol soal teknologi.</p>
            <div class="social-links">
                <a href="mailto:email@example.com" class="social-btn">
                    <span>✉️</span> Email
                </a>
                <a href="https://github.com/username" target="_blank" class="social-btn">
                    <span>🐙</span> GitHub
                </a>
                <a href="https://linkedin.com/in/username" target="_blank" class="social-btn">
                    <span>💼</span> LinkedIn
                </a>
                <a href="https://instagram.com/username" target="_blank" class="social-btn">
                    <span>📸</span> Instagram
                </a>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer>
        <p>© {{ date('Y') }} Nama Kamu — Dibuat dengan ❤️ menggunakan Laravel</p>
    </footer>

    <script>
        // Custom cursor
        const cursor = document.getElementById('cursor');
        document.addEventListener('mousemove', e => {
            cursor.style.left = e.clientX - 6 + 'px';
            cursor.style.top = e.clientY - 6 + 'px';
        });
        document.querySelectorAll('a, button, .skill-card, .project-card').forEach(el => {
            el.addEventListener('mouseenter', () => cursor.style.transform = 'scale(3)');
            el.addEventListener('mouseleave', () => cursor.style.transform = 'scale(1)');
        });

        // Scroll animations
        const observer = new IntersectionObserver(entries => {
            entries.forEach((entry, i) => {
                if (entry.isIntersecting) {
                    setTimeout(() => entry.target.classList.add('visible'), i * 80);
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.fade-up').forEach(el => observer.observe(el));
    </script>
</body>
</html>