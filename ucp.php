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
 * User control panel for the Azure AD B2C authentication plugin.
 *
 * @package    auth_azureb2c
 * @author Gopal Sharma <gopalsharma66@gmail.com>
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @copyright (C) 2020 Gopal Sharma <gopalsharma66@gmail.com>
 */

require_once(__DIR__ . '/../../config.php');
require_once(__DIR__ . '/auth.php');

require_login();

$action = optional_param('action', '', PARAM_ALPHANUMEXT);
$auth = new auth_plugin_azureb2c();

if ($action === 'disconnectlogin') {
    $auth->disconnect(false, false, null, new moodle_url('/auth/azureb2c/ucp.php', ['action' => 'disconnectlogin']));
} else if ($action === 'disconnectlink') {
    $auth->disconnect(true);
} else if ($action === 'link') {
    $auth->handleredirect();
}

$PAGE->set_url(new moodle_url('/auth/azureb2c/ucp.php'));
$PAGE->set_context(context_user::instance($USER->id));
$PAGE->set_pagelayout('standard');
$PAGE->set_title(get_string('ucp_title', 'auth_azureb2c', $auth->config->opname));
$PAGE->set_heading(get_string('ucp_title', 'auth_azureb2c', $auth->config->opname));

echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('ucp_title', 'auth_azureb2c', $auth->config->opname));

// Status indicator.
$token = $DB->get_record('auth_azureb2c_token', ['userid' => $USER->id]);
$connected = !empty($token);

$renderdata = [
    'connected' => $connected,
    'opname' => $auth->config->opname,
];

if ($connected) {
    $renderdata['method'] = ($USER->auth === 'azureb2c') ? 'login' : 'link';
    $renderdata['remoteusername'] = $token->azureb2cusername;
}

echo $OUTPUT->render_from_template('auth_azureb2c/ucp_status', $renderdata);

echo $OUTPUT->footer();
