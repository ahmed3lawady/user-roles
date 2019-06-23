<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Role</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .content {
            width: 100%;
            text-align: center;
        }

        .title {
            font-size: 24px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">User Roles</div>
        <div class="container">
            <form method="post" action="{{ route('roles.store') }}">
                <div class="row">
                    <div class="col-md-8">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{trans('roles.actions.action')}}</th>
                                <th>None</th>
                                <th>Read Only</th>
                                <th>Read & Write</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($routeActions as $name)
                                <tr>
                                    <td>{{ str_replace(['controller', '_'], ' ', snake_case($name)) }}</td>
                                    <td><input type="radio" name="roles[{{$name}}]" value="none" @if(!isset($role) || !key_exists($name, $role->roles) || $role->roles->{$name} == 'none') checked="checked" @endif @if($name == 'RoleController' && isset($role) && $role->id == 1) disabled="disabled" @endif></td>
                                    <td><input type="radio" name="roles[{{$name}}]" value="read" @if(isset($role) && key_exists($name, $role->roles) && $role->roles->{$name} == 'read') checked="checked" @endif @if($name == 'RoleController' && isset($role) && $role->id == 1) disabled="disabled" @endif></td>
                                    <td><input type="radio" name="roles[{{$name}}]" value="read-write" @if((isset($role) && key_exists($name, $role->roles) && $role->roles->{$name} == 'read-write') || (isset($role) && $name == 'RoleController' && $role->id == 1)) checked="checked" @endif></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <button type="submit" class="bnt btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>