
<!DOCTYPE html>
<html  lang="en">

<head>
    <title>Edit/Update</title>
    <?php

    require 'header.php' ;
    $pdo = require 'config.php' ;
    $id=isset($_GET['edit_id'])? ($_GET['edit_id']): " ";
    ?>
    <style type="text/css">

        .tablee{
            position: fixed;
            border-color: white;
            text-align:center;
            size: 15px;
            font-size:20px;
            margin: 50px 300px;

        }
        .txtF{
            width: 95%;
            height:100%;
            border-color:white;
            font-size:20px;
        }
        .btn{
            width:100px;
            height:50px;
            border:1px;
            background-color:antiquewhite;
            font-size:15px;
            border:black;
            position: fixed;
            margin: 350px 620px;

        }
    </style>

</head>

<body>

<div>
    <h1 style="margin: 50px 500px 20px 550px">UPDATE USER</h1>
    <form action="edit.php" method="Post" name="form1">
        <table border="1" cellspacing="5" width="700" height="250" class="tablee">
            <tr>
                <td><label>ID</label></td>
                <td><input type="text" name="id" id="p-id" class="txtF" value="<?php echo $id ?>"></input></td>
            </tr>
            <tr>
                <td><label>Name</label></td>
                <td><input type="text" name="name" id="p-name" class="txtF"/></td>
            </tr>
            <tr>
                <td><label>Surname</label></td>
                <td><input type="text" name="surname" id="p-sname" class="txtF"/></td>
            </tr>
            <tr><td><label>Email</label></td>
                <td><input type="text" name="email" id="p-email" class="txtF"/></td>
            </tr>
            <tr>
                <td><label>Birthday</label></td>
                <td><input type="text" name="birthday" id="p-bday" class="txtF" placeholder = "yyyy-mm-dd"/></td>
            </tr>
            <tr>
                <td><label>Age</label></td>
                <td><input type="text" name="age" id="p-age" class="txtF"/></td>
            </tr>

        </table>
</div>

<button type="submit" name="Submit" class="btn">Submit</button>
</form><?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id'])){
        $id=$_POST['id'];
    }else {
        $id =' ';
    }
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
    } else {
        $name = ' ';
    }
    if (isset($_POST['surname'])) {
        $surname = $_POST['surname'];
    } else {
        $surname = ' ';
    }
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    } else {
        $email = ' ';
    }
    if (isset($_POST['birthday'])) {
        $birthday = $_POST['birthday'];
    } else {
        $birthday = ' ';
    }
    if (isset($_POST['age'])) {
        $age = $_POST['age'];
    } else {
        $age = ' ';
    }



    $sql = "update person set name='$name',surname='$surname' ,email='$email', birthday='$birthday',age= '$age' where id= '$id' ";
    $result = $pdo ->prepare($sql);
    $result -> bindParam('id', $id, PDO::PARAM_INT );
    $result->execute();


    header("Location: list.php ");



}

?>

</body>
</html>
