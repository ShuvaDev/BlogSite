<?php
    include "inc/header.php";
    include "inc/sidebar.php";
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="5%">No.</th>
							<th width="15%">Post Title</th>
							<th width="20%">Description</th>
							<th width="10%">Category</th>
							<th width="10%">Image</th>
							<th width="10%">Author</th>
							<th width="10%">Tags</th>
							<th width="10%">Author</th>
							<th width="10%">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$query="SELECT tbl_post.*,tbl_category.name FROM tbl_post INNER JOIN tbl_category ON tbl_post.cat=tbl_category.id";
							$result=$db->select($query);
							if($result)
							{
								$i=0;
								while($post=$result->fetch_assoc())
								{
									$i++;
						?>
								<tr class="odd gradeX">
									<td><?php echo $i; ?></td>
									<td><?php echo $post['title']; ?></td>
									<td><?php echo $format->textShorten($post['body'],70); ?></td>
									<td><?php echo $post['name']; ?></td>
									<td><img src="upload/<?php echo $post['image'] ?>" width="50px" height="50px"/></td>
									<td><?php echo $post['author']; ?></td>
									<td><?php echo $post['tags']; ?></td>
									<td><?php echo $format->formatDate($post['date']); ?></td>
									<td>
									<td><a href="viewpost.php?viewid=<?php echo $post['id']; ?>">View</a> 
									<?php 
										if(session::get('userid')==$post['userid'] || session::get('userrole')==0)
										{?>
										||<a href="editpost.php?editid=<?php echo $post['id']; ?>">Edit</a> ||
										<a onclick="return confirm('Are you sure to delete!')" href="deletepost.php?deleteid=<?php echo $post['id']; ?>">Delete</a></td>
										<?php }
									?>
									
								</tr>
						<?php				
								}
							}
						?>
					</tbody>
				</table>
	
               </div>
            </div>
        </div>
        
	<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
	</script>
	<?php include "inc/footer.php" ?>
