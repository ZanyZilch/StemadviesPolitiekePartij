<?php
include("../DBconfig.php");
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overview</title>
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/overview.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-wmQ6AQ62fTOxy2vC/UN+TTS7d2oSUuU2OpOSDQVuBvUEkTf3zD5tnsNmOOXSJ7vjIJFmiGfBtSF7vOcNZN0xEQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header class="d-flex justify-content-center align-content-center align-items-center">
        <h1 class="fs-2 text-white">Partijen Overview</h1>
    </header>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

           
            <button id="editModalTrigger" type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal" style="display: none;">
            Edit
            </button>

            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Partij Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editForm">
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="editImage" name="editImage">
                                    <label class="custom-file-label" for="editImage">Choose image</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="editName">Name:</label>
                                <input type="text" class="form-control" id="editName" name="editName">
                            </div>
                            <div class="form-group">
                                <label for="editDescription">Description:</label>
                                <input type="text" class="form-control" id="editDescription" name="editDescription">
                            </div>
                            <div class="form-group">
                                <label for="editLatitudeLongitude">Latitude + Longitude:</label>
                                <input type="text" class="form-control" id="editLatitudeLongitude" name="editLatitudeLongitude" readonly>
                            </div>
                            <input type="hidden" id="editPartyId" name="editPartyId">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="saveChangesBtn">Save changes</button>
                    </div>
                    </div>
                </div>
            </div>

            <!-- Edit Stelling Modal -->
            <div class="modal fade" id="stellingModal" tabindex="-1" role="dialog" aria-labelledby="stellingModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="stellingModalLabel">Stelling Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Form for editing stelling details -->
                            <form id="stellingForm">
                                <div class="form-group">
                                    <label for="stellingId">ID:</label>
                                    <input type="text" class="form-control" id="stellingId" name="stellingId" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="stellingInhoud">Inhoud:</label>
                                    <input type="text" class="form-control" id="stellingInhoud" name="stellingInhoud">
                                </div>
                                <input type="hidden" id="editStellingId" name="editStellingId">
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="saveStellingChangesBtn">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Meningen Modal -->
            <div class="modal fade" id="editMeningModal" tabindex="-1" role="dialog" aria-labelledby="editMeningModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editMeningModalLabel">Edit Mening</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Form for editing Mening -->
                            <form id="editMeningForm">
                                <div class="form-group">
                                    <label for="editPartij">Partij:</label>
                                    <select class="form-control selectpicker" id="editPartij" name="editPartij" data-live-search="true">
                                        <?php
                                            $partySql = "SELECT * FROM `partij`";
                                            $partyStmt = $verbinding->prepare($partySql);
                                            $partyStmt->execute();
                                            $partyResult = $partyStmt->fetchAll();

                                            foreach ($partyResult as $row) {
                                                echo "<option value='" . $row['idPartij'] . "'>" . $row['naam'] . "</option>";
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="editStellingID">Stelling:</label>
                                    <select class="form-control selectpicker" id="editStellingID" name="editStellingID" data-live-search="true">
                                    <?php
                                        $stellingSql = "SELECT * FROM `stelling`";
                                        $stellingStmt = $verbinding->prepare($stellingSql);
                                        $stellingStmt->execute();
                                        $stellingResult = $stellingStmt->fetchAll();

                                        foreach ($stellingResult as $row) {
                                            echo"<option value='". $row['idStelling'] . "'>". $row['inhoud'] . "</option>";
                                        }

                                    ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="addStandpunt">Standpunt:</label>
                                    <input type="text" class="form-control" id="addStandpunt" name="addStandpunt" readonly>
                                    
                                    <!-- X- en Y-coördinaten naast elkaar -->
                                    <div class="d-flex">
                                        <div class="mr-2">
                                            <label for="editXCoordinate">X-coordinate:</label>
                                            <select class="form-control selectpicker" id="editXCoordinate" name="editXCoordinate" data-live-search="true" size="4">
                                                <?php
                                                for ($i = -5; $i <= 5; $i++) {
                                                    echo "<option value='" . $i . "'>" . $i . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="editYCoordinate">Y-coordinate:</label>
                                            <select class="form-control selectpicker" id="editYCoordinate" name="editYCoordinate" data-live-search="true" size="4">
                                                <?php
                                                for ($i = -5; $i <= 5; $i++) {
                                                    echo "<option value='" . $i . "'>" . $i . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="editMening">Mening:</label>
                                    <input type="text" class="form-control" id="editMening" name="editMening">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="saveChangesBtn">Save Changes</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add Party Modal -->
            <div class="modal fade" id="addPartyModal" tabindex="-1" role="dialog" aria-labelledby="addPartyModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addPartyModalLabel">Add New Partij</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Form for adding party details -->
                            <form id="addPartyForm">
                                <div class="form-group">
                                    <!-- Custom file input -->
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="addImage" name="addImage">
                                        <label class="custom-file-label" for="addImage">Kies image</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="addName">Naam:</label>
                                    <input type="text" class="form-control" id="addName" name="addName">
                                </div>
                                <div class="form-group">
                                    <label for="addDescription">Beschrijving:</label>
                                    <input type="text" class="form-control" id="addDescription" name="addDescription">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="savePartyBtn">Save Partij</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add Stelling Modal -->
            <div class="modal fade" id="addStellingModal" tabindex="-1" role="dialog" aria-labelledby="addStellingModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addStellingModalLabel">Add New Stelling</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Form for adding party details -->
                            <form id="addStellingForm">
                                <div class="form-group">
                                </div>
                                <div class="form-group">
                                    <label for="addInhoud">Inhoud:</label>
                                    <input type="text" class="form-control" id="addInhoud" name="addInhoud">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="saveStellingBtn">Save Stelling</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add Mening Modal -->
            <div class="modal fade" id="addMeningModal" tabindex="-1" role="dialog" aria-labelledby="addMeningModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addMeningModalLabel">Add New Mening</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Form for adding Mening details -->
                            <form id="addMeningForm">
                                <div class="form-group">
                                </div>

                                <div class="form-group">
                                    <label for="addPartyID">Partij:</label>
                                    <select class="form-control selectpicker" id="addPartyID" name="addPartyID" data-live-search="true">
                                    <?php
                                        $partySql = "SELECT * FROM `partij`";
                                        $partyStmt = $verbinding->prepare($partySql);
                                        $partyStmt->execute();
                                        $partyResult = $partyStmt->fetchAll();

                                        foreach ($partyResult as $row) {
                                            echo "<option value='" . $row['idPartij'] . "'>" . $row['naam'] . "</option>";
                                        }
                                    ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="addStellingID">Stelling:</label>
                                    <select class="form-control selectpicker" id="addStellingID" name="addStellingID" data-live-search="true">
                                    <?php
                                        $stellingSql = "SELECT * FROM `stelling`";
                                        $stellingStmt = $verbinding->prepare($stellingSql);
                                        $stellingStmt->execute();
                                        $stellingResult = $stellingStmt->fetchAll();

                                        foreach ($stellingResult as $row) {
                                            echo"<option value='". $row['idStelling'] . "'>". $row['inhoud'] . "</option>";
                                        }

                                    ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="addStandpunt">Standpunt:</label>
                                    <input type="text" class="form-control" id="addStandpunt" name="addStandpunt" readonly>
                                    
                                    <!-- X- en Y-coördinaten naast elkaar -->
                                    <div class="d-flex">
                                        <div class="mr-2">
                                            <label for="addXCoordinate">X-coordinate:</label>
                                            <select class="form-control selectpicker" id="addXCoordinate" name="addXCoordinate" data-live-search="true" size="4">
                                                <?php
                                                for ($i = -5; $i <= 5; $i++) {
                                                    echo "<option value='" . $i . "'>" . $i . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="addYCoordinate">Y-coordinate:</label>
                                            <select class="form-control selectpicker" id="addYCoordinate" name="addYCoordinate" data-live-search="true" size="4">
                                                <?php
                                                for ($i = -5; $i <= 5; $i++) {
                                                    echo "<option value='" . $i . "'>" . $i . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="addMening">Mening:</label>
                                    <input type="text" class="form-control" id="addMening" name="addMening">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="saveMeningBtn">Save Mening</button>
                        </div>
                    </div>
                </div>
            </div>

                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#partijen">Partijen</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#stellingen">Stellingen</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#meningen">Meningen</a></li>
                </ul>
                <div class="tab-content">
                    <div id="partijen" class="container tab-pane active">
                        <div class="text-center mb-3">
                            <button class="btn btn-success newPartyBtn" data-toggle="modal" data-target="#addPartyModal">+ Voeg partij toe</button>
                        </div>
                            <?php try { include 'partijen.php'; } catch(Exception $e) {  echo $e->getMessage(); echo "Couldn't make load in partijen."; } ?>
                    </div>

                    <div id="stellingen" class="container tab-pane fade">
                        <div class="text-center mb-3">
                            <button class="btn btn-success newStellingBtn" data-toggle="modal" data-target="#addStellingModal">+ Voeg stelling toe</button>
                        </div>
                        <?php try { include 'stellingen.php'; } catch(Exception $e) {  echo $e->getMessage(); echo "Couldn't make load in stellingen."; } ?>
                    </div>

                    <div id="meningen" class="container tab-pane fade">
                        <div class="text-center mb-3">
                            <button class="btn btn-success newMeningBtn" data-toggle="modal" data-target="#addMeningModal">+ Voeg mening toe</button>
                        </div>
                        <?php include 'meningen.php'; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Bootstrap-select CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap-select JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script>

    <script src="../assets/js/partijmodal.js"></script>

    <script src="../assets/js/meningmodal.js"></script>

    <script src="../assets/js/stellingmodal.js"></script>


    <!-- Modal Function Mening Calculate X Y  -->
    <script>
        $(document).ready(function() {
            function updateStandpuntText() {
                var xCoordinate = parseInt($('#addXCoordinate').val());
                var yCoordinate = parseInt($('#addYCoordinate').val());

                var standpuntText = "";

                if (xCoordinate > 4) {
                    standpuntText += "Sterk Eens,";
                } else if (xCoordinate < -4) {
                    standpuntText += "Sterk Oneens,";
                } else if (xCoordinate > 0) {
                    standpuntText += "Eens,";
                } else if (xCoordinate < 0) {
                    standpuntText += "Oneens,";
                }

                if (standpuntText !== "") {
                    standpuntText += " ";
                }

                if (yCoordinate > 4) {
                    standpuntText += "Sterk Progressief";
                } else if (yCoordinate < -4) {
                    standpuntText += "Sterk Conversatief";
                } else if (yCoordinate > 0) {
                    standpuntText += "Progressief";
                } else if (yCoordinate < 0) {
                    standpuntText += "Conversatief";
                }

                $('#addStandpunt').val(standpuntText);
            }

            $('#addXCoordinate, #addYCoordinate').change(function() {
                updateStandpuntText();
            });

            function updateEditStandpuntText() {
                var xCoordinate = parseInt($('#editXCoordinate').val());
                var yCoordinate = parseInt($('#editYCoordinate').val());

                var standpuntText = "";

                if (xCoordinate > 4) {
                    standpuntText += "Sterk Eens,";
                } else if (xCoordinate < -4) {
                    standpuntText += "Sterk Oneens,";
                } else if (xCoordinate > 0) {
                    standpuntText += "Eens,";
                } else if (xCoordinate < 0) {
                    standpuntText += "Oneens,";
                }

                if (standpuntText !== "") {
                    standpuntText += " ";
                }

                if (yCoordinate > 4) {
                    standpuntText += "Sterk Progressief";
                } else if (yCoordinate < -4) {
                    standpuntText += "Sterk Conversatief";
                } else if (yCoordinate > 0) {
                    standpuntText += "Progressief";
                } else if (yCoordinate < 0) {
                    standpuntText += "Conversatief";
                }

                $('#addStandpunt').val(standpuntText);
            }

            $('#editXCoordinate, #editYCoordinate').change(function() {
                updateEditStandpuntText();
            });
            // Voer de updateStandpuntText functie uit bij het laden van de pagina
            updateStandpuntText();
            updateEditStandpuntText();
        });
    </script>


</body>

</html>
