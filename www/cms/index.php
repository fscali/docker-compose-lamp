<?php 
include('includes/db.php');
include('includes/header.php');
include('includes/navigation.php');

$posts = getPosts();

?>

  

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <?php foreach ($posts as $post) { ?>

                <h2>
                    <a href="#"><?php echo $post['post_title']; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php  echo $post['post_author']; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post['post_date']; ?></p>
                <hr>
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <hr>
                <p><?php echo $post['post_content']; ?> </p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

                <?php } ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include('includes/sidebar.php');?>

        </div>
        <!-- /.row -->

        <hr>
<?php
    include 'includes/footer.php'
?>