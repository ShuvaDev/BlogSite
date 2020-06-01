<?php
    include "inc/header.php";
    include "inc/sidebar.php";
?>
<?php
    $userid=session::get('userid');
    $userrole=session::get('userrole');
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Post</h2>
                <?php
                    if(isset($_POST['submit']))
                    {
                        $name=mysqli_real_escape_string($db->link,$_POST['name']);
                        $username=mysqli_real_escape_string($db->link,$_POST['uname']);
                        $email=mysqli_real_escape_string($db->link,$_POST['email']);
                        $details=mysqli_real_escape_string($db->link,$_POST['details']);
                        $sql="UPDATE tbl_user SET name='$name', username='$username', email='$email', details='$details' WHERE id='$userid' AND role='$userrole'";
                        $update_post=$db->update($sql);
                        if($update_post=="true")
                        {
                            echo "<span class='success'>Profile updated successfully!</span>";
                        }else{
                            "<span class='error'>Profile updated failed!</span>";
                        }
                    }// check submit if end
                ?>
                
                <div class="block">   
                <?php
                    $sql="SELECT * FROM tbl_user WHERE id=$userid AND role='$userrole'";
                    $result=$db->select($sql);
                    if($result)
                    {
                        while($post_result=$result->fetch_assoc())
                        {
                ?>            
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $post_result['name'] ?>" class="medium" name="name"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>User Name</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $post_result['username'] ?>" class="medium" name="uname"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $post_result['email'] ?>" class="medium" name="email"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Details</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="details">
                                 <?php echo $post_result['details'] ?>
                                </textarea>
                            </td>
                        </tr>
                        
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
        <?php
         include "inc/footer.php";
        ?>
