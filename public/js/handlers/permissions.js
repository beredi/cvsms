// ajax for permissions handling
$(document).ready(function() {
    // CREATE
    $("select#role").change(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = {
            roleSlug: $(this).val()
        };
        $.ajax({
            type: "POST",
            url: '/admin/permissions/handle',
            data: formData,
            dataType: 'json',
            success: function (data) {
                let disabledVar = true;
                $('input[type=checkbox]').attr('checked', false);
                $.each(data, function (key, val) {
                    $('#'+key).attr('checked', 'true');
                });
                if (formData.roleSlug !== 'admin'){
                    disabledVar = false;
                }
                $('input[type=checkbox]').attr('disabled', disabledVar);
            },
            error: function (data) {
                console.log(data);
            }
        });
    });
});
