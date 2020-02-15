<?php
$title = "Login";
include 'includes/header.inc.php';
include 'includes/navbar.inc.php';
include 'includes/login.inc.php';

if (isset($_SESSION['userid'])) {
    header("location: index.php");
}

?>
<main class="box login-form max-width gutterY">
    <section class="row">
        <div class="col-sm-12 col-md-12">
            <h1 class="title big w-600">Login</h1>
            <form action="" method="post">

                <?php if (isset($_POST['login-submit'])) {
                    echo $message;
                }
                ?>

                <input type="text" name="uid" placeholder="Email/Username">
                <input type="password" name="pwd" placeholder="Password">
                <a href="" class="text-color text-dim">Forgot your password</a>
                <button type="submit" name="login-submit" class="btn">Login</button>
            </form>
        </div>
    </section>

</main>
<?php
include 'includes/footer.inc.php';
?>