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
      padding-top: 1rem;
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
  </head>
  <body>
    <?php include 'navbarInclude.php'; ?>
    <br /><br />
    <div class="container mainContainer">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#" id="proflink"></a></li>
    	  <li class="breadcrumb-item active" id="reviewerName"></li>
      </ol><!--/.breadcrumb-->
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header bg-success text-white" id="reviewerTitle">Review Title</div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-2" style="max-width: 4rem;">
          				<p class="card-text"><img class="rounded-circle" id="poster" style="width:55px;"></p>
          			</div><!--/.col-md-2-->
                <div class="col-md-10">
                  <text id="reviewerName2">Temp Poster</text>
                  <p class="card-text" id="ratingStars">
            				<i class="fa fa-star"></i>
            				<i class="fa fa-star"></i>
            				<i class="fa fa-star"></i>
            				<i class="fa fa-star"></i>
            				<i class="fa fa-star"></i>
            			</p><br>
                  <p style="margin: auto; text-align:justify;" id="reviewBody">
                    Review Body here.
            			</p><!--/#reviewBody-->
                  <div>
                    <br />
                    <div class="row">
                      <div class="col-md-6">
            						<text class="text-secondary">Was this review helpful? &nbsp;</text>
                        <div id="thumbs"></div><!--/#thumbs-->
            					</div><!--/.col-md-6-->
                    </div><!--/.row-->
                  </div><!--/helpful button-->
                </div><!--/.col-md-10-->
              </div><!--/.row-->
            </div><!--/.card-body-->
          </div><!--/.card-->
        </div><!--/.col-md-12-->
      </div><!--/.row-->
      <br />
      <div class="row">
        <div class="col-md-12">
          <div class="card text-white mb-3">
            <div class="card-header text-white bg-success">Add your comment</div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
    						  <div class="form-group">
      							<label for="exampleFormControlTextarea1">Type your comment here</label>
      							<textarea class="form-control" id="commenting" rows="3"></textarea>
    						  </div><!--/.form-group-->
    						  <button type="button" class="btn btn-primary btn-raised" onclick="postComment()">Submit</button>
                </div><!--/.col-md-12-->
              </div><!--/.row-->
            </div><!--/.card-body-->
    			</div><!--/.card text-white mb-3-->
    		</div><!--/.col-md-12-->
    	</div><!--/.row-->
      <div class="row">
        <div class="col-md-12">
          <div class="card mb-3">
            <div class="card-header text-white bg-success">Comments</div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div id="comments"></div>
                </div><!--/.col-md-12-->
              </div><!--/.row-->
            </div><!--/.card-body-->
          </div><!--/.card mb-3-->
        </div><!--/.col-md-12-->
      </div><!--/.row-->
      <br />
      <div>
        <div class="container">
          <p class="text-center text-black" style="margin-left:0px;!important">© Copyright 2017 Phantom Five Dev Team, all rights reserved. </p>
        </div>
      </div>
    </div><!--/.container-->
    <?php include 'navbarStlye.html'; ?>
  </body>
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
          $('#reviewStudentName').html(firstName + " " + lastName);
          $('#profilepicture').attr('src', imageSrc);
          $('#picture2').attr('src', imageSrc);
          $('#first').html(firstName);
        },
        error: function(jqXHR, exception){
          console.log(jqXHR);
        }
      });

      loadProfInfo();
      loadReview();
      loadComments();
    });

    function postComment(){
      var me = "<?php echo $_SESSION['username']; ?>";
      var reviewId = "<?php echo $_GET['reviewid']; ?>";
      var body = $('#commenting').val();
      var restComment = "http://localhost:8080/profsmatodb/comments";
      var restBody = '{"reviewid":"'+reviewId+'","commentstudent":"'+me+'", "body":"'+body+'","$currentDate":{"timestamp":true},"reply":[]}';
      $.ajax({
        type: "POST",
        url: restComment,
        processData: false,
        contentType: "application/json",
        data: restBody,
        complete: function(jqXHR, exception){
          if(jqXHR.status == 201){
            loadComments();
            $('#commenting').val("");
          }else{
            console.log(jqXHR);
          }
        }
      });
    }

    function loadComments(){
      var reviewObjId = "<?php echo $_GET['reviewid']; ?>";
      var restComment = "http://localhost:8080/profsmatodb/comments?filter={'reviewid':'" + reviewObjId + "'}";
      $.ajax({
        type: "GET",
        url: restComment,
        dataType: "json",
        success: function(response){
          if(response._returned == 0){
            $('#comments').html("<h3>No Comments yet. Be the first to comment!</h3>");
          }
          response = response._embedded;
          var commentHtml = '';
          for(var i = 0; i < response.length; i++){
            //console.log("i = " + i);
            commentHtml += '<a href="#"><b>'+response[i].commentstudent+'</b></a>'
                         + '<div class="review-comment">'
                         + '<p>'+response[i].body+'</p>'
                         + '<div class="review-subcomment" id="view'+response[i]._id.$oid+'">';
            //if(response[i].reply.length != 0){
              for(var j = 0; j < response[i].reply.length; j++){
                //console.log("j = " + j);
                var comment = response[i].reply[j];
                commentHtml += '<p>'
                             + '<a href="#"><b>&nbsp;'+comment.replystudent+' </b></a>'
                             + '<div class="review-subsubcomment"><p style="line-height: 0%;">'+comment.replybody+'</p></div>'
                             + '</p>';
              }//for loop j;
            //}
            commentHtml += '</div><!--/.review-subcomment--></div><!--/.review-comment-->'
                         + '<a href="#!"><p stlye="line-height: 20%">Reply </p></a>';
                         //+ '<p onclick=viewSubs("sub'+response[i]._id.$oid+'")><a href="#!" id="view'+response[i]._id.$oid+'"><i class="fa fa-reply-all" aria-hidden="true" style="transform: scale(-1, -1);"></i>View '+response[i].reply.length+' replies</a></p><hr />';
          }//for loop i;
          //console.log(response);
          //console.log(commentHtml);
          $('#comments').html(commentHtml);
        },
        error: function(jqXHR, exception){
          console.log(jqXHR);
        }
      });

    }

    function viewSubs(sub){
      /*
      var view = '#view' + sub;
      sub = '#' + sub;
      $(view).toggle();
      var x = $(sub).html();
      if($(view).is(':visible')){
        x = x.replace("View", "Hide");
      }else{
        x = x.replace("Hide", "View");
      }
      $(sub).html(x);
      */
    }

    function like(profid, poster){
      //console.log("I LIKE " + poster + "'s Review'");
      var me = "<?php echo $_SESSION['username']; ?>";
      var data = '{"$push":{"likes":"'+me+'"},"$pull": {"dislikes":"'+me+'"}}';
      var rest = "http://localhost:8080/profsmatodb/reviews/<?php echo $_GET['reviewid']; ?>";
      $.ajax({
        type: "PATCH",
        url: rest,
        contentType: "application/json",
        data: data,
        complete: function(jqXHR, exception){
          if(jqXHR.status = 200){
            loadReview();
          }else{
            console.log(jqXHR);
          }
        }
      });
    }

    function dislike(profid, poster){
      //console.log("I DISLIKE " + poster + "'s Review'");
      var me = "<?php echo $_SESSION['username']; ?>";
      var data = '{"$push":{"dislikes":"'+me+'"},"$pull": {"likes":"'+me+'"}}';
      var rest = "http://localhost:8080/profsmatodb/reviews/<?php echo $_GET['reviewid']; ?>";
      $.ajax({
        type: "PATCH",
        url: rest,
        contentType: "application/json",
        data: data,
        complete: function(jqXHR, exception){
          if(jqXHR.status = 200){
            loadReview();
          }else{
            console.log(jqXHR);
          }
        }
      });
    }

    function loadReview(){
      var reviewId = "<?php echo $_GET['reviewid']; ?>";
      $.ajax({
        type: "GET",
        url: "http://localhost:8080/profsmatodb/reviews/" + reviewId,
        dataType: "json",
        success: function(response){
          var ra = "";
          if(response.rating == 1){
            ra += '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
          }else if(response.rating == 2){
            ra += '<i class="fa fa-star"></i><i class="fa fa-star></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
          }else if(response.rating == 3){
            ra += '<i class="fa fa-star"></i><i class="fa fa-star></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
          }else if(response.rating == 4){
            ra += '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>';
          }else if(response.rating == 5){
            ra += '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';
          }

          var thumbs = '<i class="fa fa-thumbs-up fa-2x" onclick=like('+response.profid+',"'+response.studentusername+'")></i><text>'+response.likes.length+' </text><i class="fa fa-thumbs-down fa-2x" onclick=dislike('+response.profid+',"'+response.studentusername+'")></i><text>'+response.dislikes.length+' </text>';

          if(response.likes.indexOf("<?php echo $_SESSION['username'] ?>") != -1){
            thumbs = '<i class="fa fa-thumbs-up fa-2x color-like"></i><text>'+response.likes.length+' </text><i class="fa fa-thumbs-down fa-2x" onclick=dislike('+response.profid+',"'+response.studentusername+'")></i><text>'+response.dislikes.length+' </text>';
          }

          if(response.dislikes.indexOf("<?php echo $_SESSION['username'] ?>") != -1){
            thumbs = '<i class="fa fa-thumbs-up fa-2x" onclick=like('+response.profid+',"'+response.studentusername+'")></i><text>'+response.likes.length+' </text><i class="fa fa-thumbs-down fa-2x color-dislike"></i><text>'+response.dislikes.length+' </text>';
          }

          $('#reviewerName').html(response.studentusername + "'s Review");
          $('#reviewerName2').html(response.studentusername);
          $('#reviewerTitle').html(response.title);
          $('#reviewBody').html(response.body);
          $('#ratingStars').html(ra);
          $('#thumbs').html(thumbs);
          $('#poster').attr('src', "/com.phantomfive.profsmato/assets/studentpic/" + response.profile);
        },
        error: function(jqXHR, exception){
          console.log(jqXHR);
        }
      });
    }

    function loadProfInfo(){
      var profid = <?php echo $_GET['profid']; ?>;
      $.ajax({
        type: "GET",
        url: "http://localhost:8080/profsmatodb/professors?filter={'profid':" + profid + "}",
        dataType: "json",
        success: function(response){
          response = response._embedded;
          var link = "/com.phantomfive.profsmato/College/<?php echo $_GET['college']."/".$_GET['department']."/".$_GET['profid'] ?>";
          $('#proflink').html(response[0].lastname + " " + response[0].firstname);
          $('#proflink').attr('href', link);
        },
        error: function(jqXHR, exception){
          console.log(jqXHR);
        }
      });
    }
  </script>
</html>
