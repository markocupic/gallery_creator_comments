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

$GLOBALS['TL_DCA']['tl_comments']['fields']['gc_parent_album'] = array
(
       'label'                        => &$GLOBALS['TL_LANG']['tl_comments']['gc_parent_album'],
       'filter'                       => true,
       'sorting'                      => true,
       'inputType'                    => 'select',
       'sql'                          => "int(10) unsigned NOT NULL default '0'",
       'foreignKey'                   =>'tl_gallery_creator_albums.alias',
       'save_callback'                => array(array('gallery_creator_comments', 'saveCbParentAlbum')),
       'eval'                         => array('includeBlankOption' => true, 'class'=>'clr', 'rgxp' => 'gc_comment')
);

$GLOBALS['TL_DCA']['tl_comments']['fields']['gc_parent_picture'] = array
(
       'label'                     => &$GLOBALS['TL_LANG']['tl_comments']['gc_parent_picture'],
       'filter'                    => true,
       'sorting'                   => true,
       'inputType'                 => 'select',
       'sql'                       => "int(10) unsigned NOT NULL default '0'",
       'foreignKey'                => 'tl_gallery_creator_pictures.path',
       'save_callback'             => array(array('gallery_creator_comments', 'saveCbParentPicture')),
       'eval'                      => array('includeBlankOption' => true, 'class'=>'clr', 'rgxp' => 'gc_comment')
);


$GLOBALS['TL_DCA']['tl_comments']['palettes']['default'] = str_replace('{comment_legend}', '{gallery_creator_legend},gc_parent_album,gc_parent_picture;{comment_legend}', $GLOBALS['TL_DCA']['tl_comments']['palettes']['default']);



/**
 * Class gallery_creator_comments
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  Leo Feyer 2005-2014
 * @author     Leo Feyer <https://contao.org>
 * @package    Core
 */
class gallery_creator_comments extends Backend
{


       public function saveCbParentAlbum($varValue, DataContainer $dc){

              if ($varValue > 0){
                     $objComment = CommentsModel::findById($dc->id);
                     if($objComment !== null){
                            $objComment->source = 'tl_gallery_creator_albums';
                            $objComment->gc_parent_picture = 0;
                            $objComment->save();
                     }
              }
              return $varValue;


       }

       public function saveCbParentPicture($varValue, DataContainer $dc){

              if ($varValue > 0){
                     $objComment = CommentsModel::findById($dc->id);
                     if($objComment !== null){
                            $objComment->source = 'tl_gallery_creator_pictures';
                            $objComment->gc_parent_albums = 0;
                            $objComment->save();
                     }
              }
              return $varValue;

       }
}

