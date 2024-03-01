<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
    
</head>
<body>

<style>
    body{
    margin: 0;background-color: rgb(255, 247, 237);
}
::-webkit-scrollbar{
    width: 0;
}
header{
    height: 100vh;
    width: 100vw;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    background-color:antiquewhite;

}
h3{
    text-align: center;font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    color:  rgb(112, 191, 255);
}


.submit-btn{
    background-color: rgb(112, 191, 255);
    height: 6vmin;width:30vmin;
    border: none;border-radius: 2vmin;
    color:white;font-size:medium;
    transition: all 0.2s ease;font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}
.submit-btn:hover{
    height: 7vmin; font-size:large;
}

</style>

    <header>



    <form method="post">
    <h3>MYSQL Get Last Id</h3><br>
        First Name :<br>
        <input type="text" name="FirstName"><br><br>
        Last Name:<br>
        <input type="text" name="LastName"><br><br>
        Email : <br>
        <input type="text" name="Email"><br><br>
        <input type="submit" value="insert Data" name="submit" style="cursor: pointer;" class="submit-btn"><br><br>
    </form>

<?php
$servername = 'localhost';
$username = 'root';
$passsword = '';
$dbname = 'obaid';
if(isset($_POST['submit'])){

$firstname = $_POST['FirstName'];
$lastname = $_POST['LastName'];
$email = $_POST['Email'];

try{
    $connection = new PDO ("mysql:host=$servername;dbname=$dbname",$username ,$passsword);
    $connection->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO test (firstname , lastname , email)
    VALUES ('$firstname','$lastname','$email')";
    $connection-> exec($sql);
    $last_id = $connection->lastInsertId();
    echo "last inserted is is $last_id";
}catch(PDOException $e){
    echo $sql.'<br>'.$e->getMessage();
}
}

?>

</header>
</body>
</html>


