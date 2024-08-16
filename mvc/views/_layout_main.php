<?php $this->load->view("components/page_header"); ?>

<?php $this->load->view("components/page_menu"); ?>

        <aside class="right-side">
            <section class="content">
                <div class="row">
                    <div class="col-xs-12 bg-litegray" style="padding:0px">
                    <?php $this->load->view("components/page_topbar"); ?>
                        <?php  $this->load->view($subview);  ?>
                    </div>
                </div>
            </section>
        </aside>

        <footer class="main-footer">
          	<div class="pull-right hidden-xs">
            	<b>v</b> <?=config_item('ini_version')?>
          	</div>
          	<strong>Copyright © OXBRIDGE DIGITAL</strong>
        </footer>
<?php $this->load->view("components/page_footer"); ?>


