<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "simplechatroom";

  $search = $_POST['postsearch'];
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
      if($row['channelPassword'] == '' && (str_contains($row['channelHost'],$search) || str_contains($row['channelName'],$search))){
        echo '<div class="channel"><h1>' . $row['channelName'] . '<span>' . $row['channelHost'] . '</span></h1><button id="join" onclick="joinChannel()" disabled data-value="' . $row['channelName'] . '">Join</div>';
      }
    }
  }
  else{
    echo '<div class="alert">Currently No Public Channels</div>';
  }
  //Disconnects
  $conn->close();
?>
