<?php

// it only works when user comes to this page with normal process
if(!isset($_POST['id'])) {
  header("Location: index.php");
  exit;
} else {

  require_once('view/top.php');
  require_once('lib/connect.php');
  require_once('config/config.php');
  $conn = db_init($config["host"], $config["dbuser"], $config["dbpw"], $config["dbname"]);

  $sql = "SELECT * FROM list WHERE id = {$_POST['id']}";
  $result = mysqli_query($conn, $sql);

  $row = mysqli_fetch_array($result);

  //prevent cross scripting attack
  $escaped = array(
    'title' => htmlspecialchars($row['title']),
    'email' => htmlspecialchars($row['email']),
    'image' => htmlspecialchars($row['image']),
    'status' => htmlspecialchars($row['status']),
    'description' => htmlspecialchars($row['description']),
  );

  // used for radio button check status
  if(strcasecmp($row['location'], "Burnaby Campus") == 0 ) {
    $checked_Burnaby = "checked";
    $checked_Downtown = "";
  } else {
    $checked_Burnaby = "";
    $checked_Downtown = "checked";
  }

}

?>

<div class = "detail_item">
  <p class="list_title center"><?=$escaped['title']?></p>
  <form class="form" action="edit_process.php" name ="posting" onsubmit="return checkEdit()" method="post">
    <input type="hidden" name="id" value="<?=$_POST['id']?>">
    
  <div id="edit_left">
    <p class="center">
      <label><input type="radio" name="status" value="Available" checked>Available</label>&nbsp;<i class='fa fa-check-circle' style='font-size:24px;color:green'></i>
      <label><input type="radio" name="status" value="Taken">Taken</label><i class='fa fa-times-circle' style='font-size:24px;color:grey'></i>
    </p>
    <img id='editImg' src="<?=$escaped['image']?>" class='detailImg detailImg_fixSize'>
    </div> 

<div id="edit_right">
    <p>
      <input class="textinput" type="text" name="title" value="<?=$escaped['title']?>">
      <span class="highlight"></span>
      <span class="bar"></span>
    </p>
    <p><textarea name="description" rows="3" cols="20"><?=$escaped['description']?></textarea></p>
    <div class="pickup">
      <p>Pick-up campus</p>
      <p><label><input type="radio" name="location" value="Burnaby Campus" <?=$checked_Burnaby?>>Burnaby</label>
      <label><input type="radio" name="location" value="Downtown Campus" <?=$checked_Downtown?>>Downtown</label></p>
    </div>
  
    <p>
      <input class="textinput" type="password" name="password" placeholder="Password" onkeyup="pwd_validation(); return false;">
      <span class="highlight"></span>
      <span class="bar"></span>
    </p>
    <p class="confirmPsw">
      <input class="textinput" type="password" name="password2" placeholder="Confirming password" onkeyup="pwd_validation(); return false;">
      <span class="highlight"></span>
      <span class="bar"></span>
    </p>
    <span class="pswcheck">*password must be between 4 to 20 characters and can contain letters, numbers or symbols.</span>
    <p>
      <input class="textinput" type="email" name="email" value="<?=$escaped['email']?>">
      <span class="highlight"></span>
      <span class="bar"></span>  
    </p>

    <div class="toggleDiv">
      <input type="checkbox" id="toggle"/>
      <label for="toggle">
          <span>
              Terms of Use&nbsp;
              <span class="changeArrow arrow-up"><img src="img/arrow-up.png" alt="up"></span>
              <span class="changeArrow arrow-dn"><img class="arrowDown"  src="img/arrow-down.png" alt="down"></span>
          </span>
      </label>
      <div class="fieldsetContainer">
         <p class="ToU">By uploading to this site, you, the user agree that the food item is not expired, nor has it been opened.
         This site was made under the pretense that a faithful and caring community (BCIT) exists.</p>
      </div>

      <p><button type="submit" id="saveEdit" name="submit" class="button" onclick="if(!this.form.checkbox.checked){alert('You must agree to the terms of use.');return false}"><i class="fa fa-save" style="font-size:15px"></i> Save</button></p>
    </div>

  </div>

  </form>

</div> <!-- detail item -->



<br>

 <script src="js/script.js"></script>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
require_once('view/footer.php');
 ?>


