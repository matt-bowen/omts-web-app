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
                <a class="p-2 text-dark" href="user.php">User Portal</a>
                <a class="p-2 text-dark" href="reservations.php">Reservations</a>
                <a class="p-2 text-dark" href="profile.php">Profile</a>
            </nav>
            <!---<a class="btn btn-outline-primary" href="#">Sign up</a>--->
        </div>
        <div class="container">
            <?php
                if (isset($_POST['go_to_reviews'])) {
                echo "<h1>Reviews for: $_POST[go_to_reviews]</h1>";
            
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
                $sql = "SELECT * FROM Reviews WHERE movie_title = '$_POST[go_to_reviews]'";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="container-fluid">
                <div class="card-deck d-flex">
                    <div class="card">
                        <div class="card-body">
                            <p>
                                <?php
                                    echo $row['review'];
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }} else { //end loop over reviews
                    header("Location:user.php");
                    exit();
                }
            ?>
            <div class="container-fluid form-group">
                <h4>Add a Review:</h4>
                <form action="../scripts/reviews-added.php" method="POST">
                    <textarea class="form-control" rows="5" name="input_review"></textarea>
                    <input type="submit" class="btn-primary btn" name="reviewsubmit">
                    <input type="hidden" name="movie_title" value="<?php echo $_POST['go_to_reviews']; ?>">
                </form>
                <!---<small class="form-text text-muted">Note: You may only submit one review per movie. The first review per movie will be kept.</small>--->
            </div>
        </div>
      
      
      
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>