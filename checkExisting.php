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
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  //Checks for Existing Channel
  $channelAlreadyExists = 'false';
  $sql = "SELECT channelName FROM channels";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)){
      if($row['channelName'] == $channelName){
        //Channel Exists
        $channelAlreadyExists = 'true';
      }
    }
  }
  echo "$channelAlreadyExists";
  //Disconnects
  $conn->close();
?>
