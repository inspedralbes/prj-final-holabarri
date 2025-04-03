<template>
    <div class="form-container">
        <h2 class="form-title">Afegir Producte</h2>

        <form @submit.prevent="submitForm" class="product-form">
            <div class="input-group">
                <label for="nombre" class="label">Nom del Producte</label>
                <input type="text" v-model="form.nombre" id="nombre" placeholder="Introdueix el nom del producte"
                    class="input-field" required />
            </div>

            <div class="input-group">
                <label for="categoria" class="label">Categoria</label>
                <select v-model="form.categoriaSeleccionada" id="categoria" class="input-field" required>
                    <option value="" disabled selected>Selecciona una categoria</option>
                    <option v-for="(categoria, index) in form.categorias" :key="index" :value="categoria.id">
                        {{ categoria.name }}
                    </option>
                </select>
            </div>

            <div class="input-group">
                <label for="descripcion" class="label">Descripció</label>
                <textarea v-model="form.descripcion" id="descripcion" placeholder="Introdueix una descripció"
                    class="input-field" required></textarea>
            </div>

            <div class="input-group">
                <label for="imagenPrincipal" class="label">Imatge Principal</label>
                <input type="file" accept="image/*" @change="handleImageChange" id="imagenPrincipal" class="file-input" required />
                <div v-if="form.imagen" class="image-preview">
                    <p class="preview-text">Vista prèvia de la imatge:</p>
                    <img :src="form.imagen.url" alt="Vista prèvia" class="image-thumbnail" />
                </div>
            </div>

            <div class="input-group">
                <label for="precioGeneral" class="label">Preu General (€)</label>
                <input type="number" v-model="form.precioGeneral" id="precioGeneral"
                    placeholder="Introdueix el preu general" class="input-field" required />
            </div>

            <div class="input-group">
                <label for="stock" class="label">Stock</label>
                <input type="number" v-model="form.stock" id="stock"
                    placeholder="Introdueix la quantitat en estoc" class="input-field" required />
            </div>

            <div class="submit-btn-container">
                <button type="submit" :disabled="!canSubmit" class="submit-btn">
                    Guardar Producte
                </button>
            </div>
        </form>
    </div>
</template>

<script setup>
    import { ref, computed, onMounted } from "vue";
    import { useAuthStore } from '../../stores/authStore';

    definePageMeta({
        layout: false,
    });

    const { $communicationManager } = useNuxtApp();

    const form = ref({
        nombre: "",
        descripcion: "",
        categoriaSeleccionada: "",
        precioGeneral: null,
        stock: null,
        imagen: null,
        categorias: [],
    });

    const authStore = useAuthStore(); 
    const token = computed(() => authStore.token);

    const fetchSubcategorias = async () => {
        const categoria_id = 1;
        const result = await $communicationManager.getSubcategoriasByCategoriaId(categoria_id);

        if (result && result.success && result.data) {
            form.value.categorias = result.data;
        } else {
            console.error("No se pudieron obtener las subcategorías");
        }
    };

    const handleImageChange = (event) => {
        const file = event.target.files[0];

        if (file) {
            form.value.imagen = {
                file,
                url: URL.createObjectURL(file),
            };
        }
    };

    const canSubmit = computed(() => {
        return form.value.nombre && form.value.descripcion && form.value.precioGeneral != null && form.value.categoriaSeleccionada && form.value.imagen && form.value.stock != null;
    });

    const submitForm = async () => {
        if (!canSubmit.value) {
            alert("Per favor, completa tots els camps necessaris.");
            return;
        }

        const formData = new FormData();
        formData.append("nombre", form.value.nombre);
        formData.append("descripcion", form.value.descripcion);
        formData.append("subcategoria_id", form.value.categoriaSeleccionada);
        formData.append("comercio_id", 3);
        formData.append("precio", form.value.precioGeneral || "");
        formData.append("stock", form.value.stock);
        formData.append("imagen", form.value.imagen.file);

        const result = await $communicationManager.createProducto(formData);

        if (result && result.success) {
            alert("Producte creat correctament!");
        } else {
            console.error("Error en la creación del producto:", result?.message || "Error desconocido");
            alert("Error al crear el producto.");
        }
    };

    onMounted(fetchSubcategorias);
</script>

<style scoped>
    body {
        margin: 0;
        padding: 0;
        color: #333;
        line-height: 1.6;
        background-color: #f9f9f9;
        font-family: 'Arial', sans-serif;
    }

    select.input-field {
        appearance: none;
        background-color: #fff;
        background-size: 12px 12px;
        background-repeat: no-repeat;
        background-position: right 10px center;
        background-image: url("data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'><path fill='none' d='M0 0h20v20H0z'/><path fill='%23333' d='M7 8l3 3 3-3H7z'/></svg>");
    }

    .form-container {
        padding: 20px;
        max-width: 1200px;
        margin: 20px auto;
        border-radius: 8px;
        background-color: #fff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .form-title {
        color: #444;
        font-size: 1.8rem;
        text-align: center;
        margin-bottom: 20px;
    }

    .product-form {
        gap: 20px;
        display: flex;
        flex-direction: column;
    }

    .input-group {
        display: flex;
        flex-direction: column;
    }

    .label {
        color: #555;
        font-size: 1rem;
        margin-bottom: 8px;
    }

    .input-field,
    .input-number,
    .file-input {
        padding: 10px;
        outline: none;
        font-size: 1rem;
        border-radius: 4px;
        border: 1px solid #ddd;
        transition: border 0.3s ease;
    }

    .input-field:focus,
    .input-number:focus,
    .file-input:focus {
        border-color: #007bff;
    }

    .file-input {
        padding: 6px;
    }

    .image-preview {
        margin-top: 10px;
    }

    .preview-text {
        color: #666;
        font-size: 0.9rem;
        margin-bottom: 10px;
    }

    .image-wrapper {
        gap: 10px;
        display: flex;
        flex-wrap: wrap;
    }

    .image-item {
        width: 80px;
        height: 80px;
        overflow: hidden;
        border-radius: 4px;
        position: relative;
        border: 1px solid #ddd;
    }

    .image-thumbnail {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .remove-btn {
        top: 4px;
        right: 4px;
        width: 20px;
        height: 20px;
        border: none;
        color: #fff;
        cursor: pointer;
        font-size: 0.8rem;
        border-radius: 50%;
        position: absolute;
        background: #ff4d4d;
    }

    .remove-btn:hover {
        background: #e60000;
    }

    .variants-group {
        margin-top: 20px;
    }

    .variants-title {
        color: #444;
        font-size: 1.5rem;
        margin-bottom: 10px;
    }

    .variant-item {
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 20px;
        border: 1px solid #ddd;
        background-color: #f8f8f8;
    }

    .sizes-group {
        margin-top: 15px;
    }

    .size-item {
        gap: 10px;
        display: flex;
        margin-bottom: 10px;
    }

    .add-size-btn,
    .add-variant-btn {
        border: none;
        color: #fff;
        cursor: pointer;
        padding: 8px 12px;
        font-size: 0.9rem;
        border-radius: 4px;
        background-color: #007bff;
        transition: background 0.3s ease;
    }

    .add-size-btn:hover,
    .add-variant-btn:hover {
        background-color: #0056b3;
    }

    .remove-size-btn {
        border: none;
        padding: 8px;
        color: #fff;
        cursor: pointer;
        border-radius: 4px;
        background-color: #ff4d4d;
    }

    .remove-size-btn:hover {
        background-color: #e60000;
    }

    .submit-btn-container {
        display: flex;
        margin-top: 20px;
        justify-content: center;
    }

    .submit-btn {
        border: none;
        color: #fff;
        font-size: 1rem;
        cursor: pointer;
        border-radius: 4px;
        padding: 10px 20px;
        background-color: #28a745;
        transition: background 0.3s ease;
    }

    .submit-btn:disabled {
        background-color: #ccc;
        cursor: not-allowed;
    }

    .submit-btn:hover:enabled {
        background-color: #218838;
    }

    @media (max-width: 768px) {
        .form-container {
            padding: 15px;
        }

        .form-title {
            font-size: 1.5rem;
        }

        .input-field,
        .input-number,
        .file-input {
            font-size: 0.9rem;
        }

        .variant-item {
            padding: 10px;
        }

        .submit-btn {
            padding: 8px 16px;
            font-size: 0.9rem;
        }
    }

    @media (max-width: 480px) {
        .image-wrapper {
            flex-direction: column;
        }

        .size-item {
            gap: 5px;
            flex-direction: column;
        }

        .add-size-btn,
        .add-variant-btn {
            font-size: 0.8rem;
            padding: 6px 10px;
        }

        .submit-btn {
            font-size: 0.8rem;
            padding: 6px 12px;
        }
    }
</style>