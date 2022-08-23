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
  //Checks for Duplicate Username
  $usernameAlreadyExists = 'false';
  $sql = "SELECT username FROM users";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)){
      if($row['username'] == $channelHost){
        //Username Already Exists
        $usernameAlreadyExists = 'true';
      }
    }
  }
  echo "$usernameAlreadyExists";
  //Disconnects
  $conn->close();
?>
