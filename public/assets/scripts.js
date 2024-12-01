$(function() {
    // Delete
    $(document).on('click', '.delete-user-button', function(e) {
        e.preventDefault();
        if (confirm('Are you sure you want to delete this user?')) {
            $(this).parents('form:first').submit();
            return true;
        } else {
            return false;
        }
    });

    // Front end validation
    $(document).on('click', '.user-form-button', function(e) {
        e.preventDefault();

        let valid = true;

        const $form = $(this).parents('form:first');

        const $fields = $form.find('input, select, textarea').not('[type="submit"], [type="button"], :hidden');
        $fields.toArray().forEach(field => {
            if ($(field).val() === '') {
               $(field).addClass('is-invalid');
               valid = false;
           } else {
                $(field).removeClass('is-invalid');
            }

        });


        if (!valid) {
            $('#alert-page-level').removeClass('d-none');
            return false;
        }

        if (valid) {
            $('#alert-page-level').addClass('d-none');
            $form.submit();
            return true;
        }
    });
    // End Front end validation
});