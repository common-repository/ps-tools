
<div>
	<div>
		<div class="wrap">


      <h2><?php _e('About PS Tools','ps-tools');?></h2>

					<p><?php _e('<strong>PS Tools</strong> allows you insert a reference for any Adobe&reg; Photoshop&reg; tool in posts and pages.','ps-tools');?>
             <?php _e('By using PS Tools, you will not need to write up the same reference everytime, what is very boring and time consuming, you just need to select the tool and insert in your text.','ps-tools');?>
             <?php _e('You also can style the output, changing font and color, anytime.','ps-tools');?>
          </p>

         <p><small><strong>Adobe&reg; Photoshop&reg;</strong> <?php _e('are trademarks of Adobe Systems Incorporated','ps-tools');?></small></p>

          <h3><?php _e('Notes & Features','ps-tools');?></h3>
          <ul style="list-style:square;list-style-position:inside">
            <li><?php _e('If a translation file is available, you can use PS Tools referencing Photoshop&reg; in your language, but please note: if you decide to use your language after sometime using this plugin, <strong>the old references will not be translated</strong>.','ps-tools');?>
            <?php _e('Your current WordPress language is','ps-tools');?> <strong><?php echo get_locale();?></strong>.
            </li>
						<li><?php _e('In HTML mode, you will see the tool name and icon inside <code>span</code> tags. If you want use you own icons, send/change the files in:','ps-tools');?>
            <br /><code><?php echo WP_PLUGIN_URL .'/ps-tools/tinymce/img' ;?></code><br />
            <?php _e('If you want to change the output style, edit the stylesheet:','ps-tools');?>
            <br /><code><?php echo WP_PLUGIN_URL .'/ps-tools/tinymce/styles.css' ;?></code><br />
            </li>
						<li><?php _e('PS Tools do insert HTML tags and images in your text, not shortcodes! If you deactive the plugin, all images will display as long as you keep the plugin folder. If so, append the PS Tools CSS classes in your theme stylesheet for keep the output style working as well.','ps-tools');?></li>
            <li><?php _e('If you find that when you start to type after insert some reference, the text gets inside the tool <code>span</code> tag, please try clicking the editor area before type, or insert the reference between sentences. Also, you can check the HTML output if needed.','ps-tools');?></li>
            <li><?php _e('PS Tools currently refer to Adobe&reg; Photoshop&reg; CS4 Extended. If some tool is missing, please send me an <a href="mailto:dianakac@gmail.com?subject=PS Tools plugin - tools missing">e-mail</a>.','ps-tools');?></li>
          </ul>

          <h3><?php _e('How to use','ps-tools');?></h3>
          <ol>
						<li><?php _e('After install, edit a post or page in Visual mode.','ps-tools');?></li>
            <li><?php _e('Write your text as usual then click the PS Tool button where you want insert a tool reference.','ps-tools');?></li>
            <li><?php _e('Click the tool reference you want insert and click Insert.','ps-tools');?></li>
            <li><?php _e('The reference is inserted and depicts the tool button image and name.','ps-tools');?></li>
          </ol>

        <h3><?php _e('Support & Contact','ps-tools');?></h3>
        <p><?php _e('Send me an <a href="mailto:dianakac@gmail.com?subject=About PS Tools Plugin">e-mail</a> anytime. You can also reach me at my <a href="http://arquivo.tk" _target="_blank" >website</a>','ps-tools');?></p>
        <p><?php _e('Plugin Website:','ps-tools');?>  <a href="http://dianakcury.com/dev/ps-tools" _target="_blank" >http://arquivo.tk/dev/ps-tools</a></p>

        <h3><?php _e('Donations','ps-tools');?></h3>
        <p><?php _e('Have you using this plugin a lot? Consider make a donation. Also, you can send me translations files, improvements etc.','ps-tools');?></p>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_donations">
<input type="hidden" name="business" value="LQ79B3CWJ7CZG">
<input type="hidden" name="lc" value="US">
<input type="hidden" name="item_name" value="ADA Plugin">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="bn" value="PP-DonationsBF:btn_donate_LG.gif:NonHosted">
<input type="image" src="<?php echo WP_PLUGIN_URL .'/ps-tools/control/paypal.png' ;?>" border="0" name="submit" alt="<?php _e('PayPal - The safer, easier way to pay online!','ps-tools');?>">
<img alt="" border="0" src="https://www.paypalobjects.com/pt_BR/i/scr/pixel.gif" width="1" height="1">
</form>




			<br class="clear">
		</div>


	</div>
</div>

