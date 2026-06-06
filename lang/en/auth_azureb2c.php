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
 * Language strings.
 *
 * @package auth_azureb2c
 * @author Gopal Sharma <gopalsharma66@gmail.com>
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @copyright (C) 2020 Gopal Sharma <gopalsharma66@gmail.com>
 */

defined('MOODLE_INTERNAL') || die();

$string['auth_azureb2c_authendpoint'] = 'Authorization endpoint';
$string['auth_azureb2c_autoappend'] = 'Auto-append domain';
$string['auth_azureb2c_clientid'] = 'Client ID';
$string['auth_azureb2c_clientsecret'] = 'Client secret';
$string['auth_azureb2c_resetpassendpoint'] = 'Reset password endpoint';
$string['auth_azureb2c_tokenendpoint'] = 'Token endpoint';
$string['azureb2c:manageconnection'] = 'Allow Azure AD B2C Connection and Disconnection';
$string['azureb2c:manageconnectionconnect'] = 'Allow Azure AD B2C Connection';
$string['azureb2c:manageconnectiondisconnect'] = 'Allow Azure AD B2C Disconnection';
$string['cfg_authendpoint_desc'] = 'The URI of the authorization endpoint from your identity provider to use.';
$string['cfg_authendpoint_key'] = 'Authorization endpoint';
$string['cfg_autoappend_desc'] = 'If you would like to automatically append a domain name to usernames when logging in using the "Resource Owner Password Credentials" flow, enter it here (including the "@"). This will only be used if the user does not enter a domain themselves.';
$string['cfg_autoappend_key'] = 'Auto-append domain';
$string['cfg_azureb2cresource_desc'] = 'The resource for which to send the request.';
$string['cfg_azureb2cresource_key'] = 'Resource';
$string['cfg_clientid_desc'] = 'The client ID you received from your identity provider when you registered Moodle as a client.';
$string['cfg_clientid_key'] = 'Client ID';
$string['cfg_clientsecret_desc'] = 'The client secret you received from your identity provider when you registered Moodle as a client.';
$string['cfg_clientsecret_key'] = 'Client secret';
$string['cfg_customicon_desc'] = 'If you would like to use a custom icon for the identity provider, upload it here. This will override the icon selected below.';
$string['cfg_customicon_key'] = 'Custom icon';
$string['cfg_debugmode_desc'] = 'Enable debug mode to record more information in the Moodle error logs.';
$string['cfg_debugmode_key'] = 'Debug mode';
$string['cfg_domainhint_desc'] = 'The domain hint to send to the identity provider.';
$string['cfg_domainhint_key'] = 'Domain hint';
$string['cfg_editprofileendpoint_desc'] = 'The URI of the edit profile endpoint from your identity provider to use.';
$string['cfg_editprofileendpoint_key'] = 'Edit profile endpoint';
$string['cfg_icon_desc'] = 'The icon to use for the identity provider on the login page.';
$string['cfg_icon_key'] = 'Icon';
$string['cfg_loginflow_desc'] = 'The login flow to use for Azure AD B2C Connect.';
$string['cfg_loginflow_key'] = 'Login flow';
$string['cfg_o365mapping_desc'] = 'Whether to use Office 365 mapping for users.';
$string['cfg_o365mapping_key'] = 'Office 365 mapping';
$string['cfg_opname_desc'] = 'This is an end-user-facing label that identifies the type of credentials the user must use to login. This label is used throughout the user-facing portions of this plugin to identify your provider.';
$string['cfg_opname_key'] = 'Provider name';
$string['cfg_redirecturi_desc'] = 'This is the URI to register as the "Redirect URI". Your Azure AD B2C Connect identity provider should ask for this when registering Moodle as a client. <br /><b>NOTE:</b> You must enter this in your Azure AD B2C Connect provider *exactly* as it appears here. Any difference will prevent logins using Azure AD B2C Connect.';
$string['cfg_redirecturi_key'] = 'Redirect URI';
$string['cfg_resetpassendpoint_desc'] = 'The URI of the reset password endpoint from your identity provider to use.';
$string['cfg_resetpassendpoint_key'] = 'Reset password endpoint';
$string['cfg_scope_desc'] = 'The scope to request from the identity provider.';
$string['cfg_scope_key'] = 'Scope';
$string['cfg_tokenendpoint_desc'] = 'The URI of the token endpoint from your identity provider to use.';
$string['cfg_tokenendpoint_key'] = 'Token endpoint';
$string['cfg_userrestrictions_desc'] = 'Only allow users to log in that meet certain restrictions. <br /><b>How to use user restrictions: </b> <ul><li>Enter a <a href="https://en.wikipedia.org/wiki/Regular_expression">regular expression</a> pattern that matches the usernames of users you want to allow.</li><li>Enter one pattern per line</li><li>If you enter multiple patterns a user will be allowed if they match ANY of the patterns.</li><li>The character "/" should be escaped with "\".</li><li>If you don\'t enter any restrictions above, all users that can log in to the Azure AD B2C Connect provider will be accepted by Moodle.</li><li>Any user that does not match any entered pattern(s) will be prevented from logging in using Azure AD B2C Connect.</li></ul>';
$string['cfg_userrestrictions_key'] = 'User restrictions';
$string['errorauthdisconnectemptypassword'] = 'Password cannot be empty';
$string['errorauthdisconnectemptyusername'] = 'Username cannot be empty';
$string['errorauthdisconnectifmanual'] = 'If using the manual login method, enter credentials below.';
$string['errorauthdisconnectinvalidmethod'] = 'Invalid login method received.';
$string['errorauthdisconnectnewmethod'] = 'Use Login Method';
$string['errorauthdisconnectusernameexists'] = 'That username is already taken. Please choose a different one.';
$string['errorauthgeneral'] = 'There was a problem logging you in. Please contact your administrator for assistance.';
$string['errorauthinvalididtoken'] = 'Invalid id_token received.';
$string['errorauthloginfaileddupemail'] = 'Invalid login: Your account has the same email address as another user on this Moodle, duplicate email addresses are blocked.';
$string['errorauthloginfailednouser'] = 'Invalid login: User not found in Moodle. If this site has the "authpreventaccountcreation" setting enabled, this may mean you need an administrator to create an account for you first.';
$string['errorauthnoauthcode'] = 'No authorization code was received from the identity server. The error logs may have more information.';
$string['errorauthnocreds'] = 'Please configure Azure AD B2C Connect client credentials.';
$string['errorauthnoendpoints'] = 'Please configure Azure AD B2C Connect server endpoints.';
$string['errorauthnohttpclient'] = 'Please set an HTTP client.';
$string['errorauthnoidtoken'] = 'Azure AD B2C Connect id_token not received.';
$string['errorauthunknownstate'] = 'Unknown state.';
$string['errorauthuseralreadyconnected'] = 'You\'re already connected to a different Azure AD B2C Connect user.';
$string['errorauthuserconnectedtodifferent'] = 'The Azure AD B2C Connect user that authenticated is already connected to a Moodle user.';
$string['errorazureb2ccall'] = 'Error in Azure AD B2C Connect. Please check logs for more information.';
$string['errorazureb2ccall_message'] = 'Error in Azure AD B2C Connect: {$a}';
$string['errorazureb2cclientinsecuretokenendpoint'] = 'The token endpoint must be using SSL/TLS for this.';
$string['errorazureb2cclientinvalidendpoint'] = 'Invalid Endpoint URI received.';
$string['errorazureb2cclientnoauthendpoint'] = 'No authorization endpoint set. Please set with $this->setendpoints';
$string['errorazureb2cclientnocreds'] = 'Please set client credentials with setcreds';
$string['errorazureb2cclientnotokenendpoint'] = 'No token endpoint set. Please set with $this->setendpoints';
$string['errorazureb2cnotenabled'] = 'The Azure AD B2C Connect authentication plugin is not enabled.';
$string['errorbadloginflow'] = 'Invalid authentication type specified. Note: If you are receiving this after a recent installation or upgrade, please clear your Moodle cache.';
$string['errorinvalidredirect_message'] = 'The URL you are trying to redirect to does not exist.';
$string['errorjwtbadpayload'] = 'Could not read JWT payload.';
$string['errorjwtcouldnotreadheader'] = 'Could not read JWT header';
$string['errorjwtempty'] = 'Empty or non-string JWT received.';
$string['errorjwtinvalidheader'] = 'Invalid JWT header';
$string['errorjwtmalformed'] = 'Malformed JWT received.';
$string['errorjwtunsupportedalg'] = 'JWS Alg or JWE not supported';
$string['errorlogintoconnectedaccount'] = 'This Azure AD B2C user is connected to a Moodle account, but Azure AD B2C Connect login is not enabled for this Moodle account. Please log in to the Moodle account using the account\'s defined authentication method to use Azure AD B2C features';
$string['errornodisconnectionauthmethod'] = 'Cannot disconnect because there is no enabled authentication plugin to fall back to. (either user\'s previous login method or the manual login method).';
$string['errorrestricted'] = 'This site has restrictions in place on the users that can log in with Azure AD B2C Connect. These restrictions currently prevent you from completing this login attempt.';
$string['errorucpinvalidaction'] = 'Invalid action received.';
$string['event_debug'] = 'Debug message';
$string['eventuserauthed'] = 'User authorized with Azure AD B2C Connect';
$string['eventuserconnected'] = 'User connected to Azure AD B2C Connect';
$string['eventusercreated'] = 'User created with Azure AD B2C Connect';
$string['eventuserdisconnected'] = 'User disconnected from Azure AD B2C Connect';
$string['eventuserloggedin'] = 'User logged in with Azure AD B2C Connect';
$string['gender'] = 'Gender';
$string['lang'] = 'Language';
$string['pluginname'] = 'Azure AD B2C Connect';
$string['privacy:metadata:auth_azureb2c'] = 'Azure AD B2C Connect Authentication';
$string['privacy:metadata:auth_azureb2c_prevlogin'] = 'Previous login methods to undo Azure AD B2C connections';
$string['privacy:metadata:auth_azureb2c_prevlogin:method'] = 'The previous login method';
$string['privacy:metadata:auth_azureb2c_prevlogin:password'] = 'The previous (encrypted) user password field.';
$string['privacy:metadata:auth_azureb2c_prevlogin:userid'] = 'The ID of the Moodle user';
$string['privacy:metadata:auth_azureb2c_token'] = 'Azure AD B2C Connect tokens';
$string['privacy:metadata:auth_azureb2c_token:authcode'] = 'The auth code for the token';
$string['privacy:metadata:auth_azureb2c_token:azureb2cuniqid'] = 'The azureb2c unique user identifier.';
$string['privacy:metadata:auth_azureb2c_token:azureb2cusername'] = 'The username of the azureb2c user';
$string['privacy:metadata:auth_azureb2c_token:expiry'] = 'The token expiry';
$string['privacy:metadata:auth_azureb2c_token:idtoken'] = 'The token id token';
$string['privacy:metadata:auth_azureb2c_token:refreshtoken'] = 'The token refresh token';
$string['privacy:metadata:auth_azureb2c_token:resource'] = 'The resource of the token';
$string['privacy:metadata:auth_azureb2c_token:scope'] = 'The scope of the token';
$string['privacy:metadata:auth_azureb2c_token:token'] = 'The token';
$string['privacy:metadata:auth_azureb2c_token:userid'] = 'The user ID of the Moodle user';
$string['privacy:metadata:auth_azureb2c_token:username'] = 'The username of the Moodle user';
$string['source_of_info'] = 'How did you learn about us?';
$string['ucp_disconnect_details'] = 'This will disconnect your Moodle account from {$a}. You\'ll need to create a username and password to log in to Moodle.';
$string['ucp_disconnect_title'] = '{$a} Disconnection';
$string['ucp_general_intro'] = 'Here you can manage your connection to {$a}. If enabled, you will be able to use your {$a} account to log in to Moodle instead of a separate username and password. Once connected, you\'ll no longer have to remember a username and password for Moodle, all log-ins will be handled by {$a}.';
$string['ucp_login_start'] = 'Start using {$a} to log in to Moodle';
$string['ucp_login_start_desc'] = 'This will switch your account to use {$a} to log in to Moodle. Once enabled, you will log in using your {$a} credentials - your current Moodle username and password will not work. You can disconnect your account at any time and return to logging in normally.';
$string['ucp_login_status'] = '{$a} login is:';
$string['ucp_login_stop'] = 'Stop using {$a} to log in to Moodle';
$string['ucp_login_stop_desc'] = 'You are currently using {$a} to log in to Moodle. Clicking "Stop using {$a} login" will disconnect your Moodle account from {$a}. You will no longer be able to log in to Moodle with your {$a} account. You\'ll be asked to create a username and password, and from then on you will then be able to log in to Moodle directly.';
$string['ucp_o365accountconnected'] = 'This Azure AD B2C account is already connected with another Moodle account.';
$string['ucp_status_disabled'] = 'Disabled';
$string['ucp_status_enabled'] = 'Enabled';
$string['ucp_title'] = '{$a} Management';
