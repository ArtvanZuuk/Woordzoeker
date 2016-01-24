<?php
    header("content-type: text/css; charset: UTF-8");
?>
#zoekwoorden {
margin-left : auto;
margin-right : auto;
width : 150px;
text-align : center;
}
body {
margin : 0;
padding : 0;
background-image : url("wallpaper.jpg");
}
table, td {
    border: 1px solid black;
    border-collapse: collapse;
    background-color:#FFFFFF ;
    margin : auto;
}
td {
    padding: 1px;
    text-align: center;
    font-size : 2em;
    width: 38px;
}
table{
height: auto;
margin : auto;
box-shadow: 5px 5px 15px #888888;
}
#tabel {
box-shadow: 5px 5px 15px #777777;
padding : 20px;
width : 90%;
height: 800px;
background-color : #65c3ba;
margin : auto;
margin-top: 25px;
}
td.podcast {
    background-color : red;
}
<?php
$classes = array("beeld", "browser", "edublog", "geheugen");
foreach ($classes as $class){print join("div.", $class, ":hover,");
print " {text-decoration: underline;}";
} 
?>
div.beeld:hover, div.browser:hover, div.edublog:hover, div.geheugen:hover, div.leren:hover, div.muis:hover, div.podcast:hover, div.samen:hover, div.spelen:hover, div.toetsen:hover { 
    text-decoration: underline;
}