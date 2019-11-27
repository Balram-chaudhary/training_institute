<!DOCTYPE html>
<html lang="en">
<head>

<title>Table information </title>
<style type="text/css">

.container{
	margin:20px 0px 0px 175px;
}
</style>

</head>
<body>
<div class="container">
<label>
	FirstName:{{$maildata['fullname']}}
</label><span></span><br><br>

<label>
	Email:{{$maildata['email']}}
</label><span></span><br><br>
<label>
	Phone:{{$maildata['phone']}}
</label><span></span>
<br><br>
<label>
	Course:{{$maildata['courses']}}
</label><span></span>
<br><br>
<label>
	Message:{{$maildata['message']}}
</label><span></span>
<br><br>





</body>


</html>