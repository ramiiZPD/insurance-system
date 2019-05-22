<?php
  require_once('Config.php');
?>
<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>

<head>
    <meta charset="UTF-8">
    <title>User</title>
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
                    <a href="client.html">Client</a>
                </li>
                <li>
                    <a href="new-client.html">New Client</a>
                </li>
                <li class="selected">
                    <a href="user.php">Users</a>
                </li>
                <li>
                    <a href="branch.php">Branches</a>
                </li>
            </ul>
        </div>
    </div>
    <div id="contents">

   

        <div class="container">
            <h2>Create User</h2>

            <form action="user.php" method="post">
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">First Name</label>
                        <input type="text" name="firstname" class="form-control" placeholder="First Name">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputPassword4">Last Name</label>
                        <input type="text" name="lastname" class="form-control" placeholder="Last Name">
                      </div>
                    </div>

                    <div class="row">
                            <div class="form-group col-md-8">
                              <label for="inputEmail4">Email</label>
                              <input type="email" name="email" class="form-control" placeholder="Email">
                            </div>
                           
                          </div>

                          <div class="row">
                                <div class="form-group col-md-6">
                                        <label for="inputPassword4">Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                                     
                          </div>

                          <div class="row">
                                <div class="form-group col-md-6">
                                        <label for="inputPassword4">Re Enter Password</label>
                                        <input type="password" name="repassword" class="form-control" placeholder="Re Enter Password">
                                 </div>
                          </div>
                   
                    <button type="submit" name="create" class="btn btn-primary">Create User</button>

                    <div>
                      <?php
                        if(isset($_POST['create'])) {
                          $errors = 0;

                          $firstname = $_POST['firstname'];
                          $lastname = $_POST['lastname'];
                          $email = $_POST['email'];
                          $password = $_POST['password'];
                          $repassword = $_POST['repassword'];

                          if (empty($firstname)) {
                            $errors++;
                            echo '<p style="color:red;padding:0px">Please enter valid first name</p>';
                          }

                          if (empty($lastname)) {
                            $errors++;
                            echo '<p style="color:red;padding:0px">Please enter valid last name</p>';
                          }

                          if (empty($email)) {
                            $errors++;
                            echo '<p style="color:red;padding:0px">Please enter valid email</p>';
                          }

                          if (empty($password)) {
                            $errors++;
                            echo '<p style="color:red;padding:0px">Please enter valid password</p>';
                          }

                          if ($password != $repassword) {
                            $errors++;
                            echo '<p style="color:red;padding:0px">The two passwords do not match</p>';
                          }

                          if($errors == 0) {
                            $password = md5($password);

                            $query = "INSERT INTO users (firstname, lastname,email, password) 
                            VALUES('$firstname','$lastname', '$email', '$password')";
                            mysqli_query($db, $query);
              
                            echo "<div class='alert alert-success'>Record Added Successfully</div>";
                          }
                          
                        }

                        if( isset($_POST['delete'])){

                          $sql = "DELETE FROM users WHERE id=" . $_POST['userid'];
                      
                          if($db->query($sql) === TRUE){
                      
                              echo "<div class='alert alert-success'>Successfully delete user</div>";
                      
                          }
                      
                      }

                      ?>
                    </div>

            
                  </form>


                  <div class="container">
                        <h2>Users</h2>
                       
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>Email</th>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Delete</th>
                            </tr>
                          </thead>
                          <tbody>

                          <?php

                            $result = mysqli_query($db,"SELECT * FROM users");

                            while($row = mysqli_fetch_array($result))
                            {
                              echo "<form action='' method='POST'>";
                              echo "<input type='hidden' value='". $row['id']."' name='userid' />";
                              echo "<tr>";
                              echo "<td>" . $row['email'] . "</td>";
                              echo "<td>" . $row['lastname'] . "</td>";
                              echo "<td>" . $row['lastname'] . "</td>";
                              echo "<td><input type='submit' name='delete' value='Delete' class='btn btn-danger' /></td>";
                              echo "</tr>";
                              echo "</form>";
                            }
                          
                            ?>

                          
                          </tbody>
                        </table>

                       



                      </div>
           
          </div>

    </div>

    <div class="footer">
        <p>
            © 2019. All Rights Reserved. <a href="index.html">Privacy Policy</a> <a
                href="index.html">Terms and Conditions</a>
        </p>
    </div>
    
</body>

</html>