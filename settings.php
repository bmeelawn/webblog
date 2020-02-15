<?php
$title = 'Settings';
include 'includes/header.inc.php';
include 'includes/navbar.inc.php';
if (!isset($_SESSION['userid'])) {
    header("Location: login.php");
    exit();
}
?>
<main class="posts max-width gutterY bottom-too">

    <ul class="row">
        <h1 class='title big ml-auto mr-auto'>Account Settings</h1>
        <li class='col-md-12 col-sm-12'>
            <a href=''>
                <div class='blog-card'>
                    <div class='blog-body'>
                        <h1 class='title small'>
                            Change Password
                        </h1>
                        <hr>
                    </div>
                </div>
            </a>
        </li>

        <li class='col-md-12 col-sm-12'>
            <a href=''>
                <div class='blog-card'>
                    <div class='blog-body'>
                        <h1 class='title small'>
                            Change Username
                        </h1>
                        <hr>
                    </div>
                </div>
            </a>
        </li>

        <li class='col-md-12 col-sm-12'>
            <a href=''>
                <div class='blog-card'>
                    <div class='blog-body'>
                        <h1 class='title small'>
                            Change Email
                        </h1>
                        <hr>
                    </div>
                </div>
            </a>
        </li>

        <li class='col-md-12 col-sm-12'>
            <a href=''>
                <div class='blog-card'>
                    <div class='blog-body'>
                        <h1 class='title small'>
                            Delete account
                        </h1>
                        <h3 class='title x-small text-color text-dim' style="margin-top: 5px;">
                            Permanently delete your account and all of your content.
                        </h3>
                        </h1>
                        <hr>
                    </div>
                </div>
            </a>
        </li>
    </ul>
</main>
<?php
include 'includes/footer.inc.php'
?>