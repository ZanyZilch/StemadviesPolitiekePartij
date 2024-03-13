<?php
include("../DBconfig.php");
session_start();
ob_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overview</title>
    <link rel="stylesheet" href="../assets/css/login.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-wmQ6AQ62fTOxy2vC/UN+TTS7d2oSUuU2OpOSDQVuBvUEkTf3zD5tnsNmOOXSJ7vjIJFmiGfBtSF7vOcNZN0xEQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Style to make the SVG background */
        body {
            position: relative;
        }

        svg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1; /* Set z-index to -1 to position the SVG behind other content */
        }
    </style>
</head>
<body>
    
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center mb-4">Partijen Overview</h1>
            <div class="text-center mb-3">
                <button class="btn btn-success">+ Voeg partij toe</button>
            </div>
            <table class="table table-bordered table-striped table-hover table-light ">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Richting</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Your PHP code to fetch and populate table rows will go here -->
                    <?php
                    // Sample row, replace with PHP code to fetch data from database
                            // Fetch and display houses with the same user_ID
                        $partySql = "SELECT idPartij, naam, beschrijving, image, ST_X(positie) AS latitude, ST_Y(positie) AS longitude FROM partij";
                        $partyStmt = $verbinding->prepare($partySql);
                        $partyStmt->execute();
                        $partyResult = $partyStmt->fetchAll();

                        foreach ($partyResult as $row) {
                            // Determine the label for latitude
                            $latitudeLabel = $row['latitude'] < 0 ? "Links" : "Rechts";

                            // Determine the label for longitude
                            $longitudeLabel = $row['longitude'] < 0 ? "Progressief" : "Conversatief";

                            echo "<tr>";
                            echo "<td>" . $row['idPartij'] . "</td>";
                            echo "<td>" . $row['image'] . "</td>";
                            echo "<td>" . $row['naam'] . "</td>";
                            //echo "<td>" . $row['beschrijving'] . "</td>";
                            echo "<td>" . $latitudeLabel . ", " . $longitudeLabel . "</td>"; // Display latitude and longitude as plain text
                            echo "<td>";
                            echo '<button type="button" class="btn btn-success"><i class="fas fa-edit"></i>EDIT</button>';
                            echo '<button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i>DELETE</button>';
                            echo "</td>";
                            echo "</tr>";
                        }
                    ?>

                    <!-- <tr>
                        <td>Sample Image</td>
                        <td>Sample Name</td>
                        <td>Sample SQL: POINT</td>
                        <td>
                            <button type="button" class="btn btn-success"><i class="fas fa-edit"></i></button>
                            <button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr> -->
                </tbody>
            </table>
        </div>
    </div>
</div>






<svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev/svgjs" viewBox="0 0 1422 800"><defs><linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="oooscillate-grad"><stop stop-color="hsl(162, 100%, 58%)" stop-opacity="1" offset="0%"></stop><stop stop-color="hsl(270, 73%, 53%)" stop-opacity="1" offset="100%"></stop></linearGradient></defs><g stroke-width="4" stroke="url(#oooscillate-grad)" fill="none" stroke-linecap="round"><path d="M 0 546 Q 355.5 -100 711 400 Q 1066.5 900 1422 546" opacity="1.00"></path><path d="M 0 525 Q 355.5 -100 711 400 Q 1066.5 900 1422 525" opacity="0.96"></path><path d="M 0 504 Q 355.5 -100 711 400 Q 1066.5 900 1422 504" opacity="0.92"></path><path d="M 0 483 Q 355.5 -100 711 400 Q 1066.5 900 1422 483" opacity="0.89"></path><path d="M 0 462 Q 355.5 -100 711 400 Q 1066.5 900 1422 462" opacity="0.85"></path><path d="M 0 441 Q 355.5 -100 711 400 Q 1066.5 900 1422 441" opacity="0.81"></path><path d="M 0 420 Q 355.5 -100 711 400 Q 1066.5 900 1422 420" opacity="0.77"></path><path d="M 0 399 Q 355.5 -100 711 400 Q 1066.5 900 1422 399" opacity="0.73"></path><path d="M 0 378 Q 355.5 -100 711 400 Q 1066.5 900 1422 378" opacity="0.70"></path><path d="M 0 357 Q 355.5 -100 711 400 Q 1066.5 900 1422 357" opacity="0.66"></path><path d="M 0 336 Q 355.5 -100 711 400 Q 1066.5 900 1422 336" opacity="0.62"></path><path d="M 0 315 Q 355.5 -100 711 400 Q 1066.5 900 1422 315" opacity="0.58"></path><path d="M 0 294 Q 355.5 -100 711 400 Q 1066.5 900 1422 294" opacity="0.54"></path><path d="M 0 273 Q 355.5 -100 711 400 Q 1066.5 900 1422 273" opacity="0.51"></path><path d="M 0 252 Q 355.5 -100 711 400 Q 1066.5 900 1422 252" opacity="0.47"></path><path d="M 0 231 Q 355.5 -100 711 400 Q 1066.5 900 1422 231" opacity="0.43"></path><path d="M 0 210 Q 355.5 -100 711 400 Q 1066.5 900 1422 210" opacity="0.39"></path><path d="M 0 189 Q 355.5 -100 711 400 Q 1066.5 900 1422 189" opacity="0.35"></path><path d="M 0 168 Q 355.5 -100 711 400 Q 1066.5 900 1422 168" opacity="0.32"></path><path d="M 0 147 Q 355.5 -100 711 400 Q 1066.5 900 1422 147" opacity="0.28"></path><path d="M 0 126 Q 355.5 -100 711 400 Q 1066.5 900 1422 126" opacity="0.24"></path><path d="M 0 105 Q 355.5 -100 711 400 Q 1066.5 900 1422 105" opacity="0.20"></path><path d="M 0 84 Q 355.5 -100 711 400 Q 1066.5 900 1422 84" opacity="0.16"></path><path d="M 0 63 Q 355.5 -100 711 400 Q 1066.5 900 1422 63" opacity="0.13"></path><path d="M 0 42 Q 355.5 -100 711 400 Q 1066.5 900 1422 42" opacity="0.09"></path></g></svg>

</body>
</html>