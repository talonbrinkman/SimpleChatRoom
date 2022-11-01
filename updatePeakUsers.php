<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "simplechatroom";
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $users = $_POST['postusers'];
  //Updates Channels Users Count
  $sql = "UPDATE stats SET peakUsers='$users' WHERE id='0'";
  $result = mysqli_query($conn, $sql);
  if($conn->query($sql) === TRUE){
    //echo "New record created successfully";
  }
  else{
    //echo "Error: " . $sql . "<br>" . $conn->error;
  }
  //Disconnects
  $conn->close();
?>
