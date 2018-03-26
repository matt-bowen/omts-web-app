 <!DOCTYPE html>
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
	//phpinfo();
    if (isset($_POST['submitbutton'])) {
        
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "OMTS";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 


    $sql = "SELECT acct_num FROM customer ORDER BY acct_num DESC LIMIT 1";
    $result = $conn->query($sql);
    if ($row = mysqli_fetch_row($result)) {
        $sql = "INSERT INTO customer (acct_num, f_name, l_name) VALUES ($row[0]+1, '$_POST[firstname]', '$_POST[lastname]')";
        $conn->query($sql);
        if ($conn->connect_error) {
            die("Insertion failed: " . $conn->connect_error);
        } 
        echo "<p>Data (possibly) inserted</p>";
    }
    
    
    
    }
?>

</body>
</html>