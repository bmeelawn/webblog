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
        $query = "SELECT * FROM posts WHERE user_id=".$_SESSION['userid']." AND title like '%$search_value%' OR body like '%$search_value%'";
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

function getUserPosts() 
{
    global $conn;
    $userid = $_SESSION['userid'];
    $sql = "SELECT * FROM posts WHERE user_id = $userid";
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
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
                <a href=''>
                    <div class='blog-card'>
                        <div class='blog-body'>
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
