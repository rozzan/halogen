<?php

namespace Halogen\Resource;

use Illuminate\Database\Eloquent\Model;

trait HasResources {
	
	private $resources;

	public function addResource($rel, Model $model) {

		if(!in_array('_embedded', $this->appends))
			array_push($this->appends, '_embedded');

		if(array_key_exists($rel, $resources)) {

			if(!array_key_exists(0, $resources[$rel]))
				$resources[$rel] = array($resources[$rel], $model);
			else
				array_push($resources[$rel], $model);

		} else
			$resources = array_merge($resources, [$rel => $model]);

	}
	
}