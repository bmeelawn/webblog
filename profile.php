<?php
include 'includes/header.inc.php';
include 'includes/navbar.inc.php';
?>

<main class="posts max-width gutterY">
    <ul class="row">
        <li class="col-md-12 col-sm-12">
            <div class="blog-card">
                <div class="blog-body row">
                    <div class="col-md-9 col-sm-12">
                        <h1 class="title big w-600">
                            John smith
                        </h1>
                        <p class="para p-x-small w-400 text-color text-dim">
                            @johnsmith
                        </p>
                        <a href="#" class="title small w-400 text-color text-default" style="border: 1px solid #000; padding: 1px 10px; border-radius: 5px">Edit profile</a>
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