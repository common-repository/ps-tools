<?php
/* Finding the path to the wp-admin folder */
$iswin = preg_match('/:\\\/', dirname(__file__));
$slash = ($iswin) ? "\\" : "/";

$wp_path = preg_split('/(?=((\\\|\/)wp-content)).*/', dirname(__file__));
$wp_path = (isset($wp_path[0]) && $wp_path[0] != "") ? $wp_path[0] : $_SERVER["DOCUMENT_ROOT"];

/** Load WordPress Administration Bootstrap */
require_once($wp_path . $slash . 'wp-load.php');
require_once($wp_path . $slash . 'wp-admin' . $slash . 'admin.php');


// check for rights
if ( !is_user_logged_in() || !current_user_can('edit_posts') )
	wp_die(__( "You are not allowed to be here", 'post-snippets' ));

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="pt-BR">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Photoshop Tools</title>
<link rel='stylesheet' id='ps-tools'  href='<?php echo site_url(); ?>/wp-content/plugins/ps-tools/tinymce/styles.css' type='text/css' media='all' />
<link rel='stylesheet' id='ps-tools'  href='<?php echo site_url(); ?>/wp-content/plugins/ps-tools/tinymce/windows-styles.css' type='text/css' media='all' />

<script type="text/javascript" src="<?php echo site_url(); ?>/wp-content/plugins/ps-tools/tinymce/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo site_url(); ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery('.insert_select, .insert_buttom').attr("disabled", true);
		jQuery('.insert_select, .insert_buttom').addClass("disabled");

		jQuery('#select_shortcode').change(function() {
			if( jQuery(this).val() == '' ) {
				jQuery('.insert_select').attr("disabled", true);
				jQuery('.insert_select').addClass("disabled");
			} else {
				jQuery('.insert_select').removeAttr("disabled");
				jQuery('.insert_select').removeClass("disabled");
			}
		});
		jQuery('#select_shortcode_options').change(function() {
			if( jQuery(this).val() == '' ) {
				jQuery('.insert_buttom').attr("disabled", true);
				jQuery('.insert_buttom').addClass("disabled");
			} else {
				jQuery('.insert_buttom').removeAttr("disabled");
				jQuery('.insert_buttom').removeClass("disabled");
			}
		});
	});


	function codesOptionShortcodeValue() {


		var codes;

		switch(jQuery('#select_shortcode').val())
		{
		case "ps-3d-rotate":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/3d-rotate.gif\" alt=\"\" title=\"<?php _e('3D Rotate Tool (K)','ps-tools');?>\"><?php _e('3D Rotate Tool (K)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-3d-roll":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/3d-roll.gif\" alt=\"\" title=\"<?php _e('3D Roll Tool (K)','ps-tools');?>\"><?php _e('3D Roll Tool (K)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-3d-pan":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/3d-pan.gif\" alt=\"\" title=\"<?php _e('3D Pan Tool (K)','ps-tools');?>\"><?php _e('3D Pan Tool (K)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-3d-slide":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/3d-slide.gif\" alt=\"\" title=\"<?php _e('3D Slide Tool (K)','ps-tools');?>\"><?php _e('3D Slide Tool (K)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-3d-scale":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/3d-scale.gif\" alt=\"\" title=\"<?php _e('3D Scale Tool (K)','ps-tools');?>\"><?php _e('3D Scale Tool (K)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-3d-orbit":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/3d-orbit.gif\" alt=\"\" title=\"<?php _e('3D Orbit Tool (N)','ps-tools');?>\"><?php _e('3D Orbit Tool (N)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-3d-roll-view":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/3d-roll-view.gif\" alt=\"\" title=\"<?php _e('3D Roll View Tool (N)','ps-tools');?>\"><?php _e('3D Roll View Tool (N)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-3d-pan-view":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/3d-pan-view.gif\" alt=\"\" title=\"<?php _e('3D Pan View Tool (N)','ps-tools');?>\"><?php _e('3D Pan View Tool (N)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-3d-walk-view":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/3d-walk-view.gif\" alt=\"\" title=\"<?php _e('3D Walk View Tool (N)','ps-tools');?>\"><?php _e('3D Walk View Tool (N)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-3d-zoom-view":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/3d-zoom-view.gif\" alt=\"\" title=\"<?php _e('3D Zoom Tool (N)','ps-tools');?>\"><?php _e('3D Zoom Tool (N)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-add_anchor":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/add_anchor.gif\" alt=\"\" title=\"<?php _e('Add Anchor Point','ps-tools');?>\"><?php _e('Add Anchor Point','ps-tools');?></span>&nbsp;";
			break;
		case "ps-art_history":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/art_history.gif\" alt=\"\" title=\"<?php _e('Art History Brush (Y)','ps-tools');?>\"><?php _e('Art History Brush (Y)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-audio":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/audio.gif\" alt=\"\" title=\"<?php _e('Audio Annotation (N)','ps-tools');?>\"><?php _e('Audio Annotation (N)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-back_eraser":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/back_eraser.gif\" alt=\"\" title=\"<?php _e('Background Eraser (E)','ps-tools');?>\"><?php _e('Background Eraser (E)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-blur":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/blur.gif\" alt=\"\" title=\"<?php _e('Blur (R)','ps-tools');?>\"><?php _e('Blur (R)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-brush":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/brush.gif\" alt=\"\" title=\"<?php _e('Brush Tool (B)','ps-tools');?>\"><?php _e('Brush Tool (B)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-burn":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/burn.gif\" alt=\"\" title=\"<?php _e('Burn Tool (O)','ps-tools');?>\"><?php _e('Burn Tool (O)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-clone":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/clone.gif\" alt=\"\" title=\"<?php _e('Clone Stamp (S)','ps-tools');?>\"><?php _e('Clone Stamp (S)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-color":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/color.gif\" alt=\"\" title=\"<?php _e('Color Sampler (I)','ps-tools');?>\"><?php _e('Color Sampler (I)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-color_replace":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/color_replace.gif\" alt=\"\" title=\"<?php _e('Color Replacement (B)','ps-tools');?>\"><?php _e('Color Replacement (B)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-convert_point":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/convert_point.gif\" alt=\"\" title=\"<?php _e('Convert Anchor Point','ps-tools');?>\"><?php _e('Convert Anchor Point','ps-tools');?></span>&nbsp;";
			break;
		case "ps-count":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/count.gif\" alt=\"\" title=\"<?php _e('Count (I)','ps-tools');?>\"><?php _e('Count (I)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-crop":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/crop.gif\" alt=\"\" title=\"<?php _e('Crop (C)','ps-tools');?>\"><?php _e('Crop (C)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-custom":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/custom.gif\" alt=\"\" title=\"<?php _e('Custom Shape (U)','ps-tools');?>\"><?php _e('Custom Shape (U)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-delete_anchor":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/delete_anchor.gif\" alt=\"\" title=\"<?php _e('Delete Anchor Point','ps-tools');?>\"><?php _e('Delete Anchor Point','ps-tools');?></span>&nbsp;";
			break;
		case "ps-direct_select":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/direct_select.gif\" alt=\"\" title=\"<?php _e('Direct Selection (A)','ps-tools');?>\"><?php _e('Direct Selection (A)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-dodge":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/dodge.gif\" alt=\"\" title=\"<?php _e('Dodge(O)','ps-tools');?>\"><?php _e('Dodge(O)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-ellipse":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/ellipse.gif\" alt=\"\" title=\"<?php _e('Ellipse (U)','ps-tools');?>\"><?php _e('Ellipse (U)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-ellipt_marquee":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/ellipt_marquee.gif\" alt=\"\" title=\"<?php _e('Elliptical Marquee (M)','ps-tools');?>\"><?php _e('Elliptical Marquee (M)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-eraser":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/eraser.gif\" alt=\"\" title=\"<?php _e('Eraser (E)','ps-tools');?>\"><?php _e('Eraser (E)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-eye_dropper":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/eye_dropper.gif\" alt=\"\" title=\"<?php _e('Eyedropper (I)','ps-tools');?>\"><?php _e('Eyedropper (I)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-freeform":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/freeform.gif\" alt=\"\" title=\"<?php _e('Freeform Pen (P)','ps-tools');?>\"><?php _e('Freeform Pen (P)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-gradient":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/gradient.gif\" alt=\"\" title=\"<?php _e('Gradient (G)','ps-tools');?>\"><?php _e('Gradient (G)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-hand":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/hand.gif\" alt=\"\" title=\"<?php _e('Hand (H)','ps-tools');?>\"><?php _e('Hand (H)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-healing":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/healing.gif\" alt=\"\" title=\"<?php _e('Healing Brush (J)','ps-tools');?>\"><?php _e('Healing Brush (J)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-history_brush":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/history_brush.gif\" alt=\"\" title=\"<?php _e('History Brush (Y)','ps-tools');?>\"><?php _e('History Brush (Y)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-horiz_text":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/horiz_text.gif\" alt=\"\" title=\"<?php _e('Horizontal Type (T)','ps-tools');?>\"><?php _e('Horizontal Type (T)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-horiz_type_mask":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/horiz_type_mask.gif\" alt=\"\" title=\"<?php _e('Horizontal Type Mask (T)','ps-tools');?>\"><?php _e('Horizontal Type Mask (T)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-lasso":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/lasso.gif\" alt=\"\" title=\"<?php _e('Lasso (L)','ps-tools');?>\"><?php _e('Lasso (L)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-line":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/line.gif\" alt=\"\" title=\"<?php _e('Line (U)','ps-tools');?>\"><?php _e('Line (U)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-mag_lasso":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/mag_lasso.gif\" alt=\"\" title=\"<?php _e('Magnetic Lasso (L)','ps-tools');?>\"><?php _e('Magnetic Lasso (L)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-magic":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/magic.gif\" alt=\"\" title=\"<?php _e('Magic Wand (W)','ps-tools');?>\"><?php _e('Magic Wand (W)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-magic_eraser":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/magic_eraser.gif\" alt=\"\" title=\"<?php _e('Magic Eraser (E)','ps-tools');?>\"><?php _e('Magic Eraser (E)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-move":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/move.gif\" alt=\"\" title=\"<?php _e('Move Tool (V)','ps-tools');?>\"><?php _e('Move Tool (V)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-notes":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/notes.gif\" alt=\"\" title=\"<?php _e('Notes (N)','ps-tools');?>\"><?php _e('Notes (N)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-paint_bucket":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/paint_bucket.gif\" alt=\"\" title=\"<?php _e('Paint Bucket (G)','ps-tools');?>\"><?php _e('Paint Bucket (G)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-patch":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/patch.gif\" alt=\"\" title=\"<?php _e('Patch (J)','ps-tools');?>\"><?php _e('Patch (J)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-path_select":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/path_select.gif\" alt=\"\" title=\"<?php _e('Path Selection (A)','ps-tools');?>\"><?php _e('Path Selection (A)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-pattern_stamp":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/pattern_stamp.gif\" alt=\"\" title=\"<?php _e('Pattern Stamp (S)','ps-tools');?>\"><?php _e('Pattern Stamp (S)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-pen":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/pen.gif\" alt=\"\" title=\"<?php _e('Pen (P)','ps-tools');?>\"><?php _e('Pen (P)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-pencil":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/pencil.gif\" alt=\"\" title=\"<?php _e('Pencil (B)','ps-tools');?>\"><?php _e('Pencil (B)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-polly_lasso":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/polly_lasso.gif\" alt=\"\" title=\"<?php _e('Polygonal Lasso(L)','ps-tools');?>\"><?php _e('Polygonal Lasso(L)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-polygon":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/polygon.gif\" alt=\"\" title=\"<?php _e('Polygon (U)','ps-tools');?>\"><?php _e('Polygon (U)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-quick":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/quick.gif\" alt=\"\" title=\"<?php _e('Quick Selection (W)','ps-tools');?>\"><?php _e('Quick Selection (W)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-rect_marquee":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/rect_marquee.gif\" alt=\"\" title=\"<?php _e('Rectangular Marquee Tool','ps-tools');?>\"><?php _e('Rectangular Marquee Tool','ps-tools');?></span>&nbsp;";
			break;
		case "ps-rectangle":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/rectangle.gif\" alt=\"\" title=\"<?php _e('Rectangle (U)','ps-tools');?>\"><?php _e('Rectangle (U)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-red_eye":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/red_eye.gif\" alt=\"\" title=\"<?php _e('Red Eye (J)','ps-tools');?>\"><?php _e('Red Eye (J)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-rounded_rect":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/rounded_rect.gif\" alt=\"\" title=\"<?php _e('Rounded Rectangle (U)','ps-tools');?>\"><?php _e('Rounded Rectangle (U)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-rotate-view":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/rotate-view.gif\" alt=\"\" title=\"<?php _e('Rotate View Tool (R)','ps-tools');?>\"><?php _e('Rotate View Tool (R)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-ruler":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/ruler.gif\" alt=\"\" title=\"<?php _e('Ruler Tool (I)','ps-tools');?>\"><?php _e('Ruler Tool (I)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-sharpen":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/sharpen.gif\" alt=\"\" title=\"<?php _e('Sharpen (R)','ps-tools');?>\"><?php _e('Sharpen (R)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-single_c_marquee":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/single_c_marquee.gif\" alt=\"\" title=\"<?php _e('Single Column Marquee','ps-tools');?>\"><?php _e('Single Column Marquee','ps-tools');?></span>&nbsp;";
			break;
		case "ps-single_r_marquee":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/single_r_marquee.gif\" alt=\"\" title=\"<?php _e('Single Row Marquee','ps-tools');?>\"><?php _e('Single Row Marquee','ps-tools');?></span>&nbsp;";
			break;
		case "ps-slice":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/slice.gif\" alt=\"\" title=\"<?php _e('Slice (K)','ps-tools');?>\"><?php _e('Slice (K)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-slice_select":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/slice_select.gif\" alt=\"\" title=\"<?php _e('Slice Select','ps-tools');?>\"><?php _e('Slice Select','ps-tools');?></span>&nbsp;";
			break;
		case "ps-smudge":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/smudge.gif\" alt=\"\" title=\"<?php _e('Smudge (R)','ps-tools');?>\"><?php _e('Smudge (R)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-sponge":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/sponge.gif\" alt=\"\" title=\"<?php _e('Sponge (O)','ps-tools');?>\"><?php _e('Sponge (O)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-spot":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/spot.gif\" alt=\"\" title=\"<?php _e('Spot Healing Brush (J)','ps-tools');?>\"><?php _e('Spot Healing Brush (J)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-vert_type":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/vert_type.gif\" alt=\"\" title=\"<?php _e('Vertical Type (T)','ps-tools');?>\"><?php _e('Vertical Type (T)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-vert_type_mask":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/vert_type_mask.gif\" alt=\"\" title=\"<?php _e('Vertical Type Mask (T)','ps-tools');?>\"><?php _e('Vertical Type Mask (T)','ps-tools');?></span>&nbsp;";
			break;
		case "ps-zoom":
			codes = "<span class=\"ps-tools\"><img src=\"<?php echo WP_PLUGIN_URL ;?>/ps-tools/tinymce/img/zoom.gif\" alt=\"\" title=\"<?php _e('Zoom (Z)','ps-tools');?>\"><?php _e('Zoom (Z)','ps-tools');?></span>&nbsp;";
			break;


		default:
			codes = '';
		}
		window.tinyMCE.execInstanceCommand(window.tinyMCE.activeEditor.editorId, 'mceInsertContent', false, codes);
		window.tinyMCE.activeEditor.execCommand('mceRepaint');
		tinyMCEPopup.close();
	}
</script>
</head>
<body class="my-shortcode">
<fieldset>

  <p><?php _e('Choose a tool refer then click <em>Insert</em>:','ps-tools');?></p>

	<div id="my-shortcode-box">
        <select size="10" id="select_shortcode">
<option class="ps-3d-rotate" value="ps-3d-rotate"><?php _e('3D Rotate Tool (K)','ps-tools');?></option>
<option class="ps-3d-roll" value="ps-3d-roll"><?php _e('3D Roll Tool (K)','ps-tools');?></option>
<option class="ps-3d-pan" value="ps-3d-pan"><?php _e('3D Pan Tool (K)','ps-tools');?></option>
<option class="ps-3d-slide" value="ps-3d-slide"><?php _e('3D Slide Tool (K)','ps-tools');?></option>
<option class="ps-3d-scale" value="ps-3d-scale"><?php _e('3D Scale Tool (K)','ps-tools');?></option>
<option class="ps-3d-orbit" value="ps-3d-orbit"><?php _e('3D Orbit Tool (N)','ps-tools');?></option>
<option class="ps-3d-roll-view" value="ps-3d-roll-view"><?php _e('3D Roll View Tool (N)','ps-tools');?></option>
<option class="ps-3d-pan-view" value="ps-3d-pan-view"><?php _e('3D Pan View Tool (N)','ps-tools');?></option>
<option class="ps-3d-walk-view" value="ps-3d-walk-view"><?php _e('3D Walk View Tool (N)','ps-tools');?></option>
<option class="ps-3d-zoom-view" value="ps-3d-zoom-view"><?php _e('3D Zoom Tool (N)','ps-tools');?></option>
<option class="ps-add_anchor" value="ps-add_anchor"><?php _e('Add Anchor Point','ps-tools');?></option>
<option class="ps-art_history" value="ps-art_history"><?php _e('Art History Brush (Y)','ps-tools');?></option>
<option class="ps-audio" value="ps-audio"><?php _e('Audio Annotation (N)','ps-tools');?></option>
<option class="ps-back_eraser" value="ps-back_eraser"><?php _e('Background Eraser (E)','ps-tools');?></option>
<option class="ps-blur" value="ps-blur"><?php _e('Blur (R)','ps-tools');?></option>
<option class="ps-brush" value="ps-brush"><?php _e('Brush Tool (B)','ps-tools');?></option>
<option class="ps-burn" value="ps-burn"><?php _e('Burn Tool (O)','ps-tools');?></option>
<option class="ps-clone" value="ps-clone"><?php _e('Clone Stamp (S)','ps-tools');?></option>
<option class="ps-color" value="ps-color"><?php _e('Color Sampler (I)','ps-tools');?></option>
<option class="ps-color_replace" value="ps-color_replace"><?php _e('Color Replacement (B)','ps-tools');?></option>
<option class="ps-convert_point" value="ps-convert_point"><?php _e('Convert Anchor Point','ps-tools');?></option>
<option class="ps-count" value="ps-count"><?php _e('Count (I)','ps-tools');?></option>
<option class="ps-crop" value="ps-crop"><?php _e('Crop (C)','ps-tools');?></option>
<option class="ps-custom" value="ps-custom"><?php _e('Custom Shape (U)','ps-tools');?></option>
<option class="ps-delete_anchor" value="ps-delete_anchor"><?php _e('Delete Anchor Point','ps-tools');?></option>
<option class="ps-direct_select" value="ps-direct_select"><?php _e('Direct Selection (A)','ps-tools');?></option>
<option class="ps-dodge" value="ps-dodge"><?php _e('Dodge(O)','ps-tools');?></option>
<option class="ps-ellipse" value="ps-ellipse"><?php _e('Ellipse (U)','ps-tools');?></option>
<option class="ps-ellipt_marquee" value="ps-ellipt_marquee"><?php _e('Elliptical Marquee (M)','ps-tools');?></option>
<option class="ps-eraser" value="ps-eraser"><?php _e('Eraser (E)','ps-tools');?></option>
<option class="ps-eye_dropper" value="ps-eye_dropper"><?php _e('Eyedropper (I)','ps-tools');?></option>
<option class="ps-freeform" value="ps-freeform"><?php _e('Freeform Pen (P)','ps-tools');?></option>
<option class="ps-gradient" value="ps-gradient"><?php _e('Gradient (G)','ps-tools');?></option>
<option class="ps-hand" value="ps-hand"><?php _e('Hand (H)','ps-tools');?></option>
<option class="ps-healing" value="ps-healing"><?php _e('Healing Brush (J)','ps-tools');?></option>
<option class="ps-history_brush" value="ps-history_brush"><?php _e('History Brush (Y)','ps-tools');?></option>
<option class="ps-horiz_text" value="ps-horiz_text"><?php _e('Horizontal Type (T)','ps-tools');?></option>
<option class="ps-horiz_type_mask" value="ps-horiz_type_mask"><?php _e('Horizontal Type Mask (T)','ps-tools');?></option>
<option class="ps-lasso" value="ps-lasso"><?php _e('Lasso (L)','ps-tools');?></option>
<option class="ps-line" value="ps-line"><?php _e('Line (U)','ps-tools');?></option>
<option class="ps-mag_lasso" value="ps-mag_lasso"><?php _e('Magnetic Lasso (L)','ps-tools');?></option>
<option class="ps-magic" value="ps-magic"><?php _e('Magic Wand (W)','ps-tools');?></option>
<option class="ps-magic_eraser" value="ps-magic_eraser"><?php _e('Magic Eraser (E)','ps-tools');?></option>
<option class="ps-move" value="ps-move"><?php _e('Move Tool (V)','ps-tools');?></option>
<option class="ps-notes" value="ps-notes"><?php _e('Notes (N)','ps-tools');?></option>
<option class="ps-paint_bucket" value="ps-paint_bucket"><?php _e('Paint Bucket (G)','ps-tools');?></option>
<option class="ps-patch" value="ps-patch"><?php _e('Patch (J)','ps-tools');?></option>
<option class="ps-path_select" value="ps-path_select"><?php _e('Path Selection (A)','ps-tools');?></option>
<option class="ps-pattern_stamp" value="ps-pattern_stamp"><?php _e('Pattern Stamp (S)','ps-tools');?></option>
<option class="ps-pen" value="ps-pen"><?php _e('Pen (P)','ps-tools');?></option>
<option class="ps-pencil" value="ps-pencil"><?php _e('Pencil (B)','ps-tools');?></option>
<option class="ps-polly_lasso" value="ps-polly_lasso"><?php _e('Polygonal Lasso(L)','ps-tools');?></option>
<option class="ps-polygon" value="ps-polygon"><?php _e('Polygon (U)','ps-tools');?></option>
<option class="ps-quick" value="ps-quick"><?php _e('Quick Selection (W)','ps-tools');?></option>
<option class="ps-rect_marquee" value="ps-rect_marquee"><?php _e('Rectangular Marquee Tool','ps-tools');?></option>
<option class="ps-rectangle" value="ps-rectangle"><?php _e('Rectangle (U)','ps-tools');?></option>
<option class="ps-red_eye" value="ps-red_eye"><?php _e('Red Eye (J)','ps-tools');?></option>
<option class="ps-rounded_rect" value="ps-rounded_rect"><?php _e('Rounded Rectangle (U)','ps-tools');?></option>
<option class="ps-rotate-view" value="ps-rotate-view"><?php _e('Rotate View Tool (R)','ps-tools');?></option>
<option class="ps-ruler" value="ps-ruler"><?php _e('Ruler Tool (I)','ps-tools');?></option>
<option class="ps-sharpen" value="ps-sharpen"><?php _e('Sharpen (R)','ps-tools');?></option>
<option class="ps-single_c_marquee" value="ps-single_c_marquee"><?php _e('Single Column Marquee','ps-tools');?></option>
<option class="ps-single_r_marquee" value="ps-single_r_marquee"><?php _e('Single Row Marquee','ps-tools');?></option>
<option class="ps-slice" value="ps-slice"><?php _e('Slice (K)','ps-tools');?></option>
<option class="ps-slice_select" value="ps-slice_select"><?php _e('Slice Select','ps-tools');?></option>
<option class="ps-smudge" value="ps-smudge"><?php _e('Smudge (R)','ps-tools');?></option>
<option class="ps-sponge" value="ps-sponge"><?php _e('Sponge (O)','ps-tools');?></option>
<option class="ps-spot" value="ps-spot"><?php _e('Spot Healing Brush (J)','ps-tools');?></option>
<option class="ps-vert_type" value="ps-vert_type"><?php _e('Vertical Type (T)','ps-tools');?></option>
<option class="ps-vert_type_mask" value="ps-vert_type_mask"><?php _e('Vertical Type Mask (T)','ps-tools');?></option>
<option class="ps-zoom" value="ps-zoom"><?php _e('Zoom (Z)','ps-tools');?></option>



        </select>
	</div>
	<input type="submit" value="<?php _e('Insert','ps-tools');?>" onclick="codesOptionShortcodeValue()" id="insert" class="insert_select" /><input type="button" value="<?php _e('Close','ps-tools');?>" onclick="tinyMCEPopup.close()" id="cancel" />

    </fieldset>
</body>
</html>