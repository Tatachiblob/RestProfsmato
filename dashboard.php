<?php
session_start();

if(!isset($_SESSION['isLogin'])){
  header("Location: Login");
}
if($_SESSION['userType'] != "normal"){
  header("Location: Admin");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profsmato</title>
    <?php include 'styleInclude.html' ?>

    <style is="custom-style">
      paper-fab-speed-dial.two {
        --paper-fab-speed-dial: {
          bottom: 2%;
          right: 1.2%;
          position:fixed;
        };
      }

      paper-fab.blue {
          --paper-fab-background: var(--paper-light-blue-500);
          --paper-fab-keyboard-focus-background: var(--paper-light-blue-900);
        }

    	paper-fab.fblue {
    	  --paper-fab-background: #3B5998;
    	  --paper-fab-keyboard-focus-background: #3B5998;
    	}

    	paper-fab.twitter {
    	  --paper-fab-background: #1DA1F2;
    	  --paper-fab-keyboard-focus-background: #1DA1F2;
    	}

    	paper-fab.info {
    	  --paper-fab-background: #646464;
    	  --paper-fab-keyboard-focus-background: #646464;
    	}

    </style>

    <style>
      .mainContainer {
        padding-top: 3rem;
      }

      .carousel{
        background-color: black;
      }

      .carousel-item{
        text-align: center;
      }

      .carousel-item img{
        height: 400px;
      }

      .carousel-caption{
        background-color: rgba(0, 0, 0, 0.7);
        width: 100%;
        max-width: 100%;
        left: 0;
      }

      .carousel-caption h3, p{
        margin-left: 2rem;
      }

      .proflabel{
        display: inline;
        margin: auto;
        font-size: 1.1rem;
        left: 2%;
        position: relative;
      }

      .threadlabel{
        display: inline;
        margin: auto;
        font-size: 1.1rem;
        left: 0.6%;
        position: relative;
      }

      @media (min-width: 768px){
        .grid-divider{
          border-right: 1px solid gray;
        }

        .responsive-hr{
          background-color: gray;
          opacity: 1;
        }
      }

      @media(max-width: 768px){
        .responsive-hr{
          background-color: gray;
          opacity: 0;
        }
      }
    </style>
  </head>
  <body>
    <?php include 'navbarInclude.php' ?>
    <div class="container mainContainer">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search a professor">
    			  <span class="input-group-addon"><a href="#" class="text-success"><i class="fa fa-search" aria-hidden="true"></i></a></span>
          </div><!--/.input-group-->
        </div><!--/.col-md-8-->
      </div><!--/.row-->
      <br />
      <div class="row">
        <div class="col-md-12">
          <!--PHP HANDLE-->
          <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol><!--/.carousel-indicators-->
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="first-slide img-responsive" src="/com.phantomfive.profsmato/assets/carousel-pic/prof1.jpg" alt="First slide">
                <div class="container">
                  <div class="carousel-caption text-left">
                    <h3>Most Outstanding Teacher</h3>
                    <p>Sir RJ Molano, the CCS favorite stays on top.</p>
                  </div>
                </div><!--/.container-->
              </div><!--/.carousel-item active-->
              <div class="carousel-item">
                <img class="second-slide img-responsive" src="/com.phantomfive.profsmato/assets/carousel-pic/prof2.jpg">
                <div class="container">
                  <div class="carousel-caption text-left">
                    <h3>Unmatched</h3>
                    <p>Ms. Diane Lim, the true definition of beauty and brains.</p>
                  </div>
                </div><!--/.container-->
              </div><!--/.carousel-item-->
              <div class="carousel-item">
                <img class="third-slide img-responsive" src="/com.phantomfive.profsmato/assets/carousel-pic/prof3.jpg">
                <div class="container">
                  <div class="carousel-caption text-left">
                    <h3>L O D I</h3>
                    <p>Sir Jordan Deja, Leader of Design and Innovation</p>
                  </div>
                </div><!--/.container-->
              </div><!--/.carousel-item-->
            </div><!--/.carousel-inner-->
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
          </div><!--/#myCarousel-->
          <!--PHP HANDLE-->
        </div><!--/.col-md-12"-->
      </div><!--/.row-->
      <br />
      <div class="row">
        <div class="col-lg-6 grid-divider">
          <div class="container">
            <h3>Most Reviewed Profs</h3>
            <div id="mostRated">
              <!--<div>
                <img src="/com.phantomfive.profsmato/assets/designs/tomato.svg" style="width:5%;">
                <a href="#" class="proflabel text-black">Neil Patrick Del Gallego (CCS)</a>
              </div>
              <div>
                <img src="/com.phantomfive.profsmato/assets/designs/tomato.svg" style="width:5%;">
                <a href="#" class="proflabel text-black">Renato Jose Maria Molano (CLA)</a>
              </div>
              <div>
                <img src="/com.phantomfive.profsmato/assets/designs/tomato.svg" style="width:5%;">
                <a href="#" class="proflabel text-black">Shirley Chu (COB)</a>
              </div>
              <div>
                <img src="/com.phantomfive.profsmato/assets/designs/tomato.svg" style="width:5%;">
                <a href="#" class="proflabel text-black">Diane Lim (CCS)</a>
              </div>
              <div>
                <img src="/com.phantomfive.profsmato/assets/designs/tomato.svg" style="width:5%;">
                <a href="#" class="proflabel text-black">Thomas James Tiam-Lee (SOE)</a>
              </div>-->
            </div><!--/.mostRated-->
          </div><!--/.container-->
          <br />
        </div><!--/.col-lg-6 grid-divider-->
        <div class="col-lg-6">
          <div class="container">
            <h3>Highest Rated Profs</h3>
            <div id="highestRated">
              <!--
              <div>
                <img src="/com.phantomfive.profsmato/assets/designs/tomato.svg" style="width:5%;">
                <a href="#" class="proflabel text-black">Jordan Deja (CCS)</a>
              </div>
              <div>
                <img src="/com.phantomfive.profsmato/assets/designs/tomato.svg" style="width:5%;">
                <a href="#" class="proflabel text-black">Neil Patrick Del Gallego (CCS)</a>
              </div>
              <div>
                <img src="/com.phantomfive.profsmato/assets/designs/tomato.svg" style="width:5%;">
                <a href="#" class="proflabel text-black">Briane Samson (CCS)</a>
              </div>
              <div>
                <img src="/com.phantomfive.profsmato/assets/designs/tomato.svg" style="width:5%;">
                <a href="#" class="proflabel text-black">Glenn Sipin (CCS)</a>
              </div>
              <div>
                <img src="/com.phantomfive.profsmato/assets/designs/tomato.svg" style="width:5%;">
                <a href="#" class="proflabel text-black">Oliver Malabanan (CCS)</a>
              </div>-->
            </div><!--/#highestRated-->
          </div><!--/.container-->
        </div><!--/.col-lg-6-->
      </div><!--/.row-->
      <hr class="responsive-hr">
      <br />
      <div>
        <div class="container">
          <p class="text-center text-black" style="margin-left:0px;!important">© Copyright 2017 Phantom Five Dev Team, all rights reserved. </p>
        </div>
      </div>
      <div class="screen">
        <paper-fab-speed-dial class="two">
          <paper-fab class ="blue" icon="more-vert"></paper-fab>
          <div class="dropdown-content">
            <a href="AboutPhantom"><paper-fab class="info" mini icon="info-outline"></paper-fab></a>
            <paper-fab class="twitter" mini src="/com.phantomfive.profsmato/assets/designs/twitter.svg"></paper-fab>
            <paper-fab class="fblue" mini src="/com.phantomfive.profsmato/assets/designs/facebook.svg"></paper-fab>
          <paper-fab mini src="/com.phantomfive.profsmato/assets/designs/instagram.svg"></paper-fab>
          </div>
        </paper-fab-speed-dial>
      </div><!--/.screen-->
    </div><!--/.container mainContainer-->
  </body>
  <?php include 'navbarStlye.html' ?>
  <script>

    function buildHtml(college, department, profid, profname){
      var a = '<div>'
            + '<img src="/com.phantomfive.profsmato/assets/designs/tomato.svg" style="width:5%;">'
            + '<a href="/com.phantomfive.profsmato/College/' + college + '/' + department + '/' + profid + '" class="proflabel text-black">' + profname + '(' + college + ')</a>'
            + '</div>';
      return a;
    }

    function loadMostRated(){
      var rest = "http://localhost:8080/profsmatodb/reviews/_aggrs/topFiveMostRated";
      $.ajax({
        type: "GET",
        url: rest,
        dataType: "json",
        success: function(response){
          response = response._embedded;
          var html = '';
          for(var i = 0; i < response.length; i++){
            $.ajax({
              type: "GET",
              async: false,
              url: "http://localhost:8080/profsmatodb/professors?filter={'profid':" + response[i]._id + "}",
              success: function(response2){
                var a = response2._embedded[0];
                html += buildHtml(a.college, a.departments[0], a.profid, a.firstname + ' ' + a.lastname);
              }
            });
          }
          $('#mostRated').html(html);
        },
        error: function(jqXHR, exception){
          console.log(jqXHR);
        }
      });
    }

    function loadMostReviewed(){
      var rest = "http://localhost:8080/profsmatodb/reviews/_aggrs/topFiveMostReviews";
      $.ajax({
        type: "GET",
        url: rest,
        dataType: "json",
        success: function(response){
          response = response._embedded;
          var html = '';
          for(var i = 0; i < response.length; i++){
            $.ajax({
              type: "GET",
              async: false,
              url: "http://localhost:8080/profsmatodb/professors?filter={'profid':" + response[i]._id + "}",
              success: function(response2){
                var a = response2._embedded[0];
                html += buildHtml(a.college, a.departments[0], a.profid, a.firstname + ' ' + a.lastname);
              }
            });
          }
          $('#highestRated').html(html);
        },
        error: function(jqXHR, exception){
          console.log(jqXHR);
        }
      });
    }

    $(document).ready(function() {
      $('body').bootstrapMaterialDesign();
      var firstName = "";
      var lastName = "";
      var imageSrc = "/com.phantomfive.profsmato/assets/studentpic/";
      var profileLink = "Students/";
      var email = "<?php echo $_SESSION['email']; ?>";
      var restUrl = "http://localhost:8080/profsmatodb/students?filter={'email':'" + email + "'}";
      $.ajax({
        type: "GET",
        url: restUrl,
        dataType: "json",
        success: function(response){
          response = response._embedded;
          firstName = response[0].firstname;
          lastName = response[0].lastname;
          profileLink += response[0].username;
          imageSrc += response[0].profilepic;

          $('#fullname').html(firstName + " " + lastName);
          $('#profilepicture').attr('src', imageSrc);
          $('#profileLink').attr('href', profileLink);
          $('#first').html(firstName);
        },
        error: function(jqXHR, exception){
          console.log(jqXHR.responseText);
        }
      });

      loadMostRated();
      loadMostReviewed();
    });
  </script>
</html>
