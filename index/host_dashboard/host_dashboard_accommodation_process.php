<?php
include('../session.php');
include('../db_conn.php');
//delete house
// if($_POST['action'] == "delete_house"){
//     $house_id = addslashes($_POST['house_id']);
//     $query = "DELETE FROM accommodation WHERE accommodation_id='$house_id'";
//     if ($conn->query($query) === TRUE){
//       echo "success";
//     }else{
//       echo "fail";
//       echo "Error: " . $sql . "<br>" . $conn->error;
//     }
//   } else
  //add house
//   if($_POST['action'] == "add_house"){
    //   $house_name = addslashes($_POST['house_name']);
    //   $description = addslashes($_POST['description']);
    //   $price = addslashes($_POST['price']);
    //   $number_of_room = addslashes($_POST['number_of_room']);
    //   $number_of_bathroom = addslashes($_POST['number_of_bathroom']);
    //   $smoke_allowed = addslashes($_POST['smoke_allowed']);
    //   $garage = addslashes($_POST['garage']);
    //   $pet_friendly = addslashes($_POST['pet_friendly']);
    //   $internet_provided = addslashes($_POST['internet_provided']);
    //   $check_in_time = addslashes($_POST['check_in_time']);
    //   $check_out_time = addslashes($_POST['check_out_time']);
    //   $address = addslashes($_POST['address']);
    //   $city = addslashes($_POST['city']);
    //   $postal_code = addslashes($_POST['postal_code']);
    //   $state = addslashes($_POST['state']);
    //   $max_guests_allowed = addslashes($_POST['max_guests_allowed']);
    //   $img_source = addslashes($_POST['img_source']);
    //   $host_id = addslashes($_POST['host_id']);
  
      //list image
    //   $countfiles = count($_FILES['file']['name']);
    //   $imgUploaded = addslashes($_POST['file']);

    //   echo "<script type='text/javascript'>alert('$countfiles');</script>";

    //   $query = "INSERT INTO `accommodation`(`house_name`, `description`, `price`, `number_of_room`, `number_of_bathroom`, `smoke_allowed`, `garage`, `pet_friendly`, `internet_provided`, `check_in_time`, `check_out_time`, `address`, `city`, `postal_code`, `state`, `max_guests_allowed`, `image`, `host_id`) 
    //   VALUES ('$house_name','$description','$price','$number_of_room','$number_of_bathroom','$smoke_allowed','$garage','$pet_friendly','$internet_provided','$check_in_time','$check_out_time','$address','$city','$postal_code','$state','$max_guests_allowed','$img_source','$host_id')";
    //   if ($conn->query($query)) {
          //upload file
          // Count total files
            $countfiles = count($_FILES['file']['name']);

            // Upload directory
            $upload_location = "../../img/";

            // To store uploaded files path
            $files_arr = array();

            // Loop all files
            for($index = 0;$index < $countfiles;$index++){

            if(isset($_FILES['file']['name'][$index]) && $_FILES['file']['name'][$index] != ''){
                // File name
                $filename = $_FILES['file']['name'][$index];

                // Get extension
                $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

                // Valid image extension
                $valid_ext = array("png","jpeg","jpg");

                // Check extension
                if(in_array($ext, $valid_ext)){

                    // File path
                    $path = $upload_location.$filename;

                    // Upload file
                    if(move_uploaded_file($_FILES['file']['tmp_name'][$index],$path)){
                        $files_arr[] = $path;
                    }
                }
            }
            }
    //       echo 'success';
    //   } else {
    //       echo 'fail';
    //   }
//   } else{
//     echo "action not found!";
//   }
  

?>