$(document).ready(function() {
    $('#submit').click(function(e) {
        e.preventDefault();
        $.ajax({
            url: 'file.php',
            type: 'POST',
            data: $('form').serialize(),
            success : function(data) {
                $('#root').html(data);
            }
        });
    });
});