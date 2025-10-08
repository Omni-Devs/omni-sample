<!DOCTYPE html>
<html>
<head>
    <title>{{ $user->name }} - Profile</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        .container { padding: 20px; }
        h1 { text-align: center; margin-bottom: 30px; }
        .info { margin-bottom: 10px; }
        .label { font-weight: bold; width: 150px; display: inline-block; }
    </style>
</head>
<body>
    <div class="container">
        <h1>User Profile</h1>
        <div class="info"><span class="label">Name:</span> {{ $user->name }}</div>
        <div class="info"><span class="label">Username:</span> {{ $user->username }}</div>
        <div class="info"><span class="label">Email:</span> {{ $user->email }}</div>
        <div class="info"><span class="label">Mobile:</span> {{ $user->mobile_number }}</div>
        <div class="info"><span class="label">Address:</span> {{ $user->address }}</div>
        <div class="info"><span class="label">Status:</span> {{ ucfirst($user->status) }}</div>

        @if($user->image)
            <div class="info">
                <span class="label">Image:</span>
                <img src="{{ public_path('storage/' . $user->image) }}" alt="Profile" width="100">
            </div>
        @endif
    </div>
</body>
</html>
