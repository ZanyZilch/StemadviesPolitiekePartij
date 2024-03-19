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
