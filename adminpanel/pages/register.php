<?php
session_start();
ob_start();?>
<!DOCTYPE html>
<html>
<head>
    <title>Login pagina</title>
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">  
</head>
<body>

<div class="container">
    <div class="login">
    <form method="post">
        <h2>Registreer Admin</h2>
        <div>
            <label>username</label>
            <input type="text" name="username" placeholder="Name" required>

        </div>
        <br>
        <div>
            <label>e-mail</label>
            <input type="email" name="email" placeholder="e-mail" required>

        </div>
        <br>
        <div>
            <label>password</label>
            <input type="password" name="password" placeholder="Password" required>

        </div>
        <br>
        <div>
        <a class="sign-up" href="../index.php">Heb je een account? Login!</a><br>
            <input type="submit" name="submit" value="Registreer">
        </div>
    </form>
    </div>

</form>
</div>
  <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev/svgjs" viewBox="0 0 1422 800"><defs><linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="oooscillate-grad"><stop stop-color="hsl(162, 100%, 58%)" stop-opacity="1" offset="0%"></stop><stop stop-color="hsl(270, 73%, 53%)" stop-opacity="1" offset="100%"></stop></linearGradient></defs><g stroke-width="4" stroke="url(#oooscillate-grad)" fill="none" stroke-linecap="round"><path d="M 0 546 Q 355.5 -100 711 400 Q 1066.5 900 1422 546" opacity="1.00"></path><path d="M 0 525 Q 355.5 -100 711 400 Q 1066.5 900 1422 525" opacity="0.96"></path><path d="M 0 504 Q 355.5 -100 711 400 Q 1066.5 900 1422 504" opacity="0.92"></path><path d="M 0 483 Q 355.5 -100 711 400 Q 1066.5 900 1422 483" opacity="0.89"></path><path d="M 0 462 Q 355.5 -100 711 400 Q 1066.5 900 1422 462" opacity="0.85"></path><path d="M 0 441 Q 355.5 -100 711 400 Q 1066.5 900 1422 441" opacity="0.81"></path><path d="M 0 420 Q 355.5 -100 711 400 Q 1066.5 900 1422 420" opacity="0.77"></path><path d="M 0 399 Q 355.5 -100 711 400 Q 1066.5 900 1422 399" opacity="0.73"></path><path d="M 0 378 Q 355.5 -100 711 400 Q 1066.5 900 1422 378" opacity="0.70"></path><path d="M 0 357 Q 355.5 -100 711 400 Q 1066.5 900 1422 357" opacity="0.66"></path><path d="M 0 336 Q 355.5 -100 711 400 Q 1066.5 900 1422 336" opacity="0.62"></path><path d="M 0 315 Q 355.5 -100 711 400 Q 1066.5 900 1422 315" opacity="0.58"></path><path d="M 0 294 Q 355.5 -100 711 400 Q 1066.5 900 1422 294" opacity="0.54"></path><path d="M 0 273 Q 355.5 -100 711 400 Q 1066.5 900 1422 273" opacity="0.51"></path><path d="M 0 252 Q 355.5 -100 711 400 Q 1066.5 900 1422 252" opacity="0.47"></path><path d="M 0 231 Q 355.5 -100 711 400 Q 1066.5 900 1422 231" opacity="0.43"></path><path d="M 0 210 Q 355.5 -100 711 400 Q 1066.5 900 1422 210" opacity="0.39"></path><path d="M 0 189 Q 355.5 -100 711 400 Q 1066.5 900 1422 189" opacity="0.35"></path><path d="M 0 168 Q 355.5 -100 711 400 Q 1066.5 900 1422 168" opacity="0.32"></path><path d="M 0 147 Q 355.5 -100 711 400 Q 1066.5 900 1422 147" opacity="0.28"></path><path d="M 0 126 Q 355.5 -100 711 400 Q 1066.5 900 1422 126" opacity="0.24"></path><path d="M 0 105 Q 355.5 -100 711 400 Q 1066.5 900 1422 105" opacity="0.20"></path><path d="M 0 84 Q 355.5 -100 711 400 Q 1066.5 900 1422 84" opacity="0.16"></path><path d="M 0 63 Q 355.5 -100 711 400 Q 1066.5 900 1422 63" opacity="0.13"></path><path d="M 0 42 Q 355.5 -100 711 400 Q 1066.5 900 1422 42" opacity="0.09"></path></g></svg>
  
</body>
</html>



<?php 
if(isset($_POST["submit"])) {
    $melding = "";
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Controleer of username al bestaat (geen dubbele adressen)
    $sql = "SELECT * FROM gebruiker WHERE username = ?";
    include("../DBconfig.php");
    $stmt = $verbinding->prepare($sql);
    $stmt->execute(array($username));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if($result) {
        $melding = "Deze username is al genomen.";
    } else {
        $sql = "INSERT INTO gebruiker (idUser, username, password, email, IsAdmin)
                            values (null,?,?,?,?)";
                            // ID = null, de rest is ?
        $stmt = $verbinding->prepare($sql);
        try {
            $stmt->execute(array(
                $username,
                $passwordHash,
                $email,
                0)
            );
        $melding = "Nieuw account gemaakt.";

        }catch(PDOException $e) {
            $melding = "Kon geen account aanmaken:." . $e->getMessage();
        }
        echo "<div id='melding'>".$melding."</div>";
    }
}
?>
