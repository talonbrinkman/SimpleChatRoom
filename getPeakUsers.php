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

  $peakUsers = 0;
  //Updates Channels Users Count
  $sql = "SELECT peakUsers FROM stats WHERE id='0'";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
      $peakUsers = $row['peakUsers'];
    }
  }
  else{
    //echo "Error: " . $sql . "<br>" . $conn->error;
  }
  echo $peakUsers;
  //Disconnects
  $conn->close();
?>
