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
    <!-- Main CSS file -->
    <link rel="stylesheet" href="../../css/clientstyle.css">
    <!-- Bootstrap CSS -->
    <!-- Bootstrap JQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <!--This page plugins -->
    <script src="../../js/manageAccommodation.js"></script>
</head>
<body>
    <!-- jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <!-- support call ajax -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- validation plugin -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    
    
    
    <!-- This is a card for welcome -->
    <div class="card-welcome">
        <div class="card-body bg-success">
            <!-- bootstrap navigation bar -->
            <nav class="navbar navbar-expand-lg navbar-dark static-top">
                <div class="container">
                    <a href="index.html">
                        <img class="logo" src="../../img/logo.png" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="Manager_Dashboard_Home.php">Home
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <!-- Display wellcome status when login sucess -->
                            <?php
                            if (isset($_SESSION['loginUsername'])) {
                                // check permission if login account is client
                                if ($_SESSION["permission"] == "system_manager") {

                            ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="">Welcome <?php echo $_SESSION['loginUsername']; ?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="" id="logout">Logout</a>
                                    </li>
                                <?php
                                } else 
									if ($_SESSION["permission"] == "host") {
                                    // redirect to host page
                                    echo "<script>
										alert('Sorry! Your account is not allowed to access this website!');
										window.location.href='../host_dashboard/host-dashboard.php';
										</script>";
                                } else 
									if ($_SESSION["permission"] == "client") {
                                    // redirect to client page
                                    echo "<script>
										alert('Sorry! Your account is not allowed to access this website!');
										window.location.href='../index.php';
										</script>";
                                }
                            } else {
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="" data-toggle="modal" data-target="#loginModal">Login</a>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- end bootstrap navigation bar -->
        </div>
    </div>
    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <!-- login form -->
                    <button type="button" class="close float-right btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h1>Login</h1>
                    <form id="loginForm">
                        <!-- <form id="loginForm" action="login_process.php" method="post"> -->
                        <div class="form-group required">
                            <label class="label-control">Username:</label>
                            <input class="form-control" type="text" id="loginUsername" name="loginUsername" />
                        </div>
                        <div class="form-group required">
                            <label class="label-control">Password:</label>
                            <input class="form-control" type="password" id="loginPass" name="loginPass" />
                        </div>
                        <div class="submit-button">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Login Modal -->
    <!--This is one container with two cards-->
    <div class="row">
        <!-- This is a card to link to User Management Dashboard -->
        <div class="col-lg-4">
            <div class="card">
                <img class="card-img-top" src="../../img/M1.png" alt="Card image cap" height="300">
                <div class="card-body align-items-center mb-3">
                    <h3 class="font-normal">User Management Dashboard</h3>
                    <!--When click on the button, the page will jump to User Management Dashboard-->
                    <a href="Manager_Dashboard_User.php" button class="btn btn-success btn-rounded waves-effect waves-light mt-3">User Management</a>
                </div>
            </div>
        </div>
        <!-- This is a card to link to Accomdation Management Dashboard -->
        <div class="col-lg-4">
            <div class="card">
                <img class="card-img-top" src="../../img/M2.jpg" alt="Card image cap" height="300">
                <div class="card-body align-items-center mb-3">
                    <h4 class="font-normal">Accomdation Management Dashboard</h4>
                    <!--When click on the button, the page will jump to Accomdation Management Dashboard-->
                    <a href="Manager_Dashboard_Accommodation.php" button class="btn btn-success btn-rounded waves-effect waves-light mt-3">Manage Accommodations Here</a>
                </div>
            </div>
        </div>
        <!-- This is a card to link to Booking Management Dashboard -->
        <div class="col-lg-4">
            <div class="card">
                <img class="card-img-top" src="../../img/M3.jpg" alt="Card image cap" height="300">
                <div class="card-body align-items-center mb-3">
                    <h4 class="font-normal">Booking Management Dashboard</h4>
                    <!--When click on the button, the page will jump to Booking Management Dashboard-->
                    <a href="Manager_Dashboard_Booking.php" button class="btn btn-success btn-rounded waves-effect waves-light mt-3">Manage Bookings Here</a>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            // process form login
            $(document).ready(function() {
                // validate login form
                $('form[id="loginForm"]').validate({
                    rules: {
                        loginUsername: 'required',
                        loginPass: 'required',
                    },
                    messages: {
                        loginUsername: '<span class="error">This field is required</span>',
                        loginPass: '<span class="error">This field is required</span>',
                    },
                    submitHandler: function(form) {
                        // use ajax to send request to server
                        var loginUsername = $('#loginUsername').val();
                        var loginPass = $('#loginPass').val();
                        $.ajax({
                            url: '../login_process.php',
                            method: 'POST',
                            data: {
                                loginUsername: loginUsername,
                                loginPass: loginPass
                            },
                            // get success message from server
                            success: function(data) {
                                // if respond from server is "fail"
                                if (data == 'fail') {
                                    alert("Wrong user id or password.");
                                } else
                                // if login account is client
                                if (data == 'client') {
                                    $('#loginModal').hide();
                                    location.href = "../index.php";
                                } else
                                // if login account is host
                                if (data == 'host') {
                                    $('#loginModal').hide();
                                    location.href = "../host_dashboard/host-dashboard.php";
                                } else
                                // if login account is system manager
                                if (data == 'system_manager') {
                                    $('#loginModal').hide();
                                    location.href = "Manager_Dashboard_Home.php";
                                }
                            }
                        });
                    }
                });
            });
            //logout process
            $(document).ready(function() {
                $('#logout').click(function() {
                    var logout = "logout";
                    $.ajax({
                        url: "../login_process.php",
                        method: "POST",
                        data: {
                            logout: logout
                        },
                        success: function() {
                            location.reload();
                        }
                    });
                });

            });
        </script>
</body>
</html>