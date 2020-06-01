


<?php require "inc/header.php"; ?>
<?php require "inc/sidebar.php"; ?>
<?php
    if(isset($_GET['cat_id']))
    {
        $cat_id=$_GET['cat_id'];
    }else{
        //header("Location: catlist.php");
        echo "<script>window.location = 'catlist.php';</script>";
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
                <?php
                    if(isset($_POST['submit']))
                    {
                        $cat_name=$_POST['name'];
                        $cat_name=mysqli_real_escape_string($db->link,$cat_name);
                        if(empty($cat_name))
                        {
                            echo "<span class='error'>Field must not be empty!</span>";
                        }else{
                            $sql="UPDATE tbl_category
                            SET name = '$cat_name'
                            WHERE id='$cat_id'"; 
                            $update_row=$db->update($sql);
                            if(($update_row == "true"))
                            {
                                echo "<span class='success'>Category updated successfully!</span>";
                            }else{
                                echo "<span class='error'>Category updated failed!</span>";
                            }
                        }
                    }
                ?>
                <?php 
                    $query="SELECT * FROM tbl_category WHERE id='$cat_id' order by id desc";
                    $result=$db->select($query);
                    if($result)
                    {
                        while($cat=$result->fetch_assoc())
                        {
                ?>
                <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $cat['name']; ?>" class="medium" name="name"/>
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                </form>

                <?php
                        }
                    }else{
                        echo "<script>window.location = '../404.php';</script>";
                    }
                ?>
                 
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <?php
    include "inc/footer.php";
    ?>