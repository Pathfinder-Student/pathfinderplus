<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Students</title>
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
      flex-grow: 1;
      padding: 40px;
    }
    .main h1 {
      font-size: 24px;
      font-weight: bold;
      text-align: center;
    }
    .search-section {
      display: flex;
      justify-content: center;
      gap: 20px;
      margin: 30px 0;
    }
    .search-section input {
      padding: 10px;
      width: 250px;
      border: 1px solid green;
      border-radius: 6px;
    }
    .search-section button {
      background-color: green;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
    }
    .add-button {
      background-color: green;
      color: white;
      padding: 10px 15px;
      border: none;
      border-radius: 6px;
      margin-left: 40px;
      cursor: pointer;
      display: inline-flex;
      align-items: center;
    }
    .add-button::before {
      content: "👤 ";
      margin-right: 5px;
    }
    .table {
      margin: 30px 40px;
    }
    .table h2 {
      font-size: 20px;
      margin-bottom: 15px;
    }
    .table-header, .table-row {
      display: grid;
      grid-template-columns: 60px 1fr 1fr 1fr 100px;
      align-items: center;
      padding: 10px 0;
      border-bottom: 1px solid #ccc;
    }
    .table-header {
      font-weight: bold;
      color: green;
    }
    .table-row img {
      width: 45px;
      height: 45px;
      border-radius: 50%;
      background-color: green;
    }
    .view-button {
      border: 1px solid green;
      color: green;
      background-color: white;
      padding: 5px 10px;
      border-radius: 6px;
      cursor: pointer;
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
        <a href="{{route('admindashboard')}}" class="nav-item">Home</a>
        <a href="{{route('admindashstudents')}}" class="nav-item active">Students</a>
        <a href="{{route('admindashassessments')}}" class="nav-item">Assessments</a>
        <a href="{{route('admindashreports')}}" class="nav-item">Reports</a>
        <a href="{{route('admindashsettings')}}" class="nav-item">Settings</a>
      </nav>
    <div class="logout-section">
      <p>Welcome, Admin!</p>
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
    @csrf
    <button type="submit" class="logout-button">Log Out</button>
    </form>
    </div>
  </div>

 <div class="main">
    <h1>Students</h1>

   <form id="searchForm" onsubmit="return false;">
  <input type="text" name="name" placeholder="Search by Student’s Name" id="searchName" onkeyup="filterStudents()">
  <input type="text" name="section" placeholder="Search by Section" id="searchSection" onkeyup="filterStudents()">
</form>

    <button class="add-button">Add Student</button>

    <div class="table">
        <h2>Overview</h2>
        <div class="table-header">
            <div>Image</div>
            <div>Name</div>
            <div>Section</div>
            <div>Last Activity</div>
            <div>Details</div>
        </div>
@foreach ($users as $user)
    <div class="table-row">
        <img src="{{ asset($user->profile_picture ?? 'images/user-icon.png') }}" alt="User">
        <div>{{ $user->fullname }}</div>
        <div>{{ $user->section }}</div>
        <div>{{ $user->updated_at->format('d M Y') }}</div>
<button class="view-button" onclick="openUserModal({{ $user->id }}, '{{ addslashes($user->fullname) }}', '{{ addslashes($user->section) }}', '{{ asset($user->profile_picture ?? 'images/user-icon.png') }}', '{{ $user->updated_at->format('d M Y') }}')">View</button>
      </div>
@endforeach
    </div>
</div>


<!-- User Details Modal -->
<div id="userModal" class="modal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background: rgba(0,0,0,0.5);">
  <div class="modal-content" style="background:#fff; padding:20px; margin: 50px auto; width: 400px; border-radius: 8px; position: relative;">
    <span onclick="closeUserModal()" style="cursor:pointer; position:absolute; top:10px; right:15px; font-size: 24px;">&times;</span>
    <img id="modalProfilePic" src="" alt="Profile Picture" style="width:100px; height:100px; border-radius:50%; background-color:green; display:block; margin: 0 auto 10px;">
    <h2 id="modalFullname" style="text-align:center; color:green;"></h2>
    <p><strong>Section:</strong> <span id="modalSection"></span></p>
    <p><strong>Last Activity:</strong> <span id="modalLastActivity"></span></p>
  </div>
</div>

<script>
function openUserModal(id, fullname, section, profilePic, lastActivity) {
  document.getElementById('modalProfilePic').src = profilePic;
  document.getElementById('modalFullname').textContent = fullname.toUpperCase();
  document.getElementById('modalSection').textContent = section;
  document.getElementById('modalLastActivity').textContent = lastActivity;

  document.getElementById('userModal').style.display = 'block';
}

function closeUserModal() {
  document.getElementById('userModal').style.display = 'none';
}

window.onclick = function(event) {
  const modal = document.getElementById('userModal');
  if (event.target == modal) {
    closeUserModal();
  }
}
</script>

<script>
function filterStudents() {
  const nameInput = document.getElementById('searchName').value.toLowerCase();
  const sectionInput = document.getElementById('searchSection').value.toLowerCase();

  const rows = document.querySelectorAll('.table-row');

  rows.forEach(row => {
    const name = row.children[1].textContent.toLowerCase();
    const section = row.children[2].textContent.toLowerCase();

    const nameMatches = name.includes(nameInput);
    const sectionMatches = section.includes(sectionInput);

    if (nameMatches && sectionMatches) {
      row.style.display = '';
    } else {
      row.style.display = 'none';
    }
  });
}
</script>


<div class="footer">
  Copyrights © 2025 BSHS. All rights reserved.
</div>

</body>
</html>
