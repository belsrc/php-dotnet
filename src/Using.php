<?php namespace PhpDotNet;

    use PhpDotNet\IDisposable;

    /**
     * Implements the C# 'using' statement.
     * 
     * Calls the supplied callable and, when done, disposes of the input object. This was
     * originally pulled from gonzalo123's 'using' repo @ https://github.com/gonzalo123/using
     * 
     * @param  IDisposable $input    An instance of an IDisposable class.
     * @param  callable    $callback The callable function to use with the input class.
     */
    function using( IDisposable $input, callable $callback=null ) {

        $disponser = function( $input ) {
            if( $input instanceof IDisposable ) {
                $input->dispose();
            }
            else {
                $class = get_class( $input );
                throw new Exception( "The class $class does not implement IDisposable." );
            }
        };

        try {
            call_user_func_( $callback, $input );
            $disponser( $input );
        }
        catch( Exception $e ) {
            $disponser( $input );
            throw $e;
        }
    }