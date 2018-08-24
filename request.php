<?php

if(count($_GET) == 0) {
  header("Location: index.php");
} else {
  require_once('view/top.php');
  require_once('lib/connect.php');
  require_once('config/config.php');
  $conn = db_init($config["host"], $config["dbuser"], $config["dbpw"], $config["dbname"]);

  $filtered_id = mysqli_real_escape_string($conn, $_GET['id']); // prevent sql input by user
  $sql = "SELECT * FROM list WHERE id = {$filtered_id}";
  $result = mysqli_query($conn, $sql);

  $row = mysqli_fetch_array($result);

  echo "<div class='detail_item'><br><p class='list_title center'>{$row['title']}</p>";
  echo "<div id='request_left'><img src=\"{$row['image']}\" class='detailImg detailImg_fixSize'></div>";

}

?>


<form class="requestInfo" action="email_process.php?id=<?=$_GET['id']?>" method="post" onsubmit="return checkRequest()" name="requesting">
  <p><input id="emailRequest" class="textinput" type="email" name="email" placeholder="Your email address" required>
  <span class="highlight"></span>
  <span class="bar"></span></p>
  <p><textarea name="message" rows="5" cols="20" placeholder="Message to owner" required></textarea></p>
  <p><button id="senderBtn" type="submit" name="send" class="button" onclick="saveData('emailRequest')"><i class="fa fa-send-o" style="font-size:15px"></i> Send</button></p>
</form>
</div>
<script src="js/script.js?=v1"></script>
<script>loadStoredDetails('emailRequest');</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
require_once('view/footer.php');
?>
