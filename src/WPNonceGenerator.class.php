<?php
 /**
  * @package littlefish27181\WPNonce
  */
namespace littlefish27181\WPNonce;

class WPNonceGenerator extends WPNonceAbstract {
	
	public function __construct( $param_action, $param_name = '_wpnonce' ) {
		parent::__construct( $param_action, $param_name );
	}
	
	public function generate_nonce() {
		$this->set_nonce( wp_create_nonce( $this->get_action() ) );
		return $this->get_nonce();
	}
}