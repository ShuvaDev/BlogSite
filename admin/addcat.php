<?php
    include "inc/header.php";
    include "inc/sidebar.php";
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
                <?php
                    if(isset($_POST['submit']))
                    {
                        $cat_name=mysqli_real_escape_string($db->link,$_POST['cat_name']);
                        if(empty($cat_name))
                        {
                            echo "<span class='error'>Field must not be empty!</span>";
                        }else{
                            $query="INSERT INTO tbl_category(name) VALUES('$cat_name')";
                            $insert_cat=$db->insert($query);
                            if($insert_cat)
                            {
                                echo "<span class='success'>Category inserted successfully!</span>";
                            }else{
                                echo "<span class='error'>Category inserted failed!</span>";
                            }
                        }
                    }
                ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" placeholder="Enter Category Name..." class="medium" name="cat_name"/>
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
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