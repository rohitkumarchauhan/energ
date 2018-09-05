<!DOCTYPE html>
<html>
<body>
	<p>hello Admin,</p>
	</br>
	<p>Someone sent you contact us request. Please check his/her request.</p>
	<br/>
	<table>
		<tr>
			<td>Name</td>
			<td>{{$firstname}} {{$lastname}}</td>
		</tr>
		<tr>
			<td>Email</td>
			<td>{{$email}}</td>
		</tr>
		<tr>
			<td>Telephone</td>
			<td>{{$telephone}}</td>
		</tr>
		<tr>
			<td>Topic</td>
			<td>{{$topic}}</td>
		</tr>
		<tr>
			<td>Message</td>
			<td>{{$Clientmessage}}</td>
		</tr>
	</table>
</body>
</html>