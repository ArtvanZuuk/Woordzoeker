<?php
$laatste = end($classes);
array_pop($classes);
foreach ($classes as $class) {
    print "div." . $class . ":hover,";
}
print "div." . $laatste . ":hover";
print " {text-decoration: underline;}";
