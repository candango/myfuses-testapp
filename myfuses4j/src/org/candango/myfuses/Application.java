package org.candango.myfuses;

import java.util.ArrayList;
import java.util.Iterator;

import org.candango.myfuses.context.MyFusesContext;
import org.candango.myfuses.servlet.MyFusesServlet;

public class Application {
    
    private String         file;

    private String         name;

    private ArrayList circuitList = new ArrayList();
    
    private MyFusesContext context;
    
    
    public Application( MyFusesContext context ) {
        this.context = context;
    }

    public void addCircuit( Circuit circuit ) {
        circuitList.add( circuit );
    }
    
    public MyFusesContext getContext() {
        return context;
    }
    
    public Circuit getCircuit( String name ) {
        for ( Iterator it = circuitList.iterator(); it.hasNext(); ) {
            Circuit circuit = (Circuit) it.next();
            if ( circuit.getName().equals( name ) ) {
                return circuit;
            }
        }
        return null;
    }

    public void removeCircuit( String name ) {
        Circuit circuit = getCircuit( name );
        if ( circuit != null ) {
            removeCircuit( circuit );
        }
    }

    public void removeCircuit( Circuit circuit ) {
        circuitList.remove( circuit );
    }

    public ArrayList getCircuitList() {
        return circuitList;
    }
    
    public void clearCircuitList() {
        circuitList.clear();
    }
    
    public Circuit[] getCircuits() {
        
        Object[] objects = getCircuitList().toArray();
        
        Circuit[] circuits = new Circuit[ objects.length ];
        
        int pos = 0;
        
        for( Object object : objects ) {
            circuits[ pos ++ ] = ( Circuit ) object;
        }
        
        return circuits;
        
    }
    
    public void linkCircuits() {
        for( Circuit circuit : getCircuits() ) {
            if( !circuit.getParentName().equals( "" ) ) {
                Circuit parent = getCircuit( circuit.getParentName() );
                if( parent != null ){
                    circuit.setParent( parent );
                }
            }
        }
    }
    
    public void setCircuitList( ArrayList circuitList ) {
        this.circuitList = circuitList;
    }

    public String getFile() {
        return file;
    }

    public void setFile( String file ) {
        this.file = file;
    }

    public String getName() {
        return name;
    }

    public void setName( String name ) {
        this.name = name;
    }
}