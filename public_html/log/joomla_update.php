#
#<?php die('Forbidden.'); ?>
#Date: 2016-02-17 13:33:05 UTC
#Software: Joomla Platform 13.1.0 Stable [ Curiosity ] 24-Apr-2013 00:00 GMT

#Fields: datetime	priority clientip	category	message
2016-02-17T13:33:05+00:00	INFO 173.254.200.130	update	Update started by user Super User (760). Old version is 3.4.5.
2016-02-17T13:33:05+00:00	INFO 173.254.200.130	update	Downloading update file from https://github.com/joomla/joomla-cms/releases/download/3.4.8/Joomla_3.4.x_to_3.4.8-Stable-Patch_Package.zip.
2016-02-17T13:33:07+00:00	INFO 173.254.200.130	update	File Joomla_3.4.x_to_3.4.8-Stable-Patch_Package.zip successfully downloaded.
2016-02-17T13:34:05+00:00	INFO 173.254.200.130	update	Starting installation of new version.
2016-02-17T13:34:11+00:00	INFO 173.254.200.130	update	Finalising installation.
2016-02-17T13:34:11+00:00	INFO 173.254.200.130	update	Deleting removed files and folders.
2016-02-17T13:35:57+00:00	INFO 173.254.200.130	update	Cleaning up after installation.
2016-02-17T13:35:57+00:00	INFO 173.254.200.130	update	Update to version 3.4.8 is complete.
2016-03-22T16:29:22+00:00	INFO 23.104.17.157	update	Update started by user Super User (760). Old version is 3.4.8.
2016-03-22T16:29:22+00:00	INFO 23.104.17.157	update	Downloading update file from https://github.com/joomla/joomla-cms/releases/download/3.5.0/Joomla_3.5.0-Stable-Update_Package.zip.
2016-03-22T16:29:24+00:00	INFO 23.104.17.157	update	File Joomla_3.5.0-Stable-Update_Package.zip successfully downloaded.
2016-03-22T16:30:27+00:00	INFO 23.104.17.157	update	Starting installation of new version.
2016-03-22T16:30:36+00:00	INFO 23.104.17.157	update	Finalising installation.
2016-03-22T16:30:55+00:00	INFO 23.104.17.157	update	Ran query from file 3.5.0-2015-07-01. Query text: ALTER TABLE `#__session` MODIFY `session_id` varchar(191) NOT NULL DEFAULT '';.
2016-03-22T16:30:55+00:00	INFO 23.104.17.157	update	Ran query from file 3.5.0-2015-07-01. Query text: ALTER TABLE `#__user_keys` MODIFY `series` varchar(191) NOT NULL;.
2016-03-22T16:30:55+00:00	INFO 23.104.17.157	update	Ran query from file 3.5.0-2015-10-13. Query text: INSERT INTO `#__extensions` (`extension_id`, `name`, `type`, `element`, `folder`.
2016-03-22T16:30:55+00:00	INFO 23.104.17.157	update	Ran query from file 3.5.0-2015-10-26. Query text: ALTER TABLE `#__contentitem_tag_map` DROP INDEX `idx_tag`;.
2016-03-22T16:30:55+00:00	INFO 23.104.17.157	update	Ran query from file 3.5.0-2015-10-26. Query text: ALTER TABLE `#__contentitem_tag_map` DROP INDEX `idx_type`;.
2016-03-22T16:30:55+00:00	INFO 23.104.17.157	update	Ran query from file 3.5.0-2015-10-30. Query text: UPDATE `#__menu` SET `title` = 'com_contact_contacts' WHERE `id` = 8;.
2016-03-22T16:30:55+00:00	INFO 23.104.17.157	update	Ran query from file 3.5.0-2015-11-04. Query text: DELETE FROM `#__menu` WHERE `title` = 'com_messages_read' AND `client_id` = 1;.
2016-03-22T16:30:55+00:00	INFO 23.104.17.157	update	Ran query from file 3.5.0-2015-11-04. Query text: INSERT INTO `#__extensions` (`extension_id`, `name`, `type`, `element`, `folder`.
2016-03-22T16:30:55+00:00	INFO 23.104.17.157	update	Ran query from file 3.5.0-2015-11-05. Query text: INSERT INTO `#__extensions` (`extension_id`, `name`, `type`, `element`, `folder`.
2016-03-22T16:30:55+00:00	INFO 23.104.17.157	update	Ran query from file 3.5.0-2015-11-05. Query text: INSERT INTO `#__postinstall_messages` (`extension_id`, `title_key`, `description.
2016-03-22T16:30:57+00:00	INFO 23.104.17.157	update	Ran query from file 3.5.0-2016-02-26. Query text: CREATE TABLE IF NOT EXISTS `#__utf8_conversion` (   `converted` tinyint(4) NOT N.
2016-03-22T16:30:57+00:00	INFO 23.104.17.157	update	Ran query from file 3.5.0-2016-02-26. Query text: INSERT INTO `#__utf8_conversion` (`converted`) VALUES (0);.
2016-03-22T16:30:57+00:00	INFO 23.104.17.157	update	Ran query from file 3.5.0-2016-03-01. Query text: ALTER TABLE `#__redirect_links` DROP INDEX `idx_link_old`;.
2016-03-22T16:30:59+00:00	INFO 23.104.17.157	update	Ran query from file 3.5.0-2016-03-01. Query text: ALTER TABLE `#__redirect_links` MODIFY `old_url` VARCHAR(2048) NOT NULL;.
2016-03-22T16:30:59+00:00	INFO 23.104.17.157	update	Ran query from file 3.5.0-2016-03-01. Query text: ALTER TABLE `#__redirect_links` MODIFY `new_url` VARCHAR(2048) NOT NULL;.
2016-03-22T16:30:59+00:00	INFO 23.104.17.157	update	Ran query from file 3.5.0-2016-03-01. Query text: ALTER TABLE `#__redirect_links` MODIFY `referer` VARCHAR(2048) NOT NULL;.
2016-03-22T16:30:59+00:00	INFO 23.104.17.157	update	Ran query from file 3.5.0-2016-03-01. Query text: ALTER TABLE `#__redirect_links` ADD INDEX `idx_old_url` (`old_url`(100));.
2016-03-22T16:30:59+00:00	INFO 23.104.17.157	update	Deleting removed files and folders.
2016-03-22T16:31:36+00:00	INFO 23.104.17.157	update	Starting installation of new version.
2016-03-22T16:31:42+00:00	INFO 23.104.17.157	update	Finalising installation.
2016-03-22T16:31:42+00:00	INFO 23.104.17.157	update	Deleting removed files and folders.
2016-03-22T16:32:29+00:00	INFO 23.104.17.157	update	Starting installation of new version.
2016-03-22T16:32:38+00:00	INFO 23.104.17.157	update	Finalising installation.
2016-03-22T16:32:38+00:00	INFO 23.104.17.157	update	Deleting removed files and folders.
2016-04-06T06:26:11+00:00	INFO 173.254.200.130	update	Update started by user Super User (760). Old version is 3.5.0.
2016-04-06T06:26:11+00:00	INFO 173.254.200.130	update	Downloading update file from https://github.com/joomla/joomla-cms/releases/download/3.5.1/Joomla_3.5.x_to_3.5.1-Stable-Patch_Package.zip.
2016-04-06T06:26:12+00:00	INFO 173.254.200.130	update	File Joomla_3.5.x_to_3.5.1-Stable-Patch_Package.zip successfully downloaded.
2016-04-06T06:27:45+00:00	INFO 173.254.200.130	update	Starting installation of new version.
2016-04-06T06:27:52+00:00	INFO 173.254.200.130	update	Finalising installation.
2016-04-06T06:27:52+00:00	INFO 173.254.200.130	update	Ran query from file 3.5.1-2016-03-25. Query text: ALTER TABLE `#__user_keys` MODIFY `user_id` varchar(150) NOT NULL;.
2016-04-06T06:27:52+00:00	INFO 173.254.200.130	update	Ran query from file 3.5.1-2016-03-29. Query text: UPDATE `#__utf8_conversion` SET `converted` = 0  WHERE (SELECT COUNT(*) FROM `#_.
2016-04-06T06:27:52+00:00	INFO 173.254.200.130	update	Deleting removed files and folders.
2016-04-06T06:28:02+00:00	INFO 173.254.200.130	update	Cleaning up after installation.
2016-04-06T06:28:02+00:00	INFO 173.254.200.130	update	Update to version 3.5.1 is complete.
2017-04-20T02:50:46+00:00	INFO 174.127.83.205	update	Update started by user bastien (791). Old version is 3.5.1.
2017-04-20T02:50:46+00:00	INFO 174.127.83.205	update	Downloading update file from https://downloads.joomla.org/cms/joomla3/3-6-5/Joomla_3.6.5-Stable-Update_Package.zip.
2017-04-20T02:50:48+00:00	INFO 174.127.83.205	update	File Joomla_3.6.5-Stable-Update_Package.zip successfully downloaded.
2017-04-20T02:51:57+00:00	INFO 174.127.83.205	update	Starting installation of new version.
2017-04-20T02:52:37+00:00	INFO 174.127.83.205	update	Finalising installation.
2017-04-20T02:52:37+00:00	INFO 174.127.83.205	update	Ran query from file 3.6.0-2016-04-01. Query text: UPDATE `#__update_sites` SET `name` = 'Joomla! Core' WHERE `name` = 'Joomla Core.
2017-04-20T02:52:37+00:00	INFO 174.127.83.205	update	Ran query from file 3.6.0-2016-04-01. Query text: UPDATE `#__update_sites` SET `name` = 'Joomla! Extension Directory' WHERE `name`.
2017-04-20T02:52:37+00:00	INFO 174.127.83.205	update	Ran query from file 3.6.0-2016-04-01. Query text: UPDATE `#__update_sites` SET `location` = 'https://update.joomla.org/core/list.x.
2017-04-20T02:52:37+00:00	INFO 174.127.83.205	update	Ran query from file 3.6.0-2016-04-01. Query text: UPDATE `#__update_sites` SET `location` = 'https://update.joomla.org/jed/list.xm.
2017-04-20T02:52:37+00:00	INFO 174.127.83.205	update	Ran query from file 3.6.0-2016-04-01. Query text: UPDATE `#__update_sites` SET `location` = 'https://update.joomla.org/language/tr.
2017-04-20T02:52:37+00:00	INFO 174.127.83.205	update	Ran query from file 3.6.0-2016-04-01. Query text: UPDATE `#__update_sites` SET `location` = 'https://update.joomla.org/core/extens.
2017-04-20T02:52:41+00:00	INFO 174.127.83.205	update	Ran query from file 3.6.0-2016-04-06. Query text: ALTER TABLE `#__redirect_links` MODIFY `new_url` VARCHAR(2048);.
2017-04-20T02:52:41+00:00	INFO 174.127.83.205	update	Ran query from file 3.6.0-2016-04-08. Query text: INSERT INTO `#__extensions` (`extension_id`, `name`, `type`, `element`, `folder`.
2017-04-20T02:52:41+00:00	INFO 174.127.83.205	update	Ran query from file 3.6.0-2016-04-08. Query text: UPDATE `#__update_sites_extensions` SET `extension_id` = 802 WHERE `update_site_.
2017-04-20T02:52:42+00:00	INFO 174.127.83.205	update	Ran query from file 3.6.0-2016-04-09. Query text: ALTER TABLE `#__menu_types` ADD COLUMN `asset_id` INT(11) NOT NULL AFTER `id`;.
2017-04-20T02:52:42+00:00	INFO 174.127.83.205	update	Ran query from file 3.6.0-2016-05-06. Query text: DELETE FROM `#__extensions` WHERE `type` = 'library' AND `element` = 'simplepie'.
2017-04-20T02:52:43+00:00	INFO 174.127.83.205	update	Ran query from file 3.6.0-2016-05-06. Query text: INSERT INTO `#__extensions` (`extension_id`, `name`, `type`, `element`, `folder`.
2017-04-20T02:52:43+00:00	INFO 174.127.83.205	update	Ran query from file 3.6.0-2016-06-01. Query text: UPDATE `#__extensions` SET `protected` = 1, `enabled` = 1  WHERE `name` = 'com_a.
2017-04-20T02:52:43+00:00	INFO 174.127.83.205	update	Ran query from file 3.6.0-2016-06-05. Query text: ALTER TABLE `#__languages` ADD COLUMN `asset_id` INT(11) NOT NULL AFTER `lang_id.
2017-04-20T02:52:43+00:00	INFO 174.127.83.205	update	Ran query from file 3.6.3-2016-08-15. Query text: ALTER TABLE `#__newsfeeds` MODIFY `link` VARCHAR(2048) NOT NULL;.
2017-04-20T02:52:43+00:00	INFO 174.127.83.205	update	Ran query from file 3.6.3-2016-08-16. Query text: INSERT INTO `#__postinstall_messages` (`extension_id`, `title_key`, `description.
2017-04-20T02:52:43+00:00	INFO 174.127.83.205	update	Deleting removed files and folders.
2017-04-20T02:52:46+00:00	INFO 174.127.83.205	update	Cleaning up after installation.
2017-04-20T02:52:46+00:00	INFO 174.127.83.205	update	Update to version 3.6.5 is complete.
2017-06-11T13:22:56+00:00	INFO 173.192.105.222	update	Update started by user bastien (791). Old version is 3.6.5.
2017-06-11T13:22:59+00:00	INFO 173.192.105.222	update	Downloading update file from http://s3-us-west-2.amazonaws.com/joomla-official-downloads/joomladownloads/joomla3/Joomla_3.7.2-Stable-Update_Package.zip?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=AKIAIZ6S3Q3YQHG57ZRA%2F20170611%2Fus-west-2%2Fs3%2Faws4_request&X-Amz-Date=20170611T132208Z&X-Amz-Expires=60&X-Amz-SignedHeaders=host&X-Amz-Signature=48a0f5159ecb44192a0bad057b05b14401e48bac2418be9adb6f061092911b80.
2017-06-11T13:23:00+00:00	INFO 173.192.105.222	update	File Joomla_3.7.2-Stable-Update_Package.zip successfully downloaded.
2018-06-26T19:13:47+00:00	INFO 23.27.206.3	update	Update started by user Super User (760). Old version is 3.6.5.
2018-06-26T19:13:48+00:00	INFO 23.27.206.3	update	Downloading update file from https://s3-us-west-2.amazonaws.com/joomla-official-downloads/joomladownloads/joomla3/Joomla_3.8.10-Stable-Update_Package.zip?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=AKIAIZ6S3Q3YQHG57ZRA%2F20180626%2Fus-west-2%2Fs3%2Faws4_request&X-Amz-Date=20180626T191231Z&X-Amz-Expires=60&X-Amz-SignedHeaders=host&X-Amz-Signature=07a968816006cf3e83505678e9986c4c8c93e8231c3d5c8838accb26d7f20662.
2018-06-26T19:13:49+00:00	INFO 23.27.206.3	update	File Joomla_3.8.10-Stable-Update_Package.zip successfully downloaded.
2018-06-26T19:17:48+00:00	INFO 23.27.206.3	update	Starting installation of new version.
2018-06-26T19:17:57+00:00	INFO 23.27.206.3	update	Finalising installation.
2018-06-26T19:17:57+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2016-08-06. Query text: INSERT INTO `#__extensions` (`extension_id`, `name`, `type`, `element`, `folder`.
2018-06-26T19:17:57+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2016-08-22. Query text: INSERT INTO `#__extensions` (`extension_id`, `name`, `type`, `element`, `folder`.
2018-06-26T19:18:02+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2016-08-29. Query text: CREATE TABLE IF NOT EXISTS `#__fields` (   `id` int(10) unsigned NOT NULL AUTO_I.
2018-06-26T19:18:03+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2016-08-29. Query text: CREATE TABLE IF NOT EXISTS `#__fields_categories` (   `field_id` int(11) NOT NUL.
2018-06-26T19:18:04+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2016-08-29. Query text: CREATE TABLE IF NOT EXISTS `#__fields_groups` (   `id` int(10) unsigned NOT NULL.
2018-06-26T19:18:05+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2016-08-29. Query text: CREATE TABLE IF NOT EXISTS `#__fields_values` (   `field_id` int(10) unsigned NO.
2018-06-26T19:18:05+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2016-08-29. Query text: INSERT INTO `#__extensions` (`extension_id`, `name`, `type`, `element`, `folder`.
2018-06-26T19:18:05+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2016-08-29. Query text: INSERT INTO `#__extensions` (`extension_id`, `name`, `type`, `element`, `folder`.
2018-06-26T19:18:05+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2016-09-29. Query text: INSERT INTO `#__postinstall_messages` (`extension_id`, `title_key`, `description.
2018-06-26T19:18:05+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2016-10-01. Query text: INSERT INTO `#__extensions` (`extension_id`, `name`, `type`, `element`, `folder`.
2018-06-26T19:18:05+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2016-10-02. Query text: ALTER TABLE `#__session` MODIFY `client_id` tinyint(3) unsigned DEFAULT NULL;.
2018-06-26T19:18:05+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2016-11-04. Query text: ALTER TABLE `#__extensions` CHANGE `enabled` `enabled` TINYINT(3) NOT NULL DEFAU.
2018-06-26T19:18:05+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2016-11-19. Query text: ALTER TABLE `#__menu_types` ADD COLUMN `client_id` int(11) NOT NULL DEFAULT 0;.
2018-06-26T19:18:05+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2016-11-19. Query text: UPDATE `#__menu` SET `published` = 1 WHERE `menutype` = 'main' OR `menutype` = '.
2018-06-26T19:18:05+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2016-11-21. Query text: ALTER TABLE `#__languages` DROP INDEX `idx_image`;.
2018-06-26T19:18:08+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2016-11-24. Query text: ALTER TABLE `#__extensions` ADD COLUMN `package_id` int(11) NOT NULL DEFAULT 0 C.
2018-06-26T19:18:08+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2016-11-24. Query text: UPDATE `#__extensions` AS `e1` INNER JOIN (SELECT `extension_id` FROM `#__extens.
2018-06-26T19:18:13+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2016-11-27. Query text: ALTER TABLE `#__modules` MODIFY `content` text NOT NULL DEFAULT '';.
2018-06-26T19:18:13+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-01-08. Query text: ALTER TABLE `#__ucm_content` MODIFY `core_title` varchar(400) NOT NULL DEFAULT '.
2018-06-26T19:18:14+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-01-08. Query text: ALTER TABLE `#__ucm_content` MODIFY `core_alias` varchar(400) CHARACTER SET utf8.
2018-06-26T19:18:16+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-01-08. Query text: ALTER TABLE `#__ucm_content` MODIFY `core_body` mediumtext NOT NULL DEFAULT '';.
2018-06-26T19:18:16+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-01-08. Query text: ALTER TABLE `#__ucm_content` MODIFY `core_checked_out_time` varchar(255) NOT NUL.
2018-06-26T19:18:17+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-01-08. Query text: ALTER TABLE `#__ucm_content` MODIFY `core_params` text NOT NULL DEFAULT '';.
2018-06-26T19:18:18+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-01-08. Query text: ALTER TABLE `#__ucm_content` MODIFY `core_metadata` varchar(2048) NOT NULL DEFAU.
2018-06-26T19:18:18+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-01-08. Query text: ALTER TABLE `#__ucm_content` MODIFY `core_language` char(7) NOT NULL DEFAULT '';.
2018-06-26T19:18:18+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-01-08. Query text: ALTER TABLE `#__ucm_content` MODIFY `core_publish_up` datetime NOT NULL DEFAULT .
2018-06-26T19:18:18+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-01-08. Query text: ALTER TABLE `#__ucm_content` MODIFY `core_publish_down` datetime NOT NULL DEFAUL.
2018-06-26T19:18:21+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-01-08. Query text: ALTER TABLE `#__ucm_content` MODIFY `core_content_item_id` int(10) unsigned NOT .
2018-06-26T19:18:21+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-01-08. Query text: ALTER TABLE `#__ucm_content` MODIFY `asset_id` int(10) unsigned NOT NULL DEFAULT.
2018-06-26T19:18:22+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-01-08. Query text: ALTER TABLE `#__ucm_content` MODIFY `core_images` text NOT NULL DEFAULT '';.
2018-06-26T19:18:23+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-01-08. Query text: ALTER TABLE `#__ucm_content` MODIFY `core_urls` text NOT NULL DEFAULT '';.
2018-06-26T19:18:23+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-01-08. Query text: ALTER TABLE `#__ucm_content` MODIFY `core_metakey` text NOT NULL DEFAULT '';.
2018-06-26T19:18:23+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-01-08. Query text: ALTER TABLE `#__ucm_content` MODIFY `core_metadesc` text NOT NULL DEFAULT '';.
2018-06-26T19:18:23+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-01-08. Query text: ALTER TABLE `#__ucm_content` MODIFY `core_xreference` varchar(50) NOT NULL DEFAU.
2018-06-26T19:18:23+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-01-08. Query text: ALTER TABLE `#__ucm_content` MODIFY `core_type_id` int(10) unsigned NOT NULL DEF.
2018-06-26T19:18:23+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-01-09. Query text: ALTER TABLE `#__categories` MODIFY `title` varchar(255) NOT NULL DEFAULT '';.
2018-06-26T19:18:23+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-01-09. Query text: ALTER TABLE `#__categories` MODIFY `description` mediumtext NOT NULL DEFAULT '';.
2018-06-26T19:18:24+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-01-09. Query text: ALTER TABLE `#__categories` MODIFY `params` text NOT NULL DEFAULT '';.
2018-06-26T19:18:24+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-01-09. Query text: ALTER TABLE `#__categories` MODIFY `metadesc` varchar(1024) NOT NULL DEFAULT '' .
2018-06-26T19:18:24+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-01-09. Query text: ALTER TABLE `#__categories` MODIFY `metakey` varchar(1024) NOT NULL DEFAULT '' C.
2018-06-26T19:18:24+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-01-09. Query text: ALTER TABLE `#__categories` MODIFY `metadata` varchar(2048) NOT NULL DEFAULT '' .
2018-06-26T19:18:24+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-01-09. Query text: ALTER TABLE `#__categories` MODIFY `language` char(7) NOT NULL DEFAULT '';.
2018-06-26T19:18:24+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-01-15. Query text: INSERT INTO `#__extensions` (`extension_id`, `name`, `type`, `element`, `folder`.
2018-06-26T19:18:24+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-01-17. Query text: UPDATE `#__menu`    SET `menutype` = 'main_is_reserved_133C585'  WHERE `client_i.
2018-06-26T19:18:24+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-01-17. Query text: UPDATE `#__modules`    SET `params` = REPLACE(`params`,'"menutype":"main"','"men.
2018-06-26T19:18:24+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-01-17. Query text: UPDATE `#__menu_types`    SET `menutype` = 'main_is_reserved_133C585'  WHERE `cl.
2018-06-26T19:18:24+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-01-17. Query text: UPDATE `#__menu`    SET `client_id` = 1  WHERE `menutype` = 'main';.
2018-06-26T19:18:24+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-01-17. Query text: UPDATE `#__menu`    SET `menutype` = 'main'  WHERE `client_id` = 1     AND `menu.
2018-06-26T19:18:24+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-01-17. Query text: UPDATE `#__menu`    SET `menutype` = 'main',        `client_id` = 1  WHERE `menu.
2018-06-26T19:18:24+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-01-17. Query text: DELETE FROM `#__menu_types`  WHERE `client_id` = 1    AND `menutype` IN ('main',.
2018-06-26T19:18:24+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-01-31. Query text: INSERT INTO `#__extensions` (`extension_id`, `name`, `type`, `element`, `folder`.
2018-06-26T19:18:24+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-02-02. Query text: INSERT INTO `#__extensions` (`extension_id`, `name`, `type`, `element`, `folder`.
2018-06-26T19:18:24+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-02-15. Query text: ALTER TABLE `#__redirect_links` MODIFY `comment` varchar(255) NOT NULL DEFAULT '.
2018-06-26T19:18:24+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-02-17. Query text: ALTER TABLE `#__contact_details` MODIFY `name` varchar(255) NOT NULL;.
2018-06-26T19:18:24+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-02-17. Query text: ALTER TABLE `#__contact_details` MODIFY `alias` varchar(400) CHARACTER SET utf8m.
2018-06-26T19:18:24+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-02-17. Query text: ALTER TABLE `#__contact_details` MODIFY `sortname1` varchar(255) NOT NULL DEFAUL.
2018-06-26T19:18:24+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-02-17. Query text: ALTER TABLE `#__contact_details` MODIFY `sortname2` varchar(255) NOT NULL DEFAUL.
2018-06-26T19:18:24+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-02-17. Query text: ALTER TABLE `#__contact_details` MODIFY `sortname3` varchar(255) NOT NULL DEFAUL.
2018-06-26T19:18:24+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-02-17. Query text: ALTER TABLE `#__contact_details` MODIFY `language` varchar(7) NOT NULL;.
2018-06-26T19:18:24+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-02-17. Query text: ALTER TABLE `#__contact_details` MODIFY `xreference` varchar(50) NOT NULL DEFAUL.
2018-06-26T19:18:24+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-03-03. Query text: ALTER TABLE `#__languages` MODIFY `asset_id` int(10) unsigned NOT NULL DEFAULT 0.
2018-06-26T19:18:24+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-03-03. Query text: ALTER TABLE `#__menu_types` MODIFY `asset_id` int(10) unsigned NOT NULL DEFAULT .
2018-06-26T19:18:24+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-03-03. Query text: ALTER TABLE  `#__content` MODIFY `xreference` varchar(50) NOT NULL DEFAULT '';.
2018-06-26T19:18:24+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-03-03. Query text: ALTER TABLE  `#__newsfeeds` MODIFY `xreference` varchar(50) NOT NULL DEFAULT '';.
2018-06-26T19:18:24+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-03-09. Query text: UPDATE `#__categories` SET `published` = 1 WHERE `alias` = 'root';.
2018-06-26T19:18:24+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-03-09. Query text: UPDATE `#__categories` AS `c` INNER JOIN ( 	SELECT c2.id, CASE WHEN MIN(p.publis.
2018-06-26T19:18:24+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-03-09. Query text: UPDATE `#__menu` SET `published` = 1 WHERE `alias` = 'root';.
2018-06-26T19:18:24+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-03-09. Query text: UPDATE `#__menu` AS `c` INNER JOIN ( 	SELECT c2.id, CASE WHEN MIN(p.published) >.
2018-06-26T19:18:24+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-03-19. Query text: ALTER TABLE `#__finder_links` MODIFY `description` text;.
2018-06-26T19:18:24+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-04-10. Query text: INSERT INTO `#__postinstall_messages` (`extension_id`, `title_key`, `description.
2018-06-26T19:18:24+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.0-2017-04-19. Query text: UPDATE `#__extensions` SET `params` = '{"multiple":"0","first":"1","last":"100",.
2018-06-26T19:18:24+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.3-2017-06-03. Query text: ALTER TABLE `#__menu` MODIFY `checked_out_time` datetime NOT NULL DEFAULT '0000-.
2018-06-26T19:18:24+00:00	INFO 23.27.206.3	update	Ran query from file 3.7.4-2017-07-05. Query text: DELETE FROM `#__postinstall_messages` WHERE `title_key` = 'COM_CPANEL_MSG_PHPVER.
2018-06-26T19:18:25+00:00	INFO 23.27.206.3	update	Ran query from file 3.8.0-2017-07-28. Query text: ALTER TABLE `#__fields_groups` ADD COLUMN `params` TEXT  NOT NULL  AFTER `orderi.
2018-06-26T19:18:25+00:00	INFO 23.27.206.3	update	Ran query from file 3.8.0-2017-07-31. Query text: INSERT INTO `#__extensions` (`extension_id`, `package_id`, `name`, `type`, `elem.
2018-06-26T19:18:26+00:00	INFO 23.27.206.3	update	Ran query from file 3.8.2-2017-10-14. Query text: ALTER TABLE `#__content` ADD INDEX `idx_alias` (`alias`(191));.
2018-06-26T19:18:27+00:00	INFO 23.27.206.3	update	Ran query from file 3.8.4-2018-01-16. Query text: ALTER TABLE `#__user_keys` DROP INDEX `series_2`;.
2018-06-26T19:18:28+00:00	INFO 23.27.206.3	update	Ran query from file 3.8.4-2018-01-16. Query text: ALTER TABLE `#__user_keys` DROP INDEX `series_3`;.
2018-06-26T19:18:28+00:00	INFO 23.27.206.3	update	Ran query from file 3.8.6-2018-02-14. Query text: INSERT INTO `#__extensions` (`extension_id`, `package_id`, `name`, `type`, `elem.
2018-06-26T19:18:28+00:00	INFO 23.27.206.3	update	Ran query from file 3.8.6-2018-02-14. Query text: INSERT INTO `#__postinstall_messages` (`extension_id`, `title_key`, `description.
2018-06-26T19:18:28+00:00	INFO 23.27.206.3	update	Ran query from file 3.8.8-2018-05-18. Query text: INSERT INTO `#__postinstall_messages` (`extension_id`, `title_key`, `description.
2018-06-26T19:18:28+00:00	INFO 23.27.206.3	update	Ran query from file 3.8.9-2018-06-19. Query text: UPDATE `#__extensions` SET `enabled` = '1' WHERE `name` = 'mod_sampledata';.
2018-06-26T19:18:28+00:00	INFO 23.27.206.3	update	Deleting removed files and folders.
2018-06-26T19:18:29+00:00	INFO 23.27.206.3	update	Cleaning up after installation.
2018-06-26T19:18:29+00:00	INFO 23.27.206.3	update	Update to version 3.8.10 is complete.
