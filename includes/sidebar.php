<div class="col-md-4">
    <?php

    if (isset($_POST['submit'])) {

        $search = $_POST['search'];

        $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
        $search_query = mysqli_query($connection, $query);

        if (!$search_query) {
            die("QUERY FAILED" . mysqli_error($connection));
        }

        $count = mysqli_num_rows($search_query);

        //  if($count == 0){
        //      echo "<h1> NO RESULT </h1>";
        //  } else{
        //      echo "SOME RESULT";
        //  }
    }

    ?>

    <!-- Login -->
    <div class="well">
        <h4>Login</h4>
        <form action="includes/login.php" method="post">
            <div class="form-group">
                <input name="username" type="text" class="form-control" placeholder="Enter Username">
            </div>
        <form action="includes/login.php" method="post">
            <div class="input-group">
                <input name="password" type="pass" class="form-control" placeholder="Enter Password">
                <span class="input-group-btn">
                    <button class="btn btn-primary" name="login" type="submit">
                        Submit
                    </button>

                </span>
            </div>
        </form> <!-- .login  -->
        <!-- /.input-group -->
    <a href="registration.php">Not registered yet? register here.</a>
    </div>

    <!-- Blog Categories Well -->

    <?php

    $query = "SELECT * FROM categories";
    $select_categories_sidebar = mysqli_query($connection,  $query);

    ?>
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">

                    <?php
                    while ($row = mysqli_fetch_assoc($select_categories_sidebar)) {
                        $cat_title = $row['cat_title'];
                        $cat_id = $row['cat_id'];

                        echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                    }
                    ?>

                </ul>
            </div>
            <!-- /.col-lg-6 -->

        </div>
        <!-- /.row -->





    </div>

    <!-- Side Widget Well -->
    <?php include "widget.php" ?>


</div>