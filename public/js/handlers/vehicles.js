// ajax for permissions handling
$(document).ready(function() {
    // CREATE
    $("select#model").change(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = {
            brandID: $(this).val()
        };
        $.ajax({
            type: "POST",
            url: '/admin/vehicles/config/handle',
            data: formData,
            dataType: 'json',
            success: function (data) {
                $('tbody').empty();
                $.each(data, function (index, models) {
                    $.each(models, function (key, val) {
                        $('table tbody').append('<tr>' +
                            '<td>'+val+'</td>'+
                            '<td><a href="'+window.location.href+'/edit/'+key+'" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a></td>'+
                            '<td><a href="#" class="btn btn-sm btn-danger delete-user" data-toggle="modal" data-target="#deleteModal" data-id="'+key+'"><i class="fas fa-trash-alt"></i></a></td>'+
                            '</tr>');
                    });
                });
            },
            error: function (data) {
                console.log(data);
            }
        });
    });
});
