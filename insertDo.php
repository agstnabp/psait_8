<?php

if(isset($_POST['submit']))
{    
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];

//Pastikan sesuai dengan address endpoint dari REST API di ubuntu
$url='https://translate.google.com/website?sl=en&tl=id&hl=id&client=srp&u=https://api.tvmaze.com/episodes/1/guestcrew';
$ch = curl_init($url);
// data yang akan dikirim ke REST api, dengan format json
$jsonData = array(
    'name' =>  $name,
    'email' => $email,
    'body' => $body,
    
);

//Encode the array into JSON.
$jsonDataEncoded = json_encode($jsonData);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//pastikan mengirim dengan method POST
curl_setopt($ch, CURLOPT_POST, true);

//Attach our encoded JSON string to the POST fields.
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

//Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 

//Execute the request
$result = curl_exec($ch);
$result = json_decode($result, true);

curl_close($ch);

//var_dump($result);
// tampilkan return statusnya, apakah sukses atau tidak
print("<center><br>status :  {$result["status"]} "); 
print("<br>");
print("message :  {$result["message"]} "); 
echo "<br>Success add data!";
echo "<br><a href=selectMahasiswaView.php> OK </a>";
}
?>