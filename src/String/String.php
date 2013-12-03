<?php namespace PhpDotNet\String;

    /**
     * Class for modeling a string as an object.
     */
    class String {

        protected $_base = null;

        /**
         * Initializes a new instance of the String class.
         *
         * @param  string $str The string value.
         */
        public function __construct( $str = null ) {
            if( !is_null( $str ) ) {
                $this->_base = (string)$str;
            }
        }

        /**
         * Returns a value indicating whether the specified string occurs within this string.
         *
         * @param  string $value The string to seek.
         * @return bool   true if the value parameter occurs within this string, or if value is the empty string (""); otherwise, false.
         */
        public function contains( $value ) {
            if( empty( $value ) ) { return true; }

            foreach( (array)$value as $n ) {
                if( mb_strpos( $this->_base, $n ) !== false ) {
                    return true;
                }
            }

            return false;
        }

        /**
         * Returns a value indicating whether the specified string occurs within this string, ignoring case.
         *
         * @param  string $value The string to seek.
         * @return true if the value parameter occurs within this string, or if value is the empty string (""); otherwise, false.
         */
        public function containsIgnoreCase( $value ) {
            if( empty( $value ) ) { return true; }

            foreach( (array) $value as $n ) {
                if( mb_stripos( $this->_base, $n ) !== false ) {
                    return true;
                }
            }

            return false;
        }

        /**
         * Determines whether the end of this string matches the specified value.
         *
         * @param  string $value The string to compare to the substring at the end of the base string.
         * @return bool   true if value matches the end of this string; otherwise, false.
         */
        public function endsWith( $values ) {
            foreach( (array)$values as $value ) {
                if( $value == mb_substr( $this->_base, mb_strlen( $this->_base ) - mb_strlen( $value ) ) ) {
                    return true;
                }
            }

            return false;
        }

        /**
         * Gets the number of characters in this string.
         *
         * @return int The number of characters in this string.
         */
        public function length() {
            return mb_strlen( $this->_base );
        }

        /**
         * Returns a new string in which all occurrences of a specified string in this string are replaced with another specified string.
         *
         * @param  string $old  The string to be replaced.
         * @param  string $new  The string to replace all occurrences of old.
         * @return string A string that is equivalent to the this string except that all instances of old are replaced with new.
         */
        public function replace( $old, $new ) {
            return str_replace( $old, $new, $this->_base );
        }

        /**
         * Returns a new string in which the first occurrence of a specified string in this string is replaced with another specified string.
         *
         * @param  string $old The string to be replaced.
         * @param  string $new The string to replace all occurrences of old.
         * @return string A string that is equivalent to the this string except that the first instance of old is replaced with new.
         */
        public function replaceFirst( $old, $new ) {
            $position = mb_strpos( $this->_base, $old );
            $start = mb_substr( $this->_base, 0, $position );
            $end = mb_substr( $this->_base, $position + mb_strlen( $old ) );

            return $start . $new . $end;
        }

        /**
         * Returns a new string in which the last occurrence of a specified string in this string are replaced with another specified string.
         *
         * @param  string $old The string to be replaced.
         * @param  string $new The string to replace all occurrences of old.
         * @return string A string that is equivalent to this string except that the last instance of old is replaced with new.
         */
        public function replaceLast( $old, $new ) {
            $position = mb_strrpos( $this->_base, $old );
            $start = mb_substr( $this->_base, 0, $position );
            $end = mb_substr( $this->_base, $position + mb_strlen( $old ) );

            return $start . $new . $end;
        }

        /**
         * Reverses this string.
         *
         * @return string Returns the reversed string.
         */
        public function reverse() {
            return strrev( $this->_base );
        }

        /**
         * Removes all the whitespace from this string.
         *
         * @return string A string that is equivalent to this string except that the whitespace is removed.
         */
        public function stripWhiteSpace() {
            return str_replace(
                array( " ", "\n", "\t", "\r", "\0", "\x0B" ),
                '',
                $this->_base
            );
        }

        /**
         * Determines whether the start of this string matches the specified value.
         *
         * @param  string $value The string to compare to the substring at the start of the base string.
         * @return bool   true if value matches the start of this string; otherwise, false.
         */
        public function startsWith( $values ) {
            foreach( (array)$values as $value ) {
                if( mb_strpos( $this->_base, $value ) === 0 ) {
                    return true;
                }
            }

            return false;
        }

        /**
         * Truncates the beginning of a string if the length is over maximum.
         *
         * @param  int $maxLen The maximum length of the string before it gets truncated.
         * @return string Returns this string with the start truncated.
         */
        public function truncateStart( $maxLen ) {
            return '...' . mb_substr( $this->_base, mb_strlen( $this->_base ) - $maxLen - 3 );
        }

        /**
         * Truncates the ending of a string if the length is over maximum.
         *
         * @param  int $maxLen The maximum length of the string before it gets truncated.
         * @return string Returns this string with the end truncated.
         */
        public function truncateEnd( $maxLen ) {
            return mb_substr( $this->_base, 0, $maxLen + 3 ) . '...';
        }

        /**
         * Returns a copy of this string converted to lowercase.
         *
         * @return string This string in lowercase.
         */
        public function toLower() {
            return mb_strtolower( $this->_base );
        }

        /**
         * Returns a copy of this string converted to uppercase.
         *
         * @return string This string in uppercase.
         */
        public function toUpper() {
            return mb_strtoupper( $this->_base );
        }

        /**
         * Converts this string to title case (except for words that are entirely in uppercase, which are considered to be acronyms).
         *
         * @return string This string converted to title case.
         */
        public function toTitleCase() {
            $smallwordsarray = array(
                'of','a','the','and','an','or','nor','but','is','if','then','else','when',
                'at','from','by','on','off','for','in','out','over','to','into','with'
            );

            $words = explode( ' ', $this->_base );
            foreach( $words as $key => $word ) {
                if( mb_strtoupper( $word, 'utf-8') == $word ) {
                    $words[$key] = $word;
                }
                else if( $key == 0 or !in_array( $word, $smallwordsarray ) ) {
                    $words[$key] = ucwords( $word );
                }
            }

            return implode( ' ', $words );
        }

        /**
         * Converts this string to camel case.
         *
         * @return string This string converted to camel case.
         */
        public function toCamel() {
            return lcfirst( $this->toStudly( $this->_base ) );
        }

        /**
         * Converts this string to studly case.
         *
         * @return string This string converted to studly case.
         */
        public function toStudly() {
            $value = ucwords( str_replace( array( '-', '_' ), ' ', $this->_base ) );
            return str_replace( ' ', '', $value );
        }

        /**
         * Converts this string to snake case.
         *
         * @return string This string converted to snake case.
         */
        public function toSnake() {
            return $this->toLower( str_replace( array( ' ', '-' ), '_', $this->_base ) );
        }

        /**
         * Converts this string to a slug.
         *
         * @return string This string converted to a slug.
         */
        public function toSlug() {
            $value = strtolower( trim( $this->_base ) );

            $chars = array( 'ä', 'ö', 'ü', 'ß' );
            $replacements = array( 'ae', 'oe', 'ue', 'ss' );
            $value = str_replace( $chars, $replacements, $value );

            $pattern = array( '/(é|è|ë|ê)/', '/(ó|ò|ö|ô)/', '/(ú|ù|ü|û)/' );
            $replacements = array( 'e', 'o', 'u' );
            $value = preg_replace( $pattern, $replacements, $value );

            $pattern = array( ':', '!', '?', '.', '/', "'" );
            $value = str_replace( $pattern, '', $value );

            $pattern = array( '/[^a-z0-9-]/', '/-+/' );
            $value = preg_replace( $pattern, "-", $value );

            return $value;
        }

        /**
         * Removes all leading and trailing occurrences of a set of characters specified in an array from this string.
         *
         * @param  string $charList A string of characters to remove, or null.
         * @return string The string that remains after all occurrences of the characters in the trimChars parameter are removed from the start and end of the current string.
         *                If trimChars is null or an empty array, white-space characters are removed instead.
         */
        public function trim( $charList = null ) {
            return trim( $this->_base, $charList );
        }

        /**
         * Removes all leading occurrences of a set of characters specified in a string from this string.
         *
         * @param  string $charList A string of characters to remove, or null.
         * @return string The string that remains after all occurrences of characters in the trimChars parameter are removed from the start of the current string.
         *                If trimChars is null or an empty array, white-space characters are removed instead.
         */
        public function trimStart( $charList = null ) {
            return ltrim( $this->_base, $charList );
        }

        /**
         * Removes all trailing occurrences of a set of characters specified in an array from this string.
         *
         * @param  string $charList A string of characters to remove, or null.
         * @return string The string that remains after all occurrences of the characters in the trimChars parameter are removed from the end of the current string.
         *                If trimChars is null or an empty array, Unicode white-space characters are removed instead.
         */
        public function trimEnd( $charList = null ) {
            return rtrim( $this->_base, $charList );
        }

        /**
         * Returns a string that represents the current object, or in this case, the value of _base.
         *
         * @return string The value of _base.
         */
        public function __toString() {
            return $this->_base;
        }
    }