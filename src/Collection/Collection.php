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
                throw new \Exception( 'The value passed must be callable.' );
            }

            $ar = array_filter( $this->_items, $callable );
            return count( $ar ) === count( $this->_items );
        }

        /**
         * Determines whether the Collection contains any elements.
         *
         * @param  callable $callable A callable to test each element for a condition.
         * @return bool true if the Collection contains any elements; otherwise, false.
         */
        public function any( $callable ) {
            if( !is_callable( $callable ) ) {
                throw new \Exception( 'The value passed must be callable.' );
            }

            $ar = array_filter( $this->_items, $callable );
            return count( $ar ) > 0;
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
                throw new \Exception( 'The value passed must be callable.' );
            }

            $tmp = array_map( $callable, $this->_items );

            return new $t( $tmp );
        }

        /**
         * Searches for an element that matches the conditions defined by the specified callable,
         * and returns the first occurrence within the entire ArrayList.
         *
         * @param  callable $callable The callable that defines the conditions of the element to search for.
         * @return mixed The first element that matches the conditions defined by the specified predicate, if found; otherwise, null.
         */
        public function find( $callable ) {
            if( !is_callable( $callable ) ) {
                throw new \Exception( 'The value passed must be callable.' );
            }

            $tmp = array_filter( $this->_items, $callable );
            if( count( $tmp ) > 0 ) {
                return reset( $tmp );
            }
            else {
                return null;
            }
        }

        /**
         * Retrieves all the elements that match the conditions defined by the specified callable.
         *
         * @param  callable $callable The callable that defines the conditions of the elements to search for.
         * @return ArrayList A ArrayList containing all the elements that match the conditions defined by the specified callable, if found; otherwise, an empty ArrayList.
         */
        public function findAll( $callable ) {
            return $this->where( $callable );
        }

        /**
         * Searches for an element that matches the conditions defined by the specified callable,
         * and returns the last occurrence within the entire ArrayList.
         *
         * @param  callable $callable The callable that defines the conditions of the element to search for.
         * @return mixed The last element that matches the conditions defined by the specified callable, if found; otherwise, null.
         */
        public function findLast( $callable ) {
            if( !is_callable( $callable ) ) {
                throw new \Exception( 'The value passed must be callable.' );
            }

            $tmp = array_filter( $this->_items, $callable );
            if( count( $tmp ) > 0 ) {
                return end( $tmp );
            }
            else {
                return null;
            }
        }

        /**
         * Returns the first element of the Collection.
         *
         * @return mixed The first element in the Collection.
         */
        public function first() {
            return count( $this->_items ) > 0 ? reset( $this->_items ) : null;
        }

        /**
         * Determines if the Collection contains any items.
         *
         * @return bool true if the Collection contains any items, otherwise, false;
         */
        public function isEmpty() {
            return count( $this->_items ) > 0;
        }

        /**
         * Returns the last element of the Collection.
         *
         * @return mixed The value at the last position in the Collection.
         */
        public function last() {
            return count( $this->_items ) > 0 ? end( $this->_items ) : null;
        }

        /**
         * Removes the first occurrence of a specific object from the Collection.
         *
         * @param  mixed $value The value to remove from the Collection.
         * @return Collection the current Collection.
         */
        public function remove( $value ) {
            $index = array_search( $value, $this->_items );

            if( $index ) {
                unset( $this->_items[$index] );

                // If its an ArrayList we need to reindex the array
                if( $this->_type === '\PhpDotNet\Collection\ArrayList' ) {
                    $this->_items = array_values( $this->_items );
                }
            }

            return $this;
        }

        /**
         * Removes all the elements that match the conditions defined by the specified callable.
         *
         * @param  callable $callable The callable that defines the conditions of the elements to remove.
         * @return ArrayList the current ArrayList.
         */
        public function removeAll( $callable ) {
            if( !is_callable( $callable ) ) {
                throw new \Exception( 'The value passed must be callable.' );
            }

            $ar = array();

            foreach( $this->_items as $key => $item ) {
                $tmp = $callable( $item );

                if( !is_bool( $tmp ) ) {
                    throw new \Exception( 'The callback must return a boolean.' );
                }

                if( $tmp === true ) {
                    $ar[] = $key;
                }
            }

            foreach( $ar as $a ) {
                unset( $this->_items[$a] );
            }

            // If its an ArrayList we need to reindex the array
            if( $this->_type === '\PhpDotNet\Collection\ArrayList' ) {
                $this->_items = array_values( $this->_items );
            }

            return $this;
        }

        /**
         * Bypasses a specified number of elements in the Collection and then returns the remaining elements.
         *
         * @param  int  $count    The number of elements to skip before returning the remaining elements.
         * @param  bool $keepKeys Whether to keep the keys intacted or not.
         * @return Collection A new Collection that contains the elements that occur after the specified index in this Collection.
         */
        protected function skipBase( $count, $keepKeys ) {
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
        protected function skipWhileBase( $callable, $keepKeys ) {
            if( !is_callable( $callable ) ) {
                throw new \Exception( 'The value passed must be callable.' );
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
        protected function takeBase( $count, $keepKeys ) {
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
        protected function takeWhileBase( $callable, $keepKeys ) {
            if( !is_callable( $callable ) ) {
                throw new \Exception( 'The value passed must be callable.' );
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
                throw new \Exception( 'The value passed must be callable.' );
            }

            $t  = $this->_type;
            $ar = array_filter( $this->_items, $callable );

            // $reflect = new \ReflectionClass( $this );
            // return $reflect->newInstance( $tmp );

            return new $t( $ar );
        }

        /**
         * Copies the elements of the Colleciton to a new array.
         *
         * @return array An array containing copies of the elements of the ArrayList.
         */
        public function toArray() {
            return $this->_items;
        }

        // IteratorAggregate  Interface method implementations

        /**
         * Retrieve an external iterator for the items.
         *
         * @return ArrayIterator An instance of an object implementing Iterator or Traversable.
         */
        public function getIterator() {
            return new ArrayIterator( $this->_items );
        }

        // ArrayAccess Interface method implementations

        /**
         * Whether or not an index exists.
         *
         * @param  int $index The zero-based index to check for.
         * @return bool true if the ArrayList contains the key; otherwise, false.
         */
        public function offsetExists( $index ) {
            return array_key_exists( $index, $this->_items );
        }

        /**
         * Get an item at a given index.
         *
         * @param  int $index The zero-based index to get the element from.
         * @return mixed The element at the specified index.
         */
        public function offsetGet( $index ) {
            return $this->_items[ $index ];
        }

        /**
         * Assigns a value to the specified index.
         *
         * @param  int $index The zero-based index to assign the value to.
         * @param  mixed $value The value to assign.
         */
        public function offsetSet( $index, $value ) {
            if( is_null( $key ) ) {
                $this->_items[] = $value;
            }
            else {
                $this->_items[$key] = $value;
            }
        }

        /**
         * Unset the item at a given index.
         *
         * @param int $index The zero-based index to unset the value of.
         */
        public function offsetUnset( $index ) {
            unset( $this->_items[$index] );
        }
    }