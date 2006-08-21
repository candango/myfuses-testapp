/**
 * MyFusesContextLoader - MyFusesContextLoader.java
 *
 * This is My Fuses Candango Opensource Group a implementation of Fusebox
 * Corporation Fusebox framework. The My Fuses is used as Iflux Framework
 * Main Controller.
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
 * Portions created by Flávio Gonçalves Garcia are Copyright (C) 2006 - 2006.
 * All Rights Reserved.
 *
 * Contributor(s): Flávio Gonçalves Garcia.
 *
 * @author     Flávio Gonçalves Garcia aka piraz
 * @copyright  Copyright (c) 2006 - 2006 Candango Opensource Group <http://www.candango.org/>
 * @license    http://www.mozilla.org/MPL/MPL-1.1.html  MPL 1.1
 * @version    SVN: $Id: MyFuses.class.php 8 2006-08-10 20:44:32Z piraz $
 * @since      @since 0.0.1
 */
package org.candango.myfuses.context;

import java.lang.reflect.InvocationTargetException;
import java.lang.reflect.Method;

import org.candango.myfuses.context.loaders.MyFusesContextXMLLoader;

/**
 * MyFusesContextLoader - MyFusesContextLoader.java
 *
 * This is My Fuses Candango Opensource Group a implementation of Fusebox
 * Corporation Fusebox framework. The My Fuses is used as Iflux Framework
 * Main Controller.
 * 
 * @author Flávio Gonçalves Garcia aka piraz
 * @version SVN: $Revision: 8 $
 * @since 0.0.1
 */
abstract public class MyFusesContextLoader {

    /**
     * Constant that represents a xml loader<br>
     * Value = 0
     */
    public static final int XML_LOADER = 0;

    /**
     * Context pointer
     */
    private MyFusesContext  context;

    /**
     * Defalut constructor
     * 
     * @param context
     */
    public MyFusesContextLoader( MyFusesContext context ) {
        this.context = context;
    }

    /**
     * Factory method that gets some loder by a ginven loader
     * 
     * @param context
     * @param witchLoader
     * @return
     */
    public static MyFusesContextLoader getContextLoader(
            MyFusesContext context, int witchLoader ) {
        if ( witchLoader == XML_LOADER ) {
            return new MyFusesContextXMLLoader( context );
        }
        return null;
    }
    
    /**
     * Starts the load process
     */
    public abstract void load();

    public abstract void loadCircuits( Object param );
    
    /**
     * Returns the context
     * 
     * @return
     */
    public MyFusesContext getContext() {
        return context;
    }

    protected void dispachToMethod( String key, Object attrs ) {
        
        int index = -1;
        
        String[] keys = { "circuits" };
        Method[] methods = { getMethod( "loadCircuits" ) };
        
        for( int i = 0; i < keys.length; i++ ) {
            if( keys[ i ].equals( key ) ) {
                index = i;
            }
        }
        
        if( index != -1 ) {
            Object[] params = { attrs };

            try {
                methods[ index ].invoke( this, params );
            } catch ( IllegalArgumentException e ) {
                e.printStackTrace();
            } catch ( IllegalAccessException e ) {
                e.printStackTrace();
            } catch ( InvocationTargetException e ) {
                e.printStackTrace();
            }
        }
    }

    /**
     * Gets one method of this class by his name using reflection
     * 
     * @param name
     * @return
     */
    private Method getMethod( String name ) {

        Method method = null;

        Class[] params = { Object.class };

        try {

            method = MyFusesContextLoader.class.getMethod( name, params );

        } catch ( NoSuchMethodException e ) {

            e.printStackTrace();

        }

        return method;
    }
    
}