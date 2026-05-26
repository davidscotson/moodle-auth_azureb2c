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
 * Tests for the JWT class.
namespace auth_azureb2c;
 *
 * @package    auth_azureb2c
 * @author Gopal Sharma <gopalsharma66@gmail.com>
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @copyright (C) 2020 Gopal Sharma <gopalsharma66@gmail.com>
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Tests for the JWT class.
 *
 * @package    auth_azureb2c
 * @category test
 * @copyright 2020 Gopal Sharma <gopalsharma66@gmail.com>
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class jwt_testcase extends \advanced_testcase {
    /**
     * Data provider for decode tests.
     *
     * @return array Array of arrays of test parameters.
     */
    public static function dataprovider_decode(): array {
        $tests = [];

        $tests['empty'] = [
            null,
            ['moodle_exception', 'Encoded JWT cannot be empty.'],
        ];

        $tests['not_string'] = [
            100,
            ['moodle_exception', 'Encoded JWT cannot be empty.'],
        ];

        $tests['malformed'] = [
            'one.two',
            ['moodle_exception', 'Malformed JWT received.'],
        ];

        $tests['invalid_header'] = [
            'one.two.three',
            ['moodle_exception', 'Could not read JWT header.'],
        ];

        $tests['missing_alg'] = [
            base64_encode(json_encode(['typ' => 'JWT'])) . '.two.three',
            ['moodle_exception', 'Invalid JWT header received.'],
        ];

        $tests['unsupported_alg'] = [
            base64_encode(json_encode(['alg' => 'HS100'])) . '.two.three',
            ['moodle_exception', 'Unsupported JWS algorithm received.'],
        ];

        // Valid JWTs.
        $header = ['alg' => 'HS256', 'typ' => 'JWT'];
        $payload = ['sub' => '1234567890', 'name' => 'John Doe', 'iat' => 1516239022];
        $encoded = base64_encode(json_encode($header)) . '.' . base64_encode(json_encode($payload)) . '.signature';
        $tests['valid_hs256'] = [
            $encoded,
            [$header, $payload],
        ];

        $header = ['alg' => 'RS256', 'typ' => 'JWT'];
        $payload = ['sub' => '1234567890', 'name' => 'John Doe', 'iat' => 1516239022];
        $encoded = base64_encode(json_encode($header)) . '.' . base64_encode(json_encode($payload)) . '.signature';
        $tests['valid_rs256'] = [
            $encoded,
            [$header, $payload],
        ];

        $header = ['alg' => 'none', 'typ' => 'JWT'];
        $payload = ['sub' => '1234567890', 'name' => 'John Doe', 'iat' => 1516239022];
        $encoded = base64_encode(json_encode($header)) . '.' . base64_encode(json_encode($payload)) . '.signature';
        $tests['valid_none'] = [
            $encoded,
            [$header, $payload],
        ];

        return $tests;
    }

    /**
     * Test decoding JWTs.
     *
     * @param string $encoded Encoded JWT.
     * @param array $expectedexpected Expected result or exception.
     *
     * @dataProvider dataprovider_decode
     * @covers \auth_azureb2c\jwt::decode
     */
    public function test_decode($encoded, array $expectedexpected): void {
        if (is_string($expectedexpected[0]) && class_exists($expectedexpected[0])) {
            $this->expectException($expectedexpected[0]);
        }

        $result = \auth_azureb2c\jwt::decode($encoded);
        $this->assertEquals($expectedexpected, $result);
    }
}
