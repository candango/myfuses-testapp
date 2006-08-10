<?php
/**
 * My Fuses Main Controller class  - MainController.class.php
 * 
 * This is My Fuses Candango Opensource Group a implementation of Fusebox 
 * Corporation Fusebox framework. The My Fuses is used as Iflux Framework 
 * Main Controller.
 * 
 * PHP version 5
 * 
 * The contents of this file are subject to the Mozilla Public License
 * Version 1.1 (the "License"); you may not use this file except in
 * compliance with the License. You may obtain a copy of the License at
 * http://www.mozilla.org/MPL/
 * 
 * Software distributed under the License is distributed on an "AS IS"
 * basis, WITHOUT WARRANTY OF ANY KIND, either express or implied. See the
 * License for the specific language governing rights and limitations
 * under the License.
 * 
 * This product includes software developed by the Fusebox Corporation 
 * (http://www.fusebox.org/).
 * 
 * The Original Code is Fuses "a Candango implementation of Fusebox Corporation 
 * Fusebox" part .
 * 
 * The Initial Developer of the Original Code is Flávio Gonçalves Garcia.
 * Portions created by Flávio Gonçalves Garcia are Copyright (C) 2005 - 2006.
 * All Rights Reserved.
 * 
 * Contributor(s): Flávio Gonçalves Garcia.
 *
 * @category   controller
 * @package    myfuses
 * @author     Flávio Gonçalves Garcia <fpiraz@gmail.com>
 * @copyright  Copyright (c) 2005 - 2006 Candango Group <http://www.candango.org/>
 * @license    http://www.mozilla.org/MPL/MPL-1.1.html  MPL 1.1
 * @version    SVN: $Id$
 * @since      Release 3
 */

define( "MYFUSES_ROOT_PATH", dirname( __FILE__ ) . DIRECTORY_SEPARATOR );

require_once MYFUSES_ROOT_PATH . "exception/MyFusesException.class.php";

// ifbox autoload function 
spl_autoload_register( "myfusesAutoLoad" );

/**
 * My Fuses Main Controller class  - MainController.class.php
 * 
 * This is My Fuses Candango Opensource Group a implementation of Fusebox 
 * Corporation Fusebox framework. The My Fuses is used as Iflux Framework 
 * Main Controller.
 * 
 * PHP version 5
 *
 * @category   controller
 * @package    myfuses
 * @author     Flávio Gonçalves Garcia <fpiraz@gmail.com>
 * @copyright  Copyright (c) 2005 - 2006 Candango Group <http://www.candango.org/>
 * @license    http://www.mozilla.org/MPL/MPL-1.1.html  MPL 1.1
 * @version    SVN: $Release: Fusebox.class.php 60 2006-04-11 18:20:24Z piraz $
 * @since      Release 3
 * @abstract
 */
abstract class MyFuses {
    
    /**
     * The MyFuses root path constant
     * 
     * @access public
     */
    const ROOT_PATH = MYFUSES_ROOT_PATH;
    
    /**
     * Application name
     * 
     * @access private
     */
    private static $applicationName = "application";
    
    /**
     * Application path
     * 
     * @access private
     */
    private static $applicationPath;
    
    /**
     * Context name
     * 
     * @access private
     */
    private static $contextName = "default";
    
    /**
     * Returns the application name
     * 
     * @return string The application name
     * @access public
     */
    public static function getApplicationName() {
        return self::$applicationName;
    }
    
    /**
     * Sets the application name
     * 
     * @param string name The application name
     * @access public
     */
    public static function setApplicationName( $name ) {
        return self::$applicationName = $name;
    }
    
    /**
     * Returns the application path
     * 
     * @return string The application path
     * @access public
     */
    public static function getApplicationPath() {
        return self::$applicationPath;
    }
    
    /**
     * Sets the application path
     * 
     * @param string name The application path
     * @access public
     */
    public static function setApplicationPath( $path ) {
        return self::$applicationPath = $path;
    }
    
    /**
     * Returns the context path
     * 
     * @return string The context path
     * @access public
     */
    public static function getContextName() {
        return self::$contextName;
    }
    
    /**
     * Sets the context name
     * 
     * @param string name The context path
     * @access public
     */
    public static function setContextName( $name ) {
        return self::$contextName = $name;
    }
    
    private static function initContext() {
    	ContextHandler::initContext();
    }
    
    private static function initApplication() {
    	ApplicationHandler::initApplication();
    }
    
    /**
     * Process the user request
     * 
     * @access public
     */
    public static function processRequest() {
        
        // initilizing context if necessary
        self::initContext();
        
        // initilizing application if necessary
        self::initApplication();
        
    }
    
    /**
     * Auto loads class files when they aren't included 
     * 
     * @param string className The class name
     * @access public
     */
    public static function autoLoad( $className ) {
        $classIncludeMap = array(
            'Application' => 'application/',
            'ApplicationHandler' => 'application/',
            'Context' => 'context/',
            'ContextHandler' => 'context/',
            'IContextRegisterable' => 'context/'
        );
        
        try {
            self::includeCoreFile( MyFuses::ROOT_PATH . 
                $classIncludeMap[ $className ] . $className . ".class.php" );
        }
        catch( MyFusesMissingCoreFileException $mfmcfe ) {
            $mfmcfe->breakProcess();
        } 	
    }
    
    /**
     * Includes core files.<br>
     * Throws IFBExeption when <code>file doesn't exists</code>.
     * In truth this method use require_once insted include_once.
     * Process must break if some core file doesn't exists.
     * 
     * @param file File path
     * @access public
     * @return void
     */
    public static function includeCoreFile( $file ) {
        if ( file_exists( $file ) ) {
            require_once $file;
        }
        else {
            throw new MyFusesMissingCoreFileException( $file );
        }
    }
    
}

/**
 * Fires MyFuses::autoLoad()
 * 
 * @param string className
 * @see MyFuses::autoLoad()
 */
function myfusesAutoLoad( $className ){
    MyFuses::autoLoad( $className );
}
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */