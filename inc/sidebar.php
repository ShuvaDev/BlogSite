<?php
	$db=new Database();
	$fm=new format();
?>

<div class="sidebar clear">
			<div class="samesidebar clear">
				<h2>Categories</h2>
					<ul>
						<?php
							$sql="SELECT * FROM tbl_category";
							$result=$db->select($sql);
							if($result)
							{
								while($cat=$result->fetch_assoc())
								{
						?>
									<li><a href="posts.php?id=<?php echo $cat['id']; ?>"><?php echo $cat['name']; ?></a></li>
						<?php
								}// End loop here
							}// End if statement
							else{ ?>
								<li>No Category available</li>
						<?php	
							}// End else statement
						?>
					</ul>
			</div>
			
			<div class="samesidebar clear">
				<h2>Latest articles</h2>
					<div class="popular clear">
						<?php
							$sql="SELECT * FROM tbl_post LIMIT 5";
							$result=$db->select($sql);
							if($result)
							{
								while($row=$result->fetch_assoc())
								{
						?>
						<h3><a href="post.php?id=<?php echo $row['id'];?>"><?php echo $row['title'] ?></a></h3>
						<a href="#"><img src="admin/upload/<?php echo $row['image'] ?>" alt="post image"/></a></a>
						<p><?php echo $fm->textShorten($row['body'],125); ?></p>
						<?php
								}// End loop here
							}// End if statement
							else{ 
								echo "No recent post available";	
							}// End else statement
						?>	
					</div>
			</div>
			
		</div>