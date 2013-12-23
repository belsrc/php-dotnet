<?php namespace PhpDotNet\Collection;

    /**
     * The interface for the base Collection class.
     *
     * @package    PhpDotNet
     * @author     Bryan Kizer
     * @copyright  2013
     * @license    http://choosealicense.com/licenses/bsd-3-clause/ BSD 3-Clause
     * @link       https://github.com/belsrc/PHP-dotNet
     */
    interface ICollection extends \ArrayAccess, \IteratorAggregate, \Countable {
        public function all( $callable );
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
        public function isEmpty();
        public function last();
//        public function orderBy( $callable );
        public function remove( $mixed );
        public function removeAll( $callable );
        public function skip( $int );
        public function take( $int );
        public function toArray();
        public function where( $callable );
    }