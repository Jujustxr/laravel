<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $about['meta_title'] }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;1,300&family=Syne:wght@400;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

        :root {
            --bg:       #0a0a0a;
            --surface:  #111111;
            --border:   #1e1a1c;
            --accent:   #ff2d78;
            --accent2:  #ff6fa8;
            --text:     #f5f0f2;
            --muted:    #6b5d62;
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

        /* --- CORNER ACCENTS (from loading screen) --- */
        .corner {
            position: fixed;
            width: 20px; height: 20px;
            z-index: 200;
            pointer-events: none;
        }
        .corner.tl { top: 28px; left: 28px; border-top: 1px solid rgba(255,45,120,0.3); border-left: 1px solid rgba(255,45,120,0.3); }
        .corner.tr { top: 28px; right: 28px; border-top: 1px solid rgba(255,45,120,0.3); border-right: 1px solid rgba(255,45,120,0.3); }
        .corner.bl { bottom: 28px; left: 28px; border-bottom: 1px solid rgba(255,45,120,0.3); border-left: 1px solid rgba(255,45,120,0.3); }
        .corner.br { bottom: 28px; right: 28px; border-bottom: 1px solid rgba(255,45,120,0.3); border-right: 1px solid rgba(255,45,120,0.3); }

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
            border-bottom: 1px solid rgba(255,45,120,0.08);
            background: rgba(10,10,10,0.85);
        }

        .nav-logo {
            font-family: 'Cormorant Garamond', serif;
            font-weight: 400;
            font-style: italic;
            font-size: 22px;
            letter-spacing: 0.08em;
            color: var(--text);
            text-decoration: none;
        }

        .nav-logo span { color: var(--accent); font-style: normal; }

        .nav-links { display: flex; gap: 36px; list-style: none; }
        .nav-links a {
            color: var(--muted);
            text-decoration: none;
            font-size: 14px;
            font-weight: 300;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            font-size: 12px;
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
            width: 700px; height: 700px;
            background: radial-gradient(circle, rgba(255,45,120,0.08) 0%, transparent 70%);
            top: 50%; left: 50%;
            transform: translate(-50%, -50%);
            pointer-events: none;
            animation: pulse 5s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: translate(-50%, -50%) scale(1); opacity: 0.5; }
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
            font-size: 11px;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--accent);
            font-weight: 400;
            font-family: 'Montserrat', sans-serif;
            margin-bottom: 24px;
        }

        .hero-tag::before {
            content: '';
            width: 24px; height: 1px;
            background: var(--accent);
        }

        .hero-name {
            font-family: 'Syne', sans-serif;
            font-size: clamp(44px, 6vw, 76px);
            font-weight: 800;
            line-height: 1.0;
            letter-spacing: -2px;
            margin-bottom: 24px;
        }

        .hero-name .line2 {
            font-family: 'Cormorant Garamond', serif;
            font-weight: 300;
            font-style: italic;
            color: var(--accent);
            letter-spacing: 0.02em;
        }

        .hero-desc {
            color: var(--muted);
            font-size: 16px;
            font-weight: 300;
            line-height: 1.8;
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
            border-radius: 6px;
            font-family: 'DM Sans', sans-serif;
            font-size: 13px;
            font-weight: 400;
            letter-spacing: 0.06em;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.25s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-transform: uppercase;
        }

        .btn-primary {
            background: var(--accent);
            color: #fff;
            border: none;
        }
        .btn-primary:hover {
            background: #e8206a;
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(255,45,120,0.3);
        }

        .btn-outline {
            background: transparent;
            color: var(--text);
            border: 1px solid rgba(255,45,120,0.25);
        }
        .btn-outline:hover {
            border-color: var(--accent);
            color: var(--accent);
            transform: translateY(-2px);
        }

        /* --- HERO IMAGE --- */
        .hero-visual {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .avatar-wrap {
            position: relative;
            width: 320px; height: 320px;
        }

        .avatar-ring {
            position: absolute;
            inset: -20px;
            border-radius: 50%;
            border: 1px solid rgba(255,45,120,0.25);
            animation: spin 20s linear infinite;
        }

        .avatar-ring::after {
            content: '';
            position: absolute;
            width: 10px; height: 10px;
            background: var(--accent);
            border-radius: 50%;
            top: 22px; left: 50%;
            transform: translateX(-50%);
            box-shadow: 0 0 16px 4px rgba(255,45,120,0.6);
        }

        @keyframes spin { to { transform: rotate(360deg); } }

        .avatar-img {
            width: 100%; height: 100%;
            border-radius: 50%;
            background: var(--surface);
            border: 2px solid rgba(255,45,120,0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .avatar-img img {
            width: 100%; height: 100%;
            object-fit: cover;
        }

        .avatar-placeholder {
            font-family: 'Cormorant Garamond', serif;
            font-size: 96px;
            font-weight: 300;
            font-style: italic;
            color: var(--accent);
            opacity: 0.4;
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
            background: rgba(255,45,120,0.1);
            border: 1px solid rgba(255,45,120,0.12);
            border-radius: 16px;
            overflow: hidden;
        }

        .stat-item {
            background: var(--surface);
            padding: 36px 28px;
            text-align: center;
            transition: background 0.3s;
        }

        .stat-item:hover { background: #161010; }

        .stat-num {
            font-family: 'Cormorant Garamond', serif;
            font-size: 48px;
            font-weight: 300;
            font-style: italic;
            color: var(--accent);
            line-height: 1;
            margin-bottom: 8px;
        }

        .stat-label {
            font-size: 11px;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: 0.12em;
        }

        /* --- SECTIONS --- */
        section {
            max-width: 1100px;
            margin: 0 auto 100px;
            padding: 0 48px;
        }

        .section-label {
            font-family: 'DM Sans', sans-serif;
            font-size: 11px;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--accent);
            font-weight: 400;
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
            position: relative;
            overflow: hidden;
        }

        .skill-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--accent), transparent);
            opacity: 0;
            transition: opacity 0.3s;
        }

        .skill-card:hover {
            border-color: rgba(255,45,120,0.3);
            transform: translateY(-4px);
            box-shadow: 0 12px 40px rgba(255,45,120,0.1);
        }

        .skill-card:hover::before { opacity: 1; }

        .skill-name {
            font-family: 'Syne', sans-serif;
            font-weight: 700;
            font-size: 16px;
            margin-bottom: 10px;
            color: var(--text);
        }

        .skill-desc {
            font-size: 13px;
            color: var(--muted);
            line-height: 1.65;
        }

        .skill-bar-wrap {
            margin-top: 18px;
            background: var(--border);
            border-radius: 100px;
            height: 2px;
            overflow: hidden;
        }

        .skill-bar {
            height: 100%;
            background: linear-gradient(90deg, var(--accent), var(--accent2));
            border-radius: 100px;
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
            border-color: rgba(255,45,120,0.3);
            transform: translateY(-4px);
            box-shadow: 0 20px 60px rgba(255,45,120,0.08);
        }

        .project-thumb {
            height: 180px;
            background: linear-gradient(135deg, var(--surface), #1a0f14);
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
            background: linear-gradient(135deg, rgba(255,45,120,0.06), rgba(255,111,168,0.04));
        }

        .project-body { padding: 24px; }

        .project-tags {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
            margin-bottom: 12px;
        }

        .tag {
            font-size: 10px;
            padding: 4px 10px;
            border-radius: 100px;
            background: rgba(255,45,120,0.08);
            color: var(--accent);
            font-weight: 400;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            border: 1px solid rgba(255,45,120,0.15);
        }

        .project-title {
            font-family: 'Syne', sans-serif;
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .project-desc {
            font-size: 13px;
            color: var(--muted);
            line-height: 1.7;
        }

        /* --- CONTACT --- */
        .contact-wrap {
            background: var(--surface);
            border: 1px solid rgba(255,45,120,0.12);
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
            background: radial-gradient(ellipse at 50% 0%, rgba(255,45,120,0.07) 0%, transparent 60%);
            pointer-events: none;
        }

        /* decorative horizontal line inside contact */
        .contact-wrap::after {
            content: '';
            position: absolute;
            top: 0; left: 10%; right: 10%;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--accent), transparent);
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
            font-size: 15px;
            font-weight: 300;
            margin-bottom: 36px;
            letter-spacing: 0.02em;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .social-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            border-radius: 6px;
            border: 1px solid rgba(255,45,120,0.2);
            color: var(--muted);
            text-decoration: none;
            font-size: 13px;
            font-weight: 400;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            transition: all 0.25s ease;
        }

        .social-btn:hover {
            border-color: var(--accent);
            color: var(--accent);
            background: rgba(255,45,120,0.05);
            transform: translateY(-2px);
        }

        /* --- FOOTER --- */
        footer {
            border-top: 1px solid var(--border);
            padding: 32px 48px;
            text-align: center;
            color: var(--muted);
            font-size: 12px;
            letter-spacing: 0.08em;
        }

        footer span { color: var(--accent); }

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
            .corner { display: none; }
            .hero { padding: 100px 24px 60px; }
            .hero-inner { grid-template-columns: 1fr; gap: 40px; text-align: center; }
            .hero-visual { display: none; }
            .hero-cta { justify-content: center; }
            .stats-strip { grid-template-columns: repeat(2, 1fr); padding: 0 24px; }
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

    <!-- Corner accents (same as loading screen) -->
    <div class="corner tl"></div>
    <div class="corner tr"></div>
    <div class="corner bl"></div>
    <div class="corner br"></div>

    <!-- NAV -->
    <nav>
        <a href="#" class="nav-logo">{{ $about['nav']['logo_text'] }}<span>{{ $about['nav']['logo_accent'] }}</span></a>
        <ul class="nav-links">
            @foreach ($about['nav']['links'] as $navLink)
            <li><a href="{{ $navLink['href'] }}">{{ $navLink['label'] }}</a></li>
            @endforeach
        </ul>
        <a href="{{ $about['nav']['cta_href'] }}" class="btn btn-primary" style="padding: 10px 22px;">{{ $about['nav']['cta_label'] }}</a>
    </nav>

    <!-- HERO -->
    <div class="hero" id="about">
        <div class="hero-glow"></div>
        <div class="hero-inner">
            <div class="hero-text">
                <div class="hero-tag">{{ $about['hero']['tag'] }}</div>
                <h1 class="hero-name">
                    {{ $about['hero']['title_line_1'] }}<br>
                    <span class="line2">{{ $about['hero']['title_line_2'] }}</span>
                </h1>
                <p class="hero-desc">
                    {{ $about['hero']['description'] }}
                </p>
                <div class="hero-cta">
                    <a href="{{ $about['hero']['primary_cta_href'] }}" class="btn btn-primary">{{ $about['hero']['primary_cta_label'] }}</a>
                    <a href="{{ $about['hero']['secondary_cta_href'] }}" class="btn btn-outline">{{ $about['hero']['secondary_cta_label'] }}</a>
                </div>
            </div>
            <div class="hero-visual">
                <div class="avatar-wrap">
                    <div class="avatar-ring"></div>
                    <div class="avatar-img">
                        <img src="{{ asset('img/foto.jpeg') }}" alt="{{ $about['hero']['avatar_alt'] }}"
                             onerror="this.style.display='none'; document.querySelector('.avatar-placeholder').style.display='block'">
                        <span class="avatar-placeholder" style="display:none">{{ $about['hero']['avatar_initials'] }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- STATS -->
    <div class="stats-strip fade-up">
        @foreach ($about['stats'] as $stat)
        <div class="stat-item">
            <div class="stat-num">{{ $stat['number'] }}</div>
            <div class="stat-label">{{ $stat['label'] }}</div>
        </div>
        @endforeach
    </div>

<!-- SKILLS -->
<section id="skills">
    <div class="section-label fade-up">{{ $about['skills_section']['label'] }}</div>
    <h2 class="section-title fade-up">{{ $about['skills_section']['title_line_1'] }}<br>{{ $about['skills_section']['title_line_2'] }}</h2>
    <div class="skills-grid">
        @forelse ($skills as $skill)
        <div class="skill-card fade-up">
            <div class="skill-name">{{ $skill->name }}</div>
            <div class="skill-desc">{{ $skill->description }}</div>
            <div class="skill-bar-wrap">
                <div class="skill-bar" style="width: {{ $skill->level }}%"></div>
            </div>
        </div>
        @empty
        <div class="skill-card fade-up">
            <div class="skill-name">Belum Ada Data</div>
            <div class="skill-desc">Tambahkan data skill untuk menampilkan daftar keahlian.</div>
            <div class="skill-bar-wrap">
                <div class="skill-bar" style="width: 0%"></div>
            </div>
        </div>
        @endforelse
    </div>
</section>

<!-- PROJECTS -->
<section id="projects">
    <div class="section-label fade-up">{{ $about['projects_section']['label'] }}</div>
    <h2 class="section-title fade-up">{{ $about['projects_section']['title_line_1'] }}<br>{{ $about['projects_section']['title_line_2'] }}</h2>
    <div class="projects-grid">
        @forelse ($projects as $project)
        <div class="project-card fade-up">
            <div class="project-thumb">{{ $project->emoji }}</div>
            <div class="project-body">
                <div class="project-tags">
                    @foreach ($project->tags as $tag)
                        <span class="tag">{{ $tag }}</span>
                    @endforeach
                </div>
                <div class="project-title">{{ $project->title }}</div>
                <p class="project-desc">{{ $project->description }}</p>
            </div>
        </div>
        @empty
        <div class="project-card fade-up">
            <div class="project-thumb">—</div>
            <div class="project-body">
                <div class="project-tags">
                    <span class="tag">Kosong</span>
                </div>
                <div class="project-title">Belum Ada Project</div>
                <p class="project-desc">Tambahkan data project untuk menampilkan portfolio.</p>
            </div>
        </div>
        @endforelse
    </div>
</section>

    <!-- CONTACT -->
    <section id="contact">
        <div class="contact-wrap fade-up">
            <div class="section-label" style="justify-content: center; display: flex;">{{ $about['contact']['label'] }}</div>
            <h2 class="contact-title">{{ $about['contact']['title_line_1'] }}<br>{{ $about['contact']['title_line_2'] }}</h2>
            <p class="contact-sub">{{ $about['contact']['subtitle'] }}</p>
            <div class="social-links">
                @foreach ($about['contact']['social_links'] as $social)
                <a href="{{ $social['href'] }}" @if (str_starts_with($social['href'], 'http')) target="_blank" @endif class="social-btn">{{ $social['label'] }}</a>
                @endforeach
            </div>
        </div>
    </section>

    <footer>
        <p>© {{ date('Y') }} <span>{{ $about['footer_name'] }}</span>. All rights reserved.</p>
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

        // Scroll reveal
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