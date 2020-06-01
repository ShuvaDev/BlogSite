<?php
	include "inc/header.php";
	$db=new Database();
    $fm=new format();
    if(isset($_GET['pageid']))
    {
        $pageid=$_GET['pageid'];
    }else{
        echo "<script>window.location='../404.php'</script>";
    }
?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<?PHP
				$query="SELECT * FROM tbl_page WHERE id='$pageid'";
				$result=$db->select($query);
				if($result)
				{
					while($data=$result->fetch_assoc())
					{
				?>
				<h2><?php echo $data['name']; ?></h2>
				<?php echo $data['body']; ?>
				<?php
					}
				}
				?>
	</div>

		</div>
		<?php
			include "inc/sidebar.php";
			include "inc/footer.php";
		?>