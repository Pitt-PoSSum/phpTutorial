$( document ).ready(function() {

    if($('#toaster').val()){
        $(".toast-body").html($('#toaster').val());
        $(".toast").toast("show");
        $('#toaster').val('');
    }

    $('.needs-validation').on('submit', function(e) {
        if($("#aktion").val() !== 'new' && $("#aktion").val() !== 'delete') {
            if ($('#datum').val()) {
                var date_regex = /^(([0-2][0-9])|([3][0-1]))\.(([0][1-9])|([1][0-2]))\.([0-9]{4})[ ](([0-1][0-9])|([2][0-3])):([0-5][0-9])(:([0-5][0-9]))?$/;
                if (!(date_regex.test($('#datum').val()))) {
                    $('#datum')[0].setCustomValidity("Invalid field.");
                    e.preventDefault();
                    e.stopPropagation();
                } else {
                    $('#datum')[0].setCustomValidity("");
                }
            }

            if (!this.checkValidity()) {
                e.preventDefault();
                e.stopPropagation();
            }

            $(this).addClass('was-validated');
        }
    });

    $("#addButton").click(function() {
        $("#aktion").val('new');
        $("#formBlog").submit();
    });

    $("#deleteButton").click(function() {
        $("#aktion").val('delete');
        $("#formBlog").submit();
    });

    $('#useAPI').change(function() {
       location.href = '/blog?useAPI='+$(this).val();
    });

    $('#overview').click(function() {
        location.href = '/blog?useAPI='+$('#useAPI').val();
    });


});
