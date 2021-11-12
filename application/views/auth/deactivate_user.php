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
      
    <h1><?php echo lang('deactivate_heading');?></h1>
<p><?php echo sprintf(lang('deactivate_subheading'), $user->{$identity}); ?></p>

<?php echo form_open("auth/deactivate/".$user->id);?>

  <p>
  	<?php echo lang('deactivate_confirm_y_label', 'confirm');?>
    <input type="radio" name="confirm" value="yes" checked="checked" />
    <?php echo lang('deactivate_confirm_n_label', 'confirm');?>
    <input type="radio" name="confirm" value="no" />
  </p>

  <?php echo form_hidden($csrf); ?>
  <?php echo form_hidden(['id' => $user->id]); ?>

  <p><?php echo form_submit('submit', lang('deactivate_submit_btn'));?></p>

<?php echo form_close();?>


</section>
</div>

<?php 
    $this->load->view('dashboard/footer');
?>