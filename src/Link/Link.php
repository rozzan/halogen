<?php

namespace Halogen\Link;

class Link implements \JsonSerializable {
	
	protected $rel;
	protected $href;

	public function __construct($rel, $href) {

		$this->rel = $rel;
		$this->href = $href;

	}

	public function jsonSerialize() {

		return [$this->rel => ['href' => $this->href]];

	}

}