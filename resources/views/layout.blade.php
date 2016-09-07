<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {!! wp_head() !!}

    <!-- Favicon -->
    <link href="{{ get_template_directory_uri() }}/public/img/favicon.png" rel="icon" type="image/png">

    <!-- Stylesheets -->
    <link href="{{ get_template_directory_uri() }}/public/css/app.css" rel="stylesheet" media="all">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <div class="container">
                        <h1>
                            <a href="{{ site_url('/') }}">{{ __('ViewPress', 'viewpress-bootstrap') }}</a>
                        </h1>
                        <p>{{ __('A way to structure your themes logically.', 'viewpress-bootstrap') }}</p>
                    </div>
                </div>
            </div>
        </div>

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


    {!! wp_footer() !!}

</body>
</html>
