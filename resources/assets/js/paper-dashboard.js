var fixedTop = false;

var navbar_initialized = false;

$(document).ready(function(){
    var window_width = $(window).width();

    // Init navigation toggle for small screens
    if(window_width <= 991){
        lbd.initRightMenu();
    }

    //  Activate the tooltips
    $('[rel="tooltip"]').tooltip();

});

// activate collapse right menu when the windows is resized
$(window).resize(function(){
    if($(window).width() <= 991){
        lbd.initRightMenu();
    }
});

var lbd = {
    misc:{
        navbar_menu_visible: 0
    },

    initRightMenu: function(){
         if(!navbar_initialized){
            var $off_canvas_sidebar = $('nav').find('.navbar-collapse').first().clone(true);

            var $sidebar = $('.sidebar');
            var sidebar_bg_color = $sidebar.data('background-color');
            var sidebar_active_color = $sidebar.data('active-color');

            var $logo = $sidebar.find('.logo').first();
            var logo_content = $logo[0].outerHTML;

            var ul_content = '';

            // set the bg color and active color from the default sidebar to the off canvas sidebar;
            $off_canvas_sidebar.attr('data-background-color',sidebar_bg_color);
            $off_canvas_sidebar.attr('data-active-color',sidebar_active_color);

            $off_canvas_sidebar.addClass('off-canvas-sidebar');

            //add the content from the regular header to the right menu
            $off_canvas_sidebar.children('ul').each(function(){
                var content_buff = $(this).html();
                var ul_content = ul_content + content_buff;
            });

            // add the content from the sidebar to the right menu
            var content_buff = $sidebar.find('.nav').html();
            var ul_content = ul_content + '<li class="divider"></li>'+ content_buff;

            var ul_content = '<ul class="nav navbar-nav">' + ul_content + '</ul>';

            var navbar_content = logo_content + ul_content;
            var navbar_content = '<div class="sidebar-wrapper">' + navbar_content + '</div>';

            $off_canvas_sidebar.html(navbar_content);

            $('body').append($off_canvas_sidebar);

             var $toggle = $('.navbar-toggle');

             $off_canvas_sidebar.find('a').removeClass('btn btn-round btn-default');
             $off_canvas_sidebar.find('button').removeClass('btn-round btn-fill btn-info btn-primary btn-success btn-danger btn-warning btn-neutral');
             $off_canvas_sidebar.find('button').addClass('btn-simple btn-block');

             $toggle.click(function (){
                if(lbd.misc.navbar_menu_visible == 1) {
                    $('html').removeClass('nav-open');
                    lbd.misc.navbar_menu_visible = 0;
                    $('#bodyClick').remove();
                     setTimeout(function(){
                        $toggle.removeClass('toggled');
                     }, 400);

                } else {
                    setTimeout(function(){
                        $toggle.addClass('toggled');
                    }, 430);

                    var div = '<div id="bodyClick"></div>';
                    $(div).appendTo("body").click(function() {
                        $('html').removeClass('nav-open');
                        lbd.misc.navbar_menu_visible = 0;
                        $('#bodyClick').remove();
                         setTimeout(function(){
                            $toggle.removeClass('toggled');
                         }, 400);
                    });

                    $('html').addClass('nav-open');
                    lbd.misc.navbar_menu_visible = 1;

                }
            });
            navbar_initialized = true;
        }

    }
}


// Returns a function, that, as long as it continues to be invoked, will not
// be triggered. The function will be called after it stops being called for
// N milliseconds. If `immediate` is passed, trigger the function on the
// leading edge, instead of the trailing.

function debounce(func, wait, immediate) {
	var timeout;
	return function() {
		var context = this, args = arguments;
		clearTimeout(timeout);
		timeout = setTimeout(function() {
			timeout = null;
			if (!immediate) func.apply(context, args);
		}, wait);
		if (immediate && !timeout) func.apply(context, args);
	};
};

// Instance the tour
var tour = new Tour({
  steps: [
  {
    element: "#dashboard",
    title: "Dashboard",
    content: "Aqui é o ponto de partida do sistema, todos os atalhos para os gráficos estão presentes nessa tela."
  },
  {
    element: "#learning",
    title: "Learning Curve",
    content: "Esse é o gráfico que mostra as curvas de aprendizado referente a linguagens de programação escolhida."
  },
  {
    element: "#trends-lang",
    title: "Trending Languages",
    content: "Esse é o gráfico de tendência de linguagens utilizadas em determinado período."
  },
  {
    element: "#stars",
    title: "Top 10 Stared",
    content: "Esse é o gráfico de tecnologias que possuem maior popularidade."
  },
  {
    element: "#forks",
    title: "Top 10 Forked",
    content: "Esse é o gráfico de tecnologias que possuem mais contribuições."
  },
  {
    element: "#frameworks",
    title: "Favorite Frameworks",
    content: "Esse é o gráfico de frameworks que estão sendo mais utilizados no ultimo mês."
  },
  {
    element: "#languages",
    title: "Favorite Languages",
    content: "Esse é o gráfico das linguagens que estão sendo mais utilizadas no ultimo mês."
  },
  {
    element: "#logout",
    title: "logout",
    content: "Sair do sistema."
  }
]});

tour.init();

tour.start();
