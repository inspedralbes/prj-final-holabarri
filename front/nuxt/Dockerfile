# Usa una imagen base ligera de Node.js
FROM node:18-alpine

# Establece el directorio de trabajo en el contenedor
WORKDIR /app

# Copia el archivo package.json y package-lock.json
COPY package*.json ./

# Instala las dependencias
RUN npm install

# Copia todo el código de la aplicación al contenedor
COPY . .

# Expone el puerto donde Nuxt se ejecutará
EXPOSE 5173

# Comando para iniciar Nuxt en modo desarrollo
CMD ["npm", "run", "dev", "--", "--host", "0.0.0.0"]
