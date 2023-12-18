<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Additional custom styles */
        .certificate-card {
            width: 90%;
            margin: 0 auto;
            margin-top: 100px;
        }

        .certificate-card h2 {
            font-size: 70px;
            /* Adjust the font size as needed */
        }

        .certificate-card h4 {
            font-size: 50px;
            /* Adjust the font size as needed */
        }

        .certificate-card p {
            font-size: 30px;
            /* Adjust the font size as needed */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card certificate-card">
                    <div class="card-body text-center">
                        <center>
                            <img src="{{'inteko_logo.jpg'}}" alt="" width="200" height="200">
                            <h2>Certificate of Approved</h2>
                            <p>This is to certify that</p>
                            <h4>{{Auth::user()->name}}</h4>
                            <p>request for video shooting and photography permit is approved</p>
                            <p>Shooting location {{$application->location}}</p>
                            <p>Shooting period {{$application->shootingDateStart}} up to
                                {{$application->shootingDateEnd}}</p>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>