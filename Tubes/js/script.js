$(document).ready(function () {

        // event ketika keyword ditulis
        $('#keyword').on('keyup', function () {
            // ajax menggunakan load
            // $('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());

            // $.get()
            $.get('search.php?keyword=' + $('#keyword').val(), function (data) {

                $('#tampil').html(data);
                $('.loader').hide();

            });

        });

    });