<?php
session_start();

if(isset($_SESSION['isLogin'])){
  header("Location: loginLogic.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include 'styleInclude.html' ?>
    <link rel="import" href="/com.phantomfive.profsmato/bower_components/iron-ajax/iron-ajax.html">
    <title>Profsmato</title>
    <style>
      body {
        background: url("/com.phantomfive.profsmato/assets/designs/loginwallpaper.jpg");
      }

      #logincard {
        background: rgba(76, 175, 80, 0.95)!important;
        margin: auto;
        margin-top: 0%;
      }

      #logincardfooter {
        background: rgba(0, 130, 0, 0.0);
        margin: auto;
      }

  	.form-control::placeholder {
  		color: white;
  		opacity: 1
  	}

  	input::-webkit-input-placeholder {
  		color: white;
  	}

  	::-webkit-input-placeholder {
  		color: white;
  	}

  	::-moz-placeholder {
  		color: white;
  	}

  	::-ms-placeholder {
  		color: white;
  	}

  	::placeholder {
  		color: white;
  	}

    </style>
  </head>
  <body>
    <iron-ajax
      id="loginQuery"
      url="http://localhost:8080/testdb/students"
      method="GET"
      handle-as="json"
      on-response="onSuccessFetch"
      debounce-duration="300">
    </iron-ajax>
    <div class="py-5">
      <div class="containter">
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <div class="card text-white p-5 bg-success" id="logincard">
              <img src="/com.phantomfive.profsmato/assets/designs/logobanner.png" style="width:100%;">
              <div class="card-body">
                <form action="loginLogic.php" method="post" id="loginForm">
                  <input type="hidden" value="" name="userType" id="userType">
                  <input type="hidden" value="" name="status" id="status">
                  <input type="hidden" value="" name="username" id="username">
                  <input type="hidden" value="" name="objId" id="objId">
                  <input type="hidden" value="" name="imagine" id="imagine">
                  <div id="errorMsg"></div>
                  <div class="form-group">
                    <label class="text-white">Email address</label>
                    <input type="email" class="form-control text-white" name="email" id="emailadd">
                    <!--<input type="email" class="form-control text-white" name="email" id="emailadd">-->
                  </div><!--/.form-group-->
                  <div class="form-group">
                    <label class="text-white">Password</label>
                    <input type="password" class="form-control text-white" name="pw" id="passw">
                  </div><!--/.form-group-->
                </form>
                <button type="button" class="btn btn-md btn-secondary btn-raised" id="btnlogin" onclick="loginBtn(emailadd.value, passw.value)">Login</button>
                <!--<a href="#" id="loginhref"><button type="button" class="btn btn-md btn-secondary btn-raised" id="btnlogin">Login</button></a>-->
                <a href="SignUp"><button class="btn btn-md btn-secondary btn-raised">SIGN UP</button></a>
              </div><!--/.card-body-->
              <div class="card-footer" id="logincardfooter" style="text-align:center;">Profsmato is brought to you by Phantom Five Dev Team, ©2017.</div>
            </div><!--/#logincard-->
          </div><!--/.col-md-6-->
        </div><!--/.row-->
      </div><!--/.container-->
    </div><!--/.py-5-->
  </body>
  <script src="https://unpkg.com/popper.js@1.12.5/dist/umd/popper.js" integrity="sha384-KlVcf2tswD0JOTQnzU4uwqXcbAy57PvV48YUiLjqpk/MJ2wExQhg9tuozn5A1iVw" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/bootstrap-material-design@4.0.0-beta.3/dist/js/bootstrap-material-design.js" integrity="sha384-hC7RwS0Uz+TOt6rNG8GX0xYCJ2EydZt1HeElNwQqW+3udRol4XwyBfISrNDgQcGA" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function(){
      $('body').bootstrapMaterialDesign();
    });

    function loginBtn(username, password){
      $.ajax({
        type: "GET",
        url: "http://localhost:8080/profsmatodb/students/?filter={'email': '" + username + "','password':'" + password +"'}",
        dataType: "json",
        success: function(response){
          if(response._returned == 1){
            response = response._embedded;
            var status = response[0].status;
            $('#userType').val(response[0].usertype);
            $('#status').val(response[0].status);
            $('#username').val(response[0].username);
            $('#objId').val(response[0]._id.$oid);
            $('#imagine').val(response[0].profilepic);
            if(status == "active"){
              $('#errorMsg').html('');
              $('#loginForm').submit();
            }else{
              $('#errorMsg').html('<h4>Account either Inactive or Pending</h4>');
              $('#emailadd').val("");
              $('#passw').val("");
            }
          }else{
            $('#errorMsg').html('<h4>Username or Password incorrect</h4>');
            $('#passw').val("");
          }
        },
        error: function(jqXHR, exception){
          console.log("Error");
          console.log(jqXHR.responseText);
          $('#errorMsg').html('<h4>Username or Password incorrect</h4>');
          $('#passw').val("");
        }
      });
    }
  </script>
</html>
