<?php

 require_once ('includes/include.php');



// Get Query String
$q = $_REQUEST['q'];

$suggestion = "";
$count_pages = "";

// Get Suggestions
if($q !== ""){
	$count_pages = R::count('test');
	$suggestion = $count_pages;
	
}
echo $suggestion === "" ? "No Suggestion" : $suggestion;