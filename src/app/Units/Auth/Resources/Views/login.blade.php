@extends('core::layouts.app')

@section('content')
  <div class="container" id="main">
    <div class="row vdivide">
      <div class="col-sm-6 text-center hidden-xs">
        <h2><strong>Stack</strong><small>Hub</small></h2>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
      </div>
      <div class="col-sm-6 text-center ">
        <h1>Login</h1>
        <div class="col-md-6 col-md-offset-3">
          <a href="{{ url('/auth/github') }}" class="btn btn-block btn-social btn-github">
            <span class="fa fa-github"></span> Login com Github
          </a>
          <a href="{{ url('/auth/facebook') }}" class="btn btn-block btn-social btn-facebook">
            <span class="fa fa-facebook"></span> Login com Facebook
          </a>
          <a href="{{ url('/auth/google') }}"  class="btn btn-block btn-social btn-google">
            <span class="fa fa-google"></span> Login com Google
          </a>
        </div>
      </div>
    </div>
  </div>
@endsection
