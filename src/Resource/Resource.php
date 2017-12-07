<?php

namespace Halogen\Resource;

use Illuminate\Database\Eloquent\Model;

class Resource implements \JsonSerializable {
		
	protected $rel;
	protected $model;

	public function __construct($rel, Model $model) {

		$this->rel = $rel;
		$this->model = $model;

	}

	public function jsonSerialize() {

		return [$this->rel => $this->model];

	}

}
