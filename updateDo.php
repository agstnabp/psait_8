<?php

if(isset($_POST['submit']))
{    

$name = $_POST['name'];
$email = $_POST['email'];
$body = $_POST['body'];
$id = $_POST['id'];


//Pastikan sesuai dengan address endpoint dari REST API di ubuntu
$url='https://jsonplaceholder.typicode.com/posts/1/comments?id='.$id.'';
$ch = curl_init($url);
//kirimkan data yang akan di update
$jsonData = array(
    'name' =>  $name,
    'email' => $email,
    'body' => $body,
);

//Encode the array into JSON.
$jsonDataEncoded = json_encode($jsonData);


curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//Tell cURL that we want to send a POST request.
curl_setopt($ch, CURLOPT_POST, true);

//Attach our encoded JSON string to the POST fields.
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

//Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 

$result = curl_exec($ch);
$result = json_decode($result, true);
curl_close($ch);

//var_dump($result);
print("<center><br>status :  {$result["status"]} "); 
print("<br>");
print("message :  {$result["message"]} "); 
 echo "<br>Success updating!";
 echo "<br><a href=selectMahasiswaView.php> OK </a>";
}
?>