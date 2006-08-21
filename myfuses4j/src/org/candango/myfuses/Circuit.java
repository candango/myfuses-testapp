package org.candango.myfuses;

public class Circuit {

    public static final int PRIVATE_ACCESS = 1;

    public static final int PUBLIC_ACCESS  = 0;

    private String          name;

    private String          path;

    private int             access = 0;
    
    private String parentName = "";
    
    private Action[] actions;

    private Circuit parent;
    
    public Circuit getParent() {
        return parent;
    }

    public void setParent( Circuit parent ) {
        this.parent = parent;
    }

    public Circuit( String name, String path, int access ) {
        this.name = name;
        this.path = path;
        this.access = access;
    }

    public Circuit( String name, String path, int access, String parentName ) {
        this( name, path, access );
        this.parentName = parentName;
    }

    public String getParentName() {
        return parentName;
    }

    public int getAccess() {
        return access;
    }

    public String getName() {
        return name;
    }

    public String getPath() {
        return path;
    }
    
    public boolean hasParent() {
        if( parent == null ){
            return false;
        }
        return true;
    }
    
    public String getAccessName(){
        if ( access == PUBLIC_ACCESS ) {
            return "public";
        }
        return "internal";
    }
    
    public String toString() {
        String out = "Circuit:\n";
        out += "\tname: " + name  + "\n";
        out += "\tpath: " + path  + "\n";
        out += "\taccess: " + ( access == PUBLIC_ACCESS ? "public": "internal" )  + "\n";
        out += "\tparent: " + ( parent == null ? "don't have": parent.getName() )  + "\n";
        return out;
    }
    
}