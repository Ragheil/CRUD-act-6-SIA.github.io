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
    
    <link rel="stylesheet" href="style.css">
   
    <title>activity 6</title>
</head>
<body>
    <center>
<div class="form-box">
<br><span><h1>Storring   data in the database mydb</h1></span>
<form action ="insertrec.php" method = "post" class="form">
<div class="input-group">
   
   <label class="label" for="userid"> User id :</label>
    <input class="input" type="text" name="custid" id ="custid">

   <label class="label" for="firstname"> Firstname :</label>
    <input class="input" type="text" name="firstname" id ="firstname" >

   <label for="lastname"> Lastname :</label>
    <input class="input" type="text" name="lastname" id ="lastname" >

   <label for="email"> Email Address :</label>
    <input class="input" type="text" name="email" id ="email" >

</div>
<input type="submit" value ="Submit" class="btn btn-success">

</form>

</div>

<?php
$conn = mysqli_connect("localhost", "root", "", "mydb");

if($conn===false){
    die("ERROR: Could connect" . mysqli_connect_error());
}
$query = "SELECT * FROM tbluser";
echo '<table class="table table-bordered table-striped">
        
        <tr class="thead-dark">
            <th> <font face="Arial">Firstname</font></th>
            <th> <font face="Arial">Lastname</font></th>
            <th> <font face="Arial">Email</font></th>
            <th> <font face="Arial">custid</font></th>
            <th> <font face="Arial">action</font></th>
        </tr>';
    if($result = $conn->query($query)){
        while($row = $result->fetch_assoc()){
            $field1name = $row["firstname"];
            $field2name = $row["lastname"];
            $field3name = $row["email"];
            $field4name = $row["custid"];
       echo '<tr>
                <td>'.  $field1name. '</td>
                <td>'.  $field2name. '</td>
                <td>'.  $field3name. '</td>
                <td>'.  $field4name. '</td>
                <td><a href=dele.php?cust='.$field4name .'> <img src="del.png" width=20 height=20></a>  &emsp;
                    <a href=edito.php?cust='.$field4name .'> <img src="edit.png" width=20 height=20> </a></td>
             </tr>';
          
        }
        $result->free();
    }

?>

</table>
</center>
</body>
</html>