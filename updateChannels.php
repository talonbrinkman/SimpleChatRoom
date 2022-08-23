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
  //Gets Channels
  $sql = "SELECT * FROM channels";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)){
      if($row['channelPassword'] == ''){
        echo '<div class="channel"><h1>' . $row['channelName'] . '<span>' . $row['channelHost'] . '</span></h1><input type="button" value="Join"></div>';
      }
    }
  }
  else{
    echo '<div class="alert">Currently No Public Channels</div>';
  }
  //Disconnects
  $conn->close();
?>
