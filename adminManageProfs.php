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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Professor Management</title>
    <?php include 'styleInclude.html'; ?>
    <style is="custom-style">
      paper-fab {
        display: inline-block;
    	margin: 8px;

      }

      paper-fab[mini] {
        --paper-fab-background: #FF5722;
      }

      paper-fab[label] {
        font-size: 20px;
        --paper-fab-background: #2196F3;
      }

      paper-fab.blue {
        --paper-fab-background: var(--paper-light-blue-500);
        --paper-fab-keyboard-focus-background: var(--paper-light-blue-900);
      }
      paper-fab.orange {
        --paper-fab-background: var(--paper-orange-500);
        --paper-fab-keyboard-focus-background: var(--paper-orange-900);
      }
    </style>
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
      background-color: rgba(0, 0, 0, 0.7)
      width: 100%;
      max-width: 100%;
      left: 0;
    }
    .carousel-caption h3,p {
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

  	.sufab{
    	position:fixed;
    	right:5%;
    	bottom:5%;
    	z-index:18;
    }
    </style>
  </head>
  <body>
    <?php include 'adminNavbar.php'; ?>
    <br />
    <div class="container mainContainer">
      <h1 class="display-4">Manage Users</h1>
      <div class="alert alert-info alert-dismissible fade show material-shadow" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        To edit data, click the desired row first, then click the <paper-fab mini class="blue" icon="create" onclick="logic()"></paper-fab>  button on the bottom-right hand corner of the screen.
      </div><!--/.alert alert-info alert-dismissible fade show material-shadow-->
      <div class="row mb-3">
        <div clas="col-md-6">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search the table" id="searchpogi">
  				  <span class="input-group-addon"><a href="#" class="text-success"><i class="fa fa-search" aria-hidden="true"></i></a></span>
          </div><!--/.input-group-->
          <br class="d-md-none d-lg-none">
        </div><!--/.col-md-6-->
      </div><!--/.row mb-3-->
      <div id="datatable"></div>
      <div class="sufab" id="fab">
        <i class="fa fa-arrow-down" aria-hidden="true" id="assist" style="display:block;text-align:center;font-size:5rem;opacity:0;"></i>
    		<paper-fab class="blue" icon="create" data-toggle="modal" data-target="#exampleModal" id="editThis"></paper-fab>
      </div><!--#fab-->
    </div><!--/.container mainContainer-->
  </body>
  <script type="text/javascript" class="init">
    $(document).ready(function(){
      $('body').bootstrapMaterialDesign();

      initScreen();
      getProfs();

      $("#butt_filters").click(function(){
    		$("#filters").toggle(300);
    	});
    });

    getProfs(){
      var profRest = "http://localhost:8080/profsmatodb/professors?filter={'status':'active'}";
      $.ajax({
        type: "GET",
        url: profRest,
        dateType: "json",
        success: function(response){
          response = response._embedded;
          var prof = '<div class="row mb-3">'
                   + '<div class="col-md-12">'
                   + '<div class="table-responsive">'
                   + '<table class="table table-hover table-bordered nowrap material-shadow" cellspacing="0" width="100%" id="yutangina">'
                   + '<thead class="thead-inverse">'
                   + '<tr><th>ID</th><th>Last Name</th><th>First Name</th><th>College</th><th>Email</th><th>Status</th></tr></thead><tbody>';
          for(var i = 0; i < response.length; i++){
            prof += '<tr>'
                  + '<td>' + response[i].profid + '</td>'
                  + '<td>' + response[i].lastname + '</td>'
                  + '<td>' + response[i].firstname + '</td>'
                  + '<td>' + response[i].college + '</td>'
                  + '<td>' + response[i].email + '</td>'
                  + '<td>' + response[i].status + '</td>'
                  + '</tr>';
          }
          prof += '</tbody></table></div></div></div>';
          $('#datatable').html(prof);
        },
        error: function(jqXHR, exception){
          console.log(jqXHR);
        }
      });
    }

    initScreen(){
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

    function logic(){
      $("#assist").css({"margin-bottom": "300px", "opacity": "0"});
      var div = $("#assist");
      div.animate({
        opacity: '1.0',
    		marginBottom: '0px'
      });
      div.animate({
        opacity: '0.0',
      });
    }
  </script>
</html>
