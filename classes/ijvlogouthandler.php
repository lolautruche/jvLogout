<?php
/**
 * File containing the main logout handler interface
 * @copyright Copyright (C) 2010 - Jérôme Vieilledent. All rights reserved
 * @licence http://www.gnu.org/licenses/gpl-2.0.txt GNU GPLv2
 * @author Jerome Vieilledent
 * @version @@@VERSION@@@
 * @package jvlogout
 */

/**
 * Interface for all registered logout handlers.
 * Must be implemented by all logout handlers
 */
interface IJVLogoutHandler
{
    /**
     * Main method to handle custom logout actions
     */
    public function handleLogout();
}
