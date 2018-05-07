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

import java.awt.Color;
import java.awt.Graphics2D;
import java.awt.image.BufferedImage;
import java.io.ByteArrayOutputStream;
import java.io.IOException;
import java.net.MalformedURLException;
import java.net.URL;
import java.nio.charset.Charset;
import java.util.logging.Level;
import javax.imageio.ImageIO;
import javax.swing.ImageIcon;
import jzebra.exception.InvalidRawImageException;

public class ImageWrapperOld {
    public static byte[] getImage(ImageIcon i, LanguageType lang, Charset charset, int x, int y) throws InvalidRawImageException, IOException {
        ByteArrayBuilder b = new ByteArrayBuilder();
        int w = i.getIconWidth();
        int h = i.getIconHeight();
        // Pad to nearest 8th pixel
        if (w % 8 != 0) {
            int newW =  w + 8 - (w % 8);
            LogIt.log(Level.WARNING, "Image width of " + w + " is not divisible by 8.  "
                    + "Will round-up to " + newW);
            w = newW;
        }
        
        LogIt.log("Image specified: " + i.getDescription());
        LogIt.log("Dimensions: " + w + "x" + h);
        BufferedImage buffer = new BufferedImage(w, h, BufferedImage.TYPE_INT_RGB);
        Graphics2D g = buffer.createGraphics();
        // Fill with white to fix black pixels show after width mod 8 rounding
        g.setBackground(Color.WHITE);
        g.setColor(Color.WHITE);
        g.fillRect(0, 0, w, h);
        
        g.drawImage(i.getImage(), 0, 0, w, h, 0, 0, w, h, Color.WHITE, null);
        ByteArrayOutputStream out = new ByteArrayOutputStream();
        ImageIO.write(buffer, "bmp", out);
        // Get black pixel array.  Swap white and black if EPL printing
        boolean black[] = getBlackPixels(out, w, h, lang == LanguageType.EPL ? false : true);
        int hex[] = ByteUtilities.binaryArrayToIntArray(black);

        String data = ByteUtilities.getHexString(hex);
        int bytesLen = data.length() / 2;
        int perRow = bytesLen / h;
        int pixels = black.length;

        LogIt.log("Bytes: " + bytesLen
                + ", Pixels: " + pixels);
        LogIt.log("Pixels/Row: " + pixels / h);
        LogIt.log("Bytes/Row: " + perRow);
        LogIt.log("Binary Data: " + data);


        // TODO: Use zebra compression for zpl2 supported printers

        switch (lang) {
            case ESCP:
            case ESCP2:
                // n1 and n2 represent the image height in 2-byte format
                // example: the number "09" would be "0009"
                //          the number "10" would be "000A"
                //          the number "255" would be "00FF"
                //          the number "510" would be "FFFF"
                // Images larger than 510pixels must not be supported using ESC V syntax
                if (h > 510) {
                    throw new InvalidRawImageException("ESC/P images taller than "
                            + "510 pixels are not supported using ESC V syntax.");
                }
                //int n1 = h > 255 ? h - 255 : 0;
                //int n2 = h <= 255 ? h : 255;
                
                byte n1 = (byte)(h > 255 ? h - 255 : 0);
                byte n2 = (byte)(h <= 255 ? h : 255);
                
                
                b.append(new byte[]{0x1B,0x56,n1,n2});
                b.append(ByteUtilities.intArrayToByteArray(hex));
                //return (char) 27 + (char) 86 + (byte) n1 + (byte) n2 + new String(ByteUtilities.intArrayToByteArray(hex), charset.name());
                break;
            case ZPL:
            case ZPLII:
                b.append(("^GFA," + bytesLen + "," + bytesLen + "," + perRow + "," + data).getBytes(charset.name()));
                break;
            case EPL:
                b.append(("GW" + x + "," + y + "," + (int)(w/8) + "," + h + ",").getBytes(charset.name()));
                b.append(ByteUtilities.intArrayToByteArray(hex));
                break;
            case CPCL:
                b.append(("EG " + (int)(w/8) + " " + h + " " + x + " " + y + data).getBytes(charset.name()));
                break;
            default:
                throw new InvalidRawImageException(lang.name() + " image conversion is not yet supported.");
        }
        
        return b.getByteArray();


        // } 

        /* catch (IOException e) {
        LogIt.log("IOException reading \"" + url + "\".  Check that path "
        + "is correct and that you have proper permissions to read "
        + "from that location.", e);
        return null;
        }*/
    }

    public static byte[] getImage(byte[] imgData, LanguageType lang, Charset charset, int x, int y) throws InvalidRawImageException, IOException, MalformedURLException, IllegalArgumentException {
        return getImage(new ImageIcon(imgData, "Byte Array"), lang, charset, x, y);
    }

    public static byte[] getImage(String url, LanguageType lang, Charset charset, int x, int y) throws InvalidRawImageException, IOException, MalformedURLException, IllegalArgumentException {
        return getImage(new ImageIcon(new URL(url), url), lang, charset, x, y);
    }

    /**
     * REMOVED 2/14/2012
     * For ZPLII images, flips just row content to fix mirroring that occurs
     * @param hex
     * @param height
     * @return 
     */
    private static String flipRows(String hex, int height) {
        String flipped = "";
        int width = hex.length() / height;

        for (int i = 0; i < height; i++) {
            flipped += new StringBuilder(hex.substring(i * width, (i + 1) * width)).reverse().toString();
        }
        return flipped;
    }

    /**
     * Returns an array of ones or zeros.  boolean is used  instead of int
     * for memory considerations.
     * @param o
     * @return
     */
    private static boolean[] getBlackPixels(ByteArrayOutputStream o, int width, int height, boolean blackFilled) {
        // Garbage (non-pixel) bytes to skip
        int skip = 54;

        // Image byte data
        byte[] data = o.toByteArray();

        // Byte lengh of the image data
        int length = data.length - skip;

        // Each pixel contains color data for red, green, blue
        boolean[] pixels = new boolean[(int) (length / 3)];

        int pos = 0;
        // Bitmap scanlanes are reversed!?, blashphemy! :)
        for (int y = height - 1; y >= 0; y--) {
            for (int x = 0; x < width; x++) {
                int i = (width * y) + x;
                
                int r = Integer.parseInt(Byte.toString(data[(3 * i) + skip]));
                int g = Integer.parseInt(Byte.toString(data[(3 * i) + skip + 1]));
                int b = Integer.parseInt(Byte.toString(data[(3 * i) + skip + 2]));

                // TODO: Better color parsing for non-B&W images
                // Assign "0" for all-white pixels, "1" for all others.
                
                //LogIt.log("Red: " + r + ", Green: " + g + ", Blue: " + b);
                
                pixels[pos++] = r * g * b == -1 ? !blackFilled : blackFilled;
                // Uncomment to flip image 180 degrees  
                //pixels[pixels.length - 1 - i] = r * g * b == -1 ? false : true;

                // Debug
                //LogIt.log(pixels[i] + ",");

            }
        }

        return pixels;
    }
}
