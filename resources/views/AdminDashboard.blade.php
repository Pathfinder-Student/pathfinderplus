<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Assessments - Admin Panel</title>
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
    .main {
      flex: 1;
      padding: 40px;
      background-color: #f7faf5;
    }

    .main h1 {
      margin-top: 0;
    }

    .add-btn {
      background-color: green;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      margin: 20px 0;
    }

    .overview {
      background-color: white;
      padding: 20px;
      border-radius: 8px;
    }

    .overview h2 {
      margin-top: 0;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      text-align: left;
      padding: 10px;
    }

    th {
      color: green;
    }

    td {
      vertical-align: top;
    }

    .action-btn {
      padding: 8px 16px;
      border-radius: 5px;
      border: 1px solid #ccc;
      cursor: pointer;
      margin-right: 10px;
    }

    .delete-btn {
      color: red;
      border-color: red;
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

    .modal {
      display: none;
      position: fixed;
      z-index: 1000;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
      background-color: #fff;
      margin: 8% auto;
      padding: 20px;
      border-radius: 10px;
      width: 40%;
      max-width: 500px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    .modal-content h2 {
      color: green;
      text-align: center;
    }

    .modal-content input,
    .modal-content textarea,
    .modal-content select {
      width: 100%;
      padding: 8px;
      margin-top: 5px;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .close {
      position: absolute;
      right: 20px;
      top: 10px;
      font-size: 28px;
      font-weight: bold;
      cursor: pointer;
    }

    .close:hover {
      color: red;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="sidebar">
    <div class="profile">
      <div class="profile-icon"></div>
      <div class="name">Jane Doe</div>
      <div class="role">Admin</div>
    </div>
    <nav class="menu">
      <a href="{{ route('admindashboard') }}" class="nav-item active">Home</a>
      <a href="{{ route('admindashstudents') }}" class="nav-item">Students</a>
      <a href="{{ route('admindashassessments') }}" class="nav-item">Assessments</a>
      <a href="{{ route('admindashreports') }}" class="nav-item">Reports</a>
      <a href="{{ route('admindashsettings') }}" class="nav-item">Settings</a>
    </nav>
    <div class="logout-section">
      <p>Welcome, Admin!</p>
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="logout-button">Log Out</button>
      </form>
    </div>
  </div>

  <div class="main">
    <h1>Assessments</h1>
    <button class="add-btn" onclick="openAddModal()">➕ Add Assessment</button>

    <div class="overview">
      <h2>Overview</h2>
      <table>
        <thead>
          <tr>
            <th>Assessment</th>
            <th>Taken</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Academic and Personality Skills</td>
            <td>{{ $takenCount }}</td>
            <td>
              <a href="{{ route('edit.assessment', ['name' => 'Academic and Personality Skills']) }}" class="action-btn">Edit</a>
              <form action="{{ route('delete.assessment', ['name' => 'Academic and Personality Skills']) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="action-btn delete-btn" onclick="return confirm('Are you sure?')">Delete</button>
              </form>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

  </div>

</div>

<div class="footer">
  Copyrights © 2025 BSHS. All rights reserved.
</div>

</body>
</html>
