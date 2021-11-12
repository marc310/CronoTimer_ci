
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-MJH6XPP');</script>
  <!-- End Google Tag Manager -->
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../uploads/logo/icon.png">
    <meta name="author" content="Marcelo Motta">

    <title><?php echo lang('login-on') . getSetting('web_title');?></title>

    <!-- Bootstrap -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
    <script type="text/javascript" src="<?php echo site_url('resources/main/js/jquery.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo site_url('resources/main/js/bootstrap.min.js');?>"></script>


    <link rel="stylesheet" href="<?php echo site_url('resources/main/css/animate.css'); ?>" />
    <link rel="stylesheet" href="<?php echo site_url('resources/main/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo site_url('resources/main/css/magnific-popup.css'); ?>">
    <link rel="stylesheet" href="<?php echo site_url('resources/main/css/font-awesome.min.css'); ?>" />
    <link rel="stylesheet" href="<?php echo site_url('resources/main/css/style.css');?>">
    <link href="<?php echo site_url('resources/css/login.css'); ?>" rel="stylesheet">
    
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/popper.js"></script> -->
</head>

<body class="account">
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MJH6XPP"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

    <div class="container">
        <div class="row">
            <div class="account-col text-center">
                <div class="logo">
                  <a href="<?php echo site_url(); ?>">
                    <img alt="" src="<?php echo getLogo('logo_footer'); ?>">
                  </a>
                </div>

                <div class="row mb-3">

                  <h2 class="title-font font-weight-600  border-color-fast-yellow display-inline-block letter-spacing-2 mb-3"><?php echo lang('login_heading');?></h2>
                  
                  <p class="text-medium sm-width-100 margin-lr-auto "><?php echo lang('login_subheading');?></p>

                  <div id="infoMessage"><?php echo $message;?></div>
                </div>

                    <?php echo form_open("auth/login");?>

                    <div class="form-group">
                      <p>
                        <?php
                          $identity = array(
                            'name'        => 'identity',
                            'id'        => 'identity',
                            'type'        => 'username',
                            'placeholder' => 'john@example.com',
                            'class' => 'form-control'
                        );
                         echo lang('login_identity_label', 'identity');
                        echo form_input($identity);
                        ?>
                      </p>
                    </div>

                      <p>
                        <?php
                          $password = array(
                            'name'  => 'password',
                            'name'  => 'password',
                            'type'        => 'password',
                            'placeholder' => lang('enter-password'),
                            'class' => 'form-control'
                        );
                        echo lang('login_password_label', 'password');
                        echo form_input($password);?>
                      </p>

                    <div class="form-group">
                      <p>
                        <?php
                        echo lang('login_remember_label', 'remember');
                        echo form_checkbox('remember', '1', FALSE, 'id="remember"');
                        ?>
                      </p>
                    </div>

                    <div class="buttons-login">
                      <p><?php echo form_submit('submit', lang('login_submit_btn'), array('class' => 'btn btn-primary btn-p btn-github', 'style' => 'width: 100%'));?></p>
                    </div>

                    <?php echo form_close();?>

                    <a href="forgot_password"><small><?php echo lang('login_forgot_password');?></small></a>
                    <p class=" text-center"><small><?php echo lang('do-not-have-account');?></small></p>

                    <a  href="<?php echo site_url('auth/register_user'); ?>">
                        <button class="btn btn-default btn-p"><?php echo lang('create-account');?></button>
                    </a>

                    <p>    <?php echo admin_copyright(); ?> </p>

                    </div>
        </div>
    </div>
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
    
    <script type="text/javascript" src="src/js/custom.js"></script> -->
</body>
</html>
<!-- 
<?php 
    // $this->load->view('dashboard/footer');
?> -->