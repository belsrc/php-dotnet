<?php

    use \PhpDotNet\Str\Str;

    class StringTest extends PHPUnit_Framework_TestCase {

        protected $test;

        // Since this doesn't seem to run for me on each test I'll just
        // call it at the start of each.
        protected function setUp() {
            $this->test = new Str( 'This is a test string test string' );
        }

        /**
         * @test
         */
        public function testContains() {
            $this->setUp();
            $expected = true;
            $actual = $this->test->contains( '' );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );

            $expected = false;
            $actual = $this->test->contains( 'correct' );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );

            $expected = true;
            $actual = $this->test->contains( 'test' );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testContainsIgnoreCase() {
            $this->setUp();
            $expected = true;
            $actual = $this->test->containsIgnoreCase( '' );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );

            $expected = false;
            $actual = $this->test->containsIgnoreCase( 'CORRECT' );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );

            $expected = true;
            $actual = $this->test->containsIgnoreCase( 'TEST' );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testEndsWith() {
            $this->setUp();
            $expected = false;
            $actual = $this->test->endsWith( 'array' );
            $msg = "Failed asserting $expected is $actual";
            $this->assertFalse( $actual, $msg );

            $expected = true;
            $actual = $this->test->endsWith( 'string' );
            $msg = "Failed asserting $expected is $actual";
            $this->assertTrue( $actual, $msg );
        }

        /**
         * @test
         */
        public function testLength() {
            $this->setUp();
            $expected = strlen ( 'This is a test string test string' );
            $actual = $this->test->length();
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testReplace() {
            $this->setUp();
            $expected = 'This is a fake test string fake test string';
            $actual = $this->test->replace( 'test', 'fake test' );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );

            $expected = 'This is a test string test string';
            $actual = $this->test->replace( 'coding', 'boring coding' );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testReplaceFirst() {
            $this->setUp();
            $expected = 'This is a fake test string test string';
            $actual = $this->test->replaceFirst( 'test', 'fake test' );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );

            $expected = 'This is a test string test string';
            $actual = $this->test->replace( 'coding', 'boring coding' );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testReplaceLast() {
            $this->setUp();
            $expected = 'This is a test string fake test string';
            $actual = $this->test->replaceLast( 'test', 'fake test' );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );

            $expected = 'This is a test string test string';
            $actual = $this->test->replace( 'coding', 'boring coding' );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testReverse() {
            $this->setUp();
            $expected = 'gnirts tset gnirts tset a si sihT';
            $actual = $this->test->reverse();
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testStripWhiteSpace() {
            $this->setUp();
            $expected = 'Thisisateststringteststring';
            $actual = $this->test->stripWhiteSpace();
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testStartsWith() {
            $this->setUp();
            $expected = false;
            $actual = $this->test->startsWith( 'That ' );
            $msg = "Failed asserting $expected is $actual";
            $this->assertFalse( $actual, $msg );

            $expected = true;
            $actual = $this->test->startsWith( 'This ' );
            $msg = "Failed asserting $expected is $actual";
            $this->assertTrue( $actual, $msg );
        }

        /**
         * @test
         */
        public function testTruncateStart() {
            $this->setUp();
            $expected = '...test string test string';
            $actual = $this->test->truncateStart( 27 );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testTruncateEnd() {
            $this->setUp();
            $expected = 'This is a test string...';
            $actual = $this->test->truncateEnd( 24 );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testToLower() {
            $this->setUp();
            $expected = 'this is a test string test string';
            $actual = $this->test->toLower();
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testToUpper() {
            $this->setUp();
            $expected = 'THIS IS A TEST STRING TEST STRING';
            $actual = $this->test->toUpper();
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testToTitleCase() {
            $this->setUp();
            $expected = 'This is a Test String Test String';
            $actual = $this->test->toTitleCase();
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );

            $test = new Str( 'This has a BMW acronym in it' );
            $expected = 'This Has a BMW Acronym in it';
            $actual = $test->toTitleCase();
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testToCamel() {
            $this->setUp();
            $expected = 'thisIsATestStringTestString';
            $actual = $this->test->toCamel();
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testToStudly() {
            $this->setUp();
            $expected = 'ThisIsATestStringTestString';
            $actual = $this->test->toStudly();
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testToSnake() {
            $this->setUp();
            $expected = 'this_is_a_test_string_test_string';
            $actual = $this->test->toSnake();
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testToSlug() {
            $this->setUp();
            $expected = 'this-is-a-test-string-test-string';
            $actual = $this->test->toSlug();
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testTrim() {
            $this->setUp();
            $expected = 'his is a test string test string';
            $actual = $this->test->trim( 'T.' );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testTrimStart() {
            $this->setUp();
            $expected = 'his is a test string test string';
            $actual = $this->test->trimStart( 'T' );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testTrimEnd() {
            $this->setUp();
            $expected = 'This is a test string test string';
            $actual = $this->test->trimEnd( '.' );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testToString() {
            $this->setUp();
            $expected = 'This is a test string test string';
            $actual = (string)$this->test;
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }
    }