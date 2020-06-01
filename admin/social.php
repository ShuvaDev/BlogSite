<?php
    include "inc/header.php";
    include "inc/sidebar.php";
    $db=new Database();
    $fm=new format();
?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Social Media</h2>
                <div class="block">
                <?php
                if(isset($_POST['submit']))
                {
                    $fb=$fm->validation($_POST['fb']);
                    $tw=$fm->validation($_POST['tw']);
                    $ln=$fm->validation($_POST['ln']);
                    $gp=$fm->validation($_POST['gp']);
                    $fb=mysqli_real_escape_string($db->link,$fb);
                    $tw=mysqli_real_escape_string($db->link,$tw); 
                    $ln=mysqli_real_escape_string($db->link,$ln); 
                    $gp=mysqli_real_escape_string($db->link,$gp); 
                    if($fb == "" || $ln == "" || $tw == "" || $gp == ""){
                        echo "<span class='error'>Field must not be empty!</span>";
                    }
                    else{
                        $sql="UPDATE tbl_social SET fb='$fb', ln='$ln', tw='$tw', gp='$gp' WHERE id='1'";
                        $update_social=$db->update($sql);
                        if($update_social=="true")
                        {
                            echo "<span class='success'>Social link updated successfully!</span>";
                        }else{
                            "<span class='error'>Social link failed!</span>";
                        }
                    }
                }
                ?>    
                <?php
                    $query="SELECT * FROM tbl_social WHERE id='1'";
                    $result=$db->select($query);
                    if($result)
                    {
                        $social=$result->fetch_assoc();
                ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Facebook</label>
                            </td>
                            <td>
                                <input type="text" name="fb" value="<?php echo $social['fb'];?>" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Twitter</label>
                            </td>
                            <td>
                                <input type="text" name="tw" value="<?php echo $social['tw'];?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>LinkedIn</label>
                            </td>
                            <td>
                                <input type="text" name="ln" value="<?php echo $social['ln'];?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>Google Plus</label>
                            </td>
                            <td>
                                <input type="text" name="gp" value="<?php echo $social['gp'];?>" class="medium" />
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
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php
    include "inc/footer.php";
?>
