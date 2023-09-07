<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ARE Super Market</title>

    <!--CSS Files-->
    <link rel="stylesheet" href="./css/supermarket.css" />
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
          <h2>Supermarket Equipments</h2>
          <p>
            We offer a diverse selection of commercial refrigerators to suit
            different business requirements.
          </p>
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
                  src="./images/home/freezer-5.png"
                  alt="freezer image"
                />
              </div>
              
        
             
            </div>
          </div>

         
        </div>
      </div>
    </section>
    <!--Banner Ends -->

    <!--clients Starts -->
    <section class="clients">
      <div class="clients-contents">
        <img
          class="intro-logo img-fluid"
          src="./images/are_logo_color_png.png"
          alt=""
        />
        <h1>Super Market Equipments</h1>
        <p>
          Advanced Refrigerations Est. popularly known as :ARE” has been in
          business in the Kingdom of Saudi Arabia since 1994. Since beginning,
          we have proudly served Saudi Arabia in a wide variety of fields. Right
          from commencement, we used our expertise and skills to build the
          business utilizing our superb technical ability and outstanding
          customer service with a desire to build a business which would grow
          and succeed in the retail market. We have identified the area of
          installation and service and special attention was given to this area
          and thereby a platform was created to develop the business further
        </p>
      </div>
    </section>
    <!--Intro Ends -->

    <!--Slider Starts -->
    <section class="prd-slider">
      <div class="prd-slider-contents">
        <div class="texts">
          <img src="./images/are_logo_color_png.png" alt="" />
          <h2>
            Revolutionising the field of industrial refrigeration technology
          </h2>
        </div>

        <div class="slider-contents">
          <div class="card_slider">
            <div class="prd-wrapper">
            <?php 
                require("./backEnd/compressorsCon.php");
                    
                $query = "SELECT * FROM `supermarket`";
                $result = mysqli_query($conn, $query);
                $fetch_prd_src = FETCHPRD_SRC;
                

                while($fetch = mysqli_fetch_assoc($result)) {
                  if ($fetch['url'] === 'supermarketSingle.php') {
                    // Store product data in session
                     $_SESSION['product_id'] = $fetch['id'];
                    $product_url = 'supermarketSingle.php';
                } else {
                    $product_url = $fetch['url'] . "?prdid=" . $fetch['id'];
                }

                  echo<<<supermarket
                      <div class="prd-slide">
                        <a href="$fetch[url]?prdid=$fetch[id]"><img
                          class="img-fluid"
                          src="$fetch_prd_src$fetch[image]"
                          alt=""
                        /></a>
                      
                        <div class="individual-slide">
                          <h3>$fetch[name]</h3>
                          <p>
                          $fetch[description]
                          </p>
                          <a href="$fetch[url]?prdid=$fetch[id]">
                        <button>View More</button>
                        </a>
                        </div>                  
                      </div>                  
                  supermarket;
                  
                }
              
              ?>
              <!-- <div class="prd-slide">
                <img
                  class="img-fluid"
                  src="./images/supermarket/evaporators.webp"
                  alt=""
                />
                <div class="individual-slide">
                  <h3>Refrigeration Cabinets</h3>
                  <p>
                    Offering exceptional value-for-money with all the quality
                    and professional specification that you would expect from
                    ARE.
                  </p>
                </div>
              </div> -->
              
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--Slider Ends -->

    <!--Slider2 Starts -->
    <section class="prd-slider500">
      <div class="prd-slider-contents500">
        <div class="texts500">
          <img src="./images/are_logo_color_png.png" alt="" />
          <h2>
            Revolutionising the field of industrial refrigeration technology
          </h2>
        </div>

        <div class="slider-contents500">
          <div class="swiper prd_slider500">
            <div class="swiper-wrapper">
            <?php 
                require("./backEnd/compressorsCon2.php");
                    
                $query = "SELECT * FROM `supermarket`";
                $result = mysqli_query($conn, $query);
                $fetch_prd_src = FETCHPRD2_SRC;
                

                while($fetch = mysqli_fetch_assoc($result)) {
                  if ($fetch['url'] === 'supermarketSingle.php') {
                    // Store product data in session
                     $_SESSION['product_id'] = $fetch['id'];
                    $product_url = 'supermarketSingle.php';
                } else {
                    $product_url = $fetch['url'] . "?prdid=" . $fetch['id'];
                }

                  echo<<<supermarket
                      <div class="swiper-slide">
                        <a href="$fetch[url]?prdid=$fetch[id]"><img
                          class="img-fluid"
                          src="$fetch_prd_src$fetch[image]"
                          alt=""
                        /></a>
                      
                        <div class="individual-slide">
                          <h3>$fetch[name]</h3>
                          <p>
                          $fetch[description]
                          </p>
                          <a href="$fetch[url]?prdid=$fetch[id]">
                        <button>View More</button>
                        </a>
                        </div>                  
                      </div>                  
                  supermarket;
                  
                }
              
              ?>
              <!-- <div class="swiper-slide">
                <img
                  class="img-fluid"
                  src="./images/home/slider-image-1a.png"
                  alt=""
                />
                <div class="individual-slide">
                  <h3>Industrial & Commercial Cold Rooms</h3>
                  <p>
                    Offering exceptional value-for-money with all the quality
                    and professional specification that you would expect from
                    ARE.
                  </p>
                </div>
              </div> -->
             
            </div>
            <div class="navi-icons">
              <div class="left-btn swiper-nav-prv">
                <i class="fa-solid fa-arrow-left"></i>
              </div>
              <div class="right-btn swiper-nav-nxt">
                <i class="fa-solid fa-arrow-right"></i>
              </div>
            </div>
          </div>
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
              <img class="img-fluid" src="./images/home/mail-icon.png" alt="" />
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
    <!-- <script src="./js/script.js"></script> -->

    <script src="./js/bannerSlide.js"></script>
    <script src="./js/prdPagePrdSlidr.js"></script>
    <script src="./js/toggleMenu.js"></script>
  </body>
</html>
