<?php

use DAO\ContactDAO;

include 'DAO/ContactDAO.php';
include 'model/ContactModel.php';

$contactDao = new ContactDAO();
$contactModel = new ContactModel();


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adicionar contato</title>
</head>
<body>

    <div class="addheader">
        <h1>Novo contato</h1>
        <img src="">
    </div>

    <div class="form">
        <form action="home.php" method="post">
            <table>

                <input type="text" name="firstname" placeholder="Primeiro nome">
                <br>
                <input type="text" name="lastname" placeholder="Sobrenome">
                <br>
                <input type="text" name="company" placeholder="Empresa">

                <br><br>
                <input type="tel" name="phonenumber" placeholder="Número de telefone">
                <br><br>
                <input type="email" name="email" placeholder="Email">
                <br><br>
                <input type="date" name="birthday" placeholder="Data de Nascimento">
                <br><br>
                <textarea name="note" placeholder="notas"> </textarea>

                <input type="submit" value="Salvar" >
            </table>
        </form>
    </div>
</body>
</html>
