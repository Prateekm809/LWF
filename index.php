<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Learn With fun</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
<link rel="stylesheet" href="mediaq.css">
<style>
.form-submit {
  padding: 18px 30px;
  border: none;
  background-color: #0a3cce;
  color: #fff;
  border-radius: 50px;
  margin-top: 2vw;
}
.f1 {
    max-width: 500px;
    margin: 0 auto;
    background-color: black;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
}

.form-label {
    display: block;
    margin-bottom: 10px;
    color: #fff;
}

.form-input,
.form-textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 14px;
}

.form-textarea {
    height: 100px;
    resize: vertical;
}

.form-submit {
    background-color: blue;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

.form-submit:hover {
    background-color: royalblue;

}
</style>
</head>

<body>
  <div id="cursor"></div>
    
  <div id="main">
     
    <div id="page1">
      <nav id="nav">
       
        <div class="left-nav">
          <img src="images/Logooo.png" alt="learnWithFun">
          
        </div>
        <div id="right-nav">
          <button class="custom-button"><a href="signup.php" target="_blank" rel="noopener noreferrer" style="color:#fff"><i class="fas fa-user-plus" style="color: #fff;"></i><br>Sign UP</a></button>
          
        </div>
      </nav>
      
      
      
      <div class="first-box" id="box1">
      <h1> Fun Learning <br>
better than <br> Dull Learning</h1> 
          
<div class="first-box-inside1">
  <h4>Elevate your learning,<br>
            game on,and find peace</h4>
            
</div>
<!--   <div class="Second-box" id="box2">-->
<!--      <h1> Fun Learning <br>-->
<!--better than <br> Dull Learning</h1> -->
          
<!--<div class="Second-box-inside">-->
<!--  <h4>Elevate your learning,<br>-->
<!--            game on,and find peace</h4>-->
            
<!--</div>-->


          </div>
          
    <video src="videos/bg9.mp4" autoplay loop muted></video>
  </div>
   
  <div id="page2">
    <h2> YOUR INNER GAMER WITH EDUCATIONAL FUN</h2>
    <h1>Who says learning can't be fun? Embark on This exciting learning journey through our Education-based game. Improve your skills While having a blast.</h1>
  </div>
  <div id="page3">
    <div class="page3-cir">
      <div class="page3-cir-small"> <h2>Time To Learn <br>  With Fun</h2></div>
    </div>
    <canvas></canvas>
    
  </div>
  <div id="page4">
    <div class="page4-bottom">
      <h1>Ready For the Best Experiece</h1>
      
    </div>
    <video src="videos/portal.mp4" autoplay loop muted></video>
  </div>
      <?php include 'detail.html';?>
  <!--<div id="page5">-->
   
    <!--<div id="about-us">-->
     
    <!--  <div id="about-us-in">-->
    <!--    <h3>ABOUT US</h3>-->
    <!--    <p>-->
    <!--      we Prateek and Ishita are passionate coders who share a deep love for coding and a relentless thirst for learning new technologies. They embrace challenges, push boundaries, and constantly seek to expand their knowledge. Their unwavering dedication and enthusiasm inspire others in the coding community.-->
    <!--    </p>-->
    <!--  </div>-->
    <!--  <img-->
    <!--  src="images/P.jpg" alt="" class="us"/>-->
    <!--    <div class="det" id="prateekDiv">Prateek<br><i class="fas fa-link"></i>(More details)</div>-->
     
    <!--  <img src="images/i.jpeg" alt="" class="us"/>-->
    <!--<div class="det" id="ishitaDiv">Ishita<br><i class="fas fa-link"></i>(More details)</div>-->
    <!--</div>-->
    <!--</div>-->
        <div id="green-div">
      <img
        src="https://eiwgew27fhz.exactdn.com/wp-content/themes/puttosaurus/img/dots-side.svg"
        alt=""
      />
      <h4>
        OUR RECENT USERS
      </h4>
      <img
        src="https://eiwgew27fhz.exactdn.com/wp-content/themes/puttosaurus/img/dots-side.svg"
        alt=""
      />
    </div>
  <div id="page6">
   
    <div id="cards-container">
      <div class="card" id="card1">
        <div class="overlay">
          <h4>Sajan</h4>
          <p>
            "Learn with Fun website exceeded my expectations. The interactive lessons, quizzes, and engaging visuals made learning fun and engaging. Highly recommended!"
          </p>
        </div>
      </div>
      <div class="card" id="card2">
        <div class="overlay">
          <h4>Kumkum</h4>
          <p>
            "Learn with Fun website provides an engaging and interactive learning experience. The content is educational and enjoyable, making it easy to grasp complex concepts."
          </p>
        </div>
      </div>
      <div class="card" id="card3">
        <div class="overlay">
          <h4>Sudhir</h4>
          <p>
            "I had a great time using Learn with Fun website. The gamified approach to learning made studying a lot more enjoyable and helped me retain information more effectively."
          </p>
        </div>
      </div>
    </div>

  </div>
   <?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $comment = $_POST['comment'];

    // Insert data into the database
    $sql = "INSERT INTO comments (name, comment) VALUES ('$name', '$comment')";
    if ($conn->query($sql) === TRUE) {
        echo "Comment submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
  
  <div id="page7">
    <h1 class="fh1">Become an
        <br>
        early Applicant</h1>
       <form action="index.php" method="POST" class="f1">
        <label for="name" class="form-label">Name:</label>
        <input type="text" id="name" name="name" class="form-input" required><br><br>
        
        <label for="comment" class="form-label">Comment:</label><br>
        <textarea id="comment" name="comment" rows="5" cols="50" class="form-textarea" required></textarea><br><br>
        
        <input type="submit" value="Submit" class="form-submit">
    </form>

  </div>
  <div id="page8">
    <div class="page8-inner">
     
        <h1><i class="ri-facebook-circle-line"></i>Facebook</h1>
        <i class="ri-arrow-right-up-line"></i>
        <div class="center8"></div>
    </div>
    <div class="page8-inner">
      
        <h1> <i class="ri-linkedin-box-fill"></i>LinkedIn</h1>
        <i class="ri-arrow-right-up-line"></i>
        <div class="center8"></div>

    </div>
    <div class="page8-inner">
      
        <h1><i class="ri-instagram-line"></i>Instagram</h1>
        <i class="ri-arrow-right-up-line"></i>
        <div class="center8"></div>

    </div>
</div>
   
<script>
  
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.1/gsap.min.js" integrity="sha512-qF6akR/fsZAB4Co1QDDnUXWnaQseLGXoniuSuSlPQK6+aWhlMZcHzkasCSlnWoe+TJuudlka1/IQ01Dnhgq95g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.1/ScrollTrigger.min.js" integrity="sha512-IHDCHrefnBT3vOCsvdkMvJF/MCPz/nBauQLzJkupa4Gn4tYg5a6VGyzIrjo6QAUy3We5HFOZUlkUpP0dkgE60A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
  <script src="script.js"></script>
 <script>
    
     
  window.watsonAssistantChatOptions = {
    integrationID: "00f16774-9adb-442f-ad90-67c4b8e3e65b", // The ID of this integration.
    region: "eu-gb", // The region your integration is hosted in.
    serviceInstanceID: "b7d96ec3-5055-48f2-a06e-ce58bc45ddb7", // The ID of your service instance.
    onLoad: async (instance) => { await instance.render(); }
  };
  setTimeout(function(){
    const t=document.createElement('script');
    t.src="https://web-chat.global.assistant.watson.appdomain.cloud/versions/" + (window.watsonAssistantChatOptions.clientVersion || 'latest') + "/WatsonAssistantChatEntry.js";
    document.head.appendChild(t);
  });
</script>
     
</script>

//  <script>
//     // Get the div element by its class
//     var prateekDiv = document.getElementById('prateekDiv');
//     var ishitaDiv = document.getElementById('ishitaDiv');
//     // Add a click event listener to the div
//     prateekDiv.addEventListener('click', function() {
//       // Redirect the user to the specified link
//       window.location.href = 'http://prateek24.pythonanywhere.com/';
//     });
//       ishitaDiv.addEventListener('click', function() {
//       // Redirect the user to the specified link
//       window.location.href = 'https://ishitagrover23.github.io/final-cv/';
//     });
//   </script>
</body>
</html>