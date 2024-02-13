<?php
DEFINE("USER", "root");
DEFINE("PASSWORD", "");

try {
    $conn = new PDO("mysql:host=localhost;dbname=goudenvoetbalschoen", USER, PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       
        $userId = $_POST['user_id'];
        $newFirstName = $_POST['new_first_name'];
        $newLastName = $_POST['new_last_name'];
        $newEmail = $_POST['new_email'];

        $updateQuery = "UPDATE users SET voorNaam = '$newFirstName', achterNaam = '$newLastName', email = '$newEmail' WHERE userID = $userId";
        $conn->exec($updateQuery);
    }

    $userId = isset($_GET['id']) ? $_GET['id'] : null;

    if ($userId !== null) {
        $query = "SELECT * FROM users WHERE userID = $userId";
        $result = $conn->query($query);
        $user = $result->fetch();
    } else {
        echo "<p>Fout bij het ophalen van gebruiker</p>";
    }

    ?>
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='stylesheet' href='style.css'>
        <title>Bewerk Gebruiker</title>
    </head>
    <body>
        <div class='user-container'>
            <div class='user-row'>
                <div class='user-info'>
                    <?php if ($user !== false): ?>
                        <form method='post' action='bewerk.php?id=<?= $user['userID'] ?>'>
                            <input type='hidden' name='user_id' value='<?= $user['userID'] ?>'>
                            <label for='new_first_name'>Voornaam:</label>
                            <input type='text' id='new_first_name' name='new_first_name' value='<?= $user['voorNaam'] ?>' required>

                            <label for='new_last_name'>Achternaam:</label>
                            <input type='text' id='new_last_name' name='new_last_name' value='<?= $user['achterNaam'] ?>' required>

                            <label for='new_email'>Email:</label>
                            <input type='email' id='new_email' name='new_email' value='<?= $user['email'] ?>' required>
                        
                            <button type='submit'>Opslaan</button>
                        </form>
                    <?php else: ?>
                        <p>Fout bij het ophalen van gebruiker</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </body>
    </html>
    <?php

} catch (PDOException $e) {
    echo "<p>Fout bij het bewerken van gebruiker: " . $e->getMessage() . "</p>";
}
?>
