<style>
    .scroll4::-webkit-scrollbar {
  width: 10px;
}
 
.scroll4::-webkit-scrollbar-thumb {
  background: #666;
  border-radius: 20px;

}

.scroll4::-webkit-scrollbar-track {
  background: #e9ecef !important;
  border-radius: 20px; 
   width: 4px !important;
}

</style> 
 <div class="wrapper row-offcanvas row-offcanvas-left ">
      <div class="position-fixed">
          <aside class="left-side sidebar-offcanvas bg-light  " style="min-height: 90vh !important; height: 90vh !important;">
              <div class="logonew">
                  <a href="<?= base_url('home/index') ?>" class="logo1">

                      <img class="" src="<?php echo base_url('uploads/landing_img/SL-black-logo.png'); ?>" alt="Image" style="width: 80%;">
                  </a>
              </div>
              <section class="sidebar ">
                  <div class="user-panel">
                      <div class="pull-left image">
                          <img style="display:block" src="<?= imagelink($this->session->userdata('photo')) ?>" class="rounded-circle" alt="" />
                      </div>
                      <div class="pull-left info">
                          <?php
                            $name = $this->session->userdata("name");
                            if (strlen($name) > 11) {
                                $name = substr($name, 0, 11) . "..";
                            }
                            echo "<p>" . $name . "</p>";
                            ?>
                          <a href="<?= base_url("profile/index") ?>">
                              <i class="fa fa-hand-o-right color-green"></i>
                              <?= $this->session->userdata("usertype") ?>
                          </a>
                      </div>
                  </div>
                  <div class="sidebar   scroll4 overflow-auto position-fixed " style="height: 400px; width: 215px;">
                      <?php $usertype = $this->session->userdata("usertype"); ?>
                      <ul class="sidebar-menu">
                          <?php

                            if (inicompute($dbMenus)) {
                                $menuDesign = '';
                                display_menu($dbMenus, $menuDesign);
                                echo $menuDesign;
                            }
                            ?>
                      </ul>
                  </div>
              </section>
          </aside>
      </div>