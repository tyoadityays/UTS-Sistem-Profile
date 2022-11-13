<ul>
    @if (Auth::check() && Auth::user()->role == 'admin')
        <li class="nav-item">
            <a href="{{ url('dashboard92') }}" class="nav-link">
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('agama92') }}" class="nav-link">
                <p>
                    Crud Agama
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('logout92') }}" class="nav-link">
                <p>
                    Logout
                </p>
            </a>
        </li>
    @else
        <li class="nav-item">
            <a href="{{ url('profile92') }}" class="nav-link">
                <p>
                    Dashboard
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('/changePassword92') }}" class="nav-link">
                <p>
                    Ganti Password
                </p>
            </a>
        </li>


        <li class="nav-item">
            <a href="{{ url('logout92') }}" class="nav-link">
                <p>
                    Logout
                </p>
            </a>
        </li>
    @endif
</ul>
