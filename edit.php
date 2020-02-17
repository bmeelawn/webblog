<?php
$title = 'edit post';
include 'includes/header.inc.php';
include 'includes/navbar.inc.php';
include 'functions.php';
?>

<main class="max-width gutterY">
    <section class="row">
        <?php
        $post_id = $_GET['id'];
        editPost($post_id);
        ?>
    </section>
</main>
<?php
include 'includes/footer.inc.php';
?>