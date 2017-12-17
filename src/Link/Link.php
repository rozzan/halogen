<?php

namespace Halogen\Link;

class Link implements \JsonSerializable {
	
	protected $rel;
	protected $href;
	protected $replace;

	public function __construct($rel, $href, $replace) {

		$this->rel = $rel;
		$this->href = $href;
		$this->replace = $replace;

	}

	public function jsonSerialize() {

		foreach($replace as $key => $val) {
			$this->href = str_replace($key, $val, $this->href);
		}

		return [$this->rel => ['href' => $this->href]];

	}

}