$(document).ready(function() {

    $('#submit').on('click', function(e) {
        $("#loading").show();
        e.preventDefault();

        var form = $('#form1');
        $.ajax({
            url: 'ajax.php',
            type: 'POST',
            dataType: 'json',
            data: {
                'Item_Description': $('#Item_Description').val(),
                'On_Hand_Qty': $('#On_Hand_Qty').val(),
                'Category': $('#Category').val()
            },
            success: function(result) {
                alert("hello");
                $('#loading').hide();
            },
            complete: function() {
                $('#loading').hide();
            }
        });
    });
});




