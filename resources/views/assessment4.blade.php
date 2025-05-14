<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Academic Skills Assessment</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

  <!-- ========== NAVIGATION BAR ========== -->
  <div class="navbar">
    <div class="logo">
      <img src="BSHS Logo.png" alt="School Logo">
    </div>
  
    <div class="nav-links">
      <a href="home.html">Home</a>
      <a href="about.html">About</a>
      <a href="assessments.html">Assessments</a>
      <a href="careerpath.html">Career Paths</a>
    </div>
  
    <div class="nav-user">
        <a href="profile.html">
          <img src="user-icon.png" alt="User Icon" style="height: 30px;">
        </a>
        <a class="logout-btn" href="login.html">Log Out</a>
      </div>
  </div>
  

  <!-- ========== ASSESSMENT HEADER SECTION ========== -->
  <div class="assessment-header">
    <h1>ACADEMIC SKILLS ASSESSMENT</h1>
    <p>
      Please answer all the questions truthfully and to the best of your ability.
      This assessment is designed to help you identify your academic strengths and areas that may need improvement.
      There are no right or wrong answers—just be honest with yourself.
      Your responses will help provide accurate insights and recommendations to support your learning journey.
      Take your time, read each question carefully, and try to answer each one thoughtfully.
    </p>
  </div>
  
 <form action="{{ route('assessment4.submit') }}" method="POST">
    @csrf

    <section class="question-section">
        <h2>SELF AWARENESS & STRENGTH</h2>
        <div class="question-box">
            <p class="question-text">What motivates you in school?</p>
            <ul class="options-list">
                <li><button type="button" class="option-btn" data-question="q1" data-value="STEM">A. Discovering how things work</button></li>
                <li><button type="button" class="option-btn" data-question="q1" data-value="HUMSS">B. Understanding human behavior</button></li>
                <li><button type="button" class="option-btn" data-question="q1" data-value="GAS">C. Learning new ideas</button></li>
                <li><button type="button" class="option-btn" data-question="q1" data-value="ABM">D. Achieving goals</button></li>
                <li><button type="button" class="option-btn" data-question="q1" data-value="TVL">E. Creating or fixing things</button></li>
            </ul>
        </div>
    </section>

    <section class="question-section">
        <div class="question-box">
            <p class="question-text">When do you feel most successful?</p>
            <ul class="options-list">
                <li><button type="button" class="option-btn" data-question="q2" data-value="STEM">A. Solving complex problems</button></li>
                <li><button type="button" class="option-btn" data-question="q2" data-value="HUMSS">B. Expressing your opinion</button></li>
                <li><button type="button" class="option-btn" data-question="q2" data-value="GAS">C. Balancing different tasks</button></li>
                <li><button type="button" class="option-btn" data-question="q2" data-value="ABM">D. Seeing your plans work</button></li>
                <li><button type="button" class="option-btn" data-question="q2" data-value="TVL">E. Building or completing tasks</button></li>
            </ul>
        </div>
    </section>

    <section class="question-section">
        <div class="question-box">
            <p class="question-text">What makes you unique as a learner?</p>
            <ul class="options-list">
                <li><button type="button" class="option-btn" data-question="q3" data-value="STEM">A. Logical thinking</button></li>
                <li><button type="button" class="option-btn" data-question="q3" data-value="HUMSS">B. Empathy and communication</button></li>
                <li><button type="button" class="option-btn" data-question="q3" data-value="GAS">C. Adaptability</button></li>
                <li><button type="button" class="option-btn" data-question="q3" data-value="ABM">D. Strategic mindset</button></li>
                <li><button type="button" class="option-btn" data-question="q3" data-value="TVL">E. Manual skills</button></li>
            </ul>
        </div>
    </section>

    <section class="question-section">
        <div class="question-box">
            <p class="question-text">What’s your dream project?</p>
            <ul class="options-list">
                <li><button type="button" class="option-btn" data-question="q4" data-value="STEM">A. Science invention</button></li>
                <li><button type="button" class="option-btn" data-question="q4" data-value="HUMSS">B. Documentary or play</button></li>
                <li><button type="button" class="option-btn" data-question="q4" data-value="GAS">C. Campus-wide campaign</button></li>
                <li><button type="button" class="option-btn" data-question="q4" data-value="ABM">D. Youth business fair</button></li>
                <li><button type="button" class="option-btn" data-question="q4" data-value="TVL">E. Food innovation</button></li>
            </ul>
        </div>
    </section>

    <section class="question-section">
        <div class="question-box">
            <p class="question-text">How do you define success?</p>
            <ul class="options-list">
                <li><button type="button" class="option-btn" data-question="q5" data-value="STEM">A. Solving real problems</button></li>
                <li><button type="button" class="option-btn" data-question="q5" data-value="HUMSS">B. Inspiring others</button></li>
                <li><button type="button" class="option-btn" data-question="q5" data-value="GAS">C. Learning continuously</button></li>
                <li><button type="button" class="option-btn" data-question="q5" data-value="ABM">D. Reaching goals</button></li>
                <li><button type="button" class="option-btn" data-question="q5" data-value="TVL">E. Creating useful things</button></li>
            </ul>
        </div>
    </section>

    <input type="hidden" name="answers" id="answers">

    <div class="submit-btn-container">
        <button type="submit" class="next-btn" onclick="prepareAnswers(event)">Next</button>
    </div>
</form>

<script>
const answers = {};

document.querySelectorAll('.option-btn').forEach(button => {
  button.addEventListener('click', function () {
    const question = this.dataset.question;
    const value = this.dataset.value;

    answers[question] = value;

    document.querySelectorAll(`[data-question="${question}"]`).forEach(btn => {
      btn.classList.remove('selected');
    });

    this.classList.add('selected');
  });
});

function prepareAnswers(event) {
  event.preventDefault();

  const questions = new Set();
  document.querySelectorAll('.option-btn').forEach(btn => {
    questions.add(btn.dataset.question); 
  });

  const totalQuestions = questions.size; 

  if (Object.keys(answers).length < totalQuestions) {
    alert('Please answer all questions before proceeding.');
    return false;
  }

  console.log(answers); 

  document.getElementById('answers').value = JSON.stringify(answers);

  document.querySelector('form').submit();
  return true;
}

</script>


<style>
    .option-btn.selected {
        background-color: #4caf50;
        color: white;
    }
</style>


<br>

<footer>
    <div class="footer-nav">
        <div class="footer-logos">
             <img src="{{ asset('images/BSHS Logo.png') }}" alt="Logo 1">
        <img src="{{ asset('images/kagawaran ng edukasyon_logo.png')}}" alt="Logo 2">
        <img src="{{ asset('images/deped_logo.png') }}" alt="Logo 3">
        </div>
        <nav>
            <ul>
                <li><a href="home.html">Home</a></li>
                <li><a href="strands.html">Strands</a></li>
                <li><a href="dashboard.html">Dashboard</a></li>
                <li><a href="about this.html">About this</a></li>
            </ul>
        </nav>
    </div>
    <div class="footer-copyright">
        <p>Copyrights © 2025 BSHS. All rights reserved.</p>
    </div>
</footer>

<script src="script.js"></script>


</body>
</html>
