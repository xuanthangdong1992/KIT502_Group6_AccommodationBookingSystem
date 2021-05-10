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
</head>


<body>
    <!-- Bootstrap JQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <!--This page plugins -->
    <script src="../../js/manageAccommodation.js"></script>

    <!--This is a container for all the reviews of this accommodation-->



    <div class="container">
        <div class="col-md-16 single-review align-self-center">
            <!--This is the first review-->
            <?PHP
            $sql = "SELECT * FROM accommodation_review";
            $result = $conn->query($sql);
            $check_n = 0;
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $check_n++;
            ?>
                    <div class="card card-body">

                        <!--This is the review_id-->
                        <h5 class="acc_accommodation_review_id text-truncate" data_accommodation_review_id="<?php echo $row["accommodation_review_id"]; ?>"><?php echo "Review ID: " . $row["accommodation_review_id"]; ?></h5>
                        <!--This is the accommodation_id-->
                        <h6 class="acc_accommodation_id text-truncate border-10" data_accommodation_id="<?php echo $row["accommodation_id"]; ?>"><?php echo "Accommodation ID: " . $row["accommodation_id"]; ?></h6>
                        <!--This is the client_id defined who made the review-->
                        <h6 class="acc_client_id text-truncate border-10" data_client_id="<?php echo $row["client_id"]; ?>"><?php echo "Client ID: " . $row["client_id"]; ?></h6>
                        <!--This is rate the user gave-->
                        <div class="acc_rate" data_rate="<?php echo $row["rate"]; ?>">
                            <?php
                            $rate = $row["rate"];
                            $rate_nums = explode(".", $rate);

                            for ($i = 0; $i < $rate_nums[0]; $i++) {
                            ?>
                                <span class="text-warning fa fa-star"></span>
                            <?php
                            }


                            if (count($rate_nums) == 2) {
                            ?>
                                <span class="text-warning fa fa-star-half"></span>
                            <?php

                            };

                            ?>

                            <div class="review-content">
                                <!--This is the content of review-->
                                <p class="note-inner-content text-muted acc_comment " data_comment="<?php echo $row["comment"]; ?>"><?php echo $row["comment"]; ?></p>
                            </div>
                            <!--This is the function to delete the review-->
                            <div class="action-btn">
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#deleteReviewModal<?php echo $row['accommodation_review_id']; ?>">
                                    Delete This Review
                                </button>
                            </div>
                            <br>
                        </div>

                        <!-- Button trigger modal -->


                    
                        <!--Delete modal start -->
                        <div class="modal fade" id="deleteReviewModal<?php echo $row['accommodation_review_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel">Delete Review</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container-fluid">
                                            <p>Are you sure to delete the information? </p>
                                            <p>This action cannot be undone. </p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button ty type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                        <a href="controlR.php?id=<?php echo $row['accommodation_review_id']; ?>&action=delete" class="btn btn-danger">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Delete Modal End-->

                    </div>
                <?php
                }
                ?>

            <?PHP

            } else {
                echo "0 results";
            }
            $conn->close();
            ?>

        </div>





</body>

</html>