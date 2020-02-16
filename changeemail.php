<?php
$title = 'Change Password';
include 'includes/header.inc.php';
include 'includes/navbar.inc.php';
include 'includes/changeemail.inc.php';

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
            if (isset($_POST['changeemail-submit'])) {
                echo $message;
            }
            ?>
            <form action="" method="post">
                <input type="email" name="newemail" placeholder="Enter New Email">
                <input type="password" name="pwd" placeholder="Enter Your Password">
                <button type="submit" name="changeemail-submit" class="btn">Change Email</button>
            </form>
        </div>
    </section>

</main>
<?php
include 'includes/footer.inc.php';
?>