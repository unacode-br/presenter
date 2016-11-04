<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>StackHub</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="{{ asset('css/landing.css') }}" rel="stylesheet">
  </head>
<body class="landing-page landing-page1">
<nav class="navbar navbar-transparent navbar-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button id="menu-toggle" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar bar1"></span>
                <span class="icon-bar bar2"></span>
                <span class="icon-bar bar3"></span>
            </button>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="example" >
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a  href="https://www.facebook.com/stackhub">
                        <i class="fa fa-facebook-square"></i>
                        Like
                    </a>
                </li>
                <li>
                    <a href="https://twitter.com/StackHub_">
                        <i class="fa fa-twitter"></i>
                        Tweet
                    </a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
</nav>
<div class="wrapper">
    <div class="parallax filter-gradient purple" data-color="purple">
        <div class="parallax-background">
            <img class="parallax-background-image" src="img/bg.jpeg">
        </div>
        <div class= "container">
            <div class="row">
                <div class="col-md-12">
                    <div class="description text-center">
                        <h2>StackHub</small></h2>
                        <br>
                        <h5>PlayIT! will become your favorite. It offers a list of features long enough that we could sit here talking about it all day. But, if you're serious about your music, you should definitely take a look. Find us one every market!</h5>
                        <a href="/login" class="btn btn-primary btn-lg btn-fill sign-in">Sign in</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section section-features">
        <div class="container">
            <h4 class="header-text text-center">Features</h4>
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-purple">
                        <div class="icon">
                            <i class="pe-7s-star"></i>
                        </div>
                        <div class="text">
                            <h4>Top Stars</h4>
                            <p>All appointments sync with your Google calendar so your availability is always up to date. See your schedule at a glance from any device.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-purple">
                        <div class="icon">
                            <i class="pe-7s-usb"></i>
                        </div>
                        <h4>Top Forks</h4>
                        <p>Automatic text and email reminders make sure customers always remember their upcoming appointments.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-purple">
                        <div class="icon">
                            <i class="pe-7s-graph3"></i>
                        </div>
                        <h4>Learning Curve</h4>
                        <p>Take payments and run your business on the go, in your store and then see how it all adds up with analytics.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section section-testimonial">
        <div class="container">
            <h4 class="header-text text-center">Team</h4>
            <div class="carousel-inner">
              <div class="">
                <div class="mask" id="varpa"></div>
                <div class="desription text-center">
                    <h5>Cinthia Silman</h5>
                    <p>"I absolutely love your app! It's truly amazing and looks awesome!"</p>
                </div>
              </div>
              <div class="">
                <div class="mask" id="Leandro"></div>
                <div class="desription text-center">
                    <h5>Leandro Cazarini </h5>
                    <p>"I absolutely love your app! It's truly amazing and looks awesome!"</p>
                </div>
              </div>
              <div class="">
                <div class="mask" id="Jordana"></div>
                <div class="desription text-center">
                    <h5>Jordana Nogueira</h5>
                    <p>"I absolutely love your app! It's truly amazing and looks awesome!"</p>
                </div>
              </div>
              <div class="">
                <div class="mask" id="Gustavo"></div>
                <div class="desription text-center">
                    <h5>Gustavo Marttos</h5>
                    <p>"I absolutely love your app! It's truly amazing and looks awesome!"</p>
                </div>
              </div>
              <div class="">
                <div class="mask" id="Taynara"></div>
                <div class="desription text-center">
                    <h5>Taynara Sene</h5>
                    <p>"I absolutely love your app! It's truly amazing and looks awesome!"</p>
                </div>
              </div>
            </div>
        </div>
    </div>
    <div class="section section-no-padding">
        <div class="parallax filter-gradient purple" data-color="purple">
            <div class="parallax-background">
                <img class ="parallax-background-image flipped" src="img/bg.jpeg">
            </div>
            <div class="info">
                <h1>Download this landing page for free!</h1>
                <p>Beautiful multipurpose bootstrap landing page.</p>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container">

            <div class="social-area pull-right">
                <a class="btn btn-social btn-facebook btn-simple" href="https://www.facebook.com/stackhub">
                    <i class="fa fa-facebook-square"></i>
                </a>
                <a class="btn btn-social btn-twitter btn-simple" href="https://twitter.com/StackHub_">
                    <i class="fa fa-twitter"></i>
                </a>
            </div>
            <div class="copyright">
                &copy; 2016 Unacode-br, made with love
            </div>
        </div>
    </footer>
</div>
</div>
</body>
<a href="#top" class="top hidden-xs"><i class="pe-7s-magnet"></i></a>
<script src="{{ asset('js/landing.js') }}"></script>
</html>
