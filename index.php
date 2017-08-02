<?php
error_reporting(E_ERROR);
ini_set('display_errors', 1);

date_default_timezone_set('America/New_York');

require_once("vendor/autoload.php");

$config = new \PHRETS\Configuration;
$config->setLoginUrl('http://retsgw.flexmls.com/rets2_3/Login')
    ->setUsername('hc.rets.selpwa-2')
    ->setPassword('lubra-haired34')
    ->setRetsVersion('1.7.2');

$rets = new \PHRETS\Session($config);

$connect = $rets->Login();

$query = '(LIST_5=20160929194343326218000000,20160929194538502692000000,20160929194538570801000000,20160929194343354485000000,20160929194503266573000000,20160929194406556185000000,20160929194420587668000000,20160929194436871008000000,20160929194555457086000000,20160929194405423594000000,20160929194405632793000000)';
$query .= '(LIST_106=20160929194000037052000000)';

$listings = [];

if ($_GET['type'] == 'residential') {
    $results = $rets->Search(
        'Property',
        'A',
        $query
    );
    foreach ($results as $result) {
        $listing = [
            'title' => $result->get('LIST_79'),
            'description' => $result->get('LIST_78'),
            'list_price' => $result->get('LIST_22'),
            'address' => "{$result->get('LIST_31')} {$result->get('LIST_34')} {$result->get('LIST_37')}\r\n {$result->get('LIST_39')}, FL {$result->get('LIST_43')}",
            'photo_urls' => [],
        ];
        $id = $result->get('LIST_1');
        $photos = $rets->GetObject("Property", "Photo", $id, "*", 1);
        foreach ($photos as $photo) {
            $listing['photo_urls'][] = $photo->getLocation();
        }
        $listings[] = $listing;
    }
    $results = $rets->Search(
        'Property',
        'B',
        $query
    );
    foreach ($results as $result) {
        $listing = [
            'title' => $result->get('LIST_79'),
            'description' => $result->get('LIST_78'),
            'list_price' => $result->get('LIST_22'),
            'address' => "{$result->get('LIST_31')} {$result->get('LIST_34')} {$result->get('LIST_37')}\r\n {$result->get('LIST_39')}, FL {$result->get('LIST_43')}",
            'photo_urls' => [],
        ];
        $id = $result->get('LIST_1');
        $photos = $rets->GetObject("Property", "Photo", $id, "*", 1);
        foreach ($photos as $photo) {
            $listing['photo_urls'][] = $photo->getLocation();
        }
        $listings[] = $listing;
    }
    $results = $rets->Search(
        'Property',
        'C',
        $query
    );
    foreach ($results as $result) {
        $listing = [
            'title' => $result->get('LIST_79'),
            'description' => $result->get('LIST_78'),
            'list_price' => $result->get('LIST_22'),
            'address' => "{$result->get('LIST_31')} {$result->get('LIST_34')} {$result->get('LIST_37')}\r\n {$result->get('LIST_39')}, FL {$result->get('LIST_43')}",
            'photo_urls' => [],
        ];
        $id = $result->get('LIST_1');
        $photos = $rets->GetObject("Property", "Photo", $id, "*", 1);
        foreach ($photos as $photo) {
            $listing['photo_urls'][] = $photo->getLocation();
        }
        $listings[] = $listing;
    }
    $results = $rets->Search(
        'Property',
        'F',
        $query
    );
    foreach ($results as $result) {
        $listing = [
            'title' => $result->get('LIST_79'),
            'description' => $result->get('LIST_78'),
            'list_price' => $result->get('LIST_22'),
            'address' => "{$result->get('LIST_31')} {$result->get('LIST_34')} {$result->get('LIST_37')}\r\n {$result->get('LIST_39')}, FL {$result->get('LIST_43')}",
            'photo_urls' => [],
        ];
        $id = $result->get('LIST_1');
        $photos = $rets->GetObject("Property", "Photo", $id, "*", 1);
        foreach ($photos as $photo) {
            $listing['photo_urls'][] = $photo->getLocation();
        }
        $listings[] = $listing;
    }
} else {
    $results = $rets->Search(
        'Property',
        'E',
        $query
    );
    foreach ($results as $result) {
        $listing = [
            'title' => $result->get('LIST_79'),
            'description' => $result->get('LIST_78'),
            'list_price' => $result->get('LIST_22'),
            'address' => "{$result->get('LIST_31')} {$result->get('LIST_34')} {$result->get('LIST_37')}\r\n {$result->get('LIST_39')}, FL {$result->get('LIST_43')}",
            'photo_urls' => [],
        ];
        $id = $result->get('LIST_1');
        $photos = $rets->GetObject("Property", "Photo", $id, "*", 1);
        foreach ($photos as $photo) {
            $listing['photo_urls'][] = $photo->getLocation();
        }
        $listings[] = $listing;
    }
    $results = $rets->Search(
        'Property',
        'D',
        $query
    );
    foreach ($results as $result) {
        $listing = [
            'title' => $result->get('LIST_79'),
            'description' => $result->get('LIST_78'),
            'list_price' => $result->get('LIST_22'),
            'address' => "{$result->get('LIST_31')} {$result->get('LIST_34')} {$result->get('LIST_37')}\r\n {$result->get('LIST_39')}, FL {$result->get('LIST_43')}",
            'photo_urls' => [],
        ];
        $id = $result->get('LIST_1');
        $photos = $rets->GetObject("Property", "Photo", $id, "*", 1);
        foreach ($photos as $photo) {
            $listing['photo_urls'][] = $photo->getLocation();
        }
        $listings[] = $listing;
    }
}

$data = json_encode($listings);

//header("Content-Type: application/json");
header('Access-Control-Allow-Origin: *');
echo $_GET['callback'] . '(' . $data . ')';
