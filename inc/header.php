<?php
	include "config/config.php";
	include "lib/Database.php";
	include "helpers/format.php";
	$db=new Database();
	$fm=new format();
?>
<!DOCTYPE html>
<html>
<head>
	<?php
		if(isset($_GET['pageid'])){
			$pageid=$_GET['pageid'];
			$query="SELECT * FROM tbl_page WHERE id=$pageid";
			$result=$db->select($query);
			if($result)
			{
				$pagetitle=$result->fetch_assoc();
	?>
	<title><?php echo $pagetitle['name']; ?>-<?php echo TITLE ?></title>
	<?php
		}
	}elseif(isset($_GET['id'])){
			$postid=$_GET['id'];
			$query="SELECT * FROM tbl_post WHERE id=$postid";
			$result=$db->select($query);
			if($result)
			{
				$pagetitle=$result->fetch_assoc();
	?>
		<title><?php echo $pagetitle['title']; ?>-<?php echo TITLE ?></title>
	<?php
		}
	}else{ ?>
		<title><?php echo $fm->title(); ?>-<?php echo TITLE ?></title>
	<?php }
	?>
	<meta name="language" content="English">
	<meta name="description" content="It is a website about education">
	<meta name="keywords" content="blog,cms blog">
	<meta name="author" content="Delowar">
	<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">	
	<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="style.css">
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/jquery.nivo.slider.js" type="text/javascript"></script>

<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'random',
		slices:10,
		animSpeed:500,
		pauseTime:5000,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:false,
		directionNavHide:false, //Only show on hover
		controlNav:false, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:0.8, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
});
</script>
<style> 
.pagination{
  display: block;
  font-size: 25px;
  margin-top: 10px;
  padding:10px;
  text-align: center;
}
.pagination a{
  text-decoration: none;
  background:#E6AF4B ;
  border:1px solid #a7700c;
  color:#333;
  padding:2px 10px;
  margin-left:2px;
  border-radius: 3px; 
}
</style>
</head>

<body>
	<div class="headersection templete clear">
		<a href="index.php">
			<div class="logo">
				<?php
					$db=new Database();
					$sql="SELECT * FROM title_slogan";
					$result=$db->select($sql);
					if($result)
					{
						$data=$result->fetch_assoc();

				?>
				<img src="admin/upload/<?php echo $data['logo']; ?>" alt="Logo"/>
				<h2><?php echo $data['title']; ?></h2>
				<p><?php echo $data['slogan']; ?></p>
					<?php } ?>
			</div>
		</a>
		<div class="social clear">
			<div class="icon clear">
				<?php
                    $query="SELECT * FROM tbl_social WHERE id='1'";
                    $result=$db->select($query);
                    if($result)
                    {
                        $social=$result->fetch_assoc();
                ?>
				<a href="<?php echo $social['fb'];?>" target="_blank"><i class="fa fa-facebook"></i></a>
				<a href="<?php echo $social['tw'];?>" target="_blank"><i class="fa fa-twitter"></i></a>
				<a href="<?php echo $social['ln'];?>" target="_blank"><i class="fa fa-linkedin"></i></a>
				<a href="<?php echo $social['gp'];?>" target="_blank"><i class="fa fa-google-plus"></i></a>
					<?php } ?>
			</div>
			<div class="searchbtn clear">
			<form action="search.php" method="get">
				<input type="text" name="search" placeholder="Search keyword..."/>
				<input type="submit" name="submit" value="Search"/>
			</form>
			</div>
		</div>
	</div>
<div class="navsection templete">
	<ul>
		<?php
			$path=$_SERVER['SCRIPT_FILENAME'];
			$title=basename($path,".php");
		?>
		<li><a 
		<?php
			if($title=="index")
			{
				echo 'id="active"';
			}
		?>
		href="index.php">Home</a></li>
		<?PHP
				$query="SELECT * FROM tbl_page";
				$result=$db->select($query);
				if($result)
				{
						while($page=$result->fetch_assoc())
						{ ?>
								<li><a 
								<?php
									if(isset($_GET['pageid']) && $_GET['pageid']==$page['id'])
									{
										echo 'id="active"';
									}
								?>
								href="page.php?pageid=<?php echo $page['id']; ?>"><?php echo $page['name']; ?></a> </li>
		<?php
						}
				}
		?>	
		<li><a 
		<?php
			if($title=="contact")
			{
				echo 'id="active"';
			}
		?>
		href="contact.php">Contact</a></li>
	</ul>
</div>