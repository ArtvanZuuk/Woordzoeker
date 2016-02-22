<?php

$gevondenWoordenCoordinaten = array();
include_once 'Functies/Verticaal.php';

class VerticaalTest extends PHPUnit_Framework_TestCase {

    public function testVerticaal() {
        global $gevondenWoordenCoordinaten;
        $deWoorden[] = str_split("abc");
        $deWoorden[] = str_split("xyz");
        $wz[] = str_split("aqz");
        $wz[] = str_split("bqy");
        $wz[] = str_split("cqx");

        verticaalZoeken($wz, $deWoorden, 4);
        $this->assertEquals(array('x0y0', 'x0y1', 'x0y2'), $gevondenWoordenCoordinaten['abc']);
        $this->assertEquals(array('x2y2', 'x2y1', 'x2y0'), $gevondenWoordenCoordinaten['xyz']);
    }

    public function testVerticaal2() {
        global $gevondenWoordenCoordinaten;
        $deWoorden[] = str_split("abc");
        $deWoorden[] = str_split("xyz");
        $wz[] = str_split("qqq");
        $wz[] = str_split("aqz");
        $wz[] = str_split("bqy");
        $wz[] = str_split("cqx");
        $wz[] = str_split("qqq");

        verticaalZoeken($wz, $deWoorden, 4);
        $this->assertEquals(array('x0y1', 'x0y2', 'x0y3'), $gevondenWoordenCoordinaten['abc']);
        $this->assertEquals(array('x2y3', 'x2y2', 'x2y1'), $gevondenWoordenCoordinaten['xyz']);
    }

}
