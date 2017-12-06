<?php
session_start();

if(!isset($_SESSION['isLogin'])){
  header("Location: ../Login");
}

if($_SESSION['userType'] != "normal"){
  header("Location: Admin");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>About Us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
      padding-top: 1rem;
    }

    .proflabel{
  	   font-size:1rem;
  	}

    .profpic{
    	width:5rem;
    	box-shadow: 0px 3px 5px black;
    	position:absolute;
    	transform: translate(-2.4rem,-4rem); /* Standard syntax */
  	}

    @media only screen
    	and (min-device-width : 768px)
    	and (max-device-width : 1024px)
    	{
    		.card h1.card-title,
    		.card h2.card-title,
    		.card h3.card-title,
    		.card h4.card-title,
    		.card h5.card-title,
    		.card h6.card-title {
      		font-size: 1.0rem !important;
      		font-weight: 300 !important;
        }
    	}
    </style>
  </head>
  <body>
    <?php include 'navbarInclude.php'; ?>
    <br /><br />
    <div class="container mainContainer">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header bg-success text-white"><h3>About Us</h3></div>
            <div class="card-body">
              <div class="text-center">
                <img src="/com.phantomfive.profsmato/assets/designs/phantom5logo.png" style="width:25%;"/>
                <blockquote class="blockquote mb-0"><cite title="Source Title" class="text-secondary">Phantom Five Dev Team 2017 Logo.</cite></blockquote>
              </div><!--/.text-center-->
              <div>
                <p style="text-align:justify;">
        					Phantom Five Dev Team is a small startup IT company that provides enterprise-class IT solutions to different businesses in the world, regardless of the scale.
        					As of now, it is composed of 5 dedicated members who are very well-rounded in today's latest technologies and applying them in practical uses. The company is
        					planning to further expand its team in order to provide faster, and better solutions to its clients. Right now the company is known for providing business solutions
        					for San Miguel Corporation, Komorosoba Food Corporation, De La Salle University - Manila, DB Schenker Global Logistics, and Petron.
                </p>
      				</div>
              <blockquote class="blockquote mb-0">
      				  <p>"Our paradigm is not to work hard, but to work smart."</p>
      				  <footer class="blockquote-footer">Yuta Inoue, a.k.a. Sherv Ang, <cite title="Source Title">Phantom Five Dev Team </cite></footer>
      				</blockquote>
            </div><!--/.card-body-->
          </div><!--/.card-->
        </div><!--/.col-md-12-->
      </div><!--/.row-->
      <br />
      <h3>The Team</h3>
      <br />
      <div class="row">
        <br />
        <div class="col-md-4">
          <div class="card text-white bg-success">
            <div class="card-header">Header</div>
            <div class="card-body text-center">
              <img src="/com.phantomfive.profsmato/assets/studentpic/yuta.jpg" class="profpic rounded-circle" /><br />
              <a href="#" class="text-white"><h4 class="card-title">Yuta Inoue</h4></a>
              <p class="card-text">Back-end developer, Project Manager.</p><br />
              <div style="line-height: 0.1rem;">
                <p><a href="tel:+246 - 542 550 5462" class="text-white"><i class="fa d-inline mr-3 text-white fa-phone"></i>+63 927 895 0136</a></p>
      					<p><a href="mailto:info@pingendo.com" class="text-white"><i class="fa d-inline mr-3 text-white fa-envelope-o"></i>yuta_inoue@dlsu.edu.ph</a></p>
      					<p><a href="https://facebook.com/yuta.inoue.583" class="text-white" target="_blank"><i class="fa d-inline mr-3 text-white fa-facebook"></i>/yuta.inoue.583</a></p>
      					<p><a href="https://twitter.com/YutaKikuchi53" class="text-white" target="_blank"><i class="fa d-inline mr-3 text-white fa-twitter"></i>@YutaKikuchi53</a></p>
      					<p><a href="https://instagram.com/yuta4532" class="text-white" target="_blank"><i class="fa d-inline mr-3 fa-instagram text-white"></i>@yuta4532</a></p>
              </div>
            </div>
          </div><!--/.card text-white bg-success-->
        </div><!--/.col-md-4-->
        <div class="col-md-4">
          <div class="card text-white bg-success">
            <div class="card-header">Header</div>
            <div class="card-body text-center">
              <img src="/com.phantomfive.profsmato/assets/studentpic/andrew.jpg" class="profpic rounded-circle" /><br />
              <a href="#" class="text-white"><h4 class="card-title">John Andrew Santiago</h4></a>
              <p class="card-text">Front-end developer.</p><br />
              <div style="line-height: 0.1rem;">
                <p><a href="tel:+246 - 542 550 5462" class="text-white"><i class="fa d-inline mr-3 text-white fa-phone"></i>+63 995 478 2797</a></p>
      					<p><a href="mailto:info@pingendo.com" class="text-white" target="_blank"><i class="fa d-inline mr-3 text-white fa-envelope-o"></i>john_andrew_santiago@dlsu.edu.ph</a></p>
      					<p><a href="https://facebook.com/andrewww.rog" class="text-white" target="_blank"><i class="fa d-inline mr-3 text-white fa-facebook"></i>/andrewww.rog</a></p>
      					<p><a href="https://twitter.com/@santiagoja_rog" class="text-white" target="_blank"><i class="fa d-inline mr-3 text-white fa-twitter"></i>@santiagoja_rog</a></p>
      					<p><a href="https://instagram.com/@santiagoja_rog" class="text-white" target="blank" target="_blank"><i class="fa d-inline mr-3 fa-instagram text-white"></i>@santiagoja_rog</a></p>
              </div>
            </div>
          </div><!--/.card text-white bg-success-->
        </div><!--/.col-md-4-->
        <div class="col-md-4">
    			<div class="card text-white bg-success">
    			<div class="card-header">Header</div>
    			  <div class="card-body text-center">
    				<img src="/com.phantomfive.profsmato/assets/studentpic/eduard.JPG" class="profpic rounded-circle" /><br>
    				<a href="#" class="text-white"><h4 class="card-title">Eduard Martin Carlos</h4></a></a>
    				<p class="card-text">Quality Assurance.</p><br>
    				<div style="line-height: 0.1rem;">
    					<p><a href="tel:+246 - 542 550 5462" class="text-white"><i class="fa d-inline mr-3 text-white fa-phone"></i>+63 935 117 8429</a></p>
    					<p><a href="mailto:info@pingendo.com" class="text-white" target="_blank"><i class="fa d-inline mr-3 text-white fa-envelope-o"></i>eduard_carlos@dlsu.edu.ph</a></p>
    					<p><a href="https://facebook.com/Waaaaard" class="text-white" target="_blank"><i class="fa d-inline mr-3 text-white fa-facebook"></i>/Waaaaard</a></p>
    					<p><a href="https://twitter.com/EduardCG_" class="text-white" target="_blank"><i class="fa d-inline mr-3 text-white fa-twitter"></i>@EduardCG_</a></p>
    					<p><a href="https://instagram.com/emcg_" class="text-white" target="blank" target="_blank"><i class="fa d-inline mr-3 fa-instagram text-white"></i>@emcg_</a></p>
    				</div>
    			  </div>
    			</div>
    		</div><!--/.col-md-4-->
      </div><!--/.row-->
      <br />
      <div class="row">
        <br />
        <div class="col-md-4">
    			<div class="card text-white bg-success">
    			<div class="card-header">Header</div>
    			  <div class="card-body text-center">
    				<img src="/com.phantomfive.profsmato/assets/studentpic/nigel.JPG" class="profpic rounded-circle" /><br>
    				<a href="#" class="text-white"><h4 class="card-title">Nigel Marcus Tan</h4></a></a>
    				<p class="card-text">Front-end developer.</p><br>
    				<div style="line-height: 0.1rem;">
    					<p><a href="tel:+246 - 542 550 5462" class="text-white"><i class="fa d-inline mr-3 text-white fa-phone"></i>+63 932 385 1479</a></p>
    					<p><a href="mailto:info@pingendo.com" class="text-white" target="_blank"><i class="fa d-inline mr-3 text-white fa-envelope-o"></i>nigel_tan@dlsu.edu.ph</a></p>
    					<p><a href="https://facebook.com/nigelmarcus.tan" class="text-white" target="_blank"><i class="fa d-inline mr-3 text-white fa-facebook"></i>/nigelmarcus.tan</a></p>
    				</div>
    			  </div>
    			</div>
    		</div><!--/.col-md-4-->
        <div class="col-md-4 mr-auto">
    			<div class="card text-white bg-success">
    			<div class="card-header">Header</div>
    			  <div class="card-body text-center">
    				<img src="/com.phantomfive.profsmato/assets/studentpic/xtian.JPG" class="profpic rounded-circle" /><br>
    				<a href="#" class="text-white"><h4 class="card-title">Christian Nicole Alderite</h4></a></a>
    				<p class="card-text">Back-end developer.</p><br>
    				<div style="line-height: 0.1rem;">
    					<p><a href="tel:+246 - 542 550 5462" class="text-white"><i class="fa d-inline mr-3 text-white fa-phone"></i>+63 995 756 1818</a></p>
    					<p><a href="mailto:info@pingendo.com" class="text-white" target="_blank"><i class="fa d-inline mr-3 text-white fa-envelope-o"></i>christian_nicole_alderite@dlsu.edu.ph</a></p>
    					<p><a href="https://facebook.com/nicolealderite" class="text-white" target="_blank"><i class="fa d-inline mr-3 text-white fa-facebook"></i>/nicolealderite</a></p>
    					<p><a href="https://twitter.com/alderight" class="text-white" target="_blank"><i class="fa d-inline mr-3 text-white fa-twitter"></i>@alderight</a></p>
    					<p><a href="https://instagram.com/alderite" class="text-white" target="_blank"><i class="fa d-inline mr-3 fa-instagram text-white"></i>@alderight</a></p>
    				</div>
    			  </div>
    			</div>
    		</div><!--/.col-md-4 mr-auto-->
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
    </div><!--/.container mainContainer-->
    <?php include 'navbarStlye.html'; ?>
  </body>
  <script>
    $(document).ready(function(){
      $('body').bootstrapMaterialDesign();
      var username = "<?php echo $_SESSION['username'] ?>";
      var firstName = "";
      var lastName = "";
      var imageSrc = "/com.phantomfive.profsmato/assets/studentpic/";
      var profileLink = "Students/";
      var restUrl = "http://localhost:8080/profsmatodb/students?filter={'username':'" + username + "'}";
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
    });
  </script>
</html>
