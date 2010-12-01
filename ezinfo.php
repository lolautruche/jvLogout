<?php
/**
 * eZInfo for jvLogout extension
 * @copyright Copyright (C) 2010 Jerome Vieilledent. All rights reserved
 * @licence http://www.gnu.org/licenses/gpl-2.0.txt GNU GPLv2
 * @author Jerome Vieilledent
 * @version @@@VERSION@@@
 * @package jvlogout
 */

class jvlogoutInfo
{
    /**
     * eZInfo method
     */
    public static function info()
    {
        return array(
            'Name'            => 'jvLogout',
            'Version'         => '@@@VERSION@@@',
            'Copyright'       => 'Copyright © 2010 Jérôme Vieilledent',
            'License'         => 'GNU General Public License v2.0',
            'Info'            => '<a href="http://projects.ez.no/jvlogout" target="_blank">http://projects.ez.no/jvlogout</a>'
        );
    }
}