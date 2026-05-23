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
 * Upgrade logic for the Azure AD B2C Connect plugin.
 *
 * @package    auth_azureb2c
 * @copyright  2020 Gopal Sharma <gopalsharma66@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Upgrade the auth_azureb2c plugin.
 *
 * @param int $oldversion The version we are upgrading from.
 * @return bool Result of the upgrade.
 */
function xmldb_auth_azureb2c_upgrade($oldversion) {
    global $DB;

    $dbman = $DB->get_manager();
    $result = true;

    if ($result && $oldversion < 2014111703) {
        // Lengthen field.
        $table = new xmldb_table('auth_azureb2c_token');
        $field = new xmldb_field('scope', XMLDB_TYPE_CHAR, '255', null, XMLDB_NOTNULL, null, null, 'username');
        $dbman->change_field_type($table, $field);

        upgrade_plugin_savepoint($result, '2014111703', 'auth', 'azureb2c');
    }

    if ($result && $oldversion < 2015012702) {
        $table = new xmldb_table('auth_azureb2c_state');
        $field = new xmldb_field('additionaldata', XMLDB_TYPE_TEXT, null, null, null, null, null, 'timecreated');
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }
        upgrade_plugin_savepoint($result, '2015012702', 'auth', 'azureb2c');
    }

    if ($result && $oldversion < 2015012703) {
        $table = new xmldb_table('auth_azureb2c_token');
        $field = new xmldb_field('azureb2cusername', XMLDB_TYPE_CHAR, '255', null, XMLDB_NOTNULL, null, null, 'username');
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }
        upgrade_plugin_savepoint($result, '2015012703', 'auth', 'azureb2c');
    }

    if ($result && $oldversion < 2015012707) {
        if (!$dbman->table_exists('auth_azureb2c_prevlogin')) {
            $dbman->install_one_table_from_xmldb_file(__DIR__ . '/install.xml', 'auth_azureb2c_prevlogin');
        }
        upgrade_plugin_savepoint($result, '2015012707', 'auth', 'azureb2c');
    }

    if ($result && $oldversion < 2015012710) {
        // Lengthen field.
        $table = new xmldb_table('auth_azureb2c_token');
        $field = new xmldb_field('scope', XMLDB_TYPE_TEXT, null, null, null, null, null, 'azureb2cusername');
        $dbman->change_field_type($table, $field);
        upgrade_plugin_savepoint($result, '2015012710', 'auth', 'azureb2c');
    }

    if ($result && $oldversion < 2018051700.01) {
        $table = new xmldb_table('auth_azureb2c_token');
        $field = new xmldb_field('userid', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, '0', 'username');
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }
        upgrade_plugin_savepoint($result, '2018051700.01', 'auth', 'azureb2c');
    }

    if ($result && $oldversion < 2023030701) {
        $table = new xmldb_table('auth_azureb2c_state');
        $field = new xmldb_field('sesskey', XMLDB_TYPE_CHAR, '10', null, XMLDB_NOTNULL, null, null, 'id');
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }
        upgrade_plugin_savepoint($result, '2023030701', 'auth', 'azureb2c');
    }

    return $result;
}
