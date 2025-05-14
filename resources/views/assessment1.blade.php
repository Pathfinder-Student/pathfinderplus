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
      <img src="{{ asset ('images/BSHS Logo.png')}}" alt="School Logo">
    </div>
  
  
    <div class="nav-user">
        <a href="profile.html">
          <img src="user-icon.png" alt="User Icon" style="height: 30px;">
        </a>
        <a class="logout-btn" href="{{route('login')}}">Log Out</a>
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

 <form action="{{ route('assessment1.submit') }}" method="POST" onsubmit="return prepareAnswers()">
  @csrf

  <section class="question-box" data-question="1">
    <h2>LEARNING PREFERENCES</h2>

    <div class="question-box" data-question-id="q1">
      <p class="question-text">How do you prefer to solve problems?</p>
      <ul class="options-list">
        <li><button type="button" class="option-btn" data-question="q1" data-value="STEM">A. By analyzing</button></li>
        <li><button type="button" class="option-btn" data-question="q1" data-value="HUMSS">B. By discussing</button></li>
        <li><button type="button" class="option-btn" data-question="q1" data-value="GAS">C. By trying</button></li>
        <li><button type="button" class="option-btn" data-question="q1" data-value="ABM">D. By planning</button></li>
        <li><button type="button" class="option-btn" data-question="q1" data-value="TVL">E. Hands-on skills</button></li>
      </ul>
    </div>
  </section>

  <section class="question-box" data-question-id="q2">
    <p class="question-text">Which subject do you enjoy most?</p>
    <ul class="options-list">
      <li><button type="button" class="option-btn" data-question="q2" data-value="STEM">A. Math or science</button></li>
      <li><button type="button" class="option-btn" data-question="q2" data-value="HUMSS">B. Literature or social studies</button></li>
      <li><button type="button" class="option-btn" data-question="q2" data-value="GAS">C. A mix of all subjects</button></li>
      <li><button type="button" class="option-btn" data-question="q2" data-value="ABM">D. Business or economics</button></li>
      <li><button type="button" class="option-btn" data-question="q2" data-value="TVL">E. TLE or practical arts</button></li>
    </ul>
  </section>

  <section class="question-box" data-question-id="q3">
    <p class="question-text">How do you study best?</p>
    <ul class="options-list">
      <li><button type="button" class="option-btn" data-question="q3" data-value="STEM">A. Using formulas and step-by-step processes</button></li>
      <li><button type="button" class="option-btn" data-question="q3" data-value="HUMSS">B. Reading and writing notes</button></li>
      <li><button type="button" class="option-btn" data-question="q3" data-value="GAS">C. Mixing visuals, writing, and audio</button></li>
      <li><button type="button" class="option-btn" data-question="q3" data-value="ABM">D. Making real-life connections</button></li>
      <li><button type="button" class="option-btn" data-question="q3" data-value="TVL">E. Doing physical or hands-on activities</button></li>
    </ul>
  </section>

  <section class="question-box" data-question-id="q4">
    <p class="question-text">What activity do you enjoy most in school?</p>
    <ul class="options-list">
      <li><button type="button" class="option-btn" data-question="q4" data-value="STEM">A. Science experiments</button></li>
      <li><button type="button" class="option-btn" data-question="q4" data-value="HUMSS">B. Group discussions</button></li>
      <li><button type="button" class="option-btn" data-question="q4" data-value="GAS">C. School-wide projects</button></li>
      <li><button type="button" class="option-btn" data-question="q4" data-value="ABM">D. Business simulations</button></li>
      <li><button type="button" class="option-btn" data-question="q4" data-value="TVL">E. Workshops or skills training</button></li>
    </ul>
  </section>

  <section class="question-box" data-question-id="q5">
    <p class="question-text">How do you take notes?</p>
    <ul class="options-list">
      <li><button type="button" class="option-btn" data-question="q5" data-value="STEM">A. Structured and organized with symbols</button></li>
      <li><button type="button" class="option-btn" data-question="q5" data-value="HUMSS">B. Reflective and detailed</button></li>
      <li><button type="button" class="option-btn" data-question="q5" data-value="GAS">C. Colorful and flexible</button></li>
      <li><button type="button" class="option-btn" data-question="q5" data-value="ABM">D. Short and strategic</button></li>
      <li><button type="button" class="option-btn" data-question="q5" data-value="TVL">E. Through sketches or diagrams</button></li>
    </ul>
  </section>

  <input type="hidden" name="answers" id="answers">

  <div class="submit-btn-container">
      <button type="submit" class="next-btn" onclick="prepareAnswers(event)">Next</button>
  </div>
</form>

<script>
  const answers = {};

// Event listener for option buttons
document.querySelectorAll('.option-btn').forEach(button => {
  button.addEventListener('click', function () {
    const question = this.dataset.question;  // Get the question ID from data-question
    const value = this.dataset.value;        // Get the answer from data-value

    // Store the selected answer in the answers object
    answers[question] = value;

    // Remove 'selected' class from all options for this question
    document.querySelectorAll(`[data-question="${question}"]`).forEach(btn => {
      btn.classList.remove('selected');
    });

    // Add 'selected' class to the clicked button
    this.classList.add('selected');
  });
});

// Function to prepare answers before submitting
function prepareAnswers(event) {
  event.preventDefault();  // Prevent form submission to manually validate answers

  // Get all distinct question IDs
  const questions = new Set();
  document.querySelectorAll('.option-btn').forEach(btn => {
    questions.add(btn.dataset.question); // Add question IDs to a set to avoid duplicates
  });

  const totalQuestions = questions.size; 

  if (Object.keys(answers).length < totalQuestions) {
    alert('Please answer all questions before proceeding.');
    return false;
  }

  console.log(answers);  // Debugging: Check the contents of the answers object

  // Assign the answers to the hidden input
  document.getElementById('answers').value = JSON.stringify(answers);

  // Submit the form if everything is valid
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
