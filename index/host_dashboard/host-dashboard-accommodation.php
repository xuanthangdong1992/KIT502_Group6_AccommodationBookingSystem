<?php
// $path = $_SERVER['DOCUMENT_ROOT'];
// $path .= "/../db_conn.php";
include('../db_conn.php');
include('../session.php');

//session_start();  
//if(!isset($_SESSION["user"]))
//{
// header("location:host-dashboard.php");
//}
?>          
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Title -->
    <title>CRUD Host Management Dashboard</title>
    <!-- This page plugin CSS -->
    <link href="../../css/style.css" rel="stylesheet">
    <link href="../../css/clientstyle.css" rel="stylesheet">
</head>

<body>

    <!-- Bootstrap JQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <!-- This page plugin JQuery -->
    <script src="../../js/manageuser.js"></script>
    <script src="../../js/manageAccommodation.js"></script>

    <!-- validation plugin -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

    <div class="management-nav">
    <header>
                <!-- bootstrap navigation bar -->
                <nav class="navbar navbar-expand-lg navbar-dark static-top">
                    <div class="container">
                        <a href="host-dashboard.php">
                            <img class="logo" src="../../img/logo.png" alt="">
                        </a>
                        <h2 style="color: white">Welcome to Host accommodation management</h2>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarResponsive">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="host-dashboard.php">Home
                                        <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="host-dashboard-booking.php">Host Booking management</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="host-client-review.php">Review</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="host-inbox.php">Inbox</a>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="">Logout</a>
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

<!--Add new acommodation button-->
<div class="card card-body">
    <div class="btn-create">
        <span class="pull-left">
        <a href="#createAccModal" data-toggle="modal" class="btn btn-info btn-lg">
        <span class="glyphicon glyphicon-plus"></span> Create new accommodation</a></span>
    </div>
</div>
<!--message alert bar-->
<?php
			if(isset($_SESSION['msg'])){
				?>
					<div class="alert alert-success">
						<center><?php echo $_SESSION['msg']; ?></center>
					</div>
				<?php
				unset($_SESSION['msg']);
			}
?> 

<div class="table-responsive">
        <!--This is the table of all the accomodations-->
        <table class="table table-striped search-table v-middle" id="accTable">
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
                <th class="text-dark font-weight-bold">Description</th>
                <th class="text-dark font-weight-bold">Address</th>
                <th class="text-dark font-weight-bold">City</th>
                <th class="text-dark font-weight-bold">Accomodation Rate</th>
                <!--delete row button-->
                <th class="text-center">
                    <div class="action-btn">
                        <a href="javascript:void(0)" class="delete-multiple text-danger"><i class="fas fa-trash font-20 font-medium"></i> Delete Row</a>
                    </div>
                </th>
            </thead>

            <tbody>
            <?php
				$query=$conn->query("SELECT * FROM `accommodation` WHERE host_id='host'");
				while($row=$query->fetch_array()){
                $image = "http://localhost:8080/KIT502_tutorials/crud_prac/img/".$row['accommodation_id']. ".jpg";
			?>

                <!-- This is the information of Accomdation-->
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
                    <!-- This is the accommodation image of Accomdation-->
                    <td> <img src='<?php echo $row["image"] ?>' height="100px" width="140px" /></td>               
                    <!-- This is the accommodation id of Accomdation-->
                    <td><?php echo $row["accommodation_id"]; ?></td>
                    <!-- This is the House Name of Accommodation-->
                    <td><?php echo $row["house_name"]; ?></td>
                    <!-- This is the Description of Accommodation-->
                    <td><?php echo $row["description"]; ?></td>
                    <!-- This is the address of Accommodation-->
                    <td><?php echo $row["address"]; ?></td>
                    <!-- This is the city of Accommodation-->
                    <td><?php echo $row["city"]; ?></td>
                    <!-- This is the rate of Accommodation-->
                    <td>
                    <div class="acc_accomodation_rate" data_accommodation_rate="<?php echo $row["accommodation_rate"]; ?>">
                                        <?php
                                        $accommodation_rate=$row["accommodation_rate"];
                                        $accommodation_rate_nums = explode(".",$accommodation_rate);
                                        
                                        for ($i = 0; $i < $accommodation_rate_nums[0]; $i++) {
                                        ?>
                                            <span class="text-warning fa fa-star"></span>
                                        <?php
                                        }
                                        

                                        if (count($accommodation_rate_nums)==2) {
                                        ?>
                                            <span class="text-warning fa fa-star-half"></span>
                                        <?php

                                        };

                                        ?>
                            <!--When click the button, the page of review will show-->
                           <span class="action-btn">
                               <a href="host-client-review.php" class="text-info edit-rate"><i class="fa fa-edit font-18"></i></a>
                           </span>
                    </div>
                    </td>
                    
                    <td class="text-center">
                        <div class="action-btn">
                        <!--This is the function for edit Accommodation-->
                        <a href="#edit<?php echo $row['accommodation_id']; ?>" 
                        data-toggle="modal" class="text-info edit">
                       <i class="mdi mdi-account-edit font-20" title="Edit"></i></a>

                       <!--This is the function for delete Accommodation-->
                       <a href="#deleteAccModal<?php echo $row['accommodation_id']; ?>" 
                       data-toggle="modal" class="text-info edit" name="delete">
                       <i class="mdi mdi-delete font-20" title="Delete"></i></a>     
                       </div>

                       <!-- include edit and delete modal -->
						<?php include ('button_accommodation_modal.php'); ?>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
   
</div>

    <!-- include insert modal -->
    <?php include ('add_accommodation_modal.php'); ?>
    <!-- End -->
    
</body>
</html>