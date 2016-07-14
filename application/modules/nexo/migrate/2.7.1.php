<?php
// NexoPOS 2.7.1
$this->db->query( 'ALTER TABLE `' . $this->db->dbprefix('nexo_categories') . '` ADD `THUMB` TEXT NOT NULL AFTER `PARENT_REF_ID`;' );

/***
 * Coupons
 * @since 2.7.1
**/

$this->db->query('CREATE TABLE IF NOT EXISTS `'.$this->db->dbprefix.'nexo_coupons` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CODE` varchar(200) NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `DATE_CREATION` datetime NOT NULL,
  `DATE_MOD` datetime NOT NULL,
  `AUTHOR` int(11) NOT NULL,
  `DISCOUNT_TYPE` varchar(200) NOT NULL,
  `AMOUNT` float NOT NULL,
  `EXPIRY_DATE` datetime NOT NULL,
  `USAGE_COUNT` int NOT NULL,
  `INDIVIDUAL_USE` int NOT NULL,
  `PRODUCTS_IDS` text NOT NULL,
  `EXCLUDE_PRODUCTS_IDS` text NOT NULL,
  `USAGE_LIMIT` int NOT NULL,
  `USAGE_LIMIT_PER_USER` int NOT NULL,
  `LIMIT_USAGE_TO_X_ITEMS` int NOT NULL,
  `FREE_SHIPPING` int NOT NULL,
  `PRODUCT_CATEGORIES` text NOT NULL,
  `EXCLUDE_PRODUCT_CATEGORIES` text NOT NULL,
  `EXCLUDE_SALE_ITEMS` int NOT NULL,
  `MINIMUM_AMOUNT` float NOT NULL,
  `MAXIMUM_AMOUNT` float NOT NULL,
  `USED_BY` text NOT NULL,
  `EMAIL_RESTRICTIONS` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;');

/**
 * Checkout Money Management
**/

$this->db->query('CREATE TABLE IF NOT EXISTS `'.$this->db->dbprefix.'nexo_checkout_money` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `AMOUNT` float NOT NULL,
  `TYPE` varchar(200) NOT NULL,
  `DATE_CREATION` datetime NOT NULL,
  `DATE_MOD` datetime NOT NULL,
  `AUTHOR` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;');	

// Shadow Price
$this->db->query( 'ALTER TABLE `' . $this->db->dbprefix('nexo_articles') . '` ADD `SHADOW_PRICE` FLOAT NOT NULL AFTER `PRIX_DE_VENTE`;' );