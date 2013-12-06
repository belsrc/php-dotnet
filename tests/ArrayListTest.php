<?php

    use \PhpDotNet\Collection\ArrayList;

    class ArrayListTest extends PHPUnit_Framework_TestCase {

        protected $test;
        
        protected function setUp() {
            $this->test = new ArrayList( array(
                'One',
                'Two',
                'Three',
                'Four',
                'Five',
                'Six',
                'Seven',
                'Eight',
            ) );
        }
        
        /**
         * @test
         */
        public function testAdd() {
            $this->setUp();
            $expected = new ArrayList( array(
                'One',
                'Two',
                'Three',
                'Four',
                'Five',
                'Six',
                'Seven',
                'Eight',
                'Nine',
            ) );
            $actual = $this->test->add( 'Nine' );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }
        
        /**
         * @test
         */
        public function testAll() {
            $this->setUp();
        }

        /**
         * @test
         */
        public function testAny() {
            $this->setUp();
        }

        /**
         * @test
         */
        public function testClear() {
            $this->setUp();
        }

        /**
         * @test
         */
        public function testCount() {
            $this->setUp();
            $expected = 8;
            $actual = $this->test->count();
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testDistinct() {
            $this->setUp();
        }

        /**
         * @test
         */
        public function testEach() {
            $this->setUp();
        }

        /**
         * @test
         */
        public function testWhere() {
            $this->setUp();
        }

        /**
         * @test
         */
        public function testAverage() {
            $this->setUp();
        }

        /**
         * @test
         */
        public function testContains() {
            $this->setUp();
        }

        /**
         * @test
         */
        public function testExists() {
            $this->setUp();
        }

        /**
         * @test
         */
        public function testFind() {
            $this->setUp();
        }

        /**
         * @test
         */
        public function testFindAll() {
            $this->setUp();
        }

        /**
         * @test
         */
        public function testFindIndex() {
            $this->setUp();
        }

        /**
         * @test
         */
        public function testFindLast() {
            $this->setUp();
        }

        /**
         * @test
         */
        public function testFindLastIndex() {
            $this->setUp();
        }

        /**
         * @test
         */
        public function testFirst() {
            $this->setUp();
        }

        /**
         * @test
         */
        public function testIndexOf() {
            $this->setUp();
        }

        /**
         * @test
         */
        public function testInsert() {
            $this->setUp();
        }

        /**
         * @test
         */
        public function testLast() {
            $this->setUp();
        }

        /**
         * @test
         */
        public function testLastIndexOf() {
            $this->setUp();
        }

        /**
         * @test
         */
        public function testMax() {
            $this->setUp();
        }

        /**
         * @test
         */
        public function testMin() {
            $this->setUp();
        }

        /**
         * @test
         */
        public function testRemove() {
            $this->setUp();
        }

        /**
         * @test
         */
        public function testRemoveAll() {
            $this->setUp();
        }

        /**
         * @test
         */
        public function testRemoveAt() {
            $this->setUp();
        }

        /**
         * @test
         */
        public function testRemoveRange() {
            $this->setUp();
        }

        /**
         * @test
         */
        public function testReverse() {
            $this->setUp();
        }

        /**
         * @test
         */
        public function testSkip() {
            $this->setUp();
        }

        /**
         * @test
         */
        public function testSkipWhile() {
            $this->setUp();
        }

        /**
         * @test
         */
        public function testSort() {
            $this->setUp();
        }

        /**
         * @test
         */
        public function testSum() {
            $this->setUp();
        }

        /**
         * @test
         */
        public function testTake() {
            $this->setUp();
        }

        /**
         * @test
         */
        public function testTakeWhile() {
            $this->setUp();
        }

        /**
         * @test
         */
        public function testToArray() {
            $this->setUp();
        }

        /**
         * @test
         */
        public function testToString() {
            $this->setUp();
        }
    }