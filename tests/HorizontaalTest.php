<?php

$gevondenWoordenCoordinaten = array();
include_once 'Functies/Horizontaal.php';

class HorizontaalTest extends PHPUnit_Framework_TestCase {

    public function testHorizontaal() {
        global $gevondenWoordenCoordinaten;
        $deWoorden[] = str_split("abc");
        $wz[] = str_split("abc");
        $wz[] = str_split("xyz");

        horizontaalZoeken($wz, $deWoorden, 4);
        $this->assertEquals(array('x0y0', 'x1y0', 'x2y0'), $gevondenWoordenCoordinaten['abc']);
    }

    public function testHorizontaal2() {
        global $gevondenWoordenCoordinaten;
        $deWoorden[] = str_split("abc");
        $deWoorden[] = str_split("xyz");
        $wz[] = str_split("abc");
        $wz[] = str_split("xyz");

        horizontaalZoeken($wz, $deWoorden, 4);
        $this->assertEquals(array('x0y0', 'x1y0', 'x2y0'), $gevondenWoordenCoordinaten['abc']);
        $this->assertEquals(array('x0y1', 'x1y1', 'x2y1'), $gevondenWoordenCoordinaten['xyz']);
    }

}
