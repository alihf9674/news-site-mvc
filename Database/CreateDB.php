<?php

namespace Database;

use Application\Model\Model;

class CreateDB extends Model
{
      public $createDatabaseQueries = array(
            "CREATE TABLE `banners` (
              `id` int(11) unsigned NOT NULL,
              `image` varchar(256) COLLATE utf8_general_ci NOT NULL,
              `url` varchar(256) NOT NULL  COLLATE utf8_general_ci,
              `created_at` datetime NOT NULL,
              `updated_at` datetime DEFAULT NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;",

            "CREATE TABLE `categories` (
                  `id` int(11) NOT NULL AUTO_INCREMENT,
                  `name` varchar(128) COLLATE utf8_general_ci NOT NULL,
                  `created_at` datetime NOT NULL,
                  `updated_at` datetime DEFAULT NULL,
                  PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE = utf8_general_ci;",

            "CREATE TABLE `users` (
                  `id` int(11) NOT NULL AUTO_INCREMENT,
                  `user_name` varchar(128) COLLATE utf8_general_ci NOT NULL,
                  `user_email` varchar(128) COLLATE utf8_general_ci NOT NULL,
                  `password` varchar(128) COLLATE utf8_general_ci NOT NULL,
                  `permission` enum('user', 'admin') COLLATE utf8_general_ci NOT NULL,
                  `user_info` text COLLATE utf8_general_ci NOT NULL,
                  `verify_token` varchar(256) COLLATE utf8_general_ci DEFAULT NULL,
                  `is_active` tinyint(5) NOT NULL DEFAULT 0,
                  `forgot_token` varchar(256) COLLATE utf8_general_ci DEFAULT NULL,
                  `forgot_token_expire` datetime DEFAULT NULL,
                  `created_at` datetime NOT NULL,
                  `updated_at` datetime DEFAULT NULL,
                  PRIMARY KEY (`id`),
                  UNIQUE KEY (`user_call`) 
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE = utf8_general_ci;",

            "CREATE TABLE `block_ip` (
                  `id` int(11) NOT NULL AUTO_INCREMENT,
                  `locked_ip` varchar(64) NOT NULL,
                  `unlocked_at` datetime NOT NULL,
                  PRIMARY KEY (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE = utf8_general_ci;",

            "CREATE TABLE `posts` (
               `id` int(11) NOT NULL AUTO_INCREMENT,
               `title` varchar(200) COLLATE utf8_general_ci NOT NULL,
               `summary` text COLLATE utf8_general_ci NOT NULL,
               `body` text COLLATE utf8_general_ci NOT NULL,
               `View` int(11) NOT NULL DEFAULT '0',
               `user_id` int(11) NOT NULL,
               `cat_id` int(11) NOT NULL,
               `image` varchar(256) COLLATE utf8_general_ci NOT NULL,
               `status` enum('disable','enable') COLLATE utf8_general_ci NOT NULL DEFAULT 'disable',
               `selected` tinyint(5) NOT NULL DEFAULT 1,
               `breaking_news` tinyint(5) NOT NULL DEFAULT 1,
               `published_at` datetime NOT NULL,
               `created_at` datetime NOT NULL,
               `updated_at` datetime DEFAULT NULL,
               PRIMARY KEY (`id`),
               FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
               FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
             ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;",

            "CREATE TABLE `comments` (
               `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
               `comment` text COLLATE utf8_general_ci NOT NULL,
               `user_id` int(11) NOT NULL,
               `post_id` int(11) NOT NULL,
               `status` enum('unseen','seen','approved') COLLATE utf8_general_ci NOT NULL DEFAULT 'unseen',
               `created_at` datetime NOT NULL,
               `updated_at` datetime DEFAULT NULL,
               PRIMARY KEY (`id`),
               FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
               FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
             ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;",

            "CREATE TABLE `websetting` (
                  `id` int(11) NOT NULL AUTO_INCREMENT,
                  `title` text COLLATE utf8_general_ci DEFAULT NULL,
                  `description` text COLLATE utf8_general_ci DEFAULT NULL,
                  `keywords` text COLLATE utf8_general_ci DEFAULT NULL,
                  `logo` text COLLATE utf8_general_ci DEFAULT NULL,
                  `icon` text COLLATE utf8_general_ci DEFAULT NULL,
                  `created_at` datetime NOT NULL,
                  `updated_at` datetime DEFAULT NULL,
                  PRIMARY KEY (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;",

            "CREATE TABLE `menus` (
                  `id` int(11) NOT NULL AUTO_INCREMENT,
                  `name` varchar(100) COLLATE utf8_general_ci NOT NULL,
                  `url` varchar(300) COLLATE utf8_general_ci NOT NULL,
                  `parent_id` int(11) DEFAULT NULL,
                  `created_at` datetime NOT NULL,
                  `updated_at` datetime DEFAULT NULL,
                  PRIMARY KEY (`id`),
                  FOREIGN KEY (`parent_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;",
      );

      public function run()
      {
            foreach ($this->createDatabaseQueries as $createDatabaseQuery) {
                  $this->createTable($createDatabaseQuery);
            }
      }
}
