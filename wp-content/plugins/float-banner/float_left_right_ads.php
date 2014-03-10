<?php
/**
  Plugin Name: Float Left Right Advertising
  Plugin URI: http://wordpress.org/plugins/float-banner/
  Version: 2.0.5
  Description: Float Advertising on Left and Right, Ads scroll up/down when user scroll page up/down. Support multi setting: width of left banner, width of right banner, margin-top, margin-left, margin-right and HTML code for banner. After active this plugin please goto <strong>Settings</strong> --> <strong><a href="options-general.php?page=float_ads.php">Float Left Right Advertising</a></strong> and config your Advertising.
  Author: Le Trung Kien
  Author URI: http://taiphanmemdt.com
  License: Please don't remove copyright at the bottom.
 */
/* * ***************Frontend*************************************** */

$adtype = get_option("csnv_is_adtype");

function load_csnv_script() {
    global $adtype;
    include_once 'Mobile_Detect.php';
    $detect = new Mobile_Detect;
    if (!$detect->isMobile() && !$detect->isTablet()) {
        if (get_option('csnv_is_active') && (get_option('csnv_left_code') || get_option('csnv_right_code'))) {
            wp_enqueue_script('jquery');
            if ($adtype != 1) {

                wp_enqueue_script(
                        'floatads.js', plugins_url('/floatads.js', __FILE__), '', '', false
                );
            }
            add_action('wp_footer', 'append_code_to_body');
        }
    }
}

function append_code_to_body() {
    global $adtype;

    $screen_w = get_option("screen_w");
    $MainContentW = get_option("csnv_content_w") ? get_option("csnv_content_w") : 1000;
    $LeftBannerW = get_option("csnv_left_w") ? get_option("csnv_left_w") : 100;
    $RightBannerW = get_option("csnv_right_w") ? get_option("csnv_right_w") : 100;
    $LeftAdjust = get_option("csnv_margin_left") ? get_option("csnv_margin_left") : 10;
    $RightAdjust = get_option("csnv_margin_right") ? get_option("csnv_margin_right") : 10;
    $TopAdjust = get_option("csnv_margin_top") ? get_option("csnv_margin_top") : 80;

    if ($adtype == 1) {
        ?>
        <div id="pLeft" style="position: fixed; top: <?php echo $TopAdjust; ?>px;"><?php echo html_entity_decode(get_option('csnv_left_code')); ?></div>
        <div id="pRight" style="position: fixed; top: <?php echo $TopAdjust; ?>px;"><?php echo html_entity_decode(get_option('csnv_right_code')); ?></div>
        <script type="text/javascript">
            var clientWidth = document.body.clientWidth;
            if (clientWidth > <?php echo $screen_w; ?>) {
                var MainContentW = <?php echo $MainContentW; ?>;
                var LeftBannerW = <?php echo $LeftBannerW; ?>;
                var RightBannerW = <?php echo $RightBannerW; ?>;
                var LeftAdjust = <?php echo $LeftAdjust; ?>;
                var RightAdjust = <?php echo $RightAdjust; ?>;
                var TopAdjust = <?php echo $TopAdjust; ?>;
                var mleft = ((clientWidth - MainContentW) / 2) - (LeftBannerW + LeftAdjust);
                var mright = ((clientWidth - MainContentW) / 2) - (RightBannerW + RightAdjust);
                jQuery(document).ready(function($) {
                    $('#pLeft').css('left', mleft);
                    $('#pRight').css('right', mleft);
                });
            }
        </script>
        <?php
    } else {
        ?>
        <script type="text/javascript">
            var clientWidth = document.body.clientWidth;
            if (clientWidth > <?php echo $screen_w; ?>) {
                document.write('<div id="divQcRight" style="position: absolute; top: 0px; width:<?php echo $RightBannerW; ?>px; overflow:hidden;"> <?php echo html_entity_decode(get_option('csnv_right_code')); ?></div><div id="divQcLeft" style="position: absolute; top: 0px; width:<?php echo $LeftBannerW; ?>px; overflow:hidden;"><?php  echo html_entity_decode(get_option('csnv_left_code')); ?></div>');	
                MainContentW = <?php echo $MainContentW; ?>;
                LeftBannerW = <?php echo $LeftBannerW; ?>;
                RightBannerW = <?php echo $RightBannerW; ?>;
                LeftAdjust = <?php echo $LeftAdjust; ?>;
                RightAdjust = <?php echo $RightAdjust; ?>;
                TopAdjust = <?php echo $TopAdjust; ?>;
                ShowAdDiv();
                window.onresize = ShowAdDiv;
            }
        </script>
        <?php
    }
}

add_action('init', 'load_csnv_script');

/* * **********Admin Panel********** */

function csnv_ads_plugin_remove() {
    delete_option('csnv_is_active');
    delete_option('screen_w');

    delete_option('csnv_content_w');
    delete_option('csnv_left_w');
    delete_option('csnv_right_w');
    delete_option('csnv_margin_left');
    delete_option('csnv_margin_right');
    delete_option('csnv_margin_top');
    delete_option('csnv_left_code');
    delete_option('csnv_right_code');
}

function csnv_ads_plugin_install() {
    add_option('csnv_is_active', 1);
    add_option('screen_w', '1024');
    add_option('csnv_content_w', '1000');
    add_option('csnv_left_w', '130');
    add_option('csnv_right_w', '130');
    add_option('csnv_margin_left', '10');
    add_option('csnv_margin_right', '10');
    add_option('csnv_margin_top', '80');

    add_option('csnv_left_code', '<a href="http://topungdung.mobi" title="game mobile" target="_blank"><img src="http://up.soo.vn/images/2013/11/02/gameqc.jpg" alt="" /></a>');
    add_option('csnv_right_code', '<a href="http://taiphanmem.pro" title="tai game java" target="_blank"><img src="http://up.soo.vn/images/2013/11/02/gameqc.jpg" alt="" /></a>');
}

function csnv_ads_menu() {
    add_options_page(__('Float Advertising', ''), __('Float Advertising', ''), 8, basename(__FILE__), 'csnv_ads_setting');
}

function csnv_ads_setting() {
    if ($_POST['status_submit'] == 1) {
        update_option('csnv_is_active', intval($_POST['csnv_is_active']));
        update_option('csnv_is_hidefooter', intval($_POST['csnv_is_hidefooter']));
        update_option('csnv_is_adtype', intval($_POST['csnv_is_adtype']));
        update_option('csnv_left_code', htmlentities(stripslashes($_POST['csnv_left_code'])));
        update_option('csnv_right_code', htmlentities(stripslashes($_POST['csnv_right_code'])));

        update_option('csnv_content_w', intval($_POST['csnv_content_w']));
        update_option('csnv_left_w', intval($_POST['csnv_left_w']));
        update_option('csnv_right_w', intval($_POST['csnv_right_w']));

        update_option('csnv_margin_left', intval($_POST['csnv_margin_left']));
        update_option('csnv_margin_right', intval($_POST['csnv_margin_right']));
        update_option('csnv_margin_top', intval($_POST['csnv_margin_top']));

        update_option('screen_w', intval($_POST['screen_w']));
        echo '<div id="message" class="updated fade"><p>Your settings were saved !</p></div>';
    }
    if ($_POST['status_submit'] == 2) {
        update_option('csnv_is_active', 1);
        update_option('csnv_is_hidefooter', 1);
        update_option('csnv_is_adtype', 1);
        update_option('screen_w', '1024');
        update_option('csnv_content_w', '1000');
        update_option('csnv_left_w', '130');
        update_option('csnv_right_w', '130');
        update_option('csnv_margin_left', '10');
        update_option('csnv_margin_right', '10');
        update_option('csnv_margin_top', '80');

        update_option('csnv_left_code', '<a href="http://topungdung.mobi" title="game mobile" target="_blank"><img src="http://up.soo.vn/images/2013/11/02/gameqc.jpg" alt="" /></a>');
        update_option('csnv_right_code', '<a href="http://taiphanmem.pro" title="tai game java" target="_blank"><img src="http://up.soo.vn/images/2013/11/02/gameqc.jpg" alt="" /></a>');

        echo '<div id="message" class="updated fade"><p>Your settings were reset !</p></div>';
    }
    ?>
    <h2>Float Left Right Advertising Setting</h2>
    <form method="post" id="csnv_options">	
        <input type="hidden" name="status_submit" id="status_submit" value="2"  />
        <table width="100%" cellspacing="2" cellpadding="5" class="editform">
            <tr valign="top"> 
                <td width="150" scope="row">Active plugin:</td>
                <td>
                    <label><input type="radio" name="csnv_is_active" <?php if (get_option('csnv_is_active') == '1'): ?> checked="checked"<?php endif; ?> value="1" /> Yes</label>
                    <label><input type="radio" name="csnv_is_active" <?php if (get_option('csnv_is_active') == '0'): ?> checked="checked"<?php endif; ?> value="0" /> No</label>
                </td> 
            </tr>
            <tr valign="top"> 
                <td width="150" scope="row">Ad Type:</td>
                <td>
                    <label><input type="radio" name="csnv_is_adtype" <?php if (get_option('csnv_is_adtype') == '1'): ?> checked="checked"<?php endif; ?> value="1" /> Static</label>
                    <label><input type="radio" name="csnv_is_adtype" <?php if (get_option('csnv_is_adtype') == '0'): ?> checked="checked"<?php endif; ?> value="0" /> Slide</label><br />
                    <em>Static work best for Google Adsese ( important )</em>
                </td> 
            </tr>
            <tr valign="top"> 
                <td scope="row">Show ads if client screen width &gt;</td>
                <td>
                    <select name="screen_w">
                        <option value="800" <?php if (get_option("screen_w") == 800) echo "selected"; ?>>800</option> 
                        <option value="1024" <?php if (get_option("screen_w") == 1024) echo "selected"; ?>>1024</option>
                        <option value="1280" <?php if (get_option("screen_w") == 1280) echo "selected"; ?>>1280</option>
                    </select> px
                </td> 
            </tr>
            <tr valign="top"> 
                <td  scope="row">Main content width:<br /><small>Width of your website</small></td> 
                <td scope="row">			
                    <input name="csnv_content_w" size="4" maxlength="4" value="<?php echo html_entity_decode(get_option('csnv_content_w')); ?>" /> px (number only)
                </td> 
            </tr>
            <tr valign="top"> 
                <td  scope="row">Banner left width:<br /><small>Width of your left banner</small></td> 
                <td scope="row">			
                    <input name="csnv_left_w" size="3" maxlength="3" value="<?php echo html_entity_decode(get_option('csnv_left_w')); ?>" /> px (number only)
                </td> 
            </tr>

            <tr valign="top"> 
                <td  scope="row">Banner right width:<br /><small>Width of your right banner</small></td> 
                <td scope="row">			
                    <input name="csnv_right_w" size="3" maxlength="3" value="<?php echo html_entity_decode(get_option('csnv_right_w')); ?>" /> px (number only)
                </td> 
            </tr>

            <tr valign="top"> 
                <td  scope="row">Margin Left:</td> 
                <td scope="row">			
                    <input name="csnv_margin_left" size="3" maxlength="3" value="<?php echo html_entity_decode(get_option('csnv_margin_left')); ?>" /> px (number only)
                </td> 
            </tr>
            <tr valign="top"> 
                <td  scope="row">Margin Right:</td> 
                <td scope="row">			
                    <input name="csnv_margin_right" size="3" maxlength="3" value="<?php echo html_entity_decode(get_option('csnv_margin_right')); ?>" /> px (number only)
                </td> 
            </tr>
            <tr valign="top"> 
                <td  scope="row">Margin Top:</td> 
                <td scope="row">			
                    <input name="csnv_margin_top" size="3" maxlength="3" value="<?php echo html_entity_decode(get_option('csnv_margin_top')); ?>" /> px (number only)
                </td> 
            </tr>

            <tr valign="top"> 
                <td  scope="row">HTML left Code:<br/><small>Put HTML code for your left ads</small></td> 
                <td scope="row">			
                    <textarea name="csnv_left_code" rows="5" cols="50"><?php echo html_entity_decode(get_option('csnv_left_code')); ?></textarea>	
                </td> 
            </tr>
            <tr valign="top"> 
                <td  scope="row">HTML right Code:<br/><small>Put HTML code for your right ads</small></td> 
                <td scope="row">			
                    <textarea name="csnv_right_code" rows="5" cols="50"><?php echo html_entity_decode(get_option('csnv_right_code')); ?></textarea>	
                </td> 
            </tr>
            <tr valign="top"> 
                <td width="150" scope="row">Hide Footer:</td>
                <td>
                    <label><input type="radio" name="csnv_is_hidefooter" <?php if (get_option('csnv_is_hidefooter') == '1'): ?> checked="checked"<?php endif; ?> value="1" />Yes</label>
                    <label><input type="radio" name="csnv_is_hidefooter" <?php if (get_option('csnv_is_hidefooter') == '0'): ?> checked="checked"<?php endif; ?> value="0" />No</label>
                </td> 
            </tr>
            <tr valign="top"> 
                <td  scope="row"></td> 
                <td scope="row">			
                    <input type="button" name="save" onclick="document.getElementById('status_submit').value = '1';
            document.getElementById('csnv_options').submit();" value="Save setting" class="button-primary" />
                </td> 
            </tr>
            <tr><td colspan="2"><br /><br /></td></tr>
            <tr valign="top"> 
                <td  scope="row"></td> 
                <td scope="row">			
                    <input type="button" name="reset" onclick="document.getElementById('status_submit').value = '2';
            document.getElementById('csnv_options').submit();" value="Reset to default setting" class="button" />
                </td> 
            </tr>
            <tr><td colspan="2"><br /><br /></td></tr>
            <tr>
                <td colspan="2">Copyright &copy; by Le Trung Kien</td>
            </tr>
        </table>

    </form>	
    <?php
}

//add setting menu
add_action('admin_menu', 'csnv_ads_menu');

function floatads_footer() {
    $hidefooter = get_option("csnv_is_hidefooter");
    if (!$hidefooter) {
        echo '<style>#footerfriend a,#footerfriend{font-size: 8px; color: #ccc}</style><div id="footerfriend">Friend: <a href="http://buzgame.blogspot.com/" target="_blank">Tai game hay</a>  - <a href="http://taigamehot.mobi/" target="_blank">crack, hack</a></div>';
    }
}

add_action('wp_footer', 'floatads_footer', 100);

/* What to do when the plugin is activated? */
register_activation_hook(__FILE__, 'csnv_ads_plugin_install');
/* What to do when the plugin is deactivated? */
register_deactivation_hook(__FILE__, 'csnv_ads_plugin_remove');
?>