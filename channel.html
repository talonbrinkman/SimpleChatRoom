
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title id="title">Channel</title>
    <link rel="icon" type="image/x-icon" href="favicon.png">
    <link rel="stylesheet" href="main.css?v=<?php echo time(); ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  </head>
  <body>
    <div class="header">
      <h1 id="channelTitle">Simple Chat Room</h1>
    </div>
    <div class="messageBox" id="messageBox">

    </div>
    <div class="messageBar">
      <input type="button" id="exit" value="Leave" onclick="exitChannel();">
      <input type="text" id="message" placeholder="Message..." autofocus>
      <input type="button" id="send" value="Send" onclick="sendMessage();">
    </div>
    <div class="footer">
      <h1>powered by Bain</h1>
    </div>
    <script>
      var hostStatus = sessionStorage.getItem("hostStatus");
      var username = sessionStorage.getItem("username");
      var channelName = sessionStorage.getItem("channelName");
      var channelPassword = sessionStorage.getItem("channelPassword");
      document.title = channelName + " - " + username;
      console.log("Client Username: " + username + " | Channel Name: " + channelName + " | Channel Password: " + channelPassword + " | Host: " + hostStatus);

      var send = document.getElementById("message");
      send.addEventListener("keydown", function (e) {
          if (e.code === "Enter") {  //checks whether the pressed key is "Enter"
              validate(e);
          }
      });
      function validate(e) {
        var text = e.target.value;
        sendMessage();
      }
      function sendMessage(){
        var message = document.getElementById("message").value;
        document.getElementById("message").value = "";
        $.post('sendMessage.php',{posthostStatus:hostStatus,postusername:username,postchannelName:channelName,postchannelPassword:channelPassword,postmessage:message},
        function()
        {});
      }
      function exitChannel(){
        $.post('exitChannel.php',{posthostStatus:hostStatus,postusername:username,postchannelName:channelName,postchannelPassword:channelPassword},
        function()
        {});
        location.href = '/simplechatroom';
      }
      setInterval(function updateMessages(){
        const messageBox = document.getElementById('messageBox');
        if (messageBox.textContent.includes("doesn't exist")){
          exitChannel();
        }
        document.getElementById("channelTitle").innerHTML = "Channel - " + channelName;
        var element = document.getElementById("messageBox");
        element.scrollTop = element.scrollHeight;
        $.post('updateMessages.php',{posthostStatus:hostStatus,postusername:username,postchannelName:channelName,postchannelPassword:channelPassword},
        function(data){
          if(data != ""){
            $('#messageBox').html(data);
          }
        });
      }, 500);
    </script>
  </body>
</html>
