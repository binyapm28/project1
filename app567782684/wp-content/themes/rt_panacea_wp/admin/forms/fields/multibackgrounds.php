<?php
/**
 * @version   1.2 August 21, 2011
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2011 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */

defined('GANTRY_VERSION') or die();
/**
 * @package     gantry
 * @subpackage  admin.elements
 */
gantry_import('core.config.gantryformfield');

class GantryFormFieldMultiBackgrounds extends GantryFormField {

    protected $type = 'multibackgrounds';
    protected $basetype = 'text';
    
    public function getInput(){

		global $gantry;
		$output = '';
		
		$name = $this->name;

		$this->template = end(explode(DS, $gantry->templatePath));
		
		$name = substr(str_replace($gantry->templateName . '-template-options', "", $this->name), 1, -1);
		$name = str_replace("][", "-", $name);
		
		$class = $this->element['class'] ? $this->element['class'] : '';
        $preview = $this->element['preview'] ? $this->element['preview'] : "false";
        $path = ($this->element['path']) ? $this->element['path'] : false;
        $this->default = ($this->element['default']) ? $this->element['default'] : 'none';
		
		if (!$path) return "No path set in templateDetails.xml";

        if ($preview == 'true') $class .= " mbg-previewer";

        if (!defined('GANTRY_CSS')) {
			$gantry->addStyle($gantry->gantryUrl.'/admin/widgets/gantry.css');
			define('GANTRY_CSS', 1);
		}
		
		if (!defined('GANTRY_MBG')) {
            $gantry->addInlineScript('var GantryBackgrounds = {};');
			$gantry->addInlineScript('
				GantryLang["mbg_manager"] = "' . _r('Backgrounds Rotator Manager') . '";
				GantryLang["mbg_desc"] = "' . _r('From the left list drag the backgrounds you want to activate on the right list. You can sort the right table by drag & dropping each element at the desired position. To remove a background from the right list simply click on the (x) button of the item. To preview a background drag & drop from the left list into the preview area, double click anywhere in the background image to reset the preview.') . '";
				GantryLang["mbg_avail"] = "' . _r('Backrounds Available') . '";
				GantryLang["mbg_set"] = "' . _r('Backgrounds Set') . '";
			');
			$gantry->addStyle($gantry->templateUrl . '/admin/forms/fields/css/multibackgrounds.css');
			$gantry->addScript($gantry->templateUrl . '/admin/forms/fields/js/multibackgrounds.js');
            define('GANTRY_MBG', 1);
        }
	
		$valueCount = count(explode(",", str_replace(" ", "", $this->value)));

        $rootPath = str_replace("__TEMPLATE__", $gantry->templatePath, $path);
        $urlPath = str_replace("__TEMPLATE__", $gantry->templateUrl, $path);
		
		$this->_loadGantryBackgrounds($name, $rootPath);

        $backgrounds = array();

        $__backgrounds = $gantry->retrieveTemp('backgrounds', 'backgrounds', array());
        $__paths = $gantry->retrieveTemp('backgrounds', 'paths', array());

		$backgrounds[$name] = "";
        foreach ($__backgrounds[$name] as $title => $file) {
            $backgrounds[$name] .= "'" . $file['name'] . "." . $file['ext'] . "': {'file': '" . $file['file'] . "', 'value': '" . $file['name'] . "', 'ext': '".$file['ext']."', 'name': '" . $title . "', 'path': '" . $urlPath . $file['file'] . "'}, ";
        }

        $backgrounds[$name] = substr($backgrounds[$name], 0, -2);
        $gantry->addInlineScript('GantryBackgrounds["' . $name . '"] = new Hash({' . $backgrounds[$name] . '});');
		$gantry->addInlineScript($this->_jsInit($name));

        $output = '
			<div class="wrapper">
				<div id="' . $name . '" class="' . $class . '">
					<a href="#" class="bg-button">
						<span class="bg-button-right">
							Manage
						</span>
					</a>
					<span class="mbg-current"><span class="mbg-current-value">'.$valueCount.'</span> backgrounds set.<br /><span class="mbg-current-total">'.count($__backgrounds[$name]).'</span> backgrounds found.</span>
					<input type="hidden" id="'.$this->id.'" name="' . $this->name . '" value="' . $this->value . '" />
				</div>
			</div>
		';

        $gantry->addTemp('overlays', 'overlays', $__overlays);
        $gantry->addTemp('overlays', 'paths', $__paths);
		
		return $output;
	}

    function _loadGantryBackgrounds($elementName, $path) {
        global $gantry;

        $backgrounds = $gantry->retrieveTemp('backgrounds', 'backgrounds', array());
        $__paths = $gantry->retrieveTemp('backgrounds', 'paths', array());

        $limit = $gantry->get('backgrounds_list_limit');
        $counter = 0;
        if (is_dir($path) && !isset($__paths[$path])) {
            if ($dh = opendir($path)) {
                $backgrounds[$elementName] = array();
                while (($file = readdir($dh)) !== false) {
                    if (filetype($path . $file) == 'file' && $this->_isImage($file)) {
                        if ($counter >= $limit) continue;

                        $ext = substr($file, strrpos($file, '.') + 1);
                        $name = substr($file, 0, strrpos($file, '.'));

                        $title = str_replace("-", " ", $name);
                        $title = ucwords($title);

                        $backgrounds[$elementName][$title] = array('name' => $name, 'ext' => $ext, 'file' => $name . "." . $ext);

                        $counter++;
                    }
                }
                closedir($dh);
                $__paths[$path] = $backgrounds[$elementName];
            }
        } else {
            $backgrounds[$elementName] = $__paths[$path];
        }

        ksort($backgrounds[$elementName]);

        $gantry->addTemp('backgrounds', 'backgrounds', $backgrounds);
        $gantry->addTemp('backgrounds', 'paths', $__paths);

        return $backgrounds;
    }

    function _isImage($file) {
        $extension = strtolower(substr($file, -4));

        return ($extension == '.jpg' || $extension == '.bmp' || $extension == '.gif' || $extension == '.png');
    }
    
    function _jsInit($name) {
		global $gantry;
		$mt = true;
		$dollar = "document.id('".$this->id."')";
		$setText = "set('text', ";
			
		return "
			window.addEvent('domready', function() {
				".$dollar.".addEvent('set', function(value) {
					var count = value.split(',').length;
					this.value = value;
					this.getParent().getElement('.mbg-current-value').".$setText."count);
					if (Gantry.MenuItemHead) {
						var cache = Gantry.MenuItemHead.Cache[Gantry.Selection];
						if (!cache) cache = new Hash({});
						cache.set('".$this->id."', value);
					}
				});
			})";
		
	}
    
}

?>