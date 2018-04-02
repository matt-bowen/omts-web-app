<!Doctype html>
<html> 
    <head>
        <title> Admin Panel</title>
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- Custom styles for this template -->
        <link href="dashboard.css" rel="stylesheet">
    </head>
    <body>


        <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Cineplex</a>

            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                    <a class="nav-link" href="#">Sign out</a>
                </li>
            </ul>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                    <div class="sidebar-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href="admin.php">
                                    <span data-feather="settings"></span>
                                    Admin Panel <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="complex.php">
                                    <span data-feather="home"></span>
                                    Manage Complexes
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="movies.php">
                                    <span data-feather="home"></span>
                                    Movies
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="members.php">
                                    <span data-feather="users"></span>
                                    Members
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="analytics.php">
                                    <span data-feather="bar-chart-2"></span>
                                    Analytics
                                </a>
                            </li>


                        </ul>



                    </div>
                </nav>

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                        <h1 class="h2">Analytics</h1>


                    </div>
                    <button type="button" class="btn btn-outline-primary" onclick="listmembers();"><a href="listallmembers.php">List All Members</a></button>
                    <button type="button" class="btn btn-outline-danger">Remove a Member(s)</button>

                    <form action="removemember.php" method="POST">
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" name="cust_num" placeholder="ENTER CUSTOMER ID">
                            </div>

                        </div>
                    </form>

                    <!-- Start of comments using php in html tag form -->
                    <?php
                    /*
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $db='omts';

                    // Create connection
                    $conn = new mysqli($servername, $username, $password,$db);
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    } else{echo '<br>connetion success to database';}

                    //with connection established use html tags to set up structure
                    ?>
                    <br/>
                    <br/>

                    <?php 
                    $sql='SELECT movie_title, COUNT(seats) as ticket_sold FROM reservation GROUP BY movie_title ORDER BY COUNT(seats)';
                    $result=$conn->query($sql);
                    if($result->num_rows>0){
                        //output data of each row
                        echo ' <div class="table-responsive">
                                <table class="table table-striped table-sm">
                                <thead>
                                <tr>
                  <th>Movie Title: </th>
                  <th>Tickets Sold: </th>

                  </tr>

                                </thead>
                                <tbody>';
                        while($row=$result->fetch_assoc()){
                            // echo 'Account Number: '.$row['acct_num'].' '.'Name: '.$row['f_name'].' '.$row['l_name'].' Email: '. $row['email'].'<br/>'; 

                            echo '

                                <tr>
                                <td>'.$row['movie_title'].'</td>
                                <td>'.$row['ticket_sold'].'</td>
                                                                          </tr>';

                        }
                        echo '</tbody></table>
                                </div>';
                    }
                    $conn->close();
*/
                    ?>


                </main>





                <!-- Bootstrap core JavaScript
================================================== -->
                <!-- Placed at the end of the document so the pages load faster -->
                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
                <script src="../../../../assets/js/vendor/popper.min.js"></script>
                <script src="../../../../dist/js/bootstrap.min.js"></script>

                <!-- Icons -->
                <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
                <script>
                    feather.replace()
                </script>

                <!-- Graphs -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
                <script>
                    var ctx = document.getElementById("myChart");
                    var myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                            datasets: [{
                                data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
                                lineTension: 0,
                                backgroundColor: 'transparent',
                                borderColor: '#007bff',
                                borderWidth: 4,
                                pointBackgroundColor: '#007bff'
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: false
                                    }
                                }]
                            },
                            legend: {
                                display: false,
                            }
                        }
                    });
                </script>

                </body>



            </html>