<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <title>Edit data</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <center>

   
<div class="form-boxs">
<br><span><h1>Add data in the database mydb</h1></span>
<form action ="insertrec.php" method = "post" class="form">
<div class="input-group">

<?php 

$conn = mysqli_connect("localhost", "root", "", "mydb");
if($conn===false){
    die("ERROR: Could connect" . mysqli_connect_error());
}
$sql = "DELETE FROM tbluser WHERE custid='" . $_GET["cust"] . "'";
$query = "SELECT * FROM tbluser WHERE custid='" . $_GET["cust"] . "'";
if($result = $conn->query($query)){
    while($row = $result->fetch_assoc()){
        $field1name = $row["firstname"];
        $field2name = $row["lastname"];
        $field3name = $row["email"];
        $field4name = $row["custid"];
        echo '<form action ="insertrec.php" method = "post" "> 
        <div class="form-box"> 
        <div class="input-group">

                <label class="label" for="userid"> User id :</label>
                <input class="input" type="text" name="custid" id ="custid" value='.$field4name.'>


                <label class="label" for="firstname"> Firstname :</label>
                <input class="input" type="text" name="firstname" id ="firstname" value='.$field1name.'>

                <label for="lastname"> Lastname :</label>
                <input class="input" type="text" name="lastname" id ="lastname" value='.$field2name.'>

                <label for="email"> Email Address :</label>
                <input class="input" type="text" name="email" id ="email" value='.$field3name.'>

                
                </div>
                <input class type="submit" value ="Update" class="btn btn-success">
                </div>
                
               
                
              </form>';
              
        mysqli_query($conn,$sql);
                ;
    }
    $result->free();
}

?>

</div>
</center>
</body>
</html>
