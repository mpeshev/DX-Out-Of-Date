<div class="wrap">
	<div id="icon-edit" class="icon32 icon32-base-template"><br></div>
	<h2><?php _e( "OOD Page", 'ood' ); ?></h2>
	
	<p><?php _e( "Sample ood page", 'ood' ); ?></p>
	
	<form id="dx-ood-form" action="options.php" method="POST">
		
			<?php settings_fields( 'ood_setting' ) ?>
			<?php do_settings_sections( 'dx-ood' ) ?>
			
			<?php submit_button(); ?>
	</form> 
</div>