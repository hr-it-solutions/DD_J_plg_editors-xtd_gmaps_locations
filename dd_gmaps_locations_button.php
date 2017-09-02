<?php
/**
 * @package    DD_GMaps_Locations_Button
 *
 * @author     HR IT-Solutions Florian Häusler <info@hr-it-solutions.com>
 * @copyright  Copyright (C) 2017 - 2017 Didldu e.K. | HR IT-Solutions
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/

defined('_JEXEC') or die;

use Joomla\Registry\Registry;

/**
 * DD GMaps Locations Button Editors Plugin
 *
 * @since  Version 1.0.0.0
 */
class PlgButtonDD_GMaps_Locations_Button extends JPlugin
{
	protected $app;

	/**
	 * Display the button
	 *
	 * @param   string  $name  The name of the button to add
	 *
	 * @return  JObject  The button options as JObject
	 *
	 * @since   1.5
	 */
	public function onDisplay($name)
	{
		$user  = JFactory::getUser();

		if ($user->authorise('core.create', 'com_dd_gmaps_locations')
			|| $user->authorise('core.edit', 'com_dd_gmaps_locations')
			|| $user->authorise('core.edit.own', 'com_dd_gmaps_locations'))
		{
			$link = 'index.php?option=com_dd_gmaps_locations&amp;view=locations&amp;layout=modal&amp;tmpl=component&amp;'
				. JSession::getFormToken() . '=1';

			$button = new JObject;
			$button->modal   = true;
			$button->class   = 'btn';
			$button->link    = $link;
			$button->text    = JText::_('PLG_EDITORS-XTD_DD_GMAPS_LOCATIONS_BUTTON_BUTTON');
			$button->name    = 'file-add';
			$button->options = "{handler: 'iframe', size: {x: 800, y: 500}}";

			return $button;
		}
	}
}
