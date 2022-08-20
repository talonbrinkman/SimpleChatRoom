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
  $channelMessagesTable = $channelName . '_Messages';
  $sql = "INSERT INTO $channelMessagesTable (Members, Messages, Time)
  VALUES ('Server', '$channelHost joined', CURRENT_TIMESTAMP)";
  if ($conn->query($sql) === TRUE){
    //echo "New record created successfully";
  } else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
  }
  //Inserts Users Data
  $sql = "INSERT INTO users (username, channel, Time)
  VALUES ('$channelHost', '$channelName', CURRENT_TIMESTAMP)";
  if ($conn->query($sql) === TRUE){
    //echo "New record created successfully";
  } else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
  }
  //Updates User Count
  $sql = "UPDATE channels SET users=users+1 WHERE channelName='".$channelName."'";
  if ($conn->query($sql) === TRUE){
    //echo "New record created successfully";
  } else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $channelUsersTable = $channelName . '_Users';
  //Inserts Channel Users Data
  $sql = "INSERT INTO $channelUsersTable (Members, Time)
  VALUES ('$channelHost', CURRENT_TIMESTAMP)";
  if ($conn->query($sql) === TRUE){
    //echo "New record created successfully";
  } else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
  }
  //Disconnects
  $conn->close();
?>
