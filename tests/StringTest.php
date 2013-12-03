<?php

    use \PhpDotNet\String;

    class StringTest extends PHPUnit_Framework_TestCase {

        //* @expectedException InvalidArgumentException
        private $_test;

        protected function setUp() {
            $_test = new String( "This is a test string test string." );
        }

        protected function tearDown() {
            $_test = null;
        }

        /**
         * @test
         */
        public function testContains() {
            $expected = true;
            $actual = $this->_test->contains();
            $msg = "Failed asserting $expected is $actual."
            $this->assertEquals( $expected, $actual, $msg );

            $expected = false;
            $actual = $this->_test->contains( "correct" );
            $msg = "Failed asserting $expected is $actual."
            $this->assertEquals( $expected, $actual, $msg );

            $expected = true;
            $actual = $this->_test->contains( "test" );
            $msg = "Failed asserting $expected is $actual."
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testContainsIgnoreCase() {
            $expected = true;
            $actual = $this->_test->containsIgnoreCase();
            $msg = "Failed asserting $expected is $actual."
            $this->assertEquals( $expected, $actual, $msg );

            $expected = false;
            $actual = $this->_test->containsIgnoreCase( "CORRECT" );
            $msg = "Failed asserting $expected is $actual."
            $this->assertEquals( $expected, $actual, $msg );

            $expected = true;
            $actual = $this->_test->containsIgnoreCase( "TEST" );
            $msg = "Failed asserting $expected is $actual."
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testEndsWith() {
            $expected = true;
            $actual = $this->_test->endsWith();
            $msg = "Failed asserting $expected is $actual."
            $this->assertEquals( $expected, $actual, $msg );

            $expected = false;
            $actual = $this->_test->endsWith( "array." );
            $msg = "Failed asserting $expected is $actual."
            $this->assertEquals( $expected, $actual, $msg );

            $expected = true;
            $actual = $this->_test->endsWith( "string." );
            $msg = "Failed asserting $expected is $actual."
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testLength() {
            $expected = strlen ( 'This is a test string test string.' );
            $actual = $this->_test->length();
            $msg = "Failed asserting $expected is $actual."
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testReplace() {
            $expected = 'This is a fake test string fake test string.';
            $actual = $this->_test->replace( 'test', 'fake test' );
            $msg = "Failed asserting $expected is $actual."
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testReplaceFirst() {
            $expected = 'This is a fake test string test string.';
            $actual = $this->_test->replaceFirst( 'test', 'fake test' );
            $msg = "Failed asserting $expected is $actual."
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testReplaceLast() {
            $expected = 'This is a test string fake test string.';
            $actual = $this->_test->replaceLast( 'test', 'fake test' );
            $msg = "Failed asserting $expected is $actual."
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testReverse() {
            //$expected =
            //$actual = $this->_test->
            //$msg = "Failed asserting $expected is $actual."
            //$this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testStripWhiteSpace() {
            //$expected =
            //$actual = $this->_test->
            //$msg = "Failed asserting $expected is $actual."
            //$this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testStartsWith() {
            //$expected =
            //$actual = $this->_test->
            //$msg = "Failed asserting $expected is $actual."
            //$this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testTruncateStart() {
            //$expected =
            //$actual = $this->_test->
            //$msg = "Failed asserting $expected is $actual."
            //$this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testTruncateEnd() {
            //$expected =
            //$actual = $this->_test->
            //$msg = "Failed asserting $expected is $actual."
            //$this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testToLower() {
            //$expected =
            //$actual = $this->_test->
            //$msg = "Failed asserting $expected is $actual."
            //$this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testToUpper() {
            //$expected =
            //$actual = $this->_test->
            //$msg = "Failed asserting $expected is $actual."
            //$this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testToTitleCase() {
            //$expected =
            //$actual = $this->_test->
            //$msg = "Failed asserting $expected is $actual."
            //$this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testToCamel() {
            //$expected =
            //$actual = $this->_test->
            //$msg = "Failed asserting $expected is $actual."
            //$this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testToStudly() {
            //$expected =
            //$actual = $this->_test->
            //$msg = "Failed asserting $expected is $actual."
            //$this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testToSnake() {
            //$expected =
            //$actual = $this->_test->
            //$msg = "Failed asserting $expected is $actual."
            //$this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testToSlug() {
            //$expected =
            //$actual = $this->_test->
            //$msg = "Failed asserting $expected is $actual."
            //$this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testTrim() {
            //$expected =
            //$actual = $this->_test->
            //$msg = "Failed asserting $expected is $actual."
            //$this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testTrimStart() {
            //$expected =
            //$actual = $this->_test->
            //$msg = "Failed asserting $expected is $actual."
            //$this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testTrimEnd() {
            //$expected =
            //$actual = $this->_test->
            //$msg = "Failed asserting $expected is $actual."
            //$this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testToString() {
            //$expected =
            //$actual = $this->_test->
            //$msg = "Failed asserting $expected is $actual."
            //$this->assertEquals( $expected, $actual, $msg );
        }
    }