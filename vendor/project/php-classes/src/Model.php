<?php

namespace Inova;

class Model {

	/*contem todos os dados e valores dos campos que temos*/
	private $values = []; 

	public function __call($name, $args) {

		$method = substr($name, 0, 3);
		$fieldName = substr($name, 3, strlen($name));

		switch ($method) {
			case 'get':
				return (isset($this->values[$fieldName])) ? $this->values[$fieldName] : NULL;
				break;
			
			case 'set':
				$this->values[$fieldName] = $args[0];
				break;
				
		}
	}

	//função  onde irá passar os dados do banco chave e valor
	public function setData($data = array()) {

		foreach ($data as $key => $value) {

			$this->{"set".$key}($value);
		}
		
	}

	//retorno do atributo
	public function getValues()
	{
		return $this->values;
	}


}


?>