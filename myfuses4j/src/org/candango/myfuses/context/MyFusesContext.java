package org.candango.myfuses.context;

import java.io.File;

import org.candango.myfuses.Application;
import org.candango.myfuses.servlet.MyFusesServlet;

public class MyFusesContext {

    private String         name = "default";

    private MyFusesServlet servlet;

    private Application    application;
    
    private boolean locked = true;
    
    private boolean running = true;
    
    private Thread observer;
    
    private long lastModified = 0;
    
    private File file;
    
    public MyFusesContext( MyFusesServlet servlet ) {
        this.servlet = servlet;
        
        this.application = new Application( this );
        
        String filename = servlet.getInitParameter( "file" );
        
        System.out.println( filename );
        
        File file = new File( servlet.getServletContext().getRealPath( "/WEB-INF/" + filename ) );
        
        this.file = file;
        
        observer = new Thread( new MyFusesContextObserver( this ) );
        observer.start();
    }
    
    public String getName() {
        return name;
    }

    public void setName( String name ) {
        this.name = name;
    }

    public MyFusesServlet getServlet() {
        return servlet;
    }

    public long getLastModified() {
        return lastModified;
    }

    public void setLastModified( long lastLoadTime ) {
        this.lastModified = lastLoadTime;
    }

    public Application getApplication() {
        return application;
    }

    public void setApplication( Application application ) {
        this.application = application;
    }

    public boolean isLocked() {
        return locked;
    }

    public void setLocked( boolean loked ) {
        this.locked = loked;
    }

    public boolean isRunning() {
        return running;
    }

    public void setRunning( boolean running ) {
        this.running = running;
    }

    public File getFile() {
        return file;
    }

    public void setFile( File file ) {
        this.file = file;
    }
    
}