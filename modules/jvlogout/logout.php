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
$logoutINI = eZINI::instance( 'jvlogout.ini' );

try
{
    $aLogoutHandlers = $logoutINI->variable( 'LogoutSettings', 'AvailableHandlers' );
    foreach( $aLogoutHandlers as $logoutHandlerClass )
    {
        if( !class_exists( $logoutHandlerClass ) )
        {
            eZDebug::writeError( "Cannot find logout handler '$logoutHandlerClass'. Did you regenerate autoloads ?" );
            continue;
        }
        
        $logoutHandler = new $logoutHandlerClass();
        if( !$logoutHandler instanceof IJVLogoutHandler ) // First check if the handler implements the right interface
        {
            eZDebug::writeError( "Declared logout handler '$logoutHandlerClass' does not implement IJVLogoutHandler interface." );
            unset( $logoutHandler );
            continue;
        }
        
        $logoutHandler->handleLogout();
        unset( $logoutHandler );
    }
    
}
catch( Exception $e )
{
    $errMsg = $e->getMessage();
    eZDebug::writeError( $errMsg, 'jvLogout' );
}

// Finally
$redirectURI = '/';
if( $logoutINI->hasVariable( 'LogoutSettings', 'LogoutRedirect' ) )
    $redirectURI = $logoutINI->variable( 'LogoutSettings', 'LogoutRedirect' );

$Module->redirectTo( $redirectURI );
