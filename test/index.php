<?php
    include('Entree.php');

    $size = Entree::getSize();
    foreach ($size as $key => $value) {
        print "$value</br>";
    }

    try {
        $soup = new Entree('닭고기 수프', array('물', '닭고기'));
        if($soup->hasIntegredient(1)) {
            print "물!";
        }
    } catch(Exception $e) {
        print "재료 부족!" . $e->getMessage();
    }
    phpinfo();
