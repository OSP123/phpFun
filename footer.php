<?php 

require "sharedVar.php";

?>

<footer id="closing" class="cf">
	<div class="contact">
		<div class="address">
			<?php echo $address ?>
		</div>
		<div class="phone">p. <?php echo $phone ?></div>
		<div class="fax">f. <?php echo $fax ?></div>
		<div class="email"><a href="mailto:'.$email.'"><?php echo $email ?></a></div>
	</div>
	<div class="copy">
		<?php echo $copyright ?>
	</div>
</footer>