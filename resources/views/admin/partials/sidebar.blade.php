<div class="sidebar-wrapper" data-simplebar="true">

    <div class="sidebar-header">
        <div>
            <img src="" class="logo-icon" alt="">
        </div>
        <div>
            <h4 class="logo-text">Template</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
    </div>

    @php
        $id = Auth::guard('admin')->user()->id;
        $data = App\Models\Admin::find($id);
        $status = $data->status;
    @endphp

    @if ($status == 'active')
        <!--navigation-->
        <ul class="metismenu" id="menu">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <div class="parent-icon"><i class='bx bx-home-alt'></i></div>
                    <div class="menu-title">Dashboard</div>
                </a>
            </li>

            {{-- Frontend Section --}}
            {{-- @if (Auth::guard('admin')->user()->can('role.menu')) --}}
            <li class="menu-label">Frontend Section</li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                    </div>
                    <div class="menu-title">Frontend Section</div>
                </a>
                <ul>
                    {{-- @if (Auth::guard('admin')->user()->can('all.role')) --}}
                    <li> <a href="{{ route('admin.banner.index') }}"><i class='bx bx-radio-circle'></i>Banner</a>
                    </li>
                    {{-- @endif --}}

                    {{-- @if (Auth::guard('admin')->user()->can('all.role')) --}}
                    <li> <a href="{{ route('admin.project.index') }}"><i class='bx bx-radio-circle'></i>Project</a>
                    </li>
                    {{-- @endif --}}


                    {{-- @if (Auth::guard('admin')->user()->can('all.role')) --}}
                    <li> <a href="{{ route('admin.about.index') }}"><i class='bx bx-radio-circle'></i>About</a>
                    </li>
                    {{-- @endif --}}

                    {{-- @if (Auth::guard('admin')->user()->can('all.role')) --}}
                    <li> <a href="{{ route('admin.team.index') }}"><i class='bx bx-radio-circle'></i>Team</a>
                    </li>
                    {{-- @endif --}}

                    {{-- @if (Auth::guard('admin')->user()->can('all.role')) --}}
                    <li> <a href="{{ route('admin.testimonial.index') }}"><i
                                class='bx bx-radio-circle'></i>Testimonial</a>
                    </li>
                    {{-- @endif --}}

                    {{-- @if (Auth::guard('admin')->user()->can('all.role')) --}}
                    <li> <a href="{{ route('admin.contact.index') }}"><i class='bx bx-radio-circle'></i>Contact</a>
                    </li>
                    {{-- @endif --}}

                </ul>
            </li>
            {{-- @endif --}}
            {{-- Frontend Section --}}

            {{-- Other Section --}}
            
            <li>
                <a href="{{ route('admin.settings.index') }}">
                    <div class="parent-icon"><i class="bx bx-message-square-edit"></i>
                    </div>
                    <div class="menu-title">Setting</div>
                </a>
            </li>
            {{-- Other Section --}}

            {{-- Management Section --}}
            <li class="menu-label">Management Section</li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                    </div>
                    <div class="menu-title">Management</div>
                </a>
                <ul>

                    {{-- @if (Auth::guard('admin')->user()->can('all.role')) --}}
                    <li> <a href="{{ route('all.admin.permission') }}"><i class='bx bx-radio-circle'></i>Admin</a>
                    </li>
                    {{-- @endif --}}

                    {{-- @if (Auth::guard('admin')->user()->can('all.role')) --}}
                    {{-- <li> <a href="{{ route('all.permission') }}"><i class='bx bx-radio-circle'></i>About</a>
            </li> --}}
                    {{-- @endif --}}

                </ul>
            </li>
            {{-- Management Section --}}

            

            {{-- Hr & Admin Section  --}}
            {{-- @if (Auth::guard('admin')->user()->can('role.menu')) --}}
            {{-- <li class="menu-label">Hr & Admin Section</li> --}}
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                    </div>
                    <div class="menu-title">Hr Section</div>
                </a>
                <ul>
                    {{-- @if (Auth::guard('admin')->user()->can('all.role')) --}}
                    <li> <a href="{{ route('admin.employee.index') }}"><i class='bx bx-radio-circle'></i>Employee</a>
                    </li>
                    {{-- @endif --}}

                    {{-- @if (Auth::guard('admin')->user()->can('all.role')) --}}
                    <li> <a href="{{ route('admin.message.index') }}"><i class='bx bx-radio-circle'></i>Message</a>
                    </li>
                    {{-- @endif --}}

                </ul>
            </li>
            {{-- @endif --}}

            {{-- Hr & Admin Section  --}}

            

            {{-- Role & Permission  --}}
            {{-- @if (Auth::guard('admin')->user()->can('role.menu')) --}}
            <li class="menu-label">Role & Permission</li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                    </div>
                    <div class="menu-title">Role & Permission</div>
                </a>
                <ul>
                    {{-- @if (Auth::guard('admin')->user()->can('all.role')) --}}
                    <li> <a href="{{ route('all.role') }}"><i class='bx bx-radio-circle'></i>All Role</a>
                    </li>
                    {{-- @endif --}}
                    {{-- @if (Auth::guard('admin')->user()->can('all.role')) --}}
                    <li> <a href="{{ route('all.permission') }}"><i class='bx bx-radio-circle'></i>All
                            Permission</a>
                    </li>
                    {{-- @endif --}}
                </ul>
            </li>
            {{-- @endif --}}

            {{-- Role & Permission  --}}


            

        </ul>
        <!--end navigation-->
    @else
    @endif

</div>
