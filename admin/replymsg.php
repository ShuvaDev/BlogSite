<?php
    include "inc/header.php";
    include "inc/sidebar.php";
    $db=new Database();
    $fm=new format();
?>
<?php
    if(isset($_GET['msgid']))
    {
        $msgid=$_GET['msgid'];
    }else{
        //header("Location: catlist.php");
        echo "<script>window.location = 'inbox.php';</script>";
    }
?>
<?php
    if(isset($_POST['submit']))
    {
        $to=$format->validation($_POST['toEmail']);
        $from=$format->validation($_POST['fromEmail']);
        $subject=$format->validation($_POST['subject']);
        $message=$format->validation($_POST['message']);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>View Message</h2>
        <div class="block">               
            <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
                <?php
                    $query="SELECT * FROM tbl_contact WHERE id=$msgid";
                    $result=$db->select($query);
                    if($result)
                    {
                        while($row=$result->fetch_assoc())
                        {
				?>
                <tr>
                    <td>
                        <label>To</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $row['email']?>" readonly class="medium" name="toEmail"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>From</label>
                    </td>
                    <td>
                        <input type="text" placeholder="Please enter your email address" class="medium" name="fromEmail"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Subject</label>
                    </td>
                    <td>
                    <input type="text" placeholder="Please enter your subject" class="medium" name="subject"/>
                    </td>
                </tr>
        
                <tr>
                    <td>
                        <label>Message</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="message">
                        </textarea>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Send" />
                    </td>
                </tr>
                <?php
                        }
                    }
                ?>
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
