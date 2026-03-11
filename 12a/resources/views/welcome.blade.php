<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juli Ayu Audia</title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;1,300&family=Montserrat:wght@100;200;300&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        :root {
            --black: #0a0a0a;
            --pink: #ff2d78;
            --pink-soft: #ff6fa8;
            --white: #f5f0f2;
        }

        body {
            background: var(--black);
            color: var(--white);
            font-family: 'Montserrat', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        body::before {
            content: '';
            position: fixed;
            width: 700px; height: 700px;
            background: radial-gradient(circle, rgba(255,45,120,0.06) 0%, transparent 70%);
            top: 50%; left: 50%;
            transform: translate(-50%, -50%);
            pointer-events: none;
        }

        /* Corner accents */
        .corner {
            position: fixed;
            width: 20px; height: 20px;
            opacity: 0;
            animation: fadeIn 0.6s ease forwards 0.8s;
        }
        .corner.tl { top: 28px; left: 28px; border-top: 1px solid var(--pink); border-left: 1px solid var(--pink); }
        .corner.tr { top: 28px; right: 28px; border-top: 1px solid var(--pink); border-right: 1px solid var(--pink); }
        .corner.bl { bottom: 28px; left: 28px; border-bottom: 1px solid var(--pink); border-left: 1px solid var(--pink); }
        .corner.br { bottom: 28px; right: 28px; border-bottom: 1px solid var(--pink); border-right: 1px solid var(--pink); }

        #loading-screen {
            position: fixed; inset: 0;
            background: var(--black);
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #loading-screen.hide {
            animation: screenFadeOut 0.9s ease forwards;
            pointer-events: none;
        }

        .loader-wrapper {
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 40px;
            opacity: 0;
            animation: fadeIn 1s ease forwards 0.3s;
        }

        .deco-line {
            width: 1px; height: 0;
            background: linear-gradient(to bottom, transparent, var(--pink), transparent);
            animation: lineGrow 1.2s ease forwards 0.5s;
            margin-bottom: -20px;
        }

        .deco-line-bottom {
            width: 1px; height: 0;
            background: linear-gradient(to bottom, var(--pink), transparent);
            animation: lineGrow 1.2s ease forwards 1s;
            margin-top: -20px;
        }

        .name-block {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 6px;
        }

        .greeting {
            font-family: 'Montserrat', sans-serif;
            font-weight: 100;
            font-size: 0.65rem;
            letter-spacing: 0.5em;
            color: var(--pink);
            text-transform: uppercase;
            opacity: 0;
            transform: translateY(8px);
            animation: riseIn 0.8s ease forwards 1s;
        }

        .name {
            font-family: 'Cormorant Garamond', serif;
            font-weight: 300;
            font-size: clamp(3rem, 9vw, 5.5rem);
            letter-spacing: 0.12em;
            color: var(--white);
            line-height: 1;
            opacity: 0;
            transform: translateY(12px);
            animation: riseIn 1s ease forwards 1.2s;
        }

        .name span { color: var(--pink); font-style: italic; }

        .tagline {
            font-family: 'Montserrat', sans-serif;
            font-weight: 100;
            font-size: 0.6rem;
            letter-spacing: 0.4em;
            color: rgba(245, 240, 242, 0.35);
            text-transform: uppercase;
            opacity: 0;
            animation: riseIn 0.8s ease forwards 1.6s;
        }

        .progress-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 14px;
            opacity: 0;
            animation: riseIn 0.8s ease forwards 1.8s;
        }

        .progress-track {
            width: 180px; height: 1px;
            background: rgba(255, 45, 120, 0.15);
            position: relative;
        }

        .progress-fill {
            height: 100%;
            width: 0%;
            background: linear-gradient(to right, var(--pink), var(--pink-soft));
            animation: progressFill 2.5s cubic-bezier(0.4, 0, 0.2, 1) forwards 2.2s;
            position: relative;
        }

        .progress-fill::after {
            content: '';
            position: absolute;
            right: -3px; top: 50%;
            transform: translateY(-50%);
            width: 5px; height: 5px;
            border-radius: 50%;
            background: var(--pink-soft);
            box-shadow: 0 0 8px 2px var(--pink);
            opacity: 0;
            animation: fadeIn 0.3s ease forwards 2.4s;
        }

        .progress-percent {
            font-size: 0.55rem;
            font-weight: 200;
            letter-spacing: 0.3em;
            color: rgba(255, 45, 120, 0.6);
            font-variant-numeric: tabular-nums;
        }

        @keyframes fadeIn    { to { opacity: 1; } }
        @keyframes lineGrow  { to { height: 60px; } }
        @keyframes riseIn    { to { opacity: 1; transform: translateY(0); } }
        @keyframes progressFill {
            0%   { width: 0%; }
            60%  { width: 75%; }
            100% { width: 100%; }
        }
        @keyframes screenFadeOut {
            0%   { opacity: 1; }
            100% { opacity: 0; visibility: hidden; }
        }
    </style>
</head>
<body>

<div id="loading-screen">
    <div class="corner tl"></div>
    <div class="corner tr"></div>
    <div class="corner bl"></div>
    <div class="corner br"></div>

    <div class="loader-wrapper">
        <div class="deco-line"></div>

        <div class="name-block">
            <p class="greeting">Portfolio</p>
            <h1 class="name">Juli <span>Ayu</span> Audia</h1>
            <p class="tagline">Frontend Developer &nbsp;·&nbsp; UI/UX &nbsp;·&nbsp; Security</p>
        </div>

        <div class="progress-container">
            <div class="progress-track">
                <div class="progress-fill" id="progressFill"></div>
            </div>
            <span class="progress-percent" id="percentText">0%</span>
        </div>

        <div class="deco-line-bottom"></div>
    </div>
</div>

<script>
    const percentText = document.getElementById('percentText');
    const loadingScreen = document.getElementById('loading-screen');

    let current = 0;
    const startDelay = 2200;
    const duration = 2500;
    const interval = 30;
    const steps = duration / interval;
    const increment = 100 / steps;

    setTimeout(() => {
        const timer = setInterval(() => {
            current = Math.min(current + increment, 100);
            percentText.textContent = Math.floor(current) + '%';

            if (current >= 100) {
                clearInterval(timer);
                percentText.textContent = '100%';

                setTimeout(() => {
                    loadingScreen.classList.add('hide');
                    setTimeout(() => {
                        // Redirect ke halaman about/portfolio
                        window.location.href = '{{ route("about") }}';
                    }, 900);
                }, 400);
            }
        }, interval);
    }, startDelay);
</script>

</body>
</html>