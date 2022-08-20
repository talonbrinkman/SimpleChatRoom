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
  //Drops Users Data
  $sql = "DELETE FROM users WHERE username = '$channelHost'";
  if ($conn->query($sql) === TRUE){
    //echo "Record deleted successfully";
  }
  else{
    //echo "Error deleting record: " . $conn->error;
  }
  //If Host / If not Host
  if ($hostStatus == "true") {
    //Drops Channel Data
    $channelMessagesTable = $channelName . '_Messages';
    $sql = "DELETE FROM channels WHERE channelName = '$channelName'";
    if ($conn->query($sql) === TRUE){
      //echo "Record deleted successfully";
    }
    else{
      //echo "Error deleting record: " . $conn->error;
    }
    //Drops Channel Table
    $sql = "DROP TABLE $channelMessagesTable";
    if(mysqli_query($conn, $sql)){
      //echo "Table members deleted successfully";
    }
    else{
      //die("Could not delete table: " . mysql_error());
    }
    //Drops Channel Users Table
    $sql = "DROP TABLE $channelUsersTable";
    if(mysqli_query($conn, $sql)){
      //echo "Table members deleted successfully";
    }
    else{
      //die("Could not delete table: " . mysql_error());
    }
  }else{
    //Inserts Channel Data
    $channelMessagesTable = $channelName . '_Messages';
    $sql = "INSERT INTO $channelMessagesTable (Members, Messages, Time)
    VALUES ('Server', '$channelHost left', CURRENT_TIMESTAMP)";
    if ($conn->query($sql) === TRUE){
      //echo "New record created successfully";
    } else {
      //echo "Error: " . $sql . "<br>" . $conn->error;
    }
    //Drops Channel Users Data
    $sql = "DELETE FROM $channelUsersTable WHERE Members = '$channelHost'";
    if ($conn->query($sql) === TRUE){
      //echo "Record deleted successfully";
    }
    else{
      //echo "Error deleting record: " . $conn->error;
    }
  }
  //Disconnects
  $conn->close();
?>
