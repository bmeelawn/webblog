<?php
$title = "Signup";
include 'includes/header.inc.php';
include 'includes/navbar.inc.php';
include 'includes/signup.inc.php';

if (isset($_SESSION['userid'])) {
    header("location: index.php");
}

?>
<main class="box login-form max-width gutterY">
    <section class="row">
        <div class="col-sm-12 col-md-12">
            <h1 class="title big w-600">Signup</h1>

            <?php if (isset($_POST['signup-submit'])) {
                echo $message;
            }
            ?>

            <form action="" method="post">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <input type="text" name="username" placeholder="Username">
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <input type="text" name="email" placeholder="Email">
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <input type="text" name="firstname" placeholder="Firstname">

                    </div>
                    <div class="col-md-6 col-sm-12">
                        <input type="text" name="lastname" placeholder="Lastname">

                    </div>
                    <div class="col-md-6 col-sm-12">
                        <input type="password" name="pwd" placeholder="Password">
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <input type="password" name="repeat-pwd" placeholder="Repeat Password">
                    </div>
                    <div class="ml-auto mr-auto">
                        <button type="submit" name="signup-submit" class="btn">Signup</button>

                    </div>

                </div>

            </form>
        </div>
    </section>

</main>
<?php
include 'includes/footer.inc.php';
?>