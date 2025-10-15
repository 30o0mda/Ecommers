function handleAjaxError(xhr) {
    let errorMessage = 'An error occurred';
    if (xhr.responseJSON && xhr.responseJSON.message) {
        errorMessage = xhr.responseJSON.message;
    } else if (xhr.responseText) {
        try {
            const response = JSON.parse(xhr.responseText);
            if (response.message) {
                errorMessage = response.message;
            } else {
                errorMessage = xhr.responseText;
            }
        } catch (e) {
            errorMessage = xhr.responseText;
        }
    }
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: errorMessage,
    });
}
