<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Title -->
    <title>System Management Dashboard</title>
    <!-- This page plugin CSS -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/clientstyle.css" rel="stylesheet">
</head>

<body>
    <!-- Bootstrap JQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <!-- This page plugin JQuery -->
    <script src="../js/manageuser.js"></script>

    <!-- validation plugin -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<div class="management-nav">

            <header>
                <!-- bootstrap navigation bar -->
                <nav class="navbar navbar-expand-lg navbar-dark static-top">
                    <div class="container">
                        <a href="host-dashboard.html">
                            <img class="logo" src="../img/logo.png" alt="">
                        </a>
                        <h2 style="color: white">Wellcome to accommodation management</h2>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarResponsive">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="host-dashboard.html">Home
                                        <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="host-dashboard-booking.html">Booking management</a>
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


<!-- Modal -->
  <div class="modal fade" id="createAccModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
            <button type="button" class="close float-right btn" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h3>Create new Accommodation</h3>
            <form action="" method="post">
                <div class="form-group">
                    <label>House name: </label>
                    <input required="required" type="text" class="form-control" id="houseName">
                </div>
                <div class="form-group">
                    <label>Description: </label>
                    <textarea required="required" type="text" rows="4" class="form-control" id="houseDescription" ></textarea>
                </div>
                <div class="row">
                    <div class="form-group col-3">
                        <label>Price (AUD):</label>
                        <input required="required" type="text" class="form-control" id="housePrice">
                    </div>
                    <div class="form-group col-4">
                        <label>Number of room: </label>
                        <input required="required" type="text" class="form-control col-3" id="housePrice">
                    </div>
                    <div class="form-group col-5">
                        <label>Number of bathroom: </label>
                        <input required="required" type="text" class="form-control col-3" id="housePrice">
                    </div>
                </div>
                <div class="form-inline row">
                    <div class="form-group col-6">
                        <label>Smoke allowed: </label>
                        <input class="form-control" type="checkbox"> 
                    </div>
                    <div class="form-group col-6">
                        <label>Garage: </label>
                        <input class="form-control" type="checkbox"> 
                    </div>
                </div>
                <div class="form-inline row">
                    <div class="form-group col-6">
                        <label>Pet friendly: </label>
                        <input class="form-control" type="checkbox"> 
                    </div>
                    <div class="form-group col-6">
                        <label>Internet: </label>
                        <input class="form-control" type="checkbox"> 
                    </div>
                    
                </div>
                <div class="form-inline row">
                    <div class="form-group col-6">
                        <label for="checkin">Check in time: </label>
                        <input required="required" type="time" id="checkin" name="checkin">
                    </div>
                    <div class="form-group col-6">
                        <label for="checkout">Check out time: </label>
                        <input required="required" type="time" id="checkout" name="checkout">
                    </div>
                </div>
                <div class="form-group">
                    <label>Address: </label>
                    <input required="required" type="text" class="form-control" id="houseAddress">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>City</label>
                        <input required="required" type="text" class="form-control" id="houseCity">
                    </div>
                    <div class="form-group col-md-4">
                        <label>State</label>
                        <select required="required" id="houseState" class="form-control">
                            <option>ACT</option>
                            <option>NSW</option>
                            <option>NT</option>
                            <option>QLD</option>
                            <option>SA</option>
                            <option selected>TAS</option>
                            <option>VIC</option>
                            <option>WA</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Postal</label>
                        <input required="required" type="text" class="form-control" id="housePostalCode">
                    </div>
                </div>
                <div class="form-group">
                    <label>Number of guests: </label>
                    <input required="required" type="text" class="form-control" id="numberOfGuests">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>

                    


            </form>
        </div>
    </div>
      
    </div>
  </div>


<!--This is the table of all the accomodations-->
<div class="card card-body">
    <div class="btn-create">
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#createAccModal">Create new accommodation</button>
  </div>
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
                <th class="text-dark font-weight-bold">Host Name</th>
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

                <!-- This is the information of Accomdation1-->
                <tr class="search-items">
                    <td>
                        <!-- This is the checkbox for Accomdation1-->
                        <div class="n-chk align-self-center text-center">
                            <div class="checkbox checkbox-info">
                                <input type="checkbox" class="material-inputs user-chkbox" id="checkbox1">
                                <label class="" for="checkbox1"></label>
                            </div>
                        </div>
                    </td>
                    <!-- This is the accommodation id of Accomdation1-->
                    <td>
                        <img src="../img/ACC1.jpg" alt="avatar" width="150" height="100">
                    </td>
                    <!-- This is the accommodation id of Accomdation1-->
                    <td>
                        <span class="acc_accommodation_id mb-0" data_accomodation_id="001">001</span>
                    </td>
                    <!-- This is the House Name of Accommodation1-->
                    <td>
                        <span class="acc_house_name mb-0" data_house_name="Beautiful Garden House">Beautiful Garden House</span>
                    </td>
                    <!-- This is the Host Name of Accommodation1-->
                    <td>
                        <span class="acc_host_name mb-0" data_house_name="Emily Davis">Emily Davis</span>
                    </td>
                    <!-- This is the address of Accommodation1-->
                    <td>
                        <span class="acc_address" data_email="111 Sandybay Rd">111 Sandybay Rd</span>
                    </td>
                    <!-- This is the city of Accommodation1-->
                    <td>
                        <span class="acc_city" data_acc_city="Hobart">Hobart</span>
                    </td>
                    <!-- This is the rate of Accommodation1-->
                    <td>
                        <div class="acc_accomodation_rate" data_accommodation_rate="4.0">
                           <span class="text-warning fa fa-star"></span>
                           <span class="text-warning fa fa-star"></span>
        	               <span class="text-warning fa fa-star"></span>
        	               <span class="text-warning fa fa-star"></span>
                           <span class="fa fa-star"></span>
                            <!--When click the button, the page of review will show-->
                           <span class="action-btn">
                               <a href="../system-management-dashboard/Manager_Dashboard_Accommodation Management_Client Review.html" class="text-info edit-rate"><i class="fa fa-edit font-18"></i></a>
                           </span>
                        </div>
                    </td>
                    <!--This is the function for edit and delete Accommodation1-->
                    <td class="text-center">
                        <div class="action-btn">
                            <a href="javascript:void(0)" class="text-info edit"><i class="mdi mdi-account-edit font-20"></i></a>
                            <a href="javascript:void(0)" class="text-dark delete ml-2"><i class="mdi mdi-delete font-20"></i></a>
                        </div>
                    </td>
                </tr>

                <!-- This is the information of Accomdation2-->
                <tr class="search-items">
                    <td>
                        <!-- This is the checkbox for Accomdation2-->
                        <div class="n-chk align-self-center text-center">
                            <div class="checkbox checkbox-info">
                                <input type="checkbox" class="material-inputs user-chkbox" id="checkbox2">
                                <label class="" for="checkbox2"></label>
                            </div>
                        </div>
                    </td>
                    <!-- This is the accommodation id of Accomdation2-->
                    <td>
                        <img src="../img/ACC2.jpg" alt="avatar" width="150" height="100">
                    </td>
                    <!-- This is the accommodation id of Accomdation2-->
                    <td>
                        <span class="acc_accommodation_id mb-0" data_accomodation_id="002">002</span>
                    </td>
                    <!-- This is the House Name of Accommodation2-->
                    <td>
                        <span class="acc_house_name mb-0" data_house_name="Luxury Urban Apartment">Luxury Urban Apartment</span>
                    </td>
                    <!-- This is the Host Name of Accommodation2-->
                    <td>
                        <span class="acc_host_name mb-0" data_house_name="Emily Davis">Emily Davis</span>
                    </td>
                    <!-- This is the address of Accommodation2-->
                    <td>
                        <span class="acc_address" data_email="200 Elizabeth St">200 Elizabeth St</span>
                    </td>
                    <!-- This is the city of Accommodation2-->
                    <td>
                        <span class="acc_city" data_acc_city="Hobart">Hobart</span>
                    </td>
                    <!-- This is the rate of Accommodation2-->
                    <td>
                        <div class="acc_accomodation_rate" data_accommodation_rate="3.5">
                           <span class="text-warning fa fa-star"></span>
                           <span class="text-warning fa fa-star"></span>
        	               <span class="text-warning fa fa-star"></span>
        	               <span class="text-warning fa fa-star-half"></span>
                           <span class="fa fa-star"></span>
                            <!--When click the button, the page of review will show-->
                           <span class="action-btn">
                                <a href="Manager_Dashboard_Accommodation Management_Client Review.html" class="text-info edit-rate"><i class="fa fa-edit font-18"></i></a>
                           </span>
                    </td>
                    <!--This is the function for edit and delete Accommodation2-->
                    <td class="text-center">
                        <div class="action-btn">
                            <a href="javascript:void(0)" class="text-info edit"><i class="mdi mdi-account-edit font-20"></i></a>
                            <a href="javascript:void(0)" class="text-dark delete ml-2"><i class="mdi mdi-delete font-20"></i></a>
                        </div>
                    </td>
                </tr>

                <!-- This is the information of Accomdation3-->
                <tr class="search-items">
                    <td>
                        <!-- This is the checkbox for Accomdation3-->
                        <div class="n-chk align-self-center text-center">
                            <div class="checkbox checkbox-info">
                                <input type="checkbox" class="material-inputs user-chkbox" id="checkbox3">
                                <label class="" for="checkbox3"></label>
                            </div>
                        </div>
                    </td>
                    <!-- This is the accommodation id of Accomdation3-->
                    <td>
                        <img src="../img/ACC3.jpg" alt="avatar" width="150" height="100">
                    </td>
                    <!-- This is the accommodation id of Accomdation3-->
                    <td>
                        <span class="acc_accommodation_id mb-0" data_accomodation_id="003">003</span>
                    </td>
                    <!-- This is the House Name of Accommodation3-->
                    <td>
                        <span class="acc_house_name mb-0" data_house_name="Seaside Apartment">Seaside Apartment</span>
                    </td>
                    <!-- This is the Host Name of Accommodation3-->
                    <td>
                        <span class="acc_host_name mb-0" data_house_name="Emily Davis">Emily Davis</span>
                    </td>
                    <!-- This is the address of Accommodation3-->
                    <td>
                        <span class="acc_address" data_email="400 Sandybay Rd">400 Sandybay Rd</span>
                    </td>
                    <!-- This is the city of Accommodation3-->
                    <td>
                        <span class="acc_city" data_acc_city="Hobart">Hobart</span>
                    </td>
                    <!-- This is the rate of Accommodation3-->
                    <td>
                        <div class="acc_accomodation_rate" data_accommodation_rate="3.5">
                           <span class="text-warning fa fa-star"></span>
                           <span class="text-warning fa fa-star"></span>
        	               <span class="text-warning fa fa-star"></span>
        	               <span class="text-warning fa fa-star"></span>
                           <span class="text-warning fa fa-star"></span>
                           <!--When click the button, the page of review will show-->
                           <span class="action-btn">
                               <a href="Manager_Dashboard_Accommodation Management_Client Review.html" class="text-info edit-rate"><i class="fa fa-edit font-18"></i></a>
                           </span>
                        </div>
                    </td>
                    <!--This is the function for edit and delete Accommodation3-->
                    <td class="text-center">
                        <div class="action-btn">
                            <a href="javascript:void(0)" class="text-info edit"><i class="mdi mdi-account-edit font-20"></i></a>
                            <a href="javascript:void(0)" class="text-dark delete ml-2"><i class="mdi mdi-delete font-20"></i></a>
                        </div>
                    </td>
                </tr>

                <!-- This is the information of Accomdation4-->
                <tr class="search-items">
                    <td>
                        <!-- This is the checkbox for Accomdation4-->
                        <div class="n-chk align-self-center text-center">
                            <div class="checkbox checkbox-info">
                                <input type="checkbox" class="material-inputs user-chkbox" id="checkbox4">
                                <label class="" for="checkbox4"></label>
                            </div>
                        </div>
                    </td>
                    <!-- This is the accommodation id of Accomdation4-->
                    <td>
                        <img src="../img/ACC4.jpg" alt="avatar" width="150" height="100">
                    </td>
                    <!-- This is the accommodation id of Accomdation4-->
                    <td>
                        <span class="acc_accommodation_id mb-0" data_accomodation_id="004">004</span>
                    </td>
                    <!-- This is the House Name of Accommodation4-->
                    <td>
                        <span class="acc_house_name mb-0" data_house_name="Comfortable Apartment">Comfortable Apartment</span>
                    </td>
                    <!-- This is the Host Name of Accommodation4-->
                    <td>
                        <span class="acc_host_name mb-0" data_house_name="Jennifer Lee">Jennifer Lee</span>
                    </td>
                    <!-- This is the address of Accommodation4-->
                    <td>
                        <span class="acc_address" data_email="15 Birsbane St">15 Birsbane St</span>
                    </td>
                    <!-- This is the city of Accommodation4-->
                    <td>
                        <span class="acc_city" data_acc_city="Launceston">Launceston</span>
                    </td>
                    <!-- This is the rate of Accommodation4-->
                    <td>
                        <div class="acc_accomodation_rate" data_accommodation_rate="4.0">
                           <span class="text-warning fa fa-star"></span>
                           <span class="text-warning fa fa-star"></span>
        	               <span class="text-warning fa fa-star"></span>
        	               <span class="text-warning fa fa-star"></span>
                           <span class="fa fa-star"></span>
                            <!--When click the button, the page of review will show-->
                           <span class="action-btn">
                               <a href="Manager_Dashboard_Accommodation Management_Client Review.html" class="text-info edit-rate"><i class="fa fa-edit font-18"></i></a>
                           </span>
                        </div>
                    </td>
                    <!--This is the function for edit and delete Accommodation4-->
                    <td class="text-center">
                        <div class="action-btn">
                            <a href="javascript:void(0)" class="text-info edit"><i class="mdi mdi-account-edit font-20"></i></a>
                            <a href="javascript:void(0)" class="text-dark delete ml-2"><i class="mdi mdi-delete font-20"></i></a>
                        </div>
                    </td>
                </tr>

                <!-- This is the information of Accomdation5-->
                <tr class="search-items">
                    <td>
                        <!-- This is the checkbox for Accomdation5-->
                        <div class="n-chk align-self-center text-center">
                            <div class="checkbox checkbox-info">
                                <input type="checkbox" class="material-inputs user-chkbox" id="checkbox5">
                                <label class="" for="checkbox5"></label>
                            </div>
                        </div>
                    </td>
                    <!-- This is the accommodation id of Accomdation5-->
                    <td>
                        <img src="../img/ACC5.jpg" alt="avatar" width="150" height="100">
                    </td>
                    <!-- This is the accommodation id of Accomdation5-->
                    <td>
                        <span class="acc_accommodation_id mb-0" data_accomodation_id="005">005</span>
                    </td>
                    <!-- This is the House Name of Accommodation5-->
                    <td>
                        <span class="acc_house_name mb-0" data_house_name="Sweet Apartment">Sweet Apartment</span>
                    </td>
                    <!-- This is the Host Name of Accommodation5-->
                    <td>
                        <span class="acc_host_name mb-0" data_house_name="Jennifer Lee">Jennifer Lee</span>
                    </td>
                    <!-- This is the address of Accommodation5-->
                    <td>
                        <span class="acc_address" data_email="35 Birsbane St">35 Birsbane St</span>
                    </td>
                    <!-- This is the city of Accommodation5-->
                    <td>
                        <span class="acc_city" data_acc_city="Launceston">Launceston</span>
                    </td>
                    <!-- This is the rate of Accommodation5-->
                    <td>
                        <div class="acc_accomodation_rate" data_accommodation_rate="4.5">
                           <span class="text-warning fa fa-star"></span>
                           <span class="text-warning fa fa-star"></span>
        	               <span class="text-warning fa fa-star"></span>
        	               <span class="text-warning fa fa-star"></span>
                           <span class="text-warning fa fa-star-half"></span>
                           <!--When click the button, the page of review will show-->
                           <span class="action-btn">
                               <a href="Manager_Dashboard_Accommodation Management_Client Review.html" class="text-info edit" id="edit-rate"> <i class="fa fa-edit font-18"></i></a>
                           </span>
                        </div>
                    </td>
                    <!--This is the function for edit and delete Accommodation5-->
                    <td class="text-center">
                        <div class="action-btn">
                            <a href="javascript:void(0)" class="text-info edit"><i class="mdi mdi-account-edit font-20"></i></a>
                            <a href="javascript:void(0)" class="text-dark delete ml-2"><i class="mdi mdi-delete font-20"></i></a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<!-- Modal of Accommodation Details -->
<div id="accommodation_detail_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!--This is the header of the modal-->
            <div class="modal-header">
                <h4 class="modal-title" id="accDetailModalLabel">Accommodation Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>

            <!--This is the body of the modal-->
            <div class="modal-body">
                <!--Here to input House Name-->
                <div class="form-group row">
                    <label class="col-md-3 text-left control-label col-form-label">House Name</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="house_name" placeholder="House Name">
                    </div>
                </div>
                <!--Here to input description-->
                <div class="description">
                    <label class="text-left control-label col-form-label">Description</label>
                    <textarea class="form-control" rows="5"></textarea>
                </div>
                <br>
                <!--Here to input price-->
                <div class="form-group row">
                    <label class="col-md-3 text-left control-label col-form-label">Price</label>
                    <div class="col-md-9">
                        <span class="input-group-text col-md-9">$<input type="text" class="form-control col-md-9" id="price" placeholder="Price"></span>
                    </div>
                </div>
                <!--Here to input how many rooms-->
                <div class="form-group row">
                    <label class="col-md-3 text-left control-label col-form-label">Number of Room</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="number_of_room" placeholder="Number of Room">
                    </div>
                </div>
                <!--Here to input how many bathrooms-->
                <div class="form-group row">
                    <label class="col-md-3 text-left control-label col-form-label">Number of Bathroom</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="number_of_bathroom" placeholder="Number of Bathroom">
                    </div>
                </div>
                <!--Here to input Max Guests Allowed-->
                <div class="form-group row">
                    <label class="col-md-3 text-left control-label col-form-label">Max Guests Allowed</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="max_guests_allowed" placeholder="Max Guests Allowed">
                    </div>
                </div>
                <br>
                <!--Here to choose facilities-->
                <div class="form-group row">
                    <!--Weather smoke allowed?-->
                    <div class="col-md-3">
                        <input type="checkbox" id="smoke_allowed" class="material-inputs chk-col-light-blue">
                        <label for="smoke_allowed">Smoke Allowed</label>
                    </div>
                    <!--Any garage?-->
                    <div class="col-md-3">
                        <input type="checkbox" id="garage" class="material-inputs chk-col-light-blue">
                        <label for="garage">Garage</label>
                    </div>
                    <!--Pet friendly?-->
                    <div class="col-md-3">
                        <input type="checkbox" id="pet_friendly" class="material-inputs chk-col-light-blue">
                        <label for="pet_friendly">Pet Friendly</label>
                    </div>
                    <!--Internet provided?-->
                    <div class="col-md-3">
                        <input type="checkbox" id="internet_provided" class="material-inputs chk-col-light-blue">
                        <label for="internet_provided">Internet Provided</label>
                    </div>
                </div>
                <br>
                <!--Choose check in time-->
                <div class="form-group row">
                    <label for="check_in_time" class="col-md-3 col-form-label">Date Check In</label>
                    <div class="col-md-9">
                        <input class="form-control" type="date" value="2021-04-01"
                            id="check_in_time">
                    </div>
                </div>
                <!--Choose check out time-->
                <div class="form-group row">
                    <label for="check_out_time" class="col-md-3 col-form-label">Date Check Out</label>
                    <div class="col-md-9">
                        <input class="form-control" type="date" value="2021-04-05"
                            id="check_out_time">
                    </div>
                </div>
                <!--Here to input Address-->
                <div class="form-group row">
                    <label class="col-md-3 text-left control-label col-form-label">Address</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="address" placeholder="Address">
                    </div>
                </div>
                <div class="form-group row">
                    <!--Here to input City-->
                    <label class="col-md-1 text-left control-label col-form-label">City</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="city" placeholder="City">
                    </div>
                    <!--Here to input Postal Code-->
                    <label class="col-md-1 text-left control-label col-form-label">Postal Code</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="postal_code" placeholder="Postal Code">
                    </div>
                    <!--Here to input State-->
                    <label class="col-md-1 text-left control-label col-form-label">State</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="state" placeholder="State">
                    </div>
                </div>
                <!--Here to upload image-->
                <div class="form-group row">
                    <label class="col-md-6 text-left control-label col-form-label">&nbsp Image upload</label>
                    <div class="col-md-6">
                    <input type="file" class="form-control" id="uoload_image" aria-describedby="fileHelp">
                    </div>
                </div>
            </div>
                <br>
            
            <!--This is the footer of the modal, to close the modal or save changes-->
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger">Save changes</button>
            </div>

        </div>
    </div>
</div>


</body>
</html>






                





                            
        






    
    