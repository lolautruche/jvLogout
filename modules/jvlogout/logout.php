<?php
/**
 * Logout view for jvlogout module
 * Will launch all declared logout handlers
 * @copyright Copyright (C) 2010 - Jerome Vieilledent. All rights reserved
 * @licence http://www.gnu.org/licenses/gpl-2.0.txt GNU GPLv2
 * @author Jerome Vieilledent
 * @version @@@VERSION@@@
 * @package jvlogout
 */

$Module = $Params['Module'];
$http = eZHTTPTool::instance();
$Result = array();

try
{
    
    
    $redirectURI = '/';
    if ( $http->hasSessionVariable( 'LastAccessesURI' ) )
        $redirectURI = $http->sessionVariable( 'LastAccessesURI' );
    $Module->redirectTo( $redirectURI );
}
catch( Exception $e )
{
    $errMsg = $e->getMessage();
    eZDebug::writeError( $errMsg, 'jvLogout' );
}
