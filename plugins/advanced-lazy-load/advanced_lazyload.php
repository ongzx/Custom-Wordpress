<?php
/*
 * Plugin Name: Advanced lazy load
 * Plugin URI: http://www.kasonz.com/developement/advanced-lazy-load/
 * Description: By using this pulgin, reduce the loading time while opening your wordpress website, accelerate page openning time. Loading image in the last and display base on user screen scrolling.
 * Author: kasonzhao
 * Version: 1.6.0
 * Author URI: http://www.kasonz.com/developement/advanced-lazy-load/
 * License: GPLv2 or later.
 */



/*Call 'LZ_option_link' function to Add a submenu link under Profile tab.*/
add_action('admin_menu', 'LZ_option_link');



add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'add_action_links' );

function add_action_links ( $links ) {
 $mylinks = array(
 '<a href="' . admin_url( 'options-general.php?page=Advanced-lazy-load' ) . '">Settings</a>',
 );
return array_merge( $links, $mylinks );
}

/**
 * Function Name: lz_install
 * Description: Save data to database at the time of plugin install.
 *
 */
register_activation_hook(__FILE__, 'lz_install');
function lz_install()
  {
    $ifd_pixel = (get_option('ifd_pixel') != '') ? get_option('ifd_pixel') : '0';
    update_option('ifd_pixel', $ifd_pixel);
    
    $ifd_duration = (get_option('ifd_duration') != '') ? get_option('ifd_duration') : '1000';
    update_option('ifd_duration', $ifd_duration);
	
	 $adlzylad_mobile = (get_option('cb_adlzylad_mobile') != '') ? get_option('cb_adlzylad_mobile') : "on";
    update_option('cb_adlzylad_mobile', $adlzylad_mobile);
	
  }



/**
 * Function Name: LZ_option_link
 * Description: Add a submenu under Settings tab.
 *
 */
function LZ_option_link()
  {
    add_options_page('Advanced lazy load', 'Advanced lazy load', 'manage_options', 'Advanced-lazy-load', 'Advancedlazyload_form');
  }
//the 'Advanced-lazy-load_form' content


function ifmobileison(){
if(get_option('cb_adlzylad_mobile')=="on"){
echo "checked";
}
}

function Advancedlazyload_form()
  {
    
    
    
    /**
     * Check whether the form submitted or not.
     */
    if (isset($_POST['option-save']))
      {
        echo "<p><strong>Options saved!</strong></p>";
        $ddsadsa = trim($_POST['ifd_pixel']);
        update_option('ifd_pixel', $ddsadsa);
        
        $duration = trim($_POST['ifd_duration']);
        update_option('ifd_duration', $duration);
        
        $skipclass = trim($_POST['ifd_adlaylad_skipclass']);
        update_option('ifd_adlaylad_skipclass', $skipclass);
		
		$skipURL = trim($_POST['ta_adlaylad_skipurl']);
        update_option('ta_adlaylad_skipurl', $skipURL);
		
		  $All_mobile = trim($_POST['cb_adlzylad_mobile']);
        update_option('cb_adlzylad_mobile', $All_mobile);
        
        
      }
?>
<div  style="float:left;width:99%;" >
    
    
    
    
    <div class="welcome-panel" id="welcome-panel">

            <div class="welcome-panel-content">
    <h3>Welcome to Advanced lazy load!</h3>
    <p class="about-description">Version: 1.6.0</p>
    <p>By using ths plugin for wordpress, it will reduce the loading time while opening your wordpress website</p>
<p>This is initial edition of Advanced lazy load, many features will be added in future versions, compatible with all current browsers.</p>
	<p><b>Important - 1.6.0</b> - Recompiled the core function. In case you are experiencing any issues, you can roll back to stable version 1.5.1</p>
    <div class="welcome-panel-column-container">

    <div class="welcome-panel-column">
        <h4>Guides</h4>
        <ul>
        <li><a class="welcome-icon welcome-learn-more" target="_blank" href="http://www.kasonz.com/developement/advanced-lazy-load/">Advanced lazy load Detail</a></li>
        
                    <li><a class="welcome-icon dashicons-admin-page"  target="_blank"  href="https://wordpress.org/plugins/advanced-lazy-load/">WordPress Plugin Home</a></li>
        
        </ul>
    </div>
    <div class="welcome-panel-column welcome-panel-last">
        <h4>More Actions</h4>
        <ul>
        <li><a class="welcome-icon dashicons-admin-users"  target="_blank"  href="http://www.kasonz.com">Author website</a></li>

                    <li><a class="welcome-icon welcome-write-blog" target="_blank" href="http://www.kasonz.com/contact/">Contact</a></li>
        </ul>
    </div>
        <div class="welcome-panel-column">
       <h4>Rating</h4>
<p>Like it?  <br/>Please help to <a target="_blank" href="https://wordpress.org/support/view/plugin-reviews/advanced-lazy-load">Rate a Five</a>. Thank you! <br/>
<a target="_blank" href="https://wordpress.org/support/view/plugin-reviews/advanced-lazy-load">
<img width="20px" src="<?php echo plugin_dir_url(__FILE__); ?>imgs/star.png" />
<img width="20px" src="<?php echo plugin_dir_url(__FILE__); ?>imgs/star.png" />
<img width="20px" src="<?php echo plugin_dir_url(__FILE__); ?>imgs/star.png" />
<img width="20px" src="<?php echo plugin_dir_url(__FILE__); ?>imgs/star.png" />
<img width="20px" src="<?php echo plugin_dir_url(__FILE__); ?>imgs/star.png" />
</a>
</p>





            </div>
    
    </div>
    </div>
        </div>
    <form  id="option-form" method="post" name="option-form">

<div class="welcome-panel" id="welcome-panel">
<h3>Settings</h3>
        <table id="aws-option-table" cellpadding="10">
            <tr>
                <td>Pixel:</td>
                <td><input type="text"  maxlength="10" size="10" name="ifd_pixel" value="<?php
    echo get_option('ifd_pixel');
?>" /> px</td>
            </tr>
            
            
            <tr>
                <td>Fading in duration:</td>
                <td><input type="text"  maxlength="10" size="10" name="ifd_duration" value="<?php
    echo get_option('ifd_duration');
?>" /> millisecond</td>
            </tr>
            <tr>
                <td>Skip img class(es):</td>
                <td><input type="text"  maxlength="999" size="70" name="ifd_adlaylad_skipclass" value="<?php
    echo get_option('ifd_adlaylad_skipclass');
?>" /><br/><span class="description">Separated by comma, example: no-lazy,welcome-image,websitelogo</span>

</td>
            </tr>
			            <tr>
                <td>Skip URL(s):</td>
                <td>
<textarea rows="9" cols="80" name="ta_adlaylad_skipurl" style="font-size:8pt;">
<?php echo get_option('ta_adlaylad_skipurl')?>
</textarea>
<br/><span class="description">Separated by newline, if URL contains listed character string above, the plugin will ignore the page. Example:<br/>www.example.com/page-no-lazy-load<br/>
category?=abc</span>
</td>
            </tr>
			
			            <tr>
                <td>Enable on mobile device:</td>
                <td><input type="checkbox" name="cb_adlzylad_mobile" <?php ifmobileison() ?> />

</td>
            </tr>
            
            <tr>
            
                <td></td>
                <td></td>
            </tr>
        </table>
        <p><input id="option-save" class="button-primary" type="submit" name="option-save" value="Save options"/></p>
    </form>

    </div>

    <p >Message from developer, Kason:<br/></p>
    <p class="description">
    Version 1.6.0 update:<br/>
	<b>Important</b>: Recompiled the core function, open for feedback. In case you are experiencing any issues, you can roll back to stable version, 1.5.1</a><br/>
    New option: Skip img class(es), no lazy load for specified image class(es).<br/>
	New option: Skip page(s).<br/>
	New option: Enable on mobile device, default value is enable.
    </p>
    <p class="description">
    Version 1.5.1 update:<br/>
    Added new plugin website, three new demo pages in <a href="http://www.kasonz.com/" target="_blank">kasonz.com</a>.
    </p>
    <p class="description">
    Version 1.5 update:<br/>
    After a year and a half, I am back! Modified broken links, and change the setting page format, add donate button :)
    
    
    </p>
    

<div  style="float:right;border-left:1px solid #eee;">
<div style="clear:both;"></div>

</div>

<div id="wpfooter">

<div class="clear"></div>
</div>

    
 <?php
  }



if (!is_admin()  and (!wp_is_mobile() or get_option('cb_adlzylad_mobile')=="on"))
  {
  
  
    
    include("ganon/ganon.php");
    
    //wp_deregister_script('jquery'); 
    wp_enqueue_script('jquery');
    
    wp_enqueue_script('Advancedlazyload', plugins_url('Advanced_lazyload.js', __FILE__), "", "advacned");
    $ifd_pixel         = get_option('ifd_pixel');
    $duration_advanced = get_option('ifd_duration');
    
    //wp_localize_script('Advancedlazyload', 'ifd_pixel', $ifd_pixel,'duration_advanced',$duration_advanced);
    
    wp_localize_script('Advancedlazyload', 'obj_lz', array(
        
        'ifd_pixel' => get_option('ifd_pixel'),
        'ifd_duration' => get_option('ifd_duration')
        
    ));
    
    
    function strposa($haystack, $needle, $offset = 0)
      {
        if (!is_array($needle))
            $needle = array(
                $needle
            );
        foreach ($needle as $query)
          {
            if (strpos($haystack, $query, $offset) !== false)
                return true; // stop on first true result
          }
        return false;
      }
    
    
    function Advaced_lazyload($HTMLs)
      {
        
        
        
        $dddd            = false;
        $skipclass_value = trim(get_option('ifd_adlaylad_skipclass'));
        if ($skipclass_value == null or $skipclass_value == "")
          {
            $dddd = true;
          }
        
        $plugin_dir_path = plugin_dir_url(__FILE__);
        
        $newhtml = str_get_dom($HTMLs);
        
		
		
		foreach($newhtml('iframe') as $element_iframe) {
			foreach($element_iframe('img') as $element_img) {
				$element_img->setTag('IMG_IN_IFRAME_PRE');
			}
		}

		
        if ($dddd)
          {
            foreach ($newhtml('img') as $element)
              {
                //if skip class name is not found
                $element->addAttribute('ImageHolder', $element->src);
                $element->src = $plugin_dir_path . 'shade.gif';
              }
          }
        else
          {
            
            
            foreach ($newhtml('img') as $element)
              {
                //if skip class name is not found
                
                
                if (!strposa($element->class, explode(",", $skipclass_value)))
                  {
                    $element->addAttribute('ImageHolder', $element->src);
                    $element->src = $plugin_dir_path . 'shade.gif';
                  }
                
                
              }
          }
		  
		  	foreach($newhtml('IMG_IN_IFRAME_PRE') as $element_img_after) {
				$element_img_after->setTag('img');
			}
		  
		  
		//$newhtml =   dom_format($newhtml, array('attributes_case' => CASE_LOWER));
        return $newhtml;
      }
    function DOMReady()
      {
	$skipURL_value = get_option('ta_adlaylad_skipurl');
	
	
	 $skipURL_value_trim = trim($skipURL_value);
	 
        if ($skipURL_value_trim == null or $skipURL_value_trim == "")
          {
            $skipURL_value = "8e51341a06084de10000009b38f83b";
          }
		  
		 

	$currURL = $_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
	
	                if (!strposa($currURL, explode("\n", $skipURL_value)))
                  {
                   ob_start("Advaced_lazyload");
                  }

		
      
    }
    add_action('wp_head', 'DOMReady');
    
  }
?>