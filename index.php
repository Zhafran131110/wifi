<!DOCTYPE html>
<html>
<head>
  <title>Ambil Voucher</title>
</head>
<body>

<h2>Mengambil Voucher...</h2>

<script>
fetch("ambil.php")
.then(res => res.json())
.then(data => {
    let user = data.username;
    let pass = data.password;

    // auto login ke mikrotik
    let form = document.createElement("form");
    form.method = "POST";
    form.action = "http://10.10.10.1/login";

    let u = document.createElement("input");
    u.name = "username";
    u.value = user;

    let p = document.createElement("input");
    p.name = "password";
    p.value = pass;

    form.appendChild(u);
    form.appendChild(p);

    document.body.appendChild(form);
    form.submit();
});
</script>

</body>
</html>
