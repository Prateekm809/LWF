<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Welcome</title>
 
    <!-- Google Fonts Link For Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0" />
    <script src="chatbot.js" defer></script>
  <link rel="stylesheet" href="learn.css" />
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">
  <style>
     #user-cog {
            width: 30px;
            height: 30px;

            cursor: pointer;
        }
        
        .user-popup {
            background-color: #f2f2f2;
            padding: 10px;
            border: 1px solid #999;
        }
        /* Styling for the dropdown menu */
.dropdown {
  position: relative;
}

.dropdown-menu {
  display: none;
  position: absolute;
  top: 100%;
  left: 0;
  z-index: 1;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
  padding: 0;
  border-radius:20px;
}

.dropdown-menu li {
  list-style: none;
}

.dropdown-menu li a {
  display: block;
  padding: 10px;
  text-decoration: none;
  color: #333;
}

/* Styling when hovering over the dropdown link */
.dropdown:hover .dropdown-menu {
  display: block;
}
.dropdown-menu li a {
  display: block;
  padding: 10px;
  text-decoration: none;
  color: #333;
  transition: background-color 0.3s ease;
  width:200px;
}


.dropdown-menu li a:hover {
  background-color: #f1f1f1;
}

        </style>
</head>
<body>
  <div class="container">
    <nav>
      <ul>
        <li><a href="#" class="logo">
          <img src="images/Logooo.png" alt="">
          <span class="nav-item">DashBoard</span>
        </a></li>
        <li><a href="index.php">
          <i class="fas fa-home"></i>
          <span class="nav-item">Home</span>
        </a></li>
        <li><a href="songs.html">
         <i class="fas fa-music"></i>
          <span class="nav-item">Music</span>
        </a></li>
        
<li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <i class="fas fa-gamepad"></i>
    <span class="nav-item">Games</span>
  </a>
  <ul class="dropdown-menu">
   
    <li><a href="games.html" target="_blank">Programming</a></li>
    <li><a href="game2.html" target="_blank">CSS Practice</a></li>
    <li><a href="game3.html" target="_blank">FlexBox</a></li>
    
  </ul>
</li>

        <li><a href="logout.php" class="logout">
        
          <span class="nav-item">Logout <i class="fas fa-sign-out-alt"></i></span>
        </a></li>
      </ul>
    </nav>

    <section class="main">
      <div class="main-top">
        <h1>Skills</h1>
        <i class="fas fa-user-cog" id="user-cog"></i>
      </div>
      <div class="main-skills">
        <div class="card">
            <i class="ri-html5-line"></i>
          <h3>HTML</h3>
          <p>Learn Html</p>
          <button><a href="https://www.w3schools.com/html/">Get Started</a></button>
        </div>
        <div class="card">
            <i class="fab fa-js-square "></i>
          <h3>JavaScript</h3>
          <p>From Basic To Advance</p>
          <button><a href="https://www.w3schools.com/js/default.asp">Get Started</a></button>
        </div>
        <div class="card">
            <i class="fab fa-python"></i>
          <h3>Python</h3>
          <p>Learn most demanding languages</p>
          <button><a href="https://www.w3schools.com/python/default.asp">Get Started</a></button>
        </div>
        <div class="card">
          <i class="fab fa-php"></i>
          <h3>PHP</h3>
          <p>Backend</p>
          <button><a href="https://www.w3schools.com/php/default.asp">Get Started</a></button>
        </div>
      </div>

      <section class="main-course">
        <h1>Give Live tests</h1>
        <div class="course-box">
          <ul>
            <li class="active">In progress</li>
            <li>Upcoming</li>
            <li>coming soon</li>
            <li>Coming soon</li>
          </ul>
          <div class="course">
            <div class="box">
              <h3>HTML</h3>
              
              <button><a href="htmllquiz.html">Start Test</a></button>
              <i class="fab fa-html5 html"></i>
            </div>
            <div class="box">
              <h3>Python</h3>
              <button><a href="pythonQuiz.html">Start Test</a></button>
              <i class="fab fa-python fa-lg" style="color: #5a00e0;"></i>
            </div>
            <div class="box">
              <h3>JavaScript</h3>
              <button><a href="jsquiz.html">Start Test</a></button>
              <i class="fab fa-js-square js"></i>
            </div>
          </div>
        </div>
      </section>
   

   
  </div>
 <button class="chatbot-toggler">
      <span class="material-symbols-rounded">mode_comment</span>
      <span class="material-symbols-outlined">close</span>
    </button>
    <div class="chatbot">
      <header>
        <h2>Learn With Fun</h2> </h2>
        <span class="close-btn material-symbols-outlined">close</span>
      </header>
      <ul class="chatbox">
        <li class="chat incoming">
          <span class="material-symbols-outlined">smart_toy</span>
          <p>Hello👋 am Shiksha  <br> have anything to ask me?</p>
        </li>
      </ul>
      <div class="chat-input">
        <textarea placeholder="Enter a message..." spellcheck="false" required></textarea>
        <span id="send-btn" class="material-symbols-rounded">send</span>
      </div>
    </div>


<?php

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    echo "
        <script>
            document.getElementById('user-cog').addEventListener('click', function(event) {
                event.stopPropagation();
                var existingPopup = document.getElementById('popup');
                
                // Toggle visibility of the popup
                if (existingPopup) {
                    existingPopup.remove();
                } else {
                    var popup = document.createElement('div');
                    popup.classList.add('user-popup');
                    
                    var content = document.createElement('span');
                    content.classList.add('user-email');
                    content.textContent = 'Welcome $email';
                    
                    popup.appendChild(content);
                    
                    var icon = document.getElementById('user-cog');
                    popup.style.position = 'absolute';
                    popup.style.top = icon.offsetTop + icon.offsetHeight + 'px';
                    popup.style.left = icon.offsetLeft + 'px';
                    
                    popup.id = 'popup'; // Set the ID of the popup element
                    
                    document.body.appendChild(popup);
                }
            });
            
            document.addEventListener('click', function(event) {
                var popup = document.getElementById('popup');
                if (popup && !popup.contains(event.target) && event.target !== document.getElementById('user-cog')) {
                    popup.remove();
                }
            });
        </script>
    ";
}
?>



</body>
</html>
