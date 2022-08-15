
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
    <div class="gridContainer">
      <div class="patchNotes">
        <h1>Patch Notes V2.0</h1>
        <p>&#8226; Bug Fixes</p>
        <p>&#8226; New styling changes</p>
        <p>&#8226; <span>Enter Key Send</span> Feature added</p>
        <p>&#8226; <span>Auto Leave</span> feature added</p>
        <p>&#8226; <span>Patch Notes</span> feature added</p>
        <p>&#8226; Faster message update timings</p>
      </div>
      <div class="login">
        <div class="inputs">
          <input id="username" placeholder="Username" autocomplete="off" autofocus>
          <input id="channelName" placeholder="Channel Name" autocomplete="off">
          <input id="channelPassword" placeholder="Channel Password" autocomplete="off">
        </div>
        <div class="options">
          <input type="button" value="Host" onclick="hostChannel();">
          <input type="button" value="Join" onclick="joinChannel();">
        </div>
      </div>
      <div class="patchNotes" style="grid-column-start: 3;">
        <h1>Coming in V2.1</h1>
        <p>&#8226; Bug Fixes</p>
        <p>&#8226; Special characters ability</p>
        <p>&#8226; Faster message update timings</p>
        <p>&#8226; Advanced Password Input</p>
        <p>&#8226; Simplified Timestamps</p>
        <p>&#8226; Active Users feature</p>
        <p>&#8226; Host Identifier</p>
      </div>
    </div>
    <div class="footer">
      <h1>powered by Bain</h1>
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
