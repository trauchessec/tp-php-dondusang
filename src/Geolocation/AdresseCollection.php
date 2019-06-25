<?php

namespace Ynov\Geolocation;

use Ynov\Geolocation\Point;

class AdresseCollection
{
    private $adresses;

    public function __construct(array $adresses)
    {
        $this->adresses = $adresses;
    }

    public static function createFromFeatures(object $features): AdresseCollection
    {
        //todo
        $instance = new self();
    }
    public function sortByDistance (): AdresseCollection
    {
        //todo
    }
}
