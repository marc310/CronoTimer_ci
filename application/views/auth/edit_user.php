<?php 
      $this->load->library('cart');
      $this->load->view('dashboard/header');
      $this->load->view('dashboard/menu');

      if ($this->ion_auth->is_admin()){
            $this->load->view('dashboard/sidemenu');
      }
      else
      {
            $this->load->view('client_panel/client_menu');
      }
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <!-- Main content -->
      <section class="content">
            <span hidden id="id_ref"><?php echo $user->id; ?></span>
    <div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title"><?php echo lang('edit_user_heading');?></h3>
                  <p><?php echo lang('edit_user_subheading');?></p>
            </div>
            <div id="infoMessage"><?php echo $message;?></div>
            
            <div class="box-body">
                  
            <div class="col-md-12">
                  
                  <div class="row img-profile" id="profile_prev">
                        
                  <?php if( $user->user_profile != ''){ ?>
                        <span id="user_profile_file" hidden><?php echo $user->user_profile ?></span>
                        <img id="user_profile_prev"  class="user_profile" src="<?php echo site_url() . 'uploads/users/' . $user->user_profile ?>" alt="">
                  <?php } else { ?>
                  <i class="fa fa-image"></i>
                  <?php } ?>
                  </div>
                  <label for="user_profile" class="control-label">Update Profile Image</label>
                  <div class="form-group">
                        <input type="file" name="user_profile" value="<?php echo ($this->input->post('user_profile') ? $this->input->post('user_profile') : $user->user_profile); ?>" class="form-control" id="user_profile" />
                  </div>
            </div>
                  
      <?php echo form_open(uri_string());?>
      <p>
            <?php echo lang('edit_user_uname_label', 'username');?> <br />
            <?php echo form_input($username);?>
      </p>

      <p>
            <?php echo lang('edit_user_bio_uname_label', 'user_bio');?> <br />
            <?php echo form_input($user_bio);?>
      </p>

      <p>
            <?php echo lang('edit_user_email_label', 'email');?> <br />
            <?php echo form_input($email);?>
      </p>

      <p>
            <?php echo lang('edit_user_fname_label', 'first_name');?> <br />
            <?php echo form_input($first_name);?>
      </p>

      <p>
            <?php echo lang('edit_user_lname_label', 'last_name');?> <br />
            <?php echo form_input($last_name);?>
      </p>

      <p>
            <?php echo lang('edit_user_company_label', 'company');?> <br />
            <?php echo form_input($company);?>
      </p>

      <p>
            <?php echo lang('edit_user_phone_label', 'phone');?> <br />
            <?php echo form_input($phone);?>
      </p>

      <p>
            <?php echo lang('edit_user_password_label', 'password');?> <br />
            <?php echo form_input($password);?>
      </p>

      <p>
            <?php echo lang('edit_user_password_confirm_label', 'password_confirm');?><br />
            <?php echo form_input($password_confirm);?>
      </p>

      <div class="row" style="margin-left: 1px;">

            <?php if ($this->ion_auth->is_admin()): ?>
                  
                  <h3><?php echo lang('edit_user_groups_heading');?></h3>
                  <?php foreach ($groups as $group):?>
                  <div class="col-sm-2" style="margin-left: 15px; padding: 15px;">
                    <label class="checkbox">
                    <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>" <?php echo (in_array($group, $currentGroups)) ? 'checked="checked"' : null; ?>>
                    <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
                  </label>
                  </div>
                <?php endforeach?>
      
            <?php endif ?>
      </div>


      <?php echo form_hidden('id', $user->id);?>
      <?php echo form_hidden($csrf); ?>

      <p><?php echo form_submit('submit', lang('edit_user_submit_btn'));?></p>

<?php echo form_close();?>
</div>


</section>
</div>

<?php 
    $this->load->view('dashboard/footer');
?>