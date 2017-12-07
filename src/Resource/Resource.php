<?php

namespace Halogen\Resource;

use Illuminate\Database\Eloquent\Model;

class Resource {
		
	protected $rel;
	protected $model;

	public function __construct($rel, Model $model) {

		$this->rel = $rel;
		$this->model = $model;

	}

}
