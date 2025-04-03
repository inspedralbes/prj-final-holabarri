<template>
    <div>
        <!-- Header -->
        <header class="bg-blue-600 text-white py-4">
            <div id="infoMenu" class="container mx-auto flex justify-between items-center">
                <h1 class="text-xl font-bold"></h1>
                <nav>
                    <ul class="flex space-x-6">
                        <li><a href="#features" class="hover:text-gray-300">Características</a></li>
                        <li><a href="#pricing" class="hover:text-gray-300">Precios</a></li>
                        <li><a href="#contact" class="hover:text-gray-300">Contacto</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <section class="bg-cover bg-center h-screen relative"
            style="background-image: url('https://via.placeholder.com/1920x1080');">
            <div class="absolute inset-0 bg-black opacity-50"></div>
            <div class="relative z-10 container mx-auto text-center text-white py-32">
                <h2 class="text-4xl md:text-5xl font-semibold mb-4">Bienvenido a nuestra página</h2>
                <p class="text-xl md:text-2xl mb-6">Transforma tu vida con nuestros servicios innovadores.</p>
                <a href="#contact" class="bg-blue-500 text-white px-6 py-3 rounded-md text-lg hover:bg-orange-400 transition duration-300">Contáctanos</a>
            </div>
        </section>

        <!-- Features Section -->
        <section id="features" class="py-16 bg-gray-100">
            <div class="container mx-auto text-center">
                <h2 class="text-3xl font-bold mb-8">Características</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <h3 class="text-xl font-semibold mb-4">Fácil de usar</h3>
                        <p class="text-gray-600">Nuestra plataforma es muy fácil de usar, diseñada para todos los
                            niveles de habilidad.</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <h3 class="text-xl font-semibold mb-4">Rápido y eficiente</h3>
                        <p class="text-gray-600">Disfruta de una experiencia sin interrupciones, con un rendimiento
                            excelente en todos los dispositivos.</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <h3 class="text-xl font-semibold mb-4">Soporte 24/7</h3>
                        <p class="text-gray-600">Nuestro equipo de soporte está disponible todo el día, todos los días,
                            para ayudarte cuando lo necesites.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Pricing Section -->
        <section id="pricing" class="py-16">
            <div class="container mx-auto text-center">
                <h2 class="text-3xl font-bold mb-8">Planes y Precios</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <h3 class="text-xl font-semibold mb-4">Plan Básico</h3>
                        <p class="text-gray-600 mb-4">Perfecto para usuarios individuales.</p>
                        <div class="text-2xl font-bold mb-4">$10/mes</div>
                        <a href="#contact"
                            class="bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-500 transition duration-300">Suscribirse</a>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <h3 class="text-xl font-semibold mb-4">Plan Pro</h3>
                        <p class="text-gray-600 mb-4">Para empresas y equipos más grandes.</p>
                        <div class="text-2xl font-bold mb-4">$25/mes</div>
                        <a href="#contact"
                            class="bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-500 transition duration-300">Suscribirse</a>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <h3 class="text-xl font-semibold mb-4">Plan Premium</h3>
                        <p class="text-gray-600 mb-4">Para los que necesitan todas las funciones premium.</p>
                        <div class="text-2xl font-bold mb-4">$50/mes</div>
                        <a href="#contact"
                            class="bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-500 transition duration-300">Suscribirse</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="bg-blue-600 text-white py-16">
            <div class="container mx-auto text-center">
                <h2 class="text-3xl font-bold mb-4">Contáctanos</h2>
                <p class="text-xl mb-8">¿Tienes preguntas? ¡Estamos aquí para ayudarte!</p>
                <form class="max-w-lg mx-auto space-y-4">
                    <input type="text" placeholder="Tu nombre" class="w-full p-3 rounded-md text-gray-900" />
                    <input type="email" placeholder="Tu email" class="w-full p-3 rounded-md text-gray-900" />
                    <textarea placeholder="Tu mensaje" class="w-full p-3 rounded-md text-gray-900 h-40"></textarea>
                    <button type="submit"
                        class="bg-orange-500 text-white px-6 py-3 rounded-md hover:bg-orange-400 transition duration-300">Enviar
                        mensaje</button>
                </form>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white py-8">
            <div class="container mx-auto text-center">
                <p>&copy; 2025 Mi Landing Page. Todos los derechos reservados.</p>
            </div>
        </footer>
    </div>
</template>

<script setup>
    definePageMeta({
        layout: false,
    });
</script>

<style scoped>
    #infoMenu{
        width: 90%;
    }
    section{
        width: 90%;
        margin: 0 auto;
    }
</style>