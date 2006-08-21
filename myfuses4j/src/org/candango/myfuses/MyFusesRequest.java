package org.candango.myfuses;

public class MyFusesRequest {
    
    public String circuitName;
    
    public String actionName;

    public MyFusesRequest( String cName, String aName ) {
        this.circuitName = cName;
        this.actionName = aName;
    }
    
    public String getActionName() {
        return actionName;
    }

    public String getCircuitName() {
        return circuitName;
    }
}