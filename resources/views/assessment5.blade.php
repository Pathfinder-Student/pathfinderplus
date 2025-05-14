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
  

  <form action="{{ route('assessment5.submit') }}" method="POST">
    @csrf

    <section class="question-section">
        <h2>SCHOOL & LIFE INTEGRATION</h2>
        <div class="question-box">
            <p class="question-text">How do you plan your school week?</p>
            <ul class="options-list">
                <li><button type="button" class="option-btn" data-question="q1" data-value="STEM">A. With a study schedule</button></li>
                <li><button type="button" class="option-btn" data-question="q1" data-value="HUMSS">B. Around classes and reflection time</button></li>
                <li><button type="button" class="option-btn" data-question="q1" data-value="GAS">C. With some structure and flexibility</button></li>
                <li><button type="button" class="option-btn" data-question="q1" data-value="ABM">D. Based on priority goals</button></li>
                <li><button type="button" class="option-btn" data-question="q1" data-value="TVL">E. By fitting in hands-on tasks</button></li>
            </ul>
        </div>
    </section>

    <section class="question-section">
        <div class="question-box">
            <p class="question-text">What kind of feedback helps you grow?</p>
            <ul class="options-list">
                <li><button type="button" class="option-btn" data-question="q2" data-value="STEM">A. Clear corrections and tips</button></li>
                <li><button type="button" class="option-btn" data-question="q2" data-value="HUMSS">B. Supportive and thoughtful advice</button></li>
                <li><button type="button" class="option-btn" data-question="q2" data-value="GAS">C. Honest and constructive input</button></li>
                <li><button type="button" class="option-btn" data-question="q2" data-value="ABM">D. Business-like evaluation</button></li>
                <li><button type="button" class="option-btn" data-question="q2" data-value="TVL">E. Step-by-step instruction</button></li>
            </ul>
        </div>
    </section>

    <section class="question-section">
        <div class="question-box">
            <p class="question-text">How do you manage your time?</p>
            <ul class="options-list">
                <li><button type="button" class="option-btn" data-question="q3" data-value="STEM">A. Following a fixed routine</button></li>
                <li><button type="button" class="option-btn" data-question="q3" data-value="HUMSS">B. Adapting to energy levels</button></li>
                <li><button type="button" class="option-btn" data-question="q3" data-value="GAS">C. Using a checklist</button></li>
                <li><button type="button" class="option-btn" data-question="q3" data-value="ABM">D. Setting goals and deadlines</button></li>
                <li><button type="button" class="option-btn" data-question="q3" data-value="TVL">E. Focusing on tasks to finish</button></li>
            </ul>
        </div>
    </section>

    <section class="question-section">
        <div class="question-box">
            <p class="question-text">What motivates you to keep learning?</p>
            <ul class="options-list">
                <li><button type="button" class="option-btn" data-question="q4" data-value="STEM">A. Curiosity</button></li>
                <li><button type="button" class="option-btn" data-question="q4" data-value="HUMSS">B. Passion</button></li>
                <li><button type="button" class="option-btn" data-question="q4" data-value="GAS">C. Challenge</button></li>
                <li><button type="button" class="option-btn" data-question="q4" data-value="ABM">D. Ambition</button></li>
                <li><button type="button" class="option-btn" data-question="q4" data-value="TVL">E. Creativity</button></li>
            </ul>
        </div>
    </section>

    <section class="question-section">
        <div class="question-box">
            <p class="question-text">What’s your dream school activity?</p>
            <ul class="options-list">
                <li><button type="button" class="option-btn" data-question="q5" data-value="STEM">A. Science fair</button></li>
                <li><button type="button" class="option-btn" data-question="q5" data-value="HUMSS">B. Creative writing contest</button></li>
                <li><button type="button" class="option-btn" data-question="q5" data-value="GAS">C. General knowledge quiz</button></li>
                <li><button type="button" class="option-btn" data-question="q5" data-value="ABM">D. Product expo</button></li>
                <li><button type="button" class="option-btn" data-question="q5" data-value="TVL">E. Skills competition</button></li>
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
