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
    <!-- Bootstrap JQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <!--This page plugins -->
    <script src="../js/manageAccommodation.js"></script>

<!--This is a container for all the reviews of this accommodation-->
<div class="container">  
    <div class="col-md-16 single-review align-self-center">
        <!--This is the first review-->
        <div class="card card-body">
            <div>
                <!--This is the title of the review-->
                <h5 class="review-title text-truncate" data_reviewHeading="Good Experience">Good Experience</h5>
                <!--This is person who made the review-->
                <h6 class="review-name text-truncate border-10" data_userName="Andrew Smith">Andrew Smith</h6>
                <!--This is rate the user gave-->
                <div class="acc_accomodation_rate border-10" data_accommodation_rate="5"></div>
                    <span class="text-warning fa fa-star"></span>
                    <span class="text-warning fa fa-star"></span>
                    <span class="text-warning fa fa-star"></span>
                    <span class="text-warning fa fa-star"></span>
                    <span class="text-warning fa fa-star"></span>
                </div>
                <div class="review-content">
                <!--This is the content of review-->    
                    <p class="note-inner-content text-muted " data_reviewContent="The staff were so friendly & helpful, the room was exceptionally clean & comfortable. The shower was awesome! The hotel felt new & modern but still comfy and welcoming. The location was spot on, we walked everywhere all weekend! Would love to stay there again soon!">The staff were so friendly & helpful, the room was exceptionally clean & comfortable. The shower was awesome! The hotel felt new & modern but still comfy and welcoming. The location was spot on, we walked everywhere all weekend! Would love to stay there again soon!</p>
                </div>
                <!--This is the button to delete the review-->
                <div class="action-btn">
                    <a href="javascript:void(0)" class="far fa-trash-alt remove-review font-24"></a>
                </div>
        </div>
    </div>

    <div class="col-md-16 single-review align-self-center">
        <!--This is the second review-->
        <div class="card card-body">
            <div>
                <h5 class="review-title text-truncate" data_reviewHeading="Nice Accomdation">Nice Accomdation</h5>
                <h6 class="review-name text-truncate border-10" data_userName="David Jones">David Jones</h6>
                <div class="acc_accomodation_rate border-10" data_accommodation_rate="4.0"></div>
                    <span class="text-warning fa fa-star"></span>
                    <span class="text-warning fa fa-star"></span>
                    <span class="text-warning fa fa-star"></span>
                    <span class="text-warning fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
                <div class="review-content">
                    <p class="note-inner-content text-muted " data_reviewContent="Good accommodation with great views! It could be better if there was a car park. ">Good accommodation with great views! It could be better if there was a car park.</p>
                </div>
                <div class="action-btn">
                    <a href="javascript:void(0)" class="far fa-trash-alt remove-review font-24"></a>
                </div>
        </div>
    </div>

    <div class="col-md-16 single-review align-self-center">
        <!--This is the third review-->
        <div class="card card-body">
            <div>
                <h5 class="review-title text-truncate" data_reviewHeading="Bad Experience">Bad Experience</h5>
                <h6 class="review-name text-truncate border-10" data_userName="Zoe Miller">Zoe Miller</h6>
                <div class="acc_accomodation_rate border-10" data_accommodation_rate="2.0"></div>
                    <span class="text-warning fa fa-star"></span>
                    <span class="text-warning fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
                <div class="review-content">
                    <p class="note-inner-content text-muted " data_reviewContent="Really a bad experience, the bathroom is terrible!!!">Really a bad experience, the bathroom is terrible!!!</p>
                </div>
                <div class="action-btn">
                    <a href="javascript:void(0)" class="far fa-trash-alt remove-review font-24"></a>
                </div>
        </div>
    </div>
</div>
             
                    
</body>
</html>