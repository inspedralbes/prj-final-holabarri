<!-- PRODUCTOS -->

# API de Producto

## Descripción:

Esta API permite gestionar productos en un sistema de comercio, incluyendo la creación, actualización, eliminación y obtención de productos.

---

## Autenticación:

- **Método de autenticación:** Bearer Token (utilizando Sanctum).
- **Cabecera:** `Authorization: Bearer <token>`

---

## Endpoints

### 1. Obtener todos los productos

- **URL:** `/api/producto`
- **Método:** `GET`
- **Descripción:** Obtiene una lista de todos los productos.
- **Parámetros:** Ninguno.
- **Respuesta:**

  - **Código de estado 200 OK**:

    ```json
    {
        "data": [
            {
                "id": 1,
                "nombre": "Producto 1",
                "descripcion": "Descripción del producto 1",
                "subcategoria_id": 1,
                "subcategoria": "Subcategoría 1",
                "comercio_id": 1,
                "comercio": "Comercio 1",
                "precio": 100.00,
                "stock": 10
            },
            ...
        ]
    }
    ```

  - **Código de estado 404 Not Found** (Si no hay productos):
    ```json
    {
      "message": "No hay productos"
    }
    ```

---

### 2. Obtener todos los productos de un comercio específico

- **URL:** `/api/producto/comercio/{comercioID}`
- **Método:** `GET`
- **Descripción:** Obtiene una lista de todos los productos del comercio.
- **Parámetros:** Ninguno.
- **Respuesta:**

  - **Código de estado 200 OK**:

    ```json
    {
        "data": [
            {
                "id": 1,
                "nombre": "Producto 1",
                "descripcion": "Descripción del producto 1",
                "subcategoria_id": 1,
                "subcategoria": "Subcategoría 1",
                "comercio_id": 1,
                "comercio": "Comercio 1",
                "precio": 100.00,
                "stock": 10
            },
            ...
        ]
    }
    ```

  - **Código de estado 404 Not Found** (Si no hay productos):
    ```json
    {
      "message": "No hay productos"
    }
    ```

---

### 3. Crear un nuevo producto

- **URL:** `/api/producto`
- **Método:** `POST`
- **Descripción:** Crea un nuevo producto.
- **Parámetros (Cuerpo de la solicitud):**

  - `nombre`: (string, requerido) Nombre del producto.
  - `descripcion`: (string, requerido) Descripción del producto.
  - `precio`: (float, requerido) Precio del producto.
  - `subcategoria_id`: (int, requerido) ID de la subcategoría a la que pertenece el producto.
  - `comercio_id`: (int, requerido) ID del comercio donde se encuentra el producto.
  - `stock`: (int) Stock que tiene disponible en el momento de la creación del producto.

  **Ejemplo de cuerpo de la solicitud:**

  ```json
  {
    "nombre": "Producto 1",
    "descripcion": "Descripción del producto 1",
    "precio": 100.0,
    "subcategoria_id": 1,
    "comercio_id": 1,
    "stock": 10
  }
  ```

- **Respuesta:**

  - **Código de estado 200 OK**:

    ```json
    {
      "message": "Producto creado con éxito",
      "data": {
        "id": 1,
        "nombre": "Producto 1",
        "descripcion": "Descripción del producto 1",
        "subcategoria": "Subcategoría 1",
        "comercio": "Comercio 1",
        "precio": 100.0,
        "stock": 10
      }
    }
    ```

  - **Código de estado 400 Bad Request** (Si no hay productos):
    ```json
    {
      "error": "Validación fallida",
      "details": {
        "nombre": "El nombre es obligatorio",
        "precio": "El precio debe ser un número positivo"
      }
    }
    ```

---

### 4. Obtener un producto específico

- **URL:** `/api/producto/{id}`
- **Método:** `GET`
- **Descripción:** Obtiene los detalles de un producto específico.
- **Parámetros:**
  - `id`: (int, requerido) ID del producto.
- **Respuesta:**

  - **Código de estado 200 OK**:

    ```json
    {
      "nombre": "Mesa de comedor",
      "descripcion": "Mesa de comedor de madera maciza, con un diseño elegante y sencillo que encaja perfectamente en cualquier estilo de decoración, ideal para reuniones familiares.",
      "subcategoria_id": 7,
      "subcategoria": "Lencería",
      "comercio_id": 10,
      "comercio": "Hagenes-Zemlak",
      "precio": 628.48,
      "stock": null
    }
    ```

  - **Código de estado 404 Not Found** (Si el producto no existe):
    ```json
    {
      "message": "Producto no encontrado"
    }
    ```

---

### 5. Actualizar un producto

- **URL:** `/api/producto/{id}`
- **Método:** `PUT`
- **Descripción:** Actualiza un producto específico.
- **Parámetros (Cuerpo de la solicitud):**

  - `nombre`: (string, requerido) Nombre del producto.
  - `descripcion`: (string, requerido) Descripción del producto.
  - `precio`: (float, requerido) Precio del producto.
  - `subcategoria_id`: (int, requerido) ID de la subcategoría a la que pertenece el producto.
  - `comercio_id`: (int, requerido) ID del comercio donde se encuentra el producto.

  **Ejemplo de cuerpo de la solicitud:**

  ```json
  {
    "nombre": "Test nombre cambio",
    "descripcion": "Test descripcion",
    "precio": 99.99,
    "subcategoria_id": 1,
    "comercio_id": 1,
    "stock": 10
  }
  ```

- **Respuesta:**

  - **Código de estado 200 OK**:

    ```json
    {
      "message": "Producto actualizado con éxito",
      "data": {
        "id": 30,
        "subcategoria_id": 1,
        "comercio_id": 1,
        "nombre": "Test nombre cambio",
        "descripcion": "Test descripcion",
        "precio": 99.99,
        "stock": 10,
        "imagenes": null
      }
    }
    ```

  - **Código de estado 404 Not Found** (Si el producto no existe):
    ```json
    {
      "message": "Producto no encontrado"
    }
    ```

---

### 6. Eliminar un producto

- **URL:** `/api/producto/{id}`
- **Método:** `DELETE`
- **Descripción:** Elimina un producto específico de la base de datos.
- **Parámetros (en la URL):**

  - `id`: (int, requerido) El ID del producto que se desea eliminar.

- **Respuesta:**

  - **Código de estado 200 OK** (Producto eliminado con éxito):
    ```json
    {
      "message": "Producto eliminado con éxito"
    }
    ```
  - **Código de estado 404 Not Found** (Si el producto no se encuentra):

    ```json
    {
      "message": "Producto no encontrado"
    }
    ```

  - **Código de estado 500 Internal Server Error** (Si ocurre un error al intentar eliminar el producto):
    ```json
    {
      "error": "Producto no eliminado",
      "details": "Mensaje del error específico"
    }
    ```

  ***

  ### 7. Buscar productos por un nombre

- **URL:** `/api/producto/search/{search}`
- **Método:** `PUT`
- **Descripción:** Te permite obtener los productos que en su nombre o descripción coincida con el contenido de search.
- **Parámetros (Cuerpo de la solicitud):**

  - `search`: (string, requerido) Nombre del producto que se desea buscar.

- **Respuesta:**

  - **Código de estado 200 OK**:

    ```json
    [
      {
        "id": 4,
        "nombre": "Juego de mesa para niños",
        "descripcion": "Juego de mesa para niños con piezas grandes y coloridas, ideal para fomentar la creatividad y el trabajo en equipo mientras se divierten.",
        "subcategoria_id": 48,
        "subcategoria": "Juegos de Construcción",
        "comercio_id": 2,
        "comercio": "Glover LLC",
        "precio": 310.39,
        "stock": null,
        "imagen": null
      },
      {
        "id": 29,
        "nombre": "Juego de pesas",
        "descripcion": "Juego de pesas de diferentes tamaños, con un diseño compacto y fácil de almacenar, perfectas para mejorar tu fuerza y resistencia en casa.",
        "subcategoria_id": 35,
        "subcategoria": "Jugos y Extractos Naturales",
        "comercio_id": 1,
        "comercio": "Lesch and Sons",
        "precio": 913.57,
        "stock": null,
        "imagen": null
      }
    ]
    ```

  - **Código de estado 200 OK** (Si no hay ningun producto que coincida con el search):

    ```json
    {
      "message": "No hay productos que coincidan con tu búsqueda"
    }
    ```

  - **Código de estado 400 Not Found** (Si search esta vacio):
    ```json
    {
      "message": "El término de búsqueda no puede estar vacío"
    }
    ```

---

<!-- AUTH -->

# API de Auth

## Descripción:

Esta API permite gestionar que los clientes se puedan registrar y loguear.

---

## Autenticación:

- **Método de autenticación:** Bearer Token (utilizando Sanctum).
- **Cabecera:** `Authorization: Bearer <token>`

---

## Endpoints

### 1. Registrarse

- **URL:** `/api/auth/register`
- **Método:** `POST`
- **Descripción:** Registra el usuario.
- **Parámetros:** .
  ```json
  {
    "name": "Arnau",
    "apellidos": "Enzo",
    "email": "arnau@gmail.com",
    "password": "12345678",
    "password_confirmation": "12345678"
  }
  ```
- **Respuesta:**

  - **Código de estado 200 OK**:

    ```json
    {
      "message": "Cliente creado exitosamente. Por favor, verifica tu correo electrónico.",
      "cliente": {
        "name": "Arnau",
        "apellidos": "Enzo",
        "email": "arnau@gmail.com",
        "phone": null,
        "street_address": "",
        "ciudad": "",
        "provincia": "",
        "codigo_postal": null,
        "numero_planta": null,
        "numero_puerta": null,
        "updated_at": "2025-01-27T10:42:52.000000Z",
        "created_at": "2025-01-27T10:42:52.000000Z",
        "id": 13
      }
    }
    ```

  - **Código de estado 422**:
    ```json
    {
      "message": "error"
    }
    ```

---

### 2. Login

- **URL:** `/api/auth/login`
- **Método:** `POST`
- **Descripción:** Permite logearse al usuario.
- **Parámetros:**
  ```json
  {
    "email": "lorenzo@gmail.com",
    "password": "12345678"
  }
  ```
- **Respuesta:**

  - **Código de estado 200 OK**:

    ```json
    {
      "message": "Inicio de sesión exitoso.",
      "user": {
        "id": 12,
        "name": "Lorenzo",
        "apellidos": "Moll",
        "email": "lorenzo@gmail.com",
        "email_verified_at": null,
        "phone": "603397347",
        "phone_verified_at": null,
        "street_address": "Carrer Confiança 32",
        "ciudad": "Ciutadella",
        "provincia": "Menorca",
        "codigo_postal": 7760,
        "numero_planta": 1,
        "numero_puerta": 1,
        "puntos": null,
        "created_at": null,
        "updated_at": null
      },
      "token": "2|QrNkofujnS2qH10oa9KTTmWwYgYMMdyDSYOfpJBK921c2e49"
    }
    ```

  - **Código de estado 404 Not Found** (Si no esta registrado):

    ```json
    {
      "message": "Cliente no encontrado"
    }
    ```

  - **Código de estado 401** (Si el password es incorrecto):
    ```json
    {
      "message": "Credenciales incorrectas"
    }
    `
    ```

---

### 3. Logout

- **URL:** `/api/auth/logout`
- **Método:** `POST`
- **Descripción:** Permite deslogearse al usuario.
- **Parámetros:**
- **Respuesta:**

  - **Código de estado 200 OK**:

    ```json
    {
      "message": "Sesión cerrada exitosamente."
    }
    ```

---

### 4. Change Password

- **URL:** `/api/auth/change-password`
- **Método:** `POST`
- **Descripción:** Permite cambiar el password al usuario.
- **Parámetros:**
  ```json
  {
    "currentPassword": "12345678",
    "newPassword": "123456789",
    "confirmPassword": "123456789"
  }
  ```
- **Respuesta:**

  - **Código de estado 200 OK**:

    ```json
    {
      "message": "Contraseña cambiada exitosamente."
    }
    ```

  - **Código de estado 404 Not Found** (Si no esta registrado):

    ```json
    {
      "message": "Contraseña actual incorrecta."
    }
    ```

  - **Código de estado 422** (Si los datos recibidos son incorrectos):
    ```json
    {
      "message": "error"
    }
    `
    ```

---

<!-- COMERCIOS -->

# API de Comercios

## Descripción:

Esta API permite gestionar el registro de los comercios y obtener los datos de los comercios registrados.

---

## Autenticación:

- **Método de autenticación:** Bearer Token (utilizando Sanctum).
- **Cabecera:** `Authorization: Bearer <token>`

---

## Endpoints

### 1. Registrar Comercio

- **URL:** `/api/comercios`
- **Método:** `POST`
- **Descripción:** Registra el comercio.
- **Parámetros:** .
  ```json
  {
    "nombre": "Test",
    "email": "test@test.com",
    "phone": "12345678",
    "street_address": "C/ Falsa, 123",
    "ciudad": "Barcelona",
    "provincia": "Barcelona",
    "codigo_postal": 28,
    "num_planta": "1",
    "num_puerta": "19",
    "descripcion": "aDASDASFD",
    "categoria": 12,
    "idUser": 12,
    "gestion_stock": "1",
    "numero_planta": null,
    "numero_puerta": null
  }
  ```
- **Respuesta:**

  - **Código de estado 200 OK**:

    ```json
    {
      "nombre": "Test",
      "idUser": 12,
      "email": "test@test.com",
      "phone": "12345678",
      "calle_num": "C/ Falsa, 123",
      "ciudad": "Barcelona",
      "provincia": "Barcelona",
      "codigo_postal": 28,
      "num_planta": null,
      "num_puerta": null,
      "categoria_id": 12,
      "descripcion": "aDASDASFD",
      "gestion_stock": "1",
      "puntaje_medio": 0,
      "updated_at": "2025-01-27T11:42:25.000000Z",
      "created_at": "2025-01-27T11:42:25.000000Z",
      "id": 11
    }
    ```

  - **Código de estado 422**:
    ```json
    {
      "message": "error"
    }
    ```

---

### 2. Obtener comercio por id

- **URL:** `/api/comercios/{id}`
- **Método:** `GET`
- **Descripción:** Permite obtener la información de un comercio por su id.
- **Parámetros:**
  - `id`: (int, requerido) El ID del cliente que se desea obtener.
- **Respuesta:**

  - **Código de estado 200 OK**:

    ```json
    {
      "id": 1,
      "nombre": "Bradtke, Dare and Leuschke",
      "idUser": 10,
      "email": "iliana12@farrell.com",
      "email_verified_at": null,
      "phone": "603689215",
      "phone_verified_at": null,
      "calle_num": "5971 Herzog Motorway",
      "ciudad": "Castelldefels",
      "provincia": "Barcelona",
      "codigo_postal": "08860",
      "categoria_id": 1,
      "num_planta": 5,
      "num_puerta": 4,
      "descripcion": "Commodi odit corrupti quos est. Velit ut ut incidunt ipsa provident dicta. Est quae ea ut. Cupiditate iste nobis optio sequi similique numquam.",
      "gestion_stock": 1,
      "puntaje_medio": 4.6,
      "imagenes": "[\"https://via.placeholder.com/640x480.png/008855?text=debitis\"]",
      "horario": "{\"lunes\": \"09:00 - 18:00\", \"jueves\": \"09:00 - 18:00\", \"martes\": \"09:00 - 18:00\", \"domingo\": \"Cerrado\", \"sábado\": \"10:00 - 14:00\", \"viernes\": \"09:00 - 18:00\", \"miércoles\": \"09:00 - 18:00\"}",
      "created_at": null,
      "updated_at": null
    }
    ```

  - **Código de estado 404 Not Found** (Si no esta registrado):

    ```json
    {
      "message": "Comercio no encontrado"
    }
    ```

---

### 3. Obtener comercios

- **URL:** `/api/comercios`
- **Método:** `GET`
- **Descripción:** Permite obtener la información de los comercios.
- **Parámetros:** Ninguno.
- **Respuesta:**

  - **Código de estado 200 OK**:

    ```json
    {
      "id": 1,
      "nombre": "Bradtke, Dare and Leuschke",
      "idUser": 10,
      "email": "iliana12@farrell.com",
      "email_verified_at": null,
      "phone": "603689215",
      "phone_verified_at": null,
      "calle_num": "5971 Herzog Motorway",
      "ciudad": "Castelldefels",
      "provincia": "Barcelona",
      "codigo_postal": "08860",
      "categoria_id": 1,
      "num_planta": 5,
      "num_puerta": 4,
      "descripcion": "Commodi odit corrupti quos est. Velit ut ut incidunt ipsa provident dicta. Est quae ea ut. Cupiditate iste nobis optio sequi similique numquam.",
      "gestion_stock": 1,
      "puntaje_medio": 4.6,
      "imagenes": "[\"https://via.placeholder.com/640x480.png/008855?text=debitis\"]",
      "horario": "{\"lunes\": \"09:00 - 18:00\", \"jueves\": \"09:00 - 18:00\", \"martes\": \"09:00 - 18:00\", \"domingo\": \"Cerrado\", \"sábado\": \"10:00 - 14:00\", \"viernes\": \"09:00 - 18:00\", \"miércoles\": \"09:00 - 18:00\"}",
      "created_at": null,
      "updated_at": null
    }
    ```

---

### 4. Check que un usuario tenga un comercio

- **URL:** `/api/comercios/checkUserHasComercio`
- **Método:** `GET`
- **Descripción:** Permite chequear que el usuario tenga un comercio
- **Parámetros:** Ninguno.
- **Respuesta:**

  - **Código de estado 200 OK**:

    ```json
    {
      "id": 1,
      "nombre": "Bradtke, Dare and Leuschke",
      "idUser": 10,
      "email": "iliana12@farrell.com",
      "email_verified_at": null,
      "phone": "603689215",
      "phone_verified_at": null,
      "calle_num": "5971 Herzog Motorway",
      "ciudad": "Castelldefels",
      "provincia": "Barcelona",
      "codigo_postal": "08860",
      "categoria_id": 1,
      "num_planta": 5,
      "num_puerta": 4,
      "descripcion": "Commodi odit corrupti quos est. Velit ut ut incidunt ipsa provident dicta. Est quae ea ut. Cupiditate iste nobis optio sequi similique numquam.",
      "gestion_stock": 1,
      "puntaje_medio": 4.6,
      "imagenes": "[\"https://via.placeholder.com/640x480.png/008855?text=debitis\"]",
      "horario": "{\"lunes\": \"09:00 - 18:00\", \"jueves\": \"09:00 - 18:00\", \"martes\": \"09:00 - 18:00\", \"domingo\": \"Cerrado\", \"sábado\": \"10:00 - 14:00\", \"viernes\": \"09:00 - 18:00\", \"miércoles\": \"09:00 - 18:00\"}",
      "created_at": null,
      "updated_at": null
    }
    ```

---

### 5. Actualizar los datos de un comercio

- **URL:** `/api/comercios/{id}`
- **Método:** `PUT`
- **Descripción:** Permite actualizar los datos de un comercio
- **Parámetros:**
  - `id`: (int, requerido) El ID del comercio que se desea modificar.
  - `dataComercio` : (object, requerido) El objeto con la nueva información del comercio.
- **Respuesta:**

  - **Código de estado 200 OK**:

    ```json
    {
      "message": "Comerç actualitzat exitosament.",
      "comercio": {
        "id": 12,
        "nombre": "Test",
        "idUser": 12,
        "email": "test@test.com",
        "email_verified_at": null,
        "phone": "12345678",
        "phone_verified_at": null,
        "calle_num": "C/ Falsa, 123",
        "ciudad": "Ciutadella",
        "provincia": "Menorca",
        "codigo_postal": "7760",
        "categoria_id": 4,
        "num_planta": 1,
        "num_puerta": 4,
        "descripcion": "sadasda.",
        "gestion_stock": 1,
        "puntaje_medio": 0,
        "imagenes": [
          "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAP4AAAD+CAIAAACV9C8GAACAAElEQVR4nOy9B5xdZZk/ft5y+u0zd....."
        ],
        "horario": null,
        "created_at": "2025-02-05T08:18:33.000000Z",
        "updated_at": "2025-02-05T08:22:41.000000Z"
      }
    }
    ```

  - **Código de estado 404 Not Found** (Si no esta registrado):

    ```json
    {
      "message": "Comerç no trobat"
    }
    ```

  - **Código de estado 422 Not Found** :

    ```json
    {
      "message": "Camp invàlid."
    }
    ```

---

### 6. Actualiza la imagen del comercio

- **URL:** `/api/comercios/{id}/imagenes`
- **Método:** `POST`
- **Descripción:** Permite actualizar la imagen de un comercio.
- **Parámetros:**
  - `id`: (int, requerido) El ID del comercio que se desea modificar.
  - `formData`: (Object, requerido) Contiene la imagen selecionada por el usuario.
- **Respuesta:**

  - **Código de estado 200 OK**:

    ```json
    {
      "message": "Imatges actualitzades exitosament.",
      "comercio": {
        "id": 12,
        "nombre": "Test",
        "idUser": 12,
        "email": "test@test.com",
        "email_verified_at": null,
        "phone": "12345678",
        "phone_verified_at": null,
        "calle_num": "C/ Falsa, 123",
        "ciudad": "Ciutadella",
        "provincia": "Menorca",
        "codigo_postal": "7760",
        "categoria_id": 4,
        "num_planta": 1,
        "num_puerta": 4,
        "descripcion": "sadasda.",
        "gestion_stock": 1,
        "puntaje_medio": 0,
        "imagenes": "[\"comercios\\/dUXevKV6iftcdDBxPrJ8U3JzSywfgQAA0VoN3rHQ.png\"]",
        "horario": null,
        "created_at": "2025-02-05T08:18:33.000000Z",
        "updated_at": "2025-02-05T08:22:41.000000Z"
      }
    }
    ```

  - **Código de estado 404 Not Found** (Si no esta registrado):

    ```json
    {
      "message": "Comerç no trobat"
    }
    ```

  - **Código de estado 422 Not Found** :

    ```json
    {
      "message": "Camp invàlid."
    }
    ```

---

### 7. Eliminar imagen de un comercio

- **URL:** `/api/comercios/{id}/imagenes`
- **Método:** `DELETE`
- **Descripción:** Permite eliminar la imagen de un comercio.
- **Parámetros:**
  - `id`: (int, requerido) El ID del comercio que se desea obtener.
- **Respuesta:**

  - **Código de estado 200 OK**:

    ```json
    {
      "message": "Imatge eliminada correctament.",
      "comercio": {
        "id": 12,
        "nombre": "Test",
        "idUser": 12,
        "email": "test@test.com",
        "email_verified_at": null,
        "phone": "12345678",
        "phone_verified_at": null,
        "calle_num": "C/ Falsa, 123",
        "ciudad": "Ciutadella",
        "provincia": "Menorca",
        "codigo_postal": "7760",
        "categoria_id": 4,
        "num_planta": 1,
        "num_puerta": 4,
        "descripcion": "sadasda.",
        "gestion_stock": 1,
        "puntaje_medio": 0,
        "imagenes": "[]",
        "horario": null,
        "created_at": "2025-02-05T08:18:33.000000Z",
        "updated_at": "2025-02-05T08:49:05.000000Z"
      }
    }
    ```

  - **Código de estado 404 Not Found** (Si no esta registrado):

    ```json
    {
      "message": "Comerç no trobat"
    }
    ```

  - **Código de estado 422 Not Found** :

    ```json
    {
      "message": "No s'ha proporcionat la imatge a eliminar"
    }
    ```

  - **Código de estado 404 Not Found** (Si no esta la imagen):

    ```json
    {
      "message": "La imatge no s'ha trobat"
    }
    ```

---

### 8. Buscar comercios por un nombre

- **URL:** `/api/comercios/search/{search}`
- **Método:** `PUT`
- **Descripción:** Te permite obtener los comercios que su nombre coincida con el contenido de search.
- **Parámetros (Cuerpo de la solicitud):**

  - `search`: (string, requerido) Nombre del comercio que se desea buscar.

- **Respuesta:**

  - **Código de estado 200 OK**:

    ```json
    [
      {
        "id": 2,
        "nombre": "Glover LLC",
        "categoria_id": 9,
        "puntaje_medio": 1.9,
        "imagenes": "[\"https://img.freepik.com/foto-gratis/logistica-transporte-buques-carga-contenedores-aviones-carga-puente-grua-funcionamiento-astillero-al-amanecer-antecedentes-logisticos-industria-importacion-exportacion-transporte-ai-generativo_123827-24177.jpg\"]",
        "horario": "{\"lunes\": \"09:00 - 18:00\", \"jueves\": \"09:00 - 18:00\", \"martes\": \"09:00 - 18:00\", \"domingo\": \"Cerrado\", \"sábado\": \"10:00 - 14:00\", \"viernes\": \"09:00 - 18:00\", \"miércoles\": \"09:00 - 18:00\"}"
      }
    ]
    ```

  - **Código de estado 200 OK** (Si no hay ningun comercio que coincida con el search):

    ```json
    {
      "message": "No hay comercios que coincidan con tu búsqueda"
    }
    ```

  - **Código de estado 400 Not Found** (Si search esta vacio):
    ```json
    {
      "message": "El término de búsqueda no puede estar vacío"
    }
    ```

---

<!-- CATEGORIAS -->

# API de Categorias

## Descripción:

Esta API permite gestionar las categorias.

---

## Autenticación:

- **Método de autenticación:** Bearer Token (utilizando Sanctum).
- **Cabecera:** `Authorization: Bearer <token>`

---

## Endpoints

### 1. Obtener categorias

- **URL:** `/api/categorias`
- **Método:** `GET`
- **Descripción:** Obtiene todas las categorias.
- **Parámetros:** Ninguno.
- **Respuesta:**

  - **Código de estado 200 OK**:

    ```json
    [
      {
        "id": 1,
        "name": "Indumentaria"
      },
      {
        "id": 2,
        "name": "Tecnología"
      },
      {
        "id": 3,
        "name": "Hogar y Decoración"
      },
      {
        "id": 4,
        "name": "Salud y Belleza"
      },
      "..."
    ]
    ```

---

<!-- CLIENTES -->

# API de Clientes

## Descripción:

Esta API permite gestionar los clientes.

---

## Autenticación:

- **Método de autenticación:** Bearer Token (utilizando Sanctum).
- **Cabecera:** `Authorization: Bearer <token>`

---

## Endpoints

### 1. Obtener cliente por id

- **URL:** `/api/cliente/{id}`
- **Método:** `GET`
- **Descripción:** Permite obtener la información de un cliente por su id.
- **Parámetros:**
  - `id`: (int, requerido) El ID del cliente que se desea obtener.
- **Respuesta:**

  - **Código de estado 200 OK**:

    ```json
    {
      "message": "El usuario tiene un comercio."
    }
    ```

  - **Código de estado 404 Not Found** (Si no esta registrado):

    ```json
    {
      "message": "El usuario no tiene un comercio."
    }
    ```

---

### 2. Actualizar información de personal del cliente

- **URL:** `/api/cliente/{id}/datos-personales`
- **Método:** `PUT`
- **Descripción:** Permite actualizar la información personal de un cliente.
- **Parámetros:**
  - `id`: (int, requerido) El ID del cliente que se desea obtener.
- **Respuesta:**

  - **Código de estado 200 OK**:

    ```json
    {
      "id": 12,
      "name": "Lorenzo",
      "apellidos": "Moll Anglada",
      "email": "lorenzo@gmail.com",
      "email_verified_at": null,
      "phone": "603397347",
      "phone_verified_at": null,
      "street_address": "Carrer Confiança 32",
      "ciudad": "Ciutadella",
      "provincia": "Menorca",
      "codigo_postal": 7760,
      "numero_planta": 1,
      "numero_puerta": 4,
      "puntos": null,
      "created_at": null,
      "updated_at": "2025-01-30T09:12:06.000000Z"
    }
    ```

  - **Código de estado 404 Not Found** (Si no esta registrado):

    ```json
    {
      "message": "Cliente no encontrado"
    }
    ```

  - **Código de estado 400 Not Found** (Si los datos enviados son incorrectos):

    ```json
    {
      "message": "Datos incorrectos"
    }
    ```

---

### 3. Actualizar información de facturación del cliente

- **URL:** `/api/cliente/{id}/datos-personales`
- **Método:** `PUT`
- **Descripción:** Permite actualizar la información de facturación de un cliente.
- **Parámetros:**
  - `id`: (int, requerido) El ID del cliente que se desea obtener.
- **Respuesta:**

  - **Código de estado 200 OK**:

    ```json
    {
      "id": 12,
      "name": "Lorenzo",
      "apellidos": "Moll Anglada",
      "email": "lorenzo@gmail.com",
      "email_verified_at": null,
      "phone": "603397347",
      "phone_verified_at": null,
      "street_address": "Carrer Confiança 32",
      "ciudad": "Ciutadella",
      "provincia": "Menorca",
      "codigo_postal": 7760,
      "numero_planta": 1,
      "numero_puerta": 5,
      "puntos": null,
      "created_at": null,
      "updated_at": "2025-01-30T09:12:06.000000Z"
    }
    ```

  - **Código de estado 404 Not Found** (Si no esta registrado):

    ```json
    {
      "message": "Cliente no encontrado"
    }
    ```

  - **Código de estado 400 Not Found** (Si los datos enviados son incorrectos):

    ```json
    {
      "message": "Datos incorrectos"
    }
    ```

---

## 4. Obtener productos favoritos del usuario autenticado

- **URL:** `/api/cliente/{id}/favoritos`
- **Método:** `GET`
- **Descripción:** Permite obtener la lista de productos favoritos de un cliente autenticado.
- **Parámetros:**
  - `id`: (int, requerido) El ID del cliente cuyos productos favoritos se desean obtener.
- **Respuesta:**

  - **Código de estado 200 OK**:

    ```json
    [1, 2, 3]
    ```

---

## 5. Añadir o quitar productos de favoritos

- **URL:** `/api/cliente/{id}/favoritos`
- **Método:** `POST`
- **Descripción:** Permite añadir o quitar un producto de los favoritos de un cliente autenticado.
- **Parámetros:**
  - `id`: (int, requerido) El ID del cliente.
  - `producto_id`: (int, requerido) El ID del producto que se desea añadir o quitar de favoritos.
- **Respuesta:**

  - **Código de estado 200 OK**:

    Si el producto fue añadido o quitado correctamente:

    ```json
    {
      "message": "Producto añadido a favoritos"
    }
    ```

    o

    ```json
    {
      "message": "Producto eliminado de favoritos"
    }
    ```

---

## 6. Obtener productos favoritos con detalles

- **URL:** `/api/cliente/{id}/favoritos-info`
- **Método:** `GET`
- **Descripción:** Obtiene la lista de productos favoritos del usuario autenticado con información detallada.
- **Parámetros:**
  - `id`: (int, requerido) El ID del cliente cuyos productos favoritos se desean obtener.
- **Respuesta:**

  - **Código de estado 200 OK**:

    ```json
    [
      {
        "id": 29,
        "subcategoria_id": 62,
        "comercio_id": 2,
        "nombre": "Kit de jardiner\u00eda",
        "descripcion": "Kit de jardiner\u00eda que incluye herramientas esenciales como pala, rastrillo y guantes, ideal para quienes disfrutan del cuidado de plantas y flores en el hogar.",
        "precio": 923.08,
        "stock": null,
        "imagen": null
      },
      {
        "...."
      }
    ]
    ```
---

<!-- COMANDES -->

# API de Comandes

## Descripción:

Esta API permite ver los pedidos de un comercio, su información, cambiar su estado y ver los pedidos que tengo como usuario.

---

## Autenticación:

- **Método de autenticación:** Bearer Token (utilizando Sanctum).
- **Cabecera:** `Authorization: Bearer <token>`

---

## Endpoints

### 1A. Crear una comanda general

- **URL:** `/api/comandes/`
- **Método:** `POST`
- **Descripción:** Permite crear una nueva comanda al usuario.
- **Parámetros:**
  - `tipo_envio`: (int, requerido) El ID del tipo de envío de la orden (1- Recollida | 2- Enviament).
  - `tipo_pago`: (int, requerido) El ID del tipo de pago de la orden (1- Efectiu | 2- Targeta).
  - `total`: (int, requerido) El total de toda la orden incluyendo todas las subcomandas.
- **Respuesta:**

  - **Código de estado 200 OK**:

    ```json
    {
      "message": "Orden creada con éxito.",
      "producto": {
        "tipo_envio": 2,
        "tipo_pago": 1,
        "total": 200,
        "cliente_id": 11,
        "estat": 1,
        "updated_at": "2025-02-05T20:16:51.000000Z",
        "created_at": "2025-02-05T20:16:51.000000Z",
        "id": 21
      }
    }
    ```

  - **Código de estado 500 Error** (Si se envía un campo erroneo):
    ```json
    {
      "error": "Ocurrió un error al crear la orden: The tipo envio field is required. (and 2 more errors)"
    }
    ```

---

### 1B. Crear subcomandas

- **URL:** `/api/suborders/`
- **Método:** `POST`
- **Descripción:** Permite crear las subcomandas de la comanda general y sus productos.
- **Parámetros:**
  - `order_id`: (int, requerido) El ID de la orden padre. 
  - `subcomandes`: (array, requerido) Un array con todas las subcomandas.
    - `comercio_id`: (int, requerido) ID del comercio al que pertenece.
    - `subtotal`: (int, requerido)
    - `productos`: (array, requerido)
      - `id`: (int, requerido) ID del producto.
      - `cantidad`: (int, requerido, min: 1).
      - `precio`: (int, requerido) Precio del producto AL MOMENTO DE LA COMPRA.
- **Respuesta:**

  - **Código de estado 201 Oreated**:

    ```json
    "subcomandes": [
      {
        "suborder": {
          "order_id": 1,
          "comercio_id": 2,
          "subtotal": 100,
          "estat": 1,
          "updated_at": "2025-02-06T19:38:13.000000Z",
          "created_at": "2025-02-06T19:38:13.000000Z",
          "id": 4
        },
        "productos": [
          {
            "order_comercio_id": 4,
            "producto_id": 10,
            "cantidad": 5,
            "precio": 10
          },
          {
            "order_comercio_id": 4,
            "producto_id": 12,
            "cantidad": 2,
            "precio": 5
          }
        ]
      }
    ]
    ```

  - **Código de estado 500 Error** (Si se envía un campo erroneo o un ID no válido):

    ```json
    {
      "error": "Ocurrió un error al crear la subcomanda: The order id field is required."
    }
    ```
---

### 2. Ver comandas generales del usuario logueado

- **URL:** `/api/comandes`
- **Método:** `GET`
- **Descripción:** Permite obtener las comandas del cliente.
- **Parámetros:** Ninguno.
- **Respuesta:**

  - **Código de estado 200 OK**:

    ```json
    [
      {
        "id": 5,
        "cliente_id": 10,
        "total": 255.07,
        "tipo_envio": 1,
        "tipo_pago": 1,
        "estat": 5,
        "created_at": "2025-01-31T08:13:39.000000Z",
        "updated_at": null,
        "tipo_envio": {
            "id": 1,
            "nombre": "Recollida",
            "descripcion": null,
            "created_at": null,
            "updated_at": null
        },
        "tipo_pago": {
            "id": 1,
            "nombre": "Efectiu",
            "created_at": null,
            "updated_at": null
        },
        "estat_compra": {
          "id": 5,
          "nombre": "Cancelado",
          "color": "#ff0000"
        }
      }
    ]
    ```

  - **Código de estado 404 Not Found** (Si no tiene comandas):

    ```json
    []
    ```

---

### 3. Ver en que comercios realizó una orden el cliente

- **URL:** `/api/comandes/{id}/suborders`
- **Método:** `GET`
- **Descripción:** Permite obtener las subcomandas del cliente.
- **Parámetros:**
  - `id`: (int, requerido) El ID de la orden general que englobará los pedidos a comercios.
- **Respuesta:**

  - **Código de estado 200 OK**:

    ```json
    [
      {
        "id": 7,
        "cliente_id": 11,
        "total": 86.65,
        "tipo_envio": 2,
        "tipo_pago": 1,
        "estat": 1,
        "created_at": "2025-01-31T11:46:07.000000Z",
        "updated_at": null,
        "tipo_envio": {
          "id": 2,
          "nombre": "Envio",
          "descripcion": null,
          "created_at": null,
          "updated_at": null
        },
        "tipo_pago": {
          "id": 1,
          "nombre": "Efectiu",
          "created_at": null,
          "updated_at": null
        },
        "estat_compra": {
          "id": 1,
          "nombre": "Pendiente",
          "color": "#ffb300"
        },
        "order_comercios": [
          {
            "id": 3,
            "order_id": 1,
            "comercio_id": 11,
            "subtotal": 385.75,
            "estat": 3,
            "created_at": "2025-01-31T11:46:07.000000Z",
            "updated_at": null,
            "comercio": {
              "id": 11,
              "nombre": "Zemlak, Price and Frami"
            }
          }
        ]
      }
    ]
    ```

  - **Código de estado 404 Not Found** (Si no existe la comanda):

    ```json
    {
      "message": "Comanda no encontrada."
    }
    ```

---

### 4. Ver información de una subcomanda de un cliente

- **URL:** `/api/comandes/suborder/{id}`
- **Método:** `PUT`
- **Descripción:** Permite ver toda la información de un subpedido a un comercio.
- **Parámetros:**
  - `id`: (int, requerido) El ID de la suborder que se desea obtener.
- **Respuesta:**

  - **Código de estado 200 OK**:

    ```json
    {
      "id": 1,
      "order_id": 9,
      "comercio_id": 10,
      "subtotal": 935.26,
      "estat": 4,
      "created_at": "2025-01-31T11:46:07.000000Z",
      "updated_at": null,
      "estat_compra": {
        "id": 4,
        "nombre": "Entregado",
        "color": "#16d900"
      },
      "order": {
        "id": 9,
        "tipo_envio": 1,
        "tipo_envio": {
          "id": 1,
          "nombre": "Recollida",
          "descripcion": null,
          "created_at": null,
          "updated_at": null
        },
        "tipo_pago": 1,
        "tipo_pago": {
          "id": 1,
          "nombre": "Efectiu",
          "created_at": null,
          "updated_at": null
        }
      },
      "productos_compra": [
        {
          "id": 21,
          "order_comercio_id": 1,
          "producto_id": 14,
          "cantidad": 9,
          "precio": 49.27,
          "producto": {
            "id": 14,
            "subcategoria_id": 30,
            "comercio_id": 3,
            "nombre": "Videocámara de acción",
            "descripcion": "Videocámara de acción resistente al agua...",
            "precio": 922.8,
            "stock": null,
            "imagen": null
          }
        }
      ]
    }
    ```

  - **Código de estado 404 Not Found** (Si no esta registrado):

    ```json
    {
      "message": "No tienes ninguna orden con ID #134."
    }
    ```

---
