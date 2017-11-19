<nav class="navbar navbar-expand-md bg-success navbar-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="/com.phantomfive.profsmato/Home">Profsmato</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link text-white" href="/com.phantomfive.profsmato/College/CCS">CCS</a>
        </li><!--/.nav-item-->
        <li class="nav-item">
          <a class="nav-link text-white" href="/com.phantomfive.profsmato/College/COL">COL</a>
        </li><!--/.nav-item-->
        <li class="nav-item">
          <a class="nav-link text-white" href="/com.phantomfive.profsmato/College/CLA">CLA</a>
        </li><!--/.nav-item-->
        <li class="nav-item">
          <a class="nav-link text-white" href="/com.phantomfive.profsmato/College/COS">COS</a>
        </li><!--/.nav-item-->
        <li class="nav-item">
          <a class="nav-link text-white" href="/com.phantomfive.profsmato/College/GCOE">GCOE</a>
        </li><!--/.nav-item-->
        <li class="nav-item">
          <a class="nav-link text-white" href="/com.phantomfive.profsmato/College/COB">COB</a>
        </li><!--/.nav-item-->
        <li class="nav-item">
          <a class="nav-link text-white" href="/com.phantomfive.profsmato/College/SOE">SOE</a>
        </li><!--/.nav-item-->
        <li class="nav-item">
          <a class="nav-link text-white" href="/com.phantomfive.profsmato/College/CED">CED</a>
        </li><!--/.nav-item-->
      </ul><!--/.navbar-nav mr-auto-->
      <ul class="navbar-nav navbar-right">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" aria-expanded="false" aria-haspopup="true" data-toggle="dropdown" id="Preview" role="button"> <span id="fullname"></span> </a>
          <div class="dropdown-menu" aria-labelledby="Preview">
            <div style="text-align:center;">
              <img id="profilepicture" class="rounded-circle" src="" alt="" style="width: 64px;">
              <br /><text><span id="first"></span></text>
              <hr> </div>
            <a class="dropdown-item" href="/com.phantomfive.profsmato/Students/<?php echo $_SESSION['username']; ?>" id="profileLink">Profile</a>
            <a class="dropdown-item" href="/com.phantomfive.profsmato/logoutLogic.php">Logout</a>
          </div><!--/.dropdown-menu-->
        </li><!--/.nav-item dropdown"-->
      </ul><!--/.navbar-nav navbar-right-->
    </div><!--/.collapse navbar-collpase-->
  </div><!--/.containter-->
</nav>
<br />
