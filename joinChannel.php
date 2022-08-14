<?php
  $channelHost = $_POST['postusername'];
  $channelName = $_POST['postchannelName'];
  $channelPassword = $_POST['postchannelPassword'];

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "simplechatroom";
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  //Inserts Channel Data
  $sql = "INSERT INTO $channelName (Members, Messages, Time)
  VALUES ('Server', '$channelHost joined', CURRENT_TIMESTAMP)";
  if ($conn->query($sql) === TRUE){
    //echo "New record created successfully";
  } else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
  }

  //Gets Current User Count
  //$sql = "SELECT users FROM channels";
  //$result = mysqli_query($conn, $sql);
  //$userCount = mysqli_fetch_all($result, MYSQLI_ASSOC);
  //print_r($userCount);

  //Updates User Count
  $sql = "UPDATE channels SET users=users+1 WHERE channelName='".$channelName."'";
  if ($conn->query($sql) === TRUE){
    //echo "New record created successfully";
  } else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
  }

  //Disconnects
  $conn->close();
?>
