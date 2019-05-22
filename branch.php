<?php
  require_once('Config.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Branches</title>
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
                <li>
                    <a href="new-client.php">New Client</a>
                </li>
                <li>
                    <a href="user.php">Users</a>
                </li>
                <li class="selected">
                    <a href="branch.php">Branches</a>
                </li>
            </ul>
        </div>
    </div>
    <div id="contents">

        <div class="container">
            <h2>Create Branches</h2>

            <form action="branch.php" method="post">
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Branch Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Branch Name">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputPassword4">Address</label>
                        <input type="text" name="address" class="form-control" placeholder="Address">
                      </div>
                    </div>

                    <div class="row">
                            <div class="form-group col-md-8">
                              <label for="inputEmail4">Tel-No</label>
                              <input type="number" name="telno" class="form-control" placeholder="Tel-No">
                            </div>
                           
                          </div>
                   
                    <button type="submit" name="create" class="btn btn-primary">Create Branch</button>

                    <div>
                      <?php
                        if(isset($_POST['create'])) {
                          $errors = 0;

                          $name = $_POST['name'];
                          $address = $_POST['address'];
                          $telno = $_POST['telno'];
                          

                          if (empty($name)) {
                            $errors++;
                            echo '<p style="color:red;padding:0px">Please enter valid Branch name</p>';
                          }

                          if (empty($address)) {
                            $errors++;
                            echo '<p style="color:red;padding:0px">Please enter valid Address</p>';
                          }

                          if (empty($telno)) {
                            $errors++;
                            echo '<p style="color:red;padding:0px">Please enter Valid Telephone Number</p>';

                            
                          }

                          if($errors == 0) {
                            $query = "INSERT INTO branches (name, address, telno) 
                            VALUES('$name','$address', '$telno')";
                            mysqli_query($db, $query);
                            echo "<div class='alert alert-success'>Record Added Successfully</div>";
                          }
                          
                        }


                        if( isset($_POST['delete'])){

                          $sql = "DELETE FROM branches WHERE id=" . $_POST['branchid'];
                      
                          if($db->query($sql) === TRUE){
                      
                              echo "<div class='alert alert-success'>Successfully delete branch</div>";
                      
                          }
                      
                      }
                        
                      ?>
                    </div>

                    <br>
                    <br>
                    <br>
                    <br>
                  </form>
           

                  <div class="container">
                        <h2>Branch Details</h2>
                       
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>Branch ID</th>
                              <th>Branch Name</th>
                              <th>Address</th>
                              <th>Tel-No</th>
                              <th>Delete</th>
                            </tr>
                          </thead>
                          <tbody>

                          <?php

                            $result = mysqli_query($db,"SELECT * FROM branches");

                            while($row = mysqli_fetch_array($result))
                            {
                              echo "<form action='' method='POST'>";
                              echo "<input type='hidden' value='". $row['id']."' name='branchid' />";
                              echo "<tr>";
                              echo "<td>" . $row['id'] . "</td>";
                              echo "<td>" . $row['name'] . "</td>";
                              echo "<td>" . $row['address'] . "</td>";
                              echo "<td>" . $row['telno'] . "</td>";
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
            © 2019. All Rights Reserved
        </p>
    </div>
    
</body>

</html>