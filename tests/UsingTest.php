<?php

    use \PhpDotNet\IDisposable;

    require_once 'vendor/autoload.php';
    
    class Foo implements IDisposable {
        public function hello( $name ) { }
        public function dispose() { }
    }

    class UsingTest extends PHPUnit_Framework_TestCase {
        
        /**
         * @test
         */
        public function testUsage() {
            $disposeCalled = false;

            $foo = $this->getMockBuilder( 'Foo' )->getMock();
            $foo->expects( $this->any() )
                ->method( 'dispose' )
                ->will( $this->returnCallback( function() use( &$disposeCalled ) {
                        $disposeCalled = true;
                    } ) );

            $this->assertFalse( $disposeCalled, 'dispose not called' );

            PhpDotNet\using( $foo, function( Foo $foo ) {
                $foo->hello( 'Bar' );
            });

            $this->assertTrue( $disposeCalled, 'dispose has been called' );
        }
        
        /**
         * @test
         */
        public function testException() {
            $disposeCalled = false;

            $foo = $this->getMockBuilder( 'Foo' )->getMock();
            $foo->expects( $this->any() )
                ->method( 'dispose' )
                ->will( $this->returnCallback( function() use( &$disposeCalled ) {
                        $disposeCalled = true;
                    } ) );

            $foo->expects( $this->any() )
                ->method( 'hello' )
                ->will( $this->returnCallback( function() {
                            throw new \Exception( 'hello function exception' );
                        }));

            $this->assertFalse( $disposeCalled, 'dispose not called' );

            try {
                PhpDotNet\using( $foo, function( Foo $foo ) {
                        $foo->hello( 'Bar' );
                    });
            }
            catch( \Exception $e ) { }

            $this->assertTrue( $disposeCalled, 'dispose has been called' );
        }
    }