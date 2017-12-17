<?php

namespace Halogen\Link;

trait HasLinks {

	private $curies;
	private $links;

	public function addCurie($name, $href) {

		if(!in_array('_links', $this->appends))
			array_push($this->appends, '_links');

		$curie = new Curie($name, $href);

		if(!in_array($curie, $curies))
			array_push($curies, $curie);

	}

	public function addLink($rel, $href, $replace) {

		if(!in_array('_links', $this->appends))
			array_push($this->appends, '_links');

		$link = new Link($rel, $href, $replace);

		if(!in_array($link, $links))
			array_push($links, $link);

	}

	public function addLinkWithCurie($curieName, $rel, $href) {

		if(!in_array('_links', $this->appends))
			array_push($this->appends, '_links');

		foreach($curies as $curie) {

			if($curie->name === $curieName) {

				$link = new Link($curieName.':'.$rel, $href);

				if(!in_array($link, $links))
					array_push($links, $link);

				return;

			}

		}

	}

	public function getLinksAttribute() {

		$json = [];

		if(sizeof($curies) > 0)
			$json['curies'] = [];

		foreach($curies as $curie) {

			$same = false;
			for($i = 0; $i < sizeof($json['curies']); $i += 1) {

				if($json['curies'][$i]->name == $curie->name) {

					$json['curies'][$i] = $curie;
					$same = true;
					break;

				}

			}

			if(!$same)
				array_push($json['curies'], $curie);

		}

		foreach($links as $link)
			$json[$link->rel => ['href' => $link->href]];

		return $json;

	}

}