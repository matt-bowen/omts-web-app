 <!DOCTYPE html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../styles/bootstrap.min.css">
    <!-- icon -->
    <link rel="shortcut icon" href="../images/favicon.ico">

    <title>Login Landing Page</title>
</head>
<body>
<?php
    ini_set("display_errors", true);
    error_reporting(E_ALL);
    /*
    if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
        echo 'We don\'t have mysqli!!!';
    } else {
        echo 'Phew we have it!';
    } */
	//phpinfo();
    if (isset($_POST['submitbutton'])) {
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
            
        if ($_POST['email'] == "admin@omts.com" and $_POST['password'] == "admin") {
            header('Location: ../admin.html');
            exit;
        } else {
            $sql = "SELECT * FROM Customer WHERE email = '$_POST[email]' and password = '$_POST[password]' LIMIT 1";
            if ($result = mysqli_query($conn, $sql) and mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                session_start();
                $_SESSION['userdata'] = $row;
                header('Location: ../user.php');
                exit();
            } else {
                session_start();
                $_SESSION['loginsuccess'] = 'false';
                header('Location: ../login.html');
                exit();
            }
        }
    
    
    
    }
?>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>