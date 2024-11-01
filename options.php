<div class="wrap">
<h2>Trialfire</h2>

<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>
<?php settings_fields('trialfire'); ?>

<table class="form-table">

<tr valign="top">
<th scope="row">Trialfire Tracking Snippet:</th>
<td>
  <textarea name="tf_snippet" rows="6" cols="60" autocomplete="off"
            placeholder="Copy your tracking snippet from app.trialfire.com and paste it here."
            wrap="soft"
            style="resize: none;"
  ><?php echo get_option('tf_snippet'); ?></textarea>
</td>
</tr>

</tr>

</table>

<input type="hidden" name="action" value="update" />

<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>

</form>

<h2>
  Setting Up Trialfire on your Wordpress Site
</h2>

<ol>
  <li> Open Trialfire (<a href="http://app.trialfire.com" target="_blank">app.trialfire.com</a>).  </li>
  <li> Choose the site whose tracking code you want.  </li>
  <li> Copy the entire tracking code as shown in the image below.  </li>
  <li> Paste it into the field above and press Save.  </li>
</ol>

<img src="<?php echo plugins_url('trialfire-wordpresshelp.jpg', __FILE__) ?>"
     width="500px" height="auto"></img>

</div>
