<?php

    use Belsrc\PhpDotNet\General;

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
            $actual = General::isArrayEmpty( $array );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );

            $array = array(
                'Alpha',
                'Beta',
            );
            $expected = false;
            $actual = General::isArrayEmpty( $array );
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
            $actual = General::isArrayEmpty( $array );
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
            $actual = General::isArrayEmpty( $array );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }
    }
