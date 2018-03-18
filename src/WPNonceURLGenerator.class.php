<?php
 /**
  * @package littlefish27181\WPNonce
  */
namespace littlefish27181\WPNonce;

final class WPNonceURLGenerator extends WPNonceGenerator {

	public function __construct( $param_action, $param_name = '_wpnonce' ) {
		parent::__construct( $param_action, $param_name );
	}

	public function generate_nonce_url( $param_actionurl ) {
		$this->generate_nonce();
		$name   = $this->get_name();
		$nonce  = $this->get_nonce();
		$actionurl = str_replace( '&amp;', '&', $param_actionurl );
		$url = esc_html( add_query_arg( $name, $nonce, $actionurl ) );
		return $url;
	}
}