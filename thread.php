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
    $id=$_GET['thread_id'];
    $sql="SELECT * FROM `threads` WHERE thread_id=$id";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
        $thread_title=$row['thread_title'];
        $thread_desc=$row['thread_desc'];
    }
    $request=$_SERVER['REQUEST_METHOD'];
    $showalert=false;
    
    if($request=='POST'){
        $user=$_SESSION['useremail'];
        $comment_content=$_POST['comment'];
        //insert record into DB;
        $sql="INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_time`,`comment_by`) VALUES ('$comment_content', '$id', current_timestamp(),'$user');";
        $result=mysqli_query($conn,$sql);
        $showalert=true;
    }
    if($showalert){
        echo '<div class="alert alert-success" role="alert">
        Your response has been added successfully!;
      </div>';
    }
?>
    <div class="container-fluid my-4">
        <div class="mt-4 p-5 bg-warning text-white rounded">
            <h1><?php echo $thread_title;?></h1>
            <p><?php echo $thread_desc; ?></p>
        </div>
    </div>


    <?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
    {
        echo '<div class="container">
        <h1 class="my-2">Post a Comment</h1>
        <form action="'.$_SERVER['REQUEST_URI'].'" method="post">
            <div class="form-outline mb-4">
                <textarea class="form-control" id="form4Example3" rows="4" name="comment"></textarea>
                <label class="form-label" for="form4Example3">Enter your response</label>
            </div>
            <button type="submit" class="btn btn-success mb-4">Send</button>
        </form>
    </div>';
    }
    else{
        echo '<div class="container">
        <h1 class="my-2">Post a comment</h1>
        <p>You are not logged in. Please login to post comments.</p>
        </div>';
    }
    
?>

    


    <div class="container">
        <h1>Discussions</h1>
        <?php 
        $sql="SELECT * FROM `comments` WHERE thread_id=$id";
        $result=mysqli_query($conn,$sql);
        $noresult=true;
        while($row=mysqli_fetch_assoc($result)){
            $noresult=false;
            // $thread_id=$row['thread_id'];
            $comment_by=$row['comment_by'];
            $timestamp=date($row['comment_time']);
            // $thread_title=$row['thread_title'];
            $comment_content=$row['comment_content'];
            echo '<div class="d-flex">
            <img src="https://source.unsplash.com/60x60/?person" class="me-3 rounded-circle" style="width: 60px; height: 60px;" />
            <div>
                <h5 class="fw-bold my-0">
                    ' . $comment_by . '
                </h5>  
                <p class="my-0">
                    ' . $comment_content . '
                </p>
                <p>
                <small class="text-muted">Posted on ' . $timestamp . '</small>
                </p>
            </div>
        </div>';
        }
        if($noresult)
        {
            echo '<h4>Be the first to comment</h4>';
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