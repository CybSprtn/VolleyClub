<!DOCTYPE html>
<html>
    <head>
        <title>Accueil</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href=" ./css/style.css">
    </head>

    <body>
        <?php
        session_start();
        $_SESSION['connecte']=0;
        $error=null;
        $username=isset($_POST['username']) ? $_POST['username'] : null;
        $password=isset($_POST['password']) ? $_POST['password'] : null;
            
                // 	Ouverture d'une connexion à la bdd contact
    		try{
                $bdd = new PDO('mysql:host=localhost;dbname=volleyclub;charset=utf8', 'root', '');
            } catch (PDOException $e) {
                echo 'Connexion échouée :' . $e->getMessage();
            }
            
                if($username){
                    $req = $bdd->prepare('SELECT id_user FROM users WHERE mail = :mail AND password = :password');
                    $req->execute(array(
                    'mail' => $username,
                    'password' => $password));
                    if ($req->rowCount() == 1) {
                        $_SESSION['connecte'] = 1;
                        header('Location: ../accueil.php');      
                    } else {
                    $error='Identifiants invalides'; 
                    }
                    $req->closeCursor();
                }
            ?>
           <?php if(($error)&&isset($_POST['soumettre'])): ?>
            <div class="alert alert-danger">
                <?php echo $error ?>
            </div> 
            <?php endif;?>
        <div id="form">
            <form action="wall.php" method="POST">
                <div class="form-group">
                    USERNAME <input class="form-control" type="text" name="username">
                </div>
                <div class="form-group">
                    PASSWORD <input class="form-control" type="text" name="password">
                </div>
                <input name="soumettre" value="- CONNECT -" type="submit" class="btn btn-primary"></input>
                
            </form>
        </div id="form">
    </body>
</html>