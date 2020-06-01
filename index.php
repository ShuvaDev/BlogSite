
<?php
	include "inc/header.php";
	include "inc/slider.php";
?>
<?php
	$db=new Database();
	$format=new format();
	$per_page=3;
	if(isset($_GET['page']))
	{
		$page=$_GET['page'];
	}else{
		$page=1;
	}
	$start_form=($page-1)*$per_page;
	
?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<?php
				$sql="SELECT * FROM tbl_post LIMIT $start_form, $per_page";
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
					<?php echo $format->textShorten($row['body']) ?>
				</p>
				<div class="readmore clear">
					<a href="post.php?id=<?php echo $row['id']; ?>">Read More</a>
				</div>
			</div>
			<?php
					}// end loop statement
			?>
				<!--pagination-->
					<?php
					$query="SELECT * FROM tbl_post";
					$result=$db->select($query);
					$total_row=mysqli_num_rows($result);
					$total_page=ceil($total_row/$per_page);
					echo "<span class='pagination'><a href='index.php?page=1'>".'First Page'."</a>";
					for($i=1;$i<=$total_page;$i++)
					{
						echo "<a href='index.php?page=$i'>"."$i"."</a>";
					} 
					 echo "<a href='index.php?page=$total_page'>".'Last Page'."</a></span>" ?>
				<!--pagination-->
				<?php
				}// end if statement
				else{
					echo "No data found";
				}
			?>
		</div>
		<?php
			include "inc/sidebar.php";
			include "inc/footer.php";
		?>
	