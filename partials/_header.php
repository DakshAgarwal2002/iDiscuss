<?php
// session_start();
echo '<nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark border-bottom border-body" data-bs-theme="dark">
<div class="container-fluid">
    <a class="navbar-brand" href="index.php">iDiscuss</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact us</a>
        </li>
      </ul>';
      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
        echo '<form class="d-flex my-2 my-lg-0" method="get" action="search.php">
          <input class="form-control me-2" name="search" type="search" actiion="search.php" placeholder="Search" aria-label="Search">
          <button class="btn btn-success" type="submit">Search</button>
            <p class="text-white my-0 mx-2">Welcome '. $_SESSION['useremail']. ' </p>
            <a href="partials/_logout.php" class="btn btn-outline-success ml-2">Logout</a>
            </form>';
      }
      else{
        echo '<form class="d-flex" role="search" method="get" action="search.php">
        <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success" type="submit">Search</button>
      </form>
      <div class="mx-2">
      <button class="btn  btn-outline-success" data-bs-toggle="modal" data-bs-target="#loginModal">
      Login
      </button>
      <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#signupModal">
      Signup
      </button>';
      }
      
      echo '</div>
    </div>
</div>
</nav>';
include "partials/_loginModal.php";
include "partials/_signupModal.php";
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Success!</strong> You can now login
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>


