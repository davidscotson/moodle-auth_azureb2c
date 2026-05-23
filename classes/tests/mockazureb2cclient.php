<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  See the LICENSE file.

/**
 * Mock Azure AD B2C Connect Client.
 *
 * @package    auth_azureb2c
 * @copyright  2020 Gopal Sharma <gopalsharma66@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace auth_azureb2c\tests;

/**
 * A mock azureb2cclient class providing access to all inaccessible properties/methods.
 *
 * @package    auth_azureb2c
 * @copyright  2020 Gopal Sharma <gopalsharma66@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class mockazureb2cclient extends \auth_azureb2c\azureb2cclient {
    /** @var \auth_azureb2c\httpclientinterface An HTTP client to use. */
    public $httpclient;

    /** @var array Array of endpoints. */
    public $endpoints = [];

    /** @var string The resource. */
    protected $resource;

    /**
     * Stub method to access protected parent method.
     *
     * @param string $nonce The generated nonce value.
     * @param array $stateparams Additional state parameters.
     * @return string The new state value.
     */
    public function getnewstate($nonce, array $stateparams = []) {
        return parent::getnewstate($nonce, $stateparams);
    }

    /**
     * Stub method to access protected parent method.
     *
     * @param bool $promptlogin Whether to prompt for login or use existing session.
     * @param array $stateparams Parameters to store as state.
     * @param array $extraparams Additional parameters to send with the azureb2c request.
     * @return array Array of request parameters.
     */
    public function getauthrequestparams($promptlogin = false, array $stateparams = [], array $extraparams = []) {
        return parent::getauthrequestparams($promptlogin, $stateparams, $extraparams);
    }
}
