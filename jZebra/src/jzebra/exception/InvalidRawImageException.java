/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package jzebra.exception;

/**
 *
 * @author Tres
 */
public class InvalidRawImageException extends Exception {

    /**
     * Creates a new instance of
     * <code>InvalidRawImageException</code> without detail message.
     */
    public InvalidRawImageException() {
    }

    /**
     * Constructs an instance of
     * <code>InvalidRawImageException</code> with the specified detail message.
     *
     * @param msg the detail message.
     */
    public InvalidRawImageException(String msg) {
        super(msg);
    }
}
