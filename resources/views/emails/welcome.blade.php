<!DOCTYPE html> 

<html> 

<head> 

 <title>Welcome Email</title> 

</head> 

<body> 

<h2>Welcome to the site {{$user_name}}</h2> 

<br/> 

Your registered email-id is {{$user_email}} 

<br>
<h1>this is email otp {{ $validToken }}</h1>



<a href="http://127.0.0.1:8000/otp-verification/{{$validToken}}/{{ $user_email }}/"style="color:black; text-decoration:none;">activate</a>

</body> 

</html> 