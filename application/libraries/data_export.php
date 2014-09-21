<?php 

/**
* Generic DATA export class
*/
class export
{
	var $controller;
	var $headers,
	var $rows;

	function __construct($controller, $data)
	{
		$this->controller 	= $controller;
		$this->headers 		= $data['headers'];
		$this->rows 		= $data['rows'];
	}
}
?>