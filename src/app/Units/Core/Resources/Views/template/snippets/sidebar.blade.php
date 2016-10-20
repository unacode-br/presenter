<!-- Sidebar -->
<div class="sidebar" data-active-color="gray" data-active-color="purple">
  <div class="sidebar-wrapper">
    <div class="logo">
      <a href="{{ url('/') }}" class="simple-text">
        <strong>Stack</strong><small>hab</small>
      </a>
    </div>
    <ul class="nav">
      <li class="active">
        <a href="{{ url('/home') }}">
          <i class="ti-pie-chart"></i>
          <p>Dashboard</p>
        </a>
      </li>
      <li>
          <a href="{{ url('/graphics/stars') }}">
              <i class="ti-star"></i>
              <p>Ranking Favoritados</p>
          </a>
      </li>
      <li>
          <a href="{{ url('/graphics/forks') }}">
              <i class="ti-github"></i>
              <p>Com mais Forks</p>
          </a>
      </li>
    </ul>
  </div>
</div>
