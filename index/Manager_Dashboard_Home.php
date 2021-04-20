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
</head>

<body>
    <!-- This is a card for welcome -->
    <div class="card-welcome">
        <div class="card-body bg-success">
            <h3 class="text-light">Welcome, System Manager :)</h3>
        </div>
    </div>

    <!--This is one container with two cards-->
    <div class="row">
        <!-- This is a card to link to User Management Dashboard -->
        <div class="col-lg-6">
            <div class="card">
                <img class="card-img-top" src="../img/M1.png" alt="Card image cap" height="300">
                <div class="card-body align-items-center mb-3">
                    <h3 class="font-normal">User Management Dashboard</h3>
                    <!--When click on the button, the page will jump to User Management Dashboard-->
                    <a href="Manager_Dashboard_User.html" button class="btn btn-success btn-rounded waves-effect waves-light mt-3">User Management</a>
                </div>
            </div>
        </div>
        <!-- This is a card to link to User Management Dashboard -->
        <div class="col-lg-6">
            <div class="card">
                <img class="card-img-top" src="../img/M2.jpg" alt="Card image cap" height="300">
                <div class="card-body align-items-center mb-3">
                    <h3 class="font-normal">Accomdation Management Dashboard</h3>
                    <!--When click on the button, the page will jump to User Management Dashboard-->
                    <a href="Manager_Dashboard_Accommodation.html" button class="btn btn-success btn-rounded waves-effect waves-light mt-3">Manage Accommodations Here</a>
                </div>
            </div>
        </div>

        
    </body>
</html>