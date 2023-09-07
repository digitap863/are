<?php 

require("../backEnd/prjctCon.php");

function image_upload($img){
    $tmp_loc = $img['tmp_name'];
    $new_name = random_int(11111, 99999).$img['name'];
    $new_loc = UPLOADPRJCT_SRC.$new_name;

    if(!move_uploaded_file($tmp_loc, $new_loc)) {
        header("location:../allProjects.php?alert=img_upload&url=$new_loc");
        exit;
    }
    else {
        return $new_name;
        
    }
}

function video_upload($video) {
    $tmp_loc = $video['tmp_name'];
    $new_name = random_int(11111, 99999) . $video['name'];

    $new_loc = UPLOADVIDPRJCT_SRC . $new_name;

    if (!move_uploaded_file($tmp_loc, $new_loc)) {
        header("location: ../allProjects.php?alert=video_upload");
        exit;
    } else {
        return $new_name;
    }
}




function image_remove($img) {
    if(!unlink(UPLOADPRJCT_SRC.$img)) {
        header("location:../allProjects.php?alert=img_rem_fail");
        exit;
    }
}

function video_remove($videoFileName) {
    $videoFilePath = UPLOADVIDPRJCT_SRC . $videoFileName;
    if (file_exists($videoFilePath)) {
        unlink($videoFilePath);
    }
}

if(isset($_POST['addproject'])) {
   foreach($_POST as $key => $value) {
    $_POST[$key] = mysqli_real_escape_string($conn, $value);
   }

   $imgpath = image_upload($_FILES['image']);

   $query = "INSERT INTO `projects`( `name`, `description`, `image`, `status`) 
   VALUES ('$_POST[name]','$_POST[desc]','$imgpath', '$_POST[status]')";

   if(mysqli_query($conn, $query)) {
    header("location: ../allProjects.php?success=added");
   }
   else {
    header("location: allProjects.php?alert=add_failed");

   }
}



if(isset($_GET['rem']) && $_GET['rem']>0) {
    $query = "SELECT * FROM `projects` WHERE `id` = '$_GET[rem]'";
    $result = mysqli_query($conn, $query);
    $fetch = mysqli_fetch_assoc($result);

    if (!empty($fetch['video'])) {
        video_remove($fetch['video']);
    } else {
        image_remove($fetch['image']);
    }

    $query = "DELETE FROM `projects` WHERE `id` = '$_GET[rem]'";

    if(mysqli_query($conn, $query)) {
        header("location:../allProjects.php?success=removed");
    }
    else {
        header("location:../allProjects.php?alert=remove_failed");

    }
}

if(isset($_POST['editproject'])) {
    foreach($_POST as $key => $value) {
        $_POST[$key] = mysqli_real_escape_string($conn, $value);
    }

    if(file_exists($_FILES['image'] ['tmp_name']) || is_uploaded_file($_FILES['image'] ['tmp_name'])) {
        $query = "SELECT * FROM `projects` WHERE `id` = '$_POST[editpid]'";
        $result = mysqli_query($conn, $query);
        $fetch = mysqli_fetch_assoc($result);

         if (!empty($fetch['video'])) {
            video_remove($fetch['video']);
            } else {
            image_remove($fetch['image']);
        }

        $imgpath = image_upload($_FILES['image']);
       


        if (file_exists($_FILES['video']['tmp_name']) || is_uploaded_file($_FILES['video']['tmp_name'])) {
            $videopath = video_upload($_FILES['video']);
            $update = "UPDATE `projects` SET `name`='$_POST[name]', `description`='$_POST[desc]',
                       `image`='$imgpath', `video`='$videopath', `status`='$_POST[editstatus]' WHERE `id` = $_POST[editpid]";
        } else {
            $update = "UPDATE `projects` SET `name`='$_POST[name]', `description`='$_POST[desc]',
                       `image`='$imgpath', `status`='$_POST[editstatus]' WHERE `id` = $_POST[editpid]";
        }
    }
    else {
        if (file_exists($_FILES['video']['tmp_name']) || is_uploaded_file($_FILES['video']['tmp_name'])) {
            $videopath = video_upload($_FILES['video']);
            $update = "UPDATE `projects` SET `name`='$_POST[name]', `description`='$_POST[desc]',
                       `video`='$videopath', `status`='$_POST[editstatus]' WHERE `id` = $_POST[editpid]";
        } else {
            $update = "UPDATE `projects` SET `name`='$_POST[name]', `description`='$_POST[desc]',
                       `status`='$_POST[editstatus]' WHERE `id` = $_POST[editpid]";
        }
    }

    if(mysqli_query($conn, $update)) {
        header("location: ../allProjects.php?success=update");
    }
    else {
        header("location: ../allProjects.php?alert=update_failed");
    }

}


// if(isset($_POST['editproject'])) {
//     foreach($_POST as $key => $value) {
//         $_POST[$key] = mysqli_real_escape_string($conn, $value);
//     }

//     if(file_exists($_FILES['image'] ['tmp_name']) || is_uploaded_file($_FILES['image'] ['tmp_name'])) {
//         $query = "SELECT * FROM `projects` WHERE `id` = '$_POST[editpid]'";
//         $result = mysqli_query($conn, $query);
//         $fetch = mysqli_fetch_assoc($result);

//        if (!empty($fetch['video'])) {
//         video_remove($fetch['video']);
//     } else {
//         image_remove($fetch['image']);
//     }

//         $imgpath = image_upload($_FILES['image']);
       


//         $update = "UPDATE `projects` SET `name`='$_POST[name]', `description`='$_POST[desc]',
//         `image`='$imgpath', `status`='$_POST[editstatus]'  WHERE `id` = $_POST[editpid]";
//     }
//     else {
//         $update = "UPDATE `projects` SET `name`='$_POST[name]', `description`='$_POST[desc]', 
//         `status`='$_POST[editstatus]' WHERE `id` = $_POST[editpid]";
//     }

//     if(mysqli_query($conn, $update)) {
//         header("location: ../allProjects.php?success=update");
//     }
//     else {
//         header("location: ../allProjects.php?alert=update_failed");
//     }

// }


// Check if the form is submitted
if(isset($_POST['addvidproject'])) {
    // Define the upload directory
    $uploadDir = UPLOADVIDPRJCT_SRC;

    // Get the project details from the form
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $status = $_POST['status'];

    // Check if a video file is selected
    if(isset($_FILES['video']) && $_FILES['video']['error'] === UPLOAD_ERR_OK) {
        $videoName = $_FILES['video']['name'];
        $videoTmpName = $_FILES['video']['tmp_name'];
        $videoSize = $_FILES['video']['size'];

        // Check if the video size is within the limit (10MB)
        if($videoSize <= 10 * 1024 * 1024) {
            // Generate a unique filename
            $videoFileName = uniqid() . '_' . $videoName;

            // Move the uploaded file to the specified directory
            if(move_uploaded_file($videoTmpName, $uploadDir . $videoFileName)) {
                // Insert project details into the database
                $sql = "INSERT INTO projects (name, description, status, video) VALUES ('$name', '$desc', '$status', '$videoFileName')";
                if ($conn->query($sql) === TRUE) {
                    header("location: ../allProjects.php?success=vidProjectUpdated");
                } else {
                    header("location: ../allProjects.php?alert=vidProjectNotUpdated");
                }
            } else {
                header("location: ../allProjects.php?alert=errorUploadingvideoFIle");
                
            }
        } else {
            header("location: ../allProjects.php?alert=errorFileSizeTooLarge10mbMax");
            
        }
    } else {
        header("location: ../allProjects.php?alert=selectAValidVideoFile");
        
    }
}


?>