<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
   <?php $this->load->view('includes/head');?>

    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo">
        <?php $this->load->view('includes/header');?>
        <input type="hidden" id="baseUrl" value="<?php echo base_url();?>">
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <?php $this->load->view('includes/sidebar');?>
            <?php $this->load->view($contents);?>
        </div>
        <!-- END CONTAINER -->
        <?php $this->load->view('includes/footer');?>

        <?php $this->load->view('includes/javascript');?>
    </body>

</html>