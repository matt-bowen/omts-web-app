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

        <title>Profile</title>
    </head>
    <body>
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
            <h5 class="my-0 mr-md-auto font-weight-normal"><a href="../index.html">Online Movie Ticket System</a></h5>
            <nav class="my-2 my-md-0 mr-md-3">
                <a class="p-2 text-dark" href="../user.php">User Portal</a>
                <a class="p-2 text-dark" href="../user/reservations.php">Reservations</a>
            </nav>
            <!---<a class="btn btn-outline-primary" href="#">Sign up</a>--->
        </div>
        <div class="container">
            <h1>Your Profile</h1>
            <?php 
                session_start();
                $userdata = $_SESSION['userdata'];
                //print_r($userdata);
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
                $sql = "SELECT * FROM Customer WHERE acct_num = '$userdata[acct_num]'";
                $userdata = mysqli_fetch_assoc(mysqli_query($conn, $sql));
                //print_r($userdata);
                //echo mysqli_error($conn);
            ?>
        </div>
        <div class=container>
            <div class="form-group">
                <form action="../scripts/profile-edit.php" method="POST">
                 <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="form_firstname">First name:</label>
                            <input type="text" class="form-control" id="form_firstname" name="f_name" value="<?php echo $userdata['f_name']; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="form_lastname">Last name:</label>
                            <input type="text" class="form-control" id="form_lastname" name="l_name" value="<?php echo $userdata['l_name']; ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="form_phone">Telephone:</label>
                            <input type="tel" class="form-control bfh-phone" id="form_phone" name="phone_num" value="<?php echo $userdata['phone_num']; ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="form_email">Email:</label>
                            <input type="email" class="form-control" id="form_email" name="email" value="<?php echo $userdata['email']; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="form_password">Change your password:</label>
                            <input type="password" class="form-control" id="form_password" name="password" value="<?php echo $userdata['password']; ?>">
                        </div>
                    </div>
                    <div class="form"><p>Address:</p></div>
                    <div class="form-row">
                        <div class="form-group col-4">
                            <label for="form_streetnum">Street Number:</label>
                            <input type="text" class="form-control" id="form_streetnum" name="street_num" value="<?php echo $userdata['street_num']; ?>">
                        </div>
                        <div class="form-group col-4">
                            <label for="form_streetname">Street Name:</label>
                            <input type="text" class="form-control" id="form_streetname" name="street_name" value="<?php echo $userdata['street_name']; ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-4">
                            <label for="form_city">City:</label>
                            <input type="text" class="form-control" id="form_city" name="city" value="<?php echo $userdata['city']; ?>">
                        </div>
                        <div class="form-group col-4">
                            <label for="form_province">Province:</label>
                            <input type="text" class="form-control" id="form_province" name="prov" value="<?php echo $userdata['prov']; ?>">
                        </div>
                        <div class="form-group col-4">
                            <label for="form_postal">Postal Code:</label>
                            <input type="text" class="form-control" id="form_postal" name="postal" value="<?php echo $userdata['postal']; ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-sm-2 control-label" for="form_cc">Credit Card:</label>
                        <div class="form-group col-9">
                            <input type="text" class="form-control" id="form_cc" name="cc_num" value="<?php echo $userdata['cc_num']; ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-sm-2 control-label">Expiry Date:</label>
                        <div class="form-group col-3">
                            <select class="form-control" name="ccexp_month">
                                <option value="01">Jan (01)</option>
                                <option value="02">Feb (02)</option>
                                <option value="03">Mar (03)</option>
                                <option value="04">Apr (04)</option>
                                <option value="05">May (05)</option>
                                <option value="06">June (06)</option>
                                <option value="07">July (07)</option>
                                <option value="08">Aug (08)</option>
                                <option value="09">Sep (09)</option>
                                <option value="10">Oct (10)</option>
                                <option value="11">Nov (11)</option>
                                <option value="12">Dec (12)</option>
                            </select>
                        </div>
                        <div class="form-group col-3">
                            <select class="form-control" name="ccexp_year">
                                <option value="18">2018</option>
                                <option value="19">2019</option>
                                <option value="20">2020</option>
                                <option value="21">2021</option>
                                <option value="22">2022</option>
                                <option value="23">2023</option>
                                <option value="24">2024</option>
                                <option value="25">2025</option>
                                <option value="26">2026</option>
                                <option value="27">2027</option>
                                <option value="28">2028</option>
                            </select>
                        </div>

                    </div>


                    <input type="submit" class="btn btn-primary" name="submitbutton" value="Update Profile">
                </form>
            </div>
        </div>
      
      
      
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>