<footer class="footer">
    <div class="container-fluid">
        @if (request()->is('login'))
        <div class="copyright text-center {!! request()->route()->getName() == 'login' ? 'text-login' : '' !!}">
        @else
        <div class="copyright pull-right">
        @endif
          &copy; {{ date('Y') }}, made with <i class="fa fa-heart heart"></i> by Unacode
        </div>
    </div>
</footer>
