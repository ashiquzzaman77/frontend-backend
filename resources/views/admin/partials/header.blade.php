<!-- Add CSS for Flexbox Centering -->
<style>
    .navbar {
        display: flex;
        justify-content: space-between;
        width: 100%;
    }

    .navbar-center {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-grow: 1;
    }

    /* Styling the Clock */
    .clock {
        font-family: 'Arial', sans-serif;
        font-size: 1.2rem;
        font-weight: bold;
        color: #fff;
        background: linear-gradient(90deg, #02135cbd, #170247);
        padding: 10px 30px;
        border-radius: 5px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Styling for Day and Time (Inline) */
    .clock .day {
        font-size: 1rem;
        font-weight: normal;
        color: #ddd;
        margin-right: 10px;
    }

    .clock .time {
        font-size: 1.2rem;
        font-weight: bold;
        color: #fff;
    }
</style>

<header>
    <div class="topbar d-flex align-items-center justify-space-between">
        <nav class="navbar navbar-expand gap-3" style="width: 100%;">

            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i></div>

            <!-- Other Left Aligned Buttons -->
            <div class="btn btn-primary border-0 py-2 rounded-1"
                style="background: linear-gradient(45deg, #01294e, #0d0d61);">
                <a href="{{ route('frontend.index') }}" target="blank" class="text-light px-4 border-0">Frontend</a>
            </div>

            <!-- Centered Clock Button -->
            <div class="navbar-center">
                <div id="clock" class="clock d-none d-lg-flex">
                    <div id="day" class="day">Monday</div>
                    <div id="time" class="time">12:00:00 AM</div>
                </div>
            </div>


            <!-- Right Aligned Menu Items -->
            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center gap-1">
                    <li class="nav-item dark-mode d-none d-sm-flex">
                        <a class="nav-link dark-mode-icon" href="javascript:;"><i class='bx bx-moon'></i></a>
                    </li>

                    <li class="nav-item dropdown dropdown-app d-none">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown"
                            href="javascript:;">
                            <i class='bx bx-grid-alt'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end p-0">
                            <div class="app-container p-2 my-2"></div>
                        </div>
                    </li>

                    <!-- Notifications -->
                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#"
                            data-bs-toggle="dropdown">
                            <span class="alert-count">7</span>
                            <i class='bx bx-bell'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">
                                <div class="msg-header">
                                    <p class="msg-header-title">Notifications</p>
                                    <p class="msg-header-badge">8 New</p>
                                </div>
                            </a>
                            <div class="header-notifications-list">
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="user-online">
                                            <img src="" class="msg-avatar" alt="user avatar">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">Daisy Anderson<span class="msg-time float-end">5 sec
                                                    ago</span></h6>
                                            <p class="msg-info">The standard chunk of lorem</p>
                                        </div>
                                    </div>
                                </a>

                                <a href="javascript:;">
                                    <div class="text-center msg-footer">
                                        <button class="btn btn-primary w-100">View All Notifications</button>
                                    </div>
                                </a>
                            </div>
                    </li>

                    <!-- Shopping Cart (Hidden) -->
                    <li class="nav-item dropdown dropdown-large d-none">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#"
                            role="button" data-bs-toggle="dropdown">
                            <span class="alert-count">8</span>
                            <i class='bx bx-shopping-bag'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">
                                <div class="msg-header">
                                    <p class="msg-header-title">My Cart</p>
                                    <p class="msg-header-badge">10 Items</p>
                                </div>
                            </a>
                            <div class="header-message-list">
                                <a class="dropdown-item" href="javascript:;"></a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- User Profile -->
            <div class="user-box dropdown px-3">
                @php
                    $id = Auth::guard('admin')->user()->id;
                    $profileData = App\Models\Admin::find($id);
                @endphp
                <a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret"
                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ !empty($profileData->photo) ? url('upload/admin_images/' . $profileData->photo) : url('upload/image.jpg') }}"
                        class="user-img" alt="user avatar">
                    <div class="user-info">
                        <p class="user-name mb-0 text-center">
                            {{ strlen(Auth::guard('admin')->user()->name) > 6 ? substr(Auth::guard('admin')->user()->name, 0, 6) . '..' : Auth::guard('admin')->user()->name }}
                        </p>
                    </div>
                </a>

                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item d-flex align-items-center" href="{{ route('admin.profile') }}"><i
                                class="bx bx-user fs-5"></i><span>Profile</span></a></li>
                    <li><a class="dropdown-item d-flex align-items-center" href="{{ route('admin.password.page') }}"><i
                                class="bx bx-key fs-5"></i><span>Password</span></a></li>
                    <li>
                        <div class="dropdown-divider mb-0"></div>
                    </li>
                    <li>
                        <form action="{{ route('admin.logout') }}" method="POST" id="logout-form"
                            style="display: none;">
                            @csrf
                        </form>
                        <a href="javascript:void(0);" onclick="document.getElementById('logout-form').submit();"
                            class="dropdown-item d-flex align-items-center">
                            <i class="bx bx-log-out-circle"></i><span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>

<!-- Add JavaScript for updating the clock -->
<script>
    function updateClock() {
        const clockElement = document.getElementById('time');
        const dayElement = document.getElementById('day');

        const now = new Date();

        // Get the current day of the week
        const daysOfWeek = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
        const currentDay = daysOfWeek[now.getDay()];

        // Get the hours in 12-hour format
        let hours = now.getHours();
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');

        // Determine AM or PM
        const period = hours >= 12 ? 'PM' : 'AM';

        // Convert hours to 12-hour format
        hours = hours % 12 || 12;

        // Display the day and time
        dayElement.textContent = currentDay;
        clockElement.textContent = `${hours}:${minutes}:${seconds} ${period}`;
    }

    // Update the clock every second
    setInterval(updateClock, 1000);

    // Initial call to display the clock immediately
    updateClock();
</script>
