<!DOCTYPE html>
<html>
<title>SCRATCH Thesis Project</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../format.css">
<link rel="stylesheet" href="../font.css">
<link rel="icon" href="../favicon.ico" type="image/x-icon">
<style>
body, h1 {font-family: "Raleway", sans-serif}
body, html {height: 100%; overflow: hidden;}
.bgimg {
    background-image: url('../blackboard.jpg');
    min-height: 100%;
    background-position: center;
}
input[type=text] {
    width: 100%;
    height: 40px;
    padding: 12px 20px;
    margin: 12px 0px;
    font-size: 24px;
    box-sizing: border-box;
    border: 2px solid red;
    border-radius: 2px;
    background-color: rgba(20,20,20,0.15);
    color: rgb(255,255,255);
}
img{
    width: 100%;
    height: auto;
}
</style>

<body onload="move();">
  <div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
    <div class="w3-display-topright w3-padding-small w3-medium">
      <a href="/SCRATCH/">Home</a> | <a href="/SCRATCH/about/">About</a> | <a href="/SCRATCH/login/">Login</a> | <a href="/SCRATCH/signup/">Sign Up</a>
    </div>
    <div class="w3-display-middle w3-center">
      <img class= "w3-animate-top" src="../scratch.png" alt = "Title">
      <?php
        function download()
        {
          $projectID = preg_replace('/[^0-9]/',"",$_REQUEST["project"]);

          exec("wget http://projects.scratch.mit.edu/internalapi/project/" . $projectID . "/get/ -O ../savedProjects/" . $projectID . ".json");
          exec("./convert.sh " . $projectID);
          exec("chmod 777 " . $projectID . ".sb2");
          exec("./convert.py " . $projectID . ".sb2");
          exec("chmod 777 " . $projectID . ".sb");
        }
        download();
      ?>
      </br>
      <div class="w3-light-grey w3-round-xlarge w3-animate-bottom">
        <div id="myBar" class="w3-container w3-blue w3-round-xlarge" style="height:24px;width:1%"></div>
      </div>
      <script>
        function move() {
          var elem = document.getElementById("myBar"); 
          var width = 1;
          var id = setInterval(frame, 30);
          function frame() {
            if (width >= 100) {
              clearInterval(id);
              window.location = '../index.html';
            } else {
              width++; 
              elem.style.width = width + '%'; 
            }
          }
        }
        </script>
    </div>
    <div class="w3-display-bottomleft w3-padding-small w3-tiny">
    Created & Mantained by Joseph O'Neill. Website Repository can be found <a href="https://github.com/oneilljo/SCRATCH_Analysis" target="_blank">here</a>.
    </div>
  </div>
</body>
</html>
