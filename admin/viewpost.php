<?php
    include "inc/header.php";
    include "inc/sidebar.php";
?>
<?php
    if(isset($_GET['viewid']))
    {
        $viewid=$_GET['viewid'];
    }else{
        //header("Location: catlist.php");
        echo "<script>window.location = 'postlist.php';</script>";
    }
?>
<?php
    if(isset($_POST['submit']))
    {
        echo "<script>window.location = 'postlist.php';</script>";
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Post</h2>
                <div class="block">   
                <?php
                    $sql="SELECT * FROM tbl_post WHERE id=$viewid";
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
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $post_result['title'] ?>" class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                
                                <select id="select" name="cat">
                                    <option>Select Category</option>
                                    <?php 
                                        $query="SELECT * FROM tbl_category";
                                        $result=$db->select($query);
                                        if($result)
                                        {
                                            while($row=$result->fetch_assoc())
                                            {    
                                    ?>
                                            <option 
                                            <?php
                                                if($row['id']==$post_result['cat']) 
                                                { ?>
                                                    selected
                                               <?php }?>value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                                             
                                    <?php    }
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                   
                
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <img src="upload/<?php echo $post_result['image'] ?>" alt="" width="250px" height="100px"><br>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body">
                                 <?php echo $post_result['body'] ?>
                                </textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Tags</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $post_result['tags'] ?>" class="medium" readonly/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $post_result['author'] ?>" class="medium" name="author" readonly/>
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Ok" />
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
