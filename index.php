<?php
$title = "Homepage";
include 'includes/db.inc.php';
include 'includes/header.inc.php';
include 'includes/navbar.inc.php';

?>
<!-- Recent post -->
<main class="posts max-width gutterY bottom-too">

    <ul class="row">
        <li class="col-md-12 col-sm-12">
            <a href="">
                <div class="blog-card">
                    <div class="blog-body">
                        <h1 class="title small w-400 text-color text-dim">
                            IOS DEV
                        </h1>
                        <h1 class="title big w-600">
                            How to Enable Developer Mode on Your iPhone
                        </h1>
                        <p class="para p-x-small w-400 text-color text-dim">
                            By using developer mode, you can control the iPhone, install a custom ROM, software or turn on the USB debugging feature. You can turn on the
                        </p>
                        <div class="user-details">
                            <a href="" class="para p-x-small w-400 text-color text-default">Ashish Bogati</a>
                            <p class="para p-x-small w-400 text-color text-dim">Mar 14, 2019</p>
                        </div>
                        <hr>
                    </div>
                </div>
            </a>
        </li>
    </ul>
</main>

<?php
include 'includes/footer.inc.php';
?>