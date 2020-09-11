@section('main_menu')

<div class="sidebar-sticky">
  <ul class="nav flex-column py-1">
    <li class="nav-item">
      <a class="nav-link active" href="{{ route('home')}}">
        
      <svg width="24" height="24" viewBox="0 0 16 16" class="bi bi-house" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
      </svg>
        Home
      </a>
    </li>
    @include('includes.menu.security')
    @include('includes.menu.visitor')
    @include('includes.menu.car')
    @include('includes.menu.card')
    @include('includes.menu.fault')
    @include('includes.menu.incident')
  </ul>
</div>