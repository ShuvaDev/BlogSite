<?php
    include "inc/header.php";
    include "inc/sidebar.php";
?>
        <div class="grid_10">
            <div class="box round first grid">
				<h2>Update Profle</h2>
				<?php
					if(isset($_GET['deluser']))
					{
						$delid=$_GET['deluser'];
						$sql="DELETE FROM tbl_user WHERE id='$delid'";
						$result=$db->delete($sql);
						if($result=="true")
                            {
                                echo "<span class='success'>User Deleted successfully!</span>";
                            }else{
								echo "<span class='error'>User deleted failed!</span>";
							}
					}
				?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>User Name</th>
							<th>Email</th>
							<th>Details</th>
							<th>Role</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$query="SELECT * FROM tbl_user";
							$alluser=$db->select($query);
							if($alluser)
							{
								$i=0;
								while($row=$alluser->fetch_assoc())
								{
									$i++;
						?>
							<tr class="odd gradeX">
								<td><?php echo $i;?></td>
								<td><?php echo $row['name'] ?></td>
								<td><?php echo $row['username'] ?></td>
								<td><?php echo $row['email'] ?></td>
                                <td><?php echo $format->textShorten($row['details'],30) ?></td>
                                
                                <td><?php 
                                    if($row['role']==0)
                                    {
                                        echo "admin";
                                    }
                                    if($row['role']==1)
                                    {
                                        echo "author";
                                    }
                                    if($row['role']==2)
                                    {
                                        echo "editor";
                                    }
                                ?></td>
                                
                                <td><a href="viewuser.php?user_id=<?php echo $row['id'] ?>">View</a> 
                                <?php
                                    if(session::get('userrole')==0)
                                    {?>
                                       || <a onclick="return confirm('Are you sure to delete!')" href="?deluser=<?php echo $row['id'] ?>">Delete</a></td>
                                   <?php }
                                ?>
                                
							</tr>
						<?php
								}// end loop
							}//end if
							else{

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
        <?php
    include "inc/footer.php";
?>
