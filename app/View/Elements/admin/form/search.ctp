<?php echo $this->Form->create($form,array('action'=>'search'));
?>
<span><?php echo $title; ?></span>
<?php
    if(isset($this->passedArgs['Search.keywords'])){
        $key = $this->passedArgs['Search.keywords'];
    ?>
    <input type="text" id="SearchKeywords" name="data[Search][keywords]" value="<?php echo $key; ?>">
    <?php }else{ ?>
    <input type="text" id="SearchKeywords" name="data[Search][keywords]">
    <?php } ?>
    <input type="submit" value="Tìm kiếm" class="submit">
<?php echo $this->Form->end();?>
