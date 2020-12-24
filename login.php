<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href=" ./css/style.css">

    </head>
    <body>
    <div class="bloc-top">
                <img src="./img/banner.jpg" alt="">
            </div>
        <?php require './header/header.php'; ?>
        
        <div class="container-auth">
           
            <div class = "form-auth">
                <form action="" method="post">
                    <input type="text" name="username" placeholder="Nom d'utilisateur..."><br/><br/>
                    <input type="text" name="password" placeholder="Mot de passe..."><br/><br/><br/>
                    <input type="submit" value="CONNEXION">
                </form>
            </div>
        </div>
    </body>
        
</html>