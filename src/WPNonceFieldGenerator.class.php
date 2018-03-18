<?php
 /**
  * @package littlefish27181\WPNonce
  */
namespace littlefish27181\WPNonce;

final class WPNonceFieldGenerator extends WPNonceGenerator {

	public function __construct( $param_action, $param_name = '_wpnonce' ) {
		parent::__construct( $param_action, $param_name );
	}

	public function generate_nonce_field( $param_referer = true, $param_echo = true ) {
		$this->generate_nonce();
		$name   = $this->get_name();
		$nonce  = $this->get_nonce();
		$name = esc_attr( $name );
		$nonce_field = '<input type="hidden" id="' . $name . '" name="' . $name . '" value="' . $nonce . '" />';
		if ( $param_referer ) {
			$nonce_field .= wp_referer_field( false );
		}
		if ( $param_echo ) {
			echo $nonce_field;
		}
		return $nonce_field;
	}
}