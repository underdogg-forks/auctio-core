<?php

namespace AuctioCore\Api\Auctio\Entity\Custom;

use AuctioCore\Api\Base;

class LocaleMessage extends Base {

    /**
	 * @var string
	 */
	public $nl;
	/**
	 * @var string
	 */
	public $en;
	/**
	 * @var string
	 */
	public $fr;
	/**
	 * @var string
	 */
	public $de;

    public function populate($data) {
        if (empty($data)) return;
        if (is_object($data)) $data = get_object_vars($data);

        foreach ($data AS $language => $text) {
            if (property_exists($this, $language)) {
                $this->$language = $text;
            }
        }

        return $this;
    }

	public function encode() {
		$data = array();
		$encoded = parent::encode();

		foreach(json_decode($encoded) as $language => $value) {
			if($value !== null) {
				$data[$language] = $value;
			}
		}

		if(empty($data)) {
			$data = new \stdClass();
		}

		return json_encode($data);
	}

	public function exchangeArray($data) {
		$this->nl = (!empty($data['nl'])) ? $data['nl'] : null;
		$this->en = (!empty($data['en'])) ? $data['en'] : null;
		$this->fr = (!empty($data['fr'])) ? $data['fr'] : null;
		$this->de = (!empty($data['de'])) ? $data['de'] : null;
	}

}