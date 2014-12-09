<p><?php //echo lang('login_subheading');?></p>
<div class="grid fluid">
    <div class="row">
        <div class="span6">
            <div id="infoMessage"><?php //echo $message;?></div>
            <div class="">
                <?php echo form_open("auth/login");?>
                <fieldset>
                    <legend><?php echo lang('login_heading');?></legend>
                    <label><?php echo lang('login_identity_label', 'identity');?></label>
                    <div class="input-control text" data-role="input-control">
                        <?php echo form_input($identity);?>
                    </div>
                    <label> <?php echo lang('login_password_label', 'password');?></label>
                    <div class="input-control password" data-role="input-control">
                        <?php echo form_input($password);?>
                    </div>
                    <div class="input-control checkbox" data-role="input-control">
                        <label>
                            <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
                            <span class="check"></span>
                            <?php echo lang('login_remember_label', 'remember');?>
                        </label>
                    </div>
                    <div>
                        <?php echo form_submit('submit', 'Login');?>
                    </div>
                    <p><br><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
                </fieldset>
                <?php echo form_close();?>
            </div>            
        </div>
        <div class="span6"></div>
    </div>
</div>