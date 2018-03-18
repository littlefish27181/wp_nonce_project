<?php
 /**
  * @package littlefish27181\WPNonce
  */
namespace littlefish27181\WPNonce;

abstract class WPNonceAbstract implements WPNonceInterface {

	/**
	 * Action string.
	 *
	 * @var    string $action The nonce action value.
	 */
	private $action;

	/**
	 * Name of the nonce.
	 *
	 * @var    string $name The nonce request name.
	 */
	private $name;

	/**
	 * Nonce value.
	 *
	 * @var    string $nonce The nonce value.
	 */
	private $nonce;

	/**
	 * WPNonceAbstract Class constructor.
	 *
	 * @param    string $param_action     The nonce action value.
	 * @param    string $param_name       Optional. The nonce request name. Default = '_wpnonce'.
	 */
	public function __construct($param_action, $param_name = '_wpnonce' ) {
        $this->set_action( $param_action );
        $this->set_name( $param_name );
        $this->set_nonce( null );
    }

	/**
	 * Get action property.
	 *
	 * @return string $action Action value.
	 */
	public function get_action() {
		return $this->action;
	}


	/**
	 * Set action property.
	 *
	 * @param string $param_action Action value.
	 * @return string $action      Action value set.
	 */
	public function set_action( $param_action ) {
		$this->action = $param_action;
		return $this->get_action();
	}

	/**
	 * Get request name property.
	 *
	 * @return string $name The nonce name value.
	 */
	public function get_name() {
		return $this->name;
	}
	
	/**
	 * Set request name property.
	 *
	 * @param string $param_name Name for the nonce value to set.
	 * @return string $name      The nonce name value set.
	 */
	public function set_name( $param_name ) {
		$this->name = $param_name;
		return $this->get_name();
	}

	/**
	 * Get nonce property.
	 *
	 * @return string $nonce Nonce value.
	 */
	public function get_nonce() {
		return $this->nonce;
	}

	/**
	 * Set nonce property.
	 *
	 * @param string $param_nonce Nonce value to set.
	 * @return string $nonce      Nonce value set.
	 */
	public function set_nonce( $param_nonce ) {
		$this->nonce = $param_nonce;
		return $this->get_nonce();
	}
}