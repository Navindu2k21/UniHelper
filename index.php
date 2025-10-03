

<?php
include 'includes/header.php';
?>
<link rel="stylesheet" href="style.css">
<div class="main-content">
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
</div>

<?php include 'includes/footer.php'; ?>