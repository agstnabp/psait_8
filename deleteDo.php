<?php

$id_mhs = $_GET['id_mhs'];

//Pastikan sesuai dengan address endpoint dari REST API di ubuntu
$url='https://jsonplaceholder.typicode.com/posts/1/comments?id='.$id.'';


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
// pastikan method nya adalah delete
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);
$result = json_decode($result, true);

curl_close($ch);

//var_dump($result);
// tampilkan return statusnya, apakah sukses atau tidak
print("<center><br>status :  {$result["status"]} "); 
print("<br>");
print("message :  {$result["message"]} "); 
 //
echo "<br>Success deleting!";
echo "<br><a href=selectMahasiswaView.php> OK </a>";

?>