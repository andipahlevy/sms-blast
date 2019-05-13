@extends('layouts.app')

@section('theme_js')
<script type="text/javascript" src="{{ asset('limitless/js/plugins/forms/styling/uniform.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/js/core/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/js/pages/login.js') }}"></script>
@endsection

@section('content')

<!-- Unlock user -->
<form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
	
	<div class="panel login-form" style="margin: 0 auto 20px auto;width: 320px;">
		<div class="thumb thumb-rounded">
			<img src="{{ asset('limitless/images/placeholder.jpg') }}" alt="">
			<div class="caption-overflow">
				<span>
					<a href="#" class="btn border-white text-white btn-flat btn-icon btn-rounded btn-xs"><i class="icon-collaboration"></i></a>
					<a href="#" class="btn border-white text-white btn-flat btn-icon btn-rounded btn-xs ml-5"><i class="icon-question7"></i></a>
				</span>
			</div>
		</div>

		<div class="panel-body">
		<h6 class="content-group text-center text-semibold no-margin-top">{{ __('Login') }} <small class="display-block">Masuk ke aplikasi</small></h6>
			@csrf
			<input type="hidden" name="email" placeholder="{{ __('E-Mail Address') }}" value="andilevi@gmail.com"/>
			
			@if ($errors->has('email'))
				<span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('email') }}</strong>
				</span>
			@endif
			<div class="form-group has-feedback">
				<input type="password" name="password" required class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" >
				<div class="form-control-feedback">
				@if ($errors->has('password'))
					<i class="icon-user-lock text-muted"></i>
					{{ $errors->first('password') }}
				@endif
				</div>
			</div>
		
		<div class="form-group login-options">
			<div class="row">
				<div class="col-sm-6">
					<label class="checkbox-inline">
						<input type="checkbox" class="styled" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
						{{ __('Remember Me') }}
					</label>
				</div>

				<div class="col-sm-6 text-right">
					<a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
				</div>
			</div>
		</div>

		<button type="submit" class="btn btn-primary btn-block">{{ __('Login') }} <i class="icon-arrow-right14 position-right"></i></button>
		</div>
	</div>

</form>
<!-- /unlock user -->

@endsection
