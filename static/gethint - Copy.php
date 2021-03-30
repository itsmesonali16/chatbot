<?php

$a[] = "Anita";
$a[] = "Barkha";
$a[] = "Chinmay";
$a[] = "Devendra";
$a[] = "Esha";
$a[] = "Flavita";
$a[] = "Gargi";
$a[] = "Hemangi";
$a[] = "Ishita";
$a[] = "Janhavi";
$a[] = "Kavya";
$a[] = "Ananya";
$a[] = "Maitri";
$a[] = "Mitali";
$a[] = "Parnika";
$a[] = "Prishita";
$a[] = "Spruha";
$a[] = "Swara";
$a[] = "Urvi";
$a[] = "Varsha";
$a[] = "Vrushali";
$a[] = "Lopamudra";
$a[] = "Talitha";
$a[] = "Kranti";
$a[] = "Shivanya";
$a[] = "Gitanjali";
$a[] = "Gauri";
$a[] = "Jui";
$a[] = "Kshipra";
$a[] = "Shivani";


$q = $_REQUEST["q"];

$hint = "";


if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
        }
    }
}


echo $hint === "" ? "no suggestion" : $hint;
?>
