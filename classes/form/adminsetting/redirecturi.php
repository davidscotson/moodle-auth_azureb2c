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
 * @package auth_azureb2c
 * @author Gopal Sharma <gopalsharma66@gmail.com>
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @copyright (C) 2020 Gopal Sharma <gopalsharma66@gmail.com>
 */

namespace auth_azureb2c\form\adminsetting;

/**
 * Displays the redirect URI for easier config.
 */
class redirecturi extends \admin_setting {

    /**
     * Constructor.
     *
     * @param string $name The name.
     * @param string $heading The heading.
     * @param string $description The description.
     */
    public function __construct($name, $heading, $description) {
        $this->nosave = true;
        parent::__construct($name, $heading, $description, '');
    }

    /**
     * Always returns true because we have no real setting.
     *
     * @return bool Always returns true
     */
    public function get_setting() {
        return true;
    }

    /**
     * Always returns true because we have no real setting.
     *
     * @return bool Always returns true
     */
    public function get_defaultsetting() {
        return true;
    }

    /**
     * Write setting.
     *
     * @param string $data The data.
     * @return bool
     */
    public function write_setting($data) {
        return '';
    }

    /**
     * Output HTML.
     *
     * @param string $data The data.
     * @param string $query The query.
     * @return string
     */
    public function output_html($data, $query = '') {
        global $CFG;
        $redirecturl = \auth_azureb2c\utils::get_redirecturl();
        $html = \html_writer::tag('h5', $redirecturl);
        return format_admin_setting($this, $this->visiblename, $html, $this->description, true, '', null, $query);
    }
}
