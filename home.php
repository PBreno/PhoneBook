<?php
    include 'model/UserModel.php';

    if (!$_POST['user'] )
        echo "Usuário não inserido!";

    $user = $_POST['user'];
    $password = $_POST['pwd'];

    $userModel = new UserModel($user, $password);


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
                <input type="text" name="search" placeholder="search">
                <hr>
            </div>
        </header>

        <div class="content">

            <div class="userCard">
                <img src="#">
                <label><?php echo $userModel->getUser();?></label>
                <hr>
            </div>

            <table>
                <thead>
                    <tr>
                        <th> ID</th>
                        <th> Nome </th>
                        <th> ID</th>
                    </tr>
                </thead>
            </table>
        </div>
        <a href="index.php">Voltar</a>
    </div>
</body>
</html>

