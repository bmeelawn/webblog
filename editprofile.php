<?php

include 'includes/header.inc.php';
include 'includes/navbar.inc.php';
if (!isset($_SESSION['userid'])) {
    header("Location: login.php?msg=loginfirst");
    exit();
}
include 'includes/changename.inc.php';

?>
<main>
    <main class="box login-form max-width gutterY">
        <section class="row">
            <div class="col-sm-12 col-md-12">
                <h1 class="title big w-600">Edit Profile</h1>
                <?php
                if (isset($_POST['changename-submit'])) {
                    echo $message;
                }
                ?>
                <form action="" method="post">
                    <input type="text" name="firstname" value="<?= $_SESSION['firstname'] ?>">
                    <input type="text" name="lastname" value="<?= $_SESSION['lastname'] ?>">
                    <button type="submit" class='btn' name='changename-submit'>Change Name</button>
                </form>
            </div>
            <div class="col-sm-12 col-md-12 gutterY">
                <h1 class="title big w-600">Upload Profile Image</h1>
                <form action="profile.php?change=profile" method="post" enctype="multipart/form-data">
                    <input type="file" id="myfile" name="myfile" multiple>
                    <button type="submit" class='btn' name='profile-submit'>Upload</button>
                </form>
            </div>
        </section>

    </main>
</main>
<?php
include 'includes/footer.inc.php';
?>