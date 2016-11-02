<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://www.openstream.ch
 * @since      1.0.0
 *
 * @package    Wpadminupdatenotice
 * @subpackage Wpadminupdatenotice/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div id="wpaun">
    
    <h1><?php _e('WP Admin Update Notice', 'wpadminupdatenotice') ?></h1>

    <div class="hangout_activated">
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'wpaun-admin' );
                do_settings_sections( 'wpaun-admin' );
                submit_button();
            ?>
            </form>


    </div>
</div>