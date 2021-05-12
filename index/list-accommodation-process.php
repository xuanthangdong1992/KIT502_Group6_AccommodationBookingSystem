<?php
include ('session.php');
include ('db_conn.php');

function date_sort($a, $b) {
  return strtotime($a) - strtotime($b);
}

$output = '';
$city = addslashes($_POST['city']);
$startDate = addslashes($_POST['startDate']);
$endDate = addslashes($_POST['endDate']);
$numberOfGuest = addslashes($_POST['numberOfGuest']);

$query = "SELECT * FROM accommodation
    WHERE city = '$city'
    AND max_guests_allowed >= '$numberOfGuest'";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($result)) {
  $booking_date = $row['booking_date'];

  //case house not have any booking. that mean $row['booking_date']=""
  if($booking_date==""){
    $arr_img = explode(";", $row["image"]);
        $output .= '
        <div class="gap"></div>
        <a class="nav-link" href="accommodation-details.php?id=' . $row["accommodation_id"] . '&startDate='.$startDate.'&endDate='.$endDate.'&numberOfGuests='.$numberOfGuest.'">
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
  }else{

  //case house have the booking already
  // array start date.
  $arr_start_date=array();
  // array end date.
  $arr_end_date=array();
  $array_range_date =  explode(';', $booking_date);
  for($i=0;$i<count($array_range_date)-1;$i++){
    $arr_start_and_end_date = explode('~', $array_range_date[$i]);
    // add start date to start date array
    array_push($arr_start_date, $arr_start_and_end_date[0]);
    // add end date to end date array
    array_push($arr_end_date, $arr_start_and_end_date[1]);
  }
  //reorder time in array (inrease time)
  usort($arr_start_date, "date_sort");
  usort($arr_end_date, "date_sort");
  // 2 array same length
  for($x=0; $x<count($arr_start_date); $x++){
    // last element of array
    if($x == count($arr_start_date)-1){
      if($startDate >= $arr_end_date[$x]){
        $arr_img = explode(";", $row["image"]);
        $output .= '
        <div class="gap"></div>
        <a class="nav-link" href="accommodation-details.php?id=' . $row["accommodation_id"] . '&startDate='.$startDate.'&endDate='.$endDate.'&numberOfGuests='.$numberOfGuest.'">
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
    } else
    //met the conditions
    if($startDate >= $arr_end_date[$x] && $endDate <= $arr_start_date[$x+1]){
    $arr_img = explode(";", $row["image"]);
    $output .= '
    <div class="gap"></div>
    <a class="nav-link" href="accommodation-details.php?id=' . $row["accommodation_id"] . '&startDate='.$startDate.'&endDate='.$endDate.'&numberOfGuests='.$numberOfGuest.'">
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
  }
}
}
echo $output;
?>