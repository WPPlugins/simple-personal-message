                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           <?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the Admin option form.
 *
 * @link       http://softyardbd.com/
 * @since      2.0.0
 *
 * @package    Simple_Personal_Message
 * @subpackage Simple_Personal_Message/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<?php
$settings = new Simple_Personal_Message_Admin( '', '' );

$result = $settings->load_personalize_by_user();

if ( $result['spm_unread_row_border'] != 'border: none' ) {
	$unread_border = explode( ' ', $result['spm_unread_row_border'] );
	$unread_sides  = explode( '-', $unread_border[0] );
}

if ( $result['spm_read_row_border'] != 'border: none' ) {
	$read_border = explode( ' ', $result['spm_read_row_border'] );
	$read_sides  = explode( '-', $read_border[0] );
}

if ( $result['spm_unread_row_background'] != '' ) {
	$unread_bg = explode( ':', $result['spm_unread_row_background'] );
}

if ( $result['spm_read_row_background'] != '' ) {
	$read_bg = explode( ':', $result['spm_read_row_background'] );
}
?>

<div id="divLoading"></div>
<div class="container-fluid admin-wrap">
    <div id="post-message"></div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="pull-left">
                    <i class="fa fa-cog" aria-hidden="true"></i>
                    <strong class="text-uppercase"><?php echo esc_html( get_admin_page_title() ); ?></strong>
                    <span class="label label-info"></span>
                </div>
                <div class="pull-right">
                    <a href="javascript:void(0)" class="btn btn-success btn-sm" id="btn-save-personalize"><i class="fa fa-check-circle"></i> Save Settings</a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body viewport-height">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <fieldset>
                            <legend>General Settings</legend>
                            <div class="panel panel-default">
                                <div class="panel-body text-muted">
                                    <form class="" role="form">
                                        <div class="form-group">
                                            <label for="spm_message_per_page">Maximum message per page</label>
                                            <input type="number" class="form-control" id="spm_message_per_page"
                                                   placeholder="Maximum message per page"
                                                   value="<?= ( isset( $result['spm_message_per_page'] ) ? $result['spm_message_per_page'] : '' ) ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="spm_message_inbox_keep">Maximum days to keep old
                                                message (inbox)</label>
                                            <select class="form-control selectpicker" id="spm_message_inbox_keep">
                                                <option value="keep" <?php selected( $result['spm_message_inbox_keep'], "keep" ); ?>>
                                                    Lifetime
                                                </option>
                                                <option value="30" <?php selected( $result['spm_message_inbox_keep'], "30" ); ?>>
                                                    30 Days
                                                </option>
                                                <option value="60" <?php selected( $result['spm_message_inbox_keep'], "60" ); ?>>
                                                    60 Days
                                                </option>
                                                <option value="90" <?php selected( $result['spm_message_inbox_keep'], "90" ); ?>>
                                                    90 Days
                                                </option>
                                                <option value="120" <?php selected( $result['spm_message_inbox_keep'], "120" ); ?>>
                                                    120 Days
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="spm_message_outbox_keep">Maximum days to keep old
                                                message (outbox)</label>
                                            <select class="form-control selectpicker" id="spm_message_outbox_keep">
                                                <option value="keep" <?php selected( $result['spm_message_outbox_keep'], "keep" ); ?>>
                                                    Lifetime
                                                </option>
                                                <option value="30" <?php selected( $result['spm_message_outbox_keep'], "30" ); ?>>
                                                    30 Days
                                                </option>
                                                <option value="60" <?php selected( $result['spm_message_outbox_keep'], "60" ); ?>>
                                                    60 Days
                                                </option>
                                                <option value="90" <?php selected( $result['spm_message_outbox_keep'], "90" ); ?>>
                                                    90 Days
                                                </option>
                                                <option value="120" <?php selected( $result['spm_message_outbox_keep'], "120" ); ?>>
                                                    120 Days
                                                </option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <fieldset>
                            <legend>Typography</legend>
                            <div class="panel panel-default">
                                <div class="panel-body text-muted">
                                    <form class="" role="form">
                                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <label for="spm_read_row_font_style">Font Style (Read)</label>
                                            <select class="form-control selectpicker" id="spm_read_row_font_style">
                                                <option value="font-style:normal" <?php selected( $result['spm_read_row_font_style'], 'font-style:normal' ); ?>>
                                                    Normal
                                                </option>
                                                <option value="font-style:italic" <?php selected( $result['spm_read_row_font_style'], 'font-style:italic' ); ?>>
                                                    Italic
                                                </option>
                                                <option value="font-style:oblique" <?php selected( $result['spm_read_row_font_style'], 'font-style:oblique' ); ?>>
                                                    Oblique
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <label for="spm_unread_row_font_style">Font Style (Unread)</label>
                                            <select class="form-control selectpicker" id="spm_unread_row_font_style">
                                                <option value="font-style:normal" <?php selected( $result['spm_unread_row_font_style'], 'font-style:normal' ); ?>>
                                                    Normal
                                                </option>
                                                <option value="font-style:italic" <?php selected( $result['spm_unread_row_font_style'], 'font-style:italic' ); ?>>
                                                    Italic
                                                </option>
                                                <option value="font-style:oblique" <?php selected( $result['spm_unread_row_font_style'], 'font-style:oblique' ); ?>>
                                                    Oblique
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <label for="spm_read_row_font_weight">Font Weight (Read)</label>
                                            <select class="form-control selectpicker" id="spm_read_row_font_weight">
                                                <option value="font-weight:200" <?php selected( $result['spm_read_row_font_weight'], 'font-weight:200' ); ?>>
                                                    Normal
                                                </option>
                                                <option value="font-weight:bold" <?php selected( $result['spm_read_row_font_weight'], 'font-weight:bold' ); ?>>
                                                    Bold
                                                </option>
                                                <option value="font-weight:bolder" <?php selected( $result['spm_read_row_font_weight'], 'font-weight:bolder' ); ?>>
                                                    Bolder
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <label for="spm_unread_row_font_weight">Font Weight (Unread)</label>
                                            <select class="form-control selectpicker" id="spm_unread_row_font_weight">
                                                <option value="font-weight:200" <?php selected( $result['spm_unread_row_font_weight'], 'font-weight:200' ); ?>>
                                                    Normal
                                                </option>
                                                <option value="font-weight:bold" <?php selected( $result['spm_unread_row_font_weight'], 'font-weight:bold' ); ?>>
                                                    Bold
                                                </option>
                                                <option value="font-weight:bolder" <?php selected( $result['spm_unread_row_font_weight'], 'font-weight:bolder' ); ?>>
                                                    Bolder
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <label for="spm_read_row_text_decoration">Text Decoration (Read)</label>
                                            <select class="form-control selectpicker" id="spm_read_row_text_decoration">
                                                <option value="text-decoration:none" <?php selected( $result['spm_read_row_text_decoration'], 'text-decoration:none' ); ?>>
                                                    None
                                                </option>
                                                <option value="text-decoration:underline" <?php selected( $result['spm_read_row_text_decoration'], 'text-decoration:underline' ); ?>>
                                                    Underline
                                                </option>
                                                <option value="text-decoration:overline" <?php selected( $result['spm_read_row_text_decoration'], 'text-decoration:overline' ); ?>>
                                                    Overline
                                                </option>
                                                <option value="text-decoration:line-through" <?php selected( $result['spm_read_row_text_decoration'], 'text-decoration:line-through' ); ?>>
                                                    Line Through
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <label for="spm_unread_row_text_decoration">Text Decoration (Unread)</label>
                                            <select class="form-control selectpicker" id="spm_unread_row_text_decoration">
                                                <option value="text-decoration:none" <?php selected( $result['spm_unread_row_text_decoration'], 'text-decoration:none' ); ?>>
                                                    None
                                                </option>
                                                <option value="text-decoration:underline" <?php selected( $result['spm_unread_row_text_decoration'], 'text-decoration:underline' ); ?>>
                                                    Underline
                                                </option>
                                                <option value="text-decoration:overline" <?php selected( $result['spm_unread_row_text_decoration'], 'text-decoration:overline' ); ?>>
                                                    Overline
                                                </option>
                                                <option value="text-decoration:line-through" <?php selected( $result['spm_unread_row_text_decoration'], 'text-decoration:line-through' ); ?>>
                                                    Line Through
                                                </option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <fieldset>
                            <legend>Row and Border</legend>
                            <div class="panel panel-default">
                                <div class="panel-body text-muted">
                                    <form class="" role="form">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                                    <label for="spm_read_row_border_sides">Border</label>
                                                    <select class="form-control selectpicker" id="spm_read_row_border_sides">
                                                        <option value="none">None</option>
                                                        <option value="left" <?php ( isset( $read_sides[1] ) ) ? selected( trim( $read_sides[1], ':' ), 'left' ) : '' ?>>
                                                            Left
                                                        </option>
                                                        <option value="right" <?php ( isset( $read_sides[1] ) ) ? selected( trim( $read_sides[1], ':' ), 'right' ) : '' ?>>
                                                            Right
                                                        </option>
                                                        <option value="top" <?php ( isset( $read_sides[1] ) ) ? selected( trim( $read_sides[1], ':' ), 'top' ) : '' ?>>
                                                            Top
                                                        </option>
                                                        <option value="bottom" <?php ( isset( $read_sides[1] ) ) ? selected( trim( $read_sides[1], ':' ), 'bottom' ) : '' ?>>
                                                            Bottom
                                                        </option>
                                                        <option value="all" <?php ( isset( $read_sides[1] ) ) ? selected( trim( $read_sides[1], ':' ), 'all' ) : '' ?>>
                                                            Full
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                                    <label for="spm_read_row_border_width">Width</label>
                                                    <input type="number" class="form-control"
                                                           id="spm_read_row_border_width"
                                                           value="<?= ( isset( $read_border[1] ) ) ? (int) $read_border[1] : '' ?>"
                                                           placeholder="1px">
                                                </div>
                                                <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                                    <label for="spm_read_row_border_style">Style</label>
                                                    <select class="form-control selectpicker" id="spm_read_row_border_style">
                                                        <option value="inline" <?php ( isset( $read_border[2] ) ) ? selected( $read_border[2], 'inline' ) : '' ?>>
                                                            Inline
                                                        </option>
                                                        <option value="solid" <?php ( isset( $read_border[2] ) ) ? selected( $read_border[2], 'solid' ) : '' ?>>
                                                            Solid
                                                        </option>
                                                        <option value="dotted" <?php ( isset( $read_border[2] ) ) ? selected( $read_border[2], 'dotted' ) : '' ?>>
                                                            Dotted
                                                        </option>
                                                        <option value="dashed" <?php ( isset( $read_border[2] ) ) ? selected( $read_border[2], 'dashed' ) : '' ?>>
                                                            Dashed
                                                        </option>
                                                        <option value="double" <?php ( isset( $read_border[2] ) ) ? selected( $read_border[2], 'double' ) : '' ?>>
                                                            Double
                                                        </option>
                                                        <option value="groove" <?php ( isset( $read_border[2] ) ) ? selected( $read_border[2], 'groove' ) : '' ?>>
                                                            Groove
                                                        </option>
                                                        <option value="ridge" <?php ( isset( $read_border[2] ) ) ? selected( $read_border[2], 'ridge' ) : '' ?>>
                                                            Ridge
                                                        </option>
                                                        <option value="inset" <?php ( isset( $read_border[2] ) ) ? selected( $read_border[2], 'inset' ) : '' ?>>
                                                            Inset
                                                        </option>
                                                        <option value="outset" <?php ( isset( $read_border[2] ) ) ? selected( $read_border[2], 'outset' ) : '' ?>>
                                                            Outset
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                                    <label for="spm_read_row_border_color">Color
                                                        <small><em>( Left columns is for read Style )</em></small>
                                                    </label>
                                                    <input type="text" class="wp-pick-color"
                                                           id="spm_read_row_border_color"
                                                           value="<?= ( isset( $read_border[3] ) ) ? $read_border[3] : '' ?>"
                                                           placeholder="Color">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                                    <label for="spm_unread_row_border_sides">Border</label>
                                                    <select class="form-control selectpicker" id="spm_unread_row_border_sides">
                                                        <option value="none">None</option>
                                                        <option value="left" <?php ( isset( $unread_sides[1] ) ) ? selected( trim( $unread_sides[1], ':' ), 'left' ) : '' ?>>
                                                            Left
                                                        </option>
                                                        <option value="right" <?php ( isset( $unread_sides[1] ) ) ? selected( trim( $unread_sides[1], ':' ), 'right' ) : '' ?>>
                                                            Right
                                                        </option>
                                                        <option value="top" <?php ( isset( $unread_sides[1] ) ) ? selected( trim( $unread_sides[1], ':' ), 'top' ) : '' ?>>
                                                            Top
                                                        </option>
                                                        <option value="bottom" <?php ( isset( $unread_sides[1] ) ) ? selected( trim( $unread_sides[1], ':' ), 'bottom' ) : '' ?>>
                                                            Bottom
                                                        </option>
                                                        <option value="all" <?php ( isset( $unread_sides[1] ) ) ? selected( trim( $unread_sides[1], ':' ), 'all' ) : '' ?>>
                                                            Full
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                                    <label for="spm_unread_row_border_width">Width</label>
                                                    <input type="number" class="form-control"
                                                           id="spm_unread_row_border_width"
                                                           value="<?= ( isset( $unread_border[1] ) ) ? (int) $unread_border[1] : '' ?>"
                                                           placeholder="1px">
                                                </div>
                                                <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                                    <label for="spm_unread_row_border_style">Style</label>
                                                    <select class="form-control selectpicker" id="spm_unread_row_border_style">
                                                        <option value="inline" <?php ( isset( $unread_border[2] ) ) ? selected( $unread_border[2], 'inline' ) : '' ?>>
                                                            Inline
                                                        </option>
                                                        <option value="solid" <?php ( isset( $unread_border[2] ) ) ? selected( $unread_border[2], 'solid' ) : '' ?>>
                                                            Solid
                                                        </option>
                                                        <option value="dotted" <?php ( isset( $unread_border[2] ) ) ? selected( $unread_border[2], 'dotted' ) : '' ?>>
                                                            Dotted
                                                        </option>
                                                        <option value="dashed" <?php ( isset( $unread_border[2] ) ) ? selected( $unread_border[2], 'dashed' ) : '' ?>>
                                                            Dashed
                                                        </option>
                                                        <option value="double" <?php ( isset( $unread_border[2] ) ) ? selected( $unread_border[2], 'double' ) : '' ?>>
                                                            Double
                                                        </option>
                                                        <option value="groove" <?php ( isset( $unread_border[2] ) ) ? selected( $unread_border[2], 'groove' ) : '' ?>>
                                                            Groove
                                                        </option>
                                                        <option value="ridge" <?php ( isset( $unread_border[2] ) ) ? selected( $unread_border[2], 'ridge' ) : '' ?>>
                                                            Ridge
                                                        </option>
                                                        <option value="inset" <?php ( isset( $unread_border[2] ) ) ? selected( $unread_border[2], 'inset' ) : '' ?>>
                                                            Inset
                                                        </option>
                                                        <option value="outset" <?php ( isset( $unread_border[2] ) ) ? selected( $unread_border[2], 'outset' ) : '' ?>>
                                                            Outset
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <label for="spm_unread_row_border_color">Color
                                                        <small><em>( Right rows is for unread Style )</em></small>
                                                    </label>
                                                    <input type="text" class="wp-pick-color"
                                                           id="spm_unread_row_border_color"
                                                           value="<?= ( isset( $unread_border[3] ) ) ? $unread_border[3] : '' ?>"
                                                           placeholder="Color">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <label for="spm_read_row_background">Row Background
                                                        <small><em>( This left panel is consider for read style, set the
                                                                border color width style and side )</em></small>
                                                    </label>
                                                    <br>
                                                    <input type="text" class="wp-pick-color"
                                                           id="spm_read_row_background"
                                                           value="<?= ( isset( $read_bg[1] ) ? $read_bg[1] : '' ) ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <label for="spm_unread_row_background">Row Background
                                                        <small><em>( This left panel is consider for unread style, set
                                                                the border color width style and side )</em></small>
                                                    </label>
                                                    <br>
                                                    <input type="text" class="wp-pick-color"
                                                           id="spm_unread_row_background"
                                                           value="<?= ( isset( $unread_bg[1] ) ? $unread_bg[1] : '' ) ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-footer">
                <div class="text-muted text-center text-smaller">
                    &copy; Copyright <?= date('Y')?> | Powered by <a href="http://softyardbd.com" target="_blank">SoftyardLAB</a>
                </div>
            </div>
        </div>
    </div>
</div>