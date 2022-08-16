<?php
  $hostStatus = $_POST['posthostStatus'];
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
    $channelUsersTable = $channelName . '_Users';
    $sql = "DROP TABLE $channelUsersTable";
    if(mysqli_query($conn, $sql)){
      //echo "Table members deleted successfully";
    }
    else{
      //die("Could not delete table: " . mysql_error());
    }
  }else{
    //Updates User Count
    $sql = "UPDATE channels SET users=users-1 WHERE channelName='".$channelName."'";
    if ($conn->query($sql) === TRUE){
      //echo "New record created successfully";
    } else {
      //echo "Error: " . $sql . "<br>" . $conn->error;
    }
    //Inserts Channel Data
    $sql = "INSERT INTO $channelMessagesTable (Members, Messages, Time)
    VALUES ('Server', '$channelHost left', CURRENT_TIMESTAMP)";
    if ($conn->query($sql) === TRUE){
      //echo "New record created successfully";
    } else {
      //echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $channelUsersTable = $channelName . '_Users';
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
