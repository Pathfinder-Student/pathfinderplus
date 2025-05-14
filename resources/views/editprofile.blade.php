<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Profile</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* ===== General Reset ===== */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Arial', sans-serif;
}

/* ===== Body Styling ===== */
body {
  background-color: #f8fef7;
}

/* ===== Navigation Bar ===== */
.navbar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  background: rgba(255, 255, 255, 0.598);
  padding: 10px 5%;
  box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.5);
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

.nav-left {
  display: flex;
  align-items: center;
}

.nav-left .logo {
  width: 60px;
  margin-right: 20px;
}

.nav-left nav a {
  margin: 0 15px;
  text-decoration: none;
  color: #333;
  font-weight: bold;
}

.nav-left nav a:hover {
  color: #217c1f;
}

.nav-right .logout-button {
  background-color: #217c1f;
  color: white;
  padding: 8px 16px;
  border: none;
  border-radius: 6px;
  cursor: pointer;
  font-weight: bold;
}

.nav-right .logout-button:hover {
  background-color: #185c16;
}
  
  /* ===== Edit Profile Container ===== */
  .edit-profile-container {
    display: flex;
    justify-content: center;
    padding: 40px 20px;
    margin-top: 50px;
  }
  
  .edit-profile-card {
    background: #ffffff;
    border-radius: 15px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
    padding: 30px 40px;
    max-width: 600px;
    width: 100%;
    text-align: center;
    position: relative;
    overflow: hidden;
  }
  
  /* ===== Profile Picture ===== */
  .profile-picture img {
    width: 120px;
    height: 120px;
    object-fit: cover;
    border-radius: 50%;
    margin-bottom: 15px;
  }
  
  /* ===== Picture Buttons ===== */
  .picture-buttons {
    display: flex;
    justify-content: center;
    gap: 15px;
    margin-bottom: 30px;
  }
  
  .picture-buttons button {
    padding: 8px 14px;
    border: 1px solid #217c1f;
    background-color: white;
    color: #217c1f;
    border-radius: 6px;
    cursor: pointer;
    font-weight: bold;
  }
  
  .picture-buttons button:hover {
    background-color: #e6f3e5;
  }
  
  /* ===== Form Styling ===== */
  form h2 {
    margin-bottom: 20px;
    color: #333;
  }
  
  form input {
    width: 100%;
    padding: 12px 15px;
    margin-bottom: 15px;
    border: 1px solid #217c1f;
    border-radius: 8px;
    font-size: 16px;
  }
  
  /* ===== Form Buttons ===== */
  .form-buttons {
    display: flex;
    justify-content: center;
    gap: 15px;
    margin-top: 10px;
  }
  
  .save-btn {
    background-color: #217c1f;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-weight: bold;
  }
  
  .save-btn:hover {
    background-color: #185c16;
  }
  
  .discard-btn {
    background-color: white;
    color: #333;
    padding: 10px 20px;
    border: 1px solid #ccc;
    border-radius: 6px;
    cursor: pointer;
    font-weight: bold;
  }
  
  .discard-btn:hover {
    background-color: #f0f0f0;
  }
  
 
 /* ===== Academic Skills Styling (match Edit Profile) ===== */
.academic-skills-container {
    display: flex;
    justify-content: center;
    padding: 40px 20px;
  }
  
  .academic-skills-card {
    background: #ffffff;
    border-radius: 15px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
    padding: 30px 40px;
    max-width: 600px;
    width: 100%;
    text-align: center;
    position: relative;
    overflow: hidden;
  }
  
  #academicSkillsForm h2 {
    margin-bottom: 20px;
    color: #333;
  }
  
  #academicSkillsForm input {
    width: 100%;
    padding: 12px 15px;
    margin-bottom: 15px;
    border: 1px solid #217c1f;
    border-radius: 8px;
    font-size: 16px;
  }
  
  #academicSkillsForm .form-buttons {
    display: flex;
    justify-content: center;
    gap: 15px;
    margin-top: 10px;
  }
  
  #academicSkillsForm .save-btn {
    background-color: #217c1f;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-weight: bold;
  }
  
  #academicSkillsForm .save-btn:hover {
    background-color: #185c16;
  }
  
  #academicSkillsForm .discard-btn {
    background-color: white;
    color: #333;
    padding: 10px 20px;
    border: 1px solid #ccc;
    border-radius: 6px;
    cursor: pointer;
    font-weight: bold;
  }
  
  #academicSkillsForm .discard-btn:hover {
    background-color: #f0f0f0;
  }
 
 /* Divider Line */
.divider-line {
  margin: 40px 0 0 0;
  border: none;
  border-top: 1px solid #ccc;
}

/* Footer Styling */
footer {
  background-color: #ffffff;
  border: 1px solid black;
}

.footer-top {
  display: flex;
  justify-content: space-around;
  align-items: center;
  padding: 20px;
  flex-wrap: wrap;
}

.footer-logos img {
  width: 60px;
  margin: 0 10px;
}

.footer-nav {
  display: flex;
  gap: 30px;
}

.footer-nav a {
  text-decoration: none;
  color: #333;
  font-weight: bold;
  font-size: 16px;
}

.footer-nav a:hover {
  text-decoration: underline;
  color: #217c1f;
}

.footer-bottom {
  background-color: #217c1f;
  color: white;
  text-align: center;
  padding: 12px 0;
  font-size: 14px;
}        
  </style>
</head>
<body>
<header class="navbar">
  <div class="nav-left">
    <img src="{{ asset('images/BSHS Logo.png')}}" alt="School Logo" class="logo">
  </div>
  <div class="nav-right">
<form action="{{ route('logout') }}" method="POST" style="display: inline;">
    @csrf
    <button type="submit" class="logout-button">Log Out</button>
</form>  </div>
</header>

<!-- Edit Profile Form -->
<section class="edit-profile-container">
  <div class="edit-profile-card">
    <div class="profile-picture">
      <img src="{{ Auth::user()->profile_picture ?? asset('images/default-profile.jpg') }}" alt="Profile Picture" id="profileImage">
    </div>
    <div class="picture-buttons">
      <button type="button" onclick="editProfilePicture()">Edit Profile Picture</button>
      <button type="button" onclick="removeProfilePicture()">Remove Profile Picture</button>
    </div>

    <!-- Edit Profile Form -->
    <form id="profileForm" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
      @csrf
      <h2>Edit Profile</h2>
      <input type="file" name="profile_picture" id="profilePictureInput" accept="image/*" style="display: none;">

      <input type="email" name="email" id="email" value="{{ Auth::user()->email }}" placeholder="Email Address" required>
      <input type="text" name="contact" id="contact" value="{{ Auth::user()->contact }}" placeholder="Contact Number" required>
      <input type="text" name="address" id="address" value="{{ Auth::user()->address }}" placeholder="Address" required>

      <div class="form-buttons">
        <button type="submit" class="save-btn">Save</button>
        <button type="reset" class="discard-btn">Discard</button>
      </div>
    </form>
  </div>
</section>

<!-- JavaScript for functionality -->
<script>
  function editProfilePicture() {
    const fileInput = document.getElementById('profilePictureInput');
    fileInput.click();

    fileInput.onchange = function (event) {
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
          document.getElementById('profileImage').src = e.target.result;
        };
        reader.readAsDataURL(file);
      }
    };
  }

  function removeProfilePicture() {
    document.getElementById('profileImage').src = "{{ asset('images/default-profile.jpg') }}";
    document.getElementById('profilePictureInput').value = null;
  }
</script>





<hr class="divider-line">
  
 <footer class="footer">
    <div class="footer-top">
      <div class="footer-logos">
        <img src="{{ asset('images/BSHS Logo.png') }}" alt="Logo 1">
        <img src="{{ asset('images/kagawaran ng edukasyon_logo.png') }}" alt="Logo 2">
        <img src="{{ asset('images/deped_logo.png') }}" alt="Logo 3">
      </div>
      <nav class="footer-nav">
        <a href="{{ route('studentdashboard') }}">Dashboard</a>
      </nav>
    </div>
  
    <div class="footer-bottom">
      <p>Copyrights © 2025 BSHS. All rights reserved.</p>
    </div>
  </footer>

<script>
document.getElementById('profileForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const email = document.getElementById('email').value;
    const contact = document.getElementById('contact').value;
    const address = document.getElementById('address').value;

    fetch('/student/update-profile', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            email: email,
            contact: contact,
            address: address
        })
    })
    .then(response => response.json())
    .then(data => {
        alert('Profile updated successfully!');

    })
        console.error('Error:', error);
        alert('An error occurred while updating the profile.');
    });
});
</script>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>