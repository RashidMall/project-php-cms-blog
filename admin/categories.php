<?php include './includes/admin_header.php'; ?>
    <div id="wrapper">

        <!-- Navigation -->
        <?php include './includes/admin_nav.php'; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin dashboard
                            <small>Author</small>
                        </h1>
                        <!-- Add Category Form -->
                        <div class="col-xs-6">

                        <?php 
                            if(isset($_POST['submit'])){
                                $category_title = $_POST['category_title'];

                                if($category_title == "" || empty($category_title)){
                                    echo "This field should not be empty";
                                }else{
                                    $query = "INSERT INTO categories(category_title) ";
                                    $query .= "VALUE('{$category_title}')";

                                    $create_category = mysqli_query($connection, $query);

                                    if(!$create_category){
                                        die('Query failed' . mysqli_error($connection));
                                    }
                                }
                            }
                        ?>

                            <form action="" method="post">
                                <div class="form-group">
                                <label for="category_title">Add new category</label>
                                    <input class="form-control" type="text" name="category_title" id="">
                                </div>
                                <div class="form-group">
                                    <input class="bt btn-primary" type="submit" name="submit" value="Add" id="">
                                </div>
                            </form>
                        </div> <!-- Add Category Form -->

                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    // Find all categories query
                                    $query = "SELECT * FROM categories;";
                                    $select_categories = mysqli_query($connection, $query);

                                    while($row = mysqli_fetch_assoc($select_categories)){
                                        $id_category = $row['id_category'];
                                        $category_title = $row['category_title'];

                                        echo "<tr><td>{$id_category}</td>";
                                        echo "<td>{$category_title}</td>";
                                        echo "<td><a href='categories.php?delete={$id_category}'>Delete</a></td>";
                                        echo "</tr>";
                                    }
                                    ?>

                                    <?php
                                    // Delete query
                                    if(isset($_GET['delete'])){
                                        $cat_id = $_GET['delete'];
                                        $query = "DELETE FROM categories WHERE id_category = {$cat_id}; ";
                                        $delete_query = mysqli_query($connection, $query);
                                        header("Location: categories.php");
                                    }
                                    ?>
                                    <!-- <tr>
                                        <td></td>
                                        <td></td>
                                    </tr> -->
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

<?php include './includes/admin_footer.php'; ?>
