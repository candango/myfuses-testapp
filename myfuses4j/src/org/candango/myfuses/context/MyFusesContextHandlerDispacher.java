package org.candango.myfuses.context;

import java.lang.reflect.InvocationTargetException;
import java.lang.reflect.Method;

import org.xml.sax.Attributes;

public class MyFusesContextHandlerDispacher {

    MyFusesContextLoader hander;

    public MyFusesContextHandlerDispacher( MyFusesContextLoader hander ) {
        this.hander = hander;
    }

    public String[] getStartElementIndex() {
        String[] indexes = { "circuit" };
        return indexes;
    }

    public void dispachStartElement( int index, Attributes attrs ) {
        Method[] methods = { getMethod( "loadCircuit" ) };

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

    public Method getMethod( String methodName ) {

        Method method = null;

        Class[] params = { Attributes.class };

        try {

            method = MyFusesContextHandlerDispacher.class.getMethod(
                    methodName, params );

        } catch ( NoSuchMethodException e ) {

            e.printStackTrace();

        }

        return method;
    }

    public void loadCircuit( Attributes attrs ) {
        /*if ( hander.isCircuitAlowed() ) {
            for( int i = 0; i< attrs.getLength(); i++ ) {
                System.out.print( attrs.getQName( i ) + " " );
                System.out.print( attrs.getType( i ) + " " );
                System.out.print( attrs.getValue( i ) + " - " );
            }
        }*/
    }

}