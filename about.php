<?php
require_once('view/top.php');
?>

<link rel="stylesheet" href="style/about_contact.css">

<div class="about-banner">
</div><br>

<div class="about-us">
    <h2 class="about-h2">What is BCIT books?</h2>
    <p class="about-desc">A platform for BCIT students to buy and sell used textbooks.
    </p>

    <h2 class="about-h2">How it works</h2>
    
    <div class="about-desc">
        <p class="about-mission"><i>How to post textbooks</i></p>
        <ol>
            <li>Upload a picture of your textbook(s)</li>
            <li>Fill out the details of the book(s)</li>
            <li>Enter an email address you wish to be contacted through</li>
            <li>Create a password so you can edit or delete your post later</li>
            <li>Post it and wait for someone make a request</li>
        </ol>
    </div>

    <div class="about-desc">
        <p class="about-mission"><i>How to request textbooks</i></p>
        <ol>
            <li>Search for the textbooks you are looking for</li>
            <li>Click the request button</li>
            <li>Contact the seller</li>
            <li>Set up a time and place for exchange</li>
        </ol>
    </div>

    <div class="">
      <br><br>
      <p></p>
    </div>

</div>

<script>
    var aboutBtn = document.getElementById("aboutBtn");
    aboutBtn.classList.add("active");
</script>




<?php
require_once('view/footer.php');
?>
