<?php namespace Belsrc\PhpDotNet;

    /**
     * Defines methods for a disposable class.
     *
     * @package    PhpDotNet
     * @author     Bryan Kizer
     * @copyright  2013
     * @license    http://choosealicense.com/licenses/bsd-3-clause/ BSD 3-Clause
     * @link       https://github.com/belsrc/PHP-dotNet
     */
    interface IDisposable {

        /**
         * Performs tasks associated with freeing, releasing, or resetting resources.
         */
        public function dispose();
    }
