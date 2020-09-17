<?php
/**
 * @version   1.2 August 21, 2011
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2011 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
 
class PanaceaTouchMenuTheme extends AbstractRokMenuTheme {

    protected $defaults = array(

    );

    public function getFormatter($args){
        require_once(dirname(__FILE__).'/formatter.php');
        return new PanaceaTouchMenuFormatter($args);
    }

    public function getLayout($args){
        require_once(dirname(__FILE__).'/layout.php');
        return new PanaceaTouchMenuLayout($args);
    }
}
