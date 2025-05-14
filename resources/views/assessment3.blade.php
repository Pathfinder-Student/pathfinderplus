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

   <form action="{{ route('assessment3.submit') }}" method="POST">
    @csrf

    <section class="question-section">
        <h2>REAL-LIFE PREFERENCES & DECISION -MAKING</h2>
        <div class="question-box">
            <p class="question-text">How do you approach a group project?</p>
            <ul class="options-list">
                <li><button type="button" class="option-btn" data-question="q1" data-value="STEM">A. Organize the technical parts</button></li>
                <li><button type="button" class="option-btn" data-question="q1" data-value="HUMSS">B. Handle communication or content</button></li>
                <li><button type="button" class="option-btn" data-question="q1" data-value="GAS">C. Help where needed, fill the gaps</button></li>
                <li><button type="button" class="option-btn" data-question="q1" data-value="ABM">D. Plan and assign roles</button></li>
                <li><button type="button" class="option-btn" data-question="q1" data-value="TVL">E. Do the practical task</button></li>
            </ul>
        </div>
    </section>

    <section class="question-section">
        <div class="question-box">
            <p class="question-text">What’s your ideal weekend activity?</p>
            <ul class="options-list">
                <li><button type="button" class="option-btn" data-question="q2" data-value="STEM">A. Visiting a science museum or coding</button></li>
                <li><button type="button" class="option-btn" data-question="q2" data-value="HUMSS">B. Attending a spoken word event</button></li>
                <li><button type="button" class="option-btn" data-question="q2" data-value="GAS">C. Exploring new hobbies</button></li>
                <li><button type="button" class="option-btn" data-question="q2" data-value="ABM">D. Selling or promoting a product</button></li>
                <li><button type="button" class="option-btn" data-question="q2" data-value="TVL">E. Fixing gadgets or cooking</button></li>
            </ul>
        </div>
    </section>

    <section class="question-section">
        <div class="question-box">
            <p class="question-text">Which career sounds exciting to you?</p>
            <ul class="options-list">
                <li><button type="button" class="option-btn" data-question="q3" data-value="STEM">A. Engineer or architect</button></li>
                <li><button type="button" class="option-btn" data-question="q3" data-value="HUMSS">B. Psychologist or teacher</button></li>
                <li><button type="button" class="option-btn" data-question="q3" data-value="GAS">C. Journalist or researcher</button></li>
                <li><button type="button" class="option-btn" data-question="q3" data-value="ABM">D. Entrepreneur or marketer</button></li>
                <li><button type="button" class="option-btn" data-question="q3" data-value="TVL">E. Chef or technician</button></li>
            </ul>
        </div>
    </section>

    <section class="question-section">
        <div class="question-box">
            <p class="question-text">How do you handle difficult tasks?</p>
            <ul class="options-list">
                <li><button type="button" class="option-btn" data-question="q4" data-value="STEM">A. Break it into steps</button></li>
                <li><button type="button" class="option-btn" data-question="q4" data-value="HUMSS">B. Reflect and talk it out</button></li>
                <li><button type="button" class="option-btn" data-question="q4" data-value="GAS">C. Try different ways</button></li>
                <li><button type="button" class="option-btn" data-question="q4" data-value="ABM">D. Make a plan</button></li>
                <li><button type="button" class="option-btn" data-question="q4" data-value="TVL">E. Use practical skills</button></li>
            </ul>
        </div>
    </section>

    <section class="question-section">
        <div class="question-box">
            <p class="question-text">What’s your favorite type of competition?</p>
            <ul class="options-list">
                <li><button type="button" class="option-btn" data-question="q5" data-value="STEM">A. Quiz bees</button></li>
                <li><button type="button" class="option-btn" data-question="q5" data-value="HUMSS">B. Writing or speech</button></li>
                <li><button type="button" class="option-btn" data-question="q5" data-value="GAS">C. General knowledge</button></li>
                <li><button type="button" class="option-btn" data-question="q5" data-value="ABM">D. Business pitch</button></li>
                <li><button type="button" class="option-btn" data-question="q5" data-value="TVL">E. Skills contest</button></li>
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
