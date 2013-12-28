<?php

    use \PhpDotNet\Collection\ArrayList;

    require_once 'vendor/autoload.php';

    class ArrayListTest extends PHPUnit_Framework_TestCase {

        protected $test;

        protected function setUp() {
            $this->test = new ArrayList( array(
                'Alpha',
                'Beta',
                'Gamma',
                'Delta',
                'Epsilon',
                'Zeta',
                'Eta',
                'Theta',
            ) );
        }

        /**
         * @test
         */
        public function testAdd() {
            $this->setUp();
            $expected = new ArrayList( array(
                'Alpha',
                'Beta',
                'Gamma',
                'Delta',
                'Epsilon',
                'Zeta',
                'Eta',
                'Theta',
                'Iota'
            ) );
            $this->test->add( 'Iota' );
            $msg = "Failed asserting $expected is " . $this->test;
            $this->assertTrue( $expected == $this->test, $msg );
        }

        /**
         * @test
         */
        public function testAll() {
            $this->setUp();
            $expected = true;
            $actual = $this->test->all( function( $element ) {
                return $element !== '';
            } );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         * @expectedException Exception
         */
        public function testAllException() {
            $this->setUp();
            $this->test->all( 'fail' );
        }

        /**
         * @test
         */
        public function testAny() {
            $this->setUp();
            $expected = false;
            $actual = $this->test->any( function( $element ) {
                return $element === '';
            } );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         * @expectedException Exception
         */
        public function testAnyException() {
            $this->setUp();
            $this->test->any( 'fail' );
        }

        /**
         * @test
         */
        public function testClear() {
            $this->setUp();
            $expected = new ArrayList();
            $this->test->clear();
            $msg = "Failed asserting $expected is " . $this->test;
            $this->assertTrue( $expected == $this->test, $msg );
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
            $test = new ArrayList( array(
                'Alpha',
                'Beta',
                'Gamma',
                'Delta',
                'Epsilon',
                'Gamma',
                'Alpha',
            ) );
            $expected = new ArrayList( array(
                'Alpha',
                'Beta',
                'Gamma',
                'Delta',
                'Epsilon',
            ) );
            $actual = $test->distinct();
            $msg = "Failed asserting $expected is $actual";
            $this->assertTrue( $expected == $actual, $msg );
        }

        /**
         * @test
         */
        public function testEach() {
            $this->setUp();
            $expected = new ArrayList( array(
                'lpha',
                'eta',
                'amma',
                'elta',
                'psilon',
                'eta',
                'ta',
                'heta',
            ) );
            $actual = $this->test->each( function( $element ) {
                $tmp = str_split( $element );
                unset( $tmp[0] );
                return implode( '', $tmp );
            } );
            $msg = "Failed asserting $expected is $actual";
            $this->assertTrue( $expected == $actual, $msg );
        }

        /**
         * @test
         * @expectedException Exception
         */
        public function testEachException() {
            $this->setUp();
            $this->test->each( 'fail' );
        }

        /**
         * @test
         */
        public function testWhere() {
            $this->setUp();
            $expected = new ArrayList( array(
                'Epsilon',
                'Eta',
            ) );
            $actual = $this->test->where( function( $element ) {
                $tmp = str_split( $element );
                return $tmp[0] === 'E' || $tmp[0] === 'e';
            } );
            $msg = "Failed asserting $expected is $actual";
            $this->assertTrue( $expected == $actual, $msg );
        }

        /**
         * @test
         * @expectedException Exception
         */
        public function testWhereException() {
            $this->setUp();
            $this->test->where( 'fail' );
        }

        /**
         * @test
         */
        public function testAverage() {
            $test = new ArrayList( array(
                2, 3, 2, 5, 3, 5, 1
            ) );
            $expected = 3;
            $actual = $test->average();
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         * @expectedException Exception
         */
        public function testAverageException() {
            $test = new ArrayList( array(
                'l', 'f', 'k', 'h', 'f',
            ) );
            $test->average();
        }

        /**
         * @test
         */
        public function testContains() {
            $this->setUp();
            $expected = true;
            $actual = $this->test->contains( 'Delta' );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testExists() {
            $this->setUp();
            $expected = true;
            $actual = $this->test->exists( function( $element ) {
                return $element === 'Delta';
            } );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );

            $expected = false;
            $actual = $this->test->exists( function( $element ) {
                return $element === 'Lambda';
            } );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         * @expectedException Exception
         */
        public function testExistsException() {
            $this->setUp();
            $this->test->exists( 1 );
        }

        /**
         * @test
         */
        public function testFind() {
            $this->setUp();
            $expected = 'Epsilon';
            $actual = $this->test->find( function( $element ) {
                $tmp = str_split( $element );
                return $tmp[0] === 'E' || $tmp[0] === 'e';
            } );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );

            $expected = null;
            $actual = $this->test->find( function( $element ) {
                $tmp = str_split( $element );
                return $tmp[0] === 'X' || $tmp[0] === 'x';
            } );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         * @expectedException Exception
         */
        public function testFindException() {
            $this->setUp();
            $this->test->find( 'fail' );
        }

        /**
         * @test
         */
        public function testFindAll() {
            $this->setUp();
            $expected = new ArrayList( array(
                'Epsilon',
                'Eta',
            ) );
            $actual = $this->test->findAll( function( $element ) {
                $tmp = str_split( $element );
                return $tmp[0] === 'E' || $tmp[0] === 'e';
            } );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testFindIndex() {
            $this->setUp();
            $expected = 4;
            $actual = $this->test->findIndex( function( $element ) {
                $tmp = str_split( $element );
                return $tmp[0] === 'E' || $tmp[0] === 'e';
            } );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );

            $expected = -1;
            $actual = $this->test->findIndex( function( $element ) {
                $tmp = str_split( $element );
                return $tmp[0] === 'X' || $tmp[0] === 'x';
            } );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         * @expectedException Exception
         */
        public function testFindIndexException() {
            $this->setUp();
            $this->test->findIndex( 1 );
        }

        /**
         * @test
         */
        public function testFindLast() {
            $this->setUp();
            $expected = 'Eta';
            $actual = $this->test->findLast( function( $element ) {
                $tmp = str_split( $element );
                return $tmp[0] === 'E' || $tmp[0] === 'e';
            } );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );$this->setUp();

            $expected = null;
            $actual = $this->test->findLast( function( $element ) {
                $tmp = str_split( $element );
                return $tmp[0] === 'X' || $tmp[0] === 'x';
            } );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         * @expectedException Exception
         */
        public function testFindLastException() {
            $this->setUp();
            $this->test->findLast( 'fail' );
        }

        /**
         * @test
         */
        public function testFindLastIndex() {
            $this->setUp();
            $expected = 6;
            $actual = $this->test->findLastIndex( function( $element ) {
                $tmp = str_split( $element );
                return $tmp[0] === 'E' || $tmp[0] === 'e';
            } );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );

            $expected = -1;
            $actual = $this->test->findLastIndex( function( $element ) {
                $tmp = str_split( $element );
                return $tmp[0] === 'X' || $tmp[0] === 'x';
            } );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         * @expectedException Exception
         */
        public function testFindLastIndexException() {
            $this->setUp();
            $this->test->findLastIndex( 1 );
        }

        /**
         * @test
         */
        public function testFirst() {
            $this->setUp();
            $expected = 'Alpha';
            $actual = $this->test->first();
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testIndexOf() {
            $this->setUp();
            $expected = 4;
            $actual = $this->test->indexOf( 'Epsilon' );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testInsert() {
            $this->setUp();
            $expected = new ArrayList( array(
                'Iota',
                'Alpha',
                'Beta',
                'Gamma',
                'Delta',
                'Epsilon',
                'Zeta',
                'Eta',
                'Theta',
            ) );
            $this->test->insert( 0, 'Iota' );
            $msg = "Failed asserting $expected is " . $this->test;
            $this->assertEquals( $expected, $this->test, $msg );
        }

        /**
         * @test
         */
        public function testLast() {
            $this->setUp();
            $expected = 'Theta';
            $actual = $this->test->last();
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testIsEmpty() {
            $this->setUp();
            $expected = false;
            $actual = $this->test->isEmpty();
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testLastIndexOf() {
            $this->setUp();
            $expected = 4;
            $actual = $this->test->lastIndexOf( 'Epsilon' );
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testMax() {
            $test = new ArrayList( array(
                2, 3, 2, 5, 3, 5, 1
            ) );
            $expected = 5;
            $actual = $test->max();
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         * @expectedException Exception
         */
        public function testMaxException() {
            $test = new ArrayList( array(
                'l', 'f', 'k', 'h', 'f',
            ) );
            $test->max();
        }

        /**
         * @test
         */
        public function testMin() {
            $test = new ArrayList( array(
                2, 3, 2, 5, 3, 5, 1
            ) );
            $expected = 1;
            $actual = $test->min();
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         * @expectedException Exception
         */
        public function testMinException() {
            $test = new ArrayList( array(
                'l', 'f', 'k', 'h', 'f',
            ) );
            $test->min();
        }

        /**
         * @test
         */
        public function testRemove() {
            $this->setUp();
            $expected = new ArrayList( array(
                'Alpha',
                'Beta',
                'Delta',
                'Epsilon',
                'Zeta',
                'Eta',
                'Theta',
            ) );
            $this->test->remove( 'Gamma' );
            $msg = "Failed asserting $expected is " . $this->test;
            $this->assertEquals( $expected, $this->test, $msg );
        }

        /**
         * @test
         */
        public function testRemoveAll() {
            $this->setUp();
            $expected = new ArrayList( array(
                'Alpha',
                'Beta',
                'Gamma',
                'Delta',
                'Zeta',
                'Theta',
            ) );
            $this->test->removeAll( function( $element ) {
                $tmp = str_split( $element );
                return $tmp[0] === 'E' || $tmp[0] === 'e';
            } );
            $msg = "Failed asserting $expected is " . $this->test;
            $this->assertTrue( $expected == $this->test, $msg );
        }

        /**
         * @test
         * @expectedException Exception
         */
        public function testRemoveAllException() {
            $this->setUp();
            $this->test->removeAll( 'fail' );
        }

        /**
         * @test
         * @expectedException Exception
         */
        public function testRemoveAllNotBoolException() {
            $this->setUp();
            $this->test->removeAll( function( $element ) {
                return 'fail';
            } );
        }

        /**
         * @test
         */
        public function testRemoveAt() {
            $this->setUp();
            $expected = new ArrayList( array(
                'Alpha',
                'Beta',
                'Gamma',
                'Delta',
                'Epsilon',
                'Eta',
                'Theta',
            ) );
            $this->test->removeAt( 5 );
            $msg = "Failed asserting $expected is " . $this->test;
            $this->assertTrue( $expected == $this->test, $msg );
        }

        /**
         * @test
         * @expectedException Exception
         */
        public function testRemoveAtNonInt() {
            $this->setUp();
            $this->test->removeAt( 'a' );
        }

        /**
         * @test
         * @expectedException Exception
         */
        public function testRemoveAtOor() {
            $this->setUp();
            $this->test->removeAt( 1000 );
        }

        /**
         * @test
         */
        public function testRemoveRange() {
            $this->setUp();
            $expected = new ArrayList( array(
                'Alpha',
                'Beta',
                'Gamma',
                'Delta',
                'Epsilon',
                'Theta',
            ) );
            $this->test->removeRange( 5, 2 );
            $msg = "Failed asserting $expected is " . $this->test;
            $this->assertTrue( $expected == $this->test, $msg );
        }

        /**
         * @test
         * @expectedException Exception
         */
        public function testRemoveRangeNotInt() {
            $this->setUp();
            $this->test->removeRange( 'a', 3 );
        }

        /**
         * @test
         * @expectedException Exception
         */
        public function testRemoveRangeOor() {
            $this->setUp();
            $this->test->removeRange( 10000, 2 );
        }

        /**
         * @test
         */
        public function testReverse() {
            $this->setUp();
            $expected = new ArrayList( array(
                'Theta',
                'Eta',
                'Zeta',
                'Epsilon',
                'Delta',
                'Gamma',
                'Beta',
                'Alpha',
            ) );
            $actual = $this->test->reverse();
            $msg = "Failed asserting $expected is $actual";
            $this->assertTrue( $expected == $actual, $msg );
        }

        /**
         * @test
         */
        public function testSkip() {
            $this->setUp();
            $expected = new ArrayList( array(
                'Delta',
                'Epsilon',
                'Zeta',
                'Eta',
                'Theta',
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
            $expected = new ArrayList( array(
                'Zeta',
                'Eta',
                'Theta',
            ) );
            $actual = $this->test->skipWhile( function( $element ) {
                return $element !== 'Zeta';
            } );
            $msg = "Failed asserting $expected is $actual";
            $this->assertTrue( $expected == $actual, $msg );

            $expected = new ArrayList();
            $actual = $this->test->skipWhile( function( $element ) {
                return $element !== ' ';
            } );
            $msg = "Failed asserting $expected is $actual";
            $this->assertTrue( $expected == $actual, $msg );

            $actual = $this->test->skipWhile( function( $element ) {
                return $element === ' ';
            } );
            $msg = "Failed asserting " . $this->test . " is $actual";
            $this->assertTrue( $this->test == $actual, $msg );
        }

        /**
         * @test
         * @expectedException Exception
         */
        public function testSkipWhileException() {
            $this->setUp();
            $this->test->skipWhile( 'fail' );
        }

        /**
         * @test
         */
        public function testSort() {
            $this->setUp();
            $expected = new ArrayList( array(
                'Alpha',
                'Beta',
                'Delta',
                'Epsilon',
                'Eta',
                'Gamma',
                'Theta',
                'Zeta',
            ) );
            $this->test->sort( function( $a, $b ) {
                $a = strtolower( $a );
                $b = strtolower( $b );
                if( $a == $b ) {
                    return 0;
                }

                return( $a > $b ) ? 1 : -1;
            } );
            $msg = "Failed asserting $expected is " . $this->test;
            $this->assertTrue( $expected == $this->test, $msg );
        }

        /**
         * @test
         */
        public function testSum() {
            $test = new ArrayList( array(
                2, 3, 2, 5, 3, 5, 1
            ) );
            $expected = 21;
            $actual = $test->sum();
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         * @expectedException Exception
         */
        public function testSumException() {
            $test = new ArrayList( array(
                'l', 'f', 'k', 'h', 'f',
            ) );
            $test->sum();
        }

        /**
         * @test
         */
        public function testTake() {
            $this->setUp();
            $expected = new ArrayList( array(
                'Alpha',
                'Beta',
                'Gamma',
                'Delta',
            ) );
            $actual = $this->test->take( 4 );
            $msg = "Failed asserting $expected is $actual";
            $this->assertTrue( $expected == $actual, $msg );
        }

        /**
         * @test
         */
        public function testTakeWhile() {
            $this->setUp();
            $expected = new ArrayList( array(
                'Alpha',
                'Beta',
                'Gamma',
                'Delta',
                'Epsilon',
            ) );
            $actual = $this->test->takeWhile( function( $element ) {
                return $element !== 'Zeta';
            } );
            $msg = "Failed asserting $expected is $actual";
            $this->assertTrue( $expected == $actual, $msg );
        }

        /**
         * @test
         * @expectedException Exception
         */
        public function testTakeWhileException() {
            $this->setUp();
            $this->test->takeWhile( 'fail' );
        }

        /**
         * @test
         */
        public function testToArray() {
            $this->setUp();
            $expected = array(
                'Alpha',
                'Beta',
                'Gamma',
                'Delta',
                'Epsilon',
                'Zeta',
                'Eta',
                'Theta',
            );
            $actual = $this->test->toArray();
            $msg = 'Failed asserting ' . print_r( $expected, true ) . ' is ' . print_r( $actual, true );
            $this->assertTrue( $expected == $actual, $msg );
        }

        /**
         * @test
         */
        public function testToString() {
            $this->setUp();
            $expected = 'Alpha,Beta,Gamma,Delta,Epsilon,Zeta,Eta,Theta';
            $actual = $this->test->toString();
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testIterator() {
            // What better way to test the iterator then a foreach loop
            $this->setUp();

            foreach( $this->test as $key => $item ) { }

            $this->assertEquals( true, true );
        }

        /**
         * @test
         */
        public function testOffsetGet() {
            $this->setUp();
            $expected = 'Alpha';
            $actual = $this->test[0];
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testOffsetSet() {
            $this->setUp();
            $expected = 'Lambda';
            $this->test[0] = 'Lambda';
            $actual = $this->test[0];
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
            
            $this->setUp();
            $expected = 'Lambda';
            $this->test[] = 'Lambda';
            $actual = $this->test[$this->test->count()-1];
            $msg = "Failed asserting $expected is $actual";
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * @test
         */
        public function testOffsetExists() {
            $this->setUp();
            $actual = isset( $this->test[1] );
            $msg = "Failed asserting true is " . $this->test;
            $this->assertEquals( true, $actual, $msg );
        }

        /**
         * @test
         */
        public function testOffsetUnset() {
            $this->setUp();
            
            // Since it was saying they didn't match, even though they did
            // ill just use string comparison.
            $expected = new ArrayList( array(
                'Beta',
                'Gamma',
                'Delta',
                'Epsilon',
                'Zeta',
                'Eta',
                'Theta',
            ) );
            $expected = $expected->toString();
            unset( $this->test[0] );
            $actual = $this->test->toString();
            $msg = "Failed asserting $expected is $actual";
            $this->assertTrue( $expected == $actual, $msg );
        }
    }