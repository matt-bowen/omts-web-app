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

        <title>Reservations</title>
    </head>
    <body>
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
            <h5 class="my-0 mr-md-auto font-weight-normal"><a href="../index.html">Online Movie Ticket System</a></h5>
            <nav class="my-2 my-md-0 mr-md-3">
                <a class="p-2 text-dark" href="../user.php">User Portal</a>
                <a class="p-2 text-dark" href="profile.php">Profile</a>
            </nav>
            <!---<a class="btn btn-outline-primary" href="#">Sign up</a>--->
        </div>
        <div class="container">
            <?php
                session_start();
                $userdata = $_SESSION['userdata'];
                echo "<h1>Reservations for: $userdata[l_name], $userdata[f_name]</h1>";

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
                $sql = "SELECT * FROM Reservation WHERE cust_num = '$userdata[acct_num]'";
                $result = mysqli_query($conn, $sql);
                echo mysqli_error($conn);
                if (mysqli_num_rows($result)==0) {
                    echo "<p>No current reservations. Click <a href='../user.php'>here</a> to view available movies.</p>";
                } else {
                    while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="container-fluid">
                <div class="card-deck d-flex">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-8">
                                    <?php
                                        echo "<h2>$row[movie_title]</h2>";
                                    ?>
                                </div>
                                <div class="col-4 text-right">
                                    <form action='cancel.php' method='POST'>
                                        <?php
                                            foreach ($row as $resval) {
                                                echo "<input type='hidden' name='result[]' value='" . $resval . "'>";
                                            }
                                        ?>
                                        <button class='btn btn-primary' name='cancelbutton'>Cancel</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <p>
                                <?php
                                    echo "<p> Theater Complex: $row[complex]</p>";
                                    echo "<p> Theater Number: $row[th_num]</p>";
                                    echo "<p> Start Time: $row[start_time]PM</p>";
                                    echo "<p> Seats Reserved: $row[seats]</p>";
                                    //print_r($row);
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }} //end loop over reviews
            ?>
        </div>
      
      
      
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>