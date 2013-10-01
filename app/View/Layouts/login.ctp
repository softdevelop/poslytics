<!DOCTYPE html>
<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>PosLytics</title>
	<?php echo $this->Html->css('style.default'); ?>
	<?php echo $this->Html->css('style.shinyblue'); ?>
	<?php
	echo $this->Html->script(array(
	    'jquery-1.9.1.min',
	    'jquery-migrate-1.1.1.min',
	    'jquery-ui-1.9.2.min',
	    'modernizr.min',
	    'bootstrap.min',
	    'jquery.cookie',
	    'custom'
	));
	?>
	<script type="text/javascript">
	    jQuery(document).ready(function() {
		jQuery('#login').submit(function() {
		    var u = jQuery('#username').val();
		    var p = jQuery('#password').val();
		    if (u == '' && p == '') {
			jQuery('.login-alert').fadeIn();
			return false;
		    }
		});
	    });
	</script>
    </head>

    <body class="loginpage">

	<?php echo $content_for_layout; ?>

	<div class="loginfooter">
	    <p>&copy; 2013. PosLytics. All Rights Reserved.</p>
	</div>

    </body>
</html>
