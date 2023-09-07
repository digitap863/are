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
    <title>ARE All Products</title>

    <!--CSS Files-->
    <link rel="stylesheet" href="./css/allProducts.css" />
    <link rel="stylesheet" href="./css/swiper-bundle.min.css" />

    <!--Bootstrap CSS Files-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

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
  <body class="bg-light">
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

          <a href="areAdmPanel.html"><p><?php echo $_SESSION['AdminLoginId'] ?></p></a>
         <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
         
         <button type="button" width="auto" class="btn btn-light text-dark me-3" data-bs-toggle="modal" data-bs-target="#addproduct">
          Add Products <i class="fas fa-plus"></i>
        </button>
        <button class="btn btn-dark" type="submit" name="logout" >Logout <i class="fa-solid fa-power-off"></i></button>
        </form> 
        </div>
      </div>
      <i class="fa-solid fa-bars"></i>
    </section>
    <!--Header Navigation Ends -->

    <?php 

    if(isset($_GET['alert'])) {
      if($_GET['alert']=='img_upload') {

        echo<<<alert
          <div class="container alert alert-danger alert-dismissible text-center" role="alert">
            <strong>Image Upload Failed. Server Down! </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        alert;     
      }

      if($_GET['alert']=='img_rem_fail') {

        echo<<<alert
          <div class="container alert alert-danger alert-dismissible text-center" role="alert">
            <strong>Image Removal Failed. Server Down! </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        alert;     
      }

      if($_GET['alert']=='add_failed') {

        echo<<<alert
          <div class="container alert alert-danger alert-dismissible text-center" role="alert">
            <strong>Cannot add Product </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        alert;     
      }

      if($_GET['alert']=='remove_failed') {

        echo<<<alert
          <div class="container alert alert-danger alert-dismissible text-center" role="alert">
            <strong>Cannot add Product </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        alert;     
      }

      if($_GET['alert']=='update_failed') {

        echo<<<alert
          <div class="container alert alert-danger alert-dismissible text-center" role="alert">
            <strong>Cannot Update Product. Server Down!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        alert;     
      }

    }
    else if (isset($_GET['success'])) {

      if($_GET['success']=='added') {
        echo<<<alert
          <div class="container alert alert-success alert-dismissible text-center" role="alert">
            <strong>Product added successfuly. </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        alert;      
      }

      if($_GET['success']=='removed') {
        echo<<<alert
          <div class="container alert alert-success alert-dismissible text-center" role="alert">
            <strong>Product Removed! </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        alert;      
      }

      if($_GET['success']=='update') {
        echo<<<alert
          <div class="container alert alert-success alert-dismissible text-center" role="alert">
            <strong>Product Updated! </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        alert;      
      }

    }
    
    
    ?>

    <!--Products Display Starts -->
    <section class="prd-isplay">
      <div class="prd-slider-contents">
        <div class="texts">
          <img src="./images/are_logo_color_png.png" alt="" />
          <h2>Welcome to ARE - See All Compressors.</h2>
        </div>

        <div class="project-contents">

            <table class="table table-hover text-center">
                <thead class="bg-dark text-light" >
                    <tr>
                        <th width="5%" scope="col">Id</th>
                        <th width="20%" scope="col">Image</th>
                        <th width="20%" scope="col">Product Name</th>
                        <th width="25%" scope="col">Description</th>
                        <th width="15%" scope="col">Product URL</th>
                        <th width="15%" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                  <?php 

                  require("./backEnd/compressorsCon.php");
                  
                  $query = "SELECT * FROM `compressors`";
                  $result = mysqli_query($conn, $query);
                  $i=1;
                  $fetchprd_src = FETCHPRD_SRC;

                  while($fetch = mysqli_fetch_assoc($result)) {
                    echo<<<compressors
                      <tr class="align-middle" >
                          <th scope="row">$i</th>
                          <td><img class="img-fluid" src="$fetchprd_src$fetch[image]"  width="100px" height="auto" ></td>
                          <td>$fetch[name]</td>
                          <td>$fetch[description]</td>
                          <td>$fetch[url]</td>
                          <td>
                          <a href="?edit=$fetch[id]" name="edit" class="btn btn-warning me-2" ><i class="fa-solid fa-pen-to-square"></i>Edit</a>
                          <button onClick="confirm_rem($fetch[id])" class="btn btn-danger" ><i class="fa-solid fa-trash"></i></button>
                          
                          </td>
                      </tr>
                      compressors;
                    $i++;
                  }
                  ?>
                    
                
                </tbody>
            </table>
         
        </div>
        <h4>*Click on the tab which you want to work with</h4>
      </div>
    </section>
    <!--Slider Ends -->

    <!-- Modal 1 -->
    <div class="modal fade" id="addproduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="./backEnd/compressorCrud.php" method="POST" enctype="multipart/form-data" >
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Add Products</h5>
                
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <span class="input-group-text" >Name</span>
                    <input type="text" class="form-control" name="name" required >
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" >URL</span>
                    <select name="url" id="url">
                                         
                      <option value="compressorSingle.php">Single Product</option>
                    </select>
                </div>
                <div class="input-group">
                    <span class="input-group-text">Description</span>
                    <textarea class="form-control" name="desc" required ></textarea>
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" >Image</label>
                    <input type="file" class="form-control" name="image" accept=".jpg, .jpeg, .png, .svg, .webp" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success" name="addproduct" >Add</button>
            </div>
            </div>
        </form>
    </div>
    </div>
    <!-- Modal 1 end -->

      <!-- Modal 2 -->
      <div class="modal fade" id="editproduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="./backEnd/compressorCrud.php" method="POST" enctype="multipart/form-data" >
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" >Edit Products</h5>
                    
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <span class="input-group-text" >Name</span>
                        <input type="text" class="form-control" name="name" id="editname" required >
                    </div>
                  
                    <div class="input-group">
                        <span class="input-group-text">Description</span>
                        <textarea class="form-control" name="desc" id="editdesc" required ></textarea>
                    </div>
                    <div class="input-group mb-3">
                      <span class="input-group-text" >URL</span>
                      <select name="editUrl" id="editUrl">
                                               
                        <option value="compressorSingle.php">Single Product</option>
                      </select>
                    </div>
                    <img src="" id="editimg"  class="mb-3" width="auto" height="150px" alt=""> <br>
                    <div class="input-group mb-3">
                        <label class="input-group-text" >Change Image</label>
                        <input type="file" class="form-control" name="image" accept=".jpg, .jpeg, .png, .svg, .webp">
                    </div>
                    <input type="hidden" name="editpid" id="editpid">
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success" name="editproduct" >Save</button>
                </div>
                </div>
            </form>
        </div>
      </div>
    
    <?php 

      
      

      if(isset($_GET['edit']) && $_GET['edit']>0) {

        $query = "SELECT * FROM `compressors` WHERE `id` = '$_GET[edit]'";
        $result = mysqli_query($conn, $query);
        $fetch = mysqli_fetch_assoc($result);
        echo"$fetch[id]";

        echo"<script> 
        var editproduct = new bootstrap.Modal(document.getElementById('editproduct'), {
          keyboard: false
        });

        document.querySelector('#editname').value=`$fetch[name]`;
        document.querySelector('#editdesc').value=`$fetch[description]`;
        document.querySelector('#editUrl').value=`$fetch[url]`;
        document.querySelector('#editimg').src=`$fetchprd_src$fetch[image]`;
        document.querySelector('#editpid').value=`$_GET[edit]`;

        editproduct.show();     
      
      </script> ";


    
               
       
      }

    ?>


    <?php 
    
      if(isset($_POST['logout']))
      {
        session_destroy();
        header("location: adminLogin.php");
      }
    
    
    ?>

    <!--Footer Starts -->
    <section class="footerr">
      <div class="footer-row">
        <div class="logo-col">
          <img src="./images/are_logo_white.svg" alt="" />
        </div>
        <div class="podcast-col">
          <h3>Podcast</h3>
          <a href="#">Browse Podcast</a>
          <a href="Browse Podcast">Browse Episode</a>
          <a href="Browse Podcast">Podcast Categories</a>
          <a href="Browse Podcast">Curated List</a>
          <a href="Browse Podcast">Add a Podcast</a>
          <a href="Browse Podcast">Podcaster Pro</a>
        </div>
        <div class="account-col">
          <h3>Account</h3>
          <a href="Browse Podcast">Register</a>
          <a href="Browse Podcast">Login</a>
          <a href="Browse Podcast">Find Friends</a>
        </div>
        <div class="social-col">
          <h3>Social</h3>
          <a href="Browse Podcast">Facebook</a>
          <a href="Browse Podcast">Instagram</a>
          <a href="Browse Podcast">Twitter</a>
        </div>
        <div class="company-col">
          <h3>Company</h3>
          <a href="Browse Podcast">About</a>
          <a href="Browse Podcast">FAQ</a>
          <a href="Browse Podcast">Articles</a>
          <a href="Browse Podcast">Terms & Conditions</a>
          <a href="Browse Podcast">Privacy Policy</a>
          <a href="Browse Podcast">Contact</a>
        </div>
      </div>
    </section>
    <!--Footer Ends -->

   
<!--Java Scripts Starts -->

    <script>
      function confirm_rem(id){
        if(confirm("Are you sure you want to delete this item?")) {
          window.location.href="./backEnd/compressorCrud.php?rem="+id;
        }
      }
    </script>

    
    

    <!--Swiper script Starts -->
    <script src="js/swiper-bundle.min.js"></script>
    <script src="./js/script.js"></script>

    <script src="./js/bannerSlide.js"></script>
    

  </body>
</html>
