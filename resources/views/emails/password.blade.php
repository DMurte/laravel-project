<html>
<head>
    <style>
        p {
            font-size: 16px;
            color: #000;
        }
    </style>
</head>
<body>
<p>
  <center><img src="http://mircolombia.com/upload/logo.png" style="width: 100px;"></center><br><br>
    <b>Bienvenido a la red mircolombia!</b> <br><br>Puedes establecer tu contraseña aca: {{ url('admin/password/reset/'.$token) }}
</p>
</body>
</html>
