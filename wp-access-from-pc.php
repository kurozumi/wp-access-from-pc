<?php
/*
  Plugin Name: WP Access From PC
  Version: 0.1-alpha
  Description: when the access from PC
  Author: kurozumi
  Author URI: 
  Plugin URI: 
  Text Domain: wp-access-from-pc
  Domain Path: /languages
 */

$access_from_pc = new WP_Access_From_PC;
$access_from_pc->register();

class WP_Access_From_PC
{
	public function register()
	{
		add_action('plugins_loaded', array($this, 'plugins_loaded'));

	}

	public function plugins_loaded()
	{
		if (wp_is_mobile())
			return;

		if(isset($_COOKIE['from-pc']))
			return;			
		
		add_action('wp_enqueue_scripts', array($this, 'wp_enqueue_scripts'));
		add_action( 'wp_footer', array( $this, 'wp_footer' ) );

	}

	public function wp_enqueue_scripts()
	{
		wp_enqueue_style('wp-access-from-pc',  plugin_dir_url(__FILE__) . '/assets/css/style.css');
		wp_enqueue_script('wp-access-from-pc', plugin_dir_url(__FILE__) . '/assets/js/script.js', array('jquery'));
		wp_enqueue_script('js-cookie',         plugin_dir_url(__FILE__) . '/assets/js/js-cookie/src/js.cookie.js');

	}
	
	public function wp_footer()
	{
		?>
		<div id="pc-view">
			<div class="box">
				<img src="<?php echo plugin_dir_url(__FILE__) . '/assets/images/close.png';?>" class="button" />
			</div>
		</div>
<?php
	}

}
