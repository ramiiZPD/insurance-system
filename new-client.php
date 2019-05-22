<?php
  require_once('Config.php');
?>
<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>

<head>
    <meta charset="UTF-8">
    <title>Secure Me</title>
    <link rel="stylesheet" href="ccss/style.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>
    <div id="header">
        <div>
            <div id="logo">
                <a href="index.php"><img src="images/up.png" alt="LOGO" width="119" height="119"></a>
            </div>
            <ul id="navigation">
                <li>
                    <a href="home.php">Home</a>
                </li>
                <li>
                    <a href="client.php">Client</a>
                </li>
                <li class="selected">
                    <a href="new-client.php">New Client</a>
                </li>
                <li>
                    <a href="user.php">Users</a>
                </li>
                <li>
                    <a href="branch.php">Branches</a>
                </li>
            </ul>
        </div>
    </div>
    <div id="contents">
        <form action="new-client.php" method="post">
            <div style="display: flex; justify-content: center; align-items: center; width: 90%;">
                <div style="flex-direction: column; width: 50%; height: 500px;">
                    <div class="row" style="margin-top: 100px; margin-left: 100px">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>ID:</label> 
                                <input type="text" name="clientid">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Client Number:</label>
                                <input type="number" name="clientnumber">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Client Type :</label> 
                                <input type="text" name="type">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>DOB:</label>
                                <input type="date" name="date">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Mobile:</label>
                                <input type="text" name="mobile">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Address:</label>
                                <input type="text" name="address">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>State:</label>
                                <input type="text" name="state">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Initial Amount:</label>
                                <input type="number" name="amount">
                            </div>
                        </div>
                    </div>

                </div>
                <div style="flex-direction: column; width: 50%; height: 500px;">
                    <div style="margin-top: 100px; margin-left: 100px">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Name:</label> 
                                <input type="text" name="name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Age:</label>
                                <input type="number" name="age">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Email:</label>
                                <input type="email" name="email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>City:</label>
                                <input type="text" name="city">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Number of payments:</label>
                                <input type="number" name="numberpayments">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Date of creation:</label>
                                <input type="date" name="dateofcreatation">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-md-4">
                                <button type="submit" name="create" class="btn btn-primary">Add new client</button>
                            </div>
                        </div>

                        <div>
                      <?php

                        if(isset($_POST['create'])) {
                          $errors = 0;

                          $clientid = $_POST['clientid'];
                          $clientnumber = $_POST['clientnumber'];
                          $type = $_POST['type'];
                          $date = $_POST['date'];
                          $mobile = $_POST['mobile'];
                          $address = $_POST['address'];
                          $state = $_POST['state'];
                          $amount = $_POST['amount'];
                          $name = $_POST['name'];
                          $age = $_POST['age'];
                          $email = $_POST['email'];
                          $city = $_POST['city'];
                          $numberpayments = $_POST['numberpayments'];
                          $dateofcreatation = $_POST['dateofcreatation'];
                          

                          if (empty($clientid)) {
                            $errors++;
                            echo '<p style="color:red;padding:0px">Please enter valid Client ID</p>';
                          }

                          if (empty($clientnumber)) {
                            $errors++;
                            echo '<p style="color:red;padding:0px">Please enter valid Client Number</p>';
                          }

                          if (empty($type)) {
                            $errors++;
                            echo '<p style="color:red;padding:0px">Please enter Valid Client Type</p>';
                          }

                          if (empty($date)) {
                            $errors++;
                            echo '<p style="color:red;padding:0px">Please enter Valid DOB</p>';
                          }

                          if (empty($mobile)) {
                            $errors++;
                            echo '<p style="color:red;padding:0px">Please enter Valid Mobile No</p>';
                          }

                          if (empty($address)) {
                            $errors++;
                            echo '<p style="color:red;padding:0px">Please enter Valid Address</p>';
                          }

                          if (empty($state)) {
                            $errors++;
                            echo '<p style="color:red;padding:0px">Please enter Valid State</p>';
                          }

                          if (empty($amount)) {
                            $errors++;
                            echo '<p style="color:red;padding:0px">Please enter Valid Amount</p>';
                          }

                          if (empty($name)) {
                            $errors++;
                            echo '<p style="color:red;padding:0px">Please enter Valid Name</p>';
                          }

                          if (empty($age)) {
                            $errors++;
                            echo '<p style="color:red;padding:0px">Please enter Valid Age</p>';
                          }

                          if (empty($email)) {
                            $errors++;
                            echo '<p style="color:red;padding:0px">Please enter Valid Email</p>';
                          }

                          if (empty($city)) {
                            $errors++;
                            echo '<p style="color:red;padding:0px">Please enter Valid City</p>';
                          }

                          if (empty($numberpayments)) {
                            $errors++;
                            echo '<p style="color:red;padding:0px">Please enter Number of Payments</p>';
                          }

                          if (empty($dateofcreatation)) {
                            $errors++;
                            echo '<p style="color:red;padding:0px">Please enter Date of Creation</p>';
                          }


                          if($errors == 0) {
                            $query = "INSERT INTO clients (clientid, clientnumber, type, date, mobile, address, state, amount, name, age, email, city, numberpayments, dateofcreatation) 
                            VALUES('$clientid', '$clientnumber', '$type', '$date', '$mobile', '$address', '$state', '$amount', '$name', '$age', '$email', '$city', '$numberpayments', '$dateofcreatation')";
                           
                            mysqli_query($db, $query);
                            echo "<div class='alert alert-success'>Record Added Successfully</div>";
                          }
                          
                        }


                        
                      ?>
                    </div>



                    </div>
                </div>
            </div>
        </form>
    </div>


    
</body>

</html>