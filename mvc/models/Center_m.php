<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Center_m extends MY_Model
{

	protected $_table_name = 'center';
	protected $_primary_key = 'id';
	protected $_primary_filter = 'intval';
	protected $_order_by = "id asc";

	public function __construct()
	{
		parent::__construct();
	}
	

}
