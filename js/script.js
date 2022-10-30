$(document).ready(function() {
    const form = document.getElementById('form1');

    $('#phone').mask('+7(999)999-99-99');

    console.log($('#email').val().match(/.+?\@.+/g));

    $('#form1').submit(function (e) {
        e.preventDefault();
        let formData = new FormData(form);

        let send = 0;
        let name = $('#name').val();
        let phone = $('#phone').val();
        let email = $('#email').val();
        let message = $('#message').val();

        let elem = [name, phone, email, message];

        elem.forEach(function(item, i, elem) {
            if (item.length < 2) {
                $(`.form li:nth-child(${i+1})`).css('border', '2px solid red');
            }
            else {
                $(`.form li:nth-child(${i+1})`).css('border', '1px solid #E0E0E0');
                send++;
            }
        });
        
        if (send === 4) {
            let response = fetch('send_mail.php', {
                method: 'POST',
                body: formData
            });
            form.reset();
        }
    });
});