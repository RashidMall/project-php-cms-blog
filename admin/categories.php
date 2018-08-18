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
                        <?php 
                        $query = "SELECT * FROM categories;";
                        $select_categories = mysqli_query($connection, $query);
                        ?>
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    while($row = mysqli_fetch_assoc($select_categories)){
                                        $category_id = $row['id_category'];
                                        $category_title = $row['category_title'];

                                        echo "<tr><td>{$category_id}</td>";
                                        echo "<td>{$category_title}</td></tr>";
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
