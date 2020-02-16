<?php
$title = 'Change Password';
include 'includes/header.inc.php';
include 'includes/navbar.inc.php';
include 'includes/changeusername.inc.php';

if (!isset($_SESSION['userid'])) {
    header("Location: login.php");
    exit();
}
?>

<main class="box login-form max-width gutterY">
    <section class="row">
        <div class="col-sm-12 col-md-12">
            <h1 class="title big w-600">Change Username</h1>
            <?php
            if (isset($_POST['changeusername-submit'])) {
                echo $message;
            }
            ?>
            <form action="" method="post">
                <input type="text" value="<?=$_SESSION['username']?>" readonly>
                <input type="text" name="newusername" placeholder="New Username">
                <input type="password" name="pwd" placeholder="Enter Your Password">
                <button type="submit" name="changeusername-submit" class="btn">Change Username</button>
            </form>
        </div>
    </section>

</main>
<?php
include 'includes/footer.inc.php';
?>