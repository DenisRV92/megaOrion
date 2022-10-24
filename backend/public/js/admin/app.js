$(document).ready(function() {
    $('.delete-form-btn').click(function(e) {
        e.preventDefault();
        var answer = confirm('Вы уверены, что хотите удалить клиента?');
        if (answer) {
            var form = $(this).closest('form');
            form.submit();
        }
    })

    $('.delete-user-btn').click(function(e) {
        e.preventDefault();
        var answer = confirm('Вы уверены, что хотите удалить пользователя?');
        if (answer) {
            var form = $(this).closest('form');
            form.submit();
        }
    })
});
