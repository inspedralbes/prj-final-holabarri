<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Verificación de Correo Electrónico</title>
        <style>
            body {
                margin: 0;
                padding: 20px;
                background-color: #f4f4f9;
                font-family: Arial, sans-serif;
            }
            .container {
                padding: 20px;
                margin: 0 auto;
                max-width: 600px;
                border-radius: 8px;
                background-color: white;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            p{
                text-align: left;
            }
            .header {
                text-align: center;
                margin-bottom: 20px;
            }
            .header h1 {
                color: #333;
            }
            .content {
                color: #333;
                font-size: 16px;
                line-height: 1.5;
                text-align: center;
                margin-bottom: 20px;
            }
            a{
                color: white;
            }
            .button {
                color: white;
                margin: 20px auto;
                padding: 10px 20px;
                border-radius: 5px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                background-color: #29B99E;
            }
            .footer {
                color: #777;
                font-size: 12px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <h1>¡Bienvenido a PuntoLocal!</h1>
            </div>
            <div class="content">
                <p>Gracias por registrarte con nosotros. Para completar tu registro, por favor verifica tu correo electrónico haciendo clic en el siguiente botón:</p>
                <a href="{{ $verificationUrl }}" class="button">Verificar Correo Electrónico</a>
                <p>Si no has creado una cuenta con nosotros, por favor ignora este mensaje.</p>
            </div>
            <div class="footer">
                <p>&copy; {{ date('Y') }} PuntoLocal | Todos los derechos reservados.</p>
            </div>
        </div>
    </body>
</html>