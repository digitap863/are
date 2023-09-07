<?php 

require("../backEnd/prdCon.php");

function image_upload($img){
    $tmp_loc = $img['tmp_name'];
    $new_name = random_int(11111, 99999).$img['name'];

    $new_loc = UPLOADPRD_SRC.$new_name;

    if(!move_uploaded_file($tmp_loc, $new_loc)) {
        header("location: ../allProducts.php?alert=img_upload");
        
        exit;
    }
    else {
        return $new_name;
        
    }
}

function image_remove($img) {
    if(!unlink(UPLOADPRD_SRC.$img)) {
        header("location:../allProducts.php?alert=img_rem_fail");
        exit;
    }
   

}

if(isset($_POST['addproduct'])) {
   foreach($_POST as $key => $value) {
    $_POST[$key] = mysqli_real_escape_string($conn, $value);
   }

   $imgpath = image_upload($_FILES['image']);
   $url = $_POST['url'];

   $query = "INSERT INTO `products`( `name`, `description`, `image`, `url`) 
   VALUES ('$_POST[name]', '$_POST[desc]','$imgpath', '$url')";

   if(mysqli_query($conn, $query)) {
    header("location: ../allProducts.php?success=added");
   }
   else {
    header("location: allProducts.php?alert=add_failed");

   }


}

if(isset($_GET['rem']) && $_GET['rem']>0) {
    $query = "SELECT * FROM `products` WHERE `id` = '$_GET[rem]'";
    $result = mysqli_query($conn, $query);
    $fetch = mysqli_fetch_assoc($result);

    image_remove($fetch['image']);

    $query = "DELETE FROM `products` WHERE `id` = '$_GET[rem]'";

    if(mysqli_query($conn, $query)) {
        header("location:../allProducts.php?success=removed");
    }
    else {
        header("location:../allProducts.php?alert=remove_failed");

    }
}


if(isset($_POST['editproduct'])) {
    foreach($_POST as $key => $value) {
        $_POST[$key] = mysqli_real_escape_string($conn, $value);
    }

    if(file_exists($_FILES['image'] ['tmp_name']) || is_uploaded_file($_FILES['image'] ['tmp_name'])) {
        $query = "SELECT * FROM `products` WHERE `id` = '$_POST[editpid]'";
        $result = mysqli_query($conn, $query);
        $fetch = mysqli_fetch_assoc($result);
        
     

        image_remove($fetch['image']);

        $imgpath = image_upload($_FILES['image']);

        $update = "UPDATE `products` SET `name`='$_POST[name]', `description`='$_POST[desc]', 
         `image`='$imgpath', `url`='$_POST[editUrl]' WHERE `id` = $_POST[editpid]";
    }
    else {
        $update = "UPDATE `products` SET `name`='$_POST[name]', `description`='$_POST[desc]', 
        `url`='$_POST[editUrl]' WHERE `id` = $_POST[editpid]";
    }

    if(mysqli_query($conn, $update)) {
        header("location: ../allProducts.php?success=update");
    }
    else {
        header("location: ../allProducts.php?alert=update_failed");
    }

}


?>