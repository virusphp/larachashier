@extends('layouts.login')
@section('content')
<div class="row">
    <div class="col-sm-12 col-md-6 col-lg-4 mx-auto">
        <h1 class="text-center mt-5">{{ config('app.name')}}</h1>
        <hr class="my-4">
        <p class="text-center fs-5">Sistem Manajemen Pelunasan</p>

        <div class="card">
            <div class="card-body p-4 p-sm-6">
                <div class="text-center mb-4">
                    @if(env('APP_NAME') == "KRATON")
                    <img id="change-photo" class="profile-img" src="{{ asset('img/logo.png') }}">
                    @else
                    <img id="change-photo" class="profile-img" width="100" src="{{ asset('img/logo.png') }}">
                    @endif
                    <span class="fs-light">Masuk untuk lanjut ke Aplikasi SMP</span>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" id="username" name="username"
                            class="form-control  @error('username') is-invalid @enderror" placeholder="Username"
                            value="{{ old('username') }}" required autocomplete="username" autofocus>
                        <label for="floatingInput">Username</label>
                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password"
                            class="form-control @error('password') is-invalid @enderror" id="password"
                            placeholder="Password" required autocomplete="current-password">
                        <label for="floatingPassword">Password</label>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" name="remember" type="checkbox" id="remember" {{ old('remember')
                            ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Remember') }}
                        </label>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-orange text-white">{{ __('Login') }}</button>
                    </div>

                    <hr>
                    {{-- <div class="text-center mt-3">
                        <a href="#" class="btn btn-light text-black mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20"
                                viewBox="0 0 48 48">
                                <path fill="#FFC107"
                                    d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z">
                                </path>
                                <path fill="#FF3D00"
                                    d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z">
                                </path>
                                <path fill="#4CAF50"
                                    d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z">
                                </path>
                                <path fill="#1976D2"
                                    d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z">
                                </path>
                            </svg> Continue with Google
                        </a>
                    </div> --}}
                    <div class="">
                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        $("#password-show").click(function() {
            $("#password").attr("type", "text");
            $(this).parent().find("#password-show").hide();
            $(this).parent().find("#password-hide").show();
        });
        $("#password-hide").click(function() {
            $("#password").attr("type", "password");
            $(this).parent().find("#password-hide").hide();
            $(this).parent().find("#password-show").show();
        });
    });

    $(document).on('change', '#username', function() {
        let username = $("#username").val();
        var url = '/users/username/'+username,
            method = 'GET';
        $.ajax({
            url: url,
            method: method,
            dataType: "json",
            success: function(res) {
                console.log(res)
                $('#sub_unit').val(res.login_poli+','+res.kode_sub_unit).trigger('change');
                $('#change-photo').attr("src", "{{ asset('') }}" + res.foto).attr("class", "profile-img rounded-circle");
                getId("select-subunit").style.display="";
            },
            error: function(xhr) {}
        });
    });

</script>
@endpush