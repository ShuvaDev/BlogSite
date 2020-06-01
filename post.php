<?php
	include "inc/header.php";
?>
<?php
	$db=new Database();
	$format=new format();
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
	}
	else{
		header("Location: 404.php");
	}
?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<?php
				$sql="SELECT * FROM tbl_post WHERE id=$id";
				$result=$db->select($sql);
				if($result)
				{
					while($row=$result->fetch_assoc())
					{
			?>
			<div class="about">
				<h2><a href=""><?php echo $row['title'] ?></a></h2>
				<h4><?php echo $format->formatDate($row['date']) ?><a href="#"><?php echo $row['author'] ?></a></h4>
				<img src="admin/upload/<?php echo $row['image'] ?>" alt="MyImage"/>
				<p><?php echo $row['body']?></p>
				<div class="relatedpost clear">
					<h2>Related articles</h2>
					<?php
						$cat_id=$row['cat'];
						$sql="SELECT * FROM tbl_post WHERE cat='$cat_id' order by rand() LIMIT 6";
						$result=$db->select($sql);
						if($result)
						{
							while($row=$result->fetch_assoc())
							{
					?>
							<a href="post.php?id=<?php echo $row['id'];?>"><img src="admin/upload/<?php echo $row['image'] ?>"/></a>
					<?php
							}// end related post loop
						}// end relate post if statement
						else{
							echo "No Data Available!";
						}
					?>
				</div>
				<?php
					}// end loop statement
				}//end if statement
				else{
					header("Location: 404.php");
				}
			?>
				
				
		</div>

		</div>
		<?php
			include "inc/sidebar.php";
			include "inc/footer.php";
		?>
	