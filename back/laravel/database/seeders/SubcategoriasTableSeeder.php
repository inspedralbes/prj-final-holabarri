<?php

namespace Database\Seeders;

use App\Models\Subcategoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubcategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Indumentaria
        Subcategoria::create(["categoria_id" => 1, "name" => "Ropa Formal"]);
        Subcategoria::create(["categoria_id" => 1, "name" => "Ropa Casual"]);
        Subcategoria::create(["categoria_id" => 1, "name" => "Uniformes"]);
        Subcategoria::create(["categoria_id" => 1, "name" => "Accesorios"]);
        Subcategoria::create(["categoria_id" => 1, "name" => "Eventos"]);
        Subcategoria::create(["categoria_id" => 1, "name" => "Temporada"]);
        Subcategoria::create(["categoria_id" => 1, "name" => "Lencería"]);

        // Tecnología
        Subcategoria::create(["categoria_id" => 2, "name" => "Electrónica"]);
        Subcategoria::create(["categoria_id" => 2, "name" => "Componentes PC"]);
        Subcategoria::create(["categoria_id" => 2, "name" => "Accesorios Móvil"]);
        Subcategoria::create(["categoria_id" => 2, "name" => "Impresoras"]);
        Subcategoria::create(["categoria_id" => 2, "name" => "Domótica"]);
        Subcategoria::create(["categoria_id" => 2, "name" => "Videojuegos"]);
        Subcategoria::create(["categoria_id" => 2, "name" => "Audio y Sonido"]);

        // Hogar y Decoración
        Subcategoria::create(["categoria_id" => 3, "name" => "Interior"]);
        Subcategoria::create(["categoria_id" => 3, "name" => "Exterior"]);
        Subcategoria::create(["categoria_id" => 3, "name" => "Cocina"]);
        Subcategoria::create(["categoria_id" => 3, "name" => "Textiles"]);
        Subcategoria::create(["categoria_id" => 3, "name" => "Cuadros y Arte"]);
        Subcategoria::create(["categoria_id" => 3, "name" => "Limpieza"]);
        Subcategoria::create(["categoria_id" => 3, "name" => "Decoración Estacional"]);

        // Salud y Belleza
        Subcategoria::create(["categoria_id" => 4, "name" => "Cuidado de Piel"]);
        Subcategoria::create(["categoria_id" => 4, "name" => "Maquillaje Profesional"]);
        Subcategoria::create(["categoria_id" => 4, "name" => "Cuidado Capilar"]);
        Subcategoria::create(["categoria_id" => 4, "name" => "Higiene Personal"]);
        Subcategoria::create(["categoria_id" => 4, "name" => "Equipos Médicos"]);
        Subcategoria::create(["categoria_id" => 4, "name" => "Perfumería"]);
        Subcategoria::create(["categoria_id" => 4, "name" => "Belleza"]);

        // Jugueterías
        Subcategoria::create(["categoria_id" => 5, "name" => "Juguetes Clásicos"]);
        Subcategoria::create(["categoria_id" => 5, "name" => "Juegos Educativos"]);
        Subcategoria::create(["categoria_id" => 5, "name" => "Bebés"]);
        Subcategoria::create(["categoria_id" => 5, "name" => "Muñecas y Figuras"]);
        Subcategoria::create(["categoria_id" => 5, "name" => "Vehículos"]);
        Subcategoria::create(["categoria_id" => 5, "name" => "Construcción"]);
        Subcategoria::create(["categoria_id" => 5, "name" => "Electrónicos"]);

        // Ferreterías
        Subcategoria::create(["categoria_id" => 6, "name" => "Herramientas Manuales"]);
        Subcategoria::create(["categoria_id" => 6, "name" => "Herramientas Eléctricas"]);
        Subcategoria::create(["categoria_id" => 6, "name" => "Construcción"]);
        Subcategoria::create(["categoria_id" => 6, "name" => "Pinturas"]);
        Subcategoria::create(["categoria_id" => 6, "name" => "Jardinería"]);
        Subcategoria::create(["categoria_id" => 6, "name" => "Seguridad Industrial"]);
        Subcategoria::create(["categoria_id" => 6, "name" => "Cerraduras"]);

        // Librerías
        Subcategoria::create(["categoria_id" => 7, "name" => "Libros Escolares"]);
        Subcategoria::create(["categoria_id" => 7, "name" => "Literatura General"]);
        Subcategoria::create(["categoria_id" => 7, "name" => "Papelería"]);
        Subcategoria::create(["categoria_id" => 7, "name" => "Artículos de Arte"]);
        Subcategoria::create(["categoria_id" => 7, "name" => "Juegos de Mesa"]);
        Subcategoria::create(["categoria_id" => 7, "name" => "Material Didáctico"]);
        Subcategoria::create(["categoria_id" => 7, "name" => "Revistas y Periódicos"]);

        // Farmacias
        Subcategoria::create(["categoria_id" => 8, "name" => "Medicamentos"]);
        Subcategoria::create(["categoria_id" => 8, "name" => "Vitaminas"]);
        Subcategoria::create(["categoria_id" => 8, "name" => "Cuidado Personal"]);
        Subcategoria::create(["categoria_id" => 8, "name" => "Productos Naturales"]);
        Subcategoria::create(["categoria_id" => 8, "name" => "Primera Ayuda"]);
        Subcategoria::create(["categoria_id" => 8, "name" => "Salud Infantil"]);
        Subcategoria::create(["categoria_id" => 8, "name" => "Equipos Médicos"]);

        // Zapaterías
        Subcategoria::create(["categoria_id" => 9, "name" => "Zapatos Deportivos"]);
        Subcategoria::create(["categoria_id" => 9, "name" => "Calzado Formal"]);
        Subcategoria::create(["categoria_id" => 9, "name" => "Chanclas"]);
        Subcategoria::create(["categoria_id" => 9, "name" => "Niños"]);
        Subcategoria::create(["categoria_id" => 9, "name" => "Botas"]);
        Subcategoria::create(["categoria_id" => 9, "name" => "Calzado Casual"]);
        Subcategoria::create(["categoria_id" => 9, "name" => "Accesorios"]);

        // Floristerías
        Subcategoria::create(["categoria_id" => 10, "name" => "Ramos"]);
        Subcategoria::create(["categoria_id" => 10, "name" => "Interior"]);
        Subcategoria::create(["categoria_id" => 10, "name" => "Exterior"]);
        Subcategoria::create(["categoria_id" => 10, "name" => "Arreglos Florales"]);
        Subcategoria::create(["categoria_id" => 10, "name" => "Artificiales"]);
        Subcategoria::create(["categoria_id" => 10, "name" => "Macetas"]);
        Subcategoria::create(["categoria_id" => 10, "name" => "Decoración Floral"]);

        // Ópticas
        Subcategoria::create(["categoria_id" => 11, "name" => "Lentes Oftálmicos"]);
        Subcategoria::create(["categoria_id" => 11, "name" => "Lentes de Sol"]);
        Subcategoria::create(["categoria_id" => 11, "name" => "Lentes de Contacto"]);
        Subcategoria::create(["categoria_id" => 11, "name" => "Monturas"]);
        Subcategoria::create(["categoria_id" => 11, "name" => "Accesorios"]);
        Subcategoria::create(["categoria_id" => 11, "name" => "Cuidado Visual"]);
        Subcategoria::create(["categoria_id" => 11, "name" => "Equipos de Examen"]);

        // Accesorios
        Subcategoria::create(["categoria_id" => 12, "name" => "Bolsos y Carteras"]);
        Subcategoria::create(["categoria_id" => 12, "name" => "Joyería"]);
        Subcategoria::create(["categoria_id" => 12, "name" => "Relojes"]);
        Subcategoria::create(["categoria_id" => 12, "name" => "Sombreros y Gorros"]);
        Subcategoria::create(["categoria_id" => 12, "name" => "Gafas de Sol"]);
        Subcategoria::create(["categoria_id" => 12, "name" => "Cinturones"]);
        Subcategoria::create(["categoria_id" => 12, "name" => "Bufandas y Guantes"]);

        // Tiendas de Mascotas
        Subcategoria::create(["categoria_id" => 13, "name" => "Alimentos"]);
        Subcategoria::create(["categoria_id" => 13, "name" => "Accesorios"]);
        Subcategoria::create(["categoria_id" => 13, "name" => "Juguetes"]);
        Subcategoria::create(["categoria_id" => 13, "name" => "Higiene y Salud"]);
        Subcategoria::create(["categoria_id" => 13, "name" => "Ropa"]);
        Subcategoria::create(["categoria_id" => 13, "name" => "Adiestramiento"]);
        Subcategoria::create(["categoria_id" => 13, "name" => "Acuarios y Terrarios"]);
    }
}
