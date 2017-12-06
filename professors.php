<?php
session_start();

if(!isset($_SESSION['isLogin'])){
  header("Location: Login");
}
if($_SESSION['userType'] != "normal"){
  header("Location: Admin");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profsmato</title>
    <?php include 'styleInclude.html';?>
    <style>
      .mainContainer {
    	  padding-top: 2rem !important;
    	}

    	.fa-star, .fa-star-half-o, .fa-star-o {
    		color: #f2b01e;
    	}

    	.fa-star-o:hover {
    		color: #f2b01e;
    	}

    	.fa-thumbs-down:hover {
    		color: #EA0034;
    	}

    	.fa-thumbs-up:hover {
    		color: #4286f4;
    		direction: rtl;
    	}

    	.color-like {
    		color: #4286f4;
    	}

    	.color-dislike {
    		color: #EA0034;
    	}


    	textarea::-webkit-input-placeholder {
    		color: rgba(0,0,0,0.2) !important;
    	}

    	textarea{
    	  box-sizing: border-box;
    	  resize: none;
    	}
    </style>
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
  </head>
  <body>
    <?php include 'navbarInclude.php'; ?>
    <br />
    <div class="container mainContainer">
      <div class="row">
        <div class="col-md-4">
          <div class="row">
            <div class="col-md-12">
              <div class="card mb-3">
                <div class="card-header text-center" style="background-image:url(/com.phantomfive.profsmato/assets/designs/greenwaves.jpg);background-size: 100%;">
                  <img id="profpic" class="rounded-circle" src="" style="width:128px;border: 3px solid white;box-shadow: 2px 2px 15px black;">
                </div><!--/.card-header-->
                <div class="card-body">
                  <h4 class="card-title" id="profname">Name</h4>
                  <p class="card-text"><i class="fa fa-graduation-cap fa-fw"></i> <span id="profCol"></span></p>
                  <p class="card-text"><i class="fa fa-users fa-fw"></i> <span id="profDept"></span></p><br />
                  <button type="button" class="btn btn-primary btn-raised" style="width: 100%; height: 100%; font-size: 15px; margin: auto;" data-toggle="modal" data-target="#exampleModal">Add a review</button>
                  <div class="modal fade" id="exampleModal">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="card-header bg-success text-white">
                          <div class="row">
                            <div class="col-md-2" style="max-width: 4rem;"><i class="fa fa-pencil-square-o fa-3x"></i></div>
                            <div class="col-md-10">
                              <h5><p style="margin: auto;">Rate and Review</p></h5>
                              <p style="margin: auto; color: rgba(255,255,255,0.7); white-space:nowrap; overflow: hidden; text-overflow: ellipsis;" id="nama"></p>
                            </div><!--/.col-md-10-->
                          </div><!--/.row-->
                        </div><!--/.card-header-->
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-2" style="max-width: 4rem;"><p class="card-text"><img class="rounded-circle" alt="Generic placeholder image" style="width:3rem;" id="picture2"></p></div>
                            <div class="col-md-10">
                              <text id="reviewStudentName"></text>
                              <p style="color: rgba(0,0,0,0.5);">Your review will be posted publicly on the web.</p>
                              <div class="form-group">
                                <label for="rating" class="text-black">Rating:</label>
                                <select class="custom-select" name="rating" id="rating">
                                  <option value="1.0" selected id="default">1 Star</option>
                                  <option value="2.0">2 Stars</option>
                                  <option value="3.0">3 Stars</option>
                                  <option value="4.0">4 Stars</option>
                                  <option value="5.0">5 Stars</option>
                                </select>
                              </div><!--form-group-->
                              <div class="form-group">
                                <label for="title" class="text-black">Title:</label>
                                <textarea class="form-control pt=3" id="title" name="title" data-autoresize rows="1" placeholder="Title here" style="line-height: 140%;"></textarea>
                              </div><!--form-group-->
                              <div class="form-group">
                                <label for="reviewText" class="text-black">Review:</label>
                                <textarea class="form-control pt=3" id="reviewText" name="reviewText" data-autoresize rows="1" placeholder="Write your review here" style="line-height: 140%;"></textarea>
                              </div><!--/.form-group-->
                              <div id="errMsg"></div>
                            </div><!--/.col-md-10-->
                          </div><!--/.row-->
                        </div><!--/.card-body-->
                        <div class="card-footer text-right">
              						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              						<button type="button" class="btn btn-primary" onclick="postReview()">Post</button>
            					  </div><!--/.card-footer-->
                      </div><!--/.modal-content-->
                    </div><!--/.modal-dialog-->
                  </div><!--/#exampleModal-->
                </div><!--/.card-body-->
              </div><!--/.card mb-3-->
            </div><!--/.col-md-12-->
            <div class="col-md-12">
              <div class="card mb-3">
                <div class="card-header bg-success text-white" style="height: 100%;"><h4>Email</h4></div>
                <div class="card-body">
                  <p class="card-text"><i class="fa fa-envelope fa-lg" aria-hidden="true"></i> <span id="profE"></span></p>
                </div><!--/.card-body-->
              </div><!--/.card mb-3-->
            </div><!--/.col-md-12-->
            <div class="col-md-12">
              <div class="card mb-3">
                <div class="card-header bg-success text-white" style="height: 100%;"><h4>Courses</h4></div>
                <div class="card-body" id="subjects">
                </div><!--/.card-body-->
              </div><!--/.card-mb-3-->
            </div><!--/.col-md-12-->
          </div><!--/.row-->
        </div><!--/.col-md-4-->
        <div class="col-md-8">
          <div class="card text-white mb-3" style="">
            <div class="card-header bg-success"><h4>Information</h4></div>
            <div class="card-body text-black">
              <div id="aboutProf">
                <h4 class="card-title">About Prof </h4>
                <p class="card-text" id="aboutprof"></p>
              </div>
              <br />
              <div>
                <p class="card-text rating" id="pstar">
        			    <span><i class="fa fa-star"></i></span>
          				<span><i class="fa fa-star"></i></span>
          				<span><i class="fa fa-star"></i></span>
          				<span><i class="fa fa-star"></i></span>
          				<span><i class="fa fa-star-half-o"></i></span>
        			  </p>
                <p class="text-secondary" id="profRate"></p>
              </div>
              <br />
              <div>
                <h4 class="card-title">Student Reviews(Recent Posts)</h4>
                <div id="studentReviewBlock"></div><!--/#studentReviewBlock-->
              </div><!--/.review part-->
            </div><!--/.card-body-->
          </div><!--/.card-->
        </div><!--/.col-md-8-->
      </div><!--/.row-->
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
    <?php include 'navbarStlye.html'; ?>
  </body>
  <script>
    $(document).ready(function(){
      initScreen();
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
          $('#reviewStudentName').html(firstName + " " + lastName);
          $('#profilepicture').attr('src', imageSrc);
          $('#picture2').attr('src', imageSrc);
          $('#first').html(firstName);
        },
        error: function(jqXHR, exception){
          console.log(jqXHR);
        }
      });
      loadReviews();
      loadAvg();
    });

    function loadAvg(){
      var profid = <?php echo $_GET['profid']; ?>;
      $.ajax({
        type: "GET",
        url: "http://localhost:8080/profsmatodb/reviews?filter={'profid':"+profid+"}",
        dataType: "json",
        success: function(response){
          response = response._embedded;
          var rate1 = 0;
          var rate2 = 0;
          var rate3 = 0;
          var rate4 = 0;
          var rate5 = 0;
          for(var i = 0; i < response.length; i++){
            if(response[i].rating == 1){rate1++;}
            if(response[i].rating == 2){rate2++;}
            if(response[i].rating == 3){rate3++;}
            if(response[i].rating == 4){rate4++;}
            if(response[i].rating == 5){rate5++;}
          }
          rate1 = rate1*1;
          rate2 = rate2*2;
          rate3 = rate3*3;
          rate4 = rate4*4;
          rate5 = rate5*5;
          var sum = rate1 + rate2 + rate3 + rate4 + rate5;
          var rate = Math.floor((sum/response.length) * 10) / 10;
          if(isNaN(rate)){
            rate = 0;
          }
          $('#profRate').html(rate + " out of 5 stars");

          var stars = "";
          if(rate < 0.5){
            stars = '<i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
          }else if(rate < 1){
            stars = '<i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
          }else if(rate < 1.5){
            stars = '<i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
          }else if(rate < 2){
            stars = '<i class="fa fa-star"></i><i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
          }else if(rate < 2.5){
            stars = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
          }else if(rate < 3){
            stars = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
          }else if(rate < 3.5){
            stars = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
          }else if(rate < 4){
            stars = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i>';
          }else if(rate < 4.5){
            stars = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>';
          }else if(rate < 5){
            stars = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i>';
          }else{
            stars = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';
          }
          $('#pstar').html(stars);
        },
        error: function(jqXHR, exception){
          console.log(jqXHR);
        }
      });
    }


    function like(profid, poster){
      var me = "<?php echo $_SESSION['username']; ?>";
      var rest = 'http://localhost:8080/profsmatodb/reviews?filter={"profid":'+profid+'}&filter={"studentusername":"'+poster+'"}';
      //console.log("Rest: " + rest);
      var reviewData = 'http://localhost:8080/profsmatodb/reviews/';
      var data = '{"$push":{"likes":"'+me+'"},"$pull": {"dislikes":"'+me+'"}}';
      $.ajax({
        type: "GET",
        url: rest,
        dataType: "json",
        success: function(response){
          reviewData += response._embedded[0]._id.$oid;
          //console.log(reviewData);
          $.ajax({
            type: "PATCH",
            url: reviewData,
            contentType: "application/json",
            data: data,
            complete(jqXHR, exception){
              //console.log(jqXHR);
              if(jqXHR.status == 200){
                loadReviews();
              }
            }
          });
        },error: function(jqXHR, exception){
          console.log(jqXHR);
        }
      });
      /*
      console.log("I Like this Post");
      console.log("Prof: " + profid);
      console.log("User: " + poster);
      */
    }

    function dislike(profid, poster){
      var me = "<?php echo $_SESSION['username']; ?>";
      var rest = 'http://localhost:8080/profsmatodb/reviews?filter={"profid":'+profid+'}&filter={"studentusername":"'+poster+'"}';
      //console.log("Rest: " + rest);
      var reviewData = 'http://localhost:8080/profsmatodb/reviews/';
      var data = '{"$push":{"dislikes":"'+me+'"},"$pull": {"likes":"'+me+'"}}';
      $.ajax({
        type: "GET",
        url: rest,
        dataType: "json",
        success: function(response){
          reviewData += response._embedded[0]._id.$oid;
          //console.log(reviewData);
          $.ajax({
            type: "PATCH",
            url: reviewData,
            contentType: "application/json",
            data: data,
            complete(jqXHR, exception){
              //console.log(jqXHR);
              if(jqXHR.status == 200){
                loadReviews();
              }
            }
          });
        },error: function(jqXHR, exception){
          console.log(jqXHR);
        }
      });
      /*
      console.log("I Disike this Post");
      console.log("Prof: " + profid);
      console.log("User: " + poster);
      */
    }

    function postReview(){
      var rate = $('#rating').val();
      var profid = <?php echo $_GET['profid']; ?>;
      var studentusername = "<?php echo $_SESSION['username']; ?>";
      var img = "<?php echo $_SESSION['image']; ?>";
      var title = $('#title').val();
      var reviewText = $('#reviewText').val();
      rate = parseFloat(rate, 10);

      if(title == "" || reviewText == ""){
        $('#errMsg').html("<h4>Title or Review is empty...</h4>");
      }else{
        var restBody = '{"profid":' + profid + ',"studentusername":"' + studentusername + '","rating":' + rate + ' ,"title":"' + title + '","body":"' + reviewText + '","$currentDate": {"timestamp": true},"likes":[], "dislikes":[],"profile":"' + img + '"}';
        $.ajax({
          type: "POST",
          url: "http://localhost:8080/profsmatodb/reviews",
          processData: false,
          contentType: "application/json",
          data: restBody,
          complete: function(jqXHR, exception){
            if(jqXHR.status == 201){
              $('#errMsg').html("<h4>Your Review has been posted!</h4>");
              $('#title').val("");
              $('#reviewText').val("");
              $('#rating').val("");
              $('#rating').val(0.5);
              loadReviews();
              loadAvg();
            }else if(jqXHR.status == 409){
              console.log(jqXHR);
              $('#errMsg').html("<h4>You have already posted your review...</h4>");
            }
          }
        });
      }
    }

    function initScreen(){
      var college = "<?php echo $_GET['college']; ?>";
      var profid = <?php echo $_GET['profid']; ?>;
      var department = "<?php echo $_GET['department']; ?>";
      var restProf = "http://localhost:8080/profsmatodb/professors?filter={'college':'" + college + "','departments':'" + department + "','profid':" + profid + "}";
      var profName = "";
      var profCollege = "";
      var profDepartment = "";
      var profEmail = "";
      var subjectsHtml = "";
      var profile = "/com.phantomfive.profsmato/assets/profpic/";
      $.ajax({
        type: "GET",
        url: restProf,
        dataType: "json",
        success: function(response){
          if(response._returned != 1){
            window.location.replace("/com.phantomfive.profsmato/Home");
          }else{
            response = response._embedded;
            profName = response[0].lastname + " " + response[0].firstname;
            profCollege = response[0].college;
            profDepartment = response[0].departments[1];
            profEmail = response[0].email;
            profile += response[0].profilepic;

            for(var i = 0; i < response[0].subjects.length; i++){
              subjectsHtml += '<p><img src="/com.phantomfive.profsmato/assets/designs/training-blank-128.png" width="24" height="24"><text class="card-text">' + response[0].subjects[i] + '</text></p>';
            }

            $('#profname').html(profName);
            $('#profCol').html(profCollege);
            $('#profDept').html(profDepartment);
            $('#subjects').html(subjectsHtml);
            $('#profpic').attr('src', profile);
            $('#aboutprof').html(response[0].aboutprof);
            $('#nama').html(profName);
            $('#profE').html(profEmail);
            $('#hiddenProfId').val(response[0].profid);
          }
        },
        error: function(jqXHR, exception){
          console.log(jqXHR);
        }
      });
    }

    function loadReviews(){
      var profid = <?php echo $_GET['profid']; ?>;
      profid = parseInt(profid);
      //console.log(profid);
      $.ajax({
        type: "GET",
        url: "http://localhost:8080/profsmatodb/reviews?filter={'profid':" + profid + "}&sort_by={'timestamp':-1}",
        dataType: "json",
        success: function(response){
          var review = '<div class="row">';
          response = response._embedded;
          for(var i = 0; i < response.length; i++){
            var ra = '<p class="card-text">';
            if(response[i].rating == 0.5){
              ra += '<i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
            }else if(response[i].rating == 1.0){
              ra += '<i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
            }else if(response[i].rating == 1.5){
              ra += '<i class="fa fa-star"></i><i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
            }else if(response[i].rating == 2.0){
              ra += '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
            }else if(response[i].rating == 2.5){
              ra += '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
            }else if(response[i].rating == 3.0){
              ra += '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
            }else if(response[i].rating == 3.5){
              ra += '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i>';
            }else if(response[i].rating == 4.0){
              ra += '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>';
            }else if(response[i].rating == 4.5){
              ra += '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i>';
            }else if(response[i].rating == 5.0){
              ra += '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';
            }
            ra += '</p>';

            var thumbs = '<div style="text-align: right"><text class="text-secondary">Was this helpful? </text><i class="fa fa-thumbs-up fa-2x" onclick=like('+response[i].profid+',"'+response[i].studentusername+'")></i><text> </text><div class="fa fa-thumbs-down fa-2x" onclick=dislike('+response[i].profid+',"'+response[i].studentusername+'")></div></div></div>';

            if(response[i].likes.indexOf("<?php echo $_SESSION['username'] ?>") != -1){
              thumbs = '<div style="text-align: right"><text class="text-secondary">Was this helpful? </text><i class="fa fa-thumbs-up fa-2x color-like"></i><text> </text><div class="fa fa-thumbs-down fa-2x" onclick=dislike('+response[i].profid+',"'+response[i].studentusername+'")></div></div></div>';
            }

            if(response[i].dislikes.indexOf("<?php echo $_SESSION['username'] ?>") != -1){
              thumbs = '<div style="text-align: right"><text class="text-secondary">Was this helpful? </text><i class="fa fa-thumbs-up fa-2x" onclick=like('+response[i].profid+',"'+response[i].studentusername+'")></i><text> </text><div class="fa fa-thumbs-down fa-2x color-dislike"></div></div></div>';
            }

            review += '<div class="col-md-2" style="max-width: 4rem;"><p class="card-text"><a href=/com.phantomfive.profsmato/Students/' + response[i].studentusername + '><img class="rounded-circle" src="/com.phantomfive.profsmato/assets/studentpic/' + response[i].profile + '" alt="Generic placeholder image" style="width:55px;"></a></p></div>'
                    + '<div class="col-md-10"><text><a href="/com.phantomfive.profsmato/Students/' + response[i].studentusername + '">' + response[i].studentusername + '</a></text><text class="text-secondary"></text>'
                    + ra + '<br />'
                    + '<p style="margin: auto;">' + response[i].body + '<br /><a href='+ window.location.href + '/' + response[i]._id.$oid + '> Click here for full review</a></p>'
                    + thumbs;
                    //+ '<div style="text-align: right"><text class="text-secondary">Was this helpful? </text><i class="fa fa-thumbs-up fa-2x" onclick="like()"></i><text> </text><div class="fa fa-thumbs-down fa-2x" onclick="dislike"></div></div></div>';

          }
          review += "</div><!--/.row-->"
          $('#studentReviewBlock').html(review);
        },
        error: function(jqXHR, exception){
          console.log(jqXHR);
        }
      });
    }
  </script>
</html>
