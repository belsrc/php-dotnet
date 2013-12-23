<?php namespace PhpDotNet;

    /**
     * 
     * 
     * @package    PhpDotNet
     * @author     Bryan Kizer 
     * @copyright  2013
     * @license    http://choosealicense.com/licenses/bsd-3-clause/ BSD 3-Clause
     * @link       https://github.com/belsrc/PHP-dotNet
     */
    class General {
    
        // Strips the curly braces from a format tag.
        private static function stripTag( $tag ) {
            $tag = str_replace( '{', '', $tag );
            $tag = str_replace( '}', '', $tag );

            return $tag;
        }
        
        // Checks to make sure that the number of variables matches the number of format tags
        private static function checkMatches( $string, $count ) {
            $pattern = '/\{\d*\}/';
            $matches = array();
            preg_match_all( $pattern, $string, $matches );
            $matches = $matches[0];

            sort( $matches );
            $highest = self::stripTag( end( $matches ) );

            return $highest == $count;
        }
            
        /**
         * Determines if the given array is populated with all empty (null) values.
         * If there is an element that is an array the empty result for that element
         * will be determined by a recursive call to isArrayEmpty.
         *
         * @param  array $array The array to check.
         * @return Returns true if the array is empty, otherwise, false.
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
        
        /**
         * Replaces one or more format items in a specified string with the corresponding argument.
         *
         * @param  string $format A composite format string.
         * @param  array  $args   The array of replacement values.
         * @return string A copy of format in which any format items are replaced by the corresponding item in $args.
         */
        public static function stringFormat( $format, $args ) {
            $args = (array)$args;

            if( !self::checkMatches( $format, count( $args ) - 1 ) ) {
                throw new \Exception( 'There must be the same number of format tags as supplied values.' );
            }

            for( $i = 0; $i < count( $args ); $i++ ) {
                $find = '{' . $i . '}';
                $format = str_replace( $find, $args[$i], $format );
            }

            return $format;
        }
    }