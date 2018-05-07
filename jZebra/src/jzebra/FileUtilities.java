/**
 * @author Tres Finocchiaro
 * 
 * Copyright (C) 2013 Tres Finocchiaro, QZ Industries
 *
 * IMPORTANT:  This software is dual-licensed
 * 
 * LGPL 2.1
 * This is free software.  This software and source code are released under 
 * the "LGPL 2.1 License".  A copy of this license should be distributed with 
 * this software. http://www.gnu.org/licenses/lgpl-2.1.html
 * 
 * QZ INDUSTRIES SOURCE CODE LICENSE
 * This software and source code *may* instead be distributed under the 
 * "QZ Industries Source Code License", available by request ONLY.  If source 
 * code for this project is to be made proprietary for an individual and/or a
 * commercial entity, written permission via a copy of the "QZ Industries Source
 * Code License" must be obtained first.  If you've obtained a copy of the 
 * proprietary license, the terms and conditions of the license apply only to 
 * the licensee identified in the agreement.  Only THEN may the LGPL 2.1 license
 * be voided.
 * 
 */
package jzebra;

import java.io.DataInputStream;
import java.io.IOException;
import java.net.URL;
import javax.xml.parsers.DocumentBuilder;
import javax.xml.parsers.DocumentBuilderFactory;
import javax.xml.parsers.ParserConfigurationException;
import jzebra.exception.NullCommandException;
import org.w3c.dom.DOMException;
import org.w3c.dom.Document;
import org.w3c.dom.NodeList;
import org.xml.sax.SAXException;

/**
 * Common static file i/o utilities
 * @author Tres Finocchiaro
 */
public class FileUtilities {
    public static byte[] readRawFile(String url) throws IOException {
        ByteArrayBuilder rawCmds = new ByteArrayBuilder();
        byte[] buffer = new byte[512];
        DataInputStream in = new DataInputStream(new URL(url).openStream());
        while (true) {
            int len = in.read(buffer);
            if (len == -1) {
                break;
            }
            byte[] temp = new byte[len];
            System.arraycopy(buffer, 0, temp, 0, len);
            rawCmds.append(temp);
        }
        in.close();

        return rawCmds.getByteArray();
    }
    
    /**
     * Reads an XML file from URL, searches for the tag specified by 
     * <code>dataTag</code> tag name and returns the <code>String</code> value
     * of that tag.
     * @param url
     * @param dataTag
     * @return
     * @throws DOMException
     * @throws IOException
     * @throws NullCommandException
     * @throws ParserConfigurationException
     * @throws SAXException 
     */
    public static String readXMLFile(String url, String dataTag) throws DOMException, 
            IOException, NullCommandException, ParserConfigurationException, SAXException{
            DocumentBuilderFactory dbf = DocumentBuilderFactory.newInstance();
            DocumentBuilder db;
            Document doc;
            db = dbf.newDocumentBuilder();
            doc = db.parse(url);
            doc.getDocumentElement().normalize();
            LogIt.log("Root element " + doc.getDocumentElement().getNodeName());
            NodeList nodeList = doc.getElementsByTagName(dataTag);
            if (nodeList.getLength() > 0) {
                return nodeList.item(0).getTextContent();
            }
            throw new NullCommandException("Node \"" + dataTag + "\" could not be found in XML file specified");
    }

}
