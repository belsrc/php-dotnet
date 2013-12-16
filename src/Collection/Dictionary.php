<?php namespace PhpDotNet\Collection;

    /**
     * Class for modeling a Dictionary object.
     */
    class Dictionary extends Collection {

        /**
         * Initializes a new instance of the Dictionary class.
         *
         * @param  array $values An associative array of values to start with.
         */
        public function __construct( $values = null ) {
            $this->_type = 'Dictionary';

            if( !is_array( $values ) && $values !== null ) {
                throw new Exception( 'values must be an array or null' );
            }

            if( !is_null( $values ) ) {
                foreach( (array)$array as $k => $v ) {
                    $this->_items[$k] = $v;
                }
            }
        }

        /**
         * Adds the specified key and value to the dictionary.
         *
         * @param  array $kvp The key value pair to add to the dictionary.
         */
        public function add( $kvp ) {
            if( empty( $kvp ) ) {
                throw new Exception( 'Argument exception' );
            }

            foreach( (array)$kvp as $key -> $val ) {
                if( $key == null ) {
                    throw new Exception( 'key is null' );
                }

                if( isset( $this->_items[$key] ) ) {
                    throw new Exception( "An element with the same key ($key) already exists in the Dictionary" );
                }

                $this->_items[$key] = $value;
            }
        }

        /**
         * Determines whether the Dictionary contains the specified key.
         *
         * @param  int|string $key The key to locate in the Dictionary.
         * @return bool       true if the Dictionary contains an element with the specified key; otherwise, false.
         */
        public function containsKey( $key ) {
            return array_key_exists( $key, $this->_items );
        }

        /**
         * Determines whether the Dictionary> contains a specific value.
         *
         * @param  mixed $value The value to locate in the Dictionary.
         * @return bool  true if the Dictionary contains an element with the specified value; otherwise, false.
         */
        public function containsValue( $value ) {
            return in_array( $value, $this->_items );
        }

        /**
         * Gets a collection containing the keys in the Dictionary
         *
         * @return ArrayList A ArrayList containing the keys in the Dictionary.
         */
        public function keys() {
            return new ArrayList( array_keys( $this->_items ) );
        }

        /**
         * Bypasses a specified number of elements in the Dictionary and then returns the remaining elements.
         *
         * @param  int $count The number of elements to skip before returning the remaining elements.
         * @return Dictionary  A new Dictionary that contains the elements that occur after the specified index in this Dictionary.
         */
        public function skip( $int ) {
            return $this->skipBase( $count, true );
        }

        /**
         * Bypasses elements in the Dictionary as long as a specified condition is true and then returns the remaining elements.
         *
         * @param  callable $callable A callable to test each element for a condition.
         * @return Dictionary A Dictionary that contains the elements starting at the first element in the linear series that does not pass the test specified by predicate.
         */
        public function skipWhile( $callable ) {
            return $this->skipWhileBase( $callable, true );
        }

        /**
         * Returns a specified number of contiguous elements from the start of the Dictionary.
         *
         * @param  int $int The number of elements to return.
         * @return Dictionary A new Dictionary that contains the specified number of elements from the start of this Dictionary.
         */
        public function take( $count ) {
            return $this->takeBase( $count, true );
        }

         /**
         * Returns elements from a sequence as long as a specified condition is true.
         *
         * @param  callable $callable A function to test each element for a condition.
         * @return Dictionary A Dictionary that contains the elements that occur before the element at which the test no longer passes.
         */
        public function takeWhile( $callable ) {
            return $this->takeWhileBase( $callable, true );
        }

        /**
         * Gets a collection containing the values in the Dictionary
         *
         * @return ArrayList A ArrayList containing the values in the Dictionary.
         */
        public function values() {
            return new ArrayList( array_values( $this->_items ) );
        }



        public function first() {

        }

        public function last() {

        }

        public function orderBy( $callable ) {

        }

        public function remove( $key ) {

        }

        public function item( $index ) {

        }

        public function isEmpty() {

        }

        public function insertAt( $index, $value ) {

        }

        /**
         * Returns a string that represents the current Dictionary.
         *
         * @return string A string that represents the current Dictionary.
         */
        public function toString() {
            $tmp = array();
            foreach( $this->_items as $k => $v ) {
                $tmp[] = $k . '=>' . $v;
            }

            return implode( ',', $tmp );
        }
    }