// Add Mening
$(document).ready(function() {
    $('#saveMeningBtn').click(function() {
        var partyID = $('#editPartijMeningID option:selected').val();
        var stellingID = $('#addStellingID option:selected').val();
        var mening = $('#addMening').val();

        $.ajax({
            url: 'functions/create-mening.php',
            type: 'POST',
            data: {
                partyID: partyID,
                stellingID: stellingID,
                mening: mening,
            },
            success: function(response) {
                console.log(response);
                //location.reload();
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
        var mening = $(this).closest('tr').find('td:eq(2)').text();


        // Set values in the modal input fields
        $('#editPartijMeningID').selectpicker('val',partyId);
        $('#editStellingID').selectpicker('val',stellingId);

        $('#editMening').val(mening);

        // Show the modal
        $('#editMeningModal').modal('show');
    });

    $('#editMeningModal').on('click', '#saveChangesBtn', function () {
        // Retrieve values from the modal input fields
        var partyId = $('#editPartijMeningID option:selected').val();
        var stellingId = $('#editStellingID option:selected').val();
        var mening = $('#editMening').val();

        // Perform AJAX request to update Mening
        console.log(partyId);
        console.log(stellingId);
        console.log(mening);
        $.ajax({
            url: 'functions/update-mening.php',
            type: 'POST',
            data: {
                idPartij: partyId,
                idStelling: stellingId,
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
                    //location.reload(); // For example, reload the page
                },
                error: function (xhr, status, error) {
                    // Handle error response
                    console.error(xhr.responseText);
                }
            });
        }
    });
});