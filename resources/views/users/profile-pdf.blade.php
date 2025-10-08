<!DOCTYPE html>
<html>
<head>
    <title>{{ $user->name }} - Profile</title>
    <style>
        @page {
            margin: 100px 40px 100px 40px;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        /* Header */
        header {
            position: fixed;
            top: -80px;
            left: 0;
            right: 0;
            height: 70px;
        }

        header img {
            height: 60px;
            width: auto;
        }

        header hr {
            border: 0;
            border-top: 2px solid #000;
            margin-top: 10px;
        }

        /* Footer */
        footer {
            position: fixed;
            bottom: -80px;
            left: 0;
            right: 0;
            height: 70px;
            text-align: center;
            font-size: 12px;
        }

        footer .signature {
            margin-top: 10px;
        }

        footer hr {
            border: 0;
            border-top: 1px solid #000;
            width: 200px;
            margin: 5px auto;
        }

        /* Content */
        main {
            margin-top: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
            font-size: 18px;
        }

        .info {
            margin-bottom: 10px;
        }

        .label {
            font-weight: bold;
            width: 150px;
            display: inline-block;
        }

        img.profile {
            border-radius: 10px;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <header>
        <img src="{{ public_path('images/logo-default.png') }}" alt="Logo">
        <hr>
    </header>

    <footer>
        <div>Main Admin</div>
        <hr>
        <div class="signature">Requested and Printed by</div>
        <div style="margin-top: 5px; font-size: 11px; color: #555;">
            Printed on {{ \Carbon\Carbon::now()->format('F d, Y h:i A') }}
        </div>
    </footer>

    <main>
        <div class="info"><span class="label">Name:</span> {{ $user->name }}</div>
        <div class="info"><span class="label">Username:</span> {{ $user->username }}</div>
        <div class="info"><span class="label">Email:</span> {{ $user->email }}</div>
        <div class="info"><span class="label">Mobile Number:</span> {{ $user->mobile_number }}</div>
        <div class="info"><span class="label">Address:</span> {{ $user->address }}</div>
        <div class="info"><span class="label">Status:</span> {{ ucfirst($user->status) }}</div>

        @if($user->image)
            <div class="info">
                <span class="label">Image:</span>
                <img class="profile" src="{{ public_path('storage/' . $user->image) }}" width="100" alt="Profile Image">
            </div>
        @endif
    </main>

</body>
</html>
