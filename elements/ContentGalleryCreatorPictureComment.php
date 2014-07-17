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
 * Class ContentGalleryCreatorPictureComment
 * @copyright  Marko Cupic 2013
 * @author     Marko Cupic
 * @package    GalleryCreatorComment
 */
class ContentGalleryCreatorPictureComment extends \Module
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

        if (!strlen(\Input::get('picId'))) return '';

        return parent::generate();
    }


    /**
     * Generate the module
     */
    protected function compile()
    {
        $objPicture = \GalleryCreatorPicturesModel::findById(\Input::get('picId'));

        $this->import('Comments');
        $objConfig = new \stdClass();

        $objConfig->perPage = $this->com_perPage;
        $objConfig->order = $this->com_order;
        $objConfig->template = $this->com_template;
        $objConfig->requireLogin = $this->com_requireLogin;
        $objConfig->disableCaptcha = $this->com_disableCaptcha;
        $objConfig->bbcode = $this->com_bbcode;
        $objConfig->moderate = $this->com_moderate;

        $this->Comments->addCommentsToTemplate($this->Template, $objConfig, 'tl_gallery_creator_pictures', $objPicture->id, $GLOBALS['TL_ADMIN_EMAIL']);
    }
}
