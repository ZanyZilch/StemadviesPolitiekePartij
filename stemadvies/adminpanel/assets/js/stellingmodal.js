// Add Stelling
$(document).ready(function() {
    $('#saveStellingBtn').click(function() {
        var Inhoud = $('#addInhoud').val();
        var XstellingAdd = $('#addXCoordinateStelling option:selected').val();
        var YstellingAdd = $('#addYCoordinateStelling option:selected').val();
        
        console.log(Inhoud);
        console.log(XstellingAdd);
        console.log(YstellingAdd);
        $.ajax({
            url: 'functions/create-stelling.php',
            type: 'POST',
            data: {
                stellingsInhoud: Inhoud,
                verticaalGewicht: XstellingAdd,
                horizontaalGewicht: YstellingAdd

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
        var XstellingEdit = $(this).closest('tr').find('td:eq(3)').text();
        var YstellingEdit = $(this).closest('tr').find('td:eq(4)').text();

        console.log(XstellingEdit);
        console.log(YstellingEdit);

        $('#stellingId').val(stellingId);
        $('#stellingInhoud').val(stellingInhoud);

        $('#editXCoordinateStelling').selectpicker('val',XstellingEdit);
        $('#editYCoordinateStelling').selectpicker('val',YstellingEdit);

        $('#stellingModal').modal('show');
    });

    $('#saveStellingChangesBtn').click(function () {
        var stellingId = $('#stellingId').val();
        var stellingInhoud = $('#stellingInhoud').val();
        var XstellingEdit = $('#editXCoordinateStelling option:selected').val();
        var YstellingEdit = $('#editYCoordinateStelling option:selected').val();

        $.ajax({
            url: 'functions/update-stelling.php',
            type: 'POST',
            data: { 
                stellingID: stellingId, 
                stellingsInhoud: stellingInhoud, 
                verticaalGewicht: XstellingEdit, 
                horizontaalGewicht: YstellingEdit },
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
        var stellingId = row.find('td:eq(0)').text();

        console.log(partyId);
        console.log(stellingId);
        console.log("WHAT!");
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