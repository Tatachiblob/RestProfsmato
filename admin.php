<?php
session_start();

if(!isset($_SESSION['isLogin'])){
  header("Location: Login");
}
if($_SESSION['userType'] != "admin"){
  header("Location: Home");
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Administrator</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include 'styleInclude.html' ?>
    <style>
  	.mainContainer {
        padding-top: 3rem;
      }


      .carousel {
        background-color: black;
      }

      .carousel-item {
        text-align: center;
      }

      .carousel-item img {
        height: 400px;
      }

      .carousel-caption {
        background-color: rgba(0, 0, 0, 0.7);
        width: 100%;
        max-width: 100%;
        left: 0;
      }

      .carousel-caption h3,
      p {
        margin-left: 2rem;
      }

      .proflabel {
        display: inline;
        margin: auto;
        font-size: 1.1rem;
        left: 2%;
        position: relative;
      }

      .threadlabel {
        display: inline;
        margin: auto;
        font-size: 1.1rem;
        left: 0.6%;
        position: relative;
      }

      @media ( min-width: 768px) {
        .grid-divider {
          border-right: 1px solid gray;
        }
        .responsive-hr {
          background-color: gray;
          opacity: 1;
        }
      }

      @media ( max-width: 768px) {
        .responsive-hr {
          background-color: gray;
          opacity: 0;
        }
      }

  	.material-shadow{
  		box-shadow: 0 1px 6px rgba(0,0,0,0.16), 0 1px 6px rgba(0,0,0,0.23);
  		transition: all 0.3s cubic-bezier(.25,.8,.25,1);
  	}

  	.material-shadow:hover{
  		box-shadow: 0 3px 25px rgba(0,0,0,0.16), 0 3px 25px rgba(0,0,0,0.23);
  	}
    </style>
  </head>
  <body>
    <?php include 'adminNavbar.php'; ?>
    <br />
    <div class="container mainContainer">
      <h1 class="display-4 d-none d-sm-block">Dashboard</h1>
      <div class="alert alert-info alert-dismissible fade show material-shadow" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    		<span aria-hidden="true">&times;</span>
    	  </button>
    	  <strong>Welcome to the dashboard, admin!</strong> You should check in on some of those fields below
      </div><!--/.alert-->
      <div class="row mb-3">
        <div class="col-xl-3 col-sm-6">
          <div class="card bg-success text-white h-100">
            <div class="card-body bg-success">
              <div class="rotate">
  							<i class="fa fa-user fa-3x"></i>
  						</div><!--/.rotate-->
              <h6 class="text-uppercase">Users</h6>
  						<h1 class="display-4" id="numUsers">0</h1>
            </div><!--card-body-->
          </div><!--/.card bg-success-->
        </div><!--/.col-xl-3 col-sm-6-->
        <div class="col-xl-3 col-sm-6">
          <div class="card bg-success text-white h-100">
            <div class="card-body bg-primary">
              <div class="rotate">
  							<i class="fa fa-id-card fa-3x"></i>
  						</div><!--/.rotate-->
              <h6 class="text-uppercase">Professors</h6>
  						<h1 class="display-4" id="numProfs">0</h1>
            </div><!--card-body-->
          </div><!--/.card bg-success-->
        </div><!--/.col-xl-3 col-sm-6-->
        <div class="col-xl-3 col-sm-6">
          <div class="card bg-success text-white h-100">
            <div class="card-body bg-danger">
              <div class="rotate">
  							<i class="fa fa-exclamation-circle fa-3x"></i>
  						</div><!--/.rotate-->
              <h6 class="text-uppercase">Complaints</h6>
  						<h1 class="display-4" id="numComplaints">0</h1>
            </div><!--card-body-->
          </div><!--/.card bg-success-->
        </div><!--/.col-xl-3 col-sm-6-->
        <div class="col-xl-3 col-sm-6">
  				<div class="card text-white bg-secondary h-100">
  					<div class="card-body bg-secondary">
  						<div class="rotate">
  							<i class="fa fa-info-circle fa-3x"></i>
  						</div>
  						<h6 class="text-uppercase">Requests</h6>
  						<h1 class="display-4" id="numRequests"></h1>
  					</div>
  				</div>
  			</div>
      </div><!--/.row-mb-3-->
      <div class="row">
        <div class="col-md-6">
          <h4>Top 5 Most Reviewed Profs Data</h4>
          <div class="table-responsive material-shadow">
            <table class="table table-striped">
              <thead class="thead-inverse">
                <tr>
                  <th>ID</th>
                  <th>College</th>
                  <th>Name</th>
                  <th>Total Ratings</th>
                  <th>Reviews</th>
                </tr>
              </thead>
              <tbody id="mostReviewed"></tbody>
            </table><!--/.table table-striped-->
          </div><!--/.table=responsive meterial-shadow-->
        </div><!--/.col-md-6-->
        <div class="col-md-6">
          <h4>Top 5 Highes Rated Profs Data</h4>
          <div class="table-responsive material-shadow">
            <table class="table table-striped">
              <thead class="thead-inverse">
                <tr>
                  <th>ID</th>
                  <th>College</th>
                  <th>Name</th>
                  <th>Total Ratings</th>
                  <th>Reviews</th>
                </tr>
              </thead>
              <tbody id="mostRated"></tbody>
            </table><!--/.table table-striped-->
          </div><!--/.table=responsive meterial-shadow-->
        </div>
      </div><!--/.row-->
      <br /><hr />
      <div>
        <div class="container">
          <p class="text-center text-black" style="margin-left:0px;!important">© Copyright 2017 Phantom Five Dev Team, all rights reserved. </p>
        </div>
      </div>
    </div><!--/.container mainContainer-->
    <?php include 'navbarStlye.html'; ?>
  </body>
  <script>
    $(document).ready(function(){
      $('body').bootstrapMaterialDesign();

      initScreen();
      userCount();
      profCounts();
      loadMostReviewed();
      loadMostRated();
    });

    function loadMostReviewed(){
      var aggrRest = "http://localhost:8080/profsmatodb/reviews/_aggrs/topFiveMostReviews";
      $.ajax({
        type: "GET",
        url: aggrRest,
        dataType: "json",
        success: function(response){
          response = response._embedded;
          var loading = '';
          for(var i = 0; i < response.length; i++){
            console.log(response[i]);
            $.ajax({
              type: "GET",
              async: false,
              url: "http://localhost:8080/profsmatodb/professors?filter={'profid':" + response[i]._id + "}",
              dataType: "json",
              success: function(response2){
                response2 = response2._embedded;
                loading += '<tr>'
                         + '<td>' + response2[0].profid + '</td>'
                         + '<td>' + response2[0].college + '</td>'
                         + '<td>' + response2[0].firstname + '</td>'
                         + '<td>' + response[i].totalRating + '</td>'
                         + '<td>' + response[i].reviewCount + '</td>'
                         + '</tr>';
              }
            });
          }
          //console.log("EDN: " + loading);
          $('#mostReviewed').html(loading);
        },
        error: function(jqXHR, exception){
          console.log(jqXHR);
        }
      });
    }

    function loadMostRated(){
      var aggrRest = "http://localhost:8080/profsmatodb/reviews/_aggrs/topFiveMostRated";
      $.ajax({
        type: "GET",
        url: aggrRest,
        dataType: "json",
        success: function(response){
          response = response._embedded;
          var loading = '';
          for(var i = 0; i < response.length; i++){
            console.log(response[i]);
            $.ajax({
              type: "GET",
              async: false,
              url: "http://localhost:8080/profsmatodb/professors?filter={'profid':" + response[i]._id + "}",
              dataType: "json",
              success: function(response2){
                response2 = response2._embedded;
                loading += '<tr>'
                         + '<td>' + response2[0].profid + '</td>'
                         + '<td>' + response2[0].college + '</td>'
                         + '<td>' + response2[0].firstname + '</td>'
                         + '<td>' + response[i].totalRating + '</td>'
                         + '<td>' + response[i].reviewCount + '</td>'
                         + '</tr>';
              }
            });
          }
          //console.log("EDN: " + loading);
          $('#mostRated').html(loading);
        },
        error: function(jqXHR, exception){
          console.log(jqXHR);
        }
      });
    }

    function profCounts(){
      var rest = "http://localhost:8080/profsmatodb/professors";
      $.ajax({
        type: "GET",
        url: rest,
        dataType: "json",
        success: function(response){
          console.log(response);
          $('#numProfs').html(response._returned);
        },
        error: function(jqXHR, exception){
          console.log(jqXHR);
        }
      });
    }

    function userCount(){
      var rest = "http://localhost:8080/profsmatodb/students";
      $.ajax({
        type: "GET",
        url: rest,
        dataType: "json",
        success: function(response){
          var pending = 0;
          var active = 0;
          for(var i = 0; i < response._embedded.length; i++){
            if(response._embedded[i].status == "pending"){
              pending++;
            }
            if(response._embedded[i].status == "active"){
              active++;
            }
          }
          $('#numUsers').html(active);
          $('#numRequests').html(pending);
        },
        error: function(jqXHR, exception){
          console.log(jqXHR);
        }
      });
    }

    function initScreen(){
      var objId = "<?php echo $_SESSION['objId']; ?>";
      var rest = "http://localhost:8080/profsmatodb/students/" + objId;
      var profileImg = "/com.phantomfive.profsmato/assets/studentpic/";
      var nama = "";
      $.ajax({
        type: "GET",
        url: rest,
        dataType: "json",
        success: function(response){
          nama = response.firstname;
          profileImg += response.profilepic;

          $('#adminProfilePic').attr('src', profileImg);
          $('#firstName').html(nama);
        },
        error: function(jqXHR, exception){
          console.log(jqXHR);
        }
      });
    }
  </script>
</html>
