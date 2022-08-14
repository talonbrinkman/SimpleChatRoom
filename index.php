
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Simple Chat Room</title>
    <link rel="stylesheet" href="main.css?v=<?php echo time(); ?>">
    <link rel="icon" type="image/x-icon" href="favicon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  </head>
  <body>
    <div class="header">
      <h1>Simple Chat Room</h1>
    </div>
    <div class="login">
      <div class="inputs">
        <input id="username" placeholder="Username">
        <input id="channelName" placeholder="Channel Name">
        <input id="channelPassword" placeholder="Channel Password">
      </div>
      <div class="options">
        <input type="button" value="Host" onclick="hostChannel();">
        <input type="button" value="Join" onclick="joinChannel();">
      </div>
    </div>
    <script>
      function joinChannel(){
        var hostStatus = "false";
        var username = document.getElementById("username").value;
        var channelName = document.getElementById("channelName").value;
        var channelPassword = document.getElementById("channelPassword").value;

        sessionStorage.setItem("hostStatus", hostStatus);
        sessionStorage.setItem("username", username);
        sessionStorage.setItem("channelName", channelName);
        sessionStorage.setItem("channelPassword", channelPassword);

        if(username !== "" && channelName !== "" && channelPassword !== ""){
          var username = $('#username').val();
          var channelName = $('#channelName').val();
          var channelPassword = $('#channelPassword').val();

          $.post('joinChannel.php',{postusername:username,postchannelName:channelName,postchannelPassword:channelPassword},
          function(){});
          location.href = '/simplechatroom/channel.php';
        }
        else{
          alert("Error 400");
        }
      }
      function hostChannel(){
        var hostStatus = "true";
        var username = document.getElementById("username").value;
        var channelName = document.getElementById("channelName").value;
        var channelPassword = document.getElementById("channelPassword").value;

        sessionStorage.setItem("hostStatus", hostStatus);
        sessionStorage.setItem("username", username);
        sessionStorage.setItem("channelName", channelName);
        sessionStorage.setItem("channelPassword", channelPassword);

        if(username !== "" && channelName !== "" && channelPassword !== ""){
          var username = $('#username').val();
          var channelName = $('#channelName').val();
          var channelPassword = $('#channelPassword').val();

          $.post('createChannel.php',{postusername:username,postchannelName:channelName,postchannelPassword:channelPassword},
          function(){});
          location.href = '/simplechatroom/channel.php';
        }
        else{
          alert("Error 400");
        }
      }
    </script>
  </body>
</html>
