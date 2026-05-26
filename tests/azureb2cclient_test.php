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
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Tests for the Azure AD B2C client.
namespace auth_azureb2c;
 *
 * @package    auth_azureb2c
 * @author Gopal Sharma <gopalsharma66@gmail.com>
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @copyright (C) 2020 Gopal Sharma <gopalsharma66@gmail.com>
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Tests for the Azure AD B2C client.
 *
 * @package    auth_azureb2c
 * @category test
 * @copyright 2020 Gopal Sharma <gopalsharma66@gmail.com>
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class azureb2cclient_testcase extends \advanced_testcase {
    /**
     * Test credentials getters and setters.
     *
     * @covers \auth_azureb2c\azureb2cclient::setcreds
     * @covers \auth_azureb2c\azureb2cclient::get_clientid
     * @covers \auth_azureb2c\azureb2cclient::get_clientsecret
     * @covers \auth_azureb2c\azureb2cclient::get_redirecturi
     * @covers \auth_azureb2c\azureb2cclient::get_resource
     */
    public function test_creds_getters_and_setters(): void {
        $mockhttpclient = new \auth_azureb2c\tests\mockhttpclient();
        $client = new \auth_azureb2c\azureb2cclient($mockhttpclient);

        $id = 'test-id';
        $secret = 'test-secret';
        $redirecturi = 'http://example.com/redirect';
        $resource = 'https://graph.microsoft.com';

        $client->setcreds($id, $secret, $redirecturi, $resource);

        $this->assertEquals($id, $client->get_clientid());
        $this->assertEquals($secret, $client->get_clientsecret());
        $this->assertEquals($redirecturi, $client->get_redirecturi());
        $this->assertEquals($resource, $client->get_resource());
    }

    /**
     * Data provider for endpoints tests.
     *
     * @return array Array of arrays of test parameters.
     */
    public static function dataprovider_endpoints(): array {
        $tests = [];

        $tests['oneinvalid'] = [
            ['auth' => 100],
            ['Exception', 'Invalid Endpoint URI received.'],
        ];

        $tests['oneinvalidonevalid1'] = [
            ['auth' => 100, 'token' => 'http://example.com/token'],
            ['Exception', 'Invalid Endpoint URI received.'],
        ];

        $tests['oneinvalidonevalid2'] = [
            ['token' => 'http://example.com/token', 'auth' => 100],
            ['Exception', 'Invalid Endpoint URI received.'],
        ];

        $tests['onevalid'] = [
            ['token' => 'http://example.com/token'],
            [],
        ];

        $tests['twovalid'] = [
            ['auth' => 'http://example.com/auth', 'token' => 'http://example.com/token'],
            [],
        ];

        return $tests;
    }

    /**
     * Test setting and getting endpoints.
     *
     * @param array $endpoints Array of endpoints to set.
     * @param array $expectedexpected Array containing expected exception and message.
     *
     * @dataProvider dataprovider_endpoints
     * @covers \auth_azureb2c\azureb2cclient::setendpoints
     * @covers \auth_azureb2c\azureb2cclient::get_endpoint
     */
    public function test_endpoints_getters_and_setters(array $endpoints, array $expectedexpected): void {
        $mockhttpclient = new \auth_azureb2c\tests\mockhttpclient();
        $client = new \auth_azureb2c\azureb2cclient($mockhttpclient);

        if (!empty($expectedexpected)) {
            $this->expectException($expectedexpected[0]);
            // Depending on Moodle version, the message might be different or not set.
        }

        $client->setendpoints($endpoints);

        foreach ($endpoints as $type => $uri) {
            $this->assertEquals($uri, $client->get_endpoint($type));
        }
    }
}
