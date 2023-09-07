<?php require('./backEnd/login.php'); 

session_start();

if(isset($_SESSION['AdminLoginId'])) {
  header("location: areAdmPanel.php"); // Redirect to admin panel if already logged in
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ARE Admin Login</title>

    <!--CSS Files-->
    <link rel="stylesheet" href="./css/adminLogin.css" />
    <link rel="stylesheet" href="./css/swiper-bundle.min.css" />

    <!--Bootstrap CSS Files-->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <script type = "text/javascript">
      function preventBack(){window.history.forward()};
      setTimeout("preventBack()",0);
      window.onload=function(){null;};
    </script>
  </head>
  <body>
    <!--Header Navigation Starts -->
    <section class="navimon">
      <div class="logo img-fluid">
        <img src="./images/are_logo_white_png.png" alt="" />
      </div>
      <!-- <div class="linkGroup">
        <div class="navimon-links">
          <a href="index.html"><p>Home</p></a>
          <a href="about.html"><p>About</p></a>
          <a href="productsServices.html"><p>Product &amp; Services</p></a>
          <a href="projects.html"><p>Projects</p></a>
          <a href="contact.html"><p>Contact</p></a>
        </div>
        <div class="download-btn">
          <img src="./images/home/download-icon.png" alt="" />
          <p>Download</p>
        </div>
      </div>
      <i class="fa-solid fa-bars"></i> -->
    </section>
    <!--Header Navigation Ends -->

    <!--Slider Starts -->
    <section class="prd-slider">
      <div class="prd-slider-contents">
        <div class="texts">
          <img src="./images/are_logo_color_png.png" alt="" />
          <h2>Login With Your Credintials</h2>
        </div>

        <div class="project-contents">
          <form class="loginNow" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
            <div class="inputs">
              <input type="text" placeholder="Username" name="AdminName" />
              <input type="password" placeholder="Password" name="AdminPass" />

              <button type="submit" name="LoginBtn" >LOGIN NOW</button>
            </div>
          </form>
        </div>
      </div>
    </section>
    <!--Slider Ends -->

    <?php 

    function input_filter($data){
      $data=trim($data);
      $data=stripslashes($data);
      $data=htmlspecialchars($data);
      return $data;
    }
    
    if(isset($_POST['LoginBtn'])) {
      #filtering user input
      $AdminName=input_filter($_POST['AdminName']);
      $AdminPass=input_filter($_POST['AdminPass']);
      
      #Escaping special symbols used in SQL Statement
      $AdminName=mysqli_real_escape_string($conn, $AdminName);
      $AdminPass=mysqli_real_escape_string($conn, $AdminPass);

      #Query Template
      $query="SELECT * FROM `areadmlogin` WHERE `admin_name` =? AND `admin_pass`=?";

      #prepared Statement
      if($stmt=mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($stmt, "ss", $AdminName, $AdminPass);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt)==1) {
          session_start();
          $_SESSION['AdminLoginId']=$AdminName;
          header("location: areAdmPanel.php");
        }
        else
        {
          echo"<script>alert('invali admin name or password');</script>";
        }
        
        mysqli_stmt_close($stmt);
      }
      else {
        echo"<script>alert('SQL Query cannot be prepared');</script>";
        
      };


    }
    
    ?>

    <!--Footer Starts -->
    <section class="footerr">
      <div class="footer-row">
        <div class="logo-col">
          <img src="./images/are_logo_white.svg" alt="" />
        </div>
        <div class="company-col">
          <h3>Company</h3>
          <a href="index.html">Home</a>
          <a href="about.html">About</a>
          <a href="productsServices.php">Products</a>
          <a href="projects.php">Projects</a>
          <a href="#">Terms & Conditions</a>
          <a href="#">Privacy Policy</a>
          <a href="contact.html">Contact</a>
        </div>
        
        <div class="social-col">
          <h3>Social</h3>
          <a href="https://facebook.com/">Facebook</a>
          <a href="https://instagram.com/">Instagram</a>
          <a href="https://twitter.com/">Twitter</a>
        </div>
      </div>
    </section>
    <!--Footer Ends -->

    <!--Java Script Starts -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>

    <!--Swiper script Starts -->
    <script src="js/swiper-bundle.min.js"></script>
    <script src="./js/script.js"></script>

    <script src="./js/bannerSlide.js"></script>
  </body>
</html>
