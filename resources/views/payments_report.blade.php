<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Application payments list report</title>
</head>

<body class="bg-opacity-50">
    <div class="container mx-auto p-4">
        <img src="{{'inteko_logo.jpg'}}" alt="" width="200" height="200">
        <center>
            <h2 class="text-2xl font-semibold mb-4">List of payments applications</h2>
        </center>

        <table class="w-full table-auto border border-collapse">
            <thead>
                <tr>
                    <th style="padding: 8px; border: 1px solid #0c0c0c;">Creation date</th>
                    <th style="padding: 8px; border: 1px solid #0c0c0c;">Title</th>
                    <th style="padding: 8px; border: 1px solid #0c0c0c;">Shooting date</th>
                    <th style="padding: 8px; border: 1px solid #0c0c0c;">Status</th>
                    <th style="padding: 8px; border: 1px solid #0c0c0c;">Description</th>
                    <th style="padding: 8px; border: 1px solid #0c0c0c;">Amount</th>
                </tr>
            </thead>
            <tbody>
                @if ($data->isEmpty())
                <tr>
                    <td style="padding: 8px; border: 1px solid #0c0c0c;" colspan="6">No available data</td>
                </tr>
                @else
                @foreach ($data as $application)
                <tr>
                    <td style="padding: 8px; border: 1px solid #0c0c0c;">{{$application->created_at}}</td>
                    <td style="padding: 8px; border: 1px solid #0c0c0c;">{{$application->title}}</td>
                    <td style="padding: 8px; border: 1px solid #0c0c0c;">{{$application->shootingDateStart}} -
                        {{$application->shootingDateEnd}}</td>
                    <td style="padding: 8px; border: 1px solid #0c0c0c;">{{$application->payment->status}}</td>
                    <td style="padding: 8px; border: 1px solid #0c0c0c;">{{$application->description}}</td>
                    <td style="padding: 8px; border: 1px solid #0c0c0c;">{{$application->payment->amount}} Rwf</td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        <h2 class="text-2xl font-semibold mb-4">Total income is {{$total}} Rwf</h2>
        <h6 class="text-2xl font-semibold mb-4">Printed on: {{now()}}</h6>
        <h6 class="text-2xl font-semibold mb-4">Printed by {{Auth::user()->name}}</h6>
    </div>
</body>

</html>