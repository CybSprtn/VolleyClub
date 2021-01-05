
    <?php
    
    $error=null;
        if(!empty($_POST['username']) && !empty($_POST['password'])){
            $username=$_POST['username'];
            $password=$_POST['password'];

            if($_POST['username'] === 'Yukio' && $_POST['password'] === 'Sama'){
                //on connecte l'utilisateur
                session_start();
                $_SESSION['connecte'] = 1;
                header('Location: /main.php');
            }else {
                $error="Identifiants incorrects";
            }
        }
        require '../functions/auth.php';
        if(est_connecte()){
            header('Location: /main.php');
            exit();
        }
    ?>
    <!--require 'elements/header.php';--> 
    <?php if ($error): ?>
        <div class="alert alert-danger">
            <?= $error?>
        </div>
    <?php endif;?>
    <div id="form">
        <form action="" method="POST">
            <div class="form-group">
                USERNAME <input class="form-control" type="text" name="username">
            </div>
            <div class="form-group">
                PASSWORD <input class="form-control" type="text" name="password">
            </div>
            <button type="submit" class="btn btn-primary">- CONNECT -</button>
            
        </form>
    </div id="form">
    <?php
    #require 'elements/footer.php'; 
    ?> 
