<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>About | Strand Pathfinder</title>
  <link rel="stylesheet" href="about.css">
<link href="https://fonts.googleapis.com/css2?family=Albert+Sans:wght@400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<body>
<style>
body {
    margin: 0;
    font-family: Arial, sans-serif;
    text-align: center;
    padding: 0;
    background-color: #ffffff;
    overflow-x: hidden;
}

.navbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: white;
    padding: 10px 5%;
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
    position: fixed;
    width: 100%;
    top: 0;
    left: 0;
    z-index: 1000;
    animation: slideDown 0.5s ease-out;
}

@keyframes slideDown {
    from {
        transform: translateY(-100%);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

.nav-item {
    margin: 0 15px;
    padding: 10px 15px;
    border-radius: 5px;
    position: relative;
    transition: background 0.3s, transform 0.2s;
}

.nav-item:hover {
    background-color: #f0f0f0;
}

.nav-item:active {
    transform: scale(0.95);
}

.nav-item span {
    position: relative;
    display: inline-block;
    transition: transform 0.2s;
}

.nav-item:active span {
    transform: translateY(2px);
}

.navbar .logo img {
    height: 50px;
}

.nav-links {
    list-style: none;
    display: flex;
    gap: 80px;
}

.nav-links li {
    display: inline;
}

.nav-links a {
    text-decoration: none;
    color: #464646;
    font-size: 18px;
    font-weight: 600;
    padding: 10px; /* Add padding for better clickable area */
    transition: color 0.3s; /* Smooth transition for hover effect */
}

.nav-links a:hover{
    color: green; /* Hover color */
}

.login-btn {
    background: green;
    color: white;
    padding: 8px 15px;
    text-decoration: none;
    border-radius: 5px;
    margin-right: 122px; 
}

.login-btn:hover {
    background-color: rgb(13, 101, 13); /* Darker green on hover */
}


img {
  max-width: 100%;
  border-radius: 10px;
}

.improved-hero {
  text-align: center;
  padding: 60px 20px;
  background-color: #f8fdf8; /* Light green tint background */
  font-family: 'Albert Sans', sans-serif;
}

.hero-image {
  max-width: 100px;
  margin-bottom: 20px;
}

.system-name {
  font-size: 32px;
  color: #2e7d32; /* Dark green */
  font-weight: 700;
  margin-bottom: 10px;
}

.tagline {
  font-size: 18px;
  color: #555;
  margin-bottom: 10px;
}

.description {
  max-width: 700px;
  margin: 0 auto 10px auto;
  color: #555;
  line-height: 1.6;
}


.about-description,
.about-section {
  background-color: #ffffff;
  padding: 60px 20px;
}

.about-section.alt-bg {
  background-color: #F9FFF7;
}

.container {
  max-width: 900px;
  margin: auto;
}

.about-description h2,
.about-section h2 {
  font-size: 26px;
  color: #217100;
  margin-bottom: 20px;
  text-align: center;
}

.about-description p,
.about-section p {
  font-size: 16px;
  line-height: 1.75;
  color: #444;
  margin-bottom: 20px;
  text-align: center;
}

.features-list {
  list-style: none;
  padding-left: 0;
  font-size: 15.5px;
  line-height: 1.8;
  color: #444;
  margin: 0 auto;
  text-align: center; 
}

.features-list li {
  margin-bottom: 15px;
  padding-left: 25px;
  position: relative;
}

.about-values {
  background-color: #F9FFF7;
  padding: 60px 20px;
}

.about-values .container {
  display: flex;
  flex-wrap: wrap;
  gap: 30px;
  justify-content: center;
}

.value-box {
  background-color: #fff;
  border-radius: 15px;
  padding: 30px;
  flex: 1 1 300px;
  box-shadow: 0 8px 20px rgba(0,0,0,0.05);
  max-width: 400px;
  text-align: center;
}

.value-box h3 {
  font-size: 20px;
  color: #217100;
  margin-bottom: 15px;
}

.value-box p {
  font-size: 15.5px;
  line-height: 1.7;
  color: #444;
}

@media (max-width: 768px) {
  .about-values .container {
    flex-direction: column;
    align-items: center;
  }
}

.icon-cards {
  display: flex;
  justify-content: space-around;
  align-items: flex-start;
  flex-wrap: wrap;
  gap: 40px;
  margin-top: 30px;
}

.icon-card {
  display: flex;
  flex-direction: column;
  align-items: center;
  width: 220px;
  text-align: center;
}

.icon-card i {
  color: #2e7d32;
  margin-bottom: 10px;
}


.who-image {
  max-width: 700px;
  height: 400px;
  margin: 20px auto 0;
  display: block;
  border-radius: 12px;
  box-shadow: 0 4px 10px rgba(0,0,0,0.07);
}

@media (max-width: 768px) {
  .image-cards {
    flex-direction: column;
    align-items: center;
  }
}

footer {
    border-top: 1px solid #464646; 
    text-align: center;
}

.footer-copyright {
    background-color: #175C1A; 
    color: white;
    text-align: center;
    padding: 10px 0;
    font-size: 14px;
}

.footer-copyright p {
    color: white;
}

.footer-nav {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 30px; 
    padding: 10px 0;
}

.footer-logos {
    display: flex;
    gap: 30px;
    justify-content: flex-start; 
    align-items: center; 
    margin-left: 0; 
    padding-left: 10px; 
}

.footer-logos img {
    height: 40px;
}

nav ul {
    list-style: none;
    display: flex;
    gap: 50px;
    padding: 0;
    margin: 0;
    margin-left: 150px;
}

nav ul li {
    display: inline;
}

nav ul li a {
    text-decoration: none;
    color: black;
    font-size: 16px;
    font-weight: 600;
}


</style>

    <!-- ========== NAVIGATION BAR ========== -->
    <header>
        <nav class="navbar">
            <div class="logo">
                <img src="{{ asset('images/BSHS Logo.png')}}" alt="School Logo">
            </div>
            <ul class="nav-links">
                <li><a href="{{route('home')}}" class="active">Home</a></li>
                <li><a href="{{route('home')}}">Career Paths</a></li>
                <li><a href="{{route('aboutthis')}}">About this</a></li>
            </ul>
            <a href="{{url('/login')}}" class="login-btn">Log In</a>
        </nav>
    </header>
  

  <section class="about-hero improved-hero">
  <h1 class="system-name">PathFinder Plus System</h1>
  <p class="tagline">Your personal guide in choosing the right strand for Senior High School.</p>
  <br>
  <p class="description">
    The PathFinder Plus System is a student-centered tool created to simplify strand exploration in Senior High School.
    It helps you understand each track’s subjects, focus, and career paths.
  </p>
  <p class="description">
    With clear layouts and helpful visuals, we aim to make decisions easier — whether you’re drawn to science, humanities, arts, business, or tech.
  </p>
</section>

  <section class="about-values">
    <div class="container">
      <div class="value-box">
        <h3>Our Vision</h3>
        <p>
          To empower students with clarity and confidence in making academic decisions that support their future goals.
        </p>
      </div>
      <div class="value-box">
        <h3>Our Mission</h3>
        <p>
          To provide a platform where strand information is simplified, visualized, and aligned with student interest and growth.
        </p>
      </div>
    </div>
  </section>

  <section class="about-section alt-bg">
  <div class="container">
    <h2>How It Works</h2>
    <div class="icon-cards">
      <div class="icon-card">
        <i class="fas fa-search fa-3x"></i>
        <p>Browse and learn about each strand in detail</p>
      </div>
      <div class="icon-card">
        <i class="fas fa-balance-scale fa-3x"></i>
        <p>Compare based on subjects, strengths, and careers</p>
      </div>
      <div class="icon-card">
        <i class="fas fa-check-circle fa-3x"></i>
        <p>Choose the best strand that fits your goals</p>
      </div>
    </div>
  </div>
</section>


  <section class="about-section">
    <div class="container">
      <h2>What You’ll Find Inside</h2>
      <ul class="features-list">
        <li>🧪 Details on each SHS strand: STEM, HUMSS, ABM, GAS, TVL, and Arts</li>
        <li>🧭 Tools to match your interest with the right strand</li>
        <li>📌 Organized, modern layout for easy navigation</li>
      </ul>
    </div>
  </section>

  <section class="about-section alt-bg">
    <div class="container">
      <h2>Who Is It For?</h2>
      <p>
        This system is made for students entering Senior High School who are unsure which strand fits them best. Whether you’re looking for inspiration or structure, the Pathfinder is here to guide you.
      </p>
                <img src="{{ asset('images/students.jpg') }}" alt="Students choosing strand">
    </div>
  </section>

    <footer>
        <div class="footer-nav"> 
            <div class="footer-logos">
                <img src="{{ asset('images/BSHS Logo.png') }}" alt="Logo 1">
                <img src="{{ asset('images/kagawaran ng edukasyon_logo.png') }}" alt="Logo 2">
                <img src="{{ asset('images/deped_logo.png') }}" alt="Logo 3">
            </div>
            <nav>
                <ul>
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li><a href="{{route('home')}}">Career Paths</a></li>
                    <li><a href="#">About this</a></li>
            </nav>
        </div>
        <div class="footer-copyright">
            <p>Copyrights © 2025 BSHS. All rights reserved.</p>
        </div>
    </footer>
    

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>