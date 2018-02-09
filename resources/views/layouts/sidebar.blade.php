        <div class="sidebar">

            <nav class="sidebar-nav">
                <ul class="nav">
                    <li class="nav-title">
                        Dashboard
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">
                            <i class="fa fa-tachometer"></i> Dashboard 
                        </a>
                    </li>

                    <li class="divider"></li>
                    <li class="nav-title">
                        Posts &amp; Articles
                    </li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-file"></i>Posts</a>

                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/posts') }}"><i></i> 
                                    All Posts
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/posts/create') }}"><i></i> Create Post</a>
                            </li>
                        </ul>
                    </li>

                    <li class="divider"></li>
                    <li class="nav-title">
                        Users &amp; Roles
                    </li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-users"></i> Users</a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/users') }}">User List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/users/create') }}">Add User</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-user"></i> Roles</a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/roles') }}">Role List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/roles/create') }}">Add Roles</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa fa-unlock"></i> Permissions
                        </a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/permissions') }}"><i class="icon-star"></i> 
                                    Permission List
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </nav>
        </div>