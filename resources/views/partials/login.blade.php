@if(!empty(Session::get('login')))
<script>
$( document ).ready(function() {
    $('#loginModal').modal('show');
});
</script>
@endif

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">Sign In</button>
<div class="modal fade hide" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			 	<h5 class="modal-title" id="exampleModalLabel">Login</h5>
			 		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			 			<span aria-hidden="true">&times;</span>
			 		</button>
			</div>
			<div class="modal-body">
		  	<!-- login -->
        		<form id="loginForm" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
        		    @csrf

        		    <div class="form-group row">
        		        <label for="login_email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

        		        <div class="col-md-6">
        		            <input id="login_email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

        		            @if ($errors->has('email'))
        		                <span class="invalid-feedback" role="alert">
        		                    <strong>{{ $errors->first('email') }}</strong>
        		                </span>
        		            @endif
        		        </div>
        		    </div>

        		    <div class="form-group row">
        		        <label for="login_password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

        		        <div class="col-md-6">
        		            <input id="login_password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

        		            @if ($errors->has('password'))
        		                <span class="invalid-feedback" role="alert">
        		                    <strong>{{ $errors->first('password') }}</strong>
        		                </span>
        		            @endif
        		        </div>
        		    </div>

        		    <div class="form-group row">
        		        <div class="col-md-6 offset-md-4">
        		            <div class="form-check">
        		                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

        		                <label class="form-check-label" for="remember">
        		                    {{ __('Remember Me') }}
        		                </label>
        		            </div>
        		        </div>
        		    </div>

        		    <div class="form-group row mb-0">
        		        <div class="col-md-8 offset-md-4">
        		            <button type="submit" class="btn btn-primary">
        		                {{ __('Login') }}
        		            </button>

        		            <a class="btn btn-link" href="{{ route('password.request') }}">
        		                {{ __('Forgot Your Password?') }}
        		            </a>
        		        </div>
        		    </div>
        		</form>
        		<!-- end login -->
			</div>
		</div>
	</div>
</div>