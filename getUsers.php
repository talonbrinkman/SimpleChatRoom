<?php
  $search = $_POST['postsearch'];

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

  //Gets Users
  $sql = "SELECT * FROM users";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)){
      $username = $row['username'];
      $channel = $row['channel'];
      $time = $row['time'];
      if(str_contains($username,$search) || str_contains($channel,$search)){
        echo '<div class="user"><h1>' . $username . '<span> ' . $channel . ' ' . $time . '</span></h1></div>';
      }
    }
  }
  else{
    echo '<div class="alert">Currently No Users</div>';
  }
  //Disconnects
  $conn->close();
?>
