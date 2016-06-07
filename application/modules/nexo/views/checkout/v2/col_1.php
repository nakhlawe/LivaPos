<?php global $Options;?>
<div class="box box-primary direct-chat direct-chat-primary" id="cart-details-wrapper" style="visibility:hidden">
    <div class="box-header with-border" id="cart-header">
        <h3 class="box-title">
            <?php _e( 'Caisse', 'nexo' );?>
        </h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-sm btn-primary cart-add-customer"><i class="fa fa-user"></i> <?php _e( 'Ajouter un client', 'nexo' );?></button>
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer" id="cart-search-wrapper">
        <form action="#" method="post">
            <select data-live-search="true" name="customer_id" placeholder="<?php _e( 'Codebarre ou UGS...' );?>" class="form-control customers-list dropdown-bootstrap">
                <option value=""><?php _e( 'Sélectionner un client', 'nexo' );?></option>
            </select>
        </form>
    </div>
    <!-- /.box-footer--> 
    <!-- /.box-header -->
    <div class="box-body">
    	<table class="table" id="cart-item-table-header">
        	<thead>
                <tr class="active">
                    <td width="210" class="text-left"><?php _e( 'Article', 'nexo' );?></td>
                    <td width="130" class="text-center"><?php _e( 'Prix Unitaire', 'nexo' );?></td>
                    <td width="145" class="text-center"><?php _e( 'Quantité', 'nexo' );?></td>
                    <td width="115" class="text-right"><?php _e( 'Prix Total', 'nexo' );?></td>
                </tr>
            </thead>
        </table>
        <div class="direct-chat-messages" id="cart-table-body" style="padding:0px;">
            <table class="table" style="margin-bottom:0;">                
                <tbody>
                	<tr id="cart-table-notice">
                    	<td colspan="4"><?php _e( 'Veuillez ajouter un produit...', 'nexo' );?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <table class="table" id="cart-details">
            <tfoot>
                <tr class="active">
                    <td width="230" class="text-right"></td>
                    <td width="130" class="text-right"></td>
                    <td width="130" class="text-right">
						<?php 
						if( @$Options[ 'nexo_enable_vat' ] == 'oui' ) {
							_e( 'Net hors taxe', 'nexo' );
						} else {
							_e( 'Total', 'nexo' );
						}
						?>
                    </td>
                    <td width="110" class="text-right"><span id="cart-value"></span></td>
                </tr>
                <tr class="active">
                    <td colspan="2" width="380" class="text-right cart-discount-notice-area"></td>
                    <td width="130" class="text-right"><?php _e( 'Remise', 'nexo' );?></td>
                    <td width="110" class="text-right"><span id="cart-discount"></span></td>
                </tr>
                <?php 
				if( @$Options[ 'nexo_enable_vat' ] == 'oui' && ! empty( $Options[ 'nexo_vat_percent' ] ) ) {
				?>
                <tr class="active">
                    <td width="230" class="text-right"></td>
                    <td width="130" class="text-right"></td>
                    <td width="130" class="text-right"><?php echo sprintf( __( 'TVA (%s%%)', 'nexo' ), $Options[ 'nexo_vat_percent' ] );?></td>
                    <td width="110" class="text-right"><span id="cart-vat"></span></td>
                </tr>
                <?php
				}
				?>
                <tr class="success">
                    <td width="230" class="text-right"></td>
                    <td width="130" class="text-right"></td>
                    <td width="130" class="text-right"><strong><?php _e( 'Net à payer', 'nexo' );?></strong></td>
                    <td width="110" class="text-right"><span id="cart-topay"></span></td>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
    <div class="box-footer" id="cart-panel">
        <div class="btn-group btn-group-justified" role="group" aria-label="...">
          <div class="btn-group" role="group">
            <button type="button" class="btn btn-app btn-default btn-lg" id="cart-pay-button" style="margin-bottom:0px;">
			<i class="fa fa-money"></i>
			<?php _e( 'Payer', 'nexo' );?>
            </button>
          </div>
          <div class="btn-group" role="group">
            <button type="button" class="btn btn-app btn-default btn-lg" id="cart-discount-button"  style="margin-bottom:0px;">
            	<i class="fa fa-gift"></i>
				<?php _e( 'Remise', 'nexo' );?>
			</button>
          </div>
          <div class="btn-group" role="group">
            <button type="button" class="btn btn-app btn-default btn-lg" id="cart-return-to-order"  style="margin-bottom:0px;">
            	<i class="fa fa-remove"></i>
				<?php _e( 'Annuler', 'nexo' );?>
			</button>
          </div>
        </div>
    </div>
    <!-- /.box-footer--> 
</div>
<?php if( @$Options[ 'nexo_enable_stripe' ] != 'no' ):?>
<script type="text/javascript" src="https://checkout.stripe.com/checkout.js"></script>
<script type="text/javascript">
	'use strict';
	// Close Checkout on page navigation:
	$(window).on('popstate', function() {
		v2Checkout.stripe.handler.close();
	});
</script>
<?php endif;?>
<style type="text/css">
.expandable {
	width: 19%;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    transition-property: width;
	transition-duration: 2s;
}
.item-grid-title {
	width: 19%;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    transition-property: width;
	transition-duration: 2s;
}
.item-grid-price {
	width: 19%;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    transition-property: width;
	transition-duration: 2s;
}
.expandable:hover{
	overflow: visible; 
    white-space: normal; 
    width: auto;
}
.shop-items:hover {
	background:#FFF;
	cursor:pointer;
	box-shadow:inset 5px 5px 100px #EEE;
}
.noselect {
  -webkit-touch-callout: none; /* iOS Safari */
  -webkit-user-select: none;   /* Chrome/Safari/Opera */
  -khtml-user-select: none;    /* Konqueror */
  -moz-user-select: none;      /* Firefox */
  -ms-user-select: none;       /* Internet Explorer/Edge */
  user-select: none;           /* Non-prefixed version, currently
                                  not supported by any browser */
}
.img-responsive {
    margin: 0 auto;
}
</style>