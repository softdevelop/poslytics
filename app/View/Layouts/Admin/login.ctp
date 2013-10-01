<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="<?=Configure::read('base.img')?>favicon.ico" />
<?php echo $this->Html->charset();?>
<title><?php echo $title_for_layout;?></title>
<?php
echo $this->Html->css(array(
    'admin/login'
));
echo $scripts_for_layout;
?>
</head>

<body>
<div class="container">
  <div class="grid">
        <?php echo $content_for_layout;?>
  </div>
</div>
<br clear="all" />
</body>
</html>
