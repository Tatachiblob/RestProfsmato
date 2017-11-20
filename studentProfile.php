<?php
session_start();

if(!isset($_SESSION['isLogin'])){
  header("Location: ../Login");
}
if($_SESSION['userType'] != "normal"){
  header("Location: ../Admin");
}

if(!isset($_GET['username'])){
  header("Location: ../Home");
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Profile</title>
    <?php include 'styleInclude.html'; ?>

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
      padding-top: 2rem !important;
    }

    .text-black {
      color: black;
    }

    .card-text {
      font-size: 16px;
      font-family: Roboto;
    }

    .profpic {
      width: 8rem;
      height: 8rem;
      background-size: 100% auto;
        border: 3px solid white;
        box-shadow: 2px 2px 15px black;
        margin:0 auto;
    }

    .camera {
      opacity: 0;
      padding-top: 3rem;
      color: black;
    }
    <?php if($_SESSION['username'] == $_GET['username']){ ?>
    .profpic:hover {
      opacity: 0.5;
      cursor: pointer;
    }

    .profpic:hover .camera{
      opacity: 1;
    }
    <?php } ?>

    div.scrollmenu {
      background-color: #fff;
      overflow: auto;
      white-space: nowrap;
    }

    div.scrollmenu img:hover {
        border: 2px solid green;
    }
    </style>
  </head>
  <body>
    <?php include 'navbarInclude.php'; ?>
    <br />
    <div class="container mainContainer">
      <div class="row">
        <div class="col-md-4">
          <div class="card mb-3" style="max-width: 20rem;margin-left:auto;margin-right:auto;">
            <div class="card-header text-center" style="background-image:url(/com.phantomfive.profsmato/assets/carousel-pic/3.jpg);">
              <div class="rounded-circle profpic" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-camera fa-2x camera" aria-hidden="true"></i>
              </div><!--/.rounded-circle profpic-->
            </div><!--/.card-header-->
            <div class="card-body">
              <h4 class="card-title" id="genname"></h4>
              <p class="text-black" style="margin: auto;"><i class="fa fa-envelope fa-lg" aria-hidden="true"></i> <span id="e"></span> </p>
              <div id="sns"></div>
            </div><!--/.card-body-->
          </div><!--/.card mb-3-->
        </div><!--/.col-md-4-->
        <div class="col-md-8">
          <div class="card text-white mb-3" style="">
            <div class="card-header bg-success">
              <h4>Information</h4>
            </div>
            <div class="card-body text-black edit">
              <h4 class="card-title">Username</h4>
              <div><p class="card-text" id="u"></p></div>
              <br />
              <h4 class="card-title">College</h4>
              <div><p class="card-text" id="college"></p></div>
              <br />
              <h4 class="card-title">Course</h4>
              <div><p class="card-text" id="course"></p></div>
              <br />
              <h4 class="card-title">About Me</h4>
              <div><p class="card-text" id="about"></p></div>
              <br />
              <h4 class="card-title">Statistics</h4>
              <div><p class="card-text" id="numRev">Number of Reviews: </p></div>
              <br />
              <?php if($_SESSION['username'] == $_GET['username']){ ?>
              <button id="editBtn" type="button" class="btn btn-success bmd-btn-fab" data-toggle="modal" data-target="#exampleModal2" style="float:right;" id="edit"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </button>
              <?php } ?>
            </div><!--/.card-body-->
          </div><!--/.card text-white mb-3-->
        </div><!--/.col-md-8-->
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
            <a href="/com.phantomfive.profsmato/AboutPhantom"><paper-fab class="info" mini icon="info-outline"></paper-fab></a>
            <paper-fab class="twitter" mini src="/com.phantomfive.profsmato/assets/designs/twitter.svg"></paper-fab>
            <paper-fab class="fblue" mini src="/com.phantomfive.profsmato/assets/designs/facebook.svg"></paper-fab>
          <paper-fab mini src="/com.phantomfive.profsmato/assets/designs/instagram.svg"></paper-fab>
          </div>
        </paper-fab-speed-dial>
      </div><!--/.screen-->
    </div><!--/.container mainContainer-->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
      <div class="modal-dialog modal-lg" style="width: 50rem !important; overflow-y: auto;">
        <div class="modal-content">
          <div class="card-header bg-success text-white">
            <h5 class="card-title" id="exampleModalLabel2" style="margin: auto;">Update My Page</h5>
          </div><!--/.card-header bg-success text-white-->
          <div class="card-body">
            <div class="form-group">
              <label class="text-black" for="college">College</label><br />
              <select class="custom-select" name="col" required id="col">
                <option selected value="" disabled>Choose...</option>
                <option value="CCS" id="CCSoption">CCS</option>
                <option value="COL" id="COLoption">COL</option>
                <option value="CLA" id="CLAoption">CLA</option>
                <option value="COS" id="COSoption">COS</option>
                <option value="GCOE" id="GCOEoption">GCOE</option>
                <option value="COB" id="COBoption">COB</option>
                <option value="SOE" id="SOEoption">SOE</option>
                <option value="CED" id="CEDoption">CED</option>
              </select>
            </div><!--/.form-group-->
            <div class="form-group">
              <label class="text-black" for="course">Course</label>
              <input type="text" class="form-control text-black" name="course" required id="co" value="">
            </div>
            <div class="form-group">
              <label class="text-black" for="aboutmeme">About Me</label>
              <input type="text" class="form-control text-black" name="aboutmeme" required id="aboutmeme"value="">
            </div><!--/.form-group-->
            <div id="errr" class="text-black"></div>
            <div class="text-right">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-success" onclick="updateStatus(col.value, co.value, aboutmeme.value)">UPDATE</button>
            </div><!--/.card-footer-->
          </div><!--/.card-body-->
        </div><!--/.modal-content-->
      </div><!--/.modal-dialog modal-lg-->
    </div><!--/.exampleModal2-->
    <?php if($_SESSION['username'] == $_GET['username']){ ?>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" style="width: 50rem !important; overflow-y: auto;">
        <div class="modal-content">
          <div class="card-header bg-success text-white">
            <h5 class="card-title" id="exampleModalLabel" style="margin: auto;">Update Profile Picture</h5>
          </div><!--/.card-header-->
          <div class="card-body">
            <form action="" enctype="multipart/form-data" id="form" method="post" name="form">
            <button type="button" class="btn btn-primary" onclick="filedialog()" style="width:100%; height: 100px;">
              <i class="fa fa-plus" aria-hidden="true"></i> Upload Photo
              <input name="myFile" type="file" id="upload" accept=".jpg, .jpeg" hidden onchange="fileChange(event)">
            </button>
            <hr>
            <div id="previewPicture"></div>
            <div class="card-footer text-right">
        			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-success" onclick="updateAjax(upload)">UPDATE</button>
        			<input type="button" class="btn btn-primary" onclick="uploadFunction(upload)" value="UPLOAD" name="submitBtn">
      		  </div><!--/.card-footer-->
            </form>
          </div><!--/.card-body-->
        </div><!--/.modal-content-->
      </div><!--/.modal-dialog modal-lg"-->
    </div><!--/#exampleModal-->
  </body>
  <?php } ?>
  <?php
  if(isset($_FILES["myFile"]["name"])){
    $validextensions = array("jpeg", "jpg", "png");
		$temporary = explode(".", $_FILES["myFile"]["name"]);
		$file_extension = end($temporary);

    if ((($_FILES["myFile"]["type"] == "image/png") || ($_FILES["myFile"]["type"] == "image/jpg") || ($_FILES["myFile"]["type"] == "image/jpeg")) && ($_FILES["myFile"]["size"] < 1000000000)){
			if ($_FILES["myFile"]["error"] > 0) {
				echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
			} else {
        /*
				echo "<span>Your File Uploaded Succesfully...!!</span><br/>";
				echo "<br/><b>File Name:</b> " . $_FILES["myFile"]["name"] . "<br>";
				echo "<b>Type:</b> " . $_FILES["myFile"]["type"] . "<br>";
				echo "<b>Size:</b> " . ($_FILES["myFile"]["size"] / 1024) . " kB<br>";
				echo "<b>Temp file:</b> " . $_FILES["myFile"]["tmp_name"] . "<br>";
        echo "<p>Hello</p>";
        */
				move_uploaded_file($_FILES["myFile"]["tmp_name"], "/xampp/htdocs/com.phantomfive.profsmato/assets/studentpic/" . $_FILES["myFile"]["name"]);
			}
		}

  }
  ?>
  <script>

    function updateStatus(college, course, aboutme){
      if(college == "" || course == "" || aboutme == ""){
        $('#errr').html("<p>Incomplete Fields Found.</p>");
      }else{
        var obj = "<?php echo $_SESSION['objId']; ?>";
        var rip = "http://localhost:8080/profsmatodb/students/" + obj;
        console.log(course);
        var mememe = '{"college": "' + college + '", "course": ["", "' + course + '"], "aboutme":"' + aboutme + '"}';
        $.ajax({
          type: "PATCH",
          url: rip,
          contentType: "application/json",
          data: mememe,
          complete: function(jqXHR, exception){
            if(jqXHR.status == 200){
              $('#college').html(college);
              $('#course').html(course);
              $('#about').html(aboutme);
              $('#errr').html("<p>Profile Page updated!</p>");
            }else{
              $('#errr').html("<p>The Request Failed.</p>");
            }
          }
        });
      }
    }

    function fileChange(event){
      var fullPath = document.getElementById('upload').value;
      var filename = getFileNameLang(fullPath);
      $('#previewPicture').html('<p class="text-black">' + filename + '</p>');
    }

    function getFileNameLang(fullPath){
      if (fullPath) {
        var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
        var filename = fullPath.substring(startIndex);
        if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
          filename = filename.substring(1);
        }
      }
      return filename;
    }

    function uploadFunction(){
      $('#form').submit();
    }

    function updateAjax(file){
      var objId = "<?php echo $_SESSION['objId']; ?>";
      var filename = getFileNameLang(file.value);
      var resting = "http://localhost:8080/profsmatodb/students/" + objId;
      var restUpdate = '{"profilepic":"' + filename + '"}';

      $.ajax({
        type: "PATCH",
        url: resting,
        contentType: "application/json",
        data: restUpdate,
        success: function(response){
          console.log("Success");
        },
        error: function(jqXHR, exception){
          console.log(jqXHR);
        }
      });
    }

    $(document).ready(function(){
      $('body').bootstrapMaterialDesign();
      var firstName = "";
      var lastName = "";
      var imageSrc = "/com.phantomfive.profsmato/assets/studentpic/";
      var profileLink = "/com.phantomfive.profsmato/Students/";
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
          $('#co').val(response[0].course[1]);
          $('#aboutmeme').val(response[0].aboutme);
          switch(response[0].college){
            case "CCS":
              $('#CCSoption').attr('selected', true);
              break;
            case "COS":
              $('#COSoption').attr('selected', true);
              break;
            case "CLA":
              $('#CLAoption').attr('selected', true);
              break;
            case "COL":
              $('#COLoption').attr('selected', true);
              break;
            case "GCOE":
              $('#GCOEoption').attr('selected', true);
              break;
            case "COB":
              $('#COBoption').attr('selected', true);
              break;
            case "SOE":
              $('#SOEoption').attr('selected', true);
              break;
            case "CED":
              $('#CEDoption').attr('selected', true);
              break;
          }
          loadNumberOfReviews();
          /*
          $('.profpic').attr('style', 'background-image:url(' + imageSrc +');');
          $('#genname').html(firstName + " " + lastName);
          $('#u').html(response[0].username);
          $('#college').html(response[0].college);
          $('#course').html(response[0].course[1]);
          $('#about').html(response[0].aboutme);
          */
        },
        error: function(jqXHR, exception){
          console.log(jqXHR.responseText);
        }
      });

      showUserProfile();
    });

    function loadNumberOfReviews(){
      $.ajax({
        type: "GET",
        url: 'http://localhost:8080/profsmatodb/reviews?filter={"studentusername":"<?php echo $_GET['username']; ?>"}',
        dataType: "json",
        success: function(response){
          $('#numRev').html("No. of Reviews: " + response._returned);
        },
        error: function(jqXHR, exception){
          console.log(jqXHR);
        }
      });
    }

    function filedialog(){
      document.getElementById("upload").click();
    }

    function showUserProfile(){
      var student = "<?php echo $_GET['username']; ?>";
      var rest = "http://localhost:8080/profsmatodb/students?filter={'username':'" + student + "'}";
      $.ajax({
        type: "GET",
        url: rest,
        dataType: "json",
        success: function(response){
          if(response._returned == 1){
            response = response._embedded;
            var firstName = response[0].firstname;
            var lastName = response[0].lastname;
            var imageSrc = "/com.phantomfive.profsmato/assets/studentpic/" + response[0].profilepic;

            var snsJson = response[0].contacts;
            var sns = "";

            for(var i = 0; i < snsJson.length; i++){
              if(snsJson[i].type == "facebook"){
                sns += '<a href="https://www.facebook.com/' + snsJson[i].link + '" class="text-black"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i> /' + snsJson[i].link + '</a><br />';
              }
              if(snsJson[i].type == "twitter"){
                sns += '<a href="https://www.twitter.com/' + snsJson[i].link + '" class="text-black"><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i> /' + snsJson[i].link + '</a><br />';
              }
              if(snsJson[i].type == "instagram"){
                sns += '<a href="https://www.instagram.com/' + snsJson[i].link + '" class="text-black"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i> /' + snsJson[i].link + '</a><br />';
              }
              if(snsJson[i].type == "steam"){
                sns += '<a href="https://steamcommunity.com/id/' + snsJson[i].link + '" class="text-black"><i class="fa fa-steam-square fa-2x" aria-hidden="true"></i> /' + snsJson[i].link + '</a><br />';
              }
              if(snsJson[i].type == "youtube"){
                sns += '<a href="https://www.youtube.com/' + snsJson[i].link + '" class="text-black"><i class="fa fa-youtube-play fa-2x" aria-hidden="true"></i> /' + snsJson[i].link + '</a><br />';
              }
            }

            $('.profpic').attr('style', 'background-image:url(' + imageSrc +');');
            $('#genname').html(firstName + " " + lastName);
            $('#u').html(response[0].username);
            $('#college').html(response[0].college);
            $('#course').html(response[0].course[1]);
            $('#about').html(response[0].aboutme);
            $('#sns').html(sns);
            $('#e').html(response[0].email);
          }else{
            console.log("No such user");
            console.log(response);
            //window.location.replace("/com.phantomfive.profsmato/UNKNOWN");
          }
        },
        error: function(jqXHR, exception){
          console.log(jqXHR.responseText);


        }
      });
    }
  </script>
  <script src="https://fezvrasta.github.io/bootstrap-material-design/assets/js/vendor/split.min.js"></script>
  <script src="https://fezvrasta.github.io/bootstrap-material-design/assets/js/vendor/popper.min.js"></script>
  <script src="/com.phantomfive.profsmato/assets/js/bootstrap-material-design.min.js"></script>
  <script src="https://fezvrasta.github.io/bootstrap-material-design/assets/js/vendor/anchor.min.js"></script>
  <script src="https://fezvrasta.github.io/bootstrap-material-design/assets/js/vendor/clipboard.min.js"></script>
  <script src="https://fezvrasta.github.io/bootstrap-material-design/assets/js/vendor/holder.min.js"></script>
  <script src="https://fezvrasta.github.io/bootstrap-material-design/assets/js/src/application.js"></script>
</html>
