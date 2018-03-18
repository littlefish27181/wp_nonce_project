<?php
 /**
  * @package littlefish27181\WPNonce
  */
namespace littlefish27181\WPNonce;

final class WPNonceValidator extends WPNonceAbstract {

	public function __construct( $param_action, $param_name = '_wpnonce' ) {
		parent::__construct( $param_action, $param_name );
	}

	private function validate() {
		$is_valid = wp_verify_nonce( $this->get_nonce(), $this->get_action() );
		if ( false === $is_valid ) {
			return $is_valid;
		} else {
			return true;
		}
	}

	/**
	 * Get all image nodes.
	 *
	 * @param \DOMNode     $node       The \DOMDocument instance
	 * @param boolean      $strict     If the document has to be valid
	 *
	 * @return \DOMNode
	 */
	public function validate_request() {
		$is_valid = false;
		if ( isset( $_REQUEST[ $this->get_name() ] ) ) {
			$nonce_received = sanitize_text_field( wp_unslash( $_REQUEST[ $this->get_name() ] ) );
			$this->set_nonce( $nonce_received );
			$is_valid = $this->validate();
		}
		return $is_valid;
	}

	/**
	 * Get all image nodes.
	 *
	 * @param \DOMNode     $node       The \DOMDocument instance
	 * @param boolean      $strict     If the document has to be valid
	 *
	 * @return \DOMNode
	 */
	public function validate_nonce( $param_nonce ) {
		$is_valid = false;
		
		$this->set_nonce( $param_nonce );
		$is_valid = $this->validate();
		return $is_valid;
	}
}