<?php

    if(isset($_GET['edit_user'])){
        $the_user_id = $_GET['edit_user'];
    }

    $query = "SELECT * FROM users WHERE user_id = $the_user_id ";
                        $sellect_users = mysqli_query($connection, $query);
                        while($row = mysqli_fetch_assoc($sellect_users)){
                            $user_id = $row['user_id'];
                            $user_firstname = $row['user_firstname'];
                            $user_lastname = $row['user_lastname'];
                            $username = $row['username'];
                            $user_role = $row['user_role'];
                            $user_email = $row['user_email'];
                            $user_password = $row['user_password'];
                        }

    

    if(isset($_POST['update_user'])){
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $username = $_POST['username'];
        $user_role = $_POST['user_role'];

        // $post_image = $_FILES['image']['name'];
        // $post_image_temp = $_FILES['image']['tmp_name'];

        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];

        // move_uploaded_file($post_image_temp, "../images/$post_image");

        // //TO load image from db while updating post
        // if(empty($post_image)) {
        //     $query = "SELECT * FROM posts WHERE posts_id = $the_post_id ";
        //     $select_image = mysqli_query($connection, $query);
        //     while($row = mysqli_fetch_array($select_image)){
        //         $post_image = $row['post_image'];
        //     }
        // }

        $query = "UPDATE users SET ";
        $query .= "user_firstname = '{$user_firstname}', ";
        $query .= "user_lastname = '{$user_lastname}', ";
        $query .= "username = '{$username}', ";
        $query .= "user_role = '{$user_role}', ";
        $query .= "user_email = '{$user_email}', ";
        $query .= "user_password = '{$user_password}' ";
        $query .= "WHERE user_id = '{$the_user_id}'";

        $update_user = mysqli_query($connection, $query);
        confirm($update_user);
    }
?>




<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="user_firstname">First Name</label>
    <input value="<?php echo $user_firstname; ?>" type="text" class="form-control" name="user_firstname">
</div>

<div class="form-group">
    <label for="user_lastname">Last Name</label>
    <input value="<?php echo $user_lastname; ?>" type="text" class="form-control" name="user_lastname">
</div>

<div class="form-group">
    <label for="user_role">User Role</label>
    <select name="user_role" id="">
    
   
   <option value='subscriber'><?php echo $user_role; ?></option>
   <?php
    if($user_role == 'admin'){
        echo "<option value='subscriber'>Subscriber</option>";
    }
    else{
        echo  "<option value='admin'>Admin</option>";
    }


    ?>
    
    </select>

</div>



<div class="form-group">
    <label for="username">Username</label>
    <input value="<?php echo $username; ?>" type="text" class="form-control" name="username">
</div>


<div class="form-group">
    <label for="user_email">Email</label>
    <input value="<?php echo $user_email; ?>"type="email" class="form-control" name="user_email">
</div>

<div class="form-group">
    <label for="user_password">Password</label>
    <input value="<?php echo $user_password; ?>"type="text" class="form-control" name="user_password">
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" name="update_user" value="Update User">
</div>

</form>