<?php
     $config = App\Models\BackendModels\Configuration::first();
?>
<footer class="footer">
	  <div class="container-fluid">
		    <div class="row">
			      <div class="col-md-12 footer-copyright text-center">
			        	<p class="mb-0"><?php echo e($config->copy_right ?? ''); ?> <?php echo date("Y"); ?> Designed &amp; Developed by<a href="https://conceptionmasters.com/" target="_blank"> Conception Masters</a></p>
			      </div>
		    </div>
	  </div>
</footer>
<?php /**PATH /home/tuo1yqxe1xkd/public_html/live_project/project.conceptionmasters.com/next_client_dev/v2/resources/views/admin_dashboard/layouts/footer.blade.php ENDPATH**/ ?>