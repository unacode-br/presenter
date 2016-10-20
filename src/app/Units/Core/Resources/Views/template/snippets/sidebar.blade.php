<!-- Sidebar -->
<div class="sidebar" data-active-color="gray" data-active-color="purple">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="{{ url('/') }}" class="simple-text">
                <strong>Stack</strong>
                <small>hub</small>
            </a>
        </div>
        <ul class="nav">
            <li>
                <a href="{{ url('/home') }}">
                    <i class="fa fa-dashboard"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a href="{{ url('/graphics/stars') }}">
                    <i class="fa fa-star"></i>
                    <p>Top 10 Stared</p>
                </a>
            </li>
            <li>
                <a href="{{ url('/graphics/forks') }}">
                    <i class="fa fa-code-fork"></i>
                    <p>Top 10 Forked</p>
                </a>
            </li>
        </ul>
    </div>
</div>
