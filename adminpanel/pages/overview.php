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
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#partijen">Partijen</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#stellingen">Stellingen</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#meningen">Meningen</a></li>
                </ul>
                <div class="tab-content">
                    <div id="partijen" class="container tab-pane active">
                        <?php include 'partijen.php'; ?>
                    </div>

                    <div id="stellingen" class="container tab-pane fade">
                        <?php include 'stellingen.php'; ?>
                    </div>

                    <div id="meningen" class="container tab-pane fade">
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.2/js/bootstrap.min.js"></script>
    <script>
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
                var image = $('#editImage').val();
                var name = $('#editName').val();
                var description = $('#editDescription').val();
                var latitudeLongitude = $('#editLatitudeLongitude').val();

                $.ajax({
                    url: 'update-partij.php',
                    type: 'POST',
                    data: {
                        partyId: partyId,
                        image: image,
                        name: name,
                        description: description,
                    },
                    success: function (response) {
                        console.log(response);
                        location.reload();
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
                        url: 'delete-partij.php',
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
    <script>
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
                    url: 'update-stelling.php',
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
                        url: 'delete-stelling.php',
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
    <script>
        // Update Mening
        $(document).ready(function () {
            // Show the modal when the editMeningBtn is clicked
            $('.editMeningBtn').click(function () {
                // Retrieve values from the row
                var partyId = $(this).closest('tr').find('td:eq(0)').text();
                var stellingId = $(this).closest('tr').find('td:eq(1)').text();
                var standpunt = $(this).closest('tr').find('td:eq(4)').text();
                var mening = $(this).closest('tr').find('td:eq(5)').text();

                // Set values in the modal input fields
                $('#editPartij').val(partyId);
                $('#editStelling').val(stellingId);
                $('#editStandpunt').val(standpunt);
                $('#editMening').val(mening);

                // Show the modal
                $('#editMeningModal').modal('show');
            });

            // Handle saving changes when the saveChangesBtn in the modal is clicked
            $('#editMeningModal').on('click', '#saveChangesBtn', function () {
                // Retrieve values from the modal input fields
                var partyId = $('#editPartij').val();
                var stellingId = $('#editStelling').val();
                var standpunt = $('#editStandpunt').val();
                var mening = $('#editMening').val();

                // Perform AJAX request to update Mening
                $.ajax({
                    url: 'update-mening.php',
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
                        // location.reload();
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
                        url: 'delete-mening.php',
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
</body>

</html>
