<?php

namespace Halogen\Link;

class Curie implements \JsonSerializable {
	
	private $name;
	private $href;

	public function __construct($name, $href) {

		$this->name = $name;
		$this->href = $href; 

	}

	public function jsonSerialize() {

		return ['name' => $this->name, 'href' => $this->href];

	}

}