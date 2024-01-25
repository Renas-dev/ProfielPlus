function confirmDelete(id, deleteUrl) {
    // Displays the alert screen to confirm or cancel the delete.
    var confirmDelete = confirm("Are you sure you want to delete this item?");

    // If the user clicks "OK" in the confirmation dialog
    if (confirmDelete) {
        // Redirects you to the delete site
        window.location.href = deleteUrl;
    }
    // If user clicks on "Cancel" it doesnt do anything 
}

