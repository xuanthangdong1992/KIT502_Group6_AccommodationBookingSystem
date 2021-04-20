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
    <!--This page plugins -->
    <script src="../js/manageAccommodation.js"></script>
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
                    <h2 style="color: white">Wellcome to booking management</h2>
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
                                <a class="nav-link" href="host-dashboard-accommodation.html">Accommodation management</a>
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
                <!--This shows the attributes of accomodations-->
                <th class="text-dark font-weight-bold">Client ID</th>
                <th class="text-dark font-weight-bold">Acccommodation ID</th>
                <th class="text-dark font-weight-bold">Start date</th>
                <th class="text-dark font-weight-bold">End Date</th>
                <th class="text-dark font-weight-bold">Number of guests</th>
                <th class="text-dark font-weight-bold">Status</th>
                <th class="text-dark font-weight-bold">Decide</th>
            </thead>

            <tbody>

                <!-- This is the information of booking 1-->
                <tr class="search-items">
                    <!-- This is the client id of booking 1-->
                    <td>
                        <span class="mb-0">150</span>
                    </td>
                    <!-- This is the accommodation id of booking 1-->
                    <td>
                        <span class="mb-0">001</span>
                    </td>
                    <!-- This is the start date of booking 1-->
                    <td>
                        <span class="mb-0">12/3/2021</span>
                    </td>
                    <!-- This is the end date of booking 1 -->
                    <td>
                        <span class="mb-0">15/03/2021</span>
                    </td>
                    <!-- This is the number of guests of booking 1-->
                    <td>
                        <span class="mb-0">4</span>
                    </td>
                    <!-- This is the status of booking 1-->
                    <td>
                        <span class="mb-0">confirmed</span>
                    </td>
                    <!--This is the function for edit and delete Accommodation1-->
                    <td class="text-center">
                        <div class="action-btn">
                            <a href="" data-toggle="modal" data-target="#changeStatus" class="text-info edit"><i class="mdi mdi-account-edit font-20"></i></a>
                        </div>
                    </td>
                </tr>

                
            </tbody>
        </table>
    </div>
</div>

<!-- change Status Modal -->
<div class="modal fade" id="changeStatus" tabindex="-1" role="dialog" aria-labelledby="changeStatusLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <!-- change status form -->
                <button type="button" class="close float-right btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h1>Change status</h1>

                <form id="changeStatusForm" action="" method="post">
                    <div class="form-group">
                        <label>Number of guests</label>
                        <select class="form-control" id="bookingStatus" name="bookingStatus">
                            <option value="pending">Pending</option>
                            <option value="confirmed">Confirmed</option>
                            <option value="cancel">Cancel</option>
                            <option value="reject">Reject</option>
                        </select>
                    </div>
                    <div id="reasonReject" class="form-group required">
                        <label class="label-control">Give the reason for reject decision:</label>
                        <textarea rows="5" class="form-control" type="text" id="reason" name="reason"></textarea>
                    </div>

                    <div class="submit-button">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End change Status Modal -->

<script type="text/javascript">
        // hide and show reason when user click to rejected status.
        $(document).ready(function() {
            $("#reasonReject").hide();
            $(".form-control").change(function() {
                if (this.value == 'reject') {
                    $("#reasonReject").show();
                }
                else if (this.value == 'pending' || this.value == 'confirmed' || this.value == 'cancel') {
                    $("#reasonReject").hide();
                }
            });
        });

        // validate change status form
        $(document).ready(function() {
            $('form[id="changeStatusForm"]').validate({
                rules: {
                    reason: 'required',
                },
                messages: {
                    reason: '<span class="error">This field is required</span>',
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
    </script>



</body>
</html>





















