</div>

	<div class="footersection templete clear">
	  <div class="footermenu clear">
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Contact</a></li>
			<li><a href="#">Privacy</a></li>
		</ul>
		</div>
		<?PHP
				$query="SELECT * FROM tbl_footer";
				$result=$db->select($query);
				if($result)
				{
						$data=$result->fetch_assoc();
		?>
		<p>&copy; <?php  echo $data['note'] ?><?php echo " ".date('Y'); ?></p>
		<?php
				}
		?>

	</div>
	<div class="fixedicon clear">
		<?php
				$query="SELECT * FROM tbl_social WHERE id='1'";
				$result=$db->select($query);
				if($result)
				{
						$social=$result->fetch_assoc();
		?>
		<a href="<?php echo $social['fb'];?>"><img src="images/fb.png" alt="Facebook"/></a>
		<a href="<?php echo $social['tw'];?>"><img src="images/tw.png" alt="Twitter"/></a>
		<a href="<?php echo $social['ln'];?>"><img src="images/in.png" alt="LinkedIn"/></a>
		<a href="<?php echo $social['gp'];?>"><img src="images/gl.png" alt="GooglePlus"/></a>
				<?php } ?>
	</div>
<script type="text/javascript" src="js/scrolltop.js"></script>
</body>
</html>