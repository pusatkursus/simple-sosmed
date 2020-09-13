<?php 
$json = file_get_contents("https://sosmedpedia.com/getservice");
$array = json_decode($json,1);
$ID = $_POST['cat'];
//$datanya=array();
$datanya = array_filter($array, function ($var) use ($ID) {
    return ($var['category'] == $ID);
});
//print_r($datanya);
echo json_encode($datanya);

?>