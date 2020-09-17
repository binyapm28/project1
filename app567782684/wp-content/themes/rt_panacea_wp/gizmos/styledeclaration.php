<?php
/**
 * @version   1.2 August 21, 2011
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2011 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */

defined('GANTRY_VERSION') or die();

gantry_import('core.gantrygizmo');

/**
 * @package     gantry
 * @subpackage  features
 */
class GantryGizmoStyleDeclaration extends GantryGizmo {

    var $_name = 'styledeclaration';
    
    function isEnabled(){
        return true;
    }

    function query_parsed_init() {
    
    	global $gantry;
        
        if (isset($gantry->_working_params['rotator-backgrounds']['attributees']['path'])) {
			$bgpath = $gantry->_working_params['rotator-backgrounds']['attributes']['path'];
	        $bgpath = str_replace("__TEMPLATE__", $gantry->templateUrl, $bgpath);
		} else {
			$bgpath = $gantry->templateUrl . "/images/showcase-bgs/";
		}
		$bgs = explode(",", $gantry->get('rotator-backgrounds'));

		// tooltips for articledetails layout3
		if ($gantry->get('articledetails') == 'layout3') $gantry->addScript('gantry-articledetails.js');

		//inline css for dynamic stuff
		$css = '.module-content ul.menu li.active > a, .module-content ul.menu li.active > .separator, .module-content ul.menu li.active > .item, .module-content ul.menu li > a:hover, .module-content ul.menu li .separator:hover, .module-content ul.menu li > .item:hover {color:'.$gantry->get('body-link').';}'."\n";
		$css .= '.box1 .module-content ul.menu li.active > a, .box1 .module-content ul.menu li.active > .separator, .box1 .module-content ul.menu li.active > .item, .box1 .module-content ul.menu li > a:hover, .box1 .module-content ul.menu li .separator:hover, .box1 .module-content ul.menu li > .item:hover {color:'.$gantry->get('module1-link').';}'."\n";
		$css .= '.box2 .module-content ul.menu li.active > a, .box2 .module-content ul.menu li.active > .separator, .box2 .module-content ul.menu li.active > .item, .box2 .module-content ul.menu li > a:hover, .box2 .module-content ul.menu li .separator:hover, .box2 .module-content ul.menu li > .item:hover {color:'.$gantry->get('module2-link').';}'."\n";
		$css .= '.box3 .module-content ul.menu li.active > a, .box3 .module-content ul.menu li.active > .separator, .box3 .module-content ul.menu li.active > .item, .box3 .module-content ul.menu li > a:hover, .box3 .module-content ul.menu li .separator:hover, .box3 .module-content ul.menu li > .item:hover {color:'.$gantry->get('module3-link').';}'."\n";

		$css .= 'body {background:'.$gantry->get('page-background').';}'."\n";

		$css .= '#rt-header, #rt-top, #rt-navigation {background:'.$gantry->get('header-background').';}'."\n";
		$css .= '.menutop.theme-fusion ul {background-color:'.$gantry->get('header-background').';}'."\n";
		$css .= '#rt-header, #rt-header .title, #rt-top, #rt-top .title, #rt-navigation {color:'.$gantry->get('header-text').';}'."\n";
		$css .= '#rt-header .module-content a, #rt-header .title span, #rt-top a, #rt-top .title span, #rt-navigation .module-content a {color:'.$gantry->get('header-link').';}'."\n";

		$css .= '.menutop.theme-fusion li.root > .item, .menutop.theme-fusion li > .item {color:'.$gantry->get('header-text').';}'."\n";
		$css .= '.menutop.theme-fusion li.root.active > .item, .menutop.theme-fusion li.root.active > .item:hover, .menutop.theme-fusion li.root.active.f-mainparent-itemfocus > .item, .menutop.theme-fusion li.root:hover > .item, .menutop.theme-fusion li.root.f-mainparent-itemfocus > .item, .menutop.theme-fusion li:hover > .image, .menutop.theme-fusion li.f-menuparent-itemfocus .image, .menutop.theme-fusion li.active > .image, .menutop.theme-fusion li.active > .image, .menutop.theme-fusion li:hover > .bullet, .menutop.theme-fusion li.f-menuparent-itemfocus .bullet, .menutop.theme-fusion li.active > .bullet, .menutop.theme-fusion li.active > .bullet, .menu-type-splitmenu .menutop.theme-splitmenu li.active .item, .menu-type-splitmenu .menutop.theme-splitmenu li:hover .item, body #idrops li.root-sub a, body #idrops li.root-sub span.separator, body #idrops li.root-sub.active a, body #idrops li.root-sub.active span.separator {color:'.$gantry->get('header-link').';}'."\n";
		$css .= '#rt-header .menutop.theme-fusion li a:hover{color:'.$gantry->get('header-link').';}'."\n";

		$css .= '#rt-body-bg2, #more-articles span, #form-login .inputbox, body #roksearch_results .roksearch_header, body #roksearch_results .roksearch_row_btm, body #roksearch_results .roksearch_even:hover, body #roksearch_results .roksearch_odd:hover {background:'.$gantry->get('body-background').';}'."\n";
		$css .= '#roksearch_search_str {background-color:'.$gantry->get('body-background').' !important;}'."\n";
		$css .= '.title1 .title, .title1 .title span, .title1 .title a, .title1 .title a span, .title2 .title, .title2 .title span, .title2 .title a, .title2 .title a span, .number-image {color:'.$gantry->get('body-background').';}'."\n";
		$css .= 'body, #rt-bottom, legend, a:hover, .button:hover, .module-content ul.menu a, .module-content ul.menu .separator, .module-content ul.menu .item, .roktabs-wrapper .roktabs-links li span, #rokajaxsearch .inputbox, #form-login .inputbox {color:'.$gantry->get('body-text').';}'."\n";
		$css .= 'a, .button, .module-content ul.menu a:hover, .module-content ul.menu .separator:hover, .module-content ul.menu .item:hover, .roktabs-wrapper .roktabs-links li.active span, .heading1, .box1 .title {color:'.$gantry->get('body-link').';}'."\n";

		$css .= '#rt-footer-surround {background:'.$gantry->get('footer-background').';}'."\n";
		$css .= '#rt-footer, #rt-footer .module-content a:hover, #rt-copyright, #rt-copyright a:hover, #rt-footer .title, #rt-copyright .title {color:'.$gantry->get('footer-text').';}'."\n";
		$css .= '#rt-footer .module-content a, #rt-copyright a, #rt-footer .title span, #rt-copyright .title span {color:'.$gantry->get('footer-link').';}'."\n";

		$css .= '.box1 .rt-block, .box1 .rt-article-bg, .roktabs-wrapper .active-arrows, .title3 .module-title-surround, #more-articles, .details-layout3 .rt-wordpress .rt-articleinfo, .rt-wordpress .inputbox, .rt-wordpress input#email, .rt-wordpress input#author, .rt-wordpress input#url, .rt-wordpress textarea#comment, .rt-wordpress input#name, .rt-wordpress input#username, .rt-wordpress input#password, .rt-wordpress input#password2, .rt-wordpress input#passwd, body #roksearch_results, .body-overlay-light .rt-post .rt-tags {background:'.$gantry->get('module1-background').';}'."\n";
		$css .= '.box1 .number-image {color:'.$gantry->get('module1-background').';}'."\n";
		$css .= '.box1 .rt-block, .roktabs-wrapper .active-arrows, .title3 .module-title-surround, .details-layout1 .rt-articleinfo, .roktabs-wrapper .roktabs-links ul li, #more-articles, #more-articles span, .details-layout3 .rt-wordpress .rt-articleinfo, #rokajaxsearch .inputbox, .box1 .rt-article-bg, body #roksearch_results, body #roksearch_results .roksearch_header, body #roksearch_results .roksearch_even, body #roksearch_results .roksearch_odd, .body-overlay-light .rt-post .rt-tags {border-color:'.$gantry->get('module1-border').';}'."\n";
		$css .= '#more-articles.disabled, #more-articles.disabled:hover {color: '.$gantry->get('module2-background').'}'."\n";
		$css .= '.box1 .module-content, .box1 .module-content .button:hover, .box1 .title, .title3 .title, .title3 .title a, .box1 .module-content a:hover, .rt-wordpress .inputbox, .rt-wordpress  input#email, .rt-wordpress input#author, .rt-wordpress input#url, .rt-wordpress textarea#comment, #rt-main input#name, .rt-wordpress input#username, .rt-wordpress input#password, .rt-wordpress input#password2, .rt-wordpress input#passwd {color:'.$gantry->get('module1-text').';}'."\n";
		$css .= '.box1 .module-content a, .box1 .module-content .button, .box1 .title span, .title3 .title span, .title3 .title a span {color:'.$gantry->get('module1-link').';}'."\n";

		$css .= '.box2 .rt-block, .box2 .rt-article-bg, .title1 .module-title-surround, .title4 .module-title-surround {background:'.$gantry->get('module2-background').';}'."\n";
		$css .= '.box2 .number-image {color:'.$gantry->get('module2-background').';}'."\n";
		$css .= '.box2 .rt-block, .title4 .module-title-surround, .box2 .rt-article-bg {border-color:'.$gantry->get('module2-border').';}'."\n";
		$css .= '.box2 .module-content, .box2 .title, .title4 .title, .title4 .title a, .box2 .module-content a:hover, .box2 .module-content .button:hover, .box2 .module-content ul.menu li a, .box2 .module-content ul.menu li .separator, .box2 .module-content ul.menu li .item {color:'.$gantry->get('module2-text').';}'."\n";
		$css .= '.box2 .module-content a, .box2 .module-content .button, .box2 .title span, .title4 .title span, .title4 .title a span {color:'.$gantry->get('module2-link').';}'."\n";

		$css .= '.box3 .rt-block, .box3 .rt-article-bg, .title2 .module-title-surround, .title5 .module-title-surround {background:'.$gantry->get('module3-background').';}'."\n";
		$css .= '.box3 .number-image {color:'.$gantry->get('module3-background').';}'."\n";
		$css .= '.box3 .rt-block, .title5 .module-title-surround, .box3 .rt-article-bg {border-color:'.$gantry->get('module3-border').';}'."\n";
		$css .= '.box3 .module-content, .box3 .module-content .button:hover, .box3 .title, .title5 .title, .title5 .title a, .box3 .module-content a:hover, .box3 .module-content ul.menu li a, .box3 .module-content ul.menu li .separator, .box3 .module-content ul.menu li .item {color:'.$gantry->get('module3-text').';}'."\n";
		$css .= '.box3 .module-content a, .box3 .module-content .button, .box3 .title span, .title5 .title span, .title5 .title a span {color:'.$gantry->get('module3-link').';}'."\n";

		$css .= '.rt-wordpress th, .rt-wordpress tr.even td  {background:'.$gantry->get('module1-background').';}'."\n";
		$css .= '.rt-wordpress th {border-bottom: 2px solid '.$gantry->get('module1-border').';}'."\n";
		$css .= '.rt-wordpress tr.even td  {border-bottom: 1px solid '.$gantry->get('module1-border').';}'."\n";
		
		/* JComment */
		$css .= '#jc h1 {border-color:'.$gantry->get('module1-border').';}'."\n";
		$css .= '#jc #comments .even #respond input, #jc #comments .even #respond textarea, #jc #comments.comments-basic ol.commentlist {border-color:'.$gantry->get('module1-border').';}'."\n";
		$css .= '#jc #comments .odd #respond input, #jc #comments .odd #respond textarea {border-color:'.$gantry->get('module2-border').';}'."\n";
		$css .= '#jc h1 {color:'.$gantry->get('module1-text').';}'."\n";
		$css .= '#jc .even .rbox, #jc #comments.comments-standard .even #respond input, #jc #comments.comments-standard .even #respond textarea {background:'.$gantry->get('module1-background').';}'."\n";
		$css .= '#jc .odd .rbox, #jc #comments.comments-standard .odd #respond input, #jc #comments.comments-standard .odd #respond textarea {background:'.$gantry->get('module2-background').';}'."\n";
		$css .= '#jc #comments.comments-basic .comment-meta-time {background:'.$gantry->get('module1-background').';}'."\n";
		$css .= '#jc #comments.comments-basic #respond input, #jc #comments.comments-basic #respond textarea {border-color:'.$gantry->get('module1-border').';}'."\n";
		$css .= '#jc #comments .even .quote, #jc #comments .even .comment-box .comment-body,#jc #comments .even .comment-box .comment-author, #jc #comments .even .comment-box .comment-anchor, #jc #comments .even .comment-box .comment-date {color:'.$gantry->get('module1-text').' !important;}'."\n";
		$css .= '#jc #comments .odd .quote,#jc #comments .odd .comment-box .comment-body, #jc #comments .odd .comment-box .comment-author, #jc #comments .odd .comment-box .comment-anchor, #jc #comments .odd .comment-box .comment-date{color:'.$gantry->get('module2-text').' !important;}'."\n";
		$css .= '#jc #comments .even a {color:'.$gantry->get('module1-link').';}'."\n";
		$css .= '#jc #comments.comments-standard .odd a {color:'.$gantry->get('module2-link').';}'."\n";

		if ($gantry->get('iphone-enabled')) {
			$css .= 'body.rt-normal .rt-articleinfo, body.rt-flipped .rt-articleinfo, body.rt-left .rt-articleinfo, body.rt-right .rt-articleinfo {color:'.$gantry->get('body-link').';}'."\n";
			$css .= 'body.rt-normal .rt-articleinfo, body.rt-flipped .rt-articleinfo, body.rt-left .rt-articleinfo, body.rt-right .rt-articleinfo {background:'.$gantry->get('module1-background').';}'."\n";
		}

		if (count($bgs)) {
			$css .= '#rt-rotator-bg {background-image: url('.$bgpath.$bgs[0].');}'."\n";
		}

		if ($gantry->get('static-enabled')) {
            // do file stuff
            $filename = $gantry->templatePath.DS.'css'.DS.'static-styles.css';
            $css_path = $gantry->templatePath.DS.'css'.DS;

            if (file_exists($filename)) {
                if ($gantry->get('static-check')) {
                    //check to see if it's outdated

                    $md5_static = md5_file($filename);
                    $md5_inline = md5($css);

                    if ($md5_static != $md5_inline) {
                    	if (is_writable($css_path)) {
							$styles_file = fopen($filename, 'w');
							fwrite($styles_file,$css);
							fclose($styles_file);
						} else {
							_re('Unable to write "static-styles.css" in the "/css" folder.');
						}
                    }
                    
                }
            } else {
                // file missing, save it
                if (is_writable($css_path)) {
					$styles_file = fopen($filename, 'w');
					fwrite($styles_file,$css);
					fclose($styles_file);
				} else {
					_re('Unable to write "static-styles.css" in the "/css" folder.');
				}
            }
            // add reference to static file
            $gantry->addStyle('static-styles.css',99);

        } else {
            // add inline style
            $gantry->addInlineStyle($css);
        }
        
        // add inline css from the Custom CSS field
		$gantry->addInlineStyle($gantry->get('customcss'));

		$this->_disableRokBoxForiPhone();

	}
	
	function _disableRokBoxForiPhone() {
		global $gantry;
		
		if ($gantry->browser->platform == 'iphone') {
			$gantry->addInlineScript("window.addEvent('domready', function() {\$\$('a[rel^=rokbox]').removeEvents('click');});");
		}
	}
	
}