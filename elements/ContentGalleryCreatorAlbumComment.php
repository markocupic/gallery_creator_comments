<?php

/**
 * Contao Open Source CMS
 * Copyright (c) 2005-2013 Leo Feyer
 * @package   Gallery_creator_comments
 * @author    Marko Cupic
 * @license   GNU/LGPL
 * @copyright Marko Cupic 2013
 */


/**
 * Namespace
 */
namespace GalleryCreatorComment;


/**
 * Class ContentGalleryCreatorAlbumComment
 * @copyright  Marko Cupic 2013
 * @author     Marko Cupic
 * @package    GalleryCreatorComment
 */
class ContentGalleryCreatorAlbumComment extends \Module
{
    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'ce_comments';


    /**
     * Display a wildcard in the back end
     * @return string
     */
    public function generate()
    {
        if (TL_MODE == 'BE') {
            $objTemplate = new \BackendTemplate('be_wildcard');

            $objTemplate->wildcard = '### ' . utf8_strtoupper($GLOBALS['TL_LANG']['FMD']['comments'][0]) . ' ###';
            $objTemplate->title = $this->headline;

            return $objTemplate->parse();
        }
        // set the item from the auto_item parameter
        if ($GLOBALS['TL_CONFIG']['useAutoItem'] && isset($_GET['auto_item'])) {
            \Input::setGet('items', \Input::get('auto_item'));

        }
        if (!strlen(\Input::get('items'))) return '';

        return parent::generate();
    }


    /**
     * Generate the module
     */
    protected function compile()
    {
        $objAlbum = \GalleryCreatorAlbumsModel::findByAlias(\Input::get('items'));

        $this->import('Comments');
        $objConfig = new \stdClass();

        $objConfig->perPage = $this->com_perPage;
        $objConfig->order = $this->com_order;
        $objConfig->template = $this->com_template;
        $objConfig->requireLogin = $this->com_requireLogin;
        $objConfig->disableCaptcha = $this->com_disableCaptcha;
        $objConfig->bbcode = $this->com_bbcode;
        $objConfig->moderate = $this->com_moderate;

        $this->Comments->addCommentsToTemplate($this->Template, $objConfig, 'tl_gallery_creator_albums', $objAlbum->id, $GLOBALS['TL_ADMIN_EMAIL']);
    }

}
