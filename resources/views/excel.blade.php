<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Table</title>
</head>
<body>
    <div
        class="table-responsive"
    >
        <table
            class="table table-primary"
        >
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">email</th>
                    <th scope="col">Password</th>
                </tr>
            </thead>
            <tbody>
                @if($users->isNotEmpty())
                @foreach ($users as $user)

                <tr class="">
                    <td scope="row">{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->password }}</td>
                </tr>

                @endforeach
                @else
                <tr>
                    <td colspan="3">No record Found</td>
                </tr>
                @endif

            </tbody>
        </table>
    </div>

</body>
</html>
