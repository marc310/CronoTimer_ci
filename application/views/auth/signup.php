<!DOCTYPE html>
<html>
<head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MJH6XPP');</script>
<!-- End Google Tag Manager -->

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="../uploads/logo/icon.png">
  <meta name="author" content="Marcelo Motta">

  <title><?php echo lang('title_page_register');?> | <?php echo system_client(); ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap.min.css');?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo site_url('resources/css/AdminLTE.min.css');?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition register-page">
      <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MJH6XPP"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    
<div class="register-box">
  <div class="register-logo">
      <a href="<?php echo site_url(); ?>">
            <img style="max-width: 220px;" alt="" src="<?php echo getLogo('logo_footer'); ?>">
      </a>
      </div>

  <div class="register-box-body text-center">
          
    <h1><?php echo lang('register_user_heading');?></h1>
<p><?php echo lang('create_user_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/register_user");?>

      <div class="col-md-12 text-center">
      <div class="col-md-12">
        <?php echo lang('create_user_uname_label', 'username');?> 
        <div class="form-group">
              <?php echo form_input($username);?>
        </div>
      </div>

      <div class="col-md-12">
            <?php echo lang('create_user_fname_label', 'first_name');?> 
      <div class="form-group">
            <?php echo form_input($first_name);?>
      </div>
      </div>

      <div class="col-md-12">
            <?php echo lang('create_user_lname_label', 'last_name');?> 
      <div class="form-group">
            <?php echo form_input($last_name);?>
      </div>
      </div>

      <?php
      if($identity_column!=='email') {
          echo '<p>';
          echo lang('create_user_identity_label', 'identity');
          echo '';
          echo form_error('identity');
          echo form_input($identity);
          echo '</p>';
      }
      ?>

      <div class="col-md-12">
            <?php echo lang('create_user_company_label', 'company');?> 
      <div class="form-group">
            <?php echo form_input($company);?>
      </div>
      </div>

      <div class="col-md-12">
            <?php echo lang('create_user_email_label', 'email');?> 
      <div class="form-group">
            <?php echo form_input($email);?>
      </div>
      </div>

      <div class="col-md-12">
       <?php echo lang('create_user_phone_label', 'phone');?> 
      <div class="form-group">
            <?php echo form_input($phone);?>
      </div>
      </div>

      <div class="col-md-12">
            <?php echo lang('create_user_password_label', 'password');?> 
      <div class="form-group">
            <?php echo form_input($password);?>
      </div>
      </div>

      <div class="col-md-12">
            <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> 
      <div class="form-group">
            <?php echo form_input($password_confirm);?>
      </div>
      </div>


      </div>
      <div class="social-auth-links text-center">
            <p><?php echo form_submit('submit', lang('register_user_submit_btn'));?></p>
      </div>

<?php echo form_close();?>
<div class="text-center">
      <a href="<?php echo site_url('auth/login');?>" class="text-center"><?php echo lang('already-have-account');?></a>
</div>
  

</div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<script type="text/javascript" src="<?php echo site_url('resources/js/jquery.min.js');?>"></script>
<script type="text/javascript" src="<?php echo site_url('resources/js/bootstrap.min.js');?>"></script>

<!-- iCheck -->
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>