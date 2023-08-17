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
    $showalert=false;
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $user=$_SESSION['useremail'];
        $subject=$_POST['subject'];
        $message=$_POST['message'];
        $sql="INSERT INTO `contactus` (`query_user`, `query_subject`, `query_message`, `query_date`) VALUES ('$user', '$subject', '$message', current_timestamp())";
        mysqli_query($conn,$sql);
        $showalert=true;
    }
    if($showalert){
        echo '<div class="alert alert-success" role="alert">
        Your query has been submitted. We will contact you by email as soon as possible;
      </div>';
    }
    ?>

    <div class="pt-5 conatiner">
            <div class="text-center">
                <h3 class="text-primary">How Can We Help You?</h3>
                <p class="lead">We will contact you as soon as possible</p>
            </div>
            <div class=" d-flex align-items-center justify-content-center">
                <div class="bg-white col-md-4">
                    <div class="px-4 rounded shadow-md">
                    <form action="contact.php" method="post">
                        <div class="mt-3">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                        </div>
                        <div class="mt-3 mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea name="message" cols="20" rows="6" class="form-control"
                                placeholder="message"></textarea>
                        </div>
                        <div class="d-flex justify-content-center">
                            <?php
                            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
                            {
                                echo '<button type="submit" class="btn btn-primary">';
                            }
                            else{
                                echo '<button class="btn btn-secondary disabled">';
                            }
                        ?>
                            Submit Form
                        </button>
                        </div>
</form>
                    </div>
                </div>
            </div>
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