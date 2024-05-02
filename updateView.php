<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>

<?php
 $id_mhs = $_GET['id_mhs'];
 $curl= curl_init();
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
 //Pastikan sesuai dengan address endpoint dari REST API di ubuntu
 curl_setopt($curl, CURLOPT_URL, 'https://jsonplaceholder.typicode.com/posts/1/comments?id='.$id.'');
 $res = curl_exec($curl);
 $json = json_decode($res, true);
//var_dump($json);
?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Data</h2>
                    </div>
                    <p>Please fill this form and submit to add student record to the database.</p>
                    <form action="updateMahasiswaDo.php" method="post">
                        <input type = "hidden" name="id_mhs" value="<?php echo $json["data"][0]["id_mhs"]; ?>">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="nama" class="form-control" value="<?php echo $json["data"][0]["nama"]; ?>">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="<?php echo $json["data"][0]["email"]; ?>">
                        </div>
                        <div class="form-group">
                            <label>Body</label>
                            <input type="text" name="body" class="form-control" value="<?php echo $json["data"][0]["body"]; ?>">
                        </div>
                        
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>