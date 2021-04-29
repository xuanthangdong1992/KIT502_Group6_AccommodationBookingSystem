<!DOCTYPE html>
<html>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Main CSS file -->
  <link rel="stylesheet" href="../css/clientstyle.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <!-- icon star -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <title>Accommodation Assignment - Group 6</title>
</head>
<body>
  <!-- jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  <!-- validation plugin -->
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>


  <div class="regis-bg">
    <div class="main-page">
      <header>
        <!-- bootstrap navigation bar -->
        <nav class="navbar navbar-expand-lg navbar-dark static-top">
          <div class="container">
            <a href="index.html">
              <img class="logo" src="../img/logo.png" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="index.html">Home
                    <span class="sr-only">(current)</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="" data-toggle="modal" data-target="#loginModal">Login</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="" data-toggle="modal" data-target="#registerModal">Register</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>

        <!-- end bootstrap navigation bar -->
      </header>

      <!-- searching -->
      <div class="index-banner-list-acc">
        <form id="search-accommodation-form" action="list-accommodation.html" method="post">
          <!-- city -->
          <div class="row">
            <div class="form-group col">
              <label>City:</label>
              <input class="form-control" type="text" id="city" name="city" />
            </div>
            <!-- start date booking -->

            <div class="form-group col">
              <label>Start Date:</label>
              <input class="form-control" type="date" id="startDate" name="startDate" width="276" />
            </div>
            <!-- end date booking -->
            <div class="form-group col">
              <label>End Date:</label>
              <input class="form-control" type="date" id="endDate" name="endDate" width="276" />
            </div>

            <!-- number of guests -->
            <div class="form-group col">
              <label>Number of guests</label>
              <select class="form-control" id="numberOfGuest" name="numberOfGuest">
                <option>Select ...</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
              </select>
            </div>


          </div>
          <div class="btnSearch">
            <button type="submit" class="btn btn-primary">Search</button> 
          </div> 

        </form>
      </div>
    </div>

    <!-- accommodation - 1 -->
    <div class="gap"></div>
    <a class="nav-link" href="accommodation-details.php">
      <div class="list-accommodation">
        <!-- Left-aligned media object -->
        <div class="media">
          <div class="media-left">
            <img src="../img/item1.jpg" class="media-object">
          </div>
          <div class="media-body">
            <h4 class="media-heading">House on the Hill Bed and Breakfast</h4>
            <p>
              Number of room: 4, Number of bathroom: 2 <br>
              Smoke allowed - Garage - Pet friendly
            </p>
            <h5 class="media-heading">Price: 1,200 AUD</h5>
            <span class="fa fa-star checked"></span>4.3
          </div>
        </div>
      </div>
    </a>

    <!-- accommodation - 2 -->
    <div class="gap"></div>
    <a class="nav-link" href="accommodation-details.php">
      <div class="list-accommodation">
        <!-- Left-aligned media object -->
        <div class="media">
          <div class="media-left">
            <img src="../img/item2.jpg" class="media-object">
          </div>
          <div class="media-body">
            <h4 class="media-heading">Coastalm comfortable and sustainable</h4>
            <p>
              Number of room: 2, Number of bathroom: 1 <br>
              Smoke allowed - Internet - Garage - Pet friendly
            </p>
            <h5 class="media-heading">Price: 500 AUD</h5>
            <span class="fa fa-star checked"></span>5.0
          </div>
        </div>
      </div>
    </a>

    <!-- accommodation - 3 -->
    <div class="gap"></div>
    <a class="nav-link" href="accommodation-details.php">
      <div class="list-accommodation">
        <!-- Left-aligned media object -->
        <div class="media">
          <div class="media-left">
            <img src="../img/item3.jpg" class="media-object">
          </div>
          <div class="media-body">
            <h4 class="media-heading">Backpacker 4 Bed Dorm includes 2 people</h4>
            <p>
              Number of room: 3, Number of bathroom: 2 <br>
              Internet - Garage - Pet friendly
            </p>
            <h5 class="media-heading">Price: 900 AUD</h5>
            <span class="fa fa-star checked"></span>4.7
          </div>
        </div>
      </div>
    </a>

    <!-- accommodation - 4 -->
    <div class="gap"></div>
    <a class="nav-link" href="accommodation-details.php">
      <div class="list-accommodation">
        <!-- Left-aligned media object -->
        <div class="media">
          <div class="media-left">
            <img src="../img/item4.jpg" class="media-object">
          </div>
          <div class="media-body">
            <h4 class="media-heading">Daimond Retreat</h4>
            <p>
              Number of room: 2, Number of bathroom: 1 <br>
              Smoke allowed - Garage - Internet
            </p>
            <h5 class="media-heading">Price: 1,200 AUD</h5>
            <span class="fa fa-star checked"></span>3.5
          </div>
        </div>
      </div>
    </a>

    <!-- accommodation - 5 -->
    <div class="gap"></div>
    <a class="nav-link" href="accommodation-details.php">
      <div class="list-accommodation">
        <!-- Left-aligned media object -->
        <div class="media">
          <div class="media-left">
            <img src="../img/item5.jpg" class="media-object">
          </div>
          <div class="media-body">
            <h4 class="media-heading">Sandy Bay "Santorini" like vistas harbour views</h4>
            <p>
              Number of room: 3, Number of bathroom: 2 <br>
              Garage - Pet friendly
            </p>
            <h5 class="media-heading">Price: 1,150 AUD</h5>
            <span class="fa fa-star checked"></span>4.1
          </div>
        </div>
      </div>
    </a>
    <footer>
      <div class="footer">
      </div>
    </footer>
  </div>

  <script type="text/javascript">
    //validation search form
    $(document).ready(function() {
      $('form[id="search-accommodation-form"]').validate({
        rules: {
          city: 'required',
          startDate: 'required',
          endDate: 'required',
          numberOfGuest: {
            digits: true
          }
        },
        messages: {
          city: '<span class="error">This field is required</span>',
          startDate: '<span class="error">This field is required</span>',
          endDate: '<span class="error">This field is required</span>',
          numberOfGuest: '<span class="error">This field is required</span>'
        },
        submitHandler: function(form) {
          form.submit();
        }
      });
    });
    // cannot select a date before today.
    var td = new Date();
    var mm = td.getMonth() + 1;
    var dd = td.getDate();
    var yyyy = td.getFullYear();
    if(mm < 10)
      mm = '0' + mm.toString();
    if(dd < 10)
      dd = '0' + dd.toString();

    var minDate = yyyy + '-' + mm + '-' + dd;
    $('#startDate').attr('min', minDate);
    $('#endDaten').attr('min', minDate);
    // the check-in date is always greater than the checkout date 
    var sd = document.getElementById('startDate');
    var ed = document.getElementById('endDate');

    sd.addEventListener('change', function() {
      if (sd.value)
        ed.min = sd.value;
    }, false);
    ed.addEventListener('change', function() {
      if (ed.value)
        sd.max = ed.value;
    }, false);

    $(document).ready(function() {
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
          form.submit();
        }
      });
    });
  </script>
</body>
</html>