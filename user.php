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

        <title>User Portal</title>
    </head>
    <body>
        <div class="container">
            <h1>OMTS User  Portal</h1>
        </div>
        <div class="container">
            <?php
                session_start();
                $userdata = $_SESSION['userdata'];
                echo "<h2>Welcome, $userdata[f_name]</h2>";
            
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
            
                $sql = "SELECT Complex.*, Start_Dates.date AS start_date, End_Dates.date as end_date, Start_Dates.movie_title FROM Complex, Start_Dates, End_Dates WHERE ((name = Start_Dates.complex_name AND name = End_Dates.complex_name) AND Start_Dates.movie_title = End_Dates.movie_title)";
                $result = mysqli_query($conn, $sql);
            
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
        </div>
        <div class="container">
            <div class="card-deck">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            <?php
                                echo "$row[name]";
                            ?>
                        </h4>
                    </div>    
                    <div class="card-body row">
                        <div class="container col-6">
                            <?php
                                echo "$row[street_num]" . " " . "$row[street_name]<br>";
                                echo "$row[city]" . ", " . "$row[prov]<br>";
                                echo "$row[postal]<br>";
                                echo "$row[phone_num]<br>";
                            ?>
                        </div>
                        <div class="container col-6">
                            <?php
                                echo "$row[movie_title]";
                            ?>
                        </div>
                    </div>
                </div>
                
                
            </div>
            <?php
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