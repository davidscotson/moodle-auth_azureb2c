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
 * Library of functions for the Azure AD B2C authentication plugin.
 *
 * @package    auth_azureb2c
 * @author Gopal Sharma <gopalsharma66@gmail.com>
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @copyright (C) 2020 Gopal Sharma <gopalsharma66@gmail.com>
 */

/**
 * Initialize custom icon.
 *
 * @return void
 */
function auth_azureb2c_initialize_customicon() {
    $config = get_config('auth_azureb2c');
    if (empty($config->customicon) || $config->customicon == 0) {
        return;
    }

    $fs = get_file_storage();
    $context = context_system::instance();
    $icon = $fs->get_file($context->id, 'auth_azureb2c', 'customicon', 0, '/', 'customicon');
    if (!$icon) {
        return;
    }
}
