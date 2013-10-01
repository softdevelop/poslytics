<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>PosLytics</title>
<?php echo $this->Html->css('style.default'); ?>
<?php echo $this->Html->css('responsive-tables'); ?>
<?php
	echo $this->Html->script(array(
	    'jquery-1.9.1.min',
	    'jquery-migrate-1.1.1.min',
	    'jquery-ui-1.9.2.min',
	    'modernizr.min',
	    'bootstrap.min',
	    'jquery.cookie',
	    'jquery.uniform.min',
		'flot/jquery.flot.min',
		'flot/jquery.flot.resize.min',
		'responsive-tables',
		'jquery.dataTables.min',
		'custom'
	));
	?>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
</head>

<body>

<div class="mainwrapper">
    
    <div class="header">
       <?php echo $this->element('header');?>
    </div>
    
    <div class="leftpanel">
        
        <?php echo $this->element('leftpanel');?>
        
    </div><!-- leftpanel -->
    
    <div class="rightpanel">
        
    <ul class="breadcrumbs">
		<li><a href="#"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
		<li>Dashboard</li>
		<li class="right">
				<a href="" data-toggle="dropdown" class="dropdown-toggle"><i class="icon-tint"></i> Color Skins</a>
				<ul class="dropdown-menu pull-right skin-color">
					<li><a href="default">Default</a></li>
					<li><a href="navyblue">Navy Blue</a></li>
					<li><a href="palegreen">Pale Green</a></li>
					<li><a href="red">Red</a></li>
					<li><a href="green">Green</a></li>
					<li><a href="brown">Brown</a></li>
				</ul>
		</li>
	</ul>

<div class="pageheader">
	<div class="pageicon"><span class="iconfa-laptop"></span></div>
	<div class="pagetitle">
		<h5>All Features Summary</h5>
		<h1>Dashboard</h1>
	</div>
</div><!--pageheader-->

<div class="maincontent">
	<div class="maincontentinner">
		<div class="row-fluid">
			<?php echo $content_for_layout;?>
			<?php echo $this->element('rightpanel');?>
		</div><!--row-fluid-->
		
		<div class="footer">
			<?php echo $this->element('footer');?>
		</div><!--footer-->
		
	</div><!--maincontentinner-->
</div><!--maincontent-->

    </div><!--rightpanel-->
    
</div><!--mainwrapper-->
<script type="text/javascript">
    jQuery(document).ready(function() {
        //datepicker
        jQuery('#datepicker').datepicker();
        
        // tabbed widget
        jQuery('.tabbedwidget').tabs();
    });
</script>
</body>
</html>