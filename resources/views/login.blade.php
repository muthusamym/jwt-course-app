<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
</head>
<body>
<h2>Login</h2>

<form id="loginForm">
    <input type="email" id="email" placeholder="Email"><br><br>
    <input type="password" id="password" placeholder="Password"><br><br>
    <button type="submit">Login</button>
</form>

<script>
document.getElementById('loginForm').onsubmit = async function(e){
    e.preventDefault();

    let res = await fetch('/api/login',{
        method:'POST',
        headers:{'Content-Type':'application/json'},
        body:JSON.stringify({
            email:email.value,
            password:password.value
        })
    });

    let data = await res.json();
    localStorage.setItem('token',data.token);
    window.location.href='/courses';
}
</script>
</body>
</html>