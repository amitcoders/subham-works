<h1>this is otp verification</h1>

<br><br>
<form action="{{route('otp.submit')}}" method="post" enctype="multipart/form-data" >
    @csrf
    <input type="text" name="token" placeholder="enter otp">
    <input type="text" name="email" value="{{ $valid->email }}">
    <input type="submit" value="submit">
</form>