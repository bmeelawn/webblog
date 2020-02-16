<?php
$title = "Post";
include 'includes/header.inc.php';
include 'includes/navbar.inc.php';
include 'functions.php';
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
                            <div class="panel-body">
                                <textarea class="form-control" placeholder="write a comment..." rows="3"></textarea>
                                <br>
                                <button type="button" class="btn btn-info pull-right">Post</button>
                                <div class="clearfix"></div>
                                <hr>
                                <ul class="media-list">
                                    <li class="media">
                                        <div class="media-body">
                                            <strong class="text-success">@MartinoMont</strong>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                Lorem ipsum dolor sit amet, <a href="#">#consecteturadipiscing </a>.
                                            </p>
                                        </div>
                                    </li>

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