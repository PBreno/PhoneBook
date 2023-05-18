<?php

use src\public\DAO\ContactDAO;
use src\public\Model\ContactModel;
use src\public\Model\UserModel;

include 'model/UserModel.php';
include 'model/ContactModel.php';


include 'DAO/Connection.php';
include 'DAO/ContactDAO.php';

try {

    $user = $_POST['user'];
    $password = $_POST['pwd'];

    $userModel = new UserModel($user, $password);
    $contactModel = new ContactModel();
    $contactDao = new ContactDAO();

    $contactModel->setFirstName( $_POST['firstname']);
    $contactModel->setLastName($_POST['lastname']);
    $contactModel->setCompany($_POST['company']);
    $contactModel->setPhoneNumber($_POST['phonenumber']);
    $contactModel->setEmail($_POST['email']);
    $contactModel->setBirthday($_POST['birthday']);
    $contactModel->setNote($_POST['note']);

    $contactDao->InsertContact($contactModel);
}catch (Exception $e){
       echo $e->getMessage();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Homepage</title>
</head>
<body>

    <div class="main">

        <header>
            <div class="container">
                <h1>Agenda <?php echo $userModel->getUser();?></h1>
                <a href="add.php"><input type="button" value="Adicionar"></a>
                <input type="text" name="search" placeholder="search" autocomplete="on">
                <hr>
            </div>
        </header>

        <div class="content">

            <div class="userCard">
                <img src="#">
                <label><?php echo $userModel->getUser();?></label>
                <hr>
            </div>

            <div class="contacts">

                <?php  while($contactDao->SelectContact())  {?>
                <hr>
                <span>

                    <a href="Add.php"><?php echo$contactDao->SelectContact()?></a>

                </span>
                <?php }?>
            </div>

        </div>
        <a href="index.php">Voltar</a>
    </div>
</body>
</html>

