<?php

namespace Halogen\Link;

trait HasLinks {

	private $curies;
	private $links;

	public function addCurie($name, $href) {

		if(!in_array('_links', $this->appends))
			array_push($this->appends, '_links');

		for($i = 0; $i < sizeof($curies); $i += 1) {
			if($curies[$i]['name'] == $name)	{
				$curies[$i]['name'] = $name;
				$curies[$i]['href'] = $href;
				return;
			}
		}

		array_push($curies, ['name' => $name, 'href' => $href]);

	}

	public function addLink($rel, $href) {

		if(!in_array('_links', $this->appends))
			array_push($this->appends, '_links');

		if(array_key_exists($rel, $links))
			$links[$rel] = $href;
		else
			$links = array_merge($links, [$rel => $href]);

	}

	public function addLinkWithCurie($curie, $rel, $href) {

		for($i = 0; $i < sizeof($curies); $i += 1) {
			if($curies[$i]['name'] == $curie)	{
				$links[$curie . ':' . $rel] = $href;
				return;
			}
		}

	}

}