<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

   <!-- Bootstrap JS (with Popper) -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
   <title>Login</title>
</head>
<style>
   .auth-layout-wrap {
    align-items: center;
    background-size: cover;
    background: url('{{ asset('images/photo-wide-4.jpg') }}');
    display: flex
;
    flex-direction: column;
    justify-content: center;
    min-height: 100vh;
}
 .auth-layout-wrap .auth-content {
    margin: auto;
    min-width: 340px;
}
.text-18 {
    font-size: 18px;
}
.pt-0 {
    padding-top: 0 !important;
}
.form-group {
    margin-bottom: 10px;
    position: relative;
}
.text-12 {
    font-size: 12px;
}
fieldset {
    border: 0;
    margin: 0;
    min-width: 0;
    padding: 0;
}.col-form-label {
    font-size: inherit;
    line-height: 1.5;
    margin-bottom: 0;
    padding-bottom: calc(.375rem + 1px);
    padding-top: calc(.375rem + 1px);
}
legend {
    color: inherit;
    display: block;
    font-size: 1.5rem;
    line-height: inherit;
    margin-bottom: .5rem;
    max-width: 100%;
    padding: 0;
    white-space: normal;
    width: 100%;
}
.form-control.form-control-rounded, .form-control.rounded {
    border-radius: 20px;
}
.custom-select.is-valid, .form-control.is-valid, .was-validated .custom-select:valid, .was-validated .form-control:valid {
    border-color: #10b981;
}
.was-validated .form-control:invalid, .was-validated .form-control:valid, .form-control.is-invalid, .form-control.is-valid {
    background-position: right calc(0.375em + 0.1875rem) center;
}
.form-control {
    background: #f3f4f6;
    border: 1px solid #9ca3af;
    color: #111827;
    outline: initial !important;
}
.form-control {
    background-clip: padding-box;
    background-color: #fff;
    border-radius: .25rem;
    color: #374151;
    display: block;
    font-size: .813rem;
    height: calc(1.9695rem + 2px);
    line-height: 1.5;
    padding: .375rem .75rem;
    transition: border-color .15s 
ease-in-out, box-shadow .15s 
ease-in-out;
    width: 100%;
}
button, input, optgroup, select, textarea {
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
    margin: 0;
}
.btn[type=button], html [type=button] {
    -webkit-appearance: none !important;
}
[type=reset], [type=submit], button, html [type=button] {
    -webkit-appearance: button;
}
.input-button button {
    position: absolute;
    top: 1px;
    right: 1px;
    border: 0;
    background-color: transparent;
    padding: 6px 12px;
    border-radius: 50%;
}
button, input, select, textarea {
    vertical-align: baseline;
}
button, input {
   
   button, input, optgroup, select, textarea
Specificity: (0,0,1)
 {
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
    margin: 0;
}
button {
    border-radius: 0;
}
.btn:not(:disabled):not(.disabled) {
    cursor: pointer;
}
.btn.btn-rounded, .btn.rounded {
    border-radius: 40px !important;
}
.btn-outline-primary, .btn-primary {
    border-color: #ff630f;
}
.btn {
    padding: .5rem 1.25rem;
}
.mt-2, .my-2 {
    margin-top: .5rem !important;
}
.btn-block {
    display: block;
    width: 100%;
}
.btn-primary {
    background-color: #ff630f;
    border-color: #ff630f;
    color: #fff;
}
.btn:not(:disabled):not(.disabled) {
    cursor: pointer;
}
.btn.btn-rounded, .btn.rounded {
    border-radius: 40px !important;
}
.btn-outline-primary, .btn-primary {
    border-color: #ff630f;
}
.btn {
    padding: .5rem 1.25rem;
}
.mt-2, .my-2 {
    margin-top: .5rem !important;
}
.btn-block {
    display: block;
    width: 100%;
}
.btn-primary {
    background-color: #ff630f;
    border-color: #ff630f;
    color: #fff;
}
.btn {
    border: 1px solid transparent;
    border-radius: .25rem;
    display: inline-block;
    font-size: .813rem;
    font-weight: 400;
    line-height: 1.5;
    padding: .375rem .75rem;
    text-align: center;
    transition: color .15s 
ease-in-out, background-color .15s 
ease-in-out, border-color .15s 
ease-in-out, box-shadow .15s 
ease-in-out;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
    vertical-align: middle;
    white-space: nowrap;
}
</style>
<body class="text-left">
  <div id="login">
    <div class="auth-layout-wrap">
        <div class="auth-content">
            <div class="card o-hidden">
                <div class="row">
                    <div class="col-md-12">
                        <div class="p-4">
                            <div class="auth-logo text-center mb-30"><img src="/images/logo.png"></div>
                            <h1 class="mb-3 text-18">Sign In</h1>
                            @if($errors->has('login'))
                                 <div class="alert alert-danger">{{ $errors->first('login') }}</div>
                            @endif
                            <span>
                                <form method="POST" action="{{ route('login.submit') }}" autocomplete="off">
                                    @csrf

                                    <!-- Hidden dummy fields – Chrome fills these instead of real ones -->
                                    <input type="text"     name="prevent_autofill_username" id="prevent_autofill_username" value="" style="display:none;" autocomplete="nope" />
                                    <input type="password" name="prevent_autofill_password" id="prevent_autofill_password" value="" style="display:none;" autocomplete="nope" />

                                    <!-- Your real fields (unchanged) -->
                                    <fieldset class="form-group text-12">
                                        <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0">Username</legend>
                                        <div>
                                            <input type="text" name="username" class="form-control-rounded form-control" 
                                                value="{{ old('username') }}" required autofocus autocomplete="username">
                                        </div>
                                    </fieldset>

                                    <fieldset class="form-group text-12">
                                        <legend tabindex="-1" class="bv-no-focus-ring col-form-label pt-0">Password</legend>
                                        <div class="input-button">
                                            <input type="password" name="password" class="form-control-rounded form-control" 
                                                required autocomplete="current-password">
                                            <button type="button" title="Show Password"><i class="i-Eye"></i></button>
                                        </div>
                                    </fieldset>
                                    </span>
                                    <button type="submit" class="btn btn-rounded btn-block mt-2 btn-primary mt-2">Sign In</button>
                                </form>
                            </span>
                            <div class="mt-3 text-center"><a href="/password/reset" class="text-muted"><u>Forgot Password ?</u></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/login.min.js') }}"></script>
</body>
</html>