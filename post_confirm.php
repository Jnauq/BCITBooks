<?php
// Post confirmation process

if(count($_POST) == 0) {
  header("Location: index.php");
  exit;
} else {
  require_once('view/top.php');

  $escaped = array(
    'title' => htmlspecialchars($_POST['title']),
    'email' => htmlspecialchars($_POST['email']),
    'price' => htmlspecialchars($_POST['price']),
    'course' => htmlspecialchars($_POST['course']),
    'author' => htmlspecialchars($_POST['author']),
    'isbn' => htmlspecialchars($_POST['isbn']),
    'description' => htmlspecialchars($_POST['description']),
);

  // information of the posting
  echo "<div id = 'contactPage' class = 'detail_item'>";
  echo "<p class='list_title'>Please confirm</p><br>";
  echo "<p><b>Email: </b> " . $escaped['email'] . "</p>";
  echo "<p><b>Title: </b> " . $escaped['title'] . "</p>";
  echo "<p><b>Course: </b> " . $escaped['course'] . "</p>";
  echo "<p><b>Author: </b> " . $escaped['author'] . "</p>";
  echo "<p><b>ISBN: </b> " . $escaped['isbn'] . "</p>";
  echo "<p><b>Pick-up location</b> ". $_POST["location"] . "</p>";
  echo "<p><b>Description: </b> " . $escaped['description'] . "</p>";
  echo "<p><b>Price: </b> " . $escaped['price'] . "</p>";
  echo "<img src='{$_POST['path']}' alt=\"photo\" class='detailImg'>";

}
?>

<!-- Passing input values to process page as hidden inputs -->
<form action="create_process.php" name ="posting" method="post" id="confirmForm">

  <input type="hidden" name="password" value="<?= $_POST['password'] ?>" ><br>
  <input type="hidden" name="email" value="<?= $_POST['email'] ?>"><br>
  <input type="hidden" name="title" value="<?= $_POST['title'] ?>">
  <input type="hidden" name="course" value="<?= $_POST['course'] ?>">
  <input type="hidden" name="author" value="<?= $_POST['author'] ?>">
  <input type="hidden" name="isbn" value="<?= $_POST['isbn'] ?>">
  <input type="hidden" name="description" value="<?= $_POST["description"] ?>">
  <input type="hidden" name="price" value="<?= $_POST['price'] ?>">
  <input type="hidden" name="image" value="<?= $_POST['path'] ?>">
  <input type="hidden" name="location" value="<?= $_POST['location'] ?>" >
</form>
  <button onclick="goBack()" class="emptybtn"><i class="fas fa-edit" style="font-size:15px;color:green"></i> Edit</button>
  <button class="confirmbtn" id="confirmBtn"><i class="fas fa-check" style="font-size:15px"></i> Confirm</button>


<script src="js/script.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
// go back to the previous page
function goBack() {
    window.history.back();
}


</script>

<?php
require_once('view/footer.php');
 ?>
