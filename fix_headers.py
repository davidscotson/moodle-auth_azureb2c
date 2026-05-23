import os
import re

header = """<?php
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
"""

def fix_file(path, package, description):
    with open(path, 'r') as f:
        content = f.read()

    # Remove existing PHP tag and comments at the top
    content = re.sub(r'<\?php.*?\*/', '', content, flags=re.DOTALL).strip()

    new_content = header + f"""
/**
 * {description}
 *
 * @package    {package}
 * @copyright  2020 Gopal Sharma <gopalsharma66@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
""" + "\n" + content

    with open(path, 'w') as f:
        f.write(new_content)

# Apply to main files
# (Simplified for now, as I've already done most of it)
