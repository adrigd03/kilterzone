@extends('layouts.master')
@section('title', 'Login')
@section('styles')
@endsection
@section('scripts')
<script src="https://www.google.com/recaptcha/api.js"></script>
@endsection

@section('content')


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 ">
            <div class="card">
                <div class="card-header text-center">Inici de sessió</div>

                @error('error', 'login')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email_username" class="form-label">Adreça de correu o nom de usuari</label>

                            <input id="email_username" type="email_username" class="form-control @error('email_username','login') is-invalid @enderror" name="email_username" value="{{ old('email_username') }}" required autofocus>

                            @error('email_username','login')
                            <div class="alert alert-danger mt-2" name="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Contrasenya</label>

                            <input id="password" type="password" class="form-control @error('password','login') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password','login')
                            <div class="alert alert-danger mt-2" name="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- input i div per el recaptcha -->
                        @if (session('loginIntents') >= 3)
                        <input type="hidden" name="g-token" id="recaptchaToken">
                        <div class="g-recaptcha " data-sitekey="6LeoIrgpAAAAAECV9u6e49Mb9Og9yzg5g0XcIDM7" data-callback='onSubmit' data-action='submit'>Submit</div>
                        @error('g-token','login')
                        <div class="alert alert-danger mt-2" name="error">{{ $message }}</div>
                        @enderror
                        @endif


                        <div class="mb-3 mt-2">
                            <button type="submit" class="btn btn-primary">
                                Inici de sessió
                            </button>
                        </div>

                        <div class="mt-3 d-grid gap-2">
                            <a href="/login-google" class="btn btn-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="24" width="100%">
                                    <path fill="#ffffff" d="M386 400c45-42 65-112 53-179H260v74h102c-4 24-18 44-38 57z"></path>
                                    <path fill="#ffffff" d="M90 341a192 192 0 0 0 296 59l-62-48c-53 35-141 22-171-60z"></path>
                                    <path fill="#ffffff" d="M153 292c-8-25-8-48 0-73l-63-49c-23 46-30 111 0 171z"></path>
                                    <path fill="#ffffff" d="M153 219c22-69 116-109 179-50l55-54c-78-75-230-72-297 55z"></path>
                                </svg> Registra't amb Google
                            </a>
                        </div>
                    </form>


                </div>

                <div class="card-footer text-center align-top">
                    <p class="mb-0">Has oblidat la teva contrasenya? </p><button class="btn text-primary text-decoration-underline align-text-center text-center " data-bs-toggle="modal" data-bs-target="#modalRecuperar">Recupera-la</button>
                    <p class="mb-0">No tens un compte? <a href="{{ route('registre') }}">Registra't</a></p>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function onSubmit(token) {
        document.getElementById("recaptchaToken").value = token;
    }
</script>



<!-- Modal per recuperar contrasenya -->
<div class="modal fade" id="modalRecuperar" tabindex="-1" aria-labelledby="modalRecuperarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalRecuperarLabel">Recuperar contrasenya</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('recuperar') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        @error('email','recuperar')
                        <div class="alert alert-danger mt-2" name="error">{{ $message }}</div>
                        @enderror

                        @error('error','recuperar')
                        <div class="alert alert-danger mt-2" name="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Recuperar contrasenya</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

<!-- Modal per recuperar la contrasenya si el usuari ha posat malament el email o hi ha hagut un error -->

@error('email','recuperar')
<script>
    var myModal = new bootstrap.Modal(document.getElementById('modalRecuperar'), {
        keyboard: false
    });
    myModal.show();
</script>
@enderror
@error('error','recuperar')
<script>
    var myModal = new bootstrap.Modal(document.getElementById('modalRecuperar'), {
        keyboard: false
    });
    myModal.show();
</script>
@enderror
@endsection