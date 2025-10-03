<?php
session_start();
$is_logged_in = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UniHelper</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <style>
        body {
            min-height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        nav {
      position: fixed;
      width: 100%;
      height: 100px;
      top: 0;
      left: 0;
      z-index: 10;
      background-color: rgba(0, 0, 0, 0.4);
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .nav-logo {
        display: flex;
        align-items: center;
        margin-left: 2vw;
        height: 100%;
    }
    .logo-img {
        height: 60px;
        width: auto;
        margin-right: 1.5vw;
        border-radius: 12px;
        background: #fff;
        box-shadow: 0 2px 8px rgba(31,38,135,0.10);
        padding: 4px;
    }
    nav ul.menu {
      list-style: none;
      margin: 0 2.5vw 0 0;
      padding: 0;
      display: flex;
      justify-content: flex-end;
      align-items: center;
    }
    nav ul.menu > li {
      position: relative;
      display: inline-block;
      text-align: center;
    }
    nav ul.menu > li > a {
      display: block;
      padding: 15px 20px;
      color: #fff;
      text-decoration: none;
      transition: 0.2s linear;
      font-size: 1.1rem;
    }
    nav ul.menu > li > a:hover {
      background: rgba(72, 207, 173, 0.2);
      color: #48cfad;
    }
    nav ul.menu > li ul {
      position: absolute;
      top: 100%;
      left: 0;
      width: 240px;
      display: none;
      background-color: rgba(0,0,0,0.95);
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
      border-radius: 0 0 8px 8px;
      padding: 0;
    }
    nav ul.menu > li:hover > ul {
      display: block;
    }
    nav ul.menu > li ul li {
      display: block;
      width: 100%;
      margin: 0;
      text-align: left;
    }
    nav ul.menu > li ul li a {
      display: block;
      padding: 12px 20px;
      color: #fff;
      text-decoration: none;
      font-size: 1rem;
      border-bottom: 1px solid rgba(255,255,255,0.08);
      transition: background 0.2s, color 0.2s;
    }
    nav ul.menu > li ul li a:hover {
      background: #48cfad;
      color: #222;
    }
    nav ul.menu > li:last-child {
      margin-right: 0;
    }
    @media (max-width: 900px) {
        nav {
            flex-direction: column;
            align-items: flex-start;
            height: auto;
        }
        .nav-logo {
            margin-left: 1vw;
        }
        .logo-img {
            height: 44px;
        }
        nav ul.menu {
            width: 100vw;
            margin: 0;
        }
        nav ul.menu > li {
        display: block;
        width: 100%;
      }
      nav ul.menu > li > a {
        width: 100%;
        padding: 18px 24px;
      }
      nav ul.menu > li ul {
        position: static;
        width: 100%;
        box-shadow: none;
        border-radius: 0;
      }
      nav ul.menu > li ul li a {
        padding-left: 36px;
      }
    }
        .navbar {
            width: 100%;
            background: rgba(30, 40, 80, 0.95);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.7rem 2rem;
            box-shadow: 0 2px 8px rgba(31, 38, 135, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        .nav-logo {
            display: flex;
            align-items: center;
            margin-left: 2vw;
            height: 100%;
        }
        .logo-img {
            height: 60px;
            width: auto;
            margin-right: 1.5vw;
            border-radius: 12px;
            background: #fff;
            box-shadow: 0 2px 8px rgba(31,38,135,0.10);
            padding: 4px;
        }
        .nav-links {
            list-style: none;
            display: flex;
            gap: 2rem;
            margin: 0;
            padding: 0;
            transition: right 0.3s;
        }
        .nav-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0,0,0,0.3);
            z-index: 150;
        }
        .nav-close {
            display: none;
            position: absolute;
            top: 1.2rem;
            right: 1.2rem;
            font-size: 2rem;
            color: #fff;
            cursor: pointer;
            z-index: 201;
        }
        .nav-links li a {
            color: #fff;
            text-decoration: none;
            font-size: 1.1rem;
            font-weight: 500;
            transition: color 0.2s;
        }
        .nav-links li a:hover {
            color: #6a11cb;
        }
        .nav-toggle {
            display: none;
            font-size: 2rem;
            color: #fff;
            cursor: pointer;
        }
        @media (max-width: 900px) {
            .nav-toggle {
                display: block;
            }
            .nav-links {
                position: fixed;
                top: 0;
                left: -100vw;
                height: 100vh;
                width: 80vw;
                max-width: 320px;
                min-width: 180px;
                background: rgba(30, 40, 80, 0.98);
                flex-direction: column;
                align-items: flex-start;
                padding: 3rem 1.5rem 2rem 1.5rem;
                gap: 2rem;
                box-shadow: 2px 0 8px rgba(31, 38, 135, 0.1);
                z-index: 200;
                transition: left 0.3s;
                overflow-y: auto;
            }
            .nav-links.open {
                left: 0;
            }
            .nav-close {
                display: block;
            }
            .nav-overlay.open {
                display: block;
            }
        }
        h1 {
            text-align: center;
            margin-top: 3rem;
            font-size: 2.5rem;
            letter-spacing: 2px;
        }
        p {
            text-align: center;
            font-size: 1.2rem;
            max-width: 700px;
            margin: 1.5rem auto 2.5rem auto;
            color: #e3e9f7;
        }
        .feature-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 2.5rem 2rem;
            margin: 2.5rem auto 0 auto;
            max-width: 1100px;
        }
        .feature-item {
            flex: 1 1 180px;
            max-width: 240px;
            min-width: 160px;
            display: flex;
            justify-content: center;
        }
        .container {
            position: relative;
            text-align: center;
            color: white;
            transition: transform .2s, filter .2s;
        }
        .container img {
            border-radius: 1.2rem;
            box-shadow: 0 4px 16px rgba(31,38,135,0.10);
            width: 100%;
            height: auto;
            max-width: 220px;
            max-height: 220px;
            object-fit: cover;
        }
        .container:hover {
            transform: scale(1.08);
        }
        .container img:hover {
            filter: brightness(20%);
        }
        .centered {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0;
            font-weight: bold;
            transition: opacity .2s;
            filter: brightness(1);
            color: #fff;
            text-shadow: 0 2px 8px #222;
            pointer-events: none;
        }
        .container:hover .centered {
            opacity: 1;
        }
        .hero-section {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            min-height: 60vh;
            background: linear-gradient(120deg, #6a11cb 0%, #2575fc 100%);
            border-radius: 0 0 2.5rem 2.5rem;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.10);
            margin-bottom: 2.5rem;
            padding: 2.5rem 1rem 2rem 1rem;
        }
        .hero-content {
            flex: 1 1 350px;
            max-width: 500px;
            color: #fff;
            padding: 2rem 2rem 2rem 1rem;
        }
        .hero-content h1 {
            font-size: 2.7rem;
            font-weight: 700;
            margin-bottom: 1.2rem;
            letter-spacing: 1px;
        }
        .hero-content p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            color: #e3e9f7;
        }
        .hero-btn {
            display: inline-block;
            background: #48cfad;
            color: #fff;
            font-weight: 600;
            padding: 0.9rem 2.2rem;
            border-radius: 2rem;
            font-size: 1.1rem;
            text-decoration: none;
            box-shadow: 0 2px 8px rgba(72, 207, 173, 0.15);
            transition: background 0.2s, color 0.2s;
        }
        .hero-btn:hover {
            background: #37bc9b;
            color: #fff;
        }
        .hero-illustration {
            flex: 1 1 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 220px;
            max-width: 400px;
            padding: 1rem;
        }
        .hero-img {
            width: 100%;
            max-width: 350px;
            border-radius: 1.5rem;
            box-shadow: 0 4px 24px rgba(31,38,135,0.10);
            background: #fff;
        }
        .feature-grid.modern {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 2.5rem 2rem;
            margin: 2.5rem auto 0 auto;
            max-width: 1100px;
        }
        .feature-item {
            background: rgba(255,255,255,0.08);
            border-radius: 1.2rem;
            box-shadow: 0 2px 12px rgba(31,38,135,0.08);
            padding: 2.2rem 1.5rem 1.5rem 1.5rem;
            flex: 1 1 200px;
            max-width: 260px;
            min-width: 180px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            transition: transform 0.18s, box-shadow 0.18s;
        }
        .feature-item:hover {
            transform: translateY(-8px) scale(1.04);
            box-shadow: 0 8px 32px rgba(72,207,173,0.13);
            background: rgba(72,207,173,0.13);
        }
        .feature-img {
            width: 110px;
            height: 110px;
            margin-bottom: 1.1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fff;
            border-radius: 50%;
            box-shadow: 0 2px 8px rgba(37,117,252,0.08);
            overflow: hidden;
        }
        .feature-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border: none;
            border-radius: 50%;
            display: block;
        }
        .feature-item h3 {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.7rem;
            color: #fff;
        }
        .feature-item p {
            color: #e3e9f7;
            font-size: 1rem;
            margin-bottom: 0;
        }
        @media (max-width: 900px) {
            .nav-logo {
                margin-left: 1vw;
            }
            .logo-img {
                height: 44px;
            }
            .hero-section {
                flex-direction: column;
                padding: 2rem 0.5rem 1.5rem 0.5rem;
            }
            .hero-content, .hero-illustration {
                max-width: 100%;
                padding: 1rem;
            }
            .feature-grid.modern {
                gap: 1.5rem 0.5rem;
            }
        }
        .feature-item.interactive {
        cursor: pointer;
        transition: transform 0.18s, box-shadow 0.18s, background 0.18s;
    }
    .feature-item.interactive.active {
        transform: scale(1.07) translateY(-10px);
        box-shadow: 0 12px 32px rgba(72,207,173,0.18);
        background: rgba(72,207,173,0.18);
    }
    .feature-item {
        opacity: 0;
        transform: translateY(30px);
    }
    #hero-title {
        min-height: 3.2rem;
        letter-spacing: 1px;
    }
    #hero-desc {
        opacity: 0;
    }
    .hero-section.professional {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        background: linear-gradient(120deg, #6a11cb 0%, #2575fc 100%);
        color: #fff;
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.10);
        border-radius: 0 0 2.5rem 2.5rem;
        margin-bottom: 2.5rem;
        padding: 2.5rem 1rem 2rem 1rem;
        opacity: 1;
        transition: opacity 1.2s;
    }
    .hero-content {
        flex: 1 1 350px;
        max-width: 500px;
        color: #fff;
        padding: 2rem 2rem 2rem 1rem;
    }
    .hero-section.professional .hero-content h1 {
        font-size: 2.7rem;
        font-weight: 700;
        margin-bottom: 1.2rem;
        letter-spacing: 1px;
        color: #fff;
        text-shadow: 0 2px 8px rgba(37,117,252,0.13);
    }
    .hero-section.professional .hero-content p {
        font-size: 1.2rem;
        margin-bottom: 2rem;
        color: #e3e9f7;
    }
    .hero-btn {
        background: #6a11cb;
        color: #fff;
        font-weight: 600;
        padding: 0.9rem 2.2rem;
        border-radius: 2rem;
        font-size: 1.1rem;
        text-decoration: none;
        box-shadow: 0 2px 8px rgba(72, 207, 173, 0.10);
        transition: background 0.2s, color 0.2s;
    }
    .hero-btn:hover {
        background: #2575fc;
        color: #fff;
    }
    .hero-illustration {
        flex: 1 1 300px;
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 220px;
        max-width: 400px;
        padding: 1rem;
    }
    .hero-img {
        width: 100%;
        max-width: 350px;
        border-radius: 1.5rem;
        box-shadow: 0 4px 24px rgba(31,38,135,0.10);
        background: #fff;
    }
    .feature-grid.professional {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 2.5rem 2rem;
        margin: 2.5rem auto 0 auto;
        max-width: 1100px;
    }
    .feature-item.professional {
        background: linear-gradient(120deg, #6a11cb 0%, #2575fc 100%);
        border-radius: 1.2rem;
        box-shadow: 0 2px 12px rgba(31,38,135,0.10);
        padding: 2.2rem 1.5rem 1.5rem 1.5rem;
        flex: 1 1 200px;
        max-width: 260px;
        min-width: 180px;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        transition: box-shadow 0.22s, transform 0.22s, background 0.22s;
        cursor: pointer;
        border: 1px solid #e3e9f7;
        opacity: 1;
        transform: translateY(0);
    }
    .feature-item.professional:hover {
        box-shadow: 0 8px 32px rgba(37,117,252,0.18);
        background: linear-gradient(120deg, #2575fc 0%, #6a11cb 100%);
        transform: translateY(-8px) scale(1.03);
    }
    .feature-img {
        width: 110px;
        height: 110px;
        margin-bottom: 1.1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #fff;
        border-radius: 50%;
        box-shadow: 0 2px 8px rgba(37,117,252,0.08);
        overflow: hidden;
    }
    .feature-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border: none;
        border-radius: 50%;
        display: block;
    }
    .feature-item.professional h3 {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 0.7rem;
        color: #fff;
        text-shadow: 0 2px 8px rgba(37,117,252,0.13);
    }
    .feature-item.professional p {
        color: #e3e9f7;
        font-size: 1rem;
        margin-bottom: 0;
    }
    @media (max-width: 900px) {
        .hero-section.professional {
            flex-direction: column;
            padding: 2rem 0.5rem 1.5rem 0.5rem;
        }
        .feature-grid.professional {
            gap: 1.5rem 0.5rem;
        }
    }
        </style>
    <!-- ...existing code... -->
</head>
<body>
    <nav>
        <div class="nav-logo">
            <img src="images/logo.png" alt="UniHelper Logo" class="logo-img">
        </div>
        <ul class="menu">
            <li><a href="index.php"><i class="fa fa-home"></i></a></li>
            <li class="sub-menu"><a href="#" class="protected-link">Administration <i class="fa fa-angle-down"></i></a>
                <ul>
                    <li><a href="administration/addsubjects/addsubjects.php" class="protected-link">Add Subjects</a></li>
                    <li><a href="administration/lecturelinks/lecturelinks.php" class="protected-link">Add Lecture Links</a></li>
                </ul>
            </li>
            <li><a href="administration/dailyplan/dailyplan.php" class="protected-link">Daily Plan</a></li>
            <li><a href="administration/monthlyprogress/monthlyprogress.php" class="protected-link">Monthly Progress</a></li>
            <li class="sub-menu"><a href="#" class="protected-link">Lecture <i class="fa fa-angle-down"></i></a>
                <ul>
                    <li><a href="administration/timetable/timetable.php" class="protected-link">Time Table</a></li>
                    <li><a href="administration/joinlecture/joinlecture.php" class="protected-link">Join Lecture</a></li>
                </ul>
            </li>
            <li><a href="profile.php" class="protected-link">Profile</a></li>
        </ul>
    </nav>
    <div class="hero-section professional">
        <div class="hero-content">
            <h1 id="hero-title">Welcome to UniHelper</h1>
            <p id="hero-desc">
                The modern platform to organize your academic life.<br>
                Track your progress, manage your schedule, and stay ahead—
                all in one elegant dashboard.
            </p>
            <?php if (!$is_logged_in): ?>
            <a href="login.php" class="hero-btn">Get Started</a>
            <?php endif; ?>
        </div>
        <div class="hero-illustration">
            <img src="https://images.unsplash.com/photo-1513258496099-48168024aec0?auto=format&fit=crop&w=600&q=80" alt="UniHelper Dashboard" class="hero-img">
        </div>
    </div>
    <div class="feature-grid modern professional">
        <div class="feature-item professional">
            <div class="feature-img">
                <img src="https://images.unsplash.com/photo-1464983953574-0892a716854b?auto=format&fit=crop&w=400&q=80" alt="Daily Plan">
            </div>
            <h3>Daily Plan</h3>
            <p>Stay on top of your daily tasks and never miss a deadline.</p>
        </div>
        <div class="feature-item professional">
            <div class="feature-img">
                <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=400&q=80" alt="Monthly Progress">
            </div>
            <h3>Monthly Progress</h3>
            <p>Visualize your academic achievements and track your growth.</p>
        </div>
        <div class="feature-item professional">
            <div class="feature-img">
                <img src="https://images.unsplash.com/photo-1517520287167-4bbf64a00d66?auto=format&fit=crop&w=400&q=80" alt="Lectures">
            </div>
            <h3>Lectures</h3>
            <p>Access lecture links, join sessions, and manage your timetable.</p>
        </div>
        <div class="feature-item professional">
            <div class="feature-img">
                <img src="https://images.unsplash.com/photo-1465101046530-73398c7f28ca?auto=format&fit=crop&w=400&q=80" alt="Administration">
            </div>
            <h3>Administration</h3>
            <p>Manage subjects, add lecture links, and customize your experience.</p>
        </div>
    </div>
    <div id="tooltip" class="tooltip"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        // Protect all .protected-link links if not logged in
        <?php if (!$is_logged_in): ?>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.protected-link').forEach(function(link) {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    window.location.href = 'login.php';
                });
            });
        });
        <?php endif; ?>
        // Hamburger menu toggle and overlay
        document.addEventListener('DOMContentLoaded', function() {
            var navToggle = document.getElementById('nav-toggle');
            var navLinks = document.getElementById('nav-links');
            var navOverlay = document.getElementById('nav-overlay');
            var navClose = document.getElementById('nav-close');
            function closeMenu() {
                navLinks.classList.remove('open');
                navOverlay.classList.remove('open');
            }
            navToggle.addEventListener('click', function() {
                navLinks.classList.toggle('open');
                navOverlay.classList.toggle('open');
            });
            navOverlay.addEventListener('click', closeMenu);
            navClose.addEventListener('click', closeMenu);
        });
        function removeSpecialCharacters(input) {
            input.value = input.value.replace(/[^a-zA-Z0-9 /.\n\r :+-=]/g, '');
        }

        // Typing animation for hero title
    const heroTitle = document.getElementById('hero-title');
    const fullText = 'Welcome to UniHelper';
    let idx = 0;
    heroTitle.textContent = '';
    function typeTitle() {
        if (idx < fullText.length) {
            heroTitle.textContent += fullText.charAt(idx);
            idx++;
            setTimeout(typeTitle, 60);
        }
    }
    window.addEventListener('DOMContentLoaded', typeTitle);

    // Fade-in animation for hero description
    const heroDesc = document.getElementById('hero-desc');
    heroDesc.style.opacity = 0;
    setTimeout(() => {
        heroDesc.style.transition = 'opacity 1.2s';
        heroDesc.style.opacity = 1;
    }, 1200);

    // Interactive feature cards: pop effect and tooltip
    document.querySelectorAll('.feature-item.interactive').forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.classList.add('active');
        });
        card.addEventListener('mouseleave', () => {
            card.classList.remove('active');
        });
        card.addEventListener('click', () => {
            alert('Feature: ' + card.querySelector('h3').textContent);
        });
    });
    // Entrance animation for feature grid
    window.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.feature-item').forEach((el, i) => {
            el.style.opacity = 0;
            setTimeout(() => {
                el.style.transition = 'opacity 0.7s, transform 0.7s';
                el.style.opacity = 1;
                el.style.transform = 'translateY(0)';
            }, 1500 + i * 200);
        });
    });
    // Fade-in animation for hero section
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('.hero-section').style.opacity = 0;
        setTimeout(() => {
            document.querySelector('.hero-section').style.transition = 'opacity 1.2s';
            document.querySelector('.hero-section').style.opacity = 1;
        }, 200);
        // Feature card entrance
        document.querySelectorAll('.feature-item.professional').forEach((el, i) => {
            el.style.opacity = 0;
            el.style.transform = 'translateY(30px)';
            setTimeout(() => {
                el.style.transition = 'opacity 0.7s, transform 0.7s';
                el.style.opacity = 1;
                el.style.transform = 'translateY(0)';
            }, 800 + i * 180);
        });
    });
    // Tooltip for feature cards
    const tooltip = document.getElementById('tooltip');
    document.querySelectorAll('.feature-item.professional').forEach(card => {
        card.addEventListener('mouseenter', e => {
            tooltip.textContent = card.getAttribute('data-tooltip');
            tooltip.style.display = 'block';
            const rect = card.getBoundingClientRect();
            tooltip.style.left = rect.left + window.scrollX + rect.width/2 - tooltip.offsetWidth/2 + 'px';
            tooltip.style.top = rect.top + window.scrollY - 38 + 'px';
        });
        card.addEventListener('mousemove', e => {
            tooltip.style.left = e.pageX - tooltip.offsetWidth/2 + 'px';
        });
        card.addEventListener('mouseleave', () => {
            tooltip.style.display = 'none';
        });
    });
    </script>
</body>
</html>