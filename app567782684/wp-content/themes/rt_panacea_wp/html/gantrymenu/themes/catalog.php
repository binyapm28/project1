<?php
/**
 * @version   1.2 August 21, 2011
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2011 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
require_once(dirname(__FILE__).'/panacea_fusion/theme.php');
GantryWidgetMenu::registerTheme(dirname(__FILE__).'/panacea_fusion','panacea_fusion', __('Panacea Fusion'), 'PanaceaFusionMenuTheme');
require_once(dirname(__FILE__).'/panacea_splitmenu/theme.php');
GantryWidgetMenu::registerTheme(dirname(__FILE__).'/panacea_splitmenu','panacea_splitmenu', __('Panacea SplitMenu'), 'PanaceaSplitMenuTheme');
require_once(dirname(__FILE__).'/panacea_touch/theme.php');
GantryWidgetMenu::registerTheme(dirname(__FILE__).'/panacea_touch','panacea_touch', __('Panacea Touch'), 'PanaceaTouchMenuTheme');