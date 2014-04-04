<?php namespace Belsrc\PhpDotNet;

    /**
     * Class for containing general use methods.
     *
     * @package    PhpDotNet
     * @author     Bryan Kizer
     * @copyright  2013
     * @license    http://choosealicense.com/licenses/bsd-3-clause/ BSD 3-Clause
     * @link       https://github.com/belsrc/PHP-dotNet
     */
    class General {

        /**
         * Determines if the given array is populated with all empty (null) values.
         * If there is an element that is an array the empty result for that element
         * will be determined by a recursive call to isArrayEmpty.
         *
         * @param  array $array The array to check.
         * @return bool  Returns true if the array is empty, otherwise, false.
         */
        public static function isArrayEmpty( $array ) {
            if( empty( $array ) ) { return true; }

            $tmp = array_filter(
                $array,
                function( $element ) {
                    if( is_array( $element ) ) {
                        return !self::isArrayEmpty( $element );
                    }

                    return !empty( $element );
                }
            );

            return empty( $tmp );
        }
    }
