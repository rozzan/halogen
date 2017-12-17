<?php

namespace Halogen\Link;

trait HasLinks {

	private $links;

	public function addLink($rel, $href) {

		if(!in_array('_links', $this->appends))
			array_push($this->appends, '_links');

		if(array_key_exists($rel, $links))
			$links[$rel] = $href;
		else
			$links = array_merge($links, [$rel => $href]);

	}

}