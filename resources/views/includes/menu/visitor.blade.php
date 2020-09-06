@section('people_menu-item')

<li class="nav-item">
    <button class="navbar-toggler text-primary w-100" type="button" data-toggle="collapse" data-target="#navbarpeople" aria-controls="navbarsExample01" aria-expanded="true" aria-label="Toggle navigation">
 
        <svg width="24" height="24" viewBox="0 0 16 16" class="bi bi-people float-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.995-.944v-.002.002zM7.022 13h7.956a.274.274 0 0 0 .014-.002l.008-.002c-.002-.264-.167-1.03-.76-1.72C13.688 10.629 12.718 10 11 10c-1.717 0-2.687.63-3.24 1.276-.593.69-.759 1.457-.76 1.72a1.05 1.05 0 0 0 .022.004zm7.973.056v-.002.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10c-1.668.02-2.615.64-3.16 1.276C1.163 11.97 1 12.739 1 13h3c0-1.045.323-2.086.92-3zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
        </svg>
        <span class="small">Посетители</span>
 
    </button>

    <div class="navbar-collapse collapse" id="navbarpeople" style="">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('visitor-new') }}">Новый</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('visitor-index') }}">На территории</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Отчет</a>
            </li>
        </ul>
    </div>
</li>
