<?php

function getAllPosts()
{
    global $conn;
    $sql = "SELECT * FROM posts";
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            $post_id = $row['post_id'];
            $post_category = $row['category'];
            $post_title = $row['title'];
            $post_body = $row['body'];
            $post_user_id = $row['user_id'];
            $new_trim_post = substr($post_body, 0, 137);
            $post_author = $row['author'];
            $date_year = date('yy', strtotime($row['created_at']));
            $date_day = date('d', strtotime($row['created_at']));
            $date_month = date('M', strtotime($row['created_at']));
            if (isset($_SESSION['userid'])) {
                if ($_SESSION['userid'] === $post_user_id) {
                    $edit = "
                    <div class='dropdown'>
                        <div class='edit-drop' data-toggle='dropdown'><svg class='svgIcon-use' width='25' height='25'><path d='M5 12.5c0 .552.195 1.023.586 1.414.39.39.862.586 1.414.586.552 0 1.023-.195 1.414-.586.39-.39.586-.862.586-1.414 0-.552-.195-1.023-.586-1.414A1.927 1.927 0 0 0 7 10.5c-.552 0-1.023.195-1.414.586-.39.39-.586.862-.586 1.414zm5.617 0c0 .552.196 1.023.586 1.414.391.39.863.586 1.414.586.552 0 1.023-.195 1.414-.586.39-.39.586-.862.586-1.414 0-.552-.195-1.023-.586-1.414a1.927 1.927 0 0 0-1.414-.586c-.551 0-1.023.195-1.414.586-.39.39-.586.862-.586 1.414zm5.6 0c0 .552.195 1.023.586 1.414.39.39.868.586 1.432.586.551 0 1.023-.195 1.413-.586.391-.39.587-.862.587-1.414 0-.552-.196-1.023-.587-1.414a1.927 1.927 0 0 0-1.413-.586c-.565 0-1.042.195-1.432.586-.39.39-.586.862-.587 1.414z' fill-rule='evenodd'></path></svg></div>
                        <div class='dropdown-menu'>
                        <a class='dropdown-item' href='edit.php?id=$post_id'>Edit</a>
                        <a class='dropdown-item text-danger' href='includes/deletepost.inc.php?id=$post_id'>Delete</a>
                    </div>
                    </div>

                ";
                } else {
                    $edit = "";
                }
            } else {
                $edit = '';
            }
            echo "
            <li class='col-md-12 col-sm-12'>
                <a href='post.php?id=$post_id'>
                    <div class='blog-card'>
                        <div class='blog-body'>
                        
                            <h5 class='title x-small w-400 text-color text-dim text-upper'>
                                $post_category
                            </h5>
                            <div class='row '>
                            <div class='col'>
                            <h1 class='title big w-600'>
                                $post_title
                            </h1>
                            </div>
                            
                            </div>
                            <h5 class='paragraph p-x-small w-400 text-color text-dim'>
                                $new_trim_post
                            </h5>
                            <div class='user-details'>
                                <a href='' class='para p-x-small w-400 text-color text-default text-capitalize'>$post_author</a>
                                <h5 class='para p-x-small w-400 text-color text-dim'>$date_month $date_day, $date_year</h5>
                            </div>
                            <hr>
                        </div>
                    </div>
                </a>
                <div class='ml-auto edit'>
                    $edit
                </div>
            </li>
              ";
        }
    } else {
        echo "
        <li class='col-md-12 col-sm-12'>
            <a href=''>
                <div class='blog-card'>
                    <div class='blog-body'>
                        <h1 class='title big w-600 text-center text-upper'>
                            no posts to show
                        </h1>
                       
                    </div>
                </div>
            </a>
        </li>
        ";
    }
}

function getSearchPosts()
{
    global $conn;
    if (isset($_POST['search-submit'])) {
        $search_value = $_POST['search'];
        $query = "SELECT * FROM posts WHERE author like '%$search_value%' OR title like '%$search_value%'";
        $search_query = mysqli_query($conn, $query);

        if (!$search_query) {
            die("QUERY FAILED. " . mysqli_error($conn));
        } else {
            if (mysqli_num_rows($search_query) > 0) {
                while ($row = mysqli_fetch_assoc($search_query)) {
                    $post_id = $row['post_id'];
                    $post_category = $row['category'];
                    $post_title = $row['title'];
                    $post_body = $row['body'];
                    $new_trim_post = substr($post_body, 0, 137);
                    $post_author = $row['author'];
                    $date_year = date('yy', strtotime($row['created_at']));
                    $date_day = date('d', strtotime($row['created_at']));
                    $date_month = date('M', strtotime($row['created_at']));

                    echo "
            <li class='col-md-12 col-sm-12'>
                <a href='post.php?id=$post_id'>
                    <div class='blog-card'>
                        <div class='blog-body'>
                            <h5 class='title x-small w-400 text-color text-dim text-upper'>
                                $post_category
                            </h5>
                            <h1 class='title big w-600'>
                                $post_title
                            </h1>
                            <h5 class='paragraph p-x-small w-400 text-color text-dim'>
                                $new_trim_post
                            </h5>
                            <div class='user-details'>
                                <a href='' class='para p-x-small w-400 text-color text-default text-capitalize'>$post_author</a>
                                <h5 class='para p-x-small w-400 text-color text-dim'>$date_month $date_day, $date_year</h5>
                            </div>
                            <hr>
                        </div>
                    </div>
                </a>
            </li>
              ";
                }
            } else {
                echo "
        <li class='col-md-12 col-sm-12'>
            <a href=''>
                <div class='blog-card'>
                    <div class='blog-body'>
                        <h1 class='title big w-600 text-center text-upper'>
                            no posts to show
                        </h1>
                       
                    </div>
                </div>
            </a>
        </li>
        ";
            }
        }
    }
}

function getSearchPostsUsr()
{
    global $conn;
    if (isset($_POST['search-submit'])) {
        $search_value = $_POST['search'];
        $query = "SELECT * FROM posts WHERE user_id=".$_SESSION['userid']." AND title like '%$search_value%' OR author like '%$search_value%'";        $search_query = mysqli_query($conn, $query);

        if (!$search_query) {
            die("QUERY FAILED. " . mysqli_error($conn));
        } else {
            if (mysqli_num_rows($search_query) > 0) {
                while ($row = mysqli_fetch_assoc($search_query)) {
                    $post_id = $row['post_id'];
                    $post_category = $row['category'];
                    $post_title = $row['title'];
                    $post_body = $row['body'];
                    $new_trim_post = substr($post_body, 0, 137);
                    $post_author = $row['author'];
                    $date_year = date('yy', strtotime($row['created_at']));
                    $date_day = date('d', strtotime($row['created_at']));
                    $date_month = date('M', strtotime($row['created_at']));

                    echo "
            <li class='col-md-12 col-sm-12'>
                <a href='post.php?id=$post_id'>
                    <div class='blog-card'>
                        <div class='blog-body'>
                            <h5 class='title x-small w-400 text-color text-dim text-upper'>
                                $post_category
                            </h5>
                            <h1 class='title big w-600'>
                                $post_title
                            </h1>
                            <h5 class='paragraph p-x-small w-400 text-color text-dim'>
                                $new_trim_post
                            </h5>
                            <div class='user-details'>
                                <a href='' class='para p-x-small w-400 text-color text-default text-capitalize'>$post_author</a>
                                <h5 class='para p-x-small w-400 text-color text-dim'>$date_month $date_day, $date_year</h5>
                            </div>
                            <hr>
                        </div>
                    </div>
                </a>
            </li>
            ";
                }
            } else {
                echo "
        <li class='col-md-12 col-sm-12'>
            <a href=''>
                <div class='blog-card'>
                    <div class='blog-body'>
                        <h1 class='title big w-600 text-center text-upper'>
                            no posts to show
                        </h1>
                    
                    </div>
                </div>
            </a>
        </li>
        ";
            }
        }
    }
}

function getUserPosts()
{
    global $conn;
    $userid = $_SESSION['userid'];
    $sql = "SELECT * FROM posts WHERE user_id = $userid";
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            $post_id = $row['post_id'];
            $post_category = $row['category'];
            $post_title = $row['title'];
            $post_body = $row['body'];
            $new_trim_post = substr($post_body, 0, 137);
            $post_author = $row['author'];
            $date_year = date('yy', strtotime($row['created_at']));
            $date_day = date('d', strtotime($row['created_at']));
            $date_month = date('M', strtotime($row['created_at']));
            echo "
            <li class='col-md-12 col-sm-12'>
                <a href='post.php?id=$post_id'>
                    <div class='blog-card'>
                        <div class='blog-body'>
                        
                            <h5 class='title x-small w-400 text-color text-dim text-upper'>
                                $post_category
                            </h5>
                            <div class='row '>
                            <div class='col'>
                            <h1 class='title big w-600'>
                                $post_title
                            </h1>
                            </div>
                            
                            </div>
                            <h5 class='paragraph p-x-small w-400 text-color text-dim'>
                                $new_trim_post
                            </h5>
                            <div class='user-details'>
                                <a href='' class='para p-x-small w-400 text-color text-default text-capitalize'>$post_author</a>
                                <h5 class='para p-x-small w-400 text-color text-dim'>$date_month $date_day, $date_year</h5>
                            </div>
                            <hr>
                        </div>
                    </div>
                </a>
                <div class='ml-auto edit'>
                    <div class='dropdown'>
                        <div class='edit-drop' data-toggle='dropdown'><svg class='svgIcon-use' width='25' height='25'><path d='M5 12.5c0 .552.195 1.023.586 1.414.39.39.862.586 1.414.586.552 0 1.023-.195 1.414-.586.39-.39.586-.862.586-1.414 0-.552-.195-1.023-.586-1.414A1.927 1.927 0 0 0 7 10.5c-.552 0-1.023.195-1.414.586-.39.39-.586.862-.586 1.414zm5.617 0c0 .552.196 1.023.586 1.414.391.39.863.586 1.414.586.552 0 1.023-.195 1.414-.586.39-.39.586-.862.586-1.414 0-.552-.195-1.023-.586-1.414a1.927 1.927 0 0 0-1.414-.586c-.551 0-1.023.195-1.414.586-.39.39-.586.862-.586 1.414zm5.6 0c0 .552.195 1.023.586 1.414.39.39.868.586 1.432.586.551 0 1.023-.195 1.413-.586.391-.39.587-.862.587-1.414 0-.552-.196-1.023-.587-1.414a1.927 1.927 0 0 0-1.413-.586c-.565 0-1.042.195-1.432.586-.39.39-.586.862-.587 1.414z' fill-rule='evenodd'></path></svg></div>
                        <div class='dropdown-menu'>
                        <a class='dropdown-item' href='edit.php?id=$post_id'>Edit</a>
                        <a class='dropdown-item text-danger' href='includes/deletepost.inc.php?id=$post_id'>Delete</a>
                    </div>
                    </div>
                </div>
            </li>
              ";
        }
    } else {
        echo "<li class='col-md-12 col-sm-12'>
            <a href=''>
                <div class='blog-card'>
                    <div class='blog-body'>
                        <h1 class='title big w-600 text-center text-upper'>
                            no posts to show
                        </h1>
                       
                    </div>
                </div>
            </a>
        </li>";
    }
}

function getPostById($post_id)
{
    global $conn;
    $sql = "SELECT * FROM posts WHERE post_id = $post_id";
    $res = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($res)) {
        $post_category = $row['category'];
        $post_title = $row['title'];
        $post_body = $row['body'];
        $post_author = $row['author'];
        $date_year = date('yy', strtotime($row['created_at']));
        $date_day = date('d', strtotime($row['created_at']));
        $date_month = date('M', strtotime($row['created_at']));
        echo "
            <li class='col-md-12 col-sm-12'>
                    <div class='blog-card'>
                        <div class='blog-body'>
                            <div class='blog-body'>
                            <h5 class='title x-small w-400 text-color text-dim text-upper'>
                                $post_category
                            </h5>
                            <h1 class='title big w-600'>
                                $post_title
                            </h1>
                            <p class='post-paragraph'>
                            $post_body
                            </p>
                            <div class='user-details'>
                                <a href='' class='para p-x-small w-400 text-color text-default text-capitalize'>$post_author</a>
                                <h5 class='para p-x-small w-400 text-color text-dim'>$date_month $date_day, $date_year</h5>
                            </div>
                            <hr>
                        </div>
                    </div>
            </li>
              ";
    }
}


function getComment($post_id)
{
    global $conn;
    $sql = "SELECT * FROM comments WHERE comment_post_id = $post_id";
    $res = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($res)) {
        $username = $row['comment_username'];
        $comment = $row['comment_text'];
        echo "
        <li class='media'>
            <div class='media-body'>
                <strong class='text-success'>@$username</strong>
                <p>
                $comment
                </p>
            </div>
            
        </li><hr>";
    }
}


function editPost($post_id)
{
    global $conn;
    $sql = "SELECT * FROM posts WHERE post_id = $post_id";
    $res = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_assoc($res)) {
        $user_id = $_SESSION['userid'];
        if ($row['user_id'] === $user_id) {
            $title = $row['title'];
            $body = $row['body'];
            $cat = $row['category'];
            echo " 
            <form action='' method='post'>
                <input type='text' name='title' placeholder='Title' value='$title'>
                <input type='text' name='categories' placeholder='Categories' value='$cat'>
                <textarea name='body' id='editor' cols='30' rows='10'>$body</textarea>
                <div class='ml-auto mr-auto'>
                    <button type='submit' name='updatepost-submit' class='btn'>Update Post</button>
                </div>
            </form>
        ";
        } else {
            echo "You can't edit the post";
        }
    }
}

function getUserImage()
{
    global $conn;
    if (isset($_POST['profile-submit'])) { // insert image in database
        $user_id = $_SESSION['userid'];
        $img_name = "UserId" . $user_id . $_FILES['myfile']['name'];
        $img_tmp = $_FILES['myfile']['tmp_name'];       // get image name
        $ext = pathinfo($img_name, PATHINFO_EXTENSION); // get the image extension
        $allowed_extensions = array('png', 'jpg', 'jpeg', 'gif'); // allowed extensions for image

        if (!in_array($ext, $allowed_extensions)) { // validation for allowed extensions
            echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
        } else {
            move_uploaded_file($img_tmp, "images/$img_name"); // move uploaded file
            $sql = "SELECT * FROM images WHERE user_id = ".$_SESSION['userid']."";
            $res = mysqli_query($conn, $sql);

            if (!$res) {
                die ("QUERY FAILED." . mysqli_error($conn));
            }            
            if  (mysqli_num_rows($res)>0) {
                $row = mysqli_fetch_assoc($res);
                if (file_exists("images/".$row['image']."")){ // check for file exists
                    unlink("images/".$row['image'].""); //remove the file
                }

                $query = "UPDATE images SET image='$img_name' WHERE user_id= ".$_SESSION['userid']."";
                $update_query = mysqli_query($conn, $query);
                if (!$update_query) {
                    die ("QUERY FAILED." . mysqli_error($conn));
                }
            } else {
                $query = "INSERT INTO images(user_id, image) VALUES ($user_id, '$img_name')";
                $insert_query = mysqli_query($conn, $query);
                if (!$insert_query) {
                    die ("QUERY FAILED." . mysqli_error($conn));
                }
            }
            
     }
}
    // Display profile image
    $sql = "SELECT * FROM images WHERE user_id = ".$_SESSION['userid']."";
    $res = mysqli_query($conn, $sql);

    if (!$res) {
        die ("QUERY FAILED." . mysqli_error($conn));
    }
    if  ($row=mysqli_fetch_assoc($res)) {  
        echo "<img src='images/".$row['image']."' image' class='user-profile'>";
    } else {
        echo "<img src='images/profile.jpeg' alt='profile image' class='user-profile'>";
    }
}
