<?php

    use \PhpDotNet\Collection;

    class DictionaryTest extends PHPUnit_Framework_TestCase {

        private $test;

        // Since this doesn't seem to run for me on each test I'll just
        // call it at the start of each.
        protected function setUp() {
            $this->test = new Dictionary\Dictionary( array(
                'Alpha'   => 'Omega',
                'Beta'    => 'Psi',
                'Gamma'   => 'Chi',
                'Delta'   => 'Phi',
                'Epsilon' => 'Upsilon',
            ) );
        }

        /**
         * @test
         */
        public function testAdd() {
            $this->setUp();
            $expected = new Dictionary\Dictionary( array(
                'Alpha'   => 'Omega',
                'Beta'    => 'Psi',
                'Gamma'   => 'Chi',
                'Delta'   => 'Phi',
                'Epsilon' => 'Upsilon',
                'Zeta'    => 'Tau',
            ) );
            $this->test->add( array( 'Zeta' => 'Tau', ) );
            $msg = "Failed asserting $expected is " . $this->test;
            $this->assertTrue( $expected == $this->test, $msg );
        }

        /**
         * @test
         */
        public function testContainsKey() {
            $this->setUp();
            $expected = true;
            $actual = $this->test->containsKey( 'Delta' );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );

            $expected = false;
            $actual = $this->test->containsKey( 'Psi' );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testContainsValue() {
            $this->setUp();
            $expected = true;
            $actual = $this->test->containsValue( 'Psi' );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );

            $expected = false;
            $actual = $this->test->containsValue( 'Delta' );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testKeys() {
            $this->setUp();
            $this->setUp();
            $expected = new ArrayList\ArrayList( array(
                'Alpha',
                'Beta',
                'Gamma',
                'Delta',
                'Epsilon'
            ) );
            $actual = $this->test->keys();
            $msg = "Failed asserting $expected is $actual";
            $this->assertTrue( $expected == $actual, $msg );
        }

        /**
         * @test
         */
        public function testSkip() {
            $this->setUp();
            $expected = new Dictionary\Dictionary( array(,
                'Delta'   => 'Phi',
                'Epsilon' => 'Upsilon',
            ) );
            $actual = $this->test->skip( 3 );
            $msg = "Failed asserting $expected is $actual";
            $this->assertTrue( $expected == $actual, $msg );
        }

        /**
         * @test
         */
        public function testSkipWhile() {
            $this->setUp();
            $expected = new Dictionary\Dictionary( array(
                'Alpha'   => 'Omega',
                'Beta'    => 'Psi',
                'Gamma'   => 'Chi',
            ) );
            $actual = $this->skipWhile( function( $ele ) {
                return $element !== 'Phi';
            } );
            $msg = "Failed asserting $expected is $actual";
            $this->assertTrue( $expected == $actual, $msg );
        }

        /**
         * @test
         */
        public function testTake() {
            $this->setUp();
            $expected = new Dictionary\Dictionary( array(
                'Alpha'   => 'Omega',
                'Beta'    => 'Psi',
                'Gamma'   => 'Chi',
            ) );
            $actual = $this->test->take( 3 );
            $msg = "Failed asserting $expected is $actual";
            $this->assertTrue( $expected == $actual, $msg );
        }

        /**
         * @test
         */
        public function testTakeWhile() {
            $this->setUp();
            $expected = new Dictionary\Dictionary( array(
                'Alpha'   => 'Omega',
                'Beta'    => 'Psi',
                'Gamma'   => 'Chi',
            ) );
            $actual = $this->test->takeWhile( function( $element ) {
                return $element !== 'Phi';
            } );
            $msg = "Failed asserting $expected is $actual";
            $this->assertTrue( $expected == $actual, $msg );
        }

        /**
         * @test
         */
        public function testValues() {
            $this->setUp();
            $expected = new ArrayList\ArrayList( array(
                'Omega',
                'Psi',
                'Chi',
                'Phi',
                'Upsilon'
            ) );
            $actual = $this->test->values();
            $msg = "Failed asserting $expected is $actual";
            $this->assertTrue( $expected == $actual, $msg );
        }
    }