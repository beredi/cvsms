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
                $('input[type=checkbox]').attr('checked', false);
                $.each(data, function (key, val) {
                    $('#'+key).attr('checked', 'true');
                });
            },
            error: function (data) {
                console.log(data);
            }
        });
    });
});
