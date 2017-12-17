<?php

namespace Halogen\Link;

class Link {
	
	protected $rel;
	protected $href;

	public function __construct($rel, $href) {

		$this->rel = $rel;
		$this->href = $href;

	}

}