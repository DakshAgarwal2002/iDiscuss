<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <style>
    #ques {
        min-height: 433px;
    }
    </style>
    <title>Welcome to iDiscuss - Coding Forums</title>
</head>

<body>
    <?php include 'partials/_dbconnect.php';?>
    <?php include 'partials/_header.php';?>


    <?php
    $request=$_SERVER['REQUEST_METHOD'];
    $showalert=false;
    if($request=='POST'){
        $categoryTitle=$_POST['categoryTitle'];
    $message=$_POST['message'];
    // $user=$_SESSION['useremail'];
        //insert record into DB;
        $sql="INSERT INTO `categories` (`category_name`, `category_description`, `created`) VALUES ('$categoryTitle', '$message', current_timestamp());";
        $result=mysqli_query($conn,$sql);
        $showalert=true;
    }
    if($showalert){
        echo '<div class="alert alert-success" role="alert">
        Your category has been added successfully!;
      </div>';
    }
    ?>

    <!-- Slider starts here -->
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/slider-1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/1600x400/?life,coding" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/slider-3.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container my-2">
        <h1 class="text-center">iDiscuss - Categories</h1>
        <div class="row my-2">
            <?php $sql='SELECT * FROM `categories`';
          $result=mysqli_query($conn,$sql);
          
          while($row=mysqli_fetch_assoc($result)){
            $id=$row['category_id'];
            echo '<div class="col-md-4 my-4">
            <div class="card" style="width: 18rem;">
                <img src="https://source.unsplash.com/500x500/?' . $row['category_name'] . '" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">' . $row['category_name'] . '</h5>
                    <div class="card-text-div my-2" style="height: 70px;overflow-y: auto;">
                    <p class="card-text">' . $row['category_description']. '</p>
                    </div>
                    <a href="threadlist.php?catid=' . $id .'" class="btn btn-primary">Threads</a>
                </div>
            </div>
        </div>';
          }
          ?>

<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
{
    echo' <div class="col-md-4">
    <div class="card d-flex justify-content-center align-items-center bg-secondary text-white"
        style="width: 18rem;height:452px;">
        <button class="btn bg-secondary border-0 m-0 p-0 "  data-bs-toggle="modal" data-bs-target="#categoryModal">
            <h1 style="font-size:200px;font-weight:bolder;">+</h1>
        </button>
    </div>
</div>';
}
include 'partials/_categoryModal.php';
?>
        </div>
    </div>
    <?php include 'partials/_footer.php';?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
    </script>
</body>

</html>