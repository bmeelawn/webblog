<?php

$title = 'edit post';
include 'includes/header.inc.php';
include 'includes/navbar.inc.php';
include 'functions.php';
include 'includes/editpost.inc.php';
?>

<main class="max-width gutterY">
    <section class="row">
        <div class='col-sm-12 col-md-12'>
            <h1 class='title big w-600'>Edit post</h1>
            <?php
            if (isset($_POST['updatepost-submit'])) {
                echo $message;
            }
            $post_id = $_GET['id'];
            editPost($post_id);
            ?>
        </div>
    </section>
</main>
<?php
include 'includes/footer.inc.php';
?>