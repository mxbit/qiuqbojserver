<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("category/save_category");?>

  <p>
    <?php echo 'Category Name'; ?>
    <?php 
    $data = array(
              'name'        => 'category_name',
              'id'          => 'category_name',              
              'maxlength'   => '100',
              'size'        => '50',
              'style'       => 'width:50%',
            );

    echo form_input($data);    
    ?>
  </p>    
  <p><?php echo form_submit('submit','Save');?></p>

<?php echo form_close();?>