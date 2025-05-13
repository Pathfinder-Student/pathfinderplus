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
      Please answer all the questions truthfully and to the best of your ability. This assessment is designed to help you identify your academic strengths and areas that may need improvement. There are no right or wrong answers—just be honest with yourself. Your responses will help provide accurate insights and recommendations to support your learning journey. Take your time, read each question carefully, and try to answer each one thoughtfully.
    </p>

  </div>
  

  <form action="{{ route('assessment2.submit') }}" method="POST">
  @csrf

  <section class="question-section">
    <h2>COMMUNICATION & EXPRESSION</h2>
    <div class="question-box">
      <p class="question-text">What’s your favorite way to express yourself?</p>
      <ul class="options-list">
        <li><button type="button" class="option-btn" data-question="q1" data-value="STEM">A. Through numbers and diagrams</button></li>
        <li><button type="button" class="option-btn" data-question="q1" data-value="HUMSS">B. Through words or writing</button></li>
        <li><button type="button" class="option-btn" data-question="q1" data-value="GAS">C. Through multiple mediums</button></li>
        <li><button type="button" class="option-btn" data-question="q1" data-value="ABM">D. Through planning and presenting</button></li>
        <li><button type="button" class="option-btn" data-question="q1" data-value="TVL">E. Through crafts or practical work</button></li>
      </ul>
    </div>
  </section>

  <section class="question-section">
    <div class="question-box">
      <p class="question-text">In a group, what role do you usually take?</p>
      <ul class="options-list">
        <li><button type="button" class="option-btn" data-question="q2" data-value="STEM">A. The analyst or researcher</button></li>
        <li><button type="button" class="option-btn" data-question="q2" data-value="HUMSS">B. The speaker or idea-giver</button></li>
        <li><button type="button" class="option-btn" data-question="q2" data-value="GAS">C. The all-around helper</button></li>
        <li><button type="button" class="option-btn" data-question="q2" data-value="ABM">D. The planner or organizer</button></li>
        <li><button type="button" class="option-btn" data-question="q2" data-value="TVL">E. The implementer or builder</button></li>
      </ul>
    </div>
  </section>

  <section class="question-section">
    <div class="question-box">
      <p class="question-text">Which type of writing do you prefer?</p>
      <ul class="options-list">
        <li><button type="button" class="option-btn" data-question="q3" data-value="STEM">A. Reports or scientific explanations</button></li>
        <li><button type="button" class="option-btn" data-question="q3" data-value="HUMSS">B. Essays or creative writing</button></li>
        <li><button type="button" class="option-btn" data-question="q3" data-value="GAS">C. A mix of formats</button></li>
        <li><button type="button" class="option-btn" data-question="q3" data-value="ABM">D. Proposals or business letters</button></li>
        <li><button type="button" class="option-btn" data-question="q3" data-value="TVL">E. Instructions or manuals</button></li>
      </ul>
    </div>
  </section>

  <section class="question-section">
    <div class="question-box">
      <p class="question-text">What makes you confident in school?</p>
      <ul class="options-list">
        <li><button type="button" class="option-btn" data-question="q4" data-value="STEM">A. Mastering difficult concepts</button></li>
        <li><button type="button" class="option-btn" data-question="q4" data-value="HUMSS">B. Being able to express your thoughts</button></li>
        <li><button type="button" class="option-btn" data-question="q4" data-value="GAS">C. Being adaptable in any task</button></li>
        <li><button type="button" class="option-btn" data-question="q4" data-value="ABM">D. Seeing your plans work</button></li>
        <li><button type="button" class="option-btn" data-question="q4" data-value="TVL">E. Completing something with your hands</button></li>
      </ul>
    </div>
  </section>

  <section class="question-section">
    <div class="question-box">
      <p class="question-text">How do you prepare for an oral recitation?</p>
      <ul class="options-list">
        <li><button type="button" class="option-btn" data-question="q5" data-value="STEM">A. Practice facts and logic</button></li>
        <li><button type="button" class="option-btn" data-question="q5" data-value="HUMSS">B. Prepare a script or speech</button></li>
        <li><button type="button" class="option-btn" data-question="q5" data-value="GAS">C. Use key points and examples</button></li>
        <li><button type="button" class="option-btn" data-question="q5" data-value="ABM">D. Practice with mock presentations</button></li>
        <li><button type="button" class="option-btn" data-question="q5" data-value="TVL">E. Visualize or demonstrate the topic</button></li>
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
