<?php namespace PhpDotNet\Collection;

    /**
     * The interface for the base Collection class.
     */
    interface ICollection extends ArrayAccess, IteratorAggregate, Countable {
        public function all();
        public function any( $callable );
        public function clear();
        public function count();
        public function distinct();
        public function find( $callable );
        public function findAll( $callable );
        public function findLast( $callable );
        public function first();
        public function each( $callable );
        public function insert( $index, $mixed );
        public function insertAt( $index, $value );
        public function isEmpty();
        public function item( $index );
        public function last();
        public function orderBy( $callable );
        public function remove( $mixed );
        public function removeAll( $callable );
        public function skip( $int );
        public function take( $int );
        public function toArray();
        public function where( $callable );
        public function getIterator();
        public function offsetExists( $index );
        public function offsetGet( $index );
        public function offsetSet( $index , $value );
        public function offsetUnset( $index );
    }