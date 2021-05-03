<!DOCTYPE html>
<?php
// connect database
include('db_conn.php');
?>
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
                                <a class="nav-link" href="Manager_Dashboard_Accommodation.html">Accommodation management</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- end bootstrap navigation bar -->
        </header>

    </div>
    <!-- Topbar for search and add new user -->
    <div class="Topbar">
        <div class="card card-body">
            <div class="row">
                <div class="col-md-4">
                    <form>
                        <input type="text" class="form-control product-search" id="input-search" placeholder="Search User">
                    </form>
                </div>
                <div class="col-md-8 text-right d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                    <a href="javascript:void(0)" id="btn-add-user" class="btn btn-info"><i class="mdi mdi-account-multiple-plus font-16 mr-1"></i> Add User</a>
                </div>
            </div>
        </div>
    </div>
    

    <!--This is the table of all the users-->
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
                    <!--This shows the attributes of users-->
                    <th class="text-dark font-weight-bold">User ID</th>
                    <th class="text-dark font-weight-bold">First Name</th>
                    <th class="text-dark font-weight-bold">Last Name</th>
                    <th class="text-dark font-weight-bold">Email</th>
                    <th class="text-dark font-weight-bold">Phone Number</th>
                    <th class="text-dark font-weight-bold">Account Type</th>
                    <th class="text-dark font-weight-bold">ABN Number</th>
                    <th class="text-dark font-weight-bold">Postal Address</th>
                    <th class="text-center">
                        <div class="action-btn">
                            <a href="javascript:void(0)" class="delete-multiple text-danger"><i class="fas fa-trash font-20 font-medium"></i> Delete Row</a>
                        </div>
                    </th>
                </thead>
                <tbody>


                    <!-- This is the information of user1-->
                    <?PHP
                     $sql = "SELECT * FROM account";
                     $result = $conn->query($sql);
                     $check_n=1;
                        if ($result->num_rows > 0) {
                       // output data of each row
                       while($row = $result->fetch_assoc()) {
                    ?>
                    <tr class="search-items">
                        <td>
                            <!-- This is the checkbox for user1-->
                            <div class="n-chk align-self-center text-center">
                                <div class="checkbox checkbox-info">
                                    <input type="checkbox" class="material-inputs user-chkbox" id="checkbox<?php echo $check_n;?>">
                                    <label class="" for="checkbox<?php echo $check_n;?>"></label>
                                </div>
                            </div>
                        </td>
                        <!-- This is the user id-->
                        
                        <td>
                            <span class="user_user_id mb-0" data_user_id="<?php echo $row["user_id"];?>"><?php echo $row["user_id"];?></span>
                        </td>
                        <!-- This is the first name of the user-->
                        <td>
                            <span class="user_first_name mb-0" data_first_name="<?php echo $row["first_name"];?>"><?php echo $row["first_name"];?></span>
                        </td>
                        <!-- This is the last name of the user-->
                        <td>
                            <span class="user_last_name mb-0" data_last_name="<?php echo $row["last_name"];?>"><?php echo $row["last_name"];?></span>
                        </td>
                        <!-- This is the email of the user-->
                        <td>
                            <span class="user_email" data_email="<?php echo $row["email"];?>"><?php echo $row["email"];?></span>
                        </td>
                        <!-- This is the phone number of the user-->
                        <td>
                            <span class="user_phone_number" data_phone_number="<?php echo $row["phone_number"];?>"><?php echo $row["phone_number"];?></span>
                        </td>
                        <!-- This is the user type of the user-->
                        <td>
                            <span class="user_account_type text-info" data_account_type="<?php echo $row["account_type"];?>"><?php echo $row["account_type"];?></span>
                        </td>
                        <!-- This is the ABN number of the user-->
                        <td>
                            <span class="user_abn_number text-info" data_abn_number="<?php echo $row["abn_number"];?>"><?php echo $row["abn_number"];?></span>
                        </td>
                        <!-- This is the poatal address of the user-->
                        <td>
                            <span class="user_postal_address text-info" data_postal_address="<?php echo $row["postal_address"];?>"><?php echo $row["postal_address"];?></span>
                        </td>
                        <!-- This is the password of the user, but it is hidden on the table-->
                        <td style="display: none;">
                            <span  class="user_password mb-0" data_password="<?php echo $row["password"];?>"><?php echo $row["password"];?></span>
                        </td>
                        <!--This is the function for edit and delete the user-->
                        <td class="text-center">
                            <div class="action-btn">
                                <a href="javascript:void(0)" class="text-info edit"><i class="mdi mdi-account-edit font-20"></i></a>
                                <a href="javascript:void(0)" class="text-dark delete ml-2"><i class="mdi mdi-delete font-20"></i></a>
                            </div>
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
</div>
</div>


<!-- Create Modal -->
<div class="modal fade" id="createmodel" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <form>
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel"><i class="ti-marker-alt mr-2"></i> Create
                New Contact</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <button type="button" class="btn btn-info"><i
                        class="ti-user text-white"></i></button>
                        <input required="required" type="text" class="form-control" placeholder="Enter Name Here"
                        aria-label="name">
                    </div>
                    <div class="input-group mb-3">
                        <button type="button" class="btn btn-info"><i class="ti-more text-white"></i></button>
                        <input type="text" class="form-control" placeholder="Enter Mobile Number Here" aria-label="no">
                    </div>
                    <div class="input-group mb-3">
                        <button type="button" class="btn btn-info"><i class="ti-import text-white"></i></button>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01">                                    
                            <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success"><i class="ti-save"></i> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>


<!-- Modal for edit user-->
    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- This is the body of the Modal to creat a new user -->           
                <div class="modal-body">
                    <div class="add-user-box">
                        <div class="add-user-content">
                            <form id="addUserModalTitle">
                                <div class="row mb-3">
                                    <!-- Add first name for a new user -->
                                    <div class="col-md-6">
                                        <div class="first_name">
                                            <input type="text" id="first_name" class="form-control" placeholder="First Name">
                                            <span class="validation-text"></span>
                                        </div>
                                    </div>
                                    <!-- Add last name for a new user -->
                                    <div class="col-md-6">
                                        <div class="last_name">
                                            <input type="text" id="last_name" class="form-control" placeholder="Last Name">
                                            <span class="validation-text"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <!-- Add email for a new user -->
                                    <div class="col-md-6">
                                        <div class="email">
                                            <input type="text" id="email" class="form-control" placeholder="Email">
                                            <span class="validation-text"></span>
                                        </div>
                                    </div>
                                    <!-- Add phone number for a new user -->
                                    <div class="col-md-6">
                                        <div class="phone_number">
                                            <input type="text" id="phone_number" class="form-control" placeholder="Phone Number">
                                            <span class="validation-text"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <!-- Add id for a new user-->
                                    <div class="col-md-6">
                                        <div class="user_id">
                                            <input type="text" id="user_id" class="form-control" placeholder="User_id">
                                            <span class="validation-text"></span>
                                        </div>
                                    </div>
                                    <!-- Add password for a new user -->
                                    <div class="col-md-6">
                                        <div class="password">
                                            <input type="text" id="password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,12}" placeholder="Password">
                                            <div id="message">
                                                <p>6-12 charactes, including uppercase, lowercase letters, numbers and special character: !@#$%</p>
                                            </div>
                                            <span class="validation-text"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <!-- Identify the type of user-->
                                    <div class="col-md-6">
                                        <div class="dropdown">
                                            <select class="form-control">
                                                <option value="Client" selected="selected">Client</option>
                                                <option value="Host">Host</option>
                                                <option value="System Manager">System Manager</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Add password for a new user -->
                                    <div class="col-md-6">
                                        <div class="ABN">
                                            <input type="text" id="ABN" class="form-control" placeholder="ABN">
                                            <span class="validation-text"></span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Add postal address for a new user -->
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="postal_address">
                                            <input type="text" id="postal_address" class="form-control" placeholder="Postal Address">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button id="btn-add" class="btn btn-success">Add</button>
                    <button id="btn-edit" class="btn btn-success">Save</button>
                    <button class="btn btn-danger" data-dismiss="modal"> Cancle</button>
                </div>
            </div>
        </div>
    </div>
    
<script type="text/javascript">
    $(document).ready(function() {
        // hide and show abn number follow the choice host or client
        $("#ABN").hide();
        $(".form-control").change(function() {
            if (this.value == 'Host') {
                $("#ABN").show();
            }
            else if (this.value == 'Client' || this.value == 'System Manager') {
                $("#ABN").hide();
            }
        });
    });

    //validate register form
        $(document).ready(function() {
            $('form[id="registrationForm"]').validate({
                rules: {
                    username: 'required',
                    password: {
                        required: true,
                        minlength: 6,
                        maxlength: 12,
                        passwordcheck: true
                    },
                    confirmPass: {
                        required: true,
                        equalTo: "#password"
                    },
                    firstName: 'required',
                    lastName: 'required',
                    email: {
                        required: true,
                        email: true
                    },
                    phoneNumber: {
                        required: true,
                        phonecheck: true
                    },
                    postalAddress: 'required',
                    abnNumber: 'required',
                },
                messages: {
                    username: '<span class="error">This field is required</span>',
                    password: '<span class="error">Password is 6 to 12 characters in length and contains at least 1 lower case letter, 1 upper case letter, 1 number and 1 of following characters ! @ # $ %</span>',
                    confirmPass: '<span class="error">The confirm password not matching</span>',
                    firstName: '<span class="error">This field is required</span>',
                    lastName: '<span class="error">This field is required</span>',
                    email: '<span class="error">The email not valid</span>',
                    phoneNumber: '<span class="error">This field is required and phone number contains only number</span>',
                    postalAddress: '<span class="error">This field is required</span>',
                    abnNumber: '<span class="error">This field is required</span>',
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
            //validate password
            $.validator.addMethod("passwordcheck", function(value) {
            return /[a-z]/.test(value) // has at least 1 lowercase letter
               && /[A-Z]/.test(value) // has at least 1 uppercase letter
               && /\d/.test(value) // has at least 1 digit
               && /[!@#\$%]/.test(value) // has at least 1 following special characters ! @ # $ %
            });
            //validate phone number
            $.validator.addMethod("phonecheck", function(value) {
            return /^[0-9]*$/.test(value) // has at least 1 lowercase letter
            });
        });


</script>

</body>
</html>