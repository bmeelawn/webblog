<?php
$title = "";
include 'includes/header.inc.php';
include 'includes/navbar.inc.php';
if (!isset($_SESSION['userid'])) {
    header("Location: login.php?msg=loginfirst");
    exit();
}
include 'functions.php';


?>

<main class="posts max-width gutterY">
    <ul class="row">
        <li class="col-md-12 col-sm-12">
            <div class="blog-card">
                <div class="blog-body row">
                    <div class="col-md-9 col-sm-12">
                        <h1 class="title big w-600 text-capitalize">
                            <?= $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] ?>
                        </h1>
                        <p class="para p-x-small w-400 text-color text-dim">
                            @<?= $_SESSION['username'] ?>
                        </p>
                        <a href="editprofile.php" class="title small w-400 text-color text-default" style="border: 1px solid #000; padding: 1px 10px; border-radius: 5px">Edit profile</a>
                    </div>
                    <div class="user-profile col-md-3 col-sm-12">
                        <img src="images/profile.jpeg" alt="profile image" class="user-profile">
                    </div>
                </div>
            </div>
        </li>
    </ul>
    <hr>
</main>
<!-- user posts -->
<main class="posts max-width">
    <ul class="row">
        <a href="createpost.php" class='btn ml-auto mr-auto'>Create new post</a>
        <?= getUserPosts(); ?>
    </ul>
</main>
<?php
include 'includes/footer.inc.php';
?>