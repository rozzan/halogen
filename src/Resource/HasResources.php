<?php

namespace Halogen\Resource;

use Illuminate\Database\Eloquent\Model;

trait HasResources {
	
	private $resources;

	public function addResource($rel, Model $model) {

		if(!in_array('_embedded', $this->appends))
			array_push($this->appends, '_embedded');

		$resource = new Resource($rel, $model);

		if(!in_array($resource, $resources))
			array_push($resources, $resource);

	}

	public function getEmbeddedAttribute() {

		$json = [];

		foreach($resources as $resource) {

			if(array_key_exists($resource->rel, $json)) {

				if(!array_key_exists(0, $json[$resource->rel]))
					$json[$resource->rel] = array($json[$resource->rel], $resource->model);
				else
					array_push($json[$resource->rel], $resource->model);

			} else
				$json = array_merge($json, $resource);

		}

		return $json;

	}
	
}