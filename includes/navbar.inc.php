<?php

include "db.inc.php";
session_start();
?>

<header class="navbar-expand-md navbar-light bg-light" style="background: #fff !important">
    <div class="max-width">
        <nav class="navbar navbar-default">
            <a class="navbar-brand" href="index.php">IOS DEV</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <?php if (!isset($_GET['username'])) { ?>
                <form class="search-box form-inline my-2 my-lg-0 ml-auto" action="search.php" role="search" method="post">
                    <div class="input-holder">
                        <input type="text" name="search" placeholder="Search">
                        <button type="submit" name="search-submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>
                </form>
            <?php } else { ?>
                <form class="search-box form-inline my-2 my-lg-0 ml-auto" action="userpostssearch.php?username=<?=$_SESSION['username']?>" role="search" method="post">
                    <div class="input-holder">
                        <input type="text" name="search" placeholder="Search">
                        <button type="submit" name="search-submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>
                </form>
            <?php } ?>
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">About us</a>
                    </li>


                    <!-- Remove login and signup nav for login user -->
                    <?php if (!isset($_SESSION['userid'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="signup.php">Signup</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?= $_SESSION['username'] ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-capitalize" href="profile.php?username=<?= $_SESSION['username'] ?>"><?= $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] ?></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="settings.php">Settings</a>
                                <a class="dropdown-item" href="includes/logout.inc.php">Logout</a>
                            </div>
                            <!-- dropdown menu js -->
                            <script>
                                let dropdown = document.querySelector('.dropdown');
                                let dropdownMenu = document.querySelector('.dropdown-menu');
                                dropdown.onclick = function() {
                                    dropdownMenu.classList.toggle('show');
                                }
                            </script>
                        </li>
                    <?php } ?>

                </ul>
            </div>
        </nav>
    </div>
</header>