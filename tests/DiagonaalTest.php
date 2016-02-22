<?php

$gevondenWoordenCoordinaten = array();
include_once 'Functies/Diagonaal.php';

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
        foreach(array('x0y0', 'x1y1', 'x2y2') as $v) {
            $this->assertTrue(in_array($v, $gevondenWoordenCoordinaten['zbx']), 'bevat zbx ' . $v);
        }
        foreach(array('x2y2', 'x1y1', 'x0y0') as $v) {
            $this->assertTrue(in_array($v, $gevondenWoordenCoordinaten['xbz']), 'bevat xbz ' . $v);
        }
        
    }

    public function testDiagonaal2() {
        global $gevondenWoordenCoordinaten;
        $deWoorden[] = str_split("abc");
        $deWoorden[] = str_split("xyz");
        $wz[] = str_split("qqqx..");
        $wz[] = str_split("aqz.y.");
        $wz[] = str_split(".b...z");
        $wz[] = str_split("cqc...");
        $wz[] = str_split("qqqc..");

        diagonaalZoeken($wz, $deWoorden, 4);
        print_r($gevondenWoordenCoordinaten);
        $this->assertTrue(4, count($gevondenWoordenCoordinaten));
        $this->assertEquals(array('x0y3', 'x1y2', 'x2y1'), $gevondenWoordenCoordinaten['abc']);
        $this->assertEquals(array('x2y1', 'x1y2', 'x0y3'), $gevondenWoordenCoordinaten['cba']);
        $this->assertEquals(array('x0y1', 'x1y2', 'x2y3'), $gevondenWoordenCoordinaten['zbx']);
        $this->assertEquals(array('x2y3', 'x1y2', 'x0y1'), $gevondenWoordenCoordinaten['xbz']);
    }

}
