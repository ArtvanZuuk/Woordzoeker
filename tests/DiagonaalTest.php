<?php

$gevondenWoordenCoordinaten = array();
include_once 'Diagonaal.php';

class DiagonaalTest extends PHPUnit_Framework_TestCase {

    public function testDiagonaal() {
        global $gevondenWoordenCoordinaten;
        $deWoorden[] = str_split("abc");
        $deWoorden[] = str_split("cba");
        $deWoorden[] = str_split("zbx");
        $deWoorden[] = str_split("xbz");
        $wz[] = str_split("xqc");
        $wz[] = str_split("qbq");
        $wz[] = str_split("aqz");

        diagonaalZoeken($wz, $deWoorden, 4);
        $this->assertEquals(array('x0y2', 'x1y1', 'x2y0'), $gevondenWoordenCoordinaten['abc']);
        $this->assertEquals(array('x2y0', 'x1y1', 'x0y2'), $gevondenWoordenCoordinaten['cba']);
        $this->assertEquals(array('x0y0', 'x1y1', 'x2y2'), $gevondenWoordenCoordinaten['zbx']);
        $this->assertEquals(array('x2y2', 'x1y1', 'x0y0'), $gevondenWoordenCoordinaten['xbz']);
    }

    public function testDiagonaal2() {
        global $gevondenWoordenCoordinaten;
        $deWoorden[] = str_split("abc");
        $deWoorden[] = str_split("xyz");
        $wz[] = str_split("qqq");
        $wz[] = str_split("aqz");
        $wz[] = str_split("bqy");
        $wz[] = str_split("cqx");
        $wz[] = str_split("qqq");

        diagonaalZoeken($wz, $deWoorden, 4);
        $this->assertEquals(array('x0y3', 'x1y2', 'x2y1'), $gevondenWoordenCoordinaten['abc']);
        $this->assertEquals(array('x2y1', 'x1y2', 'x0y3'), $gevondenWoordenCoordinaten['cba']);
        $this->assertEquals(array('x0y1', 'x1y2', 'x2y3'), $gevondenWoordenCoordinaten['zbx']);
        $this->assertEquals(array('x2y3', 'x1y2', 'x0y1'), $gevondenWoordenCoordinaten['xbz']);
    }

}
