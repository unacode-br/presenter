@extends('core::template.layout.app')

@section('content')
  <div class="container" id="main">
    <div class="row vdivide">
      <div class="col-sm-6 text-center">
        <h2><strong>Stack</strong><small>Hub</small></h2>
        <p class="hidden-xs">
          StackHub é uma ferramenta de data mining que mostrará ao usuário informaçõs acerca das tecnologias mais utilizadas no Github e StackOverflow. Ela mostrará o uso e o aprendizado dessas tecnologias, para que os usuários possam, através dessas informações, escolherem qual será a próxima tecnologia que vale a pena investir!
        </p>
      </div>
      <div class="col-sm-6 text-center ">
        <h1 class="hidden-xs">Login</h1>
        <h3 class="hidden-md hidden-lg">Login</h3>
      </br>
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
