<?php

class Accessories extends CSV_Model
{
	// Accessory Id
    public $accessoryId;
    
	// Accessory name
    public $accessoryName;
    
	// Accessory image path
    public $accessoryImg;
    
	// Accessory comfort
    public $accessoryComfort;
    
	// Accessory speed
    public $accessorySpeed;
    
	// Accessory professionality
    public $accessoryProfessionality;
	
    // Category id (foriegn key)
    public $categoryId;
	
    public function __construct()
    {
        parent::__construct(APPPATH . "../data/Accessories.csv", "accessoryId", "accessories");
    }
	
	public function rules()
	{
		$config = array(
			['field' => 'accessoryName', 'label' => 'name', 'rules' => 'alpha_numeric_spaces|max_length[64]'],
			['field' => 'accessoryComfort', 'label' => 'comfort', 'rules' => 'integer|less_than[4]'],
			['field' => 'accessorySpeed', 'label' => 'speed', 'rules' => 'integer|less_than[4]'],
			['field' => 'accessoryProfessionality', 'label' => 'professionality', 'rules' => 'integer|less_than[5]'],
			['field' => 'categoryId', 'label' => 'categoryId', 'rules' => 'integer|less_than[5]'],
		);
		return $config;
	}

}
