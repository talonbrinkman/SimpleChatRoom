<?php
  $hostStatus = $_POST['posthostStatus'];
  $channelHost = $_POST['postusername'];
  $channelName = $_POST['postchannelName'];
  $channelPassword = $_POST['postchannelPassword'];

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "simplechatroom";

  $channelUsersTable = $channelName . '_Users';
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  //If Hosting or Joining
  if($hostStatus == "true"){
    //Inserts Channel Data
    $sql = "INSERT INTO channels (`channelName`, `channelPassword`, `channelHost`,`users`)
    VALUES ('$channelName', '$channelPassword', '$channelHost','1')";
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
    //Creates Channel Table
    $channelMessagesTable = $channelName . '_Messages';
    $sql = "CREATE TABLE $channelMessagesTable(
    Members VARCHAR(30) NOT NULL,
    Messages VARCHAR(256) NOT NULL,
    Time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    if ($conn->query($sql) === TRUE){
      //echo "Table MyGuests created successfully";
    } else{
      //echo "Error creating table: " . $conn->error;
    }
    //Inserts Channel Data
    $sql = "INSERT INTO $channelMessagesTable (Members, Messages, Time)
    VALUES ('Server', '$channelHost joined', CURRENT_TIMESTAMP)";
    if ($conn->query($sql) === TRUE){
      //echo "New record created successfully";
    } else {
      //echo "Error: " . $sql . "<br>" . $conn->error;
    }
    //Creates Channel Users Table
    $sql = "CREATE TABLE $channelUsersTable(
    Members VARCHAR(30) NOT NULL,
    isTyping VARCHAR(5) NOT NULL,
    Time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    if ($conn->query($sql) === TRUE){
      //echo "Table MyGuests created successfully";
    } else{
      //echo "Error creating table: " . $conn->error;
    }
    //Inserts Channel Users Data
    $sql = "INSERT INTO $channelUsersTable (Members, Time)
    VALUES ('$channelHost', CURRENT_TIMESTAMP)";
    if ($conn->query($sql) === TRUE){
      //echo "New record created successfully";
    } else {
      //echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
  else{
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
    //Inserts Channel Users Data
    $sql = "INSERT INTO $channelUsersTable (Members, Time)
    VALUES ('$channelHost', CURRENT_TIMESTAMP)";
    if ($conn->query($sql) === TRUE){
      //echo "New record created successfully";
    } else {
      //echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
  //Disconnects
  $conn->close();
?>
