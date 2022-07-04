<?php
/* Copyright (C) 2019 Elonet <contact@elonet.fr>
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */
include_once DOL_DOCUMENT_ROOT . "/core/modules/DolibarrModules.class.php";

/**
 * Description and activation class for module MyModule
 */
class modBestdiscount extends DolibarrModules
{

	/**
	 * 	Constructor. Define names, constants, directories, boxes, permissions
	 *
	 * 	@param	DoliDB		$db	Database handler
	 */
	function __construct($db)
	{
		global $langs, $conf;

		$this->db = $db;
		
		$this->editor_name = 'NORD ERP CRM';
		$this->numero = 491001;
		$this->family = "NORD ERP CRM";
		$this->rights_class = 'bestdiscount';
		$this->name = "Meilleure gestion des acomptes";
		$this->description = "Meilleure gestion des acomptes sur le PDF des factures clients";
		$this->version = '1.1';
		$this->const_name = 'MAIN_MODULE_BESTDISCOUNT';
		$this->special = 0;
		$this->picto='img/Logo@bestdiscount';
		$this->module_parts = array(
			'models' => 1
		);
		$this->dirs = array("/bestdiscount/temp");
		$this->config_page_url = array();
		$this->depends = array();
		$this->requiredby = array();
		$this->phpmin = array(5, 3);
		$this->need_dolibarr_version = array(10,0);
		$this->langfiles = array("bills", "companies", "interventions", "bestdiscount@bestdiscount");
		$this->const = array();
		$this->tabs = array();

		if (! isset($conf->bestdiscount) || ! isset($conf->bestdiscount->enabled))
		{
			$conf->bestdiscount=new stdClass();
			$conf->bestdiscount->enabled=0;
		}
		// Dictionaries
		$this->dictionnaries=array();

		// Boxes
        $this->boxes = array();

		// Permissions
		$this->rights = array(); // Permission array used by this module
		$r = 0;
		
		// Main menu entries
		$this->menus = array(); // List of menus to add
		$r = 0;
		
		$r++;
		$this->menu[$r]=array();
		$r++;
	}

	/**
	 * Function called when module is enabled.
	 * The init function add constants, boxes, permissions and menus
	 * (defined in constructor) into Dolibarr database.
	 * It also creates data directories
	 *
	 * 	@param		string	$options	Options when enabling module ('', 'noboxes')
	 * 	@return		int					1 if OK, 0 if KO
	 */
	function init($options = '')
	{
	    global $conf, $langs, $db;
		
		$sql = array();
		
		$result = $this->load_tables();

		return $this->_init($sql, $options);
	}

	/**
	 * Function called when module is disabled.
	 * Remove from database constants, boxes and permissions from Dolibarr database.
	 * Data directories are not deleted
	 *
	 * 	@param		string	$options	Options when enabling module ('', 'noboxes')
	 * 	@return		int					1 if OK, 0 if KO
	 */
	function remove($options = '')
	{
		$sql = array();

		return $this->_remove($sql, $options);
	}

	/**
	 * Create tables, keys and data required by module
	 * Files llx_table1.sql, llx_table1.key.sql llx_data.sql with create table, create keys
	 * and create data commands must be stored in directory /mymodule/sql/
	 * This function is called by this->init
	 *
	 * 	@return		int		<=0 if KO, >0 if OK
	 */
	function load_tables() {
		return $this->_load_tables('/bestdiscount/sql/');		
	}

}
?>