<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../styles/bootstrap.min.css">
        <!-- icon -->
        <link rel="shortcut icon" href="../images/favicon.ico">

        <title>Reviews</title>
    </head>
    <body>
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
            <h5 class="my-0 mr-md-auto font-weight-normal"><a href="../index.html">Online Movie Ticket System</a></h5>
            <nav class="my-2 my-md-0 mr-md-3">
                <a class="p-2 text-dark" href="../user.php">User Portal</a>
                <a class="p-2 text-dark" href="../user/reservations.php">Reservations</a>
                <a class="p-2 text-dark" href="../user/profile.php">Profile</a>
            </nav>
            <!---<a class="btn btn-outline-primary" href="#">Sign up</a>--->
        </div>
        <div class="container">
            <?php
                session_start();
                $userdata = $_SESSION['userdata'];
                //echo "<h1>Reservations for: $userdata[l_name], $userdata[f_name]</h1>";
                if (isset($_POST['reviewsubmit'])) {
                    //print_r($_POST['result']);
                    $movie_title = $_POST['movie_title'];

                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "OMTS";
                    // Create connection

                    // MySQLi
                    try {
                         $conn = mysqli_connect($servername, $username, $password, $dbname);
                    } catch (Exception $e) { // Check connection
                        echo "Connection Failed";
                    }
                    $sql = "INSERT INTO Reviews (movie_title, cust_num, review) VALUES ('$_POST[movie_title]', '$userdata[acct_num]', '$_POST[input_review]')";
                    mysqli_query($conn, $sql);
                    echo mysqli_error($conn);
            ?>
            <div>
                <p>Thank you for submitting a review. To see all reviews, click <a href="../user/reviews.php">here</a>.</p>
                <?php
                } else {
                    echo "<p>No review has been submitted. Click <a href='../user/reviews.php'>here</a> to view reviews.";
                }
                ?>
            </div>
        </div>
      
      
      
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>