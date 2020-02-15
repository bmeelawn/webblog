<?php
$title = "Homepage";
include 'includes/db.inc.php';
include 'includes/header.inc.php';
include 'includes/navbar.inc.php';
include 'functions.php';
?>
<!-- Recent post -->
<main class="posts max-width gutterY bottom-too">

    <ul class="row">
        <?= getAllPosts(); ?>
    </ul>
</main>

<?php
include 'includes/footer.inc.php';
?>