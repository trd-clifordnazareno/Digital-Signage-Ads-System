<?php session_start();    ?>
<?php $this->load->view('template/header'); ?>
<?php if(isset($success)) echo $success;   ?>
<ol class="breadcrumb">
                        <li><a href="http://richmedia.com.ph"><i class=""></i> <?php //echo $page_content;    ?>BACK TO RICHMEDIA NETWORK WEBSITE</a></li>
                        <!--<li class="active">--><!--Widgets--><?php //echo $page_content2;   ?><!--</li>-->
                    </ol>
                    
                    <!--<div class="alert alert-danger alert-dismissible" style="margin-top: 10px;">
                <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>-->
                <!--<h4><i class="icon fa fa-ban"></i> DISCLAIMER:</h4>
                Video Material that are running in the actual locations may differ to what is being shown in the remote content. This is due to the limitations in immediately accessing the locations' internet connection, also power failure issues that will lead to rebooting of the system devices, and other factors beyond our control. However, during those downtimes, as part of our commitment of 100% service quality, we ensure to fix all the problems as soon as possible and we promise that all videos that will run in the remote content are 100% transmitted in all the screens allocated.
              </div>-->
              
                <!--</section>-->

                <!-- Main content -->
                <section class="content" style="margin-top: -15px;">
                    <!-- /.content -->
<div id="<?php echo $content_playlist; ?>"></div>

<?php $this->load->view('template/footer'); ?>

<script>
    $(document).ready(function(){
       $("#content_playlist").load("<?php echo site_url();    ?>/view_running_status/view_running_status/view_status");
    });
    </script>
    
    
    
    
    <script>
    $(document).ready(function(){
       $("#<?php echo $contents; ?>").load("<?php echo site_url();    ?>/view_running_status/view_running_status/get_playlist_seq");
    });
    </script>


<?php

if(isset($_SESSION['viewsess'])){
    ?>
    <script>
        windows.location = "http://richmedia.com.ph/rmni/index.php/login";
    </script>
    <?php
}


?>