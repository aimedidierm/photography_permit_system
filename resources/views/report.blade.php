<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Application list report</title>
    <style>
        .container {
            margin-left: auto;
            margin-right: auto;
            padding: 16px;
        }

        .text-2xl {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #e2e8f0;
        }

        .table th,
        .table td {
            padding: 8px;
            border: 1px solid #e2e8f0;
        }
    </style>
</head>

<body class="bg-opacity-50">
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-semibold mb-4">List of all applications</h2>

        <table class="w-full table-auto border border-collapse">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">Creation date</th>
                    <th class="px-4 py-2 border">Title</th>
                    <th class="px-4 py-2 border">Shooting date</th>
                    <th class="px-4 py-2 border">Status</th>
                    <th class="px-4 py-2 border">User</th>
                </tr>
            </thead>
            <tbody>
                @if ($data->isEmpty())
                <tr>
                    <td class="px-4 py-2 border" colspan="5">No available data</td>
                </tr>
                @else
                @foreach ($data as $application)
                <tr>
                    <td class="px-4 py-2 border">{{$application->created_at}}</td>
                    <td class="px-4 py-2 border">{{$application->title}}</td>
                    <td class="px-4 py-2 border">{{$application->shootingDate}}</td>
                    <td class="px-4 py-2 border">{{$application->status}}</td>
                    <td class="px-4 py-2 border">{{$application->user->name}}</td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</body>

</html>