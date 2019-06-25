<?php

namespace Ynov;

use Ynov\Geolocation\Point;
use Ynov\Geolocation\Adresse;

use Ynov\Network\Api;

class Application
{
    public function bootstrap()
    {
        $p = new Point(47.393256,0.683371);
        $a = new Adresse($p, "26", "rue premiere", 'TOURS', '37000', 0.254);


        $p2 = new Point(47.412800,0.706040);
        $a2 = new Adresse($p2, "2", "Impasse deuxieme", 'TOURS', '37000', 0.254);
        print "Distance entre adresse 1 et adresse 2: " . Adresse::distance($a, $a2) . 'km' . "<br/>";

        $api_adresse = new Api('https://api-adresse.data.gouv.fr/search/');
        $api_dondusang = new Api('http://api.openeventdatabase.org/event/');

        print "Nombre de don du sang ouvert aujourd'hui:" . $api_dondusang->getJSON()['count'] . "<br/>";

        if (isset($_GET) && isset($_GET['addresse']) && !empty($_GET['addresse']))
        {
            $adresse = $_GET['addresse'];
        }
        die();
    }
}