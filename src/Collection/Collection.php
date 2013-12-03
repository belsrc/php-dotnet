<?php namespace PhpDotNet\Collection;

    /**
     * The base class of all Collections.
     */
    abstract class Collection implements ICollection {

        protected $_items = array();
        protected $_type;

        /**
         * Determines whether all elements of the Collection satisfy a condition.
         *
         * @param  callable $callable A callable to test each element for a condition.
         * @return bool true if every element of the source sequence passes the test in the specified callable, or if the sequence is empty; otherwise, false.
         */
        public function all( $callable ) {
            if( !is_callable( $callable ) ) {
                throw new Exception( 'The value passed must be callable.' );
            }

            $ar = array_filter( $this->_items, $callable );
            return count( $ar ) === count( $this->_items );
        }

        /**
         * Determines whether the Collection contains any elements.
         *
         * @return bool true if the Collection contains any elements; otherwise, false.
         */
        public function any() {
            return !empty( $this->_items );
        }

        /**
         * Removes all elements from the Collection.
         *
         * @return Collection the current Collection.
         */
        public function clear() {
            $this->_items = array();
            return $this;
        }

        /**
         * Returns the number of elements in the Collection.
         *
         * @return int The number of elements in the Collection.
         */
        public function count() {
            return count( $this->_items );
        }

        /**
         * Returns distinct elements from the Collection.
         *
         * @return Collection A new Collection that contains distinct elements from this Collection.
         */
        public function distinct() {
            $t = $this->_type;
            $tmp = array_unique( $this->_items );
            return new $t( $tmp );
        }

        /**
         * Performs the specified action on each element of the List.
         * Modifying the underlying collection in the body of the callable is not supported.
         *
         * @param  callable $callable The callable to perform on each element of the List.
         * @return List A copy of the source List after the foreach.
         */
        public function each( $callable ) {
            $t = $this->_type;
            if( !is_callable( $callable ) ) {
                throw new Exception( 'The value passed must be callable.' );
            }

            $tmp = array_map( $callable, $this->_items );

            return new $t( $tmp );
        }

        /**
         * Bypasses a specified number of elements in the Collection and then returns the remaining elements.
         *
         * @param  int  $count    The number of elements to skip before returning the remaining elements.
         * @param  bool $keepKeys Whether to keep the keys intacted or not.
         * @return Collection A new Collection that contains the elements that occur after the specified index in this Collection.
         */
        private function skipBase( $count, $keepKeys ) {
            $t = $this->_type;
            $tmp = array_slice( $this->_items, $count, null, $keepKeys );
            return new $t( $tmp );
        }

        /**
         * Bypasses elements in the Collection as long as a specified condition is true and then returns the remaining elements.
         *
         * @param  callable $callable A callable to test each element for a condition.
         * @param  bool     $keepKeys Whether to keep the keys intacted or not.
         * @return Collection A Collection that contains the elements starting at the first element in the linear series that does not pass the test specified by predicate.
         */
        private function skipWhileBase( $callable, $keepKeys ) {
            if( !is_callable( $callable ) ) {
                throw new Exception( 'The value passed must be callable.' );
            }

            $t = $this->_type;
            $trash = $this->_items;
            foreach( $this->_items as $k => $v ) {
                $tmp = call_user_func( $callable, $v );
                if( $tmp === true ) {
                    unset( $trash[$k] );
                }
                else {
                    break;
                }
            }

            // Not $trash only has the values after skip
            if( count( $trash ) == 0 ) {
                return new $t();
            }
            else if( count( $trash ) == $this->count() ) {
                return $this;
            }
            else {
                if( $keepKeys ) {
                    return new $t( $trash );
                }
                else {
                    return new $t( array_values( $trash ) );
                }
            }
        }

        /**
         * Returns a specified number of contiguous elements from the start of the Collection.
         *
         * @param  int  $count    The number of elements to return.
         * @param  bool $keepKeys Whether to keep the keys intacted or not.
         * @return Collection A new Collection that contains the specified number of elements from the start of this Collection.
         */
        private function takeBase( $count, $keepKeys ) {
            $t = $this->_type;
            $tmp = array_slice( $this->_items, 0, $count, $keepKeys );
            return new $t( $tmp );
        }

        /**
         * Returns elements from a sequence as long as a specified condition is true.
         *
         * @param  callable $callable A function to test each element for a condition.
         * @param  bool $keepKeys Whether to keep the keys intacted or not.
         * @return Collection A Collection that contains the elements that occur before the element at which the test no longer passes.
         */
        private function takeWhileBase( $callable, $keepKeys ) {
            if( !is_callable( $callable ) ) {
                throw new Exception( 'The value passed must be callable.' );
            }

            $t = $this->_type;
            $result = array();
            foreach( $this->_items as $k => $v ) {
                $tmp = call_user_func( $callable, $v );
                if( $tmp === true ) {
                    if( $keepKeys ) {
                        $result[$k] = $v;
                    }
                    else {
                        $result[] = $v;
                    }
                }
                else {
                    break;
                }
            }

            return new $t( $result );
        }

        /**
         * Filters a sequence of values based on a callable.
         *
         * @param  callable $callable A function to test each element for a condition.
         * @return Collection A new Collection that contains elements from this Collection that satisfy the condition.
         */
        public function where( $callable ) {
            if( !is_callable( $callable ) ) {
                throw new Exception( 'The value passed must be callable.' );
            }

            $t  = $this->_type;
            $ar = array_filter( $this->_items, $callable );

            return new $t( $ar );
        }

        /**
         * Copies the elements of the List to a new array.
         *
         * @return array An array containing copies of the elements of the List.
         */
        public function toArray() {
            return $this->_items;
        }
    }