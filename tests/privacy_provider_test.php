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
 * Tests for the privacy provider.
 *
 * @package auth_azureb2c
 * @author Gopal Sharma <gopalsharma66@gmail.com>
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @copyright (C) 2020 Gopal Sharma <gopalsharma66@gmail.com>
 */

use auth_azureb2c\privacy\provider;
use core_privacy\local\request\approved_contextlist;
use core_privacy\local\request\approved_userlist;
use core_privacy\local\request\writer;
use core_privacy\tests\provider_testcase;

/**
 * Tests for the privacy provider.
 *
 * @package auth_azureb2c
 * @category test
 * @copyright 2020 Gopal Sharma <gopalsharma66@gmail.com>
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
abstract class auth_azureb2c_privacy_testcase extends provider_testcase {

    /**
     * Set up.
     */
    public function setUp(): void {
        parent::setUp();
        $this->resetAfterTest();
    }

    /**
     * Test getting contexts for a user ID.
     *
     * @covers \auth_azureb2c\privacy\provider::get_contexts_for_userid
     */
    public function test_get_contexts_for_userid(): void {
        global $DB;

        $user = $this->getDataGenerator()->create_user();
        $context = \context_user::instance($user->id);

        $tokenrec = new \stdClass();
        $tokenrec->azureb2cuniqid = 'test-id';
        $tokenrec->username = $user->username;
        $tokenrec->userid = $user->id;
        $tokenrec->azureb2cusername = 'test-user';
        $tokenrec->scope = 'openid';
        $tokenrec->resource = 'test-resource';
        $tokenrec->authcode = 'test-code';
        $tokenrec->token = 'test-token';
        $tokenrec->expiry = time() + 3600;
        $tokenrec->refreshtoken = 'test-refresh';
        $tokenrec->idtoken = 'test-idtoken';
        $DB->insert_record('auth_azureb2c_token', $tokenrec);

        $contextlist = provider::get_contexts_for_userid($user->id);
        $this->assertCount(1, $contextlist);
        $this->assertEquals($context->id, $contextlist->current()->id);
    }

    /**
     * Test getting users in a context.
     *
     * @covers \auth_azureb2c\privacy\provider::get_users_in_context
     */
    public function test_get_users_in_context(): void {
        global $DB;

        $user = $this->getDataGenerator()->create_user();
        $context = \context_user::instance($user->id);

        $tokenrec = new \stdClass();
        $tokenrec->azureb2cuniqid = 'test-id';
        $tokenrec->username = $user->username;
        $tokenrec->userid = $user->id;
        $tokenrec->azureb2cusername = 'test-user';
        $tokenrec->scope = 'openid';
        $tokenrec->resource = 'test-resource';
        $tokenrec->authcode = 'test-code';
        $tokenrec->token = 'test-token';
        $tokenrec->expiry = time() + 3600;
        $tokenrec->refreshtoken = 'test-refresh';
        $tokenrec->idtoken = 'test-idtoken';
        $DB->insert_record('auth_azureb2c_token', $tokenrec);

        $userlist = new \core_privacy\local\request\userlist($context, 'auth_azureb2c');
        provider::get_users_in_context($userlist);
        $this->assertCount(1, $userlist);
        $this->assertEquals($user->id, $userlist->get_userids()[0]);
    }

    /**
     * Test exporting user data.
     *
     * @covers \auth_azureb2c\privacy\provider::export_user_data
     */
    public function test_export_user_data(): void {
        global $DB;

        $user = $this->getDataGenerator()->create_user();
        $context = \context_user::instance($user->id);

        $tokenrec = new \stdClass();
        $tokenrec->azureb2cuniqid = 'test-id';
        $tokenrec->username = $user->username;
        $tokenrec->userid = $user->id;
        $tokenrec->azureb2cusername = 'test-user';
        $tokenrec->scope = 'openid';
        $tokenrec->resource = 'test-resource';
        $tokenrec->authcode = 'test-code';
        $tokenrec->token = 'test-token';
        $tokenrec->expiry = time() + 3600;
        $tokenrec->refreshtoken = 'test-refresh';
        $tokenrec->idtoken = 'test-idtoken';
        $DB->insert_record('auth_azureb2c_token', $tokenrec);

        $approvedcontextlist = new approved_contextlist($user, 'auth_azureb2c', [$context->id]);
        provider::export_user_data($approvedcontextlist);

        $writer = writer::with_context($context);
        $this->assertTrue($writer->has_any_data());
    }

    /**
     * Test deleting data for all users in a context.
     *
     * @covers \auth_azureb2c\privacy\provider::delete_data_for_all_users_in_context
     */
    public function test_delete_data_for_all_users_in_context(): void {
        global $DB;

        $user = $this->getDataGenerator()->create_user();
        $context = \context_user::instance($user->id);

        $tokenrec = new \stdClass();
        $tokenrec->azureb2cuniqid = 'test-id';
        $tokenrec->username = $user->username;
        $tokenrec->userid = $user->id;
        $tokenrec->azureb2cusername = 'test-user';
        $tokenrec->scope = 'openid';
        $tokenrec->resource = 'test-resource';
        $tokenrec->authcode = 'test-code';
        $tokenrec->token = 'test-token';
        $tokenrec->expiry = time() + 3600;
        $tokenrec->refreshtoken = 'test-refresh';
        $tokenrec->idtoken = 'test-idtoken';
        $DB->insert_record('auth_azureb2c_token', $tokenrec);

        provider::delete_data_for_all_users_in_context($context);
        $this->assertEquals(0, $DB->count_records('auth_azureb2c_token', ['userid' => $user->id]));
    }

    /**
     * Test deleting data for a user.
     *
     * @covers \auth_azureb2c\privacy\provider::delete_data_for_user
     */
    public function test_delete_data_for_user(): void {
        global $DB;

        $user = $this->getDataGenerator()->create_user();
        $context = \context_user::instance($user->id);

        $tokenrec = new \stdClass();
        $tokenrec->azureb2cuniqid = 'test-id';
        $tokenrec->username = $user->username;
        $tokenrec->userid = $user->id;
        $tokenrec->azureb2cusername = 'test-user';
        $tokenrec->scope = 'openid';
        $tokenrec->resource = 'test-resource';
        $tokenrec->authcode = 'test-code';
        $tokenrec->token = 'test-token';
        $tokenrec->expiry = time() + 3600;
        $tokenrec->refreshtoken = 'test-refresh';
        $tokenrec->idtoken = 'test-idtoken';
        $DB->insert_record('auth_azureb2c_token', $tokenrec);

        $approvedcontextlist = new approved_contextlist($user, 'auth_azureb2c', [$context->id]);
        provider::delete_data_for_user($approvedcontextlist);
        $this->assertEquals(0, $DB->count_records('auth_azureb2c_token', ['userid' => $user->id]));
    }

    /**
     * Test deleting data for users.
     *
     * @covers \auth_azureb2c\privacy\provider::delete_data_for_users
     */
    public function test_delete_data_for_users(): void {
        global $DB;

        $user = $this->getDataGenerator()->create_user();
        $context = \context_user::instance($user->id);

        $tokenrec = new \stdClass();
        $tokenrec->azureb2cuniqid = 'test-id';
        $tokenrec->username = $user->username;
        $tokenrec->userid = $user->id;
        $tokenrec->azureb2cusername = 'test-user';
        $tokenrec->scope = 'openid';
        $tokenrec->resource = 'test-resource';
        $tokenrec->authcode = 'test-code';
        $tokenrec->token = 'test-token';
        $tokenrec->expiry = time() + 3600;
        $tokenrec->refreshtoken = 'test-refresh';
        $tokenrec->idtoken = 'test-idtoken';
        $DB->insert_record('auth_azureb2c_token', $tokenrec);

        $approveduserlist = new approved_userlist($context, 'auth_azureb2c', [$user->id]);
        provider::delete_data_for_users($approveduserlist);
        $this->assertEquals(0, $DB->count_records('auth_azureb2c_token', ['userid' => $user->id]));
    }
}
