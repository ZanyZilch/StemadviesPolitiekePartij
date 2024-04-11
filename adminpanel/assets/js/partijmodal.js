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