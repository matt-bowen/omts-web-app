<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../styles/bootstrap.min.css">
    <!-- icon -->
    <link rel="shortcut icon" href="../images/favicon.ico">

    <title>Profile</title>
</head>
<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
        <h5 class="my-0 mr-md-auto font-weight-normal"><a href="../index.html">Online Movie Ticket System</a></h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="../user/user.php">User Portal</a>
            <a class="p-2 text-dark" href="../user/reservations.php">Reservations</a>
            <a class="p-2 text-dark" href="../user/profile.php">Profile</a>
        </nav>
        <!---<a class="btn btn-outline-primary" href="#">Sign up</a>--->
    </div>
    <div class="container text-center">
        <?php
            session_start();
            $userdata = $_SESSION['userdata'];


            if (isset($_POST['submitbutton'])) {
                $cc_exp = $_POST['ccexp_month'] . $_POST['ccexp_year'];
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
                $update = "UPDATE Customer SET password = '$_POST[password]', f_name = '$_POST[f_name]', l_name = '$_POST[l_name]', street_num = '$_POST[street_num]', street_name = '$_POST[street_name]', city = '$_POST[city]', prov = '$_POST[prov]', postal = '$_POST[postal]', phone_num = '$_POST[phone_num]', email = '$_POST[email]', cc_num = '$_POST[cc_num]', cc_exp = '$cc_exp' WHERE acct_num = '$userdata[acct_num]'";
                mysqli_query($conn, $update);
                echo mysqli_error($conn);
                echo "<h1> Profile Edited </h1>";


            } else {
                echo "<h1> No edits submitted </h1>";
            }
        ?>
    </div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>