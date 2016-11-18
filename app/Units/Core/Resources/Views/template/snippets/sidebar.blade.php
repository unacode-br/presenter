<!-- Sidebar -->
<div class="sidebar" data-active-color="white" data-active-color="purple">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="{{ url('/') }}" class="simple-text">
                <strong>Stackhub</strong>
            </a>
        </div>
        <ul class="nav">
            <li id="dashboard" {!! request()->route()->getName() == 'dashboard' ? 'class="active"' : '' !!}>
                <a href="{{ url('/home') }}">
                    <i class="fa fa-dashboard"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li id="learning" {!! request()->route()->getName() == 'learning' ? 'class="active"' : '' !!}>
                <a href="{{ url('/graphics/learning') }}">
                    <i class="fa ti-stats-down"></i>
                    <p>Learning Curve</p>
                </a>
            </li>
            <li id="trends-lang" {!! request()->route()->getName() == 'trends-lang' ? 'class="active"' : '' !!}>
                <a href="{{ url('/graphics/trends-lang') }}">
                    <i class="fa ti-stats-up"></i>
                    <p>Trending Languages</p>
                </a>
            </li>
            <li id="stars" {!! request()->route()->getName() == 'trends.stars' ? 'class="active"' : '' !!}>
                <a href="{{ url('/graphics/stars') }}">
                    <i class="fa fa-star"></i>
                    <p>Top 10 Stared</p>
                </a>
            </li>
            <li id="forks" {!! request()->route()->getName() == 'trends.forks' ? 'class="active"' : '' !!}>
                <a href="{{ url('/graphics/forks') }}">
                    <i class="fa fa-code-fork"></i>
                    <p>Top 10 Forked</p>
                </a>
            </li>
            <li id="frameworks" {!! request()->route()->getName() == 'frameworks' ? 'class="active"' : '' !!}>
                <a href="{{ url('/graphics/frameworks') }}">
                    <i class="fa ti-heart"></i>
                    <p>Favorite Frameworks</p>
                </a>
            </li>
            <li id="languages" {!! request()->route()->getName() == 'languages' ? 'class="active"' : '' !!}>
                <a href="{{ url('/graphics/languages') }}">
                    <i class="fa ti-light-bulb"></i>
                    <p>Favorite Languages</p>
                </a>
            </li>
        </ul>
    </div>
</div>
