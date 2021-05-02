<?php
include ('session.php');
include ('db_conn.php');
$output = '';
$city = addslashes($_POST['city']);
$startDate = addslashes($_POST['startDate']);
$endDate = addslashes($_POST['endDate']);
$numberOfGuest = addslashes($_POST['numberOfGuest']);

$query = "SELECT * FROM accommodation
    WHERE city = '$city'
    AND max_guests_allowed >= '$numberOfGuest'";
// Waiting for booking function
// AND start_date = '$startDate'
// AND end_date = '$endDate'
// echo $query;
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($result)) {
    $arr_img = explode(";", $row["image"]);
    $output .= '
    <div class="gap"></div>
    <a class="nav-link" href="accommodation-details.php?id=' . $row["accommodation_id"] . '">
      <div class="list-accommodation">
        <div class="media">
          <div class="media-left">
            <img src="' . $arr_img[0] . '" class="media-object">
          </div>
          <div class="media-body">
            <h4 class="media-heading">' . $row["house_name"] . '</h4>
            <p>
              Number of room: ' . $row["number_of_room"] . ', Number of bathroom: ' . $row["number_of_bathroom"] . ' <br>
              ';
    if ($row["smoke_allowed"]) {
        $output .= 'Smoke allowed.';
    }
    if ($row["internet_provided"]) {
        $output .= 'Internet.';
    }
    if ($row["garage"]) {
        $output .= 'Garage.';
    }
    if ($row["pet_friendly"]) {
        $output .= 'Pet friendly.';
    }
    $output .= '
            </p>
            <h5 class="media-heading">Price: ' . $row["price"] . ' AUD</h5>
            <span class="fa fa-star checked"></span>' . $row["accommodation_rate"] . '
          </div>
        </div>
      </div>
    </a>';
}


echo $output;
?>