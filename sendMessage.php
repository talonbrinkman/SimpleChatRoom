<?php
  $hostStatus = $_POST['posthostStatus'];
  $channelHost = $_POST['postusername'];
  $channelName = $_POST['postchannelName'];
  $channelPassword = $_POST['postchannelPassword'];
  $message = $_POST['postresult'];

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
  //Inserts Channel Data
  $channelMessagesTable = $channelName . '_Messages';
  $sql = "INSERT INTO $channelMessagesTable (Members, Messages, Time)
  VALUES ('$channelHost', '$message', CURRENT_TIMESTAMP)";
  if ($conn->query($sql) === TRUE){
    //echo "New record created successfully";
  } else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
  }
  //Disconnects
  $conn->close();
?>
