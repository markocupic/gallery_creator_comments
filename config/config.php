<?php

/**
 * Contao Open Source CMS
 * Copyright (c) 2005-2013 Leo Feyer
 * @package GalleryCreatorComment
 * @author    Marko Cupic
 * @license   GNU/LGPL
 * @copyright Marko Cupic 2013
 */


/**
 * HOOKS
 */
$GLOBALS['TL_HOOKS']['addComment'][] = array('ContentGalleryCreatorCommentHelper', 'addAlbumCommentHook');
$GLOBALS['TL_HOOKS']['addComment'][] = array('ContentGalleryCreatorCommentHelper', 'addPictureCommentHook');

$GLOBALS['TL_HOOKS']['addCustomRegexp'][] = array('ContentGalleryCreatorCommentHelper', 'validateParent');

/**
 * CONTENT ELEMENTS
 */
array_insert($GLOBALS['TL_CTE'], 3, array
(
    'ce_type_gallery_creator' => array
    (
        'gallery_creator_album_comments'         => 'ContentGalleryCreatorAlbumComment',
        'gallery_creator_picture_comments'       => 'ContentGalleryCreatorPictureComment',

    )
));

