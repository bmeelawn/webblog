<?php
$title = "Create new post";
include 'includes/header.inc.php';
include 'includes/navbar.inc.php';
include 'includes/createpost.inc.php';
?>
<main class="max-width gutterY">
    <section class="row">
        <div class="col-sm-12 col-md-12">
            <h1 class="title big w-600">Create new post</h1>
            <form action="" method="post">
            <?php 
            if (isset($_POST['createpost-submit'])) {
                echo $message;
            }
            ?>
                <input type="text" name="title" placeholder="Title">
                <input type="text" name="categories" placeholder="Categories">
                <textarea name="body" id="editor" cols="30" rows="10"></textarea>
                <div class="ml-auto mr-auto">
                    <button type="submit" name="createpost-submit" class="btn">Post</button>
                </div>
            </form>
        </div>
    </section>

</main>
<?php
include 'includes/footer.inc.php';
?>