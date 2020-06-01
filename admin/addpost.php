<?php
    include "inc/header.php";
    include "inc/sidebar.php";
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Post</h2>
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
						if($title == "" || $cat == "" || $body == "" || $tags == "" || $author == "" || $file_name==""){
							echo "<span class='error'>Field must not be empty!</span>";
						}elseif ($file_size >2048567) {
							echo "<span class='error'>Image Size should be less then 2MB!</span>";
						
						} elseif (in_array($file_ext, $permited) === false) {
							echo "<span class='error'>You can upload only:-"
							.implode(', ', $permited)."</span>";
						} 
						else{
							move_uploaded_file($file_temp, $uploaded_image);
							$sql="INSERT INTO tbl_post(cat, title, body, image, author, tags,userid) VALUES ('$cat', '$title', '$body', '$unique_image', '$author', '$tags','$userid')";
							$post=$db->insert($sql);
							if($post=="true")
							{
								echo "<span class='success'>Post inserted successfully!</span>";
							}else{
								"<span class='error'>Post inserted failed!</span>";
							}
						}
                    }// check submit if end
                ?>
                <div class="block">               
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Enter Post Title..." class="medium" name="title"/>
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
                                            <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                                    <?php      }
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
                                <input type="file" name="image"/>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Tags</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Enter Tags..." class="medium" name="tags"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo session::get('username')?>" class="medium" name="author"/>
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
