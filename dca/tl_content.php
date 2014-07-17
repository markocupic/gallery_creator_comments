<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2013 Leo Feyer
 *
 * @package GalleryCreatorComment
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Add palette to tl_content
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['gallery_creator_album_comments']      = '{type_legend},type,headline;{comment_legend},com_order,com_perPage,com_moderate,com_bbcode,com_requireLogin,com_disableCaptcha;{template_legend:hide},com_template;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['gallery_creator_picture_comments']    = '{type_legend},type,headline;{comment_legend},com_order,com_perPage,com_moderate,com_bbcode,com_requireLogin,com_disableCaptcha;{template_legend:hide},com_template;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop';

