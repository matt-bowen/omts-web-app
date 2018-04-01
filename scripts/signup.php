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

    <title>Signup Landing Page</title>
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
            
        
        /*
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } */
        

        $sql = "SELECT acct_num FROM Customer ORDER BY acct_num DESC LIMIT 1";
        $result = mysqli_query($conn, $sql);
        
        //$sql = "INSERT INTO Customer (acct_num, f_name, l_name) VALUES ('1002','matt','bowen')";
        //mysqli_query($conn, $sql);
        //echo "Error :" . mysqli_error($conn);
        
        try {
            $row = mysqli_fetch_row($result);
            $sql = "INSERT INTO Customer VALUES ($row[0]+1, '$_POST[password]', '$_POST[firstname]', '$_POST[lastname]', '$_POST[streetnum]', '$_POST[streetname]', '$_POST[city]', '$_POST[province]', '$_POST[postal]', '$_POST[phone]', '$_POST[email]', '$_POST[cc]', $cc_exp)";
            mysqli_query($conn, $sql);
            //if ($conn->connect_error) {
                //die("Insertion failed: " . $conn->connect_error);
            //} 
            //echo "<p>Data (possibly) inserted: " . mysqli_error($conn) . "</p>";
            echo "<p>Thank you for signing up. Click <a href='../index.html'>here</a> to return to the home page.</p>";
        } catch (Exception $e) {
            //$sql = "INSERT INTO customer (acct_num, f_name, l_name, street_num, street_name, city, prov, postal, phone_num, email, password, cc_num, cc_exp) VALUES ($row[0]+1, '$_POST[firstname]', '$_POST[lastname]', '$_POST[streetnum]', '$_POST[streetname]', '$_POST[city]', '$_POST[province]', '$_POST[postal]', '$_POST[phone]', '$_POST[email]', '$_POST[password]', '$_POST[cc]', $cc_exp)";
            echo "<p>At this time we could not sign you up. Click <a href='../index.html'>here</a> to return to the home page.</p>";
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