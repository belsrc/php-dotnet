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
            $msg = "Failed asserting $expected is $actual.";
            $this->assertEquals( $expected, $actual, $msg );

            $expected = false;
            $actual = $this->_test->contains( "correct" );
            $msg = "Failed asserting $expected is $actual.";
            $this->assertEquals( $expected, $actual, $msg );

            $expected = true;
            $actual = $this->_test->contains( "test" );
            $msg = "Failed asserting $expected is $actual.";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testContainsIgnoreCase() {
            $expected = true;
            $actual = $this->_test->containsIgnoreCase();
            $msg = "Failed asserting $expected is $actual.";
            $this->assertEquals( $expected, $actual, $msg );

            $expected = false;
            $actual = $this->_test->containsIgnoreCase( "CORRECT" );
            $msg = "Failed asserting $expected is $actual.";
            $this->assertEquals( $expected, $actual, $msg );

            $expected = true;
            $actual = $this->_test->containsIgnoreCase( "TEST" );
            $msg = "Failed asserting $expected is $actual.";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testEndsWith() {
            $expected = false;
            $actual = $this->_test->endsWith( "array." );
            $msg = "Failed asserting $expected is $actual.";
            $this->assertEquals( $expected, $actual, $msg );

            $expected = true;
            $actual = $this->_test->endsWith( "string." );
            $msg = "Failed asserting $expected is $actual.";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testLength() {
            $expected = strlen ( 'This is a test string test string.' );
            $actual = $this->_test->length();
            $msg = "Failed asserting $expected is $actual.";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testReplace() {
            $expected = 'This is a fake test string fake test string.';
            $actual = $this->_test->replace( 'test', 'fake test' );
            $msg = "Failed asserting $expected is $actual.";
            $this->assertEquals( $expected, $actual, $msg );

            $expected = 'This is a test string test string.';
            $actual = $this->_test->replace( 'coding', 'boring coding' );
            $msg = "Failed asserting $expected is $actual.";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testReplaceFirst() {
            $expected = 'This is a fake test string test string.';
            $actual = $this->_test->replaceFirst( 'test', 'fake test' );
            $msg = "Failed asserting $expected is $actual.";
            $this->assertEquals( $expected, $actual, $msg );

            $expected = 'This is a test string test string.';
            $actual = $this->_test->replace( 'coding', 'boring coding' );
            $msg = "Failed asserting $expected is $actual.";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testReplaceLast() {
            $expected = 'This is a test string fake test string.';
            $actual = $this->_test->replaceLast( 'test', 'fake test' );
            $msg = "Failed asserting $expected is $actual.";
            $this->assertEquals( $expected, $actual, $msg );

            $expected = 'This is a test string test string.';
            $actual = $this->_test->replace( 'coding', 'boring coding' );
            $msg = "Failed asserting $expected is $actual.";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testReverse() {
            $expected = '.gnirts tset gnirts tset a si sihT';
            $actual = $this->_test->reverse();
            $msg = "Failed asserting $expected is $actual.";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testStripWhiteSpace() {
            $expected = 'Thisisateststringteststring.';
            $actual = $this->_test->stripWhiteSpace();
            $msg = "Failed asserting $expected is $actual.";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testStartsWith() {
            $expected = false;
            $actual = $this->_test->endsWith( "That" );
            $msg = "Failed asserting $expected is $actual.";
            $this->assertEquals( $expected, $actual, $msg );

            $expected = true;
            $actual = $this->_test->endsWith( "This" );
            $msg = "Failed asserting $expected is $actual.";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testTruncateStart() {
            $expected = '...test string test string.';
            $actual = $this->_test->truncateStart( 27 );
            $msg = "Failed asserting $expected is $actual."
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testTruncateEnd() {
            $expected = 'This is a test string...';
            $actual = $this->_test->truncateEnd( 24 );
            $msg = "Failed asserting $expected is $actual."
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testToLower() {
            $expected = 'this is a test string test string.';
            $actual = $this->_test->toLower();
            $msg = "Failed asserting $expected is $actual.";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testToUpper() {
            $expected = 'THIS IS A TEST STRING TEST STRING.';
            $actual = $this->_test->toUpper();
            $msg = "Failed asserting $expected is $actual.";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testToTitleCase() {
            $expected = 'This is a Test String Test String.';
            $actual = $this->_test->toTitleCase();
            $msg = "Failed asserting $expected is $actual.";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testToCamel() {
            $expected = 'thisIsATestStringTestString.';
            $actual = $this->_test->toCamelCase();
            $msg = "Failed asserting $expected is $actual.";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testToStudly() {
            $expected = 'ThisIsATestStringTestString.';
            $actual = $this->_test->toStudly();
            $msg = "Failed asserting $expected is $actual.";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testToSnake() {
            $expected = 'this_is_a_test_string_test_string.';
            $actual = $this->_test->toSnake();
            $msg = "Failed asserting $expected is $actual.";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testToSlug() {
            $expected = 'this-is-a-test-string-test-string.';
            $actual = $this->_test->toSlug();
            $msg = "Failed asserting $expected is $actual.";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testTrim() {
            $expected = 'his is a test string test string';
            $actual = $this->_test->trim( 'T.' );
            $msg = "Failed asserting $expected is $actual.";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testTrimStart() {
            $expected = 'his is a test string test string.';
            $actual = $this->_test->trimStart( 'T' );
            $msg = "Failed asserting $expected is $actual.";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testTrimEnd() {
            $expected = 'This is a test string test string';
            $actual = $this->_test->trimEnd( '.' );
            $msg = "Failed asserting $expected is $actual.";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testToString() {
            $expected = 'This is a test string test string.';
            $actual = (string)$this->_test;
            $msg = "Failed asserting $expected is $actual.";
            $this->assertEquals( $expected, $actual, $msg );
        }
    }