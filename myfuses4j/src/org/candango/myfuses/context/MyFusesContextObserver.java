package org.candango.myfuses.context;

import org.candango.myfuses.context.loaders.MyFusesContextXMLLoader;

public class MyFusesContextObserver implements Runnable {

    private MyFusesContext context;

    public MyFusesContextObserver( MyFusesContext context ) {
        this.context = context;
        System.out.println( "Observando..." );
    }

    public void run() {

        while ( context.isRunning() ) {

            if ( context.getFile().lastModified() > context.getLastModified() ) {
                context.setLocked( true );
                MyFusesContextLoader loader = MyFusesContextLoader
                        .getContextLoader( context,
                                MyFusesContextLoader.XML_LOADER );
                
                context.getApplication().clearCircuitList();
                
                loader.load();
                
                context.setLastModified( context.getFile().lastModified() );
                context.setLocked( false );
            }
            try {
                Thread.sleep( 3000 );
            } catch ( InterruptedException e ) {
                e.printStackTrace();
            }
        }

    }

}