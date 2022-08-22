<?php
  $hostStatus = $_POST['posthostStatus'];
  $channelHost = $_POST['postusername'];
  $channelName = $_POST['postchannelName'];
  $channelPassword = $_POST['postchannelPassword'];

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "simplechatroom";

  $channelMessagesTable = $channelName . '_Messages';
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  //Gets Host Username
  $sql = "SELECT * FROM channels WHERE channelName='".$channelName."'";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)){
      $hostUsername = $row['channelHost'];
    }
  }
  //Return Messages
  $sql = "SELECT * FROM $channelMessagesTable";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)){
      if($row['Members'] == $channelHost){
        if($row['Members'] == $hostUsername){
          echo '<a id="userMessage">' . '<span>' . $row['Members'] . '⭐</span><br>' . $row['Messages'] . '<br><span>' . $row['Time'] . '</a>';
        }
        else{
          echo '<a id="userMessage">' . '<span>' . $row['Members'] . '</span><br>' . $row['Messages'] . '<br><span>' . $row['Time'] . '</a>';
        }
      }
      else{
        if($row['Members'] == $hostUsername){
          echo '<a id="serverMessage">' . '<span>⭐' . $row['Members'] . '</span><br>' . $row['Messages'] . '<br><span>' . $row['Time'] . '</a>';
        }
        else{
          echo '<a id="serverMessage">' . '<span>' . $row['Members'] . '</span><br>' . $row['Messages'] . '<br><span>' . $row['Time'] . '</a>';
        }
      }
      //echo '<div id="line"></div>';
    }
  }
  else{
    //echo "<a>No Channels</a>";
  }
  //Disconnects
  $conn->close();
?>
