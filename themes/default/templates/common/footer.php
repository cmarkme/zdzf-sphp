	</div>
	<!-- end content -->
</div>
<!-- end body -->
</div>
<!-- end wrapper -->

<script>
var trav = <?php echo json_encode($this->config->item('ot_travel_accounts')); ?>,
base = '<?php echo site_url(); ?>';
</script>
<script type="text/javascript" src="<?php echo site_url('themes/default/js/jquery.autocomplete.js'); ?>"></script>
</body>
</html>