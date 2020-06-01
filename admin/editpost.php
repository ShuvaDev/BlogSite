<?php
    include "inc/header.php";
    include "inc/sidebar.php";
?>
<?php
    if(isset($_GET['editid']))
    {
        $editid=$_GET['editid'];
    }else{
        //header("Location: catlist.php");
        echo "<script>window.location = 'postlist.php';</script>";
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Post</h2>
                <?php
                    if(isset($_POST['submit']))
                    {
                        $title=mysqli_real_escape_string($db->link,$_POST['title']);
                        $cat=mysqli_real_escape_string($db->link,$_POST['cat']);
                        $body=mysqli_real_escape_string($db->link,$_POST['body']);
                        $tags=mysqli_real_escape_string($db->link,$_POST['tags']);
                        $author=mysqli_real_escape_string($db->link,$_POST['author']);
                        $userid=mysqli_real_escape_string($db->link,$_POST['userid']);

                        $permited  = array('jpg', 'jpeg', 'png', 'gif');
                        $file_name = $_FILES['image']['name'];
                        $file_size = $_FILES['image']['size'];
                        $file_temp = $_FILES['image']['tmp_name'];

                        $div = explode('.', $file_name);
                        $file_ext = strtolower(end($div));
                        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                        $uploaded_image = "upload/".$unique_image;
                        if($title == "" || $cat == "" || $body == "" || $tags == "" || $author == ""){
                            echo "<span class='error'>Field must not be empty!</span>";
                        }
                        else{
                            if(!empty($file_name))
                            {
                                if ($file_size >2048567) {
                                    echo "<span class='error'>Image Size should be less then 2MB!</span>";
                                
                                } elseif (in_array($file_ext, $permited) === false) {
                                    echo "<span class='error'>You can upload only:-"
                                    .implode(', ', $permited)."</span>";
                                } 
                                else{
                                    move_uploaded_file($file_temp, $uploaded_image);
                                    $sql="UPDATE tbl_post SET cat='$cat', title='$title', body='$body', image='$unique_image', author='$author', tags='$tags', userid='$userid' WHERE id='$editid'";
                                    $update_post=$db->update($sql);
                                    if($update_post=="true")
                                    {
                                        echo "<span class='success'>Post updated successfully!</span>";
                                    }else{
                                        "<span class='error'>Post updated failed!</span>";
                                    }
                                }
                            }// file name empty checker if
                            else{
                                $sql="UPDATE tbl_post SET cat='$cat', title='$title', body='$body', author='$author', tags='$tags' WHERE id='$editid'";
                                $update_post=$db->update($sql);
                                if($update_post=="true")
                                {
                                    echo "<span class='success'>Post updated successfully!</span>";
                                }else{
                                    "<span class='error'>Post updated failed!</span>";
                                }
                            }
                        }// else (if not empty all file)
                    }// check submit if end
                ?>
                
                <div class="block">   
                <?php
                    $sql="SELECT * FROM tbl_post WHERE id=$editid";
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
                                <input type="text" value="<?php echo $post_result['title'] ?>" class="medium" name="title"/>
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
                                <img src="upload/<?php echo $post_result['image'] ?>" alt="" width="200px" height="80px"><br>
                                <input type="file" name="image"/>
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
                                <input type="text" value="<?php echo $post_result['tags'] ?>" class="medium" name="tags"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $post_result['author'] ?>" class="medium" name="author"/>
                                <input type="hidden" value="<?php echo session::get('userid')?>" class="medium" name="userid"/>
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
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
