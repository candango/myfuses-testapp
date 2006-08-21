package org.candango.myfuses.servlet;

import java.io.IOException;
import java.util.Enumeration;

import javax.servlet.RequestDispatcher;
import javax.servlet.ServletContext;
import javax.servlet.ServletException;
import javax.servlet.ServletOutputStream;

import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.candango.myfuses.Circuit;
import org.candango.myfuses.MyFusesRequest;
import org.candango.myfuses.context.MyFusesContext;

public class MyFusesServlet extends HttpServlet {

    private MyFusesContext    context;

    private MyFusesRequest    request;

    /**
     * 
     */
    private static final long serialVersionUID = 1L;

    public void init() throws ServletException {

        Enumeration enumeration = getInitParameterNames();

        while ( enumeration.hasMoreElements() ) {
            String name = (String) enumeration.nextElement();
            System.out.println( name + " - " + getInitParameter( name ) );
        }

        context = new MyFusesContext( this );

        System.out.println( "Inicializando o contexto" );

    }

    protected final void doGet( HttpServletRequest req, HttpServletResponse res )
            throws ServletException, IOException {

        Enumeration enumeration = req.getParameterNames();

        while ( enumeration.hasMoreElements() ) {
            String name = (String) enumeration.nextElement();
            String values[] = req.getParameterValues( name );
            System.out.println( name + " - " + values[ 0 ] );
        }

    }

    public void service( HttpServletRequest req, HttpServletResponse res )
            throws ServletException, IOException {
        
        if ( req.getPathInfo() != null && !req.getPathInfo().equals( "/" ) ) {

            String[] pInfo = req.getPathInfo().replaceAll( "/", "" ).replace(
                    '.', '@' ).split( "@" );
            
            if ( pInfo.length < 2 ) {
                getServletContext().log( "buuu" );
                throw new ServletException( "coloca esse o nome da ação direito" );
            }
            else {
                String cName = pInfo[ 0 ];

                String aName = pInfo[ 1 ];

                request = new MyFusesRequest( cName, aName );
            }

        } else {
            request = new MyFusesRequest( "", "" );
        }

        if ( getContext().isLocked() ) {
            ServletOutputStream out = res.getOutputStream();
            out.println( "Agente tamos colocando as parada na memória seu "
                    + "feinho, se ficar amolando, o tambor vai girar e "
                    + "a casa vai caí céito!?" );
        }

        else {
            if ( request.circuitName.equals( "debug" ) ) {
                showDebug( req, res );
            } else {
                super.service( req, res );
            }
        }

    }

    protected final void doPost( HttpServletRequest req, HttpServletResponse res )
            throws ServletException, IOException {

        Enumeration enumeration = req.getParameterNames();

        while ( enumeration.hasMoreElements() ) {
            String name = (String) enumeration.nextElement();
            String values[] = req.getParameterValues( name );
            System.out.println( name + " - " + values[ 0 ] );
        }

        /*
         * MyFusesContextHandler handler = new MyFusesContextHandler( this );
         * 
         * req.setAttribute( "context", context );
         * 
         * ServletContext sc = getServletContext();
         * 
         * RequestDispatcher dispatcher = sc.getRequestDispatcher( "/teste.jsp" );
         * RequestDispatcher dispatcher1 = sc.getRequestDispatcher(
         * "/outroteste.jsp" );
         * 
         * 
         * try { // Note- the included servlet has control over its own buffer
         * only. dispatcher.include( req, res ); dispatcher1.include( req, res ); }
         * catch (Exception e) { sc.log( "Problem servlet.", e ); }
         */
    }

    public MyFusesContext getContext() {
        return context;
    }

    public void destroy() {
        this.context.setRunning( false );
        System.out.println( "detonando contexto" );
        super.destroy();
    }

    private void showDebug( HttpServletRequest req, HttpServletResponse res )
            throws ServletException, IOException {
        ServletOutputStream out = res.getOutputStream();
        
        out.println( "<div align=\"center\"><table border=\"1\"><tr><th colspan=\"4\">Circuis</th></tr>" );
        out.println( "<tr><th>Name</th><th>Path</th><th>Parent</th><th>Access</th></tr>" );
        
        for( Circuit circuit : getContext().getApplication().getCircuits() ) {
            out.println( "<tr><td>" + circuit.getName() + "</td><td>" + circuit.getPath() + "</td><td>" + ( circuit.hasParent() ? circuit.getParent().getName() : "don't have" )  + "</td><td>" + circuit.getAccessName() + "</td></tr>" );
        }
        out.println( "</table></div>" );
    }

}