<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nueva suscripción</title>
</head>
<body>
<p>Un nuevo usuario se ha suscrito al boletín, con los siguientes datos:</p>
<ul>
    <li>Nombre: {{ $subscriptor->nombre }}</li>
    <li>Correo: {{ $subscriptor->email }}</li>
</ul>
</body>
</html>
