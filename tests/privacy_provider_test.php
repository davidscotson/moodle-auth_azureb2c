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
 * Tests for privacy provider.
 *
 * @package    auth_azureb2c
 * @copyright  2020 Gopal Sharma <gopalsharma66@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace auth_azureb2c\privacy;

defined('MOODLE_INTERNAL') || die();

use core_privacy\local\request\writer;
use core_privacy\local\request\approved_contextlist;
use core_privacy\local\request\approved_userlist;
use context_user;
use context_system;

/**
 * Tests for privacy provider.
 *
 * @group      auth_azureb2c
 * @group      office365
 * @coversDefaultClass \auth_azureb2c\privacy\provider
 */
class auth_azureb2c_privacy_test extends \advanced_testcase {
    /**
     * Perform setup before every test. This tells Moodle's phpunit to reset the database after every test.
     */
    protected function setUp(): void {
        parent::setUp();
        $this->resetAfterTest(true);
    }

    /**
     * Test getting contexts for a user ID.
     *
     * @covers ::get_contexts_for_userid
     */
    public function test_get_contexts_for_userid(): void {
        $user = $this->getDataGenerator()->create_user();
        self::create_token($user->id);
        self::create_prevlogin($user->id);

        $contextlist = provider::get_contexts_for_userid($user->id);
        $this->assertCount(1, $contextlist);
        $usercontext = context_user::instance($user->id);
        $this->assertEquals($usercontext->id, $contextlist->get_contextids()[0]);
    }

    /**
     * Test that only users with a user context are fetched.
     *
     * @covers ::get_users_in_context
     */
    public function test_get_users_in_context(): void {
        $component = 'auth_azureb2c';
        $user = $this->getDataGenerator()->create_user();
        $usercontext = context_user::instance($user->id);

        $userlist = new \core_privacy\local\request\userlist($usercontext, $component);
        provider::get_users_in_context($userlist);
        $this->assertCount(0, $userlist);

        self::create_token($user->id);
        self::create_prevlogin($user->id);

        provider::get_users_in_context($userlist);
        $this->assertCount(1, $userlist);
        $expected = [$user->id];
        $actual = $userlist->get_userids();
        $this->assertEquals($expected, $actual);

        $userlist = new \core_privacy\local\request\userlist(context_system::instance(), $component);
        provider::get_users_in_context($userlist);
        $this->assertCount(0, $userlist);
    }

    /**
     * Test that user data is exported correctly.
     *
     * @covers ::export_user_data
     */
    public function test_export_user_data(): void {
        $user = $this->getDataGenerator()->create_user();
        $tokenrecord = self::create_token($user->id);
        $prevloginrecord = self::create_prevlogin($user->id);

        $usercontext = \context_user::instance($user->id);

        $writer = \core_privacy\local\request\writer::with_context($usercontext);
        $this->assertFalse($writer->has_any_data());
        $approvedlist = new approved_contextlist($user, 'auth_azureb2c', [$usercontext->id]);
        provider::export_user_data($approvedlist);
        // Token.
        $data = $writer->get_data([
            get_string('privacy:metadata:auth_azureb2c', 'auth_azureb2c'),
            get_string('privacy:metadata:auth_azureb2c_token', 'auth_azureb2c'),
        ]);
        $this->assertEquals($tokenrecord->userid, $data->userid);
        $this->assertEquals($tokenrecord->token, $data->token);
        // Previous login.
        $data = $writer->get_data([
            get_string('privacy:metadata:auth_azureb2c', 'auth_azureb2c'),
            get_string('privacy:metadata:auth_azureb2c_prevlogin', 'auth_azureb2c'),
        ]);
        $this->assertEquals($prevloginrecord->userid, $data->userid);
        $this->assertEquals($prevloginrecord->method, $data->method);
        $this->assertEquals($prevloginrecord->password, $data->password);
    }

    /**
     * Test deleting all user data for a specific context.
     *
     * @covers ::delete_data_for_all_users_in_context
     */
    public function test_delete_data_for_all_users_in_context(): void {
        global $DB;

        $user1 = $this->getDataGenerator()->create_user();
        self::create_token($user1->id);
        self::create_prevlogin($user1->id);
        $user1context = \context_user::instance($user1->id);

        $user2 = $this->getDataGenerator()->create_user();
        self::create_token($user2->id);
        self::create_prevlogin($user2->id);

        $this->assertCount(2, $DB->get_records('auth_azureb2c_token', []));
        $this->assertCount(2, $DB->get_records('auth_azureb2c_prevlogin', []));

        provider::delete_data_for_all_users_in_context($user1context);

        $this->assertCount(0, $DB->get_records('auth_azureb2c_token', ['userid' => $user1->id]));
        $this->assertCount(0, $DB->get_records('auth_azureb2c_prevlogin', ['userid' => $user1->id]));

        $this->assertCount(1, $DB->get_records('auth_azureb2c_token', []));
        $this->assertCount(1, $DB->get_records('auth_azureb2c_prevlogin', []));
    }

    /**
     * This should work identical to the above test.
     *
     * @covers ::delete_data_for_user
     */
    public function test_delete_data_for_user(): void {
        global $DB;

        $user1 = $this->getDataGenerator()->create_user();
        self::create_token($user1->id);
        self::create_prevlogin($user1->id);
        $user1context = \context_user::instance($user1->id);

        $user2 = $this->getDataGenerator()->create_user();
        self::create_token($user2->id);
        self::create_prevlogin($user2->id);

        $this->assertCount(2, $DB->get_records('auth_azureb2c_token', []));
        $this->assertCount(2, $DB->get_records('auth_azureb2c_prevlogin', []));

        $approvedlist = new \core_privacy\local\request\approved_contextlist($user1, 'auth_azureb2c', [$user1context->id]);
        provider::delete_data_for_user($approvedlist);

        $this->assertCount(0, $DB->get_records('auth_azureb2c_token', ['userid' => $user1->id]));
        $this->assertCount(0, $DB->get_records('auth_azureb2c_prevlogin', ['userid' => $user1->id]));

        $this->assertCount(1, $DB->get_records('auth_azureb2c_token', []));
        $this->assertCount(1, $DB->get_records('auth_azureb2c_prevlogin', []));
    }

    /**
     * Test that data for users in approved userlist is deleted.
     *
     * @covers ::delete_data_for_users
     */
    public function test_delete_data_for_users(): void {
        $component = 'auth_azureb2c';
        $user1 = $this->getDataGenerator()->create_user();
        $usercontext1 = context_user::instance($user1->id);
        self::create_token($user1->id);
        self::create_prevlogin($user1->id);

        $user2 = $this->getDataGenerator()->create_user();
        $usercontext2 = context_user::instance($user2->id);
        self::create_token($user2->id);
        self::create_prevlogin($user2->id);

        $userlist1 = new \core_privacy\local\request\userlist($usercontext1, $component);
        provider::get_users_in_context($userlist1);
        $this->assertCount(1, $userlist1);
        $expected = [$user1->id];
        $actual = $userlist1->get_userids();
        $this->assertEquals($expected, $actual);

        $userlist2 = new \core_privacy\local\request\userlist($usercontext2, $component);
        provider::get_users_in_context($userlist2);
        $this->assertCount(1, $userlist2);
        $expected = [$user2->id];
        $actual = $userlist2->get_userids();
        $this->assertEquals($expected, $actual);

        $approvedlist = new approved_userlist($usercontext1, $component, $userlist1->get_userids());

        provider::delete_data_for_users($approvedlist);

        $userlist1 = new \core_privacy\local\request\userlist($usercontext1, $component);
        provider::get_users_in_context($userlist1);
        $this->assertCount(0, $userlist1);
        $userlist2 = new \core_privacy\local\request\userlist($usercontext2, $component);
        provider::get_users_in_context($userlist2);
        $this->assertCount(1, $userlist2);

        $systemcontext = context_system::instance();
        $approvedlist = new approved_userlist($systemcontext, $component, $userlist2->get_userids());
        provider::delete_data_for_users($approvedlist);
        $userlist2 = new \core_privacy\local\request\userlist($usercontext2, $component);
        provider::get_users_in_context($userlist2);
        $this->assertCount(1, $userlist2);
    }

    /**
     * Create a token record for the specified userid.
     *
     * @param int $userid
     * @return \stdClass
     */
    protected static function create_token(int $userid): \stdClass {
        global $DB;
        $record = new \stdClass();
        $record->azureb2cuniqid = "user@example.com";
        $record->username = "user@example.com";
        $record->userid = $userid;
        $record->azureb2cusername = "user@example.com";
        $record->scope = "All";
        $record->resource = "https://graph.windows.net";
        $record->authcode = "authcode123";
        $record->token = "token123";
        $record->expiry = 12345;
        $record->refreshtoken = "refresh123";
        $record->idtoken = "idtoken123";
        $record->id = $DB->insert_record('auth_azureb2c_token', $record);
        return $record;
    }

    /**
     * Create a previous login record for the specified userid.
     *
     * @param int $userid
     * @return \stdClass
     */
    protected static function create_prevlogin(int $userid): \stdClass {
        global $DB;
        $record = new \stdClass();
        $record->userid = $userid;
        $record->method = "manual";
        $record->password = "abc123";
        $record->id = $DB->insert_record('auth_azureb2c_prevlogin', $record);
        return $record;
    }
}
