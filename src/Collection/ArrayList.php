<?php namespace PhpDotNet\Collection;

    /**
     * Class for modeling a List object.
     *
     * @package    PhpDotNet
     * @author     Bryan Kizer
     * @copyright  2013
     * @license    http://choosealicense.com/licenses/bsd-3-clause/ BSD 3-Clause
     * @link       https://github.com/belsrc/PHP-dotNet
     */
    class ArrayList extends Collection {

        /**
         * Initializes a new instance of the ArrayList class.
         *
         * Note: If $array is not an array, it will be typecast to one (i.e. (array) $parameter).
         * This may result in unexpected behavior when using an object or NULL replacement.
         *
         * @param string|array $array The initial values to add to the collection.
         */
        public function __construct( $array = null ) {
            $this->_type = '\PhpDotNet\Collection\ArrayList';

            if( !is_null( $array ) ) {
                foreach( (array)$array as $v ) {
                    $this->_items[] = $v;
                }
            }
        }

        /**
         * Adds a(n) item(s) to the end of the ArrayList.
         *
         * Note: If $array is not an array, it will be typecast to one (i.e. (array) $parameter).
         * This may result in unexpected behavior when using an object or NULL replacement.
         *
         * @param  string|array $mixed The value(s) to be added to the end of the
         * @return ArrayList the current ArrayList.
         */
        public function add( $array ) {
            foreach( (array)$array as $a ) {
                $this->_items[] = $a;
            }

            return $this;
        }

        /**
         * Computes the average of a ArrayList of numeric values.
         *
         * @return numeric The average of the ArrayList of values.
         */
        public function average() {
            $total = 0;
            $count = count( $this->_items );
            foreach( $this->_items as $i ) {
                if( !is_numeric( $i ) ) {
                    throw new \Exception( 'The values of the ArrayList must all be numeric' );
                }

                $total += $i;
            }

            return $total / $count;
        }

        /**
         * Determines whether an element is in the ArrayList.
         *
         * @param  mixed $value The value to locate in the ArrayList.
         * @return bool true if item is found in the ArrayList; otherwise, false.
         */
        public function contains( $value ) {
            return in_array( $value, $this->_items );
        }

        /**
         * Determines whether the ArrayList contains elements that match the conditions defined by the specified callback.
         *
         * @param  callable $callable The callback that defines the conditions of the elements to search for.
         * @return bool true if the ArrayList contains one or more elements that match the conditions defined by the specified callback; otherwise, false.
         */
        public function exists( $callable ) {
            if( !is_callable( $callable ) ) {
                throw new \Exception( 'The value passed must be callable.' );
            }

            $tmp = array_filter( $this->_items, $callable );
            if( count( $tmp ) > 0 ) {
                return true;
            }
            else {
                return false;
            }
        }

        /**
         * Searches for an element that matches the conditions defined by the specified callable,
         * and returns the zero-based index of the first occurrence within the entire ArrayList.
         *
         * @param  callable $callable The callable that defines the conditions of the element to search for.
         * @return int The zero-based index of the first occurrence of an element that matches the conditions defined by the callable, if found; otherwise, –1.
         */
        public function findIndex( $callable ) {
            if( !is_callable( $callable ) ) {
                throw new \Exception( 'The value passed must be callable.' );
            }

            $tmp = array_filter( $this->_items, $callable );
            if( count( $tmp ) > 0 ) {
                reset( $tmp );
                return key( $tmp );
            }
            else {
                return -1;
            }
        }

        /**
         * Searches for an element that matches the conditions defined by the specified callable,
         * and returns the zero-based index of the last occurrence within the entire ArrayList.
         *
         * @param  callable $callable The callable that defines the conditions of the element to search for.
         * @return int The zero-based index of the last occurrence of an element that matches the conditions defined by the callable, if found; otherwise, –1.
         */
        public function findLastIndex( $callable ) {
            if( !is_callable( $callable ) ) {
                throw new \Exception( 'The value passed must be callable.' );
            }

            $tmp = array_filter( $this->_items, $callable );
            if( count( $tmp ) > 0 ) {
                $tmp = array_reverse( $tmp, true );
                reset( $tmp );

                return key( $tmp );
            }
            else {
                return -1;
            }
        }

        /**
         * Searches for the specified value and returns the zero-based index of the first occurrence within the entire ArrayList.
         *
         * @param  mixed $value The value to locate in the ArrayList.
         * @return int The zero-based index of the first occurrence of item within the entire ArrayList, if found; otherwise, –1.
         */
        public function indexOf( $value ) {
            $tmp = array_search( $value, $this->_items );
            return $tmp !== false ? $tmp : -1;
        }

        /**
         * Inserts an element into the ArrayList at the specified index.
         *
         * @param  int $index The zero-based index at which 'value' should be inserted.
         * @param  mixed $value The value to insert.
         * @return ArrayList The current ArrayList.
         */
        public function insert( $index, $value ) {
            array_splice( $this->_items, $index, 0, $value );
            return $this;
        }

        /**
         * Searches for the specified object and returns the zero-based index of the last occurrence within the entire ArrayList.
         *
         * @param  mixed $value The value to locate in the ArrayList.
         * @return int The zero-based index of the last occurrence of item within the entire the ArrayList, if found; otherwise, –1.
         */
        public function lastIndexOf( $value ) {
            $tmp = array_reverse( $this->_items, true );
            $findex = array_search( $value, $this->_items );
            return $findex !== false ? $findex : -1;
        }

        /**
         * Returns the maximum value in the ArrayList of numeric values.
         *
         * @return numeric The maximum value in the ArrayList.
         */
        public function max() {
            foreach( $this->_items as $i ) {
                if( !is_numeric( $i ) ) {
                    throw new \Exception( 'The values of the ArrayList must all be numeric' );
                }

                if( !isset( $result ) ) {
                    $result = $i;
                }
                else {
                    if( $i > $result ) {
                        $result = $i;
                    }
                }
            }

            return $result;
        }

        /**
         * Returns the minimum value in the ArrayList of numeric values.
         *
         * @return The minimum value in the ArrayList.
         */
        public function min() {
            foreach( $this->_items as $i ) {
                if( !is_numeric( $i ) ) {
                    throw new \Exception( 'The values of the ArrayList must all be numeric' );
                }

                if( !isset( $result ) ) {
                    $result = $i;
                }
                else {
                    if( $i < $result ) {
                        $result = $i;
                    }
                }
            }

            return $result;
        }

        // public function orderBy( $callable ) {  }

        /**
         * Removes the element at the specified index of the ArrayList.
         *
         * @param  int $index The zero-based index of the element to remove.
         * @return ArrayList The current ArrayList.
         */
        public function removeAt( $index ) {
            if( !is_int( $index ) ) {
                throw new \Exception( 'The value of index must be an int' );
            }

            if( $index > count( $this->_items ) - 1 ) {
                throw new \Exception( 'Index out of range.' );
            }

            unset( $this->_items[$index] );
            $this->_items = array_values( $this->_items );

            return $this;
        }

        /**
         * Removes a range of elements from the ArrayList.
         *
         * @param  int $index The zero-based starting index of the range of elements to remove.
         * @param  int $count The number of elements to remove.
         * @return ArrayList The current ArrayList.
         */
        public function removeRange( $index, $count ) {
            if( !is_int( $index ) ) {
                throw new \Exception( 'The value of index must be an int' );
            }

            if( $index > count( $this->_items ) - 1 ) {
                throw new \Exception( 'Index out of range.' );
            }

            for( $i = $index; $i < $index + $count; $i++ ) {
                unset( $this->_items[$i] );
            }

            $this->_items = array_values( $this->_items );

            return $this;
        }

        /**
         * Reverses the order of the elements in the entire ArrayList.
         *
         * @return ArrayList The current ArrayList.
         */
        public function reverse() {
            $this->_items = array_reverse( $this->_items );
            return $this;
        }

        /**
         * Bypasses a specified number of elements in the ArrayList and then returns the remaining elements.
         *
         * @param  int $count The number of elements to skip before returning the remaining elements.
         * @return ArrayList  A new ArrayList that contains the elements that occur after the specified index in this ArrayList.
         */
        public function skip( $count ) {
            return $this->skipBase( $count, false );
        }

        /**
         * Bypasses elements in the ArrayList as long as a specified condition is true and then returns the remaining elements.
         *
         * @param  callable $callable A callable to test each element for a condition.
         * @return ArrayList A ArrayList that contains the elements starting at the first element in the linear series that does not pass the test specified by predicate.
         */
        public function skipWhile( $callable ) {
            // if( !is_callable( $callable ) ) {
                // throw new \Exception( 'The value passed must be callable.' );
            // }

            // $last = 0;
            // foreach( $this->_items as $key => $item ) {
                // $tmp = call_user_func( $callable, $item );
                // if( $tmp === true ) {
                    // $last = $key;
                // }
                // else {
                    // break;
                // }
            // }

            // if( $last === 0 ) {
                // return $this;
            // }
            // else {
                // if( $last < count( $this->_items ) - 1 ) {
                    // return $this->skip( $last + 1 );
                // }
                // else {
                    // return new ArrayList();
                // }
            // }
            return $this->skipWhileBase( $callable, false );
        }

        /**
         * Sorts the elements in the entire ArrayList using the specified callable.
         *
         * @param  callable $sortFlags The callable to use in the sorting.
         * @return ArrayList The current ArrayList.
         */
        public function sort( $callable ) {
            usort( $this->_items, $callable );
            return $this;
        }

        /**
         * Computes the sum of a ArrayList of numeric values.
         *
         * @return numeric The sum of the values in the ArrayList.
         */
        public function sum() {
            $result = 0;
            foreach( $this->_items as $i ) {
                if( !is_numeric( $i ) ) {
                    throw new \Exception( 'The values of the ArrayList must all be numeric' );
                }

                $result += $i;
            }

            return $result;
        }

        /**
         * Returns a specified number of contiguous elements from the start of the ArrayList.
         *
         * @param  int $int The number of elements to return.
         * @return ArrayList A new ArrayList that contains the specified number of elements from the start of this ArrayList.
         */
        public function take( $count ) {
            return $this->takeBase( $count, false );
        }

        /**
         * Returns elements from a sequence as long as a specified condition is true.
         *
         * @param  callable $callable A function to test each element for a condition.
         * @return ArrayList A ArrayList that contains the elements that occur before the element at which the test no longer passes.
         */
        public function takeWhile( $callable ) {
            return $this->takeWhileBase( $callable, false );
        }

        /**
         * Returns a string that represents the current ArrayList.
         *
         * @return string A string that represents the current ArrayList.
         */
        public function toString() {
            return implode( ',', $this->_items );
        }

        /**
         * Returns a string that represents the current ArrayList.
         *
         * @return string A string that represents the current ArrayList.
         */
        public function __toString() {
            return $this->toString();
        }
    }