<!DOCTYPE html>
<?php
// connect database
include('../db_conn.php');
?>

<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Title -->
    <title>System Management Dashboard</title>
    <!-- This page plugin CSS -->
    <link href="../../css/style.css" rel="stylesheet">
    <link href="../../css/clientstyle.css" rel="stylesheet">
</head>

<body>
    <!-- Bootstrap JQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <!--This page plugins -->
    <script src="../../js/manageAccommodation.js"></script>

    <div class="management-nav">

        <header>
            <!-- bootstrap navigation bar -->
            <nav class="navbar navbar-expand-lg navbar-dark static-top">
                <div class="container">
                    <a href="Manager_Dashboard_Home.html">
                        <img class="logo" src="../img/logo.png" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="Manager_Dashboard_Home.html">Home
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="Manager_Dashboard_User.html">User management</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- end bootstrap navigation bar -->
        </header>

    </div>

    <!-- Topbar for search accomodation -->
    <div class="Topbar">
        <div class="card card-body">
            <div class="col-md-4">
                <!-- for searching accomodations -->
                <form>
                    <input type="text" class="form-control product-search" id="input-search" placeholder="Search Accomodation">
                </form>
            </div>
        </div>
    </div>

    <!--This is the table of all the accomodations-->
    <div class="card card-body">
        <div class="table-responsive">
            <table class="table table-striped search-table v-middle">
                <thead class="header-item">
                    <th>
                        <!--This is the checkbox for selecting all-->
                        <div class="n-chk align-self-center text-center">
                            <div class="checkbox checkbox-info">
                                <input type="checkbox" class="material-inputs" id="user-check-all">
                                <label class="" for="user-check-all"></label>
                                <span class="new-control-indicator"></span>
                            </div>
                        </div>
                    </th>
                    <!--This shows the attributes of accomodations-->
                    <th class="text-dark font-weight-bold">Image</th>
                    <th class="text-dark font-weight-bold">Acccommodation ID</th>
                    <th class="text-dark font-weight-bold">House Name</th>
                    <th class="text-dark font-weight-bold">Host ID</th>
                    <th class="text-dark font-weight-bold">Address</th>
                    <th class="text-dark font-weight-bold">City</th>
                    <th class="text-dark font-weight-bold">Accomodation Rate</th>
                    <th class="text-center">
                        <div class="action-btn">
                            <a href="javascript:void(0)" class="delete-multiple text-danger"><i class="fas fa-trash font-20 font-medium"></i> Delete Row</a>
                        </div>
                    </th>
                </thead>

                <tbody>

                    <!-- This is the information of Accomdation-->
                    <?PHP
                    $sql = "SELECT * FROM accommodation";
                    $result = $conn->query($sql);
                    $check_n = 0;
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            
                            $check_n++;
                    ?>

                            <tr class="search-items">
                                <td>
                                    <!-- This is the checkbox for each accommodation-->
                                    <div class="n-chk align-self-center text-center">
                                        <div class="checkbox checkbox-info">
                                            <input type="checkbox" class="material-inputs user-chkbox" id="checkbox<?php echo $check_n; ?>">
                                            <label class="" for="checkbox<?php echo $check_n; ?>"></label>
                                        </div>
                                    </div>
                                </td>
                                <!-- This is the accommodation id of each accommodation-->
                                <td>
                                    <img src="../img/ACC1.jpg" alt="avatar" width="150" height="100">
                                </td>
                                <!-- This is the accommodation id of each accommodation-->
                                <td>
                                    <span class="acc_accommodation_id mb-0" data_accomodation_id="<?php echo $row["accommodation_id"]; ?>"><?php echo $row["accommodation_id"]; ?></span>
                                </td>
                                <!-- This is the House Name of each accommodation-->
                                <td>
                                    <span class="acc_house_name mb-0" data_house_name="<?php echo $row["house_name"]; ?>"><?php echo $row["house_name"]; ?></span>
                                </td>
                                <!-- This is the Host Name of each accommodation-->
                                <td>
                                    <span class="acc_host_id mb-0" data_host_id="<?php echo $row["host_id"]; ?>"><?php echo $row["host_id"]; ?></span>
                                </td>
                                <!-- This is the address of each accommodation-->
                                <td>
                                    <span class="acc_address" data_acc_address="<?php echo $row["address"]; ?>"><?php echo $row["address"]; ?></span>
                                </td>
                                <!-- This is the city of each accommodation-->
                                <td>
                                    <span class="acc_city" data_acc_city="<?php echo $row["city"]; ?>"><?php echo $row["city"]; ?></span>
                                </td>
                                <!-- This is the rate of each accommodation-->
                                <td>
                                    <div class="acc_accomodation_rate" data_accommodation_rate="<?php echo $row["accommodation_rate"]; ?>">
                                        <?php
                                        $accommodation_rate = $row["accommodation_rate"];
                                        $accommodation_rate_nums = explode(".", $accommodation_rate);

                                        for ($i = 0; $i < $accommodation_rate_nums[0]; $i++) {
                                        ?>
                                            <span class="text-warning fa fa-star"></span>
                                        <?php
                                        }


                                        if (count($accommodation_rate_nums) == 2) {
                                        ?>
                                            <span class="text-warning fa fa-star-half"></span>
                                        <?php

                                        };

                                        ?>


                                        <!--When click the button, the page of review will show-->
                                        <span class="action-btn">
                                            <a href="Manager_Dashboard_Review.php" class="text-info edit-rate"><i class="fa fa-edit font-18"></i></a>
                                        </span>
                                    </div>
                                </td>
                                <!--This is the function for edit and delete each accommodation-->
                                <td class="text-center">
                                    <div class="action-btn">
                                        <!--This is the function for edit Accommodation-->
                                        <a href="#edit<?php echo $row['accommodation_id']; ?>" data-toggle="modal" class="text-info edit">
                                            <i class="mdi mdi-account-edit font-20" title="Edit"></i></a>

                                        <!--This is the function for delete Accommodation-->
                                        <a href="#deleteAccModal<?php echo $row['accommodation_id']; ?>" data-toggle="modal" class="text-info edit" name="delete">
                                            <i class="mdi mdi-delete font-20" title="Delete"></i></a>
                                    </div>


                                    <!-- Edit and delete modal -->
                                    <!--Delete modal start -->
                                    <div class="modal fade" id="deleteAccModal<?php echo $row['accommodation_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel">Delete Accommodation</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container-fluid">
                                                        <p>Are you sure to delete the information? </p>
                                                        <p>This action cannot be undone. </p>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                    <a href="controlA.php?id=<?php echo $row['accommodation_id']; ?>&action=delete" class="btn btn-danger">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Delete Modal End-->

                                    <!-- Edit Modal Start-->
                                    <div id="edit<?php echo $row['accommodation_id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <!--This is the header of the modal-->
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="accDetailModalLabel">Accommodation Details</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>

                                                <!--This is the body of the modal-->
                                                <div class="modal-body">

                                                    <?php
                                                    $edit = $conn->query("SELECT * FROM accommodation WHERE accommodation_id='" . $row['accommodation_id'] . "'");
                                                    $erow = $edit->fetch_array();
                                                    ?>

                                                    <form method="POST" action="controlA.php?action=edit&id=<?php echo $erow['accommodation_id']; ?>">
                                                        <!--Here to input House Name-->
                                                        <div class="form-group row">
                                                            <label class="col-md-3 text-left control-label col-form-label">House Name</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="house_name" class="form-control" id="house_u" placeholder="House Name" value="<?php echo $erow['house_name']; ?>">
                                                            </div>
                                                        </div>

                                                        <!--Here to input description-->
                                                        <div class="form-group row">
                                                            <label class="col-md-3 text-left control-label col-form-label">Description</label>
                                                            <div class="col-md-9">
                                                                <textarea name="description" class="form-control" rows="5" id="description_u" value=""><?php echo $erow['description']; ?></textarea>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <!--Here to input price-->
                                                        <div class="form-group row">
                                                            <label class="col-md-3 text-left control-label col-form-label">Price</label>
                                                            <div class="col-md-9">
                                                                <span name="price" class="input-group-text col-md-9">$<input type="text" class="form-control col-md-9" id="price_u" placeholder="Price" value="<?php echo $erow['price']; ?>"></span>
                                                            </div>
                                                        </div>
                                                        <!--Here to input how many rooms-->
                                                        <div class="form-group row">
                                                            <label class="col-md-3 text-left control-label col-form-label">Number of Room</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="number_of_room" class="form-control" id="room_u" placeholder="Number of Room" value="<?php echo $erow['number_of_room']; ?>">
                                                            </div>
                                                        </div>

                                                        <!--Here to input how many bathrooms-->
                                                        <div class="form-group row">
                                                            <label class="col-md-3 text-left control-label col-form-label">Number of Bathroom</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="number_of_bathroom" class="form-control" id="bath_u" placeholder="Number of Bathroom" value="<?php echo $erow['number_of_bathroom']; ?>">
                                                            </div>
                                                        </div>
                                                        <!--Here to input Max Guests Allowed-->
                                                        <div class="form-group row">
                                                            <label class="col-md-3 text-left control-label col-form-label">Max Guests Allowed</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="max_guests_allowed" class="form-control" id="maxguests_u" placeholder="Max Guests Allowed" value="<?php echo $erow['max_guests_allowed']; ?>">
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <!--Here to choose facilities-->
                                                        <div class="form-group row">
                                                            <!--Weather smoke allowed?-->
                                                            <div class="col-md-3">
                                                                <input type="checkbox" name="smoke_allowed" id="smoke_u" class="material-inputs chk-col-light-blue" value="<?php echo $erow['smoke_allowed']; ?>">
                                                                <label for="smoke_allowed">Smoke Allowed</label>
                                                            </div>
                                                            <!--Any garage?-->
                                                            <div class="col-md-3">
                                                                <input type="checkbox" name="garage" id="garage_u" class="material-inputs chk-col-light-blue" value="<?php echo $erow['garage']; ?>">
                                                                <label for="garage">Garage</label>
                                                            </div>
                                                            <!--Pet friendly?-->
                                                            <div class="col-md-3">
                                                                <input type="checkbox" name="pet_friendly" id="pet_u" class="material-inputs chk-col-light-blue" value="<?php echo $erow['pet_friendly']; ?>">
                                                                <label for="pet_friendly">Pet Friendly</label>
                                                            </div>
                                                            <!--Internet provided?-->
                                                            <div class="col-md-3">
                                                                <input type="checkbox" name="smoke_allowed" id="internet_U" class="material-inputs chk-col-light-blue" value="<?php echo $erow['smoke_allowed']; ?>">
                                                                <label for="internet_provided">Internet Provided</label>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <!--Choose check in time-->
                                                        <div class="form-group row">
                                                            <label for="check_in_time" class="col-md-3 col-form-label">Date Check In</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control" type="date" id="checkin_u" name="check_in_time" value="<?php echo $erow['check_in_time']; ?>">
                                                            </div>
                                                        </div>
                                                        <!--Choose check out time-->
                                                        <div class="form-group row">
                                                            <label for="check_out_time" class="col-md-3 col-form-label">Date Check Out</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control" type="date" id="checkout_u" name="check_out_time" value="<?php echo $erow['check_out_time']; ?>">
                                                            </div>
                                                        </div>
                                                        <!--Here to input Address-->
                                                        <div class="form-group row">
                                                            <label class="col-md-3 text-left control-label col-form-label">Address</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="address" class="form-control" id="address_u" placeholder="Address" value="<?php echo $erow['address']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <!--Here to input City-->
                                                            <label class="col-md-1 text-left control-label col-form-label">City</label>
                                                            <div class="col-md-3">
                                                                <input type="text" name="city" class="form-control" id="city_u" placeholder="City" value="<?php echo $erow['city']; ?>">
                                                            </div>
                                                            <!--Here to input Postal Code-->
                                                            <label class="col-md-1 text-left control-label col-form-label">Postal Code</label>
                                                            <div class="col-md-3">
                                                                <input type="text" name="postal_code" class="form-control" id="postal_U" placeholder="Postal Code" value="<?php echo $erow['postal_code']; ?>">
                                                            </div>
                                                            <!--Here to input State-->
                                                            <label class="col-md-1 text-left control-label col-form-label">State</label>
                                                            <div class="col-md-3">
                                                                <input type="text" name="state" class="form-control" id="state_u" placeholder="State" value="<?php echo $erow['state']; ?>">
                                                            </div>
                                                        </div>
                                                        <!--Here to upload image-->
                                                        <div class="form-group row">
                                                            <label class="col-md-6 text-left control-label col-form-label">&nbsp Image upload</label>
                                                            <div class="col-md-6">
                                                                <input type="file" class="form-control" id="image_u" name="image" aria-describedby="fileHelp" value="<?php echo $erow['image']; ?>">
                                                            </div>
                                                        </div>

                                                        <br>

                                                        <!--This is the footer of the modal, to close the modal or save changes-->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger">Save changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Edit Modal End-->

                                </td>
                            </tr>

                        <?php
                        }
                        ?>

                    <?PHP

                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                    ?>


                </tbody>
            </table>
        </div>
    </div>


    <!-- Modal of Accommodation Details -->
    <!-- link to database -->




</body>

</html>