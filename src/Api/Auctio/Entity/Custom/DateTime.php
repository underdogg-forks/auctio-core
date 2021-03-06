<?php

namespace AuctioCore\Api\Auctio\Entity\Custom;

use AuctioCore\Api\BaseInterface;

class DateTime extends \DateTime implements BaseInterface {

    public function populate($data) {
        if ($data instanceof \DateTime) {
            $timestamp = $data->getTimestamp();
        } elseif (is_array($data)) {
            $date = new \DateTime($data['date']);
            $timestamp = $date->getTimestamp();
        } else {
            $date = new \DateTime($data);
            $timestamp = $date->getTimestamp();
        }
        $this->setTimestamp($timestamp);
        return $this;
    }

    /**
     * Returns a JSON encoded string with current Entity.
     * We have filtered out the readOnly elements
     * @return string
     */
    public function encode(){
        // Set timezone to UTC
        $this->setTimezone(new \DateTimeZone('UTC'));

        // Return
        return $this->format(self::ISO8601);
    }
}