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
        <a class="logout-btn" href="login.html">Log Out</a>
      </div>
  </div>

 @if(isset($recommendedStrand) && isset($personalityType) && isset($resultLabel))
<style>
    .result-modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background-color: rgba(0, 0, 0, 0.6);
        z-index: 9998;
    }

    .result-modal {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: white;
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 0 30px rgba(0, 0, 0, 0.2);
        z-index: 9999;
        max-width: 400px;
        width: 90%;
        text-align: center;
    }

    .result-modal h4 {
        margin-bottom: 1rem;
    }

    .close-btn {
        position: absolute;
        top: 8px;
        right: 12px;
        font-size: 20px;
        font-weight: bold;
        color: #333;
        text-decoration: none;
    }

    .close-btn:hover {
        color: red;
    }
</style>

<div class="result-modal-overlay"></div>

<div class="result-modal">
    <a href="{{ route('studentdashboard') }}" class="close-btn">&times;</a>
    <h4>Assessment Result</h4>
    <p><strong>Recommended Strand:</strong> {{ $recommendedStrand }}</p>
    <p><strong>Personality Type:</strong> {{ $personalityType }}</p>
    <p><strong>Result Label:</strong> {{ $resultLabel }}</p>
    <a href="{{ route('studentdashboard') }}" class="btn btn-success mt-3">Go to Dashboard</a>
</div>
@endif



  <!-- ========== ASSESSMENT HEADER SECTION ========== -->
  <div class="assessment-header">
    <h1>PERSONALITY ASSESSMENT</h1>
    <p>
    Please answer all questions honestly and to the best of your ability.
    This assessment is designed to help you gain a better understanding of your personality, strengths, and areas where you may want to grow.
    There are no right or wrong answers—just be sincere with yourself.
    Your responses will provide meaningful insights to help you understand yourself better and guide you toward personal growth.
    Take your time, reflect on each question, and answer with thoughtfulness and authenticity.


    </p>
  </div>

<form action="{{ route('assessment6.submit') }}" method="POST" onsubmit="return prepareAnswers(event)">
    @csrf

    <!-- Questions -->
    <section class="question-section">
        <div class="question-box">
            <p class="question-text">How do you usually feel after attending a big social gathering?</p>
            <ul class="options-list">
                <li><button type="button" class="option-btn" data-question="q1" data-value="A">A. Drained and needing time alone (Introvert)</button></li>
                <li><button type="button" class="option-btn" data-question="q1" data-value="B">B. Energized and excited (Extrovert)</button></li>
            </ul>
        </div>
    </section>

    <section class="question-section">
        <div class="question-box">
            <p class="question-text">What kind of weekend sounds more appealing?</p>
            <ul class="options-list">
                <li><button type="button" class="option-btn" data-question="q2" data-value="A">A. Staying at home (Introvert)</button></li>
                <li><button type="button" class="option-btn" data-question="q2" data-value="B">B. Going out with friends (Extrovert)</button></li>
            </ul>
        </div>
    </section>

    <section class="question-section">
        <div class="question-box">
            <p class="question-text">How do you usually process your thoughts or emotions?</p>
            <ul class="options-list">
                <li><button type="button" class="option-btn" data-question="q3" data-value="A">A. Internally, through reflection (Introvert)</button></li>
                <li><button type="button" class="option-btn" data-question="q3" data-value="B">B. By talking to others (Extrovert)</button></li>
            </ul>
        </div>
    </section>

    <section class="question-section">
        <div class="question-box">
            <p class="question-text">In group conversations, you tend to:</p>
            <ul class="options-list">
                <li><button type="button" class="option-btn" data-question="q4" data-value="A">A. Listen more (Introvert)</button></li>
                <li><button type="button" class="option-btn" data-question="q4" data-value="B">B. Speak often (Extrovert)</button></li>
            </ul>
        </div>
    </section>

    <section class="question-section">
        <div class="question-box">
            <p class="question-text">When working on a task, you prefer:</p>
            <ul class="options-list">
                <li><button type="button" class="option-btn" data-question="q5" data-value="A">A. Solo work (Introvert)</button></li>
                <li><button type="button" class="option-btn" data-question="q5" data-value="B">B. Teamwork (Extrovert)</button></li>
            </ul>
        </div>
    </section>

    <!-- Hidden input for answers -->
    <input type="hidden" name="answers" id="answers">

    <div class="submit-btn-container">
        <button type="submit" class="next-btn">Submit</button>
    </div>
</form>

<style>
.option-btn.selected {
    background-color: #007bff;
    color: white;
}
</style>


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

    const totalQuestions = document.querySelectorAll('.question-section').length;

    if (Object.keys(answers).length < totalQuestions) {
        alert('Please answer all questions before submitting.');
        return false;
    }

    document.getElementById('answers').value = JSON.stringify(Object.values(answers));

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


  <footer>
    <div class="footer-nav">
      <div class="footer-logos">
        <img src="{{ asset('images/BSHS Logo.png') }}" alt="Logo 1">
        <img src="{{ asset('images/kagawaran ng edukasyon_logo.png')}}" alt="Logo 2">
        <img src="{{ asset('images/deped_logo.png') }}" alt="Logo 3">
      </div>
      <nav>
        <ul>
          <li><a href="{{route('studentdashboard')}}">Dashboard</a></li>

        </ul>
      </nav>
    </div>
    <div class="footer-copyright">
      <p>Copyrights © 2025 BSHS. All rights reserved.</p>
    </div>
  </footer>


</body>
</html>