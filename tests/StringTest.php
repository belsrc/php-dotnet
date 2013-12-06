<?php

    use \PhpDotNet\Str\Str;

    class StringTest extends PHPUnit_Framework_TestCase {

        /**
         * @test
         */
        public function testContains() {
            $test = new Str( 'This is a test string test string' );
            $expected = true;
            $actual = $test->contains( '' );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );

            $expected = false;
            $actual = $test->contains( 'correct' );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );

            $expected = true;
            $actual = $test->contains( 'test' );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testContainsIgnoreCase() {
            $test = new Str( 'This is a test string test string' );
            $expected = true;
            $actual = $test->containsIgnoreCase( '' );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );

            $expected = false;
            $actual = $test->containsIgnoreCase( 'CORRECT' );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );

            $expected = true;
            $actual = $test->containsIgnoreCase( 'TEST' );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testEndsWith() {
            $test = new Str( 'This is a test string test string' );
            $expected = false;
            $actual = $test->endsWith( 'array' );
            $msg = "Failed asserting $expected is $actual";
            $this->assertFalse( $actual, $msg );

            $expected = true;
            $actual = $test->endsWith( 'string' );
            $msg = "Failed asserting $expected is $actual";
            $this->assertTrue( $actual, $msg );
        }

        /**
         * @test
         */
        public function testLength() {
            $test = new Str( 'This is a test string test string' );
            $expected = strlen ( 'This is a test string test string' );
            $actual = $test->length();
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testReplace() {
            $test = new Str( 'This is a test string test string' );
            $expected = 'This is a fake test string fake test string';
            $actual = $test->replace( 'test', 'fake test' );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );

            $expected = 'This is a test string test string';
            $actual = $test->replace( 'coding', 'boring coding' );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testReplaceFirst() {
            $test = new Str( 'This is a test string test string' );
            $expected = 'This is a fake test string test string';
            $actual = $test->replaceFirst( 'test', 'fake test' );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );

            $expected = 'This is a test string test string';
            $actual = $test->replace( 'coding', 'boring coding' );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testReplaceLast() {
            $test = new Str( 'This is a test string test string' );
            $expected = 'This is a test string fake test string';
            $actual = $test->replaceLast( 'test', 'fake test' );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );

            $expected = 'This is a test string test string';
            $actual = $test->replace( 'coding', 'boring coding' );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testReverse() {
            $test = new Str( 'This is a test string test string' );
            $expected = 'gnirts tset gnirts tset a si sihT';
            $actual = $test->reverse();
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testStripWhiteSpace() {
            $test = new Str( 'This is a test string test string' );
            $expected = 'Thisisateststringteststring';
            $actual = $test->stripWhiteSpace();
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testStartsWith() {
            $test = new Str( 'This is a test string test string' );
            $expected = false;
            $actual = $test->startsWith( 'That ' );
            $msg = "Failed asserting $expected is $actual";
            $this->assertFalse( $actual, $msg );

            $expected = true;
            $actual = $test->startsWith( 'This ' );
            $msg = "Failed asserting $expected is $actual";
            $this->assertTrue( $actual, $msg );
        }

        /**
         * @test
         */
        public function testTruncateStart() {
            $test = new Str( 'This is a test string test string' );
            $expected = '...test string test string';
            $actual = $test->truncateStart( 27 );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testTruncateEnd() {
            $test = new Str( 'This is a test string test string' );
            $expected = 'This is a test string...';
            $actual = $test->truncateEnd( 24 );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testToLower() {
            $test = new Str( 'This is a test string test string' );
            $expected = 'this is a test string test string';
            $actual = $test->toLower();
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testToUpper() {
            $test = new Str( 'This is a test string test string' );
            $expected = 'THIS IS A TEST STRING TEST STRING';
            $actual = $test->toUpper();
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testToTitleCase() {
            $test = new Str( 'This is a test string test string' );
            $expected = 'This is a Test String Test String';
            $actual = $test->toTitleCase();
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
            $test = new Str( 'This is a test string test string' );
            $expected = 'thisIsATestStringTestString';
            $actual = $test->toCamel();
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testToStudly() {
            $test = new Str( 'This is a test string test string' );
            $expected = 'ThisIsATestStringTestString';
            $actual = $test->toStudly();
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testToSnake() {
            $test = new Str( 'This is a test string test string' );
            $expected = 'this_is_a_test_string_test_string';
            $actual = $test->toSnake();
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testToSlug() {
            $test = new Str( 'This is a test string test string' );
            $expected = 'this-is-a-test-string-test-string';
            $actual = $test->toSlug();
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testTrim() {
            $test = new Str( 'This is a test string test string' );
            $expected = 'his is a test string test string';
            $actual = $test->trim( 'T.' );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testTrimStart() {
            $test = new Str( 'This is a test string test string' );
            $expected = 'his is a test string test string';
            $actual = $test->trimStart( 'T' );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testTrimEnd() {
            $test = new Str( 'This is a test string test string.' );
            $expected = 'This is a test string test string';
            $actual = $test->trimEnd( '.' );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testToString() {
            $test = new Str( 'This is a test string test string' );
            $expected = 'This is a test string test string';
            $actual = (string)$test;
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }
    }