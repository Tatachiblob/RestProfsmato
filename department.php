<?php
session_start();

if(!isset($_SESSION['isLogin'])){
  header("Location: Login");
}
if($_SESSION['userType'] != "normal"){
  header("Location: Admin");
}
if(!isset($_GET['department'])){
  header("Location: Home");
}else{
  $department = "";
  switch ($_GET['department']){
    case "IT":
      $department = "CCS: Information Technology Department";
      break;
    case "ST":
      $department = "CCS: Software Technology";
      break;
    case "CT":
      $department = "CCS: Computer Technology";
      break;

    case "BIO":
      $department = "COS: Biology Department";
      break;
    case "CHEM":
      $department = "COS: Chemistry Department";
      break;
    case "MATH":
      $department = "COS: Mathematics Department";
      break;
    case "PHY":
      $department = "COS: Physics Department";
      break;

    case "COL":
      $department = "COL: Law Department";

    case "BHS":
      $department = "CLA: Behavioral Scienes Department";
      break;
    case "COM":
      $department = "CLA: Communications Department";
      break;
    case "FIL":
      $department = "CLA: Filipino Department";
      break;
    case "HIS":
      $department = "CLA: History Department";
      break;
    case "INTS":
      $department = "CLA: Insternational Studies Department";
      break;
    case "LIT":
      $department = "CLA: Literature Department";
      break;
    case "PHILO":
      $department = "CLA: Philosophy Department";
      break;
    case "POLISI":
      $department = "CLA: Political Sciences Department";
      break;
    case "PSY":
      $department = "CLA: Psychology Department";
      break;
    case "THEO":
      $department = "CLA: Theology Department";
      break;

    case "CHEME":
      $department = "GCOE: Chemical Engineering Department";
      break;
    case "CE":
      $department = "GCOE: Civil Engineering Department";
      break;
    case "ECE":
      $department = "GCOE: Electronics and Communications Engineering Department";
      break;
    case "IE":
      $department = "GCOE: Industrial Engineering Department";
      break;
    case "MEM":
      $department = "GCOE: Manufacturing Engineering and Management Department";
      break;
    case "ME":
      $department = "GCOE: Mechanical Engineering Department";
      break;

    case "CEPD":
      $department = "CED: Counseling and Educational Psychology Department";
      break;
    case "DEAL":
      $department = "CED: Department English of Applied Linguistics";
      break;
    case "ELM":
      $department = "CED:Educational Leadership Management Department";
      break;
    case "PE":
      $department = "CED: Physical Education Department";
      break;
    case "SE":
      $department = "CED: Science Education Department";
      break;

    case "ACC":
      $department = "COB: Accountancy";
      break;
    case "CL":
      $department = "COB: Commercial Law";
      break;
    case "DSID":
      $department = "COB: Decision Sciences & Innovation Department";
      break;
    case "MFI":
      $department = "COB: Management of Financial Institutions";
      break;
    case "MOD":
      $department = "COB: Management and Organization Department";
      break;
    case "MM":
      $department = "COB: Marketing Management";
      break;

    case "SEO":
      $department = "SOE: Economics";
      break;

    default:
      header("Location: UNKNOWN");
  }
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
        padding-top: 2rem;
      }
      .proflabel{
    	   font-size:1rem;
    	}
      .profpic{
      	width:5rem;
      	box-shadow: 0px 3px 5px grey;
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
    		font-weight: 300 !important; }

    	}
    </style>
  </head>
  <body>
    <?php include 'navbarInclude.php' ?>
    <br />
    <div class="container mainContainer">
      <div class="row">
        <div class="col-md-12"><h2><?php echo $department; ?></h2></div>
      </div><!--/.row-->
      <hr>
      <div class="row">
        <div class="col-md-5">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search a prof within department...">
            <button type="button" class="btn btn-primary btn-md btn-raised">Go!</button>
          </div><!--/.input-group-->
        </div><!--/.col-md-5-->
      </div><!--/.row-->
      <br />
      <div id="professor"></div>
      <br />
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h4 class="display-3">Can't find your prof?</h4>
          <p class="lead">Hit the admins up by filling up the form below. The prof will have to be verified first before he/she will be added to our database.</p>
          <hr class="my-4">
          <div class="form-group">
            <label class="mr-sm-2" for="profcollege" style="color:grey;">Professor College</label>
            <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="profcollege" name="profCol" onchange="checkDept(this.value)">
              <option selected disabled value="">College</option>
  						<option value="CCS">CCS</option>
  						<option value="COL">COL</option>
  						<option value="CLA">CLA</option>
  						<option value="COS">COS</option>
  						<option value="GCOE">GCOE</option>
  						<option value="COB">COB</option>
  						<option value="SOE">SOE</option>
  						<option value="CED">CED</option>
            </select>
          </div><!--/.form-group-->
          <div class="form-group">
            <label class="mr-sm-2" for="profdept" style="color:grey;">Department</label>
            <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="profdept" name="profdept">
              <option selected disabled value="">Department</option>
            </select>
          </div><!--/.form-group-->
          <input class="form-control" type="text" placeholder="First Name of Professor">
          <br />
          <input class="form-control" type="text" placeholder="Last Name of Professor">
          <br />
          <button type="button" class="btn btn-primary btn-md btn-raised">SUBMIT</button>
        </div><!--/.container-->
      </div><!--/.jumbotron-->
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
  </body>
  <?php include 'navbarStlye.html' ?>
  <script>
    $(document).ready(function(){
      var objId = "<?php echo $_SESSION['objId']; ?>";
      var firstName = "";
      var lastName = "";
      var imageSrc = "/com.phantomfive.profsmato/assets/studentpic/";
      var profileLink = "Students/";
      var restUrl = "http://localhost:8080/profsmatodb/students/" + objId;
      $.ajax({
        type: "GET",
        url: restUrl,
        dataType: "json",
        success: function(response){
          firstName = response.firstname;
          lastName = response.lastname;
          profileLink += response.username;
          imageSrc += response.profilepic;

          $('#fullname').html(firstName + " " + lastName);
          $('#profilepicture').attr('src', imageSrc);
          $('#first').html(firstName);
        },
        error: function(jqXHR, exception){
          console.log(jqXHR);
        }
      });

      getProfData("<?php echo $_GET['department']; ?>");
    })

    function getProfData(department){
      var profHTML = '<div class="row">';
      var rester = "http://localhost:8080/profsmatodb/professors?filter={'departments':'" + department + "'}";
      $.ajax({
        type: "GET",
        url: rester,
        dataType: "json",
        success: function(response){
          console.log(response);
          response = response._embedded;
          for(var i = 0; i < response.length; i++){
            profHTML += '<div class="col-md-3">'
                     +  '<div class="card text-white bg-success" style="height:12rem;">'
                     +  '<div class="card-header">&nbsp;</div>'
                     +  '<div class="card-body text-center">'
                     +  '<img src="/com.phantomfive.profsmato/assets/profpic/' + response[i].profilepic + '" class="profpic rounded-circle" /><br />'
                     +  '<a href="' + department + '/' + response[i].profid + '" class="text-white"><h4 class="card-title">' + response[i].lastname + ' ' + response[i].firstname + '</h4></a>'
                     +  '</div>'
                     +  '</div>'
                     +  '</div>';
            if(i % 4 == 3){
              profHTML += '</div><br /><div class="row">';
            }
          }
          profHTML += '</div><!--/.row-->';
          $('#professor').html(profHTML);
        },
        error: function(jqXHR, exception){
          console.log(jqXHR);
        }
      });
    }

    function checkDept(college){
      var optionHtml = "";
      switch (college){
        case "CCS":
          optionHtml = '<option value="CT">Computer Technology</option>'
                     + '<option value="IT">Information Technology</option>'
                     + '<option value="ST">Software Technology</option>';
          break;
        case "COS":
          optionHtml = '<option value="BIO">Biology</option>'
                     + '<option value="CHEM">Chemistry</option>'
                     + '<option value="MATH">Mathematics</option>'
                     + '<option value="PHY">Physics</option>'
          break;
        case "COL":
          optionHtml = '<option value="COL">Law</option>';
          break;
        case "CLA":
          optionHtml = '<option value="BHS">Behavioral Sciences</option>'
                     + '<option value="COM">Communications</option>'
                     + '<option value="FIL">Filipino</option>'
                     + '<option value="HIS">History</option>'
                     + '<option value="INTS">International Studies</option>'
                     + '<option value="LIT">Literature</option>'
                     + '<option value="PHILO">Philosophy</option>'
                     + '<option value="POLISI">Political Science</option>'
                     + '<option value="PSY">Psychology</option>'
                     + '<option value="THEO">Theology</option>';
          break;
        case "GCOE":
          optionHtml = '<option value="CHEME">Chemical Engineering</option>'
                     + '<option value="CE">Civil Engineering</option>'
                     + '<option value="ECE">Electronics and Communications Engineering</option>'
                     + '<option value="IE">Industrial Engineering</option>'
                     + '<option value="MEM">Manufacturing Engineering and Management</option>'
                     + '<option value="ME">Mechanical Engineering</option>';
          break;
        case "COB":
          optionHtml = '<option value="ACC">Accountancy</option>'
                     + '<option value="CL">Commercial Law</option>'
                     + '<option value="DSID">Decision Sciences & Innovation</option>'
                     + '<option value="MFI">Management of Financial Institutions</option>'
                     + '<option value="MOD">Management of Organization</option>'
                     + '<option value="MM">Marketing Management</option>';
          break;
        case "SOE":
          optionHtml = '<option value="ECO">Economic</option>';
          break;
        case "CED":
          optionHtml = '<option value="CEPD">Counseling and Educational Psychology</option>'
                     + '<option value="DEAL">Department of English and Applied Linguistics</option>'
                     + '<option value="ELM">Educational Leadership and Management</option>'
                     + '<option value="PE">Physical Education</option>'
                     + '<option value="SE">Science Education</option>'
          break;
      }
      $('#profdept').html(optionHtml);
    }
  </script>
</html>
