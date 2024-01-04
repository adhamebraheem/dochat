<?php
include('db.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DoChat</title>
    <link rel="stylesheet" href="style.css">
</head>
<script>
 
    function aj() {
        var req = new XMLHttpRequest();
        req.onreadystatechange = function () {
            if (req.readyState==4 && req.status == 200) {
                document.getElementById('chat').innerHTML = req.responseText;
            }
        }
    req.open('GET', 'chat.php', true);
    req.send();
    }

    setInterval(function () {
        aj();
    }, 1000);

</script>
<body onload="aj();">
    
<div id="container">
    <div id="chatbox">
        <div id="chat"></div>
       
    
    </div>

<form action="index.php" method="post">
   <input type="text" name="name"placeholder="Enter your name">
   <textarea name="msg" placeholder="Enter your message" ></textarea>
   <input type="submit" name="submit" value="send">
</form>
<?php
if(isset($_POST['submit'])){
    $n = $_POST['name'];
    $m = $_POST['msg']; 
    $insert = "INSERT INTO chat (name, msg) VALUES ('$n', '$m')";
    $run_insert = mysqli_query($con, $insert);

    if ($run_insert) {
        echo '<embed loop="false" hidden="true" src="Walki.mp3" autoplay="true">';
    }
    
}
?>



</div>



</body >
</html>