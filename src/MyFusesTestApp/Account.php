<?php
/**
 * MyFuses Framework (http://myfuses.candango.org)
 *
 * @link      http://github.com/candango/myfuses
 * @copyright Copyright (c) 2006 - 2018 Flavio Garcia
 * @license   https://www.apache.org/licenses/LICENSE-2.0  Apache-2.0
 */

namespace Candango\MyFusesTestApp
{
    /**
     * Account - Account.php
     *
     * This is a test class to be used with namespace
     *
     * @category   controller
     * @package    Candango.MyFusesTestApp
     * @author     Flavio Garcia <piraz at candango.org>
     */
    class Account
    {
        private $name;

        public function __construct($name)
        {
            $this->setName($name);
        }

        public function getName()
        {
            return $this->name;
        }

        public function setName($name)
        {
            $this->name = $name;
        }
    }
}
