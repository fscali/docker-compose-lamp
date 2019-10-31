<?php include "includes/header.php";?>

<?php 

$submit_new = $_POST["SubmitNew"];
$delete = $_POST["delete"];
$category = $_POST["category"];
$cat_id = $_POST["cat_id"];

if (isset($submit_new) && $category){
    addCategory($category);
} elseif (isset($delete) && $cat_id) {
    deleteCategory($cat_id);
}
?>

    <div id="wrapper">

        <?php include 'includes/navigation.php'; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small>Author</small>
                        </h1>
                       <div class="col-xs-6">
                        <form action="categories.php" method="POST">
                            <div class="form-group">
                            <label for="category">New Category</label>
                            <input type="text" name="category" id="category" class="form-control">
                            <button type="submit" name="SubmitNew" class="btn btn-primary">Submit</button>
                            </div>    
                        </form>

                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Category Name</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $cats = getAllCategories();
                                foreach ($cats  as $cat) {  ?>
                                    <form action="categories.php" method="POST" >
                                    <input type="hidden" name="cat_id" value="<?php echo $cat["cat_id"];?>">
                                    <tr>
                                    <td><?php echo $cat["cat_title"]; ?></td>
                                    <td><button type="submit" name="delete" class="btn btn-primary">Delete</button></td>
                                    </tr>

                                    </form>
                               <? }
                            ?>
                                
                             </tbody>
                        </table>
                                                   
                       </div>
                    
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php include "includes/footer.php"; ?>