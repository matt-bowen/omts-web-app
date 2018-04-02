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

        <title>Confirm Reservation</title>
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
            <h1>Reservation Confirmation</h1>
            <?php
                session_start();
                $userdata = $_SESSION['userdata'];
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
            
                //print_r($_POST['result']);
                //print_r($_POST);
                if (isset($_POST['result'])) {
                    $showingdata = $_POST['result'];
                    //echo $showingdata[0];

                    $updatesql = "UPDATE Showing SET total_seats_res = total_seats_res + '$_POST[num_seats]' WHERE Showing.start_time = '$showingdata[0]' AND Showing.complex = '$showingdata[1]' AND Showing.th_num = '$showingdata[2]' AND Showing.movie_title = '$showingdata[3]'";
                    mysqli_query($conn, $updatesql);
                    //echo "Error: " . mysqli_error($conn);

                    echo "<h4>Movie: $showingdata[3] </h4>";
                    echo "<h4>Showtime: $showingdata[0] PM </h4>";
                    echo "<h6>Theater Complex: $showingdata[1] </h6>";
                    echo "<h6>Theater Number: $showingdata[2] </h6>";
                    echo "<h6>Seats Reserved: $_POST[num_seats] </h6>";

                    $reservation = "INSERT INTO Reservation VALUES ('$userdata[acct_num]', '$_POST[num_seats]', '$showingdata[0]', '$showingdata[3]', '$showingdata[2]', '$showingdata[1]')";
                    mysqli_query($conn, $reservation);
                    mysqli_error($conn);
                } else {
                    header("Location:user.php");
                    exit();
                }
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