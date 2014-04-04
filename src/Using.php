<?php namespace Belsrc\PhpDotNet;

    /**
     * Implements the C# 'using' statement.
     *
     * Calls the supplied callable and, when done, disposes of the input object. This was
     * originally pulled from gonzalo123's 'using' repo @ https://github.com/gonzalo123/using
     *
     * @param  IDisposable $input    An instance of an IDisposable class.
     * @param  callable    $callback The callable function to use with the input class.
     */
    function using( IDisposable $input, $callback=null ) {

        $disposer = function( $input ) {
            $input->dispose();
        };

        try {
            \call_user_func( $callback, $input );
            $disposer( $input );
        }
        catch( \Exception $e ) {
            $disposer( $input );
            throw $e;
        }
    }
