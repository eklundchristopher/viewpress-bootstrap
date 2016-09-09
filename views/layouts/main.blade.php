<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    {!! wp_head() !!}

    <!-- Favicon -->
    <link href="{{ get_template_directory_uri() }}/public/img/favicon.png" rel="icon" type="image/png">

    <!-- Stylesheets -->
    <link href="{{ get_template_directory_uri() }}/public/css/app.css" rel="stylesheet" media="all">

    <title>{{ get_the_title() }}</title>
</head>
<body>

    <nav class="navbar navbar-light navbar-full bg-viewpress">
        <div class="container">
            <a href="{{ site_url('/') }}" class="navbar-brand">
                <img src="{{ get_template_directory_uri() }}/public/img/logo.svg" id="logo">

                {{ __('ViewPress', 'viewpress-bootstrap') }}
            </a>

            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a href="{{ site_url('/') }}" class="nav-link">
                        {{ __('Home', 'viewpress-bootstrap') }}
                    </a>
                </li>
            </ul>

            <div class="pull-sm-right">
                <a href="https://github.com/eklundchristopher/viewpress" class="btn" target="_blank">
                    <span class="fa fa-github"></span>

                    {{ __('GitHub', 'viewpress-bootstrap') }}
                </a>

                <div class="btn-group">
                    @if (is_user_logged_in())
                        <a href="{{ get_author_posts_url(wp_get_current_user()->ID) }}" class="btn btn-viewpress">
                            {{ wp_get_current_user()->display_name }}
                        </a>

                        <button class="btn btn-viewpress dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"></button>

                        <div class="dropdown-menu">
                            @if (current_user_can('manage_options'))
                                <a href="{{ get_admin_url() }}" class="dropdown-item">Dashboard</a>
                            @endif
                            <a href="{{ get_edit_user_link() }}" class="dropdown-item">Settings</a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ wp_logout_url() }}" class="dropdown-item">Log Out</a>
                        </div>
                    @else
                        <a href="{{ admin_url() }}" class="btn btn-viewpress">
                            {{ __('Sign In', 'viewpress-bootstrap') }}
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <br>
    <br>

    <div class="container">
        <div class="row">
            <div class="{{ is_active_sidebar('sidebar-default') ? 'col-md-9' : 'col-md-12' }}">
                @yield('content')
            </div>

            @if (is_active_sidebar('sidebar-default'))
                <div class="col-md-3">
                    <?php dynamic_sidebar('sidebar-default'); ?>
                </div>
            @endif
        </div>
    </div>

    <br>
    <br>
    <br>


    <!-- Scripts -->
    <script src="{{ get_template_directory_uri() }}/public/js/app.js"></script>


    {!! wp_footer() !!}

</body>
</html>
