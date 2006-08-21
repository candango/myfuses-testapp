package org.candango.myfuses.context.loaders;

import java.io.IOException;
import java.util.ArrayList;

import javax.xml.parsers.DocumentBuilder;
import javax.xml.parsers.DocumentBuilderFactory;
import javax.xml.parsers.ParserConfigurationException;

import org.candango.myfuses.Circuit;
import org.candango.myfuses.context.MyFusesContext;
import org.candango.myfuses.context.MyFusesContextLoader;

import org.w3c.dom.Document;
import org.w3c.dom.NamedNodeMap;
import org.w3c.dom.Node;
import org.w3c.dom.Element;
import org.w3c.dom.NodeList;
import org.xml.sax.Attributes;
import org.xml.sax.SAXException;

public class MyFusesContextXMLLoader extends MyFusesContextLoader {
    
    public Document document;
    
    public MyFusesContextXMLLoader( MyFusesContext context ) {
        super( context );
        DocumentBuilderFactory factory = DocumentBuilderFactory.newInstance();
        try {
            DocumentBuilder builder = factory.newDocumentBuilder();
            document = builder.parse( context.getFile() );
        } catch ( ParserConfigurationException e ) {
            e.printStackTrace();
        } catch ( SAXException e ) {
            e.printStackTrace();
        } catch ( IOException e ) {
            e.printStackTrace();
        }
    }
    
    
    
    @Override
    public void load() {
        
        Element root = document.getDocumentElement();
        
        NodeList myfusesNodes = root.getChildNodes();
        
        for( int i = 0; i < myfusesNodes.getLength(); i++ ){
            Node node = myfusesNodes.item( i );
            if( !node.getNodeName().equals( "#text" ) ) {
                String name = node.getNodeName();
                
                if ( name.toLowerCase().equals( "circuits" ) ) {
                    dispachToMethod( name.toLowerCase(), node.getChildNodes() );
                }
                
            }
        }
    }
    
    
    
    @Override
    public void loadCircuits( Object param ) {
        NodeList cricuitsNodes = ( NodeList ) param;
        
        // getting the number of circuits
        for( int i = 0; i < cricuitsNodes.getLength(); i++ ){
            Node node = cricuitsNodes.item( i );
            if( !node.getNodeName().equals( "#text" ) ) {
                NamedNodeMap attributes = node.getAttributes();
                
                String name = "";
                
                String path = "";
                
                String parentName = "";
                
                int access = 0;
                
                for( int j = 0; j < attributes.getLength(); j ++ ) {
                    
                    Node attrNode = attributes.item( j );
                    
                    String nodeName = attrNode.getNodeName().toLowerCase();
                    
                    if( nodeName.equals( "name" ) ) {
                        name = attrNode.getNodeValue();
                    }
                    
                    if( nodeName.equals( "path" ) ) {
                        path = attrNode.getNodeValue();
                    }
                    
                    if( nodeName.equals( "parent" ) ) {
                        parentName = attrNode.getNodeValue();
                    }
                    
                    if( nodeName.equals( "access" ) ) {
                        if( attrNode.getNodeValue().equals( "public" ) || attrNode.getNodeValue().equals( "" ) ) {
                            access = 0;
                        }
                        else if( attrNode.getNodeValue().equals( "internal" ) ) {
                            access = 1;
                        }
                    }
                    
                }
                
                Circuit circuit = null;
                
                if( parentName.equals( "" ) ) {
                    circuit = new Circuit( name, path, access );
                }
                else{
                    circuit = new Circuit( name, path, access, parentName );
                }
                
                getContext().getApplication().addCircuit( circuit );
            }
        }
        
        
        getContext().getApplication().linkCircuits();
        
        for( Circuit circuit : getContext().getApplication().getCircuits() ) {
            
            System.out.println( circuit.toString() );
        }
        
        
    }
    
}