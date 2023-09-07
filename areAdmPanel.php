<?php 
  session_start();
  session_regenerate_id(true);

  if(!isset($_SESSION['AdminLoginId'])) {
    header("location: adminLogin.php");
    exit();
  }
 

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ARE Admin Dashboard</title>

    <!--CSS Files-->
    <link rel="stylesheet" href="./css/areAdmPanel.css" />
    <link rel="stylesheet" href="./css/swiper-bundle.min.css" />

    <!--Bootstrap CSS Files-->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />

    <!--Java Script Starts - Bootstrap Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


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
      <div class="linkGroup">
        <div class="navimon-links">
          <a href="areAdmPanel.php"><p>Dashboard</p></a>
          <a href="allProducts.php"><p>Products</p></a>
          
          <a href="allProjects.php"><p>Projects</p></a>

          <p><?php echo $_SESSION['AdminLoginId'] ?></p>
         <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
         
        <button class="btn btn-dark" type="submit" name="logout" >Logout <i class="fa-solid fa-power-off"></i></button>
        </form> 
        </div>
      </div>
      <i class="fa-solid fa-bars"></i>
    </section>
    <!--Header Navigation Ends -->

    <?php 
    
      if(isset($_POST['logout']))
      {
        session_destroy();
        header("location: adminLogin.php");
      }
    
    
    ?>

    <!--Slider Starts -->
    <section class="prd-slider">
      <div class="prd-slider-contents">
        <div class="texts">
          <img src="./images/are_logo_color_png.png" alt="" />
          <h2>Welcome to ARE Dashboard.</h2>
        </div>

        <div class="project-contents">
          <div class="editTabs">            
            <a href="allProducts.php"><button>Add/Edit Product</button></a>
            <a href="allProjects.php"><button>Add/Edit Project</button></a>
            <a href="allSupermarkets.php"><button>Add/Edit Super Market</button></a>
            <a href="allCompressors.php"><button>Add/Edit Compressors</button></a>
            <a href="allRefridgerationcabinets.php"><button>Add/Edit Refridgeration Cabinets</button></a>
            <a href="smrelatedproducts.php"><button>Add/Edit SM Related Products</button></a>
            <a href="rcrelatedproducts.php"><button>Add/Edit RC Related Products</button></a>
            <a href="compressorrelatedproducts.php"><button>Add/Edit Compressor Related Products</button></a>
          </div>
        </div>
        <h4>*Click on the tab which you want to work with</h4>
      </div>
    </section>
    <!--Slider Ends -->

   <!-- Add New Product Modal -->
<div id="addProductModal" class="modal">
  <div class="modal-content">
    <span class="close" id="closeProductModal">&times;</span>
    <h2>Add New Product</h2>
    <form id="addProductForm" enctype="multipart/form-data">
      <label for="productTitle">Product Title:</label>
      <input type="text" id="productTitle" name="productTitle" required>

      <label for="productDescription">Product Description:</label>
      <textarea id="productDescription" name="productDescription" rows="4" required></textarea>

      <label for="productImage">Product Image (Max 500KB):</label>
      <input type="file" id="productImage" name="productImage" accept="image/*" required>
      <p id="productImageError" class="error"></p>

      <button type="submit">Submit</button>
    </form>
  </div>
</div>

<!-- Add New Project Modal -->
<div id="addProjectModal" class="modal">
  <div class="modal-content">
    <span class="close" id="closeProjectModal">&times;</span>
    <h2>Add New Project</h2>
    <form id="addProjectForm" enctype="multipart/form-data">
      <label for="projectTitle">Project Title:</label>
      <input type="text" id="projectTitle" name="projectTitle" required>

      <label for="projectDescription">Project Description:</label>
      <textarea id="projectDescription" name="projectDescription" rows="4" required></textarea>

      <label for="projectImage">Project Image (Max 500KB):</label>
      <input type="file" id="projectImage" name="projectImage" accept="image/*" required>
      <p id="projectImageError" class="error"></p>

      <button type="submit">Submit</button>
    </form>
  </div>
</div>


    

    <!--Footer Starts -->
    <section class="footerr">
      <div class="footer-row">
        <div class="logo-col">
          <img src="./images/are_logo_white.svg" alt="" />
        </div>
        <div class="podcast-col">
          <h3>Pages</h3>
          <a href="./areAdmPanel.php">Dashboard</a>
          <a href="./allProducts.php">Products</a>
          <a href="./allProjects.php">Projects</a>
          
        </div>
        <div class="account-col">
          <h3>Edit | Update</h3>
          <a href="./allProducts.php">Edit/Update/Delete Products</a>
          <a href="./allProjects.php">Edit/Update/Delete Project</a>
         
        </div>
        
       
      </div>
    </section>
    <!--Footer Ends -->

    <!--Java Script Starts -->
   

    <!--Swiper script Starts -->
    <script src="js/swiper-bundle.min.js"></script>
    <script src="./js/script.js"></script>

    <script src="./js/bannerSlide.js"></script>
    <script src="./js/admPanelModal.js"></script>

  </body>
</html>
