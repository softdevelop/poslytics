<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>PosLytics</title>
<?php echo $this->Html->css('style.default'); ?>
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
</head>

<body class="errorpage">

<div class="mainwrapper">
    
    <div class="header">
        <?php echo $this->element('header');?>
    </div>
</div><!--mainwrapper-->

</body>
</html>
