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
    $id=$_GET['catid'];
    $sql="SELECT * FROM `categories` WHERE category_id=$id";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
        $catname=$row['category_name'];
        $catdescription=$row['category_description'];
    }
    
    $request=$_SERVER['REQUEST_METHOD'];
    $showalert=false;
    if($request=='POST'){
        $th_title=$_POST['thread_title'];
    $th_message=$_POST['thread_description'];
    $user=$_SESSION['useremail'];
        //insert record into DB;
        $sql="INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$th_title', '$th_message', '$id', '$user', current_timestamp());";
        $result=mysqli_query($conn,$sql);
        $showalert=true;
    }
    if($showalert){
        echo '<div class="alert alert-success" role="alert">
        Your thread has been added successfully!;
      </div>';
    }
?>

    <div class="container my-4">
        <div class="mt-4 p-5 text-white rounded"
            style="background-image:url('https://source.unsplash.com/1600x400/?python');">
            <h1><?php echo $catname?></h1>
            <p><?php echo $catdescription ?></p>
        </div>
    </div>

    <?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
    {
        echo '<div class="container">
        <h1 class="my-2">Start the discussion</h1>
        <form action="'.$_SERVER["REQUEST_URI"].'" method="post">
            <div class="form-outline mb-4">
                <input type="text" id="form4Example1" class="form-control" name="thread_title" />
                <label class="form-label" for="form4Example1">Title</label>
            </div>
            <!-- Message input -->
            <div class="form-outline mb-4">
                <textarea class="form-control" id="form4Example3" rows="4" name="thread_description"></textarea>
                <label class="form-label" for="form4Example3">Message</label>
            </div>
            <button type="submit" class="btn btn-success mb-4">Add Discussion</button>
        </form>
    </div>';
    }
    else{
        echo '<div class="container">
        <h1 class="my-2">Start the discussion</h1>
        <p>You are not logged in. Please login to start a discussion.</p>
        </div>';
    }
    
?>


    <div class="container">
        <h1>Browse Questions</h1>
        <!-- For loop for questions -->
        <?php 
        $sql="SELECT * FROM `threads` WHERE thread_cat_id=$id";
        $result=mysqli_query($conn,$sql);
        $noresult=true;
        while($row=mysqli_fetch_assoc($result)){
            $noresult=false;
            $thread_id=$row['thread_id'];
            $thread_user=$row['thread_user_id'];
            $timestamp=date($row['timestamp']);
            $thread_title=$row['thread_title'];
            $thread_desc=$row['thread_desc'];
            echo '<div class="d-flex">
            <img src="https://source.unsplash.com/60x60/?person" class="me-3 rounded-circle" style="width: 60px; height: 60px;" />
            <a class="nav-link" href="thread.php?thread_id=' . $thread_id . '">
            <div>
                <h5 class="fw-bold">
                    ' . $thread_user . '
                    <small class="text-muted">Posted on ' . $timestamp . '</small>
                </h5>
                <h5>
                    ' . $thread_title . '
                </h5>
                <p>
                    ' . $thread_desc . '
                </p>
            </div>
            </a>
        </div>';
        }
        if($noresult)
        {
            echo '<h4>Be the first to ask questions</h4>';
        }
        ?>
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