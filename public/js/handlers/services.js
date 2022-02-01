// ajax for permissions handling
$(document).ready(function() {
    // load to dropdown
    $('#customer, #vehicle').selectize();

    $("select#customer").change(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = {
            customerID: $(this).val()
        };
        $.ajax({
            type: "POST",
            url: '/admin/customer/vehicle/handle',
            data: formData,
            dataType: 'json',
            success: function (data) {
                let $select = $('select#vehicle').selectize();
                let $select0 = $select[0].selectize;
                $select0.clearOptions();
                $.each(data, function (index, models) {
                    $.each(models, function (key, val) {
                        $select0.addOption({value: key, text: val});
                    });
                });
                $select0.refreshOptions();
            },
            error: function (data) {
                console.log(data);
            }
        });
    });

    $('input#price').change(function (e){
        e.preventDefault();
        let paid = $('input#paid');
        if (paid.val() == 0){
            paid.val($(this).val());
        }
    });
});
