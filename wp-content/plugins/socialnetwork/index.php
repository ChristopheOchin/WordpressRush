<?php 
/*
Plugin Name: Social Network
Description: Mon statut social
License: GPL ...
Author: cochin
Version: 1.0
 */

function fb_add_custom_user_profile_fields( $user ) { // On ajoute les données ici ?>
	<h3><?php _e('Informations supplémentaires', 'your_textdomain'); ?></h3> 
	<table class="form-table">
		<tr>
		<th>
		  <label for="Facebook"><?php _e('Facebook', 'your_textdomain'); ?></label>
		</th>
		<td>
		  <input type="url" name="facebook" id="facebook" value="<?php echo esc_attr(get_the_author_meta(									  'facebook', $user->ID ) ); ?>" class="regular-text" /><br /> 
		  <span class="description">
		  <?php _e('Lien Facebook', 'your_textdomain'); ?> 
		  </span>
		</td>
	    </tr>

		<tr>
		<th>
		  <label for="Twitter"><?php _e('Twitter', 'your_textdomain'); ?></label>
		</th>
		<td>
		  <input type="url" name="twitter" id="twitter" value="<?php echo esc_attr(get_the_author_meta(									  'twitter', $user->ID ) ); ?>" class="regular-text" /><br /> 
		  <span class="description">
		  <?php _e('Lien Twitter', 'your_textdomain'); ?> 
		  </span>
		</td>
	    </tr>
		
	    <tr>
		<th>
		  <label for="Dailymotion"><?php _e('Dailymotion', 'your_textdomain'); ?></label>
		</th>
		<td>
		  <input type="url" name="dailymotion" id="dailymotion" value="<?php echo esc_attr(get_the_author_meta(									  'dailymotion', $user->ID ) ); ?>" class="regular-text" /><br /> 
		    <span class="description">
		    <?php _e('Video Dailymotion', 'your_textdomain'); ?> 
		    </span><br />
		 <iframe width="450px" height="300px" src="http://dailymotion.com/embed/video/ <?php 	preg_match("/video\/([^_]+)/", get_the_author_meta('dailymotion', $user->ID), $matches);
		echo $matches[1];
		?>"
		></iframe>
		</td>
	    </tr>
	</table>
<?php }

function fb_save_custom_user_profile_fields( $user_id ) { // On sauvegarde les données ici
	if (!current_user_can( 'edit_user', $user_id ))
		return FALSE;
	update_usermeta( $user_id, 'facebook', $_POST['facebook'] );
	update_usermeta( $user_id, 'twitter', $_POST['twitter'] );
	update_usermeta( $user_id, 'dailymotion', $_POST['dailymotion'] );
}

// On dit que fb_add_custom... va « agir » avec show_user_profile et edit_user_profile /on exécut
add_action( 'show_user_profile', 'fb_add_custom_user_profile_fields' );
add_action( 'edit_user_profile', 'fb_add_custom_user_profile_fields' );

// On dit que fb_save_custom... va « agir » avec personl_option_update et edit_user_profile_update /on exécut
add_action( 'personal_options_update', 'fb_save_custom_user_profile_fields' );
add_action( 'edit_user_profile_update', 'fb_save_custom_user_profile_fields' );
?>