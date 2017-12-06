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
    <title>User Management</title>
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
        <div class="col-md-6">
          <div class="input-group">
  				  <input type="text" class="form-control" placeholder="Search the table" id="searchpogi">
  				  <span class="input-group-addon"><a href="#" class="text-success"><i class="fa fa-search" aria-hidden="true"></i></a></span>
  				</div><!--/.input-group-->
          <br class="d-md-none d-lg-none">
        </div><!--/.col-md-6-->
        <!--
        <div class="col-md-6">
  				<button type="button" class="btn btn-raised btn-primary" id="butt_filters">ADVANCED FILTERS</button>
  			</div>
      -->
      </div><!--/.row mb-3-->
      <div class="row mb-3">
        <div class="col-md-7">
          <div id="filters" style="display:none;">
            <div class="btn-group">
              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">BY ID NUMBER</button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;115</a>
        				<a class="dropdown-item" href="#">117</a>
        				<a class="dropdown-item" href="#">116</a>
        				<a class="dropdown-item" href="#">114</a>
        				<a class="dropdown-item" href="#">113</a>
        				<a class="dropdown-item" href="#">112</a>
        				<a class="dropdown-item" href="#">111</a>
              </div><!--/.dropdown-menu-->
            </div><!--/.btn-group-->
            <div class="btn-group">
      			  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">BY COLLEGE</button>
        			<div class="dropdown-menu">
                <a class="dropdown-item" href="#"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;CCS</a>
          			<a class="dropdown-item" href="#">COS</a>
          			<a class="dropdown-item" href="#">CLA</a>
          			<a class="dropdown-item" href="#">GCOE</a>
          			<a class="dropdown-item" href="#">SOE</a>
          			<a class="dropdown-item" href="#">COB</a>
          			<a class="dropdown-item" href="#">BAGCED</a>
          			<a class="dropdown-item" href="#">COL</a>
              </div><!--/.dropdown-menu-->
            </div><!--/.btn-group-->
          </div><!--/#filters-->
        </div><!--/.col-md-7-->
      </div><!--/.row mb-3-->
      <div id="datatable"></div>
      <div class="sufab" id="fab">
    		<i class="fa fa-arrow-down" aria-hidden="true" id="assist" style="display:block;text-align:center;font-size:5rem;opacity:0;"></i>
    		<paper-fab class="blue" icon="create" data-toggle="modal" data-target="#exampleModal" id="editThis"></paper-fab>
    	</div>
    </div><!--/.container mainContainer-->
    <br>
    <div class="bg-success text-white">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mt-3">
            <p class="text-center text-white" style="font-size:0.7rem;">© Copyright 2017 Phantom Five Dev Team - All rights reserved. </p>
          </div><!--/.col-md-12 mt-3-->
        </div><!--/.row-->
      </div><!--/.container-->
    </div><!--/.bg-success text-white-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel1">Edit Student Username: Temp</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div><!--/.modal-header-->
          <div class="modal-body">
            <!--<form>-->
            <div class="form-group">
  						<label for="edituName" class="form-control-label">Username:</label>
  						<input type="text" class="form-control" id="edituName" name="edituName">
  					</div><!--/.form-group-->
            <div class="form-group">
  						<label for="editEmail" class="form-control-label">E-mail:</label>
  						<input type="email" class="form-control" id="editEmail" name="editEmail">
  					</div><!--/.form-group-->
  					<div class="form-group">
  						<label for="editlName" class="form-control-label">Last name:</label>
  						<input type="text" class="form-control" id="editlName" name="editlName">
  					</div><!--/.form-group-->
  					<div class="form-group">
  						<label for="editfName" class="form-control-label">First name:</label>
  						<input type="text" class="form-control" id="editfName" name="editfName">
  					</div><!--/.form-group-->
  					<div class="form-group">
  					<label for="editCollege" class="form-control-label">College:</label>
    					<select class="custom-select form-control" id="editCollege" name="editCollege">
    						<option selected disabled>Choose...</option>
    						<option value="CCS">CCS</option>
    						<option value="COL">COL</option>
    						<option value="CLA">CLA</option>
    						<option value="COS">COS</option>
    						<option value="GCOE">GCOE</option>
    						<option value="COB">COB</option>
    						<option value="SOE">SOE</option>
    						<option value="BAGCED">BAGCED</option>
  					  </select>
  					</div><!--/.form-group-->
            <!--</form>-->
          </div><!--/.modal-body-->
          <div class="modal-footer">
    				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    				<button type="button" class="btn btn-primary">Save Changes</button>
  			  </div><!--/.modal-footer-->
        </div><!--/.modal-content-->
      </div><!--/.modal-dialog-->
    </div><!--/.modal fade-->
  </body>
  <script type="text/javascript" class="init">
    $(document).ready(function(){
      $('body').bootstrapMaterialDesign();

      initScreen();
      getStudents();

      $("#butt_filters").click(function(){
    		$("#filters").toggle(300);
    	});


    });

    function getStudents(){
      var rest = "http://localhost:8080/profsmatodb/students";
      $.ajax({
        type: "GET",
        url: rest,
        dataType: "json",
        success: function(response){
          console.log(response);
          response = response._embedded;
          var yuta = '<div class="row mb-3">'
                          + '<div class="col-md-12">'
                          + '<div class="table-responsive">'
                          + '<table class="table table-hover table-bordered nowrap material-shadow" cellspacing="0" width="100%" id="yutangina">'
                          + '<thead class="thead-inverse">'
                          + '<tr><th>ID Number</th><th>Username</th><th>Last Name</th><th>First Name</th><th>Email</th><th>College</th><th>Status</th></tr></thead><tbody>';
          for(var i = 0; i < response.length; i++){
            yuta += '<tr>'
                 + '<td>' + response[i].idnum + '</td>'
                 + '<td>' + response[i].username + '</td>'
                 + '<td>' + response[i].lastname + '</td>'
                 + '<td>' + response[i].firstname + '</td>'
                 + '<td>' + response[i].email + '</td>'
                 + '<td>' + response[i].college + '</td>'
                 + '<td>' + response[i].status + '</td>'
                 + '</tr>';
          }
          yuta += '</tbody></table></div></div></div>';
          $('#datatable').html(yuta);

          $('#yutangina').DataTable({
        		responsive: {
        			details: {
        				display: $.fn.dataTable.Responsive.display.modal( {
        					header: function ( row ) {
        						var data = row.data();
        						return 'Details for '+data[0]+' '+data[1];
        					}
        				} ),
        				renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
        					tableClass: 'table'
        				} )
        			}
        		}
        	});

          $("#yutangina_filter").hide();

          $('#searchpogi').on('keypress keyup keydown',function(event) {
        	  // create the event
        	   var press = jQuery.Event(event.type);
        	   var code = event.keyCode || event.which;
        	   press.which = code;
        	  // trigger
        	  $("input[type=search]").val(this.value);
        	  $("input[type=search]").trigger(event.type, {'event': press});
        	});

          $("#butt_filters").click(function(){
        		$("#filters").toggle(300);
        	});
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
