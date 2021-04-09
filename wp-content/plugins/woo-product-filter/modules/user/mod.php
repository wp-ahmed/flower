<?php
class userWpf extends moduleWpf {
	protected $_data = array();
    protected $_curentID = 0;
	protected $_dataLoaded = false;
	
    public function loadUserData() {
        return $this->getCurrent();
    }
    public function isAdmin() {
		if(!function_exists('wp_get_current_user')) {
			frameWpf::_()->loadPlugins();
		}
        return current_user_can( frameWpf::_()->getModule('adminmenu')->getMainCap() );
    }
	public function getCurrentUserPosition() {
		if($this->isAdmin())
			return WPF_ADMIN;
		else if($this->getCurrentID())
			return WPF_LOGGED;
		else 
			return WPF_GUEST;
	}
    public function getCurrent() {
		return wp_get_current_user();
    }
	
    public function getCurrentID() {
		$this->_loadUserData();
		return $this->_curentID;
    }
	protected function _loadUserData() {
		if(!$this->_dataLoaded) {
			if(!function_exists('wp_get_current_user')) frameWpf::_()->loadPlugins();
				$user = wp_get_current_user();
			$this->_data = $user->data;
			$this->_curentID = $user->ID;
			$this->_dataLoaded = true;
		}
	}
	public function getAdminsList() {
		global $wpdb;
		$admins = dbWpf::get('SELECT * FROM #__users 
			INNER JOIN #__usermeta ON #__users.ID = #__usermeta.user_id
			WHERE #__usermeta.meta_key = "#__capabilities" AND #__usermeta.meta_value LIKE "%administrator%"');
		return $admins;
	}
	public function isLoggedIn() {
		return is_user_logged_in();
	}
}

