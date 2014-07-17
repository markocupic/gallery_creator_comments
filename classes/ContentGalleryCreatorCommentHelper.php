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
 * Namespace
 */
namespace GalleryCreatorComment;


/**
 * Class ContentGalleryCreatorCommentHelper
 * @copyright  Marko Cupic 2013
 * @author     Marko Cupic
 * @package    GalleryCreatorComments
 */
class ContentGalleryCreatorCommentHelper extends \System
{
       /**
        * @param $id
        * @param $arrSet
        * @param \Comments $objComment
        */
       public function addAlbumCommentHook($id, $arrSet, \Comments $objComment)
       {
              if ($arrSet['source'] != 'tl_gallery_creator_albums')
              {
                     return;
              }
              // Store the albumId in tl_comments.gc_parent_album for filter usage in the backend
              $objDb = \Database::getInstance();
              $set = array('gc_parent_album' => $arrSet['parent']);
              $objDb->prepare('UPDATE tl_comments %s WHERE id=?')->set($set)->execute($id);
       }

       /**
        * @param $id
        * @param $arrSet
        * @param \Comments $objComment
        */
       public function addPictureCommentHook($id, $arrSet, \Comments $objComment)
       {
              if ($arrSet['source'] != 'tl_gallery_creator_pictures')
              {
                     return;
              }
              // Store the albumId in tl_comments.gc_parent_album for filter usage in the backend
              $objDb = \Database::getInstance();
              $set = array('gc_parent_picture' => $arrSet['parent']);
              $objDb->prepare('UPDATE tl_comments %s WHERE id=?')->set($set)->execute($id);
       }

       /**
        * @param $strRegexp
        * @param $varValue
        * @param $objWidget
        * @return bool
        */
       public function validateParent($strRegexp, $varValue, $objWidget)
       {
              if ($strRegexp == 'gc_comment')
              {
                     if (\Input::post('gc_parent_album') > 0 && \Input::post('gc_parent_picture') > 0){

                            $this->loadLanguageFile('tl_comment');
                            $msg = sprintf($GLOBALS['TL_LANG']['ERR']['gc_parent'], $GLOBALS['TL_LANG']['tl_comments']['gc_parent_album'][0], $GLOBALS['TL_LANG']['tl_comments']['gc_parent_picture'][0]);
                            $objWidget->addError($msg);
                     }
                     return true;
              }

              return false;
       }
}
