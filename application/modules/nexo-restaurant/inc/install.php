<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nexo_Restaurant_Install extends Tendoo_Module
{
    /**
     *  create tables
     *  @param string table prefix
     *  @return void
    **/

    public function create_tables( $prefix = '' )
    {
        $prefix     =   $prefix == '' ? $this->db->dbprefix : $prefix;

        $this->db->query( 'CREATE TABLE IF NOT EXISTS `' . $prefix . 'nexo_restaurant_rooms` (
          `ID` int(11) NOT NULL AUTO_INCREMENT,
          `NAME` varchar(200) NOT NULL,
          `DESCRIPTION` text NOT NULL,
          `DATE_CREATION` datetime NOT NULL,
          `DATE_MODIFICATION` datetime NOT NULL,
          `AUTHOR` int(11),
          PRIMARY KEY (`ID`)
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;' );

        $this->db->query( 'CREATE TABLE IF NOT EXISTS `' . $prefix . 'nexo_restaurant_tables` (
          `ID` int(11) NOT NULL AUTO_INCREMENT,
          `NAME` varchar( 200 )  NOT NULL,
          `DESCRIPTION` text NOT NULL,
          `MAX_SEATS` int( 11 ),
          `CURRENT_SEATS_USED` int(11),
          `STATUS` varchar(200),
          `SINCE` datetime not null,
          `DATE_CREATION` datetime not null,
          `DATE_MODIFICATION` datetime not null,
          `AUTHOR` int(11) NOT NULL,
          `REF_AREA` int(11) NOT NULL,
          PRIMARY KEY (`ID`)
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;' );

        $this->db->query( 'CREATE TABLE IF NOT EXISTS `' . $prefix . 'nexo_restaurant_areas` (
          `ID` int(11) NOT NULL AUTO_INCREMENT,
          `NAME` varchar(200) NOT NULL,
          `DESCRIPTION` text NOT NULL,
          `DATE_CREATION` datetime NOT NULL,
          `DATE_MODIFICATION` datetime NOT NULL,
          `AUTHOR` int(11) NOT NULL,
          `REF_ROOM` int(11) NOT NULL,
          PRIMARY KEY (`ID`)
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;' );

        $this->db->query('CREATE TABLE IF NOT EXISTS `'. $prefix .'nexo_restaurant_kitchens` (
          `ID` int(11) NOT NULL AUTO_INCREMENT,
          `NAME` varchar(200) NOT NULL,
          `DESCRIPTION` text NOT NULL,
          `AUTHOR` int(11) NOT NULL,
          `DATE_CREATION` datetime NOT NULL,
          `DATE_MOD` datetime NOT NULL,
          `REF_CATEGORY` int NOT NULL,
              `REF_ROOM` int NOT NULL,
          `PRINTER` text NOT NULL,
          PRIMARY KEY (`ID`)
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;');

        $this->db->query('CREATE TABLE IF NOT EXISTS `'. $prefix .'nexo_restaurant_modifiers` (
          `ID` int(11) NOT NULL AUTO_INCREMENT,
          `NAME` varchar(200) NOT NULL,
          `DESCRIPTION` text NOT NULL,
          `AUTHOR` int(11) NOT NULL,
          `DATE_CREATION` datetime NOT NULL,
          `DATE_MODIFICATION` datetime NOT NULL,
          `REF_CATEGORY` int(11) NOT NULL,
          `DEFAULT` boolean NOT NULL,
          `PRICE` float(11) NOT NULL,
          `IMAGE` text NOT NULL,
          PRIMARY KEY (`ID`)
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;');

        $this->db->query('CREATE TABLE IF NOT EXISTS `'. $prefix .'nexo_restaurant_modifiers_categories` (
          `ID` int(11) NOT NULL AUTO_INCREMENT,
          `NAME` varchar(200) NOT NULL,
          `DESCRIPTION` text NOT NULL,
          `AUTHOR` int(11) NOT NULL,
          `DATE_CREATION` datetime NOT NULL,
          `DATE_MODIFICATION` datetime NOT NULL,
          `FORCED` boolean NOT NULL,
          `MULTISELECT` boolean NOT NULL,
          PRIMARY KEY (`ID`)
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;');

        $this->db->query( 'ALTER TABLE `'. $prefix .'nexo_registers` ADD `REF_KITCHEN` INT NOT NULL AFTER `USED_BY`;');
        $this->db->query( 'ALTER TABLE `'. $prefix .'nexo_articles` ADD `REF_MODIFIERS_GROUP` INT NOT NULL AFTER `BARCODE_TYPE`;');

        Modules::enable( 'nexo-restaurant' );
    }

    /**
     *  Delete Tables
     *  @param string table prefix
     *  @return void
    **/

    public function delete_tables( $table_prefix = '' )
    {
        $table_prefix   =   $table_prefix == '' ? $this->db->dbprefix : $table_prefix;

        $this->db->query('DROP TABLE IF EXISTS `' . $table_prefix . 'nexo_restaurant_rooms`;');
        $this->db->query('DROP TABLE IF EXISTS `' . $table_prefix . 'nexo_restaurant_tables`;');
        $this->db->query('DROP TABLE IF EXISTS `' . $table_prefix . 'nexo_restaurant_areas`;');
        $this->db->query('DROP TABLE IF EXISTS `' . $table_prefix . 'nexo_restaurant_kitchens`;');
        $this->db->query('DROP TABLE IF EXISTS `' . $table_prefix . 'nexo_restaurant_modifiers`;');
        $this->db->query('DROP TABLE IF EXISTS `' . $table_prefix . 'nexo_restaurant_modifiers_categories`;');
        $this->db->query( 'ALTER TABLE `' . $table_prefix . 'nexo_registers` DROP `REF_KITCHEN`;' );
        $this->db->query( 'ALTER TABLE `' . $table_prefix . 'nexo_articles` DROP `REF_MODIFIERS_GROUP`;' );
    }
}
