<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Loader extends CI_Loader
{
    // Set the default theme. Make sure this folder exists!
    public $theme = 'default';
    
    public function __construct() 
    {
        parent::__construct();
        // Set the loader to use the default theme path.
        $this->set_theme($this->theme);
    }
    
    /**
     * Set the theme location. This is where the loader class will look for view files.
     * his location is in the webroot, like public_html/themes/default.
     * New theme? Upload all views, css, images, jascripts to public_html/themes/my-new-theme
     * @param string $theme_name
     * @return void
     */
    public function set_theme($theme_name)
    {
        $this->theme = $theme_name;
        $this->_ci_view_path = FCPATH . 'themes/' . $this->theme . '/templates/';

        $this->_ci_view_paths = array_merge($this->_ci_view_paths, array(FCPATH . 'themes/' . $this->theme . '/templates/' => TRUE));
    }

    public function theme_css($name)
    {
        return $this->config->item('base_url') . 'themes/' . $this->theme . '/css/'.$name.'.css';
    }
} 