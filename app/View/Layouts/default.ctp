<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>PosLytics</title>
<?php echo $this->Html->css('style.default'); ?>
<?php echo $this->Html->css('responsive-tables'); ?>
<?php echo $this->Html->css('bootstrap-fileupload.min'); ?>
<?php echo $this->Html->css('bootstrap-timepicker.min'); ?>
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
		'bootstrap-timepicker.min',
		'responsive-tables',
		'jquery.dataTables.min',
		'bootstrap-fileupload.min',
		'custom'
	));
	?>
<script type="text/javascript">
    jQuery(document).ready(function(){
        // dynamic table
        jQuery('#dyntable').dataTable({
            "sPaginationType": "full_numbers",
            "aaSortingFixed": [[0,'asc']],
            "fnDrawCallback": function(oSettings) {
                jQuery.uniform.update();
            }
        });
        
        jQuery('#dyntable2').dataTable( {
            "bScrollInfinite": true,
            "bScrollCollapse": true,
            "sScrollY": "300px"
        });
        
    });
</script>
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
            <li><a href="#">Tables</a> <span class="separator"></span></li>
            <li><?php if(!isset($title_page)){
			echo __('PosLytics');
			}else{
			echo $title_page;
			}?></li>
            
            <!-- <li class="right">
                <a href="" data-toggle="dropdown" class="dropdown-toggle"><i class="icon-tint"></i> Color Skins</a>
                <ul class="dropdown-menu pull-right skin-color">
                    <li><a href="default">Default</a></li>
                    <li><a href="navyblue">Navy Blue</a></li>
                    <li><a href="palegreen">Pale Green</a></li>
                    <li><a href="red">Red</a></li>
                    <li><a href="green">Green</a></li>
                    <li><a href="brown">Brown</a></li>
                </ul>
            </li> -->
        </ul>
        
        <div class="pageheader">
            <div class="pageicon"><span class="iconfa-table"></span></div>
            <div class="pagetitle">
                <h5>Tables</h5>
                <h1><?php if(!isset($title_page)){
				echo __('PosLytics');
				}else{
				echo $title_page;
				}?></h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
               <?php echo $content_for_layout;?>
                <div class="footer">
                    <?php echo $this->element('footer');?>
                </div><!--footer-->
            
            </div><!--maincontentinner-->
        </div><!--maincontent-->
        
    </div><!--rightpanel-->
    
</div><!--mainwrapper-->
</body>
</html>
