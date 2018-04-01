<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="styles/bootstrap.min.css">
        <!-- icon -->
        <link rel="shortcut icon" href="images/favicon.ico">

        <title>Movie Showings</title>
    </head>
    <body>
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
            <h5 class="my-0 mr-md-auto font-weight-normal"><a href="index.html">Online Movie Ticket System</a></h5>
            <nav class="my-2 my-md-0 mr-md-3">
                <a class="p-2 text-dark" href="user.php">User Portal</a>
                <a class="p-2 text-dark" href="user/reservations.php">Reservations</a>
                <a class="p-2 text-dark" href="user/profile.php">Profile</a>
            </nav>
            <!---<a class="btn btn-outline-primary" href="#">Sign up</a>--->
        </div>
        <div class="container">
            <?php
                session_start();
                //$_SESSION['chosen_complex'] = $_POST['chosen_complex'];
                $userdata = $_SESSION['userdata'];
                //echo "<h2>Welcome, $userdata[f_name]</h2>";
                //echo "<p>$_POST[chosen_complex]</p>";
                
                set_error_handler('exceptions_error_handler');

                function exceptions_error_handler($severity, $message, $filename, $lineno) {
                    if (error_reporting() == 0) {
                        return;
                    }
                    if (error_reporting() & $severity) {
                        throw new ErrorException($message, 0, $severity, $filename, $lineno);
                    }
                } //custom error handler to catch undefined chosen complex
                try {
                    $thiscomplex = $_POST['chosen_complex'];
                    echo "<h1>Movies at: $thiscomplex</h1>";
                } catch (Exception $e) {
                    echo "<script language='javascript'>";
                    echo "confirm('No complex chosen, redirecting to User Portal')";
                    echo "</script>"; 
                    //none of this actually displays and im not sure why but whatever i guess
                    header("Location:user.php");
                }
            ?>
            
        </div>
        <div class="container">
            <?php
                
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
                
                $sql = "SELECT Start_Dates.movie_title AS movie_title, Start_Dates.date AS start_date, End_Dates.date AS end_date FROM Start_Dates, End_Dates WHERE Start_Dates.complex_name = '$thiscomplex' AND End_Dates.complex_name = '$thiscomplex' AND Start_Dates.movie_title = End_Dates.movie_title";
                $result = mysqli_query($conn, $sql);

                //echo mysqli_error($conn);
                if (mysqli_num_rows($result)==0) {
                    echo "<p>No movies showing at this complex currently. Click <a href='user.php'>here</a> to view available movies at other complexes.</p>";
                } else {
                    while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="container-fluid">
                <div class="card-deck d-flex">
                    <div class="card">
                        <?php
                            $showsql = "SELECT Showing.*, Theater.max_seats, Theater.screen_size FROM Showing, Theater WHERE Showing.complex = Theater.complex_name AND Showing.th_num = Theater.th_num AND Showing.complex = '$thiscomplex' AND Showing.movie_title = '$row[movie_title]'";
                            $showresult = mysqli_query($conn, $showsql);
                        ?>
                        <div class="card-header">
                            <div class="row">
                                <div class="container col-8">
                                    <h4>
                                        <?php
                                            echo "<h2>" . "$row[movie_title]" . "</h2>";
                                            echo "$row[start_date]<br>";
                                            echo "$row[end_date]<br>";
                                        ?>
                                    </h4>
                                </div>
                                <div class="container col-4 text-right">
                                    <?php
                                        echo "<form action='reviews.php' method='POST'>".
                                             "<button class='btn btn-primary' value='$row[movie_title]' name='go_to_reviews'>View Reviews</button>".
                                             "</form>";
                                    ?>
                                </div>
                            </div>
                        </div>    
                        <div class="card-body row">
                            <div class="container col-4">
                                <?php
                                    while ($showrow = mysqli_fetch_assoc($showresult)) {
                                ?>
                            </div>
                            <div class="container">
                                <div class="card-deck">
                                    <div class="card">
                                        <div class="card-header">
                                            <?php
                                                    echo "<h4> Show time: " . "$showrow[start_time]" . "</h4>";
                                            ?>
                                        </div>
                                        <div class="card-body row">
                                            <div class="container col-8">
                                                <?php
                                                        echo "<p> Theater Number: " . "$showrow[th_num]" . "</p>";
                                                        $theatersql = "SELECT max_seats FROM Theater WHERE th_num = '$showrow[th_num]' AND complex_name = '$showrow[complex]'";
                                                        $theaterrow = mysqli_fetch_assoc(mysqli_query($conn, $theatersql));
                                                        $seatsavailable = $theaterrow['max_seats'] - $showrow['total_seats_res'];
                                                        echo "<p> Seats Available: " . $seatsavailable . "</p>";
                                                ?>   
                                            </div>
                                            <div class="container col-4 text-right">
                                                <form action='user/confirmation.php' method='POST'>
                                                    
                                                    <?php
                                                        echo "<input type='number' name='num_seats' min='0' max='$seatsavailable' value='0'>";
                                                        foreach ($showrow as $showval) {
                                                            echo "<input type='hidden' name='result[]' value='" . $showval . "'>";
                                                        }
                                                    ?>
                                                    <button class='btn btn-primary'>Reserve Seats</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    }   
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }} // end result loop
                mysqli_close($conn);
            ?>
        </div>
      
      
      
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>