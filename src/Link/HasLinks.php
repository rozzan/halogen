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

	public function addLink($rel, $href) {

		if(!in_array('_links', $this->appends))
			array_push($this->appends, '_links');

		$link = new Link($rel, $href);

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

}