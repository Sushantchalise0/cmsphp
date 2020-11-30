<?php 
    if(isset($_POST['create_user'])){
        
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $username = $_POST['username'];

        // $post_image = $_FILES['image']['name'];
        // $post_image_temp = $_FILES['image']['tmp_name'];

        $user_password = $_POST['user_password'];
        $user_email = $_POST['user_email'];
        $user_role = $_POST['user_role'];

        // move_uploaded_file($post_image_temp, "../images/$post_image");

    

    $query = "INSERT INTO users(user_firstname, user_lastname, username, user_password, user_email
    , user_role) ";
    $query .= "VALUES('{$user_firstname}', '{$user_lastname}', '{$username}', '{$user_password}'
    , '{$user_email}',  '{$user_role}')";
    
    $create_user_query = mysqli_query($connection, $query);
    confirm($create_user_query);

}

?>



<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="user_firstname">First Name</label>
    <input type="text" class="form-control" name="user_firstname">
</div>

<div class="form-group">
    <label for="user_lastname">Last Name</label>
    <input type="text" class="form-control" name="user_lastname">
</div>

<div class="form-group">
    <label for="user_role">Role</label>
    <select name ="user_role">
    <option value='subscriber'>Select Option</option>
    <option value='admin'>Admin</option>
    <option value='subscriber'>Subscriber</option>
    </select>
</div>

<div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" name="username">
</div>

<div class="form-group">
    <label for="user_password">Password</label>
    <input type="text" class="form-control" name="user_password">
</div>

<div class="form-group">
    <label for="user_email">Email</label>
    <input type="email" class="form-control" name="user_email">
</div>
<!-- <div class="form-group">
    <label for="title">Post image</label>
    <input type="file" class="form-control" name="image">
</div> -->



<div class="form-group">
    <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
</div>

</form>