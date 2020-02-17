<?php
$title = "Searchpage";
include 'includes/db.inc.php';
include 'includes/header.inc.php';
include 'includes/navbar.inc.php';
include 'functions.php';

?>

        <!-- Search post -->
<main class="posts max-width gutterY bottom-too">

    <ul class="row">
   <?php
        echo getSearchPosts();
   ?>
    </ul>
</main>

<?php
include 'includes/footer.inc.php';
?>
