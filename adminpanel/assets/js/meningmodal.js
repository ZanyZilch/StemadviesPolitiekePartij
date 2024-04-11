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