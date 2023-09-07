<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ARE Projects</title>

    <!--CSS Files-->
    <link rel="stylesheet" href="./css/projects.css" />
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
  </head>
  <body>
    <!--Header Navigation Starts -->
    <section class="navimon">
      <div class="logo img-fluid">
        <img src="./images/are_logo_white_png.png" alt="" />
      </div>
      <div class="linkGroup">
        <div class="navimon-links">
          <a href="index.html"><p>Home</p></a>
          <a href="about.html"><p>About</p></a>
          <a href="productsServices.php"><p>Product &amp; Services</p></a>
          <a href="projects.php"><p>Projects</p></a>
          <a href="contact.html"><p>Contact</p></a>
        </div>
        <a href="are_brochure.pdf" download="Are-Broucher">
          <div class="download-btn">
            <img src="./images/home/download-icon.png" alt="" />
            <p>Download</p>
          </div></a
        >
      </div>
      <i class="fa-solid fa-bars toggle-icon"></i>
    </section>
    <!--Header Navigation Ends -->

    <!-- Toggle menu Starts -->
    <div class="mobile-menu-overlay">
      <div class="close-btn">
        <i class="fa-solid fa-times"></i>
      </div>
      <div class="mobile-links">
        <a href="index.html">Home</a>
        <a href="about.html">About</a>
        <a href="productsServices.php">Product &amp; Services</a>
        <a href="projects.php">Projects</a>
        <a href="contact.html">Contact</a>
         <a href="are_brochure.pdf" download="Are-Broucher">Download</a>
      </div>
    </div>
    <!-- Toggle menu Ends -->

    <!--Banner Starts -->
    <section class="bannerSec">
      <img class="bannerBgImg" src="./images/home/home-banner-bg.png" alt="" />
      <div class="row banner-left-right">
        <div class="col col-md-5 banner-left-contents">
          <h2>Our Projects</h2>
          <p>We offer a diverse selection of commercial</p>
          <a href="#" class="banner-btn"
            >Get Started <span><i class="fa-solid fa-arrow-right"></i></span
          ></a>
        </div>
        <div class="col col-md-7 banner-right-contents">
          <div class="swiper bannerSlide">
            <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img
                  class="img-fluid"
                  src="./images/home/freezer-1.png"
                  alt="freezer image"
                />
              </div>
              <div class="swiper-slide">
                <img
                  class="img-fluid"
                  src="./images/home/freezer-2.png"
                  alt="freezer image"
                />
              </div>
              <div class="swiper-slide">
                <img
                  class="img-fluid"
                  src="./images/home/freezer-3.png"
                  alt="freezer image"
                />
              </div>
              <div class="swiper-slide">
                <img
                  class="img-fluid"
                  src="./images/home/freezer-4.png"
                  alt="freezer image"
                />
              </div>
              <div class="swiper-slide">
                <img
                  class="img-fluid"
                  src="./images/home/freezer-5.png"
                  alt="freezer image"
                />
              </div>
              <div class="swiper-slide">
                <img
                  class="img-fluid"
                  src="./images/home/slider-image-5.png"
                  alt="freezer image"
                />
              </div>
            </div>
          </div>

          <div class="lft-rgt-arrow-icons" style="
              z-index: 1000;
              transform: skewX(10deg);
              transform: rotate(-10deg);
            ">
            <div class="left-icon swiper-nav-prv-banner">
              <i class="fa-solid fa-arrow-left"></i>
            </div>
            <div class="right-icon swiper-nav-nxt-banner">
              <i class="fa-solid fa-arrow-right"></i>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--Banner Ends -->

    <!--Slider Starts -->
    <section class="prd-slider">
      <div class="prd-slider-contents">
        <div class="texts">
          <img src="./images/are_logo_color_png.png" alt="" />
          <h2>Our Projects</h2>
        </div>

        <div class="sortTabs">
          <button id="onGoingButton">OnGoing</button>
          <button id="completedButton">Completed</button>
        </div>

        <div class="project-contents" style="overflow: hidden;">

            <?php
                  require("./backEnd/prjctCon.php");

                  $query = "SELECT * FROM `projects`";
                  $result = mysqli_query($conn, $query);
                  $fetchprd_src = FETCHPRJCT_SRC;

                  while ($fetch = mysqli_fetch_assoc($result)) {
                      echo '<div class="singleProject" data-status="' . $fetch['status'] . '">';
                      echo '<div class="singleProjectImage">';

                      if (!empty($fetch['video'])) {
                          // Display video if it exists
                          echo '<video class="projectVideo " controls style="width: 100%; height: 100%; border-radius:15px;">';
                          echo '<source src="' . FETCHVIDPRJCT_SRC . $fetch['video'] . '" type="video/mp4">';
                          echo 'Your browser does not support the video tag.';
                          echo '</video>';
                      } elseif (!empty($fetch['image'])) {
                          // Display image if it exists
                          echo '<img class="projectImage img-fluid" src="' . $fetchprd_src . $fetch['image'] . '" alt="" />';
                      } else {
                          // No image or video
                          echo '<p>No image or video available</p>';
                      }

                      echo '</div>';
                      echo '<div class="singleProjectText">';
                      echo '<h2>' . $fetch['name'] . '</h2>';
                      echo '<p>' . $fetch['description'] . '</p>';
                      echo '</div>';
                      echo '</div>';
                  }
                ?>


        <!-- <?php 
              require("./backEnd/prjctCon.php");
                  
              $query = "SELECT * FROM `projects`";
              $result = mysqli_query($conn, $query);
              $fetchprd_src = FETCHPRJCT_SRC;

              while($fetch = mysqli_fetch_assoc($result)) {
                echo<<<project
                      <div class="singleProject">
                      <div class="singleProjectImage">
                        <img
                          class="projectImage img-fluid"
                          src="$fetchprd_src$fetch[image]"
                          alt=""
                        />
                      </div>
                      <div class="singleProjectText">
                        <h2>$fetch[name]</h2>
                        <p>
                        $fetch[description]
                        </p>
                      </div>
                    </div>               
                project;
                
              }
            
            ?> -->
     

          

        </div>
      </div>
    </section>
    <!--Slider Ends -->

    <!--We have more Starts -->
    <section class="weHaveMore">
      <img
        class="img-fluid backgrnd"
        src="./images/home/wehavemore-bg2.png"
        alt=""
      />
      <div class="weHaveMore-contents">
        <div class="weHaveMore-left">
          <div class="whm-left-contents">
            <h2>We have more</h2>
            <h3>Only for You!</h3>
            <p>
              Subscribe our news letter to get more BIG DEALS and special
              promotion only for you
            </p>

            <div class="whm-subscribe">
              <img
                class="img-fluid mailIcon"
                src="./images/home/mail-icon.png"
                alt=""
              />
              <input type="email" placeholder="Type Your Mail Id..." />
              <button>Subscribe</button>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--We have more Ends -->

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
    <script src="./js/toggleMenu.js"></script>
     <script src="./js/projectSort.js"></script>
  </body>
</html>
