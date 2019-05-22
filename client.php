<?php
  require_once('Config.php');
?>
<!DOCTYPE html>
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
                <li class="selected">
                    <a href="client.php">Client</a>
                </li>
                <li>
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

    <div>
                      <?php
                      
                        if( isset($_POST['delete'])){

                          $sql = "DELETE FROM clients WHERE id=" . $_POST['clientid'];
                      
                          if($db->query($sql) === TRUE){
                      
                              echo "<div class='alert alert-success'>Successfully deleted client</div>";
                      
                          }
                      
                      }
                        
                      ?>
                    </div>


        <div class="container">
            <h2>Client Details</h2>
           
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Client Number</th>
                  <th>Client Name</th>
                  <th>Client Type</th>
                  <th>Mobile</th>
                  <th>Email</th>
                  <th>Initial Amount</th>
                </tr>
              </thead>
              <tbody>

              <?php

                            $result = mysqli_query($db,"SELECT * FROM clients");

                            while($row = mysqli_fetch_array($result))
                            {
                              echo "<form action='' method='POST'>";
                              echo "<input type='hidden' value='". $row['id']."' name='clientid' />";
                              echo "<tr>";
                              echo "<td>" . $row['clientnumber'] . "</td>";
                              echo "<td>" . $row['name'] . "</td>";
                              echo "<td>" . $row['type'] . "</td>";
                              echo "<td>" . $row['mobile'] . "</td>";
                              echo "<td>" . $row['email'] . "</td>";
                              echo "<td>" . $row['amount'] . "</td>";
                              echo "<td><input type='submit' name='delete' value='Delete' class='btn btn-danger' /></td>";
                              echo "</tr>";
                              echo "</form>";
                            }

                            ?>


               
              </tbody>
            </table>

            <br>
            <br>
            <br>
          </div>

    </div>

    
    
</body>

</html>