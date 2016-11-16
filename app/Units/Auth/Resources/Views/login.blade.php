<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login Stackhub</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/favicon.png" type="image/x-icon"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body id="login">
<div class="container" id="main-login">
    <div class="row">
        <div class="col-sm-8 text-center">
          <h2 class="hidden-md hidden-lg logo-mobile"><strong>Stack</strong><small>Hub</small></h2>
            <div class="hidden-xs col-sm-12 login card">
                <h2><strong>Stack</strong>
                    <small>Hub</small>
                </h2>
                <p >
                    StackHub é uma ferramenta de data mining que mostrará ao usuário informações acerca das tecnologias
                    mais utilizadas no Github e StackOverflow. Ela mostrará o uso e o aprendizado dessas tecnologias,
                    para que os usuários possam através dessas informações, escolherem qual será a próxima tecnologia
                    que vale a pena investir!
                </p>
            </div>
        </div>
        <div class="col-sm-4 text-center ">
            <div class="col-sm-10 col-sm-offset-2 login card">
                <h2 class="hidden-xs"><strong>Login</strong></h2>
                <h3 class="hidden-md hidden-lg">Login</h3>
                </br>
                <div class="col-md-12">
                    <a href="{{ url('/auth/github') }}" class="btn btn-block btn-social btn-github">
                        <span class="fa fa-github"></span> Login com Github
                    </a>
                    <a href="{{ url('/auth/facebook') }}" class="btn btn-block btn-social btn-facebook">
                        <span class="fa fa-facebook"></span> Login com Facebook
                    </a>
                    <a href="{{ url('/auth/google') }}" class="btn btn-block btn-social btn-google">
                        <span class="fa fa-google"></span> Login com Google
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="footer-content">
    @include('core::template.snippets.footer')
</div>
</body>
</html>
