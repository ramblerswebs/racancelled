<?php

// no direct access
/**
 * @module	RA Cancelled Walks
 * @author	Chris Vaughan
 * @website	http://ramblers-webs.org.uk/
 * @copyright	Copyright (C) 2013 Chris Vaughan webmaster@ramblers-webs.org.uk All rights reserved.
 * @license	http://www.gnu.org/licenses/gpl.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');
// Add a reference to a CSS file
// The default path is 'media/system/css/'

$document = JFactory::getDocument();
$document->addStyleSheet(JURI::base() . 'modules/mod_racancelled/css/ramblerscancelled.css');

$groups = $params->get('groups');
$rafeedurl = 'http://www.ramblers.org.uk/api/lbs/walks?groups=' . $groups;
$feed = new RJsonwalksFeed($rafeedurl); // standard software to read json feed and decode file
$display = new RJsonwalksStdCancelledwalks();

$number = $feed->noCancelledWalks();
$total = $feed->numberWalks();
// Display anyway
$diagnostics = $params->get('diagnostics');
if ($diagnostics == 1) {
    echo '<div class="cancelledWalks">';
    echo "<h3>Cancelled walks - Diagnostics</h3>";
    echo "<h4>Groups accessed: " . $groups . "</h4>";
    echo "<h4>Number of cancelled walks: " . $number . "</h4>";
    echo "<h4>Total number of walks: " . $total . "</h4>";
    echo '</div>';
}
$feed->Display($display);  // display walks information


// end
