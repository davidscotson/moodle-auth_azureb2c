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
 * Language strings for the Azure AD B2C Connect plugin.
 *
 * @package    auth_azureb2c
 * @copyright  2020 Gopal Sharma <gopalsharma66@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['pluginname'] = 'Azure AD B2C Connect';
$string['cfg_scope_key'] = 'Scope';
$string['cfg_scope_desc'] = 'The scope of the token request.';
$string['cfg_clientid_key'] = 'Client ID';
$string['cfg_clientid_desc'] = 'The registered client ID.';
$string['cfg_clientsecret_key'] = 'Client secret';
$string['cfg_clientsecret_desc'] = 'The registered client secret.';
$string['cfg_authendpoint_key'] = 'Authorization endpoint';
$string['cfg_authendpoint_desc'] = 'The authorization endpoint to use.';
$string['cfg_resetpassendpoint_key'] = 'Reset password endpoint';
$string['cfg_resetpassendpoint_desc'] = 'The reset password endpoint to use.';
$string['cfg_editprofileendpoint_key'] = 'Edit profile endpoint';
$string['cfg_editprofileendpoint_desc'] = 'The edit profile endpoint to use.';
$string['cfg_tokenendpoint_key'] = 'Token endpoint';
$string['cfg_tokenendpoint_desc'] = 'The token endpoint to use.';
$string['cfg_azureb2cresource_key'] = 'Resource';
$string['cfg_azureb2cresource_desc'] = 'The resource for which to send the request.';
$string['cfg_opname_key'] = 'Provider name';
$string['cfg_opname_desc'] = 'Custom provider name.';
$string['cfg_redirecturi_key'] = 'Redirect URI';
$string['cfg_redirecturi_desc'] = 'The URI to register as the "Redirect URI".';
$string['cfg_autoappend_key'] = 'Auto-append domain';
$string['cfg_autoappend_desc'] = 'Domain to auto-append to usernames.';
$string['cfg_domainhint_key'] = 'Domain hint';
$string['cfg_domainhint_desc'] = 'Domain hint for login.';
$string['cfg_loginflow_key'] = 'Login flow';
$string['cfg_userrestrictions_key'] = 'User restrictions';
$string['cfg_userrestrictions_desc'] = 'Regular expression to restrict allowed users.';
$string['cfg_debugmode_key'] = 'Debug mode';
$string['cfg_debugmode_desc'] = 'Enable debug logging.';
$string['cfg_o365mapping_key'] = 'Office 365 mapping';
$string['cfg_o365mapping_desc'] = 'Map to existing Office 365 connections.';
$string['cfg_icon_key'] = 'Icon';
$string['cfg_icon_desc'] = 'The icon to use for the login link.';
$string['cfg_iconalt_o365'] = 'Office 365';
$string['cfg_iconalt_locked'] = 'Locked';
$string['cfg_iconalt_lock'] = 'Lock';
$string['cfg_iconalt_go'] = 'Go';
$string['cfg_iconalt_stop'] = 'Stop';
$string['cfg_iconalt_user'] = 'User';
$string['cfg_iconalt_user2'] = 'User 2';
$string['cfg_iconalt_key'] = 'Key';
$string['cfg_iconalt_group'] = 'Group';
$string['cfg_iconalt_group2'] = 'Group 2';
$string['cfg_iconalt_mnet'] = 'MNet';
$string['cfg_iconalt_userlock'] = 'User lock';
$string['cfg_iconalt_plus'] = 'Plus';
$string['cfg_iconalt_check'] = 'Check';
$string['cfg_iconalt_rightarrow'] = 'Right arrow';
$string['cfg_customicon_key'] = 'Custom icon';
$string['cfg_customicon_desc'] = 'Custom icon file.';

$string['errorauthdisconnectemptypassword'] = 'Password cannot be empty';
$string['errorauthdisconnectemptyusername'] = 'Username cannot be empty';
$string['errorauthdisconnectusernameexists'] = 'That username is already taken. Please choose a different one.';
$string['errorauthdisconnectnewmethod'] = 'Use Login Method';
$string['errorauthdisconnectinvalidmethod'] = 'Invalid login method received.';
$string['errorauthdisconnectifmanual'] = 'If using the manual login method, enter credentials below.';
$string['errorauthgeneral'] = 'There was a problem logging you in. Please contact your administrator for assistance.';
$string['errorauthinvalididtoken'] = 'Invalid id_token received.';
$string['errorauthloginfaileddupemail'] = 'Invalid login: Your account has the same email address as another user on this Moodle, duplicate email addresses are blocked.';
$string['errorauthloginfailednouser'] = 'Invalid login: User not found in Moodle.';
$string['errorauthnoauthcode'] = 'No authorization code was received from the identity server.';
$string['errorauthnocreds'] = 'Please configure Azure AD B2C Connect client credentials.';
$string['errorauthnoendpoints'] = 'Please configure Azure AD B2C Connect server endpoints.';
$string['errorauthnohttpclient'] = 'Please set an HTTP client.';
$string['errorauthnoidtoken'] = 'Azure AD B2C Connect id_token not received.';
$string['errorauthunknownstate'] = 'Unknown state.';
$string['errorauthuseralreadyconnected'] = 'You\'re already connected to a different Azure AD B2C Connect user.';
$string['errorauthuserconnectedtodifferent'] = 'The Azure AD B2C Connect user that authenticated is already connected to a Moodle user.';
$string['errorbadloginflow'] = 'Invalid authentication type specified.';
$string['errorjwtbadpayload'] = 'Could not read JWT payload.';
$string['errorjwtcouldnotreadheader'] = 'Could not read JWT header';
$string['errorjwtempty'] = 'Empty or non-string JWT received.';
$string['errorjwtinvalidheader'] = 'Invalid JWT header';
$string['errorjwtmalformed'] = 'Malformed JWT received.';
$string['errorjwtunsupportedalg'] = 'JWS Alg or JWE not supported';
$string['errorlogintoconnectedaccount'] = 'This Azure AD B2C user is connected to a Moodle account, but login is not enabled.';
$string['errorazureb2cnotenabled'] = 'The Azure AD B2C Connect authentication plugin is not enabled.';
$string['errornodisconnectionauthmethod'] = 'Cannot disconnect because there is no enabled authentication plugin to fall back to.';
$string['errorazureb2cclientinvalidendpoint'] = 'Invalid Endpoint URI received.';
$string['errorazureb2cclientnocreds'] = 'Please set client credentials.';
$string['errorazureb2cclientnoauthendpoint'] = 'No authorization endpoint set.';
$string['errorazureb2cclientnotokenendpoint'] = 'No token endpoint set.';
$string['errorazureb2cclientinsecuretokenendpoint'] = 'The token endpoint must be using SSL/TLS for this.';
$string['errorrestricted'] = 'This site has restrictions in place.';
$string['errorucpinvalidaction'] = 'Invalid action received.';
$string['errorazureb2ccall'] = 'Error in Azure AD B2C Connect.';
$string['errorazureb2ccall_message'] = 'Error in Azure AD B2C Connect: {$a}';
$string['errorinvalidredirect_message'] = 'The URL you are trying to redirect to does not exist.';
$string['errorsesskey'] = 'Session key mismatch.';

$string['eventuserauthed'] = 'User authorized with Azure AD B2C Connect';
$string['eventusercreated'] = 'User created with Azure AD B2C Connect';
$string['eventuserconnected'] = 'User connected to Azure AD B2C Connect';
$string['eventuserloggedin'] = 'User logged in with Azure AD B2C Connect';
$string['eventuserdisconnected'] = 'User disconnected from Azure AD B2C Connect';

$string['azureb2c:manageconnection'] = 'Allow Azure AD B2C Connection and Disconnection';
$string['azureb2c:manageconnectionconnect'] = 'Allow Azure AD B2C Connection';
$string['azureb2c:manageconnectiondisconnect'] = 'Allow Azure AD B2C Disconnection';

$string['privacy:metadata:auth_azureb2c'] = 'Azure AD B2C Connect Authentication';
$string['privacy:metadata:auth_azureb2c_prevlogin'] = 'Previous login methods';
$string['privacy:metadata:auth_azureb2c_prevlogin:userid'] = 'The ID of the Moodle user';
$string['privacy:metadata:auth_azureb2c_prevlogin:method'] = 'The previous login method';
$string['privacy:metadata:auth_azureb2c_prevlogin:password'] = 'The previous user password.';
$string['privacy:metadata:auth_azureb2c_token'] = 'Azure AD B2C Connect tokens';
$string['privacy:metadata:auth_azureb2c_token:azureb2cuniqid'] = 'The azureb2c unique user identifier.';
$string['privacy:metadata:auth_azureb2c_token:username'] = 'The username of the Moodle user';
$string['privacy:metadata:auth_azureb2c_token:userid'] = 'The user ID of the Moodle user';
$string['privacy:metadata:auth_azureb2c_token:azureb2cusername'] = 'The username of the azureb2c user';
$string['privacy:metadata:auth_azureb2c_token:scope'] = 'The scope of the token';
$string['privacy:metadata:auth_azureb2c_token:resource'] = 'The resource of the token';
$string['privacy:metadata:auth_azureb2c_token:authcode'] = 'The auth code for the token';
$string['privacy:metadata:auth_azureb2c_token:token'] = 'The token';
$string['privacy:metadata:auth_azureb2c_token:expiry'] = 'The token expiry';
$string['privacy:metadata:auth_azureb2c_token:refreshtoken'] = 'The token refresh token';
$string['privacy:metadata:auth_azureb2c_token:idtoken'] = 'The token id token';

$string['ucp_general_intro'] = 'Manage your connection to {$a}.';
$string['ucp_login_start'] = 'Start using {$a} to log in to Moodle';
$string['ucp_login_start_desc'] = 'Switch your account to use {$a}.';
$string['ucp_login_stop'] = 'Stop using {$a} to log in to Moodle';
$string['ucp_login_stop_desc'] = 'Disconnect your Moodle account from {$a}.';
$string['ucp_login_status'] = '{$a} login is:';
$string['ucp_status_enabled'] = 'Enabled';
$string['ucp_status_disabled'] = 'Disabled';
$string['ucp_disconnect_title'] = '{$a} Disconnection';
$string['ucp_disconnect_details'] = 'Disconnect your Moodle account from {$a}.';
$string['ucp_title'] = '{$a} Management';
$string['ucp_o365accountconnected'] = 'This Azure AD B2C account is already connected.';
$string['source_of_info'] = "How did you learn about us?";
$string['gender'] = "Gender";
$string['lang'] = "Language";
