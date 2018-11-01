<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chatter App</title>
    <link rel="stylesheet" href="main.css" type="text/css" media="screen" />
    <link rel = "stylesheet" type = "text/css" href = "chatterhome.css" />
</head>
<body>
  <div class="topnav">
      <div class="image">
          <img src="./background.png" class="responsive">
          <h1>Chatter</h1>
          <a href="#logout.php">Log Out</a>

      </div>
  </div><br/>
    <div class="container">
        <main>
           <div class="userSettings">
		<label for="userName">Username:</label>
		<input id="userName" type="text" placeholder="Username" maxlength="32" required>
	    </div>
            <div class="chat">
		<div id="chatOutput"></div>
		<button id="chatSend">Send It!</button>
		<input id="chatInput" type="text" placeholder="Input Text" maxlength="145" required>
	    </div>
        </main>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="chatter.js"></script>
</body>
</html>
