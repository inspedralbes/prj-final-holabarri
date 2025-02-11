const express = require("express");
const http = require("http");
const { Server } = require("socket.io");

const Host = 'http://laravel:8000/api';

const app = express();
const server = http.createServer(app);
const io = new Server(server, {
  cors: {
    origin: ["http://localhost", "http://localhost:8001", "http://localhost:3000", "http://localhost:8000"],  // Agregar ambos orígenes
  },
});

async function obtenerUseridComercio(comercio_id) {
  try {
    const response = await fetch(`${Host}/comercios/getUserid/${comercio_id}`);
    if (!response.ok) {
      console.error(`Error en la petición: ${response.status} ${response.statusText}`)
      return null;
    }
    const data = await response.json();
    const ownerId = data.usuario_id;
    
    return ownerId;
  } catch (error) {
    console.error('Error al realizar la petición:', error);
    return null;
  }
}

io.on("connection", (socket) => {
  console.log("Un usuario se ha conectado");

  socket.on("mensaje", (data) => {
    console.log("Mensaje recibido:", data);
    io.emit("mensaje", data); // Reenviar mensaje a todos los clientes
  });

  socket.on("identificarUsuario", (data) => {
    socket.join(`user_${data.user_id}`);
    console.log(`Usuario ${data.user_id} unido a la sala user_${data.user_id}`);
  });

  socket.on("nuevaOrden", async (data) => {
    for (const suborder of data.subcomandes) {
      const suborderData = {
        'comercio_id': suborder.comercio_id,
        'created_at': data.created_at,
        'estat': suborder.estat_compra.id,
        'id': suborder.suborder_id,
        'estat_compra': suborder.estat_compra,
        'order_id': data.order_id,
        'order': {
          'id': data.order_id,
          'cliente_id': data.cliente.id,
          'cliente': {
            'id': data.cliente.id,
            'name': data.cliente.nombre,
            'apellidos': data.cliente.apellidos
          },
          'tipo_envio': data.tipo_envio,
          'tipo_pago': data.tipo_pago,
        },
        'subtotal': suborder.subtotal,
      }
      const ownerId = await obtenerUseridComercio(suborder.comercio_id);
      io.to(`user_${ownerId}`).emit("nuevaOrdenRecibida", suborderData);
    };
  });

  socket.on("test", () => {
    console.log("Usuarios en la sala:", io.sockets.adapter.rooms.get(`user_${ownerId}`));
    io.emit("TestEnviado");
  })

  socket.on("disconnect", () => {
    console.log("Un usuario se ha desconectado");
  });
});

server.listen(3000, () => {
  console.log("Servidor de sockets corriendo en http://localhost:3000");
});
