<footer class="footer">
  <div class="footer-content">
    <span>&copy; <?php echo date('Y'); ?> UniHelper. All rights reserved.</span>
    <span class="footer-links">
      <a href="https://github.com/Navindu2k21/UniHelper" target="_blank"><i class="fab fa-github"></i> GitHub</a>
      &nbsp;|&nbsp;
            <a href="mailto:navindualahakoon3@gmail.com"><i class="fa fa-envelope"></i> Contact</a>
    </span>
  </div>
</footer>
<style>
html, body {
  height: 100%;
  margin: 0;
  padding: 0;
}
body {
  min-height: 100vh;
  display: flex;
  flex-direction: column;
}
.footer {
  width: 100%;
  background: rgba(30, 40, 80, 0.92);
  color: #fff;
  padding: 1.2rem 0 1rem 0;
  box-shadow: 0 -2px 12px rgba(31,38,135,0.10);
  margin-top: auto;
}
.footer-content {
  max-width: 1200px;
  margin: 0 auto;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  align-items: center;
  padding: 0 2rem;
  font-size: 1rem;
}
.footer-links a {
  color: #fff;
  text-decoration: none;
  margin: 0 0.5rem;
  transition: color 0.2s;
}
.footer-links a:hover {
  color: #48cfad;
}
@media (max-width: 600px) {
  .footer-content {
    flex-direction: column;
    gap: 0.5rem;
    padding: 0 1rem;
    font-size: 0.95rem;
  }
}
</style>