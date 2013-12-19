<?php

    use \PhpDotNet;

    require_once 'vendor/autoload.php';

    class GeneralTest extends PHPUnit_Framework_TestCase {

        private $test;

        // Since this doesn't seem to run for me on each test I'll just
        // call it at the start of each.
        protected function setUp() {

        }

        /**
         * @test
         */
        public function testIsArrayEmpty() {
            $array = array();
            $expected = true;
            $actual = PhpDotNet\General::isArrayEmpty( $array );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );

            $array = array(
                'Alpha',
                'Beta',
            );
            $expected = false;
            $actual = PhpDotNet\General::isArrayEmpty( $array );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testNestedIsArrayEmpty() {
            $array = array(
                null,
                '',
                array(),
            );
            $expected = true;
            $actual = PhpDotNet\General::isArrayEmpty( $array );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );

            $array = array(
                null,
                '',
                array (
                    'Alpha',
                    'Beta',
                )
            );
            $expected = false;
            $actual = PhpDotNet\General::isArrayEmpty( $array );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
       public function testStringFormat() {
            $format = 'The quick brown {0} jumps over the lazy {1}';
            $args = array( 'fox', 'dog' );
            $expected = 'The quick brown fox jumps over the lazy dog';
            $actual = PhpDotNet\General::stringFormat( $format, $args );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         * @expectedException Exception
         */
       public function testStringFormatException() {
            $format = 'The quick brown {0} jumps over the lazy {1}';
            $args = array( 'fox' );
            $actual = PhpDotNet\General::stringFormat( $format, $args );
        }
    }