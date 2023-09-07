<?php 

require("../backEnd/refridgerationcabinetsCon.php");

function image_upload($img){
    $tmp_loc = $img['tmp_name'];
    $new_name = random_int(11111, 99999).$img['name'];

    $new_loc = UPLOADPRD_SRC.$new_name;

    if(!move_uploaded_file($tmp_loc, $new_loc)) {
        header("location:../allRefridgerationcabinets.php?alert=img_upload");
        exit;
    }
    else {
        return $new_name;
        
    }
}

function image_remove($img) {
    if(!unlink(UPLOADPRD_SRC.$img)) {
        header("location:../allRefridgerationcabinets.php?alert=img_rem_fail");
        exit;
    }
   

}

if(isset($_POST['addproduct'])) {
   foreach($_POST as $key => $value) {
    $_POST[$key] = mysqli_real_escape_string($conn, $value);
   }

   $imgpath = image_upload($_FILES['image']);
   $url = $_POST['url'];

   $query = "INSERT INTO `refridgerationcabinets`( `name`, `description`, `image`, `url`) 
   VALUES ('$_POST[name]', '$_POST[desc]','$imgpath', '$url')";

   if(mysqli_query($conn, $query)) {
    header("location: ../allRefridgerationcabinets.php?success=added");
   }
   else {
    header("location:../ allRefridgerationcabinets.php?alert=add_failed");

   }


}

if(isset($_GET['rem']) && $_GET['rem']>0) {
    $query = "SELECT * FROM `refridgerationcabinets` WHERE `id` = '$_GET[rem]'";
    $result = mysqli_query($conn, $query);
    $fetch = mysqli_fetch_assoc($result);

    image_remove($fetch['image']);

    $query = "DELETE FROM `refridgerationcabinets` WHERE `id` = '$_GET[rem]'";

    if(mysqli_query($conn, $query)) {
        header("location:../allRefridgerationcabinets.php?success=removed");
    }
    else {
        header("location:../allRefridgerationcabinets.php?alert=remove_failed");

    }
}


if(isset($_POST['editproduct'])) {
    foreach($_POST as $key => $value) {
        $_POST[$key] = mysqli_real_escape_string($conn, $value);
    }

    if(file_exists($_FILES['image'] ['tmp_name']) || is_uploaded_file($_FILES['image'] ['tmp_name'])) {
        $query = "SELECT * FROM `refridgerationcabinets` WHERE `id` = '$_POST[editpid]'";
        $result = mysqli_query($conn, $query);
        $fetch = mysqli_fetch_assoc($result);

        image_remove($fetch['image']);

        $imgpath = image_upload($_FILES['image']);

        $update = "UPDATE `refridgerationcabinets` SET `name`='$_POST[name]', `description`='$_POST[desc]', 
         `image`='$imgpath', `url`='$_POST[editUrl]' WHERE `id` = $_POST[editpid]";
    }
    else {
        $update = "UPDATE `refridgerationcabinets` SET `name`='$_POST[name]', `description`='$_POST[desc]', 
        `url`='$_POST[editUrl]' WHERE `id` = $_POST[editpid]";
    }

    if(mysqli_query($conn, $update)) {
        header("location: ../allRefridgerationcabinets.php?success=update");
    }
    else {
        header("location: ../allRefridgerationcabinets.php?alert=update_failed");
    }

}


?>