<?php
    include "inc/header.php";
    $db=new Database();
    $format=new Format();
?>
<?php
    if(isset($_GET['id']))
    {
        $cat_id=$_GET['id'];
    }else{
        header("Location: 404.php");
    }
?>
<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<?php
				$sql="SELECT * FROM tbl_post WHERE cat=$cat_id";
				$result=$db->select($sql);
				if($result)
				{
					while($row=$result->fetch_assoc())
					{
			?>
                    <div class="samepost clear">
                        <h2><a href=""><?php echo $row['title'] ?></a></h2>
                        <h4><?php echo $format->formatDate($row['date']) ?><a href="#"><?php echo $row['author'] ?></a></h4>
                        <a href="#"><img src="admin/upload/<?php echo $row['image'] ?>" alt="post image"/></a>
                        <p>
                            <?php echo $format->textShorten($row['body']); ?>
                        </p>
                        <div class="readmore clear">
                            <a href="post.php?id=<?php echo $row['id']; ?>">Read More</a>
                        </div>
                    </div>
			<?php
					}// end loop statement
				}// end if statement
				else{
					echo "No post found";
				}
			?>
		</div>
		<?php
			include "inc/sidebar.php";
			include "inc/footer.php";
		?>