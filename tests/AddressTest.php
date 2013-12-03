<?php

    use Zizaco\FactoryMuff\Facade\FactoryMuff;

    class AddressTest extends TestCase {

        /**
         * Check the correctness of the name validation.
         */
        public function testNameValidation() {
            $address = FactoryMuff::create( 'MailAddress' );
            
            $address->first_name = null;
            $expected = true;
            $actual = $address->validate();
            $msg = 'Failed asserting ' . $address->first_name . ' is an incorrect value';
            $this->assertEquals( $expected, $actual, $msg );
            
            $address->first_name = 654313;
            $expected = false;
            $actual = $address->validate();
            $msg = 'Failed asserting ' . $address->first_name . ' is an incorrect value';
            $this->assertEquals( $expected, $actual, $msg );
            
            $address->first_name = 'ghsdlihsd';
            $expected = true;
            $actual = $address->validate();
            $msg = 'Failed asserting ' . $address->first_name . ' is an incorrect value';
            $this->assertEquals( $expected, $actual, $msg );
            
            $address->last_name = null;
            $expected = true;
            $actual = $address->validate();
            $msg = 'Failed asserting ' . $address->last_name . ' is an incorrect value';
            $this->assertEquals( $expected, $actual, $msg );
            
            $address->last_name = 654313;
            $expected = false;
            $actual = $address->validate();
            $msg = 'Failed asserting ' . $address->last_name . ' is an incorrect value';
            $this->assertEquals( $expected, $actual, $msg );
            
            $address->last_name = 'ghsdlihsd';
            $expected = true;
            $actual = $address->validate();
            $msg = 'Failed asserting ' . $address->last_name . ' is a correct value';
            $this->assertEquals( $expected, $actual, $msg );
        }

        /**
         * Check the correctness of the city validation.
         */
        public function testCityValidation() {
            $address = FactoryMuff::create( 'MailAddress' );
            
            $address->city = null;
            $expected = false;
            $actual = $address->validate();
            $msg = 'Failed asserting ' . $address->city . ' is an incorrect value';
            $this->assertEquals( $expected, $actual, $msg );
            
            $address->city = '1641351813135';
            $expected = false;
            $actual = $address->validate();
            $msg = 'Failed asserting ' . $address->city . ' is an incorrect value';
            $this->assertEquals( $expected, $actual, $msg );
        }
        
        /**
         * Check the correctness of the country validation.
         */
        public function testCountryValidation() {
            $address = FactoryMuff::create( 'MailAddress' );
            
            $address->country = null;
            $expected = false;
            $actual = $address->validate();
            $msg = 'Failed asserting ' . $address->country . ' is an incorrect value';
            $this->assertEquals( $expected, $actual, $msg );
            
            $address->country = '1641351813135';
            $expected = false;
            $actual = $address->validate();
            $msg = 'Failed asserting ' . $address->countrry . ' is an incorrect value';
            $this->assertEquals( $expected, $actual, $msg );
        }
        
        /**
         * Check the correctness of the phone validation.
         */
        public function testPhoneValidation() {
            $phoneOne   = '1234567890';
            $phoneTwo   = '123 456 7890';
            $phoneThree = 'abc-def-ghij';
            $phoneFour  = '123-456-7890';
            $address = FactoryMuff::create( 'MailAddress' );
            
            $address->phone = null;
            $expected = true;
            $actual = $address->validate();
            $msg = 'Failed asserting ' . $address->phone . ' is a correct value';
            $this->assertEquals( $expected, $actual, $msg );
            
            $address->phone = $phoneOne;
            $expected = true;
            $actual = $address->validate();
            $msg = 'Failed asserting ' . $address->phone . ' is a correct value';
            $this->assertEquals( $expected, $actual, $msg );
            
            $address->phone = $phoneTwo;
            $expected = true;
            $actual = $address->validate();
            $msg = 'Failed asserting ' . $address->phone . ' is a correct value';
            $this->assertEquals( $expected, $actual, $msg );
            
            $address->phone = $phoneFour;
            $expected = true;
            $actual = $address->validate();
            $msg = 'Failed asserting ' . $address->phone . ' is a correct value';
            $this->assertEquals( $expected, $actual, $msg );
            
            $address->phone = $phoneThree;
            $expected = false;
            $actual = $address->validate();
            $msg = 'Failed asserting ' . $address->phone . ' is an incorrect value';
            $this->assertEquals( $expected, $actual, $msg );
        }
        
        /**
         * Check the correctness of the postal validation.
         */
        public function testPostalValidation() {
            $address = FactoryMuff::create( 'MailAddress' );
            
            $address->postal_code = null;
            $expected = false;
            $actual = $address->validate();
            $msg = 'Failed asserting ' . $address->postal_code . ' is an incorrect value';
            $this->assertEquals( $expected, $actual, $msg );
            
            $address->postal_code = 'ssdfgd3156-df313';
            $expected = true;
            $actual = $address->validate();
            $msg = 'Failed asserting ' . $address->postal_code . ' is a correct value';
            $this->assertEquals( $expected, $actual, $msg );
            
            $address->postal_code = '@@@^#(@&#(';
            $expected = false;
            $actual = $address->validate();
            $msg = 'Failed asserting ' . $address->postal_code . ' is an incorrect value';
            $this->assertEquals( $expected, $actual, $msg );
        }
        
        /**
         * Check the correctness of the region validation.
         */
        public function testRegionValidation() {
            $address = FactoryMuff::create( 'MailAddress' );
            
            $address->region = null;
            $expected = false;
            $actual = $address->validate();
            $msg = 'Failed asserting ' . $address->region . ' is an incorrect value';
            $this->assertEquals( $expected, $actual, $msg );
            
            $address->region = 'ssdfgd3156-df313';
            $expected = false;
            $actual = $address->validate();
            $msg = 'Failed asserting ' . $address->region . ' is an incorrect value';
            $this->assertEquals( $expected, $actual, $msg );
            
            $address->region = '@@@^#(@&#(';
            $expected = false;
            $actual = $address->validate();
            $msg = 'Failed asserting ' . $address->region . ' is an incorrect value';
            $this->assertEquals( $expected, $actual, $msg );
            
            $address->region = 'asdfadgsdfg';
            $expected = true;
            $actual = $address->validate();
            $msg = 'Failed asserting ' . $address->region . ' is a correct value';
            $this->assertEquals( $expected, $actual, $msg );
        }
        
        /**
         * Check the correctness of the street validation.
         */
        public function testStreetValidation() {
            $address = FactoryMuff::create( 'MailAddress' );
            
            $address->street_one = null;
            $expected = false;
            $actual = $address->validate();
            $msg = 'Failed asserting ' . $address->street_one . ' is an incorrect value';
            $this->assertEquals( $expected, $actual, $msg );
            
            $address->street_one = 'ssdfgd3156-df313';
            $expected = true;
            $actual = $address->validate();
            $msg = 'Failed asserting ' . $address->street_one . ' is a correct value';
            $this->assertEquals( $expected, $actual, $msg );
            
            $address->street_one = '@@@^#(@&#(';
            $expected = false;
            $actual = $address->validate();
            $msg = 'Failed asserting ' . $address->street_one . ' is an incorrect value';
            $this->assertEquals( $expected, $actual, $msg );
        }
    }