<?= $this->extend('templates/auth/index'); ?>

<?= $this->section('content'); ?>
<!-- Nested Row within Card Body -->
<div class="p-5">
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Login</h1>
    </div>
    <form id="login-form" action="<?= route_to('login'); ?>" method="POST" class="user">
        <div class="form-group">
            <input type="text" name="username" class="form-control form-control-user" id="username" placeholder="Masukan Username">
            <div id="error"></div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Masukan Password">
                <div class="input-group-prepend">
                    <button type="button" class="input-group-text hidden-password" id="button-password"><i class="fas fa-eye"></i></button>
                </div>
                <div id="error"></div>
            </div>
        </div>

        <!-- <div class="input-group" id="show_hide_password">
            <input class="form-control" type="password">
            <div class="input-group-addon">
                <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
            </div>
        </div> -->

        <button type="submit" class="btn btn-primary btn-user btn-block">
            Login
        </button>
    </form>
</div>
<?= $this->endSection() ?>

<?= $this->section('css'); ?>
<style>
    #button-password {
        border-radius: 0 10rem 10rem 0;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('script'); ?>
<!-- Custom JS -->
<script>
    let csrfToken = '<?= csrf_token(); ?>'
    let csrfHash = '<?= csrf_hash(); ?>'

    $('#button-password').on('click', function() {
        if ($(this).hasClass('hidden-password')) {
            $(this).removeClass('hidden-password').addClass('show-password').html('<i class="fas fa-eye-slash"></i>').parents('.input-group').find('#password').attr('type', 'text')
        } else {
            $(this).removeClass('show-password').addClass('hidden-password').html('<i class="fas fa-eye"></i>').parents('.input-group').find('#password').attr('type', 'password')
        }
    })

    $('#login-form input').on('keyup', function() {
        $.ajax({
            method: 'POST',
            url: '<?= route_to('Auth::loginValidation'); ?>',
            data: {
                [csrfToken]: csrfHash,
                username: $('#username').val(),
                password: $('#password').val()
            },
            success: function(data) {
                if ($('#username').val() == '' || $('#password').val() == '') {
                    $.each(data.errors, function(key, value) {
                        $('#' + key).addClass('is-invalid');
                        $('#' + key).parents('.form-group').find('#error').addClass('invalid-feedback').html(value)
                    })
                }
            }
        })

        if ($(this).val() != '') {
            $(this).removeClass('is-invalid').addClass('is-valid');
            $(this).parents('.form-group').find('#error').removeClass('invalid-feedback').html(' ')
        }

    });

    $('#login-form').on('submit', function(event) {
        event.preventDefault();
        event.stopImmediatePropagation();

        $.ajax({
            method: "POST",
            url: $(this).attr('action'),
            data: {
                [csrfToken]: csrfHash,
                username: $('#username').val(),
                password: $('#password').val()
            },
            beforeSend: function() {
                Swal.showLoading()
            },
            success: function(data) {
                if (data.success === true) {
                    Swal.fire({
                        title: "Success",
                        html: data.message,
                        icon: "success"
                    }).then(function() {
                        Swal.hideLoading();
                        window.location = '<?= route_to('Dashboard::index'); ?>';
                    });
                } else {
                    Swal.fire({
                        title: "Gagal",
                        html: data.message,
                        icon: "error"
                    });

                    $.each(data.errors, function(key, value) {
                        $('#' + key).addClass('is-invalid');
                        $('#' + key).parents('.form-group').find('#error').addClass('invalid-feedback').html(value)
                    })
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                var pesan = xhr.status + " " + thrownError + xhr.responseText;
                alert(pesan)
            }
        });
    })
</script>
<?= $this->endSection() ?>