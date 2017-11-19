<?php
session_start();

if(isset($_SESSION['isLogin'])){
  header("Location: loginLogic.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <?php include 'styleInclude.html' ?>
    <style>
      body {
        background: url("/com.phantomfive.profsmato/assets/designs/loginwallpaper.jpg");
      }

      #signupcard {
        background: rgba(76, 175, 80, 0.95)!important;
        margin: auto;
        margin-top: 0%;
      }

      #signupcardfooter {
        background: rgba(0, 130, 0, 0.0);
        margin: auto;
      }

      /*! Fixes the dark grey color of placeholder text in input boxes  */
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
    <div class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <div class="card text-white p-5 bg-success" id="signupcard">
              <img src="/com.phantomfive.profsmato/assets/designs/logobanner.png" style="width:100%;">
              <div class="card-body">
                <div id="error"></div>
                <!--
                <form action="#" method="post">
                </form>
                -->
                <div class="form-group">
                  <label class="text-white">Username</label>
                  <input type="text" class="form-control text-white" name="username" required autofocus id="u">
                </div><!--/.form-group-->
                <div class="form-group">
                  <label class="text-white">First Name</label>
                  <input type="text" class="form-control text-white" name="firstname" required id="f">
                </div><!--/.form-group-->
                <div class="form-group">
                  <label class="text-white">Last Name</label>
                  <input type="text" class="form-control text-white" name="lastname" required id="l">
                </div><!--/.form-group-->
                <div class="form-group">
                  <label class="text-white">Password</label>
                  <input type="password" class="form-control text-white" name="password" id="pw1" required>
                </div><!--/.form-group-->
                <!--<div class="form-group">
                  <label class="text-white">Confirm Password</label>
                  <input type="password" class="form-control text-white" name="password2" id="pw2" required>
                </div>/.form-group-->
                <div class="form-group">
                  <label class="text-white">Email Address(DLSU E-mail only)</label>
                  <input type="email" class="form-control text-white" name="email" required id="e">
                </div><!--/.form-group-->
                <div class="form-group">
                  <label class="mr-sm-2 text-white" for="college">College</label>
                  <select class="custom-select mb-2 mr-sm-2 mb-sm-0" name="college" required id="col">
                    <option selected value="" disabled>Choose...</option>
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
                  <label class="text-white">Course</label>
                  <input type="text" class="form-control text-white" name="course" required id="co">
                </div><!--/.form-group-->
                <div class="form-group">
        				  <label class="mr-sm-2 text-white" for="idnum">ID Number</label>
        				  <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="idnum" name="idnum" required>
          					<option selected value="">Choose...</option>
          					<option value="111">111</option>
          					<option value="112">112</option>
          					<option value="113">113</option>
          					<option value="114">114</option>
          					<option value="115">115</option>
          					<option value="116">116</option>
          					<option value="117">117</option>
          				</select>
                </div><!--/.form-group-->
                <br />
                <button class="btn btn-md btn-secondary btn-raised" onclick="signUpFunction(u.value, f.value, l.value, pw1.value, e.value, col.value, co.value, idnum.value)">Submit</button>
                <a href="Login"><button class="btn btn-md btn-secondary btn-raised">LOGIN</button></a>
              </div><!--/.card-body-->
            </div><!--/#signupcard-->
          </div><!--/.col-md-6-->
        </div><!--/.row-->
      </div><!--/.container-->
    </div><!--/.py-5-->
  </body>
  <script>
    function signUpFunction(username, firstName, lastName, p1, email, college, course, id){
      if(username == "" || firstName == "" || lastName == "" || p1 == "" || email == "" || college == "" || course == "" || id == ""){
        $('#error').html("<h4>Please Enter All Fields</h4>");
      }else{
        if(!email.endsWith("@dlsu.edu.ph")){
          $('#error').html("<h4>Enter Valid DLSU E-mail</h4>");
        }else{
          $('#error').html("");
          var rest = "http://localhost:8080/profsmatodb/students";
          var restBody = '{"username":"' + username + '", "password":"' + p1 + '", "email":"' + email + '", "lastname":"' + lastName + '", "firstname":"' + firstName + '", "contacts":[{}], "college":"' + college + '", "course":["", "' + course + '"], "usertype":"normal", "aboutme":"", "profilepic":"default.png", "status":"pending"}';
          console.log(restBody);
          $.ajax({
            type: "POST",
            url: rest,
            processData: false,
            contentType: "application/json",
            data: restBody,
            complete: function(jqXHR, exception){
              console.log(jqXHR.status);
              console.log(jqXHR.responseText);

              if(jqXHR.status == 201){
                $('#error').html("<h4>Successfully Registered! Wait for your account to be approved</h4>");
                $('#u').val('');
                $('#f').val('');
                $('#l').val('');
                $('#pw1').val('');
                $('#pw2').val('');
                $('#e').val('');
                $('#col').val('');
                $('#co').val('');
                $('#idnum').val('');
                $("html, body").animate({ scrollTop: 0 }, "slow");
              }
              else if(jqXHR.status == 409){
                $('#error').html("<h4>Username or Email is already taken.</h4>");
              }
            }
          });
        }
      }
      /*
      if(username == "" || firstName == "" || lastName == "" || p1 == "" || p2 == "" || email = "" || college == "" || course == "" || id == ""){
        console.log("Missing Values");
      }
      */
    }
  </script>
</html>
