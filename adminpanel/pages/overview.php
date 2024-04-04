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
    <link rel="stylesheet" href="../assets/css/overview.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-wmQ6AQ62fTOxy2vC/UN+TTS7d2oSUuU2OpOSDQVuBvUEkTf3zD5tnsNmOOXSJ7vjIJFmiGfBtSF7vOcNZN0xEQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
            <h1 class="text-center mb-4">Partijen Overview</h1>

            <!-- Modal pages-->
            <!-- Button trigger modal -->
            <button id="editModalTrigger" type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal" style="display: none;">
            Edit
            </button>

            <!-- Edit Partij Modal -->
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
                        <!-- Form for editing party details -->
                        <form id="editForm">
                            <div class="form-group">
                                <!-- Custom file input -->
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
                            <?php include 'partijen.php'; ?>
                    </div>

                    <div id="stellingen" class="container tab-pane fade">
                        <div class="text-center mb-3">
                            <button class="btn btn-success newStellingBtn" data-toggle="modal" data-target="#addStellingModal">+ Voeg stelling toe</button>
                        </div>
                        <?php include 'stellingen.php'; ?>
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
    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev/svgjs" viewBox="0 0 1422 800">
        <defs>
            <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="oooscillate-grad">
                <stop stop-color="hsl(162, 100%, 58%)" stop-opacity="1" offset="0%"></stop>
                <stop stop-color="hsl(270, 73%, 53%)" stop-opacity="1" offset="100%"></stop>
            </linearGradient>
        </defs>
        <g stroke-width="4" stroke="url(#oooscillate-grad)" fill="none" stroke-linecap="round">
            <path d="M 0 546 Q 355.5 -100 711 400 Q 1066.5 900 1422 546" opacity="1.00"></path>
            <path d="M 0 525 Q 355.5 -100 711 400 Q 1066.5 900 1422 525" opacity="0.96"></path>
            <path d="M 0 504 Q 355.5 -100 711 400 Q 1066.5 900 1422 504" opacity="0.92"></path>
            <path d="M 0 483 Q 355.5 -100 711 400 Q 1066.5 900 1422 483" opacity="0.89"></path>
            <path d="M 0 462 Q 355.5 -100 711 400 Q 1066.5 900 1422 462" opacity="0.85"></path>
            <path d="M 0 441 Q 355.5 -100 711 400 Q 1066.5 900 1422 441" opacity="0.81"></path>
            <path d="M 0 420 Q 355.5 -100 711 400 Q 1066.5 900 1422 420" opacity="0.77"></path>
            <path d="M 0 399 Q 355.5 -100 711 400 Q 1066.5 900 1422 399" opacity="0.73"></path>
            <path d="M 0 378 Q 355.5 -100 711 400 Q 1066.5 900 1422 378" opacity="0.70"></path>
            <path d="M 0 357 Q 355.5 -100 711 400 Q 1066.5 900 1422 357" opacity="0.66"></path>
            <path d="M 0 336 Q 355.5 -100 711 400 Q 1066.5 900 1422 336" opacity="0.62"></path>
            <path d="M 0 315 Q 355.5 -100 711 400 Q 1066.5 900 1422 315" opacity="0.58"></path>
            <path d="M 0 294 Q 355.5 -100 711 400 Q 1066.5 900 1422 294" opacity="0.54"></path>
            <path d="M 0 273 Q 355.5 -100 711 400 Q 1066.5 900 1422 273" opacity="0.51"></path>
            <path d="M 0 252 Q 355.5 -100 711 400 Q 1066.5 900 1422 252" opacity="0.47"></path>
            <path d="M 0 231 Q 355.5 -100 711 400 Q 1066.5 900 1422 231" opacity="0.43"></path>
            <path d="M 0 210 Q 355.5 -100 711 400 Q 1066.5 900 1422 210" opacity="0.39"></path>
            <path d="M 0 189 Q 355.5 -100 711 400 Q 1066.5 900 1422 189" opacity="0.35"></path>
            <path d="M 0 168 Q 355.5 -100 711 400 Q 1066.5 900 1422 168" opacity="0.32"></path>
            <path d="M 0 147 Q 355.5 -100 711 400 Q 1066.5 900 1422 147" opacity="0.28"></path>
            <path d="M 0 126 Q 355.5 -100 711 400 Q 1066.5 900 1422 126" opacity="0.24"></path>
            <path d="M 0 105 Q 355.5 -100 711 400 Q 1066.5 900 1422 105" opacity="0.20"></path>
            <path d="M 0 84 Q 355.5 -100 711 400 Q 1066.5 900 1422 84" opacity="0.16"></path>
            <path d="M 0 63 Q 355.5 -100 711 400 Q 1066.5 900 1422 63" opacity="0.13"></path>
            <path d="M 0 42 Q 355.5 -100 711 400 Q 1066.5 900 1422 42" opacity="0.09"></path>
        </g>
    </svg>

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

    <!-- Modal Functions Partij  -->
    <script>
        // Add Partij
        $(document).ready(function() {
            $('#savePartyBtn').click(function() {
                var image = $('#addImage').val();
                var name = $('#addName').val();
                var description = $('#addDescription').val();

                $.ajax({
                    url: 'functions/create-partij.php',
                    type: 'POST',
                    data: {
                        image: image,
                        name: name,
                        description: description,
                    },
                    success: function(response) {
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });

        // Update Partij
        $(document).ready(function () {
            $('.editPartyBtn').click(function () {
                var row = $(this).closest('tr');
                var partyId = row.find('td:eq(0)').text();
                var image = row.find('td:eq(1)').text();
                var name = row.find('td:eq(2)').text();
                var description = row.find('td:eq(3)').text();
                var latitudeLongitude = row.find('td:eq(4)').text();
                $('#editPartyId').val(partyId);
                $('#editImage').val(image);
                $('#editName').val(name);
                $('#editDescription').val(description);
                $('#editLatitudeLongitude').val(latitudeLongitude);
                $('#editModal').modal('show');
            });

            $('#saveChangesBtn').click(function () {
                var partyId = $('#editPartyId').val();
                var name = $('#editName').val();
                var description = $('#editDescription').val();
                var fileInput = document.getElementById('editImage');
                var file = fileInput.files[0];

                var formData = new FormData();
                formData.append('partyId', partyId);
                formData.append('name', name);
                formData.append('description', description);
                formData.append('image', file);

                console.log(formData.get('partyId'));
                console.log(formData.get('name'));
                console.log(formData.get('description'));
                console.log(formData.get('image'));

            
                $.ajax({
                    url: 'functions/update-partij.php',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        console.log(response);
                        //location.reload();
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });

            $('.custom-file-input').on('change', function () {
                var fileName = $(this).val().split('\\').pop();
                $(this).next('.custom-file-label').html(fileName);
            });
        });

        // Delete Partij
        $(document).ready(function () {
            $('.deletePartyBtn').click(function () {
                var partyId = $(this).data('id');

                if (confirm("Ben je zeker dat je deze partij wil verwijderen?")) {
                    $.ajax({
                        url: 'functions/delete-partij.php',
                        type: 'POST',
                        data: { id: partyId },
                        success: function (response) {
                            console.log(response);
                            location.reload();
                        },
                        error: function (xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>

    <!-- Modal Functions Stelling  -->
    <script>
        // Add Stelling
        $(document).ready(function() {
            $('#saveStellingBtn').click(function() {
                var Inhoud = $('#addInhoud').val();
                
                $.ajax({
                    url: 'functions/create-stelling.php',
                    type: 'POST',
                    data: {
                        inhoud: Inhoud
                    },
                    success: function(response) {
                        console.log(response);

                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });

        // Update Stelling
        $(document).ready(function () {
            $('.editStellingBtn').click(function () {
                var row = $(this).closest('tr');
                var stellingId = row.find('td:eq(0)').text();
                var stellingInhoud = row.find('td:eq(1)').text();

                $('#stellingId').val(stellingId);
                $('#stellingInhoud').val(stellingInhoud);

                $('#stellingModal').modal('show');
            });

            $('#saveStellingChangesBtn').click(function () {
                var stellingId = $('#stellingId').val();
                var stellingInhoud = $('#stellingInhoud').val();

                $.ajax({
                    url: 'functions/update-stelling.php',
                    type: 'POST',
                    data: { idStelling: stellingId, inhoud: stellingInhoud },
                    success: function (response) {
                        console.log(response);
                        location.reload();
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });

        // Delete Stelling
        $(document).ready(function () {
            $('.deleteStellingBtn').click(function () {
                var partyId = $(this).data('id');

                if (confirm("Ben je zeker dat je deze Stelling wil verwijderen?")) {
                    $.ajax({
                        url: 'functions/delete-stelling.php',
                        type: 'POST',
                        data: { id: partyId },
                        success: function (response) {
                            console.log(response);
                            location.reload();
                        },
                        error: function (xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>
    
    <!-- Modal Functions Mening  -->
    <script>
        // Add Mening
        $(document).ready(function() {
            $('#saveMeningBtn').click(function() {
                var partyID = $('#addPartyID option:selected').val();
                var stellingID = $('#addStellingID option:selected').val();
                var X = $('#addXCoordinate').val();
                var Y = $('#addYCoordinate').val();
                var mening = $('#addMening').val();

                $.ajax({
                    url: 'functions/create-mening.php',
                    type: 'POST',
                    data: {
                        partyID: partyID,
                        stellingID: stellingID,
                        Xcoordinate: X,
                        Ycoordinate: Y,
                        mening: mening,
                    },
                    success: function(response) {
                        console.log(response);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });

        // Update Mening
        $(document).ready(function () {
            // Show the modal when the editMeningBtn is clicked
            $('.editMeningBtn').click(function () {
                // Retrieve values from the row
                var partyId = $(this).closest('tr').find('td:eq(0)').text();
                var stellingId = $(this).closest('tr').find('td:eq(1)').text();
                var standpunt = $(this).closest('tr').find('td:eq(4)').text();
                var mening = $(this).closest('tr').find('td:eq(5)').text();

                var X_coordinates = $(this).closest('tr').find('td:eq(6)').text();
                var Y_coordinates = $(this).closest('tr').find('td:eq(7)').text();

                // Set values in the modal input fields
                $('#editPartij').selectpicker('val',partyId);
                $('#editStellingID').selectpicker('val',stellingId);

                $('#addStandpunt').val(standpunt);
                $('#editMening').val(mening);

                $('#editXCoordinate').selectpicker('val',X_coordinates);
                $('#editYCoordinate').selectpicker('val',Y_coordinates);

                // Show the modal
                $('#editMeningModal').modal('show');
            });

            $('#editMeningModal').on('click', '#saveChangesBtn', function () {
                // Retrieve values from the modal input fields
                var partyId = $('#editPartij option:selected').val();
                var stellingId = $('#editStellingID option:selected').val();
                var X = $('#editXCoordinate').val();
                var Y = $('#editYCoordinate').val();
                var mening = $('#editMening').val();

                var standpunt = X + "," + Y
                // Perform AJAX request to update Mening

                console.log(partyId, stellingId, standpunt, mening);
                $.ajax({
                    url: 'functions/update-mening.php',
                    type: 'POST',
                    data: {
                        idPartij: partyId,
                        idStelling: stellingId,
                        standpunt: standpunt,
                        mening: mening
                    },
                    success: function (response) {
                        // Handle success response
                        console.log(response);
                        // Optionally, you can reload the page or update the table
                        location.reload();
                    },
                    error: function (xhr, status, error) {
                        // Handle error response
                        console.error(xhr.responseText);
                    }
                });

                // Close the modal after saving changes
                $('#editMeningModal').modal('hide');
            });
        });

        // Delete Mening
        $(document).ready(function () {
            // Listen for click events on delete buttons
            $('.deleteMeningBtn').click(function () {
                // Retrieve the party ID and stelling ID from data attributes
                var partyId = $(this).attr('party-id');
                var stellingId = $(this).attr('stelling-id');

                // Confirm deletion
                if (confirm("Ben je zeker dat je deze Mening wil verwijderen?")) {
                    // Send AJAX request to delete-mening.php
                    $.ajax({
                        url: 'functions/delete-mening.php',
                        type: 'POST',
                        data: { idParty: partyId, idStelling: stellingId },
                        success: function (response) {
                            // Handle success response
                            //console.log("partyid =" + partyId, "stellingid =" + stellingId);
                            console.log(response);
                            // Reload the page or update the table as needed
                            location.reload(); // For example, reload the page
                        },
                        error: function (xhr, status, error) {
                            // Handle error response
                            console.error(xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>

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
