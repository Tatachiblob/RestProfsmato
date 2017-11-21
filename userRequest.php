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
    <title>User Registration</title>
    <?php include 'styleInclude.html'; ?>
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
      <h1 class="display-4">Registration Requests</h1>
      <div class="alert alert-info alert-dismissible fade show material-shadow" role="alert">
    	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    		<span aria-hidden="true">&times;</span>
    	  </button>
    	  <strong>Welcome to the Registration Requests module, admin!</strong> You should check in on some of those fields below.
    	</div><!--/.alert-->
      <div class="row mb-3">
        <div class="col-md-6">
          <div class="input-group">
  				  <input type="text" class="form-control" placeholder="Search the table" id="searchpogi">
  				  <span class="input-group-addon"><a href="#" class="text-success"><i class="fa fa-search" aria-hidden="true"></i></a></span>
  				</div><!--/.input-group-->
          <br class="d-md-none d-lg-none"  />
        </div><!--/.col-md-6-->
        <!--<div class="col-md-6">
  				<button type="button" class="btn btn-raised btn-primary" id="butt_filters">ADVANCED FILTERS</button>
  			</div>/.col-md-6-->
      </div><!--/.row mb-3-->
      <div class="row mb-3">
        <div class="col-md-7">
          <div id="filters" style="display: none;">
            <div class="btn-group">
              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">BY ID</button>
              <div class="dropdown-menu">
      					<a class="dropdown-item" href="#"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;111</a>
      					<a class="dropdown-item" href="#">112</a>
      					<a class="dropdown-item" href="#">113</a>
      					<a class="dropdown-item" href="#">114</a>
      					<a class="dropdown-item" href="#">115</a>
      					<a class="dropdown-item" href="#">116</a>
      					<a class="dropdown-item" href="#">117</a>
    				  </div><!--/.dropdown-menu-->
            </div><!--/.btn-group-->
            <div class="btn-group">
    				  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">BY COLLEGE</button>
    				  <div class="dropdown-menu">
      					<a class="dropdown-item" href="#">CCS</a>
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

    </div><!--/.container mainContainer-->
    <br />
    <div class="bg-success text-white">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mt-3">
            <p class="text-center text-white" style="font-size:0.7rem;">© Copyright 2017 Phantom Five Dev Team - All rights reserved. </p>
          </div><!--/.col-md-12 mt-3-->
        </div><!--/.row-->
      </div><!--/.container-->
    </div><!--/.bg-success text-white-->
    <?php include 'navbarStlye.html'; ?>
  </body>
  <script type="text/javascript" class="init">
    $(document).ready(function(){
      $('body').bootstrapMaterialDesign();
      initScreen();
      readyPendingStudents();
    });

    function readyPendingStudents(){
      var restUrl = "http://localhost:8080/profsmatodb/students?filter={'status':'pending'}";
      $.ajax({
        type: "GET",
        url: restUrl,
        dataType: "json",
        success: function(response){
          var a = response._embedded;
          var studentData = '<div class="row mb-3">'
                          + '<div class="col-md-12">'
                          + '<div class="table-responsive">'
                          + '<table class="table table-hover table-bordered nowrap material-shadow" cellspacing="0" width="100%" id="yutangina">'
                          + '<thead class="thead-inverse">'
                          + '<tr><th>ID Number</th><th>Username</th><th>Last Name</th><th>First Name</th><th>Email</th><th>College</th><th>Approval</th></tr><tbody>';
          for(var i = 0; i < a.length; i++){
            var b = "";
            if((i + 1) % 2 == 0){
              b = "even";
            }else{
              b = "odd";
            }
            studentData += '<tr>'
                         + '<td>' + a[i].idnum + '</td>'
                         + '<td>' + a[i].username + '</td>'
                         + '<td>' + a[i].lastname + '</td>'
                         + '<td>' + a[i].firstname + '</td>'
                         + '<td>' + a[i].email + '</td>'
                         + '<td>' + a[i].college + '</td>'
                         + '<td><button class="btn btn-primary" onclick=\'accept("' + a[i]._id.$oid + '", "' + a[i].username + '")\'>Approve</button><button class="btn btn-danger" onclick=\'reject("' + a[i]._id.$oid + '", "' + a[i].username + '")\'>Reject</button></td>'
                         + '</tr>';
          }
          studentData += '</tbody></table></div></div></div>';
          $('#datatable').html(studentData);
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

    function accept(objId, username){
      console.log("Accept: " + username);
      $.ajax({
        type: "PATCH",
        url: "http://localhost:8080/profsmatodb/students/" + objId,
        contentType: "application/json",
        data: '{"status":"active"}',
        complete: function(jqXHR, exception){
          console.log(jqXHR);
          if(jqXHR.status == 200){
            console.log("OK");
            window.location.reload(true);
          }else{
            console.log("ERROR");
          }
        }
      });
    }

    function reject(objId, username){
      console.log("Reject: " + username);
      $.ajax({
        type: "DELETE",
        url: "http://localhost:8080/profsmatodb/students/" + objId,
        contentType: "application/json",
        complete: function(jqXHR, exception){
          console.log(jqXHR);
          if(jqXHR.status == 204){
            console.log("OK");
            window.location.reload(true);
          }else{
            console.log("ERROR");
          }
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
