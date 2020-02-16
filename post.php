<?php
$title = "Post";
include 'includes/header.inc.php';
include 'includes/navbar.inc.php';
include 'functions.php';
include 'includes/comment.inc.php';
?>

<main class="posts max-width gutterY bottom-too">
    <ul class="row">
        <?php
        $post_id = $_GET['id'];
        getPostById($post_id);
        ?>
        <!-- comments section -->
        <div class="col-md-12 col-sm-12">
            <div class='blog-card'>
                <div class='blog-body'>
                    <div class="comment-wrapper">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Comments
                            </div>
                            <?php
                            if (isset($_POST['cmt-submit'])) {
                                echo $message;
                            }
                            ?>
                            <div class="panel-body">
                                <form action="" method="post">
                                    <textarea class="form-control" placeholder="write a comment..." rows="3" name='cmt'></textarea>
                                    <br>
                                    <button type="submit" class="btn btn-info pull-right" name='cmt-submit'>Post</button>
                                </form>

                                <div class="clearfix"></div>
                                <hr>
                                <ul class="media-list">
                                    <?= getComment($post_id) ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </ul>

</main>

<?php
include 'includes/footer.inc.php';
?>