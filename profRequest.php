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
      <h1 class="display-4">Professor Requests</h1>
      <div class="alert alert-info alert-dismissible fade show material-shadow" role="alert">
    	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    		<span aria-hidden="true">&times;</span>
    	  </button>
    	  <strong>Welcome to the Professor Requests module, admin!</strong> You should check in on some of those fields below.
    	</div><!--/.alert-->
      <div class="row mb-3">
        <div class="col-md-6">
          <div class="input-group">
  				  <input type="text" class="form-control" placeholder="Search the table" id="searchpogi">
  				  <span class="input-group-addon"><a href="#" class="text-success"><i class="fa fa-search" aria-hidden="true"></i></a></span>
  				</div><!--/.input-group-->
          <br class="d-md-none d-lg-none" />
        </div><!--/.col-md-6-->
        <!--
        <div class="col-md-6">
        </div><!--/.col-md-6-->
      </div><!--/.row mb-3-->
      <div class="row mb-3">
        <div class="col-md-12">
          <div class="table-responsive">
            <table class="table table-hover table-bordered nowrap material-shadow" cellspacing="0" width="100%" id="yutangina">
              <thead class="thead-inverse">
                <tr>
                  <th>Prof ID Num</th>
                  <th>Name</th>
                  <th>College</th>
                  <th>E-mail</th>
                  <th>Approval</th>
                </tr>
              </thead><!--/.thead-inverse-->
              <tbody id="pendingProf">
              </tbody>
            </table><!--/#yutangina-->
          </div><!--/.table-responsive-->
        </div><!--/.col-md-12-->
      </div><!--/.row mb-3-->
      <br /><hr />
      <div>
        <div class="container">
          <p class="text-center text-black" style="margin-left:0px;!important">© Copyright 2017 Phantom Five Dev Team, all rights reserved. </p>
        </div>
      </div>
    </div><!--/.mainContainer-->
    <?php include 'navbarStlye.html'; ?>
  </body>
  <script>

  $(document).ready(function(){
    $('body').bootstrapMaterialDesign();
    initScreen();
    getPendingProf();
  });

  function getPendingProf(){
    var rest = "http://localhost:8080/profsmatodb/professors?filter={'status':'pending'}";
    $.ajax({
      type: "GET",
      url: rest,
      dataType: "json",
      success:function(response){
        response = response._embedded;
        var prof = '';
        for(var i = 0; i < response.length; i++){
          prof += '<tr>'
                + '<td>' + response[i].profid + '</td>'
                + '<td>' + response[i].lastname + ' ' + response[i].firstname + '</td>'
                + '<td>' + response[i].college + '</td>'
                + '<td>' + response[i].email + '</td>'
                + '<td><button class="btn btn-primary" onclick=acceptProf("' + response[i]._id.$oid + '")>Approve</button><button class="btn btn-danger" onclick=rejectProf("' + response[i]._id.$oid + '")>Reject</button></td>'
                + '</tr>';
        }
        $('#pendingProf').html(prof);

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
      },
      error: function(jqXHR, exception){
        console.log(jqXHR);
      }
    });
  }

  function acceptProf(profObjId){
    var restAccept = "http://localhost:8080/profsmatodb/professors/" + profObjId;
    $.ajax({
      type: "PATCH",
      url: restAccept,
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

  function rejectProf(profObjId){
    var restReject = "http://localhost:8080/profsmatodb/professors/" + profObjId;
    $.ajax({
      type: "DELETE",
      url: restReject,
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
