
<html lang="en">
<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />

<head>
    <title>Show</title></head><?php
require 'header.php';
$conn = require 'config.php';
?>

    <style>
        body{
            background-color: #fdfbfb;
            font-family: Constantia;
        }

    .tablee{
        margin-left: 200px;
        margin-top: 50px;
        width:70%;
        font-size: 20px;

    }
    .tablee .head{
        border: 0px;
        background-color: black;
        height: 50px;
        color: whitesmoke;

    }
    .properties{
        text-align: center;
        height: 40px;
        width: 50px;

    }
    .properties #id{
        background-color: black;
        color: tan;
    }
     #email{
        width: 300px;
    }
     #surname{
         width: 170px;
     }
    .btn{
        width:75px;
        height:35px ;
        font-family: "Constantia";
        color: antiquewhite ;
        font-size: 15px;
    }
        .btn:hover{
            background-color: lightgrey ;
            color: white;
            font-size:20px ;
        }
    </style>
<body>
<?php
require 'function.php';
$people=get_people();
?>
<div class="tbl">
<table class="tablee">
    <tr class="head">
    <th>ID</th>
    <th>Name</th>
    <th id="surname">Surname</th>
    <th id="email">Email</th>
    <th>Birthday</th>
    <th>Age</th>

    </tr>
     <?php foreach ($people as $person){
           ?>   <tr class="properties" id="rows" >
            <td id="id" > <?php echo $person['id'];
            $id= $person['id'];?>  </td>
            <td id="name"><?php echo $person['name']; ?></td>
            <td id="surname"><?php echo $person['surname']; ?></td>
            <td id="email"><?php echo $person['email']; ?></td>
            <td><?php echo $person['birthday']; ?></td>
            <td><?php echo $person['age']; ?></td>
            <td id="edit">
        <a href="edit.php?edit_id=<?=$person['id'] ?> " ><input type="button" style="background-color: mistyrose ; color: black  " class="btn" value="Edit"/></a>
        <td id="delete">
            <a href="delete.php?id=<?=$person['id'] ?> "><input type="button" style="background-color: #dc143c" class="btn" value="Delete"/></a>
        </td>

        <?php
            echo "\r\n"; ?>
   <?php  } ?> </tr>
</table>

</div>
</body>
</html>