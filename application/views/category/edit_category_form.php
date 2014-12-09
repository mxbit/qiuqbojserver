<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("category/update_category");?>

  <p>
    <?php echo 'Category Name'; ?>
    <?php echo form_input($category);?>
  </p>
    <?php echo form_input($categoryid);?>
  <p><?php echo form_submit('submit','Update ');?></p>

<?php echo form_close();?>