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

import java.applet.Applet;
import java.awt.Graphics;
import java.awt.image.BufferedImage;
import java.awt.print.PrinterException;
import java.io.ByteArrayInputStream;
import java.io.ByteArrayOutputStream;
import java.io.IOException;
import java.io.InputStream;
import java.io.UnsupportedEncodingException;
import java.net.URL;
import java.net.URLConnection;
import java.nio.ByteBuffer;
import java.nio.charset.Charset;
import java.nio.charset.IllegalCharsetNameException;
import java.security.AccessController;
import java.security.PrivilegedActionException;
import java.security.PrivilegedExceptionAction;
import java.util.LinkedList;
import java.util.concurrent.atomic.AtomicReference;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.imageio.ImageIO;
import javax.print.PrintException;
import javax.print.PrintService;
import javax.print.PrintServiceLookup;
import jssc.SerialPortException;
import jzebra.exception.NullCommandException;
import jzebra.exception.NullPrintServiceException;
import jzebra.exception.SerialException;
import jzebra.json.JSONArray;
import netscape.javascript.JSObject;

/**
 * An invisible web applet for use with JavaScript functions to send
 * raw commands to your thermal, receipt, shipping, barcode, card printer and
 * much more.
 * @author  A. Tres Finocchiaro
 */
public class PrintApplet extends Applet implements Runnable {

    private static final AtomicReference<Thread> thisThread = new AtomicReference<Thread>(null);
    public static final String VERSION = "1.6.0";
    private static final long serialVersionUID = 2787955484074291340L;
    public static final int APPEND_XML = 1;
    public static final int APPEND_RAW = 2;
    public static final int APPEND_IMAGE = 3;
    public static final int APPEND_IMAGE_PS = 4;
    public static final int APPEND_PDF = 8;
    public static final int APPEND_HTML = 16;
    private LanguageType lang;
    private int appendType;
    private long sleep;
    private PrintService ps;
    private PrintRaw printRaw;
    private SerialIO serialIO;
    private PrintPostScript printPS;
    private PrintHTML printHTML;
    private Throwable t;
    private PaperFormat paperSize;
    private boolean startFindingPrinters;
    private boolean doneFindingPrinters;
    private boolean startPrinting;
    private boolean donePrinting;
    private boolean startAppending;
    private boolean doneAppending;
    private boolean startFindingPorts;
    private boolean doneFindingPorts;
    private boolean startSending;
    private boolean doneSending;
    private boolean autoSetSerialProperties = false;
    private boolean startOpeningPort;
    private boolean doneOpeningPort;
    private boolean startClosingPort;
    private boolean doneClosingPort;
    private String serialPortName;
    private int serialPortIndex = -1;
    private boolean running;
    private boolean reprint;
    private boolean psPrint;
    private boolean htmlPrint;
    private boolean alternatePrint;
    private boolean logFeaturesPS;
    private int imageX = 0;
    private int imageY = 0;
    
    private boolean allowMultiple;
    //private double[] psMargin;
    private String jobName;
    private String file;
    private String xmlTag;
    private String printer;
    //private String orientation;
    //private Boolean maintainAspect;
    private Integer copies;
    private Charset charset = Charset.defaultCharset();
    //private String pageBreak; // For spooling pages one at a time
    private int documentsPerSpool = 0;
    private String endOfDocument;
//    private String manualBreak = "%/SPOOL/%";

    /**
     * Create a privileged thread that will listen for JavaScript events
     * @since 1.1.7
     */
    //@Override
    public void run() {
        logStart();
        try {
            AccessController.doPrivileged(new PrivilegedExceptionAction<Object>() {
                //@Override

                public Object run() throws Exception {

                    startJavaScriptListener();
                    return null;
                }
            });
        } catch (PrivilegedActionException e) {
            LogIt.log("Error starting main JavaScript thread.  All else will fail.", e);
            set(e);
        } finally {
            logStop();
        }
    }


    /**
     * Starts the Applet and runs the JavaScript listener thread
     */
    private void startJavaScriptListener() {
        notifyBrowser("jzebraReady");
        while (running) {
            try {
                Thread.sleep(sleep);  // Wait 100 milli before running again
                if (startAppending) {
                    try {
                        switch (appendType) {
                            case APPEND_HTML:
                                appendHTML(new String(FileUtilities.readRawFile(file), charset.name()));
                            case APPEND_XML:
                                append64(FileUtilities.readXMLFile(file, xmlTag));
                                break;
                            case APPEND_RAW:
                                getPrintRaw().append(FileUtilities.readRawFile(file));
                                break;
                            case APPEND_IMAGE_PS:
                                readImage();
                                break;
                            case APPEND_IMAGE:
                                BufferedImage bi;
                                ImageWrapper iw;
                                if (isBase64Image(file)) {
                                    byte[] imageData = Base64.decode(file.split(",")[1]);
                                    bi = ImageIO.read(new ByteArrayInputStream(imageData));
                                } else {
                                    bi = ImageIO.read(new URL(file));
                                }
                                iw = new ImageWrapper(bi, lang);
                                iw.setCharset(charset);
                                iw.setxPos(imageX);
                                iw.setyPos(imageY);
                                getPrintRaw().append(iw.getImageCommand());
                                break;
                            case APPEND_PDF:
                                readBinaryFile();
                                break;
                            default: // Do nothing
                        }
                    } catch (Throwable t) {
                        LogIt.log("Error appending data", t);
                        set(t);
                    }
                    startAppending = false;
                    setDoneAppending(true);
                }
                if (startFindingPorts) {
                    logFindPorts();
                    startFindingPorts = false;
                    getSerialIO().fetchSerialPorts();
                    setDoneFindingPorts(true);
                }
                if (startOpeningPort) {
                    logOpeningPort();
                    startOpeningPort = false;
                    try {
                        if (serialPortIndex != -1) {
                            getSerialIO().open(serialPortIndex);
                        } else {
                            getSerialIO().open(serialPortName);
                        }
                        // Currently a Windows-only feature
                        if (autoSetSerialProperties) {
                            getSerialIO().autoSetProperties();
                        }
                    } catch (Throwable t) {
                        //notifyBrowser("jzebraPortNotOpened", getSerialIO().getPortName());
                        set(t);
                    }
                    setDoneOpeningPort(true);
                }
                if (startClosingPort) {
                    logClosingPort();
                    startClosingPort = false;
                    try {
                        getSerialIO().close();
                    } catch (SerialPortException ex) {
                        this.set(ex);
                    }
                    setDoneClosingPort(true);
                }
                if (startFindingPrinters) {
                    logFindPrinter();
                    startFindingPrinters = false;
                    if (printer == null) {
                        PrintApplet.this.setPrintService(PrintServiceLookup.lookupDefaultPrintService());
                    } else {
                        PrintApplet.this.setPrintService(PrintServiceMatcher.findPrinter(printer));
                    }
                    setDoneFindingPrinters(true);
                }
                // Serial Port Stuff
                if (startSending) {
                    try {
                        startSending = false;
                        logCommands(new String(getSerialIO().getInputBuffer().getByteArray(), charset.name()));
                        getSerialIO().send();
                        doneSending = true;
                    } catch (Throwable t) {
                        this.set(t);
                    }
                }
                if (serialIO != null && serialIO.getOutput() != null) {
                    try {
                        notifyBrowser("jzebraSerialReturned", 
                                new Object[]{serialIO.getPortName(),
                                    new String(serialIO.getOutput(),charset.name())}, false);
                    } catch (UnsupportedEncodingException ex) {
                        this.set(ex);
                    }
                    serialIO.clearOutput();
                }
                if (startPrinting) {
                    logPrint();
                    try {
                        startPrinting = false;
                        //PrintApplet.this.setPrintService(ps);

                        if (htmlPrint) {
                            logAndPrint(getPrintHTML());
                        } else if (psPrint) {
                            logAndPrint(getPrintPS());
                        } else if (isRawAutoSpooling()) {
                            LinkedList<ByteArrayBuilder> pages = ByteUtilities.splitByteArray(
                                    getPrintRaw().getByteArray(), 
                                    endOfDocument.getBytes(charset.name()), 
                                    documentsPerSpool);
                            //FIXME:  Remove this debug line
                            LogIt.log(Level.INFO, "Automatically spooling to " + 
                                    pages.size() + " separate print job(s)");
                            
                            for (ByteArrayBuilder b : pages) {
                                logAndPrint(getPrintRaw(), b.getByteArray());
                            }
                            
                            if (!reprint) {
                                getPrintRaw().clear();
                            }
                            //String[] split = getPrintRaw().get().split(endOfDocument);
                            //ByteArrayBuilder bytes = getPrintRaw().getByteArray();
                            /*byte[] endSentinal = endOfDocument.getBytes(charset.name());
                            int[] split = getPrintRaw().indicesOfSublist(endSentinal);
                            int currentPage = 1;
                            int currentByte = 0;
                            //getPrintRaw().clear();
                            for (int i : split) {
                                //LogIt.log("" + i);
                                if (currentPage < documentsPerSpool) {
                                    currentPage++;
                                } else {
                                    logAndPrint(getPrintRaw(), currentByte, i + endSentinal.length);
                                    currentPage = 1;
                                    currentByte = i + endSentinal.length + 1;
                                }
                            }
                            
                            if (!reprint) {
                                getPrintRaw().clear();
                            }

                            /*if (!getPrintRaw().isClear()) {
                                logAndPrint(getPrintRaw());
                            }*/

                        } else {
                            logAndPrint(getPrintRaw());
                        }
                    } catch (PrintException e) {
                        set(e);
                    } catch (PrinterException e) {
                        set(e);
                    } catch (UnsupportedEncodingException e) {
                        set(e);
                    } catch (IOException e) {
                        set(e);
                    } finally {
                        setDonePrinting(true);
                        getPrintRaw().clear();
                    }
                }
            } catch (InterruptedException e) {
                set(e);
            }
        }
    }
    
    public void useAlternatePrinting() {
        this.useAlternatePrinting(true);
    }
    
    public void useAlternatePrinting(boolean alternatePrint) {
        this.alternatePrint = alternatePrint;
    }
    
    public boolean isAlternatePrinting() {
        return this.alternatePrint;
    }

    private boolean isRawAutoSpooling() throws UnsupportedEncodingException {
        return documentsPerSpool > 0 && endOfDocument != null && !getPrintRaw().isClear() && getPrintRaw().contains(endOfDocument);
    }

    private void setDonePrinting(boolean donePrinting) {
        this.donePrinting = donePrinting;
        this.notifyBrowser("jzebraDonePrinting");
    }

    private void setDoneFindingPrinters(boolean doneFindingPrinters) {
        this.doneFindingPrinters = doneFindingPrinters;
        this.notifyBrowser("jzebraDoneFinding", true);
        this.notifyBrowser("jzebraDoneFindingPrinters", false);
    }
    
    private void setDoneOpeningPort(boolean doneOpeningPort) {
        this.doneOpeningPort = doneOpeningPort;
        this.notifyBrowser("jzebraDoneOpeningPort", getSerialIO().getPortName());
    }
    
    private void setDoneClosingPort(boolean doneClosingPort) {
        this.doneClosingPort = doneClosingPort;
        this.notifyBrowser("jzebraDoneClosingPort", serialPortName);
    }
    
    private void setDoneFindingPorts(boolean doneFindingPorts) {
        this.doneFindingPorts = doneFindingPorts;
        this.notifyBrowser("jzebraDoneFindingPorts", false);
    }

    private void setDoneAppending(boolean doneAppending) {
        this.doneAppending = doneAppending;
        this.notifyBrowser("jzebraDoneAppending");
    }
    
    public void logPostScriptFeatures(boolean logFeaturesPS) {
        setLogPostScriptFeatures(logFeaturesPS);
    }
    
    public void setLogPostScriptFeatures(boolean logFeaturesPS) {
        this.logFeaturesPS = logFeaturesPS;
        LogIt.log("Console logging of PostScript printing features set to \"" + logFeaturesPS + "\"");
    }
    
    public boolean getLogPostScriptFeatures() {
        return this.logFeaturesPS;
    }

    private void processParameters() {
        jobName = "jZebra ___ Printing";
        running = true;
        startPrinting = false;
        donePrinting = true;
        startFindingPrinters = false;
        doneFindingPrinters = true;
        startFindingPorts = false;
        doneFindingPorts = true;
        startSending = false;
        doneSending = true;
        startAppending = false;
        doneAppending = true;
        sleep = getParameter("sleep", 100);
        psPrint = false;
        appendType = 0;
        allowMultiple = false;
        logFeaturesPS = false;
        alternatePrint = false;
        String printer = getParameter("printer", null);
        if (printer != null) {
            findPrinter(printer);
        }
    }

    public void notifyBrowser(String function, String s) {
        notifyBrowser(function, new Object[]{s}, false);
    }
    
    // Call JavaScript function (i.e. "jzebraReady()" from the web browser
    public void notifyBrowser(String function, Object[] o, boolean silent) {
        try {
            JSObject.getWindow(this).call(function, o);
        } catch (Exception e) {
            if (!silent) {
                LogIt.log(Level.WARNING, "Tried calling JavaScript function \"" + function
                    + "\" through web browser but it has not been implemented (" + e.getLocalizedMessage() + ")");
            }
        }
    }
    
    private void notifyBrowser(String function) {
        notifyBrowser(function, new Object[]{null}, false);
    }
    
    
    private void notifyBrowser(String function, boolean silent) {
        notifyBrowser(function, new Object[]{null}, silent);
    }
    
    

    /**
     * Overrides getParameter() to allow all upper or all lowercase parameter names
     * @param name
     * @return
     */
    private String getParameter(String name, String defaultVal) {
        if (name != null) {
            try {
                String retVal = super.getParameter(name);
                retVal = isBlank(retVal) ? super.getParameter(name.toUpperCase()) : retVal;
                return isBlank(retVal) ? defaultVal : retVal;
            } catch (NullPointerException e) {
                return defaultVal;
            }
        }
        return defaultVal;
    }

    /**
     * Same as <code>getParameter(String, String)</code> except for a <code>long</code>
     * type.
     * @param name
     * @param defaultVal
     * @return
     */
    private long getParameter(String name, long defaultVal) {
        return Long.parseLong(getParameter(name, "" + defaultVal));
    }

    /**
     * Returns true if given String is empty or null
     * @param s
     * @return
     */
    private boolean isBlank(String s) {
        return s == null || s.trim().equals("");
    }

    public String getPrinters() {
        return PrintServiceMatcher.getPrinterListing();
    }
    
    public String getPorts() {
        return getSerialIO().getSerialPorts();
    }

    /**
     * Tells jZebra to spool a new document when the raw data matches
     * <code>pageBreak</code>
     * @param pageBreak
     */
    //   @Deprecated
    //   public void setPageBreak(String pageBreak) {
    //       this.pageBreak = pageBreak;
    //   }
    public void append64(String base64) {
        try {
            getPrintRaw().append(Base64.decode(base64));
        } catch (IOException e) {
            set(e);
        }
    }

    public void appendHTMLFile(String url) {
        this.appendType = APPEND_HTML;
        this.appendFromThread(url, appendType);
        //throw new UnsupportedOperationException("Sorry, not yet supported.");
    }

    public void appendHtmlFile(String url) {
        this.appendHTMLFile(url);
    }

    public void appendHtml(String html) {
        this.appendHTML(html);
    }

    public void appendHTML(String html) {
        getPrintHTML().append(html);
    }

    /**
     * Gets the first xml node identified by <code>tagName</code>, reads its
     * contents and appends it to the buffer.  Assumes XML content is base64
     * formatted.
     * 
     * @param xmlFile
     * @param tagName
     */
    public void appendXML(String url, String xmlTag) {
        appendFromThread(url, APPEND_XML);
        //this.startAppending = true;
        //this.doneAppending = false;
        //this.appendType = APPEND_XML;
        //this.file = xmlFile;
        this.xmlTag = xmlTag;
    }

    /**
     * Appends the entire contents of the specified file to the buffer
     * @param rawDataFile
     */
    public void appendFile(String url) {
        appendFromThread(url, APPEND_RAW);
    }

    /**
     * 
     * @param imageFile
     */
    public void appendImage(String url) {
        appendFromThread(url, APPEND_IMAGE_PS);
    }

    public void appendPDF(String url) {
        appendFromThread(url, APPEND_PDF);
    }
    
    public void setLanguage(String lang) {
        this.lang = LanguageType.getType(lang);
    }

    /**
     * Appends a raw image from URL specified in the language format specified. 
     * @param imageFile
     * @param lang 
     */
    public void appendImage(String imageFile, String lang) {
        setLanguage(lang);
        appendFromThread(imageFile, APPEND_IMAGE);
    }
    
    /**
     * Appends a raw image from URL specified in the language format specified. 
     * For CPCL and EPL, x and y coordinates should *always* be supplied.  If they
     * are not supplied, they will default to position 0,0.
     * @param imageFile
     * @param lang
     * @param image_x
     * @param image_y 
     */
    public void appendImage(String imageFile, String lang, int image_x, int image_y) {
        this.imageX = image_x;
        this.imageY = image_y;
        appendImage(imageFile, lang);
    }

    /**
     * Appends a file of the specified type
     * @param url
     * @param appendType
     */
    private void appendFromThread(String file, int appendType) {
        this.startAppending = true;
        this.doneAppending = false;
        this.appendType = appendType;
        this.file = file;
    }
    
    /**
     * Returns the orientation as it has been recently defined.  Default is null
     * which will allow the printer configuration to decide.
     * @return 
     */
    public String getOrientation() {
        return this.paperSize.getOrientationDescription();
    }

    /*
    // Due to applet security, can only be invoked by run() thread
    private String readXMLFile() {
        try {
            DocumentBuilderFactory dbf = DocumentBuilderFactory.newInstance();
            DocumentBuilder db;
            Document doc;
            db = dbf.newDocumentBuilder();
            doc = db.parse(file);
            doc.getDocumentElement().normalize();
            LogIt.log("Root element " + doc.getDocumentElement().getNodeName());
            NodeList nodeList = doc.getElementsByTagName(xmlTag);
            if (nodeList.getLength() > 0) {
                return nodeList.item(0).getTextContent();
            } else {
                LogIt.log("Node \"" + xmlTag + "\" could not be found in XML file specified");
            }
        } catch (Exception e) {
            LogIt.log(Level.WARNING, "Error reading/parsing specified XML file", e);
        }
        return "";
    }
    */

    public void printToFile() {
        printToFile(null);
    }
    
    public void printToHost(String host) {
        printToHost(host, 9100);
    }
    
    public void printToHost(String host, String port) {
        try {
            printToHost(host, Integer.parseInt(host));
        } catch (Throwable t) {
            this.set(t);
        }
    }
    
    public void printToHost(String host, int port) {
        if (!ByteUtilities.isBlank(host) && port > 0) {
            getPrintRaw().setOutputSocket(host, port);
        } else {
            this.set(new NullPrintServiceException("Invalid port or host specified.  "
                    + "Port values must be non-zero posistive integers.  "
                    + "Host values must not be empty"));
        }
        this.print();
    }

    public void printToFile(String outputPath) {
        if (!ByteUtilities.isBlank(outputPath)) {
            getPrintRaw().setOutputPath(outputPath);
        } else {
            this.set(new NullPrintServiceException("Blank output path supplied"));
        }
        this.print();
    }

    // Due to applet security, can only be invoked by run() thread
    private void readImage() {
        try {
            // Use the in-line base64 content as our image
            if (isBase64Image(file)) {
                getPrintPS().setImage(Base64.decode(file.split(",")[1]));
            } else {
                getPrintPS().setImage(ImageIO.read(new URL(file)));
            }
        } catch (IOException ex) {
            LogIt.log(Level.WARNING, "Error reading specified image", ex);
        }
    }

    private boolean isBase64Image(String path) {
        return path.startsWith("data:image/") && path.contains(";base64,");
    }

    // Use this instead of calling p2d directly.  This will allow 2d graphics
    // to only be used when absolutely needed
    private PrintPostScript getPrintPS() {
        if (this.printPS == null) {
            this.printPS = new PrintPostScript();
            this.printPS.setPrintParameters(this);
        }
        return printPS;
    }

    private PrintHTML getPrintHTML() {
        if (this.printHTML == null) {
            this.printHTML = new PrintHTML();
            this.printHTML.setPrintParameters(this);
        }
        return printHTML;
    }

    /*
    public double[] getPSMargin() {
    return psMargin;
    }
    
    public void setPSMargin(int psMargin) {
    this.psMargin = new double[]{psMargin};
    }
    
    public void setPSMargin(double psMargin) {
    this.psMargin = new double[]{psMargin};
    }
    
    public void setPSMargin(int top, int left, int bottom, int right) {
    this.psMargin = new double[]{top, left, bottom, right};
    }
    
    public void setPSMargin(double top, double left, double bottom, double right) {
    this.psMargin = new double[]{top, left, bottom, right};
    }*/
    /**
     * Reads a binary file (i.e. PDF) from URL to a ByteBuffer.  This is later appended
     * to the applet, but needs a renderer capable of printing it to PostScript
     * @return
     * @throws IOException 
     */
    public void readBinaryFile() {
        ByteBuffer data = null;
        try {
            URLConnection con = new URL(file).openConnection();
            InputStream in = con.getInputStream();
            int size = con.getContentLength();

            ByteArrayOutputStream out;
            if (size != -1) {
                out = new ByteArrayOutputStream(size);
            } else {
                out = new ByteArrayOutputStream(20480); // Pick some appropriate size
            }

            byte[] buffer = new byte[512];
            while (true) {
                int len = in.read(buffer);
                if (len == -1) {
                    break;
                }
                out.write(buffer, 0, len);
            }
            in.close();
            out.close();

            byte[] array = out.toByteArray();

            //Lines below used to test if file is corrupt
            //FileOutputStream fos = new FileOutputStream("C:\\abc.pdf");
            //fos.write(array);
            //fos.close();

            data = ByteBuffer.wrap(array);

        } catch (Exception e) {
            LogIt.log(Level.WARNING, "Error reading/parsing specified PDF file", e);
        }

        getPrintPS().setPDF(data);

    }

    /*
    // Due to applet security, can only be invoked by run() thread
    private String readRawFile() {
        String rawData = "";
        try {
            byte[] buffer = new byte[512];
            DataInputStream in = new DataInputStream(new URL(file).openStream());
            //String inputLine;
            while (true) {
                int len = in.read(buffer);
                if (len == -1) {
                    break;
                }
                rawData += new String(buffer, 0, len, charset.name());
            }
            in.close();
        } catch (Exception e) {
            LogIt.log(Level.WARNING, "Error reading/parsing specified RAW file", e);
        }
        return rawData;
    }*/

    /**
     * Prints the appended data without clearing the print buffer afterward.
     */
    public void printPersistent() {
        startPrinting = true;
        donePrinting = false;
        reprint = true;
    }
    
    /**
     * Appends raw hexadecimal bytes in the format "x1Bx00", etc.
     * @param s 
     */
    public void appendHex(String s) {
        try {
            getPrintRaw().append(ByteUtilities.hexStringToByteArray(s));
        } catch (NumberFormatException e) {
            this.set(e);
        }
    }

    /**
     * Interprets the supplied JSON formatted <code>String</code> value 
     * into a <code>byte</code> array or a <code>String</code> array.
     * @param s 
     */
    public void appendJSONArray(String s) {
        JSONArray array = new JSONArray(s);
        if (array == null || array.length() < 0) {
            this.set(new NullCommandException("Empty or null JSON Array provided.  "
                    + "Cannot append raw data."));
            return;
        } else {
            Object o = array.get(0);
            if (o instanceof Integer) {
                LogIt.log("Interpreting JSON data as Integer array.  "
                        + "Will automatically convert to bytes.");
                byte[] b = new byte[array.length()];
                for (int i = 0; i < b.length; i++) {
                    if (!array.isNull(i)) {
                        b[i] = (byte)array.getInt(i);
                    } else {
                        LogIt.log(Level.WARNING, "Cannot parse null byte value.  "
                                + "Defaulting to 0x00");
                        b[i] = (byte)0;
                    }
                }
                getPrintRaw().append(b);
            } else if (o instanceof String) {
                LogIt.log("Interpreting JSON data as String array");
                for (int i = 0; i < array.length(); i++) {
                    if (!array.isNull(i)) {
                        try {
                            getPrintRaw().append(array.getString(i));
                        } catch (UnsupportedEncodingException e) {
                            LogIt.log(Level.WARNING, "String encoding exception "
                                    + "occured while parsing JSON.", e);
                        }
                    } else {
                        LogIt.log(Level.WARNING, "Cannot parse null String value.  "
                                + "Defaulting to blank");
                    }
                }
            }  else {
                this.set(new NullCommandException("JSON Arrays of type " + 
                        o.getClass().getName() + " are not yet supported"));
            }
        }
    }
    
    public void append(String s) {
        try {
            // Fix null character for ESC/P syntax
            /*if (s.contains("\\x00")) {
                LogIt.log("Replacing \\\\x00 with NUL character");
                s = s.replace("\\x00", NUL_CHAR);
            } else if (s.contains("\\0")) {
                LogIt.log("Replacing \\\\0 with NUL character");
                s = s.replace("\\0", NUL_CHAR);
            } */
            
            // JavaScript hates the NUL, perhaps we can allow the excaped version?
            /*if (s.contains("\\x00")) {
                String[] split = s.split("\\\\\\\\x00");
                for (String ss : split) {
                    getPrintRaw().append(ss.getBytes(charset.name()));
                    getPrintRaw().append(new byte[]{'\0'});
                }
            } else {
                getPrintRaw().append(s.getBytes(charset.name()));
            }*/
            getPrintRaw().append(s.getBytes(charset.name()));
        } catch (UnsupportedEncodingException ex) {
            this.set(ex);
        }
    }
    
    /*
     * Makes appending the unicode null character possible by appending 
     * the equivelant of <code>\x00</code> in JavaScript, which is syntatically
     * invalid in JavaScript (no errors will be thrown, but Strings will be 
     * terminated prematurely
     */
    public void appendNull() {
        getPrintRaw().append(new byte[]{'\0'});
    }
    
    public void appendNUL() {
        appendNull();
    }
    
    public void appendNul() {
        appendNull();
    }
 
    /**
     * Replaces a String with the specified value. PrintRaw only.
     * @param tag
     * @param value 
     *
    public void replace(String tag, String value) {
        replaceAll(tag, value);
    }*/

    /**
     * Replaces a String with the specified value.  PrintRaw only.
     * @param tag
     * @param value 
     *
    public void replaceAll(String tag, String value) {
        getPrintRaw().set(printRaw.get().replaceAll(tag, value));
    }
    */

    /**
     * Replaces the first occurance of a String with a specified value.  PrintRaw only.
     * @param tag
     * @param value 
     *
    public void replaceFirst(String tag, String value) {
        getPrintRaw().set(printRaw.get().replaceFirst(tag, value));
    }*/

    /**
     * Sets/overwrites the cached raw commands.  PrintRaw only.
     * @param s 
     *
    public void set(String s) {
        getPrintRaw().set(s);
    }*/

    /**
     * Clears the cached raw commands.  PrintRaw only.
     */
    public void clear() {
        getPrintRaw().clear();
    }

    /**
     * Performs an asyncronous print and handles the output of exceptions and
     * debugging.  Important:  print() clears any raw buffers after printing.  Use
     * printPersistent() to save the buffer to be used/appended to later.
     */
    public void print() {
        startPrinting = true;
        donePrinting = false;
        reprint = false;
    }

    public void printHTML() {
        htmlPrint = true;
        print();
    }

    public void printPS() {
        psPrint = true;
        print();
    }

    /**
     * Get our main thread ready, but don't start it until <code>start()</code>
     * has been called.
     */
    @Override
    public void init() {
        if (!allowMultiple && thisThread.get() != null && thisThread.get().isAlive()) {
            LogIt.log(Level.WARNING, "init() called, but applet already "
                    + "seems to be running.  Ignoring.");
            return;
        }
        if (allowMultiple && thisThread.get() != null && thisThread.get().isAlive()) {
            LogIt.log(Level.INFO, "init() called, but applet already "
                    + "seems to be running.  Allowing.");
        }
        processParameters();
        thisThread.set(new Thread(this));   
        super.init();
    }
    
    /**
     * No need to paint, the applet is invisible
     * @param g 
     */
    @Override
    public void paint(Graphics g) {
        // Do nothing
    }

    
    /**
     * Start our main thread
     */
    @Override
    public void start() {
        try {
            thisThread.get().start();
        } catch (Exception e) {
            set(e);
        }
        super.start();
    }
    
    @Override
    public void stop() {
        running = false;
        thisThread.set(null);
        if (serialIO != null) {
            try {
                serialIO.close();
            } catch (SerialPortException ex) {
                LogIt.log(Level.SEVERE, "Could not close port [" + serialIO.getPortName() + "].", ex);
            }
        }
        super.stop();
    }

    @Override
    public void destroy() {
        this.stop();
        super.destroy();
    }
    
    public void findPrinter() {
        findPrinter(null);
    }

    /**
     * Creates the print service by iterating through printers until finding
     * matching printer containing "printerName" in its description
     * @param printerName
     * @return
     */
    public void findPrinter(String printer) {
        this.startFindingPrinters = true;
        this.doneFindingPrinters = false;
        this.printer = printer;
    }
    
    /**
     * Uses the JSSC JNI library to retreive a comma separated list of serial
     * ports from the system, i.e. "COM1,COM2,COM3" or "/dev/tty0,/dev/tty1",
     * etc.
     */
    public void findPorts() {
        this.startFindingPorts = true;
        this.doneFindingPorts = false;
    }
    
    public void setSerialBegin(String begin) {
        try {
            getSerialIO().setBegin(begin.getBytes(charset.name()));
        } catch (UnsupportedEncodingException ex) {
            this.set(ex);
        }
    }
    
    public void setSerialEnd(String end) {
        try {
            getSerialIO().setEnd(end.getBytes(charset.name()));
        } catch (UnsupportedEncodingException ex) {
            this.set(ex);
        }
    }
    
    public void send(String portName, String data) {
        try {
            if (!getSerialIO().isOpen()) {
                throw new SerialException("A port has not yet been opened.");
            }
            else if (getSerialIO().getPortName().equals(portName)) {
                getSerialIO().append(data.getBytes(charset.name()));
                this.startSending = true;
                this.doneSending = false;
            } else {
                throw new SerialException("Port specified [" + portName + "] "
                        + "differs from previously opened port "
                        + "[" + getSerialIO().getPortName() + "].  Applet currently "
                        + "supports only one open port at a time.  Data not sent.");
            }
        } catch (Throwable t) {
            this.set(t);
        }
    }
    
    public void sendHex(String portName, String data) {
        try {
            send(portName, new String(ByteUtilities.hexStringToByteArray(data), charset.name()));
        } catch (UnsupportedEncodingException ex) {
            this.set(ex);
        }
    }
    
    public void setSerialProperties(int baud, int dataBits, String stopBits, int parity, String flowControl) {
        setSerialProperties(Integer.toString(baud), Integer.toString(dataBits), 
                stopBits, Integer.toString(parity), flowControl);
    }
        
    public void setSerialProperties(String baud, String dataBits, String stopBits, String parity, String flowControl) {
        try {
            getSerialIO().setProperties(baud, dataBits, stopBits, parity, flowControl);
        } catch (SerialPortException e) {
            this.set(e);
        }
    }
    
    public void openPort(String serialPortName) {
        this.openPort(serialPortName, false);
    }
    
    public void closePort(String portName) {
        if (getSerialIO().getPortName().equals(portName)) {
            this.startClosingPort = true;
            this.doneClosingPort = false;
        } else {
            this.set(new SerialException("Port specified [" + portName + "] "
                + "could not be closed. Please close "
                + "[" + getSerialIO().getPortName() + "] instead. "
                + "Applet currently supports only one open port at a time."));
        }
    }
    
    public void openPort(String serialPortName, boolean autoSetSerialProperties) {
        this.serialPortIndex = -1;
        this.serialPortName = serialPortName;
        this.startOpeningPort = true;
        this.doneOpeningPort = false;
        this.autoSetSerialProperties = autoSetSerialProperties;
    }
    
    public void openPort(int serialPortIndex) {
        this.openPort(serialPortIndex, false);
    }
    
    public void openPort(int serialPortIndex, boolean autoSetSerialProperties) {
        this.serialPortName = null;
        this.serialPortIndex = serialPortIndex;
        this.startOpeningPort = true;
        this.doneOpeningPort = false;
    }

    public boolean isDoneFinding() {
        return doneFindingPrinters;
    }
    
    public boolean isDoneFindingPorts() {
        return doneFindingPorts;
    }
    
    public boolean isDoneOpeningPort() {
        return doneOpeningPort;
    }
    
    public boolean isDoneClosingPort() {
        return doneClosingPort;
    }
    
    public boolean isDonePrinting() {
        return donePrinting;
    }

    public boolean isDoneAppending() {
        return doneAppending;
    }
    
    public boolean isDoneSending() {
        return doneSending;
    }

    /**
     * Returns the PrintService's name (the printer name) associated with this
     * applet, if any.  Returns null if none is set.
     * @return
     */
    public String getPrinter() {
        return ps == null ? null : ps.getName();
        //return ps.getName();
    }
    
    public SerialIO getSerialIO() {
        if (this.serialIO == null) {
            this.serialIO = new SerialIO();
        }
        return serialIO;
    }

    /**
     * Returns the PrintRaw object associated with this applet, if any.  Returns
     * null if none is set.
     * @return
     */
    private PrintRaw getPrintRaw() {
        if (this.printRaw == null) {
            this.printRaw = new PrintRaw();
            this.printRaw.setPrintParameters(this);
        }
        return printRaw;
    }

    /**
     * Returns the PrintService object associated with this applet, if any.  Returns
     * null if none is set.
     * @return
     */
    public PrintService getPrintService() {
        return ps;
    }

    /**
     * Returns the PrintService's name (the printer name) associated with this
     * applet, if any.  Returns null if none is set.
     * @return
     */
    @Deprecated
    public String getPrinterName() {
        LogIt.log(Level.WARNING, "Function \"getPrinterName()\" has been deprecated since v. 1.2.3."
                + "  Please use \"getPrinter()\" instead.");
        return getPrinter();
    }

    public Throwable getError() {
        return getException();
    }

    public Throwable getException() {
        return t;
    }

    public void clearException() {
        this.t = null;
    }

    public String getExceptionMessage() {
        return t.getLocalizedMessage();
    }

    public long getSleepTime() {
        return sleep;
    }

    public String getVersion() {
        return VERSION;
    }

    /**
     * Sets the time the listener thread will wait between actions
     * @param sleep
     */
    public void setSleepTime(long sleep) {
        this.sleep = sleep;
    }

    public String getEndOfDocument() {
        return endOfDocument;
    }

    public void setEndOfDocument(String endOfPage) {
        this.endOfDocument = endOfPage;
    }

    public void setPrinter(int index) {
        setPrintService(PrintServiceMatcher.getPrinterList()[index]);
        LogIt.log("Printer set to index: " + index + ",  Name: " + ps.getName());

        //PrinterState state = (PrinterState)this.ps.getAttribute(PrinterState.class); 
        //return state == PrinterState.IDLE || state == PrinterState.PROCESSING;
    }

    // Generally called internally only after a printer is found.
    private void setPrintService(PrintService ps) {
        if (ps == null) {
            LogIt.log(Level.WARNING, "Ignoring null PrintService");
            return;
        }
        this.ps = ps;
        if (printHTML != null) {
            printHTML.setPrintService(ps);
        }
        if (printPS != null) {
            printPS.setPrintService(ps);
        }
        if (printRaw != null) {
            printRaw.setPrintService(ps);
        }
    }


    /*    public String getManualBreak() {
    return manualBreak;
    }*/

    /*    public void setManualBreak(String manualBreak) {
    this.manualBreak = manualBreak;
    }*/
    public int getDocumentsPerSpool() {
        return documentsPerSpool;
    }

    public void setDocumentsPerSpool(int pagesPer) {
        this.documentsPerSpool = pagesPer;
    }

    public void setJobName(String jobName) {
        this.jobName = jobName;
    }

    public String getJobName() {
        return jobName;
    }

    private void set(Throwable t) {
        this.t = t;
        LogIt.log(t);
    }

    private void logStart() {
        LogIt.log("jZebra " + VERSION);
        LogIt.log("===== JAVASCRIPT LISTENER THREAD STARTED =====");
    }

    private void logStop() {
        LogIt.log("===== JAVASCRIPT LISTENER THREAD STOPPED =====");
    }

    private void logPrint() {
        LogIt.log("===== SENDING DATA TO THE PRINTER =====");
    }

    private void logFindPrinter() {
        LogIt.log("===== SEARCHING FOR PRINTER =====");
    }
    
    private void logFindPorts() {
        LogIt.log("===== SEARCHING FOR SERIAL PORTS =====");
    }
    
    private void logOpeningPort() {
        LogIt.log("===== OPENING SERIAL PORT " + serialPortName + " =====");
    }
    
    private void logClosingPort() {
        LogIt.log("===== CLOSING SERIAL PORT " + serialPortName + " =====");
    }

    private void logCommands(PrintHTML ph) {
        logCommands(ph.get());
    }

    private void logCommands(PrintRaw pr) {
        logCommands(pr.getOutput());
    }
    
    private void logCommands(byte[] commands) {
        try {
            logCommands(new String(commands, charset.name()));
        } catch (UnsupportedEncodingException ex) {
            LogIt.log(Level.WARNING, "Cannot decode raw bytes for debug output. "
                    + "This could be due to incompatible charset for this JVM "
                    + "or mixed charsets within one byte stream.  Ignore this message"
                    + " if printing seems fine.");
        }
    }

    private void logCommands(String commands) {
        LogIt.log("\r\n\r\n" + commands + "\r\n\r\n");
    }
    
    private void logAndPrint(PrintRaw pr, byte[] data) throws IOException, InterruptedException, PrintException, UnsupportedEncodingException{
        logCommands(data);
        pr.print(data);
    }

    private void logAndPrint(PrintRaw pr) throws IOException, PrintException, InterruptedException, UnsupportedEncodingException {
        logCommands(pr);
        if (reprint) {
            pr.print();
        } else {
            pr.print();
            pr.clear();
        }
    }

    private void logAndPrint(PrintPostScript printPS) throws PrinterException {
        logCommands("    <<" + file + ">>");
        printPS.print();
        psPrint = false;
    }

    private void logAndPrint(PrintHTML printHTML) throws PrinterException {
        if (file != null) {
            logCommands("    <<" + file + ">>");
        }
        logCommands(printHTML);

        printHTML.print();
        htmlPrint = false;
    }

    /*private void logAndPrint(String commands) throws PrintException, InterruptedException, UnsupportedEncodingException {
        logCommands(commands);
        getPrintRaw().print(commands);
    }*/

    /**
     * Sets character encoding for raw printing only
     * @param charset 
     */
    public void setEncoding(String charset) {
        // Example:  Charset.forName("US-ASCII");
        System.out.println("Default charset encoding: " + Charset.defaultCharset().name());
        try {
            this.charset = Charset.forName(charset);
            getPrintRaw().setCharset(Charset.forName(charset));
            LogIt.log("Current applet charset encoding: " + this.charset.name());
        } catch (IllegalCharsetNameException e) {
            LogIt.log(Level.WARNING, "Could not find specified charset encoding: "
                    + charset + ". Using default.", e);
        }

    }

    public String getEncoding() {
        return this.charset.displayName();
    }

    public Charset getCharset() {
        return this.charset;
    }
    
    
    /**
     * Can't seem to get this to work, removed from sample.html
     * @param orientation
     *
    @Deprecated
    public void setImageOrientation(String orientation) {
        getPrintPS().setOrientation(orientation);
    }*/
    
    /**
     * Sets orientation (Portrait/Landscape) as to be picked up by PostScript 
     * printing only.  Some documents (such as PDFs) have capabilities of 
     * supplying their own orientation in the document format.  Some choose to 
     * allow the orientation to be defined by the printer definition (Advanced 
     * Printing Features, etc).
     * <p>Example:</p>
     * <code>setOrientation("landscape");</code>
     * <code>setOrientation("portrait");</code>
     * <code>setOrientation("reverse_landscape");</code>
     * @param orientation 
     */
    public void setOrientation(String orientation) {
        if (this.paperSize == null) {
            LogIt.log(Level.WARNING, "A paper size must be specified before setting orientation!");
        } else {
            this.paperSize.setOrientation(orientation);
        }
    }
    
    public void allowMultipleInstances(boolean allowMultiple) {
        this.allowMultiple = allowMultiple;
        LogIt.log("Allow multiple applet instances set to \"" + allowMultiple + "\"");
    }
    
    public void setAllowMultipleInstances(boolean allowMultiple) {
        allowMultipleInstances(allowMultiple);
    }
    
    public boolean getAllowMultipleInstances() {
        return allowMultiple;
    }

    /*public Boolean getMaintainAspect() {
        return maintainAspect;
    }*/
    
    public void setAutoSize(boolean autoSize) {
        if (this.paperSize == null) {
            LogIt.log(Level.WARNING, "A paper size must be specified before setting auto-size!");
        } else {
            this.paperSize.setAutoSize(autoSize);
        }
    }
    
    /*@Deprecated
    public void setMaintainAspect(boolean maintainAspect) {
        setAutoSize(maintainAspect);
    }*/
    
    public Integer getCopies() {
        return copies;
    }

    public void setCopies(int copies) {
        this.copies = Integer.valueOf(copies);
    } 
    
    public PaperFormat getPaperSize() {
        return paperSize;
    }
    
    public void setPaperSize(String width, String height) {
        this.paperSize = PaperFormat.parseSize(width, height);
        LogIt.log(Level.INFO, "Set paper size to " + paperSize.getWidth() + 
                paperSize.getUnitDescription() + "x" +  
                paperSize.getHeight()+ paperSize.getUnitDescription());
    }
    
    public void setPaperSize(float width, float height) {
        this.paperSize = new PaperFormat(width, height);
        LogIt.log(Level.INFO, "Set paper size to " + paperSize.getWidth() + 
                paperSize.getUnitDescription() + "x" +  
                paperSize.getHeight()+ paperSize.getUnitDescription());
    }
    
    public void setPaperSize(float width, float height, String units) {
        this.paperSize = PaperFormat.parseSize("" +width, ""+height, units);
        LogIt.log(Level.INFO, "Set paper size to " + paperSize.getWidth() + 
                paperSize.getUnitDescription() + "x" +  
                paperSize.getHeight()+ paperSize.getUnitDescription());
    }
    

}
