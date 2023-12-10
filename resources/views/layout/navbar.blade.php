    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto px-3">
            <li class="nav-item dropdown">
                    <div class="notifications-container">
                        {{-- <x-notification :notifications="$notifications" /> --}}
                    </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-expanded="false">
                    {{ auth()->user()->name }}
                </a>
                <ul class="dropdown-menu">
                    @if (auth()->user()->role == 0 || auth()->user()->role == 1)
                        <li><a class="dropdown-item" href="{{ route('user.show', auth()->user()->id) }}">Profile</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('change_password.form') }}">Change Password</a></li>
                    @else
                        <li><a class="dropdown-item"
                                href="{{ route('doctor.show',auth()->user()->doctor()->first()->id) }}">Profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('change_password.form') }}">Change Password</a></li>
                    @endif

                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const notificationsContainer = document.getElementById('notifications-container');

            if (notificationsContainer) {
                fetchNotifications();

                function fetchNotifications() {
                    fetch('/notifications')
                        .then(response => response.json())
                        .then(data => {
                            notificationsContainer.innerHTML = '';
                            notificationsContainer.innerHTML = data.notification;
                        })
                        .catch(error => console.error('Error fetching notifications:', error));
                }
                setInterval(fetchNotifications, 60000);
            }
        });
    </script>
