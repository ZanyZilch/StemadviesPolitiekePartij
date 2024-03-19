<?php
session_start();
ob_start();?>
<!DOCTYPE html>
<html>
<head>
    <title>Login pagina</title>
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">  
</head>
<body>
<div class="container">
    <div class="login">
    <form method="post">
        <h2>Log in Admin</h2>
        <div>
            <label>username</label>
            <input type="text" name="username" placeholder="Name" required>
        </div>
        <br>
        <div>
            <label>password</label>
            <input type="password" name="password" placeholder="Password" required>
        </div>
        <br>
        <div>
        <a class="sign-up" href="pages/register.php">Heb je geen account? Registreer!</a><br>
            <input type="submit" name="submit" value="Login">
        </div>
    </form>
    </div>
    <?php
if(isset($_POST["submit"])) {
    $melding = "";
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);
    try {
        $sql = "SELECT * FROM gebruiker WHERE username = ?";
        include("DBconfig.php");
        $stmt = $verbinding->prepare($sql);
        $stmt->execute(array($username));
        $resultaat = $stmt->fetch(PDO::FETCH_ASSOC);
        if($resultaat) {
            $passwordInDatabase = $resultaat["password"];
            $rol = $resultaat['isAdmin'];
            if(password_verify($password, $passwordInDatabase)){
                $_SESSION['ID'] = session_id();
                $_SESSION['USER_ID'] = $resultaat['ID'];
                $_SESSION['USERNAME'] = $resultaat['username'];
                $_SESSION['STATUS'] = 'ACTIEF';
                $_SESSION['ROL'] = $resultaat['isAdmin'];
                if($rol == 0) {
                    header("Location: pages/overview.php");
                }elseif($rol == 1) {
                    header("Location: pages/overview.php");
                }else{
                   $melding .= "Toegang geweigerd<br>";
                }

            } else {
                $melding .= "Please log in again.<br>";
            }
        } else {
            $melding .= "Probeer nogmaals in te loggen<br>";
        }
    }catch(PDOException $e) {
        echo $e->getMessage();
    }
    echo "<div id='melding'>$melding</div>";
}
?>
</form>
</div>
</body>
</html>

