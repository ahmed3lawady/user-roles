<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>User Role</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

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
        .full-height {height: 100vh;}
        .flex-center {align-items: center;display: flex;justify-content: center;}
        .position-ref {position: relative;}
        .content {width: 100%;text-align: center;}
        .title {font-size: 24px;}
        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
        .m-b-md {margin-bottom: 30px;}
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">User Roles</div>
        <table id="example" class="display" style="width:100%">
            <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @forelse($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->title }}</td>
                    <td><a href="{{ route('roles.edit', $role->id) }}"
                           class="btn btn-outline-info btn-icon-text btn-sm">Edit</a></td>
                    <td>
                        @if($role->id > 1)
                            <form action="{{ route('roles.destroy', $role->id) }}" method="post" class="">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="delete">
                                <button type="button" class="btn btn-outline-danger btn-sm destroyBtn">Delete</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No Items Found!</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('table').DataTable();
    });
</script>
</body>
</html>