<?php
session_start();

if(!isset($_SESSION['isLogin'])){
  header("Location: Login");
}

if($_SESSION['userType'] != "normal"){
  header("Location: ../Admin");
}

if(!isset($_GET['college'])){
  header("Location: ../Home");
}else{
  $collegeTitle = "";
  switch($_GET['college']){
    case "CCS":
      $collegeTitle = "College of Computer Science";
      break;
    case "COL":
      $collegeTitle = "College of Law";
      break;
    case "CLA":
      $collegeTitle = "College of Liberal Arts";
      break;
    case "COS":
      $collegeTitle = "College of Science";
      break;
    case "GCOE":
      $collegeTitle = "Gokongwei College of Engineering";
      break;
    case "COB":
      $collegeTitle = "College of Business";
      break;
    case "SOE":
      $collegeTitle = "School of Economic";
      break;
    case "CED":
      $collegeTitle = "College of Education";
      break;
    default:
      header("Location: ../");
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profsmato</title>
    <script src="/com.phantomfive.profsmato/assets/js/bootstrap-material-design.min.js"></script>
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
      		font-weight: 300 !important;
        }
      }
    </style>
  </head>
  <body>
    <?php include 'navbarInclude.php' ?>
    <br />
    <div class="container mainContainer">
      <div class="row">
        <div class="col-md-12"><h2><?php echo $collegeTitle; ?></h2></div>
      </div><!--/.row-->
      <hr />
      <!--/38 Departments-->
      <!--/8 Colleges-->
      <!--/CCS-->
      <!--
      <div id="TEST">
        <div class="row">
    			<div class="col-md-12">
    				<h4>Information Technology</h4></a>
    			</div>
    		</div>
        <div class="row">
    			<div class="col-md-3">
    				<div class="card text-white bg-success" style="height:12rem;">
    				<div class="card-header">Header</div>
    				  <div class="card-body text-center">
    					<img src="profpics/rjmolano.JPG" class="profpic rounded-circle" /><br>
    					<a href="profProfile.html" class="text-white"><h4 class="card-title">Renato Jose Maria Molano</h4></a></a>
    					<p class="card-text">ASSISTANT PROFESSOR</p>
    				  </div>
    				</div>
    			</div>
          <div class="col-md-3">
    				<div class="card text-white bg-success" style="height:12rem;">
    				<div class="card-header">Header</div>
    				  <div class="card-body text-center">
    					<img src="profpics/siroli.JPG" class="profpic rounded-circle" /><br>
    					<a href="#" class="text-white"><h4 class="card-title">SirOli Malabanan</h4></a></a>
    					<p class="card-text">ASSISTANT PROFESSOR</p>
    				  </div>
    				</div>
    			</div>
          <div class="col-md-3">
    				<div class="card text-white bg-success" style="height:12rem;">
    				<div class="card-header">Header</div>
    				  <div class="card-body text-center">
    					<img src="profpics/siroli.JPG" class="profpic rounded-circle" /><br>
    					<a href="#" class="text-white"><h4 class="card-title">SirOli Malabanan</h4></a></a>
    					<p class="card-text">ASSISTANT PROFESSOR</p>
    				  </div>
    				</div>
    			</div>
          <div class="col-md-3">
    				<div class="card text-white bg-success" style="height:12rem;">
    				<div class="card-header">Header</div>
    				  <div class="card-body text-center">
    					<img src="profpics/siroli.JPG" class="profpic rounded-circle" /><br>
    					<a href="#" class="text-white"><h4 class="card-title">SirOli Malabanan</h4></a></a>
    					<p class="card-text">ASSISTANT PROFESSOR</p>
    				  </div>
    				</div>
          <br>
  				<a href="viewAll_CCS_IT.html" class="btn btn-primary" style="float:right;">View all <i class="fa fa-chevron-right"></i></a>
  			</div>
      </div>
      -->
      <div id="IT"></div>
      <div id="ST"></div>
      <div id="CT"></div>

      <!--/COS-->
      <div id="BIO"></div>
      <div id="CHEM"></div>
      <div id="MATH"></div>
      <div id="PHY"></div>

      <!--/COL-->
      <div id="COL"></div>

      <!--/CLA-->
      <div id="BHS"></div><!--/#Behavioral Sciences-->
      <div id="COM"></div>
      <div id="FIL"></div>
      <div id="HIS"></div>
      <div id="INTS"></div><!--/#International Studies-->
      <div id="LIT"></div>
      <div id="PHILO"></div><!--/#Philosophy-->
      <div id="POLISI"></div>
      <div id="PSY"></div><!--/#Psychology-->
      <div id="THEO"></div><!--/#Theology-->

      <!--/GCOE-->
      <div id="CHEME"></div>
      <div id="CE"></div>
      <div id="ECE"></div><!--/#Electronics and Communications Engineering-->
      <div id="IE"></div><!--/#Industrial Engineering-->
      <div id="MEM"></div>
      <div id="ME"></div>

      <!--/CED-->
      <div id="CEPD"></div>
      <div id="DEAL"></div>
      <div id="ELM"></div>
      <div id="PE"></div>
      <div id="SE"></div>

      <!--/COB-->
      <div id="ACC"></div>
      <div id="CL"></div>
      <div id="DSID"></div>
      <div id="MFI"></div>
      <div id="MOD"></div>
      <div id="MM"></div>

      <!--/SOE-->
      <div id="ECO"></div>
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

    <?php include 'navbarStlye.html' ?>
  </body>
  <script>
  $(document).ready(function(){
    $('body').bootstrapMaterialDesign();
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
    <?php
    switch($_GET['college']){
      case "CCS":
        echo "showCCS();";
        break;
      case "COL":
        echo "showCOL();";
        break;
      case "CLA":
        echo "showCLA();";
        break;
      case "COS":
        echo "showCOS();";
        break;
      case "GCOE":
        echo "showGCOE();";
        break;
      case "COB":
        echo "showCOB();";
        break;
      case "SOE":
        echo "showSOE();";
        break;
      case "CED":
        echo "showCED();";
        break;
    }
    ?>
  });

  //Complete
  function showCCS(){
    showIT();
    showST();
    showCT();
  }

  function showIT(){
    $.ajax({
      type: "GET",
      url: "http://localhost:8080/profsmatodb/professors?page=1&pagesize=4&filter={'departments':'IT', 'status':'active'}",
      dataType: "json",
      success: function(response){
        console.log(response);
        response = response._embedded;
        var it = '<div class="row"><div class="col-md-12"><h4>Information Technology</h4></div></div>';
        it += '<div class="row">';

        for(var i = 0; i < response.length; i++){
          if(i == response.length - 1){
            it += '<div class="col-md-3">'
                + '<div class="card text-white bg-success" style="height:12rem;">'
                + '<div class="card-header">Header</div>'
                + '<div class="card-body text-center">'
                + '<img src="/com.phantomfive.profsmato/assets/profpic/' + response[i].profilepic + '" class="profpic rounded-circle" /><br />'
                + '<a href="CCS/IT/' + response[i].profid + '" class="text-white"><h4 class="card-title">' + response[i].lastname + ' ' + response[i].firstname + '</h4></a>'
                //+ '<p class="card-text">ASSISTANT PROFESSOR</p>'
                + '</div></div>';
            it += '<br /><a href="/com.phantomfive.profsmato/College/CCS/IT" class="btn btn-primary" style="float:right;">View All<i class="fa fa-chevron-right"></i></a></div>';
          }else{
            it += '<div class="col-md-3">'
                + '<div class="card text-white bg-success" style="height:12rem;">'
                + '<div class="card-header">Header</div>'
                + '<div class="card-body text-center">'
                + '<img src="/com.phantomfive.profsmato/assets/profpic/' + response[i].profilepic + '" class="profpic rounded-circle" /><br />'
                + '<a href="CCS/IT/' + response[i].profid + '" class="text-white"><h4 class="card-title">' + response[i].lastname + ' ' + response[i].firstname + '</h4></a>'
                //+ '<p class="card-text">ASSISTANT PROFESSOR</p>'
                + '</div></div></div>';
          }
        }

        it += '</div>';
        $('#IT').html(it);
      },
      error: function(jqXHR, exception){
        console.log(jqXHR);
      }
    });
  }
  function showST(){
    $.ajax({
      type: "GET",
      url: "http://localhost:8080/profsmatodb/professors?page=1&pagesize=4&filter={'departments':'ST', 'status':'active'}",
      dataType: "json",
      success: function(response){
        console.log(response);
        response = response._embedded;
        var st = '<div class="row"><div class="col-md-12"><h4>Software Technology</h4></div></div><hr />';
        st += '<div class="row">';

        for(var i = 0; i < response.length; i++){
          if(i == response.length - 1){
            st += '<div class="col-md-3">'
                + '<div class="card text-white bg-success" style="height:12rem;">'
                + '<div class="card-header">Header</div>'
                + '<div class="card-body text-center">'
                + '<img src="/com.phantomfive.profsmato/assets/profpic/' + response[i].profilepic + '" class="profpic rounded-circle" /><br />'
                + '<a href="CCS/ST/' + response[i].profid + '" class="text-white"><h4 class="card-title">' + response[i].lastname + ' ' + response[i].firstname + '</h4></a>'
                //+ '<p class="card-text">ASSISTANT PROFESSOR</p>'
                + '</div></div>';
            st += '<br /><a href="/com.phantomfive.profsmato/College/CCS/ST" class="btn btn-primary" style="float:right;">View All<i class="fa fa-chevron-right"></i></a></div>';
          }else{
            st += '<div class="col-md-3">'
                + '<div class="card text-white bg-success" style="height:12rem;">'
                + '<div class="card-header">Header</div>'
                + '<div class="card-body text-center">'
                + '<img src="/com.phantomfive.profsmato/assets/profpic/' + response[i].profilepic + '" class="profpic rounded-circle" /><br />'
                + '<a href="CCS/ST/' + response[i].profid + '" class="text-white"><h4 class="card-title">' + response[i].lastname + ' ' + response[i].firstname + '</h4></a>'
                //+ '<p class="card-text">ASSISTANT PROFESSOR</p>'
                + '</div></div></div>';
          }
        }

        st += '</div>';
        $('#ST').html(st);
      },
      error: function(jqXHR, exception){
        console.log(jqXHR);
      }
    });
  }
  function showCT(){
    $.ajax({
      type: "GET",
      url: "http://localhost:8080/profsmatodb/professors?page=1&pagesize=4&filter={'departments':'CT', 'status':'active'}",
      dataType: "json",
      success: function(response){
        console.log(response);
        response = response._embedded;
        var it = '<div class="row"><div class="col-md-12"><h4>Computer Technology</h4></div></div><hr/>';
        it += '<div class="row">';

        for(var i = 0; i < response.length; i++){
          if(i == response.length - 1){
            it += '<div class="col-md-3">'
                + '<div class="card text-white bg-success" style="height:12rem;">'
                + '<div class="card-header">Header</div>'
                + '<div class="card-body text-center">'
                + '<img src="/com.phantomfive.profsmato/assets/profpic/' + response[i].profilepic + '" class="profpic rounded-circle" /><br />'
                + '<a href="CCS/CT/' + response[i].profid + '" class="text-white"><h4 class="card-title">' + response[i].lastname + ' ' + response[i].firstname + '</h4></a>'
              //  + '<p class="card-text">ASSISTANT PROFESSOR</p>'
                + '</div></div>';
            it += '<br /><a href="/com.phantomfive.profsmato/College/CCS/CT" class="btn btn-primary" style="float:right;">View All<i class="fa fa-chevron-right"></i></a></div>';
          }else{
            it += '<div class="col-md-3">'
                + '<div class="card text-white bg-success" style="height:12rem;">'
                + '<div class="card-header">Header</div>'
                + '<div class="card-body text-center">'
                + '<img src="/com.phantomfive.profsmato/assets/profpic/' + response[i].profilepic + '" class="profpic rounded-circle" /><br />'
                + '<a href="CCS/CT/' + response[i].profid + '" class="text-white"><h4 class="card-title">' + response[i].lastname + ' ' + response[i].firstname + '</h4></a>'
                //+ '<p class="card-text">ASSISTANT PROFESSOR</p>'
                + '</div></div></div>';
          }
        }

        it += '</div>';
        $('#CT').html(it);
      },
      error: function(jqXHR, exception){
        console.log(jqXHR);
      }
    });
  }

  //complete
  function showCOS(){
    showBIO();
    showCHEM();
    showMATH();
    showPHY();
  }

  function showBIO(){
    $.ajax({
      type: "GET",
      url: "http://localhost:8080/profsmatodb/professors?page=1&pagesize=4&filter={'departments':'BIO', 'status':'active'}",
      dataType: "json",
      success: function(response){
        console.log(response);
        response = response._embedded;
        var it = '<div class="row"><div class="col-md-12"><h4>Biology Department</h4></div></div>';
        it += '<div class="row">';

        for(var i = 0; i < response.length; i++){
          if(i == response.length - 1){
            it += '<div class="col-md-3">'
                + '<div class="card text-white bg-success" style="height:12rem;">'
                + '<div class="card-header">Header</div>'
                + '<div class="card-body text-center">'
                + '<img src="/com.phantomfive.profsmato/assets/profpic/' + response[i].profilepic + '" class="profpic rounded-circle" /><br />'
                + '<a href="COS/BIO/' + response[i].profid + '" class="text-white"><h4 class="card-title">' + response[i].lastname + ' ' + response[i].firstname + '</h4></a>'
                + '</div></div>';
            it += '<br /><a href="/com.phantomfive.profsmato/College/COS/BIO" class="btn btn-primary" style="float:right;">View All<i class="fa fa-chevron-right"></i></a></div>';
          }else{
            it += '<div class="col-md-3">'
                + '<div class="card text-white bg-success" style="height:12rem;">'
                + '<div class="card-header">Header</div>'
                + '<div class="card-body text-center">'
                + '<img src="/com.phantomfive.profsmato/assets/profpic/' + response[i].profilepic + '" class="profpic rounded-circle" /><br />'
                + '<a href="COS/BIO/' + response[i].profid + '" class="text-white"><h4 class="card-title">' + response[i].lastname + ' ' + response[i].firstname + '</h4></a>'
                + '</div></div></div>';
          }
        }

        it += '</div>';
        $('#BIO').html(it);
      },
      error: function(jqXHR, exception){
        console.log(jqXHR);
      }
    });
  }
  function showCHEM(){
    $.ajax({
      type: "GET",
      url: "http://localhost:8080/profsmatodb/professors?page=1&pagesize=4&filter={'departments':'CHEM', 'status':'active'}",
      dataType: "json",
      success: function(response){
        console.log(response);
        response = response._embedded;
        var it = '<div class="row"><div class="col-md-12"><h4>Chemistry Department</h4></div></div><hr />';
        it += '<div class="row">';

        for(var i = 0; i < response.length; i++){
          if(i == response.length - 1){
            it += '<div class="col-md-3">'
                + '<div class="card text-white bg-success" style="height:12rem;">'
                + '<div class="card-header">Header</div>'
                + '<div class="card-body text-center">'
                + '<img src="/com.phantomfive.profsmato/assets/profpic/' + response[i].profilepic + '" class="profpic rounded-circle" /><br />'
                + '<a href="COS/CHEM/' + response[i].profid + '" class="text-white"><h4 class="card-title">' + response[i].lastname + ' ' + response[i].firstname + '</h4></a>'
                + '</div></div>';
            it += '<br /><a href="/com.phantomfive.profsmato/College/COS/CHEM" class="btn btn-primary" style="float:right;">View All<i class="fa fa-chevron-right"></i></a></div>';
          }else{
            it += '<div class="col-md-3">'
                + '<div class="card text-white bg-success" style="height:12rem;">'
                + '<div class="card-header">Header</div>'
                + '<div class="card-body text-center">'
                + '<img src="/com.phantomfive.profsmato/assets/profpic/' + response[i].profilepic + '" class="profpic rounded-circle" /><br />'
                + '<a href="COS/CHEM/' + response[i].profid + '" class="text-white"><h4 class="card-title">' + response[i].lastname + ' ' + response[i].firstname + '</h4></a>'
                + '</div></div></div>';
          }
        }

        it += '</div>';
        $('#CHEM').html(it);
      },
      error: function(jqXHR, exception){
        console.log(jqXHR);
      }
    });
  }
  function showMATH(){
    $.ajax({
      type: "GET",
      url: "http://localhost:8080/profsmatodb/professors?page=1&pagesize=4&filter={'departments':'MATH', 'status':'active'}",
      dataType: "json",
      success: function(response){
        console.log(response);
        response = response._embedded;
        var it = '<div class="row"><div class="col-md-12"><h4>Mathematics Department</h4></div></div><hr />';
        it += '<div class="row">';

        for(var i = 0; i < response.length; i++){
          if(i == response.length - 1){
            it += '<div class="col-md-3">'
                + '<div class="card text-white bg-success" style="height:12rem;">'
                + '<div class="card-header">Header</div>'
                + '<div class="card-body text-center">'
                + '<img src="/com.phantomfive.profsmato/assets/profpic/' + response[i].profilepic + '" class="profpic rounded-circle" /><br />'
                + '<a href="COS/MATH/' + response[i].profid + '" class="text-white"><h4 class="card-title">' + response[i].lastname + ' ' + response[i].firstname + '</h4></a>'
                + '</div></div>';
            it += '<br /><a href="/com.phantomfive.profsmato/College/COS/MATH" class="btn btn-primary" style="float:right;">View All<i class="fa fa-chevron-right"></i></a></div>';
          }else{
            it += '<div class="col-md-3">'
                + '<div class="card text-white bg-success" style="height:12rem;">'
                + '<div class="card-header">Header</div>'
                + '<div class="card-body text-center">'
                + '<img src="/com.phantomfive.profsmato/assets/profpic/' + response[i].profilepic + '" class="profpic rounded-circle" /><br />'
                + '<a href="COS/MATH/' + response[i].profid + '" class="text-white"><h4 class="card-title">' + response[i].lastname + ' ' + response[i].firstname + '</h4></a>'
                + '</div></div></div>';
          }
        }

        it += '</div>';
        $('#MATH').html(it);
      },
      error: function(jqXHR, exception){
        console.log(jqXHR);
      }
    });
  }
  function showPHY(){
    $.ajax({
      type: "GET",
      url: "http://localhost:8080/profsmatodb/professors?page=1&pagesize=4&filter={'departments':'PHY', 'status':'active'}",
      dataType: "json",
      success: function(response){
        console.log(response);
        response = response._embedded;
        var it = '<div class="row"><div class="col-md-12"><h4>Physics Department</h4></div></div><hr />';
        it += '<div class="row">';

        for(var i = 0; i < response.length; i++){
          if(i == response.length - 1){
            it += '<div class="col-md-3">'
                + '<div class="card text-white bg-success" style="height:12rem;">'
                + '<div class="card-header">Header</div>'
                + '<div class="card-body text-center">'
                + '<img src="/com.phantomfive.profsmato/assets/profpic/' + response[i].profilepic + '" class="profpic rounded-circle" /><br />'
                + '<a href="COS/PHY/' + response[i].profid + '" class="text-white"><h4 class="card-title">' + response[i].lastname + ' ' + response[i].firstname + '</h4></a>'
                + '</div></div>';
            it += '<br /><a href="/com.phantomfive.profsmato/College/COS/PHY" class="btn btn-primary" style="float:right;">View All<i class="fa fa-chevron-right"></i></a></div>';
          }else{
            it += '<div class="col-md-3">'
                + '<div class="card text-white bg-success" style="height:12rem;">'
                + '<div class="card-header">Header</div>'
                + '<div class="card-body text-center">'
                + '<img src="/com.phantomfive.profsmato/assets/profpic/' + response[i].profilepic + '" class="profpic rounded-circle" /><br />'
                + '<a href="COS/PHY/' + response[i].profid + '" class="text-white"><h4 class="card-title">' + response[i].lastname + ' ' + response[i].firstname + '</h4></a>'
                + '</div></div></div>';
          }
        }

        it += '</div>';
        $('#PHY').html(it);
      },
      error: function(jqXHR, exception){
        console.log(jqXHR);
      }
    });
  }

  //complete
  function showCOL(){
    $.ajax({
      type: "GET",
      url: "http://localhost:8080/profsmatodb/professors?page=1&pagesize=4&filter={'departments':'COL', 'status':'active'}",
      dataType: "json",
      success: function(response){
        console.log(response);
        response = response._embedded;
        var it = '<div class="row"><div class="col-md-12"><h4>Law Department</h4></div></div>';
        it += '<div class="row">';

        for(var i = 0; i < response.length; i++){
          if(i == response.length - 1){
            it += '<div class="col-md-3">'
                + '<div class="card text-white bg-success" style="height:12rem;">'
                + '<div class="card-header">Header</div>'
                + '<div class="card-body text-center">'
                + '<img src="/com.phantomfive.profsmato/assets/profpic/' + response[i].profilepic + '" class="profpic rounded-circle" /><br />'
                + '<a href="COL/COL/' + response[i].profid + '" class="text-white"><h4 class="card-title">' + response[i].lastname + ' ' + response[i].firstname + '</h4></a>'
                + '</div></div>';
            it += '<br /><a href="/com.phantomfive.profsmato/College/COL/COL" class="btn btn-primary" style="float:right;">View All<i class="fa fa-chevron-right"></i></a></div>';
          }else{
            it += '<div class="col-md-3">'
                + '<div class="card text-white bg-success" style="height:12rem;">'
                + '<div class="card-header">Header</div>'
                + '<div class="card-body text-center">'
                + '<img src="/com.phantomfive.profsmato/assets/profpic/' + response[i].profilepic + '" class="profpic rounded-circle" /><br />'
                + '<a href="COL/COL/' + response[i].profid + '" class="text-white"><h4 class="card-title">' + response[i].lastname + ' ' + response[i].firstname + '</h4></a>'
                + '</div></div></div>';
          }
        }

        it += '</div>';
        $('#PHY').html(it);
      },
      error: function(jqXHR, exception){
        console.log(jqXHR);
      }
    });
  }

  //incomplete
  function showCLA(){
    /*
    showBHS();
    showCOM();
    showFIL();
    showHIS();
    showINTS();
    showLIT();
    showPHILO();
    showPOLISI();
    showPSY();
    showTHEO();
    */
  }

  //incomplete
  function showGCOE(){
    /*
    showCHEME();
    showCE();
    showECE();
    showIE();
    showMEM();
    showME();
    */
  }

  //incomplete
  function showCED(){
    /*
    showCEPD();
    showDEAL();
    showELM();
    showPE();
    showSE();
    */
  }

  //incomplete
  function showCOB(){
    /*
    showACC();
    showCL();
    showDSID();
    showMFI();
    showMOD();
    showMM();
    */
  }

  //incomplete
  function showSOE(){

  }
  </script>
</html>
