<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nuevo Comercio Registrado</title>
        <style>
            body {
                margin: 20px;
                font-family: Arial, sans-serif;
            }

            .container {
                padding: 20px;
                margin: 0 auto;
                max-width: 600px;
                border-radius: 10px;
                border: 1px solid #ddd;
            }

            h2 { color: #333; }

            p { font-size: 16px; }

            .info {
                padding: 10px;
                border-radius: 5px;
                background: #f8f8f8;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <h2>Nuevo Comercio Registrado</h2>
            <p>Se ha registrado un nuevo comercio con los siguientes detalles:</p>
            <div class="info">
                <p><strong>Nombre:</strong> {{ $comercio->nombre }}</p>
                <p><strong>Email:</strong> {{ $comercio->email }}</p>
                <p><strong>Teléfono:</strong> {{ $comercio->phone }}</p>
                <p><strong>Dirección:</strong> {{ $comercio->calle_num }}, {{ $comercio->ciudad }}, {{ $comercio->provincia }}</p>
                <p><strong>Código Postal:</strong> {{ $comercio->codigo_postal }}</p>
                <p><strong>Número de Planta:</strong> {{ $comercio->num_planta }}</p>
                <p><strong>Número de Puerta:</strong> {{ $comercio->num_puerta }}</p>
                <p><strong>Descripción:</strong> {{ $comercio->descripcion }}</p>
                <p><strong>Categoría ID:</strong> {{ $comercio->categoria_id }}</p>
                <p><strong>Gestión de Stock:</strong> {{ $comercio->gestion_stock ? 'Sí' : 'No' }}</p>
                <p><strong>Ubicación:</strong> Latitud: {{ $comercio->latitude }}, Longitud: {{ $comercio->longitude }}</p>
            </div>
        </div>
    </body>
</html>