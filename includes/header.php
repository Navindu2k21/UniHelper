<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <style>
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
            transition: top 0.35s cubic-bezier(.4,0,.2,1);
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
        nav.hide-on-scroll {
            top: -110px;
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
    }
    </style>
</head>
<body>
<button class="header-toggle-btn" id="headerToggleBtn" title="Hide/Show Header" style="position: fixed; top: 110px; right: 32px; z-index: 1001; background: #2575fc; color: #fff; border: none; border-radius: 50%; width: 48px; height: 48px; display: flex; align-items: center; justify-content: center; font-size: 1.4rem; box-shadow: 0 4px 16px rgba(31,38,135,0.18); cursor: pointer; opacity: 1; transition: background 0.2s, box-shadow 0.2s, opacity 0.5s cubic-bezier(.4,0,.2,1), transform 0.5s cubic-bezier(.4,0,.2,1);"><i class="fa fa-angle-up" id="headerToggleIcon"></i></button>
<nav>
    <div class="nav-logo">
        <img src="<?php echo $backwardseperator; ?>images/logo.png" alt="UniHelper Logo" class="logo-img">
    </div>
    <ul class="menu">
        <li>
            <a href="<?php echo $backwardseperator; ?>index.php">
                <i class="fa fa-home"></i>
            </a>
        </li>
        <li class="sub-menu">
            <a href="#">
                Administration
                <i class="fa fa-angle-down"></i>
            </a>
            <ul>
                <li>
                    <a href="<?php echo $backwardseperator; ?>administration/addsubjects/addsubjects.php">Add Subjects</a>
                </li>
                <li>
                    <a href="<?php echo $backwardseperator; ?>administration/lecturelinks/lecturelinks.php">Add Lecture Links</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="<?php echo $backwardseperator; ?>administration/dailyplan/dailyplan.php">Daily Plan</a>
        </li>
        <li>
            <a href="<?php echo $backwardseperator; ?>administration/monthlyprogress/monthlyprogress.php">Monthly Progress</a>
        </li>
        <li class="sub-menu">
            <a href="#">
                Lecture
                <i class="fa fa-angle-down"></i>
            </a>
            <ul>
                <li>
                    <a href="<?php echo $backwardseperator; ?>administration/timetable/timetable.php">Time Table</a>
                </li>
                <li>
                    <a href="<?php echo $backwardseperator; ?>administration/joinlecture/joinlecture.php">Join Lecture</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="<?php echo $backwardseperator; ?>profile.php">Profile</a>
        </li>
    </ul>
</nav>
<script>
// Header toggle button for show/hide nav
document.addEventListener('DOMContentLoaded', function() {
    const nav = document.querySelector('nav');
    const btn = document.getElementById('headerToggleBtn');
    const icon = document.getElementById('headerToggleIcon');
    let navVisible = true;
    btn.addEventListener('click', function() {
        navVisible = !navVisible;
        if (!navVisible) {
            nav.classList.add('hide-on-scroll');
            icon.classList.remove('fa-angle-up');
            icon.classList.add('fa-angle-down');
            btn.title = 'Show Header';
        } else {
            nav.classList.remove('hide-on-scroll');
            icon.classList.remove('fa-angle-down');
            icon.classList.add('fa-angle-up');
            btn.title = 'Hide Header';
        }
    });

    // Auto-hide nav on scroll down, show on scroll up
    let lastScrollY = window.scrollY;
    window.addEventListener('scroll', function() {
        if (window.scrollY > lastScrollY && window.scrollY > 80) {
            if(navVisible) nav.classList.add('hide-on-scroll');
        } else {
            if(navVisible) nav.classList.remove('hide-on-scroll');
        }
        lastScrollY = window.scrollY;
    });
});
</script>
</body>
</script>
</body>
</html>
