<?php include "includes/admin_header.php" ?>

<div id="wrapper">

    <?php if ($connection) echo "conn"; ?>


    <!-- Navigation -->
    <?php include "includes/admin_navigation.php" ?>

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading --> 
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome Admin
                        <small>Author</small>
                    </h1>
                    <div class="col-xs-6">    

                    <?php              
                    if(isset($_POST['submit'])) {
                        
                    $cat_title = $_POST['cat_title'];

                    if($cat_title == "" || empty($cat_title)){
                        echo "This field should not be empty";

                    } else {

                        $query = "INSERT INTO categories(cat_title) ";
                        $query .= "VALUE('{$cat_title}')";

                        $create_category_query = mysqli_query($connection,$query);

                        if(!$create_category_query){
                            die('Query Failed' . mysqli_error($connection));
                        }
                    }
                    }
                    ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat-title">Add Category</label>
                                <input type="text" class="form-control" name="cat_title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add category">
                            </div>
                        </form>
                    </div>

                    <div class="col-xs-6">

                        <?php
                        $query = "SELECT * FROM categories";
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
                                while ($row = mysqli_fetch_assoc($select_categories)) {
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];

                                    echo "<tr>";
                                    echo "<td>{$cat_id}</td>";
                                    echo "<td>{$cat_title}</td>";
                                    echo "</tr>";
                                }
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
    <?php include "includes/admin_footer.php" ?>