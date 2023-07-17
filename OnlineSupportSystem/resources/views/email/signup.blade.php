<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome to Our Website</h1>
    <h4>Your Problem Details</h4>
    @foreach ($requestData as $key => $value)
    <p><strong>{{ $key }}:</strong> {{ $value }}</p>
    @endforeach
    <p>You can see the answer to your question soon</p>
    <p>Thank you  joining us!</p>
</body>
</html>
