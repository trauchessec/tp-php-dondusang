<?php

namespace Ynov\Geolocation;

use Ynov\Geolocation\Point;

class Adresse
{
    private $coordonnees;
    private $numero;
    private $rue;
    private $ville;
    private $code_postal;
    private $score;

    public function __construct(Point $coordonnees, string $numero, string $rue, string $ville, int $code_postal, float $score)
    {
        $this->coordonnees = $coordonnees;
        $this->numero = $numero; // $numero en string au cas ou c'est "2bis" et non juste un entier
        $this->rue = $rue;
        $this->ville = $ville;
        $this->code_postal = $code_postal;
        $this->score = $score;
    }

    public function getCoordonnees(): Point
    {
        return $this->coordonnees;
    }

    public function getAdresseComplete(): string
    {
        return $this->numero . " " . $this->rue . ", " . $this->ville . " " . $this->code_postal;
    }

    public static function distance(Adresse $adr1, Adresse $adr2): float
    {
        $lat1 = deg2rad($adr1->getCoordonnees()->getX());
        $lon1 = deg2rad($adr1->getCoordonnees()->getY());
        $lat2 = deg2rad($adr2->getCoordonnees()->getX());
        $lon2 = deg2rad($adr2->getCoordonnees()->getY());
        return acos(sin($lat1)*sin($lat2)+cos($lat1)*cos($lat2)*cos($lon2-$lon1))*6371;
    }
}
