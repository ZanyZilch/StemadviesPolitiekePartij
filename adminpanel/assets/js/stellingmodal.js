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