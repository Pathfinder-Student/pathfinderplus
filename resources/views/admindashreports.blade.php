<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reports</title>
</head>
<style>
 body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #f8fdf5;
    }
    .container {
      display: flex;
    }
    .sidebar {
      width: 300px;
      background-color: #e0e0e0;
      height: 100vh;
      padding: 20px;
      box-sizing: border-box;
    }
    .sidebar .profile {
      text-align: center;
    }
    .profile-icon {
      width: 100px;
      height: 100px;
      background-color: green;
      border-radius: 50%;
      margin: 0 auto;
    }
    .name {
      font-weight: bold;
      color: green;
      margin: 10px 0 5px;
    }
    .role {
      margin-bottom: 30px;
    }
    .sidebar nav a {
      display: block;
      padding: 10px;
      margin: 5px 0;
      text-decoration: none;
      color: black;
      border-radius: 5px;
    }
    .sidebar nav a.active {
      background-color: gray;
      color: white;
    }
    .logout-section {
      margin-top: 30px;
      text-align: center;
    }
    .logout-button {
      background-color: green;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
    }
.main-content {
    flex-grow: 1;
    padding: 40px;
    box-sizing: border-box;
}

.cards {
    display: flex;
    gap: 20px;
    margin-top: 20px;
}

.card {
    background-color: white;
    border: 1px solid #ccc;
    padding: 30px;
    text-align: center;
    width: 120px;
    border-radius: 10px;
    box-shadow: 1px 1px 5px rgba(0,0,0,0.1);
}

.card strong {
    display: block;
    font-size: 24px;
}

    .footer {
      background-color: darkgreen;
      color: white;
      text-align: center;
      padding: 10px;
      position: absolute;
      bottom: 0;
      width: 100%;
    }

</style>
<body>

<div class="container">
  <div class="sidebar">
    <div class="profile">
      <div class="profile-icon"></div>
      <div class="name">Jane Doe</div>
      <div class="role">Admin</div>
    </div>
      <nav class="menu">
        <a href="{{route('admindashboard')}}" class="nav-item">Home</a>
        <a href="{{route('admindashstudents')}}" class="nav-item">Students</a>
        <a href="{{route('admindashassessments')}}" class="nav-item">Assessments</a>
        <a href="{{route('admindashreports')}}" class="nav-item active">Reports</a>
        <a href="{{route('admindashsettings')}}" class="nav-item">Settings</a>
      </nav>
    <div class="logout-section">
      <p>Welcome, Admin!</p>
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
    @csrf
    <button type="submit" class="logout-button">Log Out</button>
    </div>
  </div>

        <main class="main-content">
    <h1>Reports</h1>
    <h2>Student Strand Distribution Overview</h2>
    <p>This shows the number of students recommended for each strand:</p>

    <div class="cards">
        @php
            $strands = ['STEM', 'HUMSS', 'ABM', 'TVL','GAS'];
        @endphp

        @foreach ($strands as $strand)
            <div class="card">
                <strong>{{ $strandCounts[$strand] ?? 0 }}</strong>
                <p>{{ $strand }}</p>
            </div>
        @endforeach
    </div>
</main>


    <footer class="footer">
        Copyrights © 2025 BSHS. All rights reserved.
    </footer>
</body>
</html>
