<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductosSantAntoniTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $productos = [
            // Boutique Sant Antoni - Indumentaria            
            ["nombre" => "Vestido de fiesta", "comercio_id" => 11, "descripcion" => "Vestido elegante ideal para eventos formales.", "subcategoria_id" => 5, "precio" => 150, "visible" => 1],
            ["nombre" => "Blazer de lana", "comercio_id" => 11, "descripcion" => "Blazer de corte clásico para un look sofisticado.", "subcategoria_id" => 4, "precio" => 120, "visible" => 1],
            ["nombre" => "Jeans ajustados", "comercio_id" => 11, "descripcion" => "Pantalón denim con diseño moderno y cómodo.", "subcategoria_id" => 6, "precio" => 50, "visible" => 1],
            ["nombre" => "Camiseta estampada", "comercio_id" => 11, "descripcion" => "Camiseta de algodón con estampado original.", "subcategoria_id" => 2, "precio" => 10, "visible" => 1],
            ["nombre" => "Abrigo de invierno", "comercio_id" => 11, "descripcion" => "Abrigo grueso con forro térmico para el frío.", "subcategoria_id" => 3, "precio" => 20, "visible" => 1],

            // Marina Moda - Indumentaria            
            ["nombre" => "Falda plisada", "comercio_id" => 12, "descripcion" => "Falda midi con pliegues elegantes.", "subcategoria_id" => 3, "precio" => 20, "visible" => 1],
            ["nombre" => "Sudadera oversize", "comercio_id" => 12, "descripcion" => "Sudadera cómoda y abrigada para el día a día.", "subcategoria_id" => 2, "precio" => 55, "visible" => 1],
            ["nombre" => "Zapatillas urbanas", "comercio_id" => 12, "descripcion" => "Calzado deportivo con diseño moderno.", "subcategoria_id" => 2, "precio" => 38.99, "visible" => 1],
            ["nombre" => "Top de encaje", "comercio_id" => 12, "descripcion" => "Blusa con detalles en encaje, perfecta para ocasiones especiales.", "subcategoria_id" => 5, "precio" => 26.99, "visible" => 1],
            ["nombre" => "Chaqueta vaquera", "comercio_id" => 12, "descripcion" => "Chaqueta denim de corte clásico.", "subcategoria_id" => 7, "precio" => 99.99, "visible" => 1],

            // Tech & More - Tecnología
            ["nombre" => "Smartphone 5G", "comercio_id" => 13, "descripcion" => "Teléfono móvil con conectividad 5G y pantalla OLED.", "subcategoria_id" => 8, "precio" => 350, "visible" => 1],
            ["nombre" => "Auriculares Bluetooth", "comercio_id" => 13, "descripcion" => "Auriculares inalámbricos con cancelación de ruido.", "subcategoria_id" => 9, "precio" => 9.99, "visible" => 1],
            ["nombre" => "Laptop ultraligera", "comercio_id" => 13, "descripcion" => "Ordenador portátil de última generación.", "subcategoria_id" => 10, "precio" => 15, "visible" => 1],
            ["nombre" => "Mouse gamer RGB", "comercio_id" => 13, "descripcion" => "Ratón ergonómico con iluminación LED.", "subcategoria_id" => 11, "precio" => 35, "visible" => 1],
            ["nombre" => "Cámara de seguridad", "comercio_id" => 13, "descripcion" => "Cámara IP con detección de movimiento.", "subcategoria_id" => 12, "precio" => 40, "visible" => 1],

            // Ferretería El Faro - Ferretería
            ["nombre" => "Taladro percutor", "comercio_id" => 14, "descripcion" => "Taladro eléctrico con múltiples velocidades.", "subcategoria_id" => 36, "precio" => 38.99, "visible" => 1],
            ["nombre" => "Martillo de acero", "comercio_id" => 14, "descripcion" => "Martillo de uso profesional con mango ergonómico.", "subcategoria_id" => 37, "precio" => 45, "visible" => 1],
            ["nombre" => "Caja de herramientas", "comercio_id" => 14, "descripcion" => "Kit completo con destornilladores y llaves.", "subcategoria_id" => 38, "precio" => 40, "visible" => 1],
            ["nombre" => "Sierra eléctrica", "comercio_id" => 14, "descripcion" => "Sierra de corte rápido para madera y metal.", "subcategoria_id" => 39, "precio" => 30, "visible" => 1],
            ["nombre" => "Llave inglesa ajustable", "comercio_id" => 14, "descripcion" => "Llave de precisión con agarre antideslizante.", "subcategoria_id" => 40, "precio" => 15.99, "visible" => 1],

            // Belleza Urbana - Cosméticos
            ["nombre" => "Base líquida mate", "comercio_id" => 15, "descripcion" => "Base de maquillaje con acabado natural.", "subcategoria_id" => 28, "precio" => 100, "visible" => 1],
            ["nombre" => "Paleta de sombras", "comercio_id" => 15, "descripcion" => "Colores vibrantes para maquillaje profesional.", "subcategoria_id" => 27, "precio" => 100, "visible" => 1],
            ["nombre" => "Labial rojo intenso", "comercio_id" => 15, "descripcion" => "Bálsamo labial de larga duración.", "subcategoria_id" => 26, "precio" => 100, "visible" => 1],
            ["nombre" => "Delineador waterproof", "comercio_id" => 15, "descripcion" => "Delineador resistente al agua con punta fina.", "subcategoria_id" => 25, "precio" => 100, "visible" => 1],
            ["nombre" => "Crema facial hidratante", "comercio_id" => 15, "descripcion" => "Hidratante con ácido hialurónico y SPF 30.", "subcategoria_id" => 24, "precio" => 100, "visible" => 1],

            // Repuestos Auto Express - Repuestos
            ["nombre" => "Filtro de aceite", "comercio_id" => 16, "descripcion" => "Filtro de alto rendimiento para motores.", "subcategoria_id" => 14, "precio" => 29.99, "visible" => 1],
            ["nombre" => "Juego de bujías", "comercio_id" => 16, "descripcion" => "Bujías de encendido de alta durabilidad.", "subcategoria_id" => 13, "precio" => 35, "visible" => 1],
            ["nombre" => "Batería 12V", "comercio_id" => 16, "descripcion" => "Batería de coche con gran capacidad.", "subcategoria_id" => 12, "precio" => 55, "visible" => 1],
            ["nombre" => "Aceite sintético", "comercio_id" => 16, "descripcion" => "Lubricante para motor de alto rendimiento.", "subcategoria_id" => 11, "precio" => 130, "visible" => 1],
            ["nombre" => "Pastillas de freno", "comercio_id" => 16, "descripcion" => "Juego de frenos de alta seguridad.", "subcategoria_id" => 10, "precio" => 150, "visible" => 1],

            // Home & Decor Hub - Hogar
            ["nombre" => "Juego de sábanas", "comercio_id" => 17, "descripcion" => "Sábanas de algodón suave y fresco.", "subcategoria_id" => 15, "precio" => 120, "visible" => 1],
            ["nombre" => "Cafetera de acero", "comercio_id" => 17, "descripcion" => "Cafetera con sistema antigoteo y filtro permanente.", "subcategoria_id" => 16, "precio" => 95, "visible" => 1],
            ["nombre" => "Lámpara de pie", "comercio_id" => 17, "descripcion" => "Lámpara LED con diseño moderno.", "subcategoria_id" => 17, "precio" => 85, "visible" => 1],
            ["nombre" => "Sofá reclinable", "comercio_id" => 17, "descripcion" => "Sofá cómodo con tapizado premium.", "subcategoria_id" => 18, "precio" => 75, "visible" => 1],
            ["nombre" => "Aspiradora ciclónica", "comercio_id" => 17, "descripcion" => "Aspiradora sin bolsa con alto poder de succión.", "subcategoria_id" => 19, "precio" => 70, "visible" => 1],

            // Accesorios Chic - Accesorios
            ["nombre" => "Bolso de cuero", "comercio_id" => 18, "descripcion" => "Bolso elegante de piel auténtica.", "subcategoria_id" => 84, "precio" => 60, "visible" => 1],
            ["nombre" => "Gafas de sol", "comercio_id" => 18, "descripcion" => "Lentes polarizados con protección UV.", "subcategoria_id" => 83, "precio" => 50, "visible" => 1],
            ["nombre" => "Reloj minimalista", "comercio_id" => 18, "descripcion" => "Reloj con correa de cuero y esfera clásica.", "subcategoria_id" => 82, "precio" => 40, "visible" => 1],
            ["nombre" => "Collar de plata", "comercio_id" => 18, "descripcion" => "Colgante de plata de ley con diseño exclusivo.", "subcategoria_id" => 81, "precio" => 30, "visible" => 1],
            ["nombre" => "Pulsera con charms", "comercio_id" => 18, "descripcion" => "Pulsera ajustable con dijes intercambiables.", "subcategoria_id" => 80, "precio" => 20, "visible" => 1],

            // Electrónica Viva - Tecnología
            ["nombre" => "Tablet de 10 pulgadas", "comercio_id" => 19, "descripcion" => "Pantalla táctil HD con procesador rápido.", "subcategoria_id" => 8, "precio" => 14.99, "visible" => 1],
            ["nombre" => "Barra de sonido", "comercio_id" => 19, "descripcion" => "Sonido envolvente con conexión Bluetooth.", "subcategoria_id" => 9, "precio" => 120, "visible" => 1],
            ["nombre" => "Cargador inalámbrico", "comercio_id" => 19, "descripcion" => "Carga rápida para dispositivos móviles.", "subcategoria_id" => 10, "precio" => 78.99, "visible" => 1],
            ["nombre" => "Router WiFi 6", "comercio_id" => 19, "descripcion" => "Internet de alta velocidad con baja latencia.", "subcategoria_id" => 11, "precio" => 35, "visible" => 1],
            ["nombre" => "Disco SSD 1TB", "comercio_id" => 19, "descripcion" => "Almacenamiento rápido para ordenadores.", "subcategoria_id" => 12, "precio" => 120.50, "visible" => 1],

            // Cosmética Natural - Cosméticos
            ["nombre" => "Jabón artesanal", "comercio_id" => 20, "descripcion" => "Elaborado con ingredientes naturales.", "subcategoria_id" => 22, "precio" => 35, "visible" => 1],
            ["nombre" => "Aceite de argán", "comercio_id" => 20, "descripcion" => "Aceite orgánico para piel y cabello.", "subcategoria_id" => 23, "precio" => 89.99, "visible" => 1],
            ["nombre" => "Mascarilla facial", "comercio_id" => 20, "descripcion" => "Tratamiento hidratante para todo tipo de piel.", "subcategoria_id" => 24, "precio" => 65, "visible" => 1],
            ["nombre" => "Perfume vegano", "comercio_id" => 20, "descripcion" => "Fragancia sin químicos dañinos.", "subcategoria_id" => 25, "precio" => 20, "visible" => 1],
            ["nombre" => "Shampoo sólido", "comercio_id" => 20, "descripcion" => "Fórmula ecológica sin sulfatos.", "subcategoria_id" => 26, "precio" => 35.99, "visible" => 1],
        ];

        Producto::insert($productos);
    }
}
