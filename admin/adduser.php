<?php
    include "inc/header.php";
    include "inc/sidebar.php";
?>
<?php
if(!session::get('userrole')==0)
{
    echo "<script>window.location = 'index.php';</script>"; 
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New User</h2>
        <div class="block copyblock"> 
        <?php
            if(isset($_POST['submit']))
            {
                $username=$format->validation($_POST['username']);
                $password=$format->validation($_POST['password']);
                $role=$format->validation($_POST['role']);
                $username=mysqli_real_escape_string($db->link,$_POST['username']);
                $password=mysqli_real_escape_string($db->link,$_POST['password']);
                $role=mysqli_real_escape_string($db->link,$_POST['role']);
                if(empty($username) || empty($password) || empty($role))
                {
                    echo "<span class='error'>Field must not be empty!</span>";
                }else{
                    $password=md5($password);
                    $query="INSERT INTO tbl_user(username,password,role) VALUES('$username','$password','$role')";
                    $insert_cat=$db->insert($query);
                    if($insert_cat)
                    {
                        echo "<span class='success'>User created successfully!</span>";
                    }else{
                        echo "<span class='error'>User not created!</span>";
                    }
                }
            }
        ?>
            <form action="" method="post">
            <table class="form">					
                <tr>
                    <td>
                        <label>Username</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Enter your username.." class="medium" name="username"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Password</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Enter your password.." class="medium" name="password"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>User Role</label>
                    </td>
                    <td>
                        <select id="select" name="role">
                            <option>Select user role</option>
                            <option value="0">Admin</option>
                            <option value="1">Author</option>
                            <option value="2">Editor</option>
                        </select>
                    </td>
                </tr>
                <tr> 
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Create" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<div class="clear">
</div>
    </div>
    <?php
    include "inc/footer.php";
    ?>