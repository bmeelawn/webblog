<?php
$title = 'Change Password';
include 'includes/header.inc.php';
include 'includes/navbar.inc.php';
include 'includes/changepwd.inc.php';

if (!isset($_SESSION['userid'])) {
    header("Location: login.php");
    exit();
}
?>

<main class="box login-form max-width gutterY">
    <section class="row">
        <div class="col-sm-12 col-md-12">
            <h1 class="title big w-600">Change Password</h1>
            <?php
            if (isset($_POST['changepwd-submit'])) {
                echo $message;
            }
            ?>
            <form action="" method="post">
                <input type="password" name="oldpwd" placeholder="Old Password">
                <input type="password" name="newpwd" placeholder="New Password">
                <input type="password" name="new-repeat-pwd" placeholder="Repeat New Password">
                <button type="submit" name="changepwd-submit" class="btn">Change Password</button>
            </form>
        </div>
    </section>

</main>
<?php
include 'includes/footer.inc.php';
?>