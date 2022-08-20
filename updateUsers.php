<?php
  $hostStatus = $_POST['posthostStatus'];
  $channelHost = $_POST['postusername'];
  $channelName = $_POST['postchannelName'];
  $channelPassword = $_POST['postchannelPassword'];
  $isTyping = $_POST['postisTyping'];

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "simplechatroom";

  $channelUsersTable = $channelName . '_Users';
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  //Gets Channels Users
  $sql = "SELECT * FROM $channelUsersTable";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)){
      if($row['isTyping'] == 'true'){
        echo '<h1 id="isTyping">' . $row['Members'] .'</h1>';
      }
      else{
        echo '<h1 id="notTyping">' . $row['Members'] .'</h1>';
      }
    }
  }
  else{
    //echo "<a>No Channels</a>";
  }
  //Updates Channels Users Count
  $sql = "SELECT * FROM $channelUsersTable";
  $result = mysqli_query($conn, $sql);
  $row= mysqli_num_rows($result);
  $userCount = (int)$row;
  $sql = "UPDATE channels SET users='$userCount' WHERE channelName='".$channelName."'";
  if ($conn->query($sql) === TRUE){
    //echo "New record created successfully";
  } else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
  }
  //Updates Channel Users isTyping Data
  $sql = "UPDATE $channelUsersTable SET isTyping='$isTyping' WHERE Members='".$channelHost."'";
  if ($conn->query($sql) === TRUE){
    //echo "New record created successfully";
  } else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
  }
  //Disconnects
  $conn->close();
?>
