<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package Gallery_creator_comments
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'GalleryCreatorComment',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Elements
	'GalleryCreatorComment\ContentGalleryCreatorAlbumComment'   => 'system/modules/gallery_creator_comments/elements/ContentGalleryCreatorAlbumComment.php',
	'GalleryCreatorComment\ContentGalleryCreatorPictureComment' => 'system/modules/gallery_creator_comments/elements/ContentGalleryCreatorPictureComment.php',

	// Classes
	'GalleryCreatorComment\ContentGalleryCreatorCommentHelper'  => 'system/modules/gallery_creator_comments/classes/ContentGalleryCreatorCommentHelper.php',
));
