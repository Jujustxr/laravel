<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $about['meta_title'] }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;1,300&family=Syne:wght@400;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="@vite('resources/css/app.css')">
</head>
<body>

    <div class="cursor" id="cursor"></div>
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
                        <img src="{{ asset('img/foto.jpeg') }}" alt="{{ $about['hero']['avatar_alt'] }}">
                        <!-- <span class="avatar-placeholder" style="display:none">{{ $about['hero']['avatar_initials'] }}</span> -->
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