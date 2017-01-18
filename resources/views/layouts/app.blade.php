<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
   
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css')}}" >

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="{{ asset('/js/bootstrap.min.js')}}"></script>



    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <!-- Scripts -->
    <script src="/js/app.js"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right" id="sidebar">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li><a class="btn_task" href="{{ route('task.index')}}">My Task</a></li>
                            
                            
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
									
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        
        <div class="container">



            @yield('content')

            @if (Auth::guest())

            <p>로그인 하라규</p>

            @else
            <div class="col-sm-3">
                <ul id="sidebar" class="nav nav-pills nav-stacked">
                    <li role="presentation">
                        <a data-link="{{ route('p') }}">Project List</a>
                    </li>
                    <li role="presentation">
                        <a data-link="{{ route('c') }}">Project Create</a><a class="btn btn-default btn_create" data-link="{{ route('c') }}">Create</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
                    <div class="panel-body">You are logged in!</div>
                </div>
                <div id="screenPanel" class="t111">


                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2>My Project</h2>

                        </div>


                        @if(Session::has('message'))
                            <div class="alert alert-info">{{ Session::get('message') }}</div>
                        @endif

                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <td>No.</td>
                                    <td>Name</td>
                                    <td>Description</td>
                                    <td>Create</td>
                                    <td>Actions</td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $no=1; ?>

                                @foreach($project as $prj)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td><a href="{{--route('project.show', $prj->id) --}}">{{ $prj -> name }}</a></td>
                                        <td>{{ $prj -> description }}</td>
                                        <td>{{ $prj -> created_at }}</td>
                                        <td><a data-link="{{--route('pEdit') --}}" class="btn btn-info">Edit</a><br>
                                            <form rule="form" method="post" action="{{-- route('project.destroy', $prj->id )--}}" class="form-horizontal">
                                                {{ method_field("DELETE") }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>





                </div>
            </div>
            @endif
        </div>

        
    </div>

</body>
</html>
