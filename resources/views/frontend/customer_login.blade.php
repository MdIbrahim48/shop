@extends('frontend.layouts.master')
@section('content')
<section id="content">
  <div class="content-wrap">
    <div class="container clearfix">

      <div class="accordion accordion-lg mx-auto mb-0 clearfix" style="max-width: 550px;">
        @include('_partials.toast')
        <div class="accordion-header">
          <div class="accordion-icon">
            <i class="accordion-closed icon-lock3"></i>
            <i class="accordion-open icon-unlock"></i>
          </div>
          <div class="accordion-title">
            Login to your Account
          </div>
        </div>
        <div class="accordion-content clearfix">
          <form id="login-form" name="login-form" class="row mb-0" action="{{route('customer.login')}}" method="post">
            @csrf
            <div class="col-12 form-group">
              <label for="login-form-username">Username:</label>
              <input type="text" id="login-form-username" name="email" value="" class="form-control @error('email') is-invalid @enderror" />
              @error('email')
                  <div class="alert text-danger">{{$message}}</div>
              @enderror
            </div>

            <div class="col-12 form-group">
              <label for="login-form-password">Password:</label>
              <input type="password" id="login-form-password" name="password" value="" class="form-control @error('password') is-invalid @enderror" />
              @error('password')
                  <div class="alert text-danger">{{$message}}</div>
              @enderror
            </div>

            <div class="col-12 form-group">
              <button class="button button-3d button-black m-0" id="login-form-submit" name="login-form-submit" value="login">Login</button>
              <a href="#" class="float-end">Forgot Password?</a>
            </div>
          </form>
        </div>

        <div class="accordion-header">
          <div class="accordion-icon">
            <i class="accordion-closed icon-user4"></i>
            <i class="accordion-open icon-ok-sign"></i>
          </div>
          <div class="accordion-title">
            New Signup? Register for an Account
          </div>
        </div>
        <div class="accordion-content clearfix">
          <form id="register-form" name="register-form" class="row mb-0" action="{{route('customer.store')}}" method="post">
            @csrf
            <div class="col-12 form-group">
              <label for="register-form-name">Name:</label>
              <input type="text" id="register-form-name" name="name" value="" class="form-control @error('name') is-invalid @enderror" />
              @error('name')
                  <div class="alert text-danger">{{$message}}</div>
              @enderror
            </div>

            <div class="col-12 form-group">
              <label for="register-form-email"> Address:</label>
              <input type="text" id="register-form-email" name="address" value="" class="form-control @error('address') is-invalid @enderror" />
              @error('address')
                <div class="alert text-danger">{{$message}}</div>
              @enderror
            </div>
            <div class="col-12 form-group">
              <label for="phone">Phone:</label>
              <input type="text" id="phone" name="phone" value="" class="form-control @error('phone') is-invalid @enderror" />
              @error('phone')
                <div class="alert text-danger">{{$message}}</div>
              @enderror
            </div>
            <div class="col-12 form-group">
              <label for="email">Email Address:</label>
              <input type="email" id="email" name="email" value="" class="form-control" />
              @error('email')
                <div class="alert text-danger">{{$message}}</div>
              @enderror
            </div>
            <div class="col-12 form-group">
              <label for="password">Password:</label>
              <input type="password" id="password" name="password" value="" class="form-control @error('password') is-invalid @enderror" />
              @error('password')
                <div class="alert text-danger">{{$message}}</div>
              @enderror
            </div>
            <div class="col-12 form-group">
              <label for="confirm_password">Confirm Password:</label>
              <input type="password" id="confirm_password" name="confirm_password" value="" class="form-control @error('confirm_password') is-invalid @enderror" />
              @error('confirm_password')
                <div class="alert text-danger">{{$message}}</div>
              @enderror
            </div>
            <div class="col-12 form-group">
              <button class="button button-3d button-black m-0" id="register-form-submit" name="register-form-submit" value="register">Register Now</button>
            </div>
          </form>
        </div>

      </div>

    </div>
  </div>
</section><!-- #content end -->

@endsection
     

