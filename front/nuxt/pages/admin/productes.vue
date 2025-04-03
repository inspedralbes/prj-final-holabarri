<template>
    <main>
        <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5  ">
            <div class="w-full mb-1 mt-16">
                <div class="mb-4">
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl ">Tots els productes</h1>
                </div>
                <!-- Barra de búsqueda + botones -->
                <div class="items-center justify-between block sm:flex md:divide-x md:divide-gray-100 ">
                    <div class="flex items-center mb-4 sm:mb-0">
                        <form class="sm:pr-3" action="#" method="GET">
                            <label for="products-search" class="sr-only">Search</label>
                            <div class="relative w-48 mt-1 sm:w-64 xl:w-96">
                                <input type="text" name="email" id="products-search"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5      "
                                    placeholder="Buscar productes...">
                            </div>
                        </form>
                        <div class="flex items-center w-full sm:justify-end">
                            <div class="flex pl-2 space-x-1">
                                <a href="#"
                                    class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100   ">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                                <a href="#"
                                    class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100   ">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                                <a href="#"
                                    class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100   ">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                                <a href="#"
                                    class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100   ">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <button id="createProductButton" @click="toggleCard('crear')"
                        class="inline-flex items-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                        type="button" data-drawer-target="drawer-create-product-default"
                        data-drawer-show="drawer-create-product-default" aria-controls="drawer-create-product-default"
                        data-drawer-placement="right">
                        Afegir nou producte
                    </button>
                </div>
            </div>
        </div>
        <!-- Tabla de productos -->
        <div class="flex flex-col">
            <div class="overflow-x-auto">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden shadow">
                        <table class="min-w-full divide-y divide-gray-200 table-fixed ">
                            <thead class="bg-gray-100 ">
                                <tr>
                                    <th scope="col" class="p-4">
                                        <div class="flex items-center">
                                            <input id="checkbox-all" aria-describedby="checkbox-1" type="checkbox"
                                                class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300">
                                            <label for="checkbox-all" class="sr-only">checkbox</label>
                                        </div>
                                    </th>
                                    <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase ">
                                        Nom de producte
                                    </th>
                                    <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase ">
                                        Subcategoria
                                    </th>
                                    <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase ">
                                        Descripció
                                    </th>
                                    <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase ">
                                        Precio
                                    </th>
                                    <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase ">
                                        Visible
                                    </th>
                                    <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase ">
                                        Accions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200  ">
                                <tr v-for="producto in productos" class="hover:bg-gray-100 ">
                                    <td class="w-4 p-4">
                                        <div class="flex items-center">
                                            <input id="checkbox-633293" aria-describedby="checkbox-1" type="checkbox"
                                                class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300">
                                            <label for="checkbox-633293" class="sr-only">checkbox</label>
                                        </div>
                                    </td>
                                    <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap ">
                                        <div class="text-base font-semibold text-gray-900 ">
                                            {{ producto.nombre }}
                                        </div>
                                        <div class="text-sm font-normal text-gray-500 ">Info de algo
                                        </div>
                                    </td>
                                    <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap ">
                                        {{ producto.subcategoria }}</td>
                                    <td
                                        class="max-w-sm p-4 overflow-hidden text-base font-normal text-gray-500 truncate xl:max-w-xs ">
                                        {{ producto.descripcion }}</td>
                                    <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap ">
                                        {{ producto.precio }}€</td>
                                    <!-- <td
                                        class="p-4 text-base font-medium text-gray-900 whitespace-nowrap ">
                                        {{ producto.stock ? producto.stock : 'N/A' }}</td>
                                    <td
                                        class="p-4 text-base font-medium text-gray-900 whitespace-nowrap ">
                                        {{ producto.descuento ? producto.descuento : 'No' }}</td> -->
                                    <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap ">
                                        <label class="relative inline-block">
                                            <input type="checkbox" @click="cambiarVisibilidad(producto.id)"
                                                class="peer invisible" :checked="producto.visible === 1" />
                                            <span
                                                class="absolute top-0 left-0 w-9 h-5 cursor-pointer rounded-full bg-slate-200 border border-slate-300 transition-all duration-100 peer-checked:bg-[#276BF2]"></span>
                                            <span
                                                class="absolute top-0.5 left-0.5 w-4 h-4 bg-white rounded-full z-10 transition-all duration-100 peer-checked:translate-x-4"></span>
                                        </label>
                                    </td>

                                    <td class="p-4 space-x-2 whitespace-nowrap">
                                        <button type="button" id="updateProductButton" @click="editarProd(producto.id)"
                                            data-drawer-target="drawer-update-product-default"
                                            data-drawer-show="drawer-update-product-default"
                                            aria-controls="drawer-update-product-default" data-drawer-placement="right"
                                            class="inline-flex items-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                                </path>
                                                <path fill-rule="evenodd"
                                                    d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            Editar
                                        </button>
                                        <button type="button" id="deleteProductButton"
                                            @click="selectIdProdToDelete(producto.id)"
                                            data-drawer-target="drawer-delete-product-default"
                                            data-drawer-show="drawer-delete-product-default"
                                            aria-controls="drawer-delete-product-default" data-drawer-placement="right"
                                            class="inline-flex items-center bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            Eliminar item
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="backgroundShadow" class="bg-gray-900/50 fixed inset-0 z-40"></div>
        <!-- Edit Product Drawer -->
        <div v-if="isOpen['editar']" id="drawer-update-product-default"
            class="fixed top-0 right-0 z-40 w-full h-screen max-w-xs p-4 overflow-y-auto transition-transform bg-white "
            aria-labelledby="drawer-label">
            <h5 id="drawer-label" class="inline-flex items-center mb-6 text-sm font-semibold text-gray-500 uppercase ">
                Editar producte</h5>
            <button type="button" data-drawer-dismiss="drawer-update-product-default" @click="toggleCard('editar')"
                aria-controls="drawer-update-product-default"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close menu</span>
            </button>
            <form @submit.prevent="guardarProd">
                <div class="space-y-4">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Nom de
                            producte</label>
                        <input type="text" name="title" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            v-model="productoActual.nombre" placeholder="Camiseta negra" required>
                    </div>
                    <div>
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 ">Subcategoria</label>
                        <select id="category" v-model="productoActual.subcategoria_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                            <option v-for="subcategoria in subcategorias" :key="subcategoria.id"
                                :value="subcategoria.id" data-v-inspector="pages/admin/productes.vue:358:29">
                                {{ subcategoria.name }}
                            </option>
                        </select>
                    </div>
                    <div>
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 ">Precio</label>
                        <input type="number" name="price" id="price"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            v-model="productoActual.precio" step="any" @input="handleInput" placeholder="100€" required>
                    </div>
                    <div>
                        <label for="descompte" class="block mb-2 text-sm font-medium text-gray-900 ">Descompte</label>
                        <input type="number" name="descompte" id="descompte"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            v-model="productoActual.descuento" placeholder="5%">
                    </div>
                    <div>
                        <label for="stock" class="block mb-2 text-sm font-medium text-gray-900 ">Stock</label>
                        <input type="number" name="stock" id="stock"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5      "
                            v-model="productoActual.stock" placeholder="10">
                    </div>
                    <div>
                        <label for="description"
                            class="block mb-2 text-sm font-medium text-gray-900 ">Descripción</label>
                        <textarea id="description" rows="4" required
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500      "
                            placeholder="Camiseta blanca 100% algodón" v-model="productoActual.descripcion"></textarea>
                    </div>
                    <div>
                        <label for="imagenPrincipal" class="block mb-2 text-sm font-medium text-gray-900 ">Imatge
                            del producte</label>
                        <input type="file" accept="image/*" @change="handleImageEditar" id="imagenPrincipal"
                            name="imagenPrincipal"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500      " />
                        <div v-if="productoActual.imagen" class="image-preview">
                            <p class="text-white">Vista prèvia de la imatge:</p>
                            <div class="image-container">
                                <img :src="productoNuevo.imagen" alt="Vista prèvia" class="image-thumbnail" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bottom-0 left-0 flex justify-center w-full pb-4 mt-4 space-x-4 sm:absolute sm:px-4 sm:mt-0">
                    <button @submit.prevent="guardarProd"
                        class="inline-flex items-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Guardar
                    </button>
                </div>
            </form>
        </div>

        <!-- Delete Product Drawer -->
        <div v-if="isOpen['eliminar']"
            class="fixed left-0 right-0 z-50 items-center justify-center overflow-x-hidden overflow-y-auto top-4 md:inset-0 h-modal sm:h-full flex"
            id="delete-user-modal" aria-modal="true" role="dialog">
            <div class="relative w-full h-full max-w-md px-4 md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow ">
                    <!-- Modal header -->
                    <div class="flex justify-end p-2">
                        <button type="button" @click="toggleCard('eliminar')"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center  "
                            data-modal-hide="delete-user-modal">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 pt-0 text-center">
                        <svg class="w-16 h-16 mx-auto text-red-600" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="mt-5 mb-6 text-lg text-gray-500 ">Está seguro que desea eliminar el
                            producto?</h3>
                        <button type="button" @click="eliminarProducto(id_producto_eliminar)"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2">
                            Si, estoy seguro
                        </button>
                        <button type="button" @click="toggleCard('eliminar')"
                            class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center"
                            data-modal-hide="delete-user-modal">
                            No, cancelar
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Product Drawer -->
        <div v-if="isOpen['crear']"
            class="fixed left-0 right-0 z-50 items-center justify-center overflow-x-hidden overflow-y-auto top-4 md:inset-0 h-modal sm:h-screen flex"
            id="edit-user-modal" aria-modal="true" role="dialog">
            <div class="relative w-full h-screen max-w-2xl px-4">
                <div class="relative bg-white rounded-lg shadow ">
                    <div class="flex items-start justify-between p-5 border-b rounded-t ">
                        <h3 class="text-xl font-semibold ">
                            Afegir producte
                        </h3>
                        <button type="button" @click="toggleCard('crear')"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center  "
                            data-modal-toggle="edit-user-modal">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="p-6 space-y-6">
                        <form @submit.prevent="crearProducto">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="nom-producte" class="block mb-2 text-sm font-medium text-gray-900 ">Nom
                                        del
                                        producte</label>
                                    <input type="text" name="nom-producte" id="nom-producte"
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5      "
                                        v-model="productoNuevo.nombre" placeholder="Samarreta blanca" required>
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="category"
                                        class="block mb-2 text-sm font-medium text-gray-900 ">Subcategoria</label>
                                    <select id="category" v-model="productoNuevo.subcategoria_id"
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5      ">
                                        <option v-for="subcategoria in subcategorias" :key="subcategoria.id"
                                            :value="subcategoria.id"
                                            data-v-inspector="pages/admin/productes.vue:358:29">
                                            {{ subcategoria.name }}
                                        </option>
                                    </select>
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="precio"
                                        class="block mb-2 text-sm font-medium text-gray-900 ">Precio</label>
                                    <input type="number" name="precio" id="precio"
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5      "
                                        v-model="productoNuevo.precio" step="any" @input="handleInput"
                                        placeholder="10.99" required>
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="stock"
                                        class="block mb-2 text-sm font-medium text-gray-900 ">Stock</label>
                                    <input type="number" name="stock" id="stock"
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5      "
                                        v-model="productoNuevo.stock" placeholder="10" required>
                                </div>
                                <div class="col-span-6">
                                    <label for="descripcion"
                                        class="block mb-2 text-sm font-medium text-gray-900 ">Descripció
                                        del producte</label>
                                    <textarea id="descripcion" required rows="4"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500      "
                                        v-model="productoNuevo.descripcion"></textarea>
                                </div>
                                <div class="col-span-6">
                                    <label for="imagenPrincipal"
                                        class="block mb-2 text-sm font-medium text-gray-900 ">Imatge
                                        del producte</label>
                                    <input type="file" accept="image/*" @change="handleImageCrear" id="imagenPrincipal"
                                        name="imagenPrincipal"
                                        class="w-full p-3 text-sm rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500      "
                                        required />
                                    <div v-if="productoNuevo.imagen" class="image-preview">
                                        <p class="text-white">Vista prèvia de la imatge:</p>
                                        <div class="image-container">
                                            <img :src="productoNuevo.imagen.url" alt="Vista prèvia"
                                                class="image-thumbnail" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="items-center pt-5 border-t border-gray-200 rounded-b ">
                                <button
                                    class="inline-flex items-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-8 rounded"
                                    type="submit" @submit.prevent="crearProducto">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<style scoped>
.image-preview {
    margin-top: 10px;
}

.image-container {
    width: 200px;
    height: 200px;
}

.image-thumbnail {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.preview-text {
    font-size: 0.9rem;
    margin-bottom: 10px;
}
</style>

<script setup>
const { $communicationManager } = useNuxtApp();
import { useAuthStore } from '../../stores/authStore';

const authStore = useAuthStore();
const token = computed(() => authStore.token);
const user = ref(authStore.user);
const comercio = ref(authStore.comercio);

const subcategorias = ref();

const productos = reactive([]);
const productoActual = ref({
    'id': '',
    'nombre': '',
    'descripcion': '',
    'subcategoria': '',
    'subcategoria_id': '',
    'precio': '',
    'stock': '',
    'visible': '',
    'comercio_id': '',
    'comercio': '',
    'imagen': '',
});

const productoNuevo = ref({
    'nombre': '',
    'descripcion': '',
    'subcategoria_id': '',
    'subcategoria': '',
    'precio': '',
    'stock': '',
    'imagen': null,
});

const id_producto_eliminar = ref();

definePageMeta({
    layout: 'admin',
});

const backgroundShadow = ref(false);

const isOpen = reactive({
    'editar': false,
    'eliminar': false,
    'crear': false,
});

const handleInput = (event) => {
    const value = event.target.value.replace(',', '.');
    productoActual.value.precio = parseFloat(value) || '';
};

function toggleCard(menu) {
    isOpen[menu] = !isOpen[menu];
    backgroundShadow.value = !backgroundShadow.value
}

function selectIdProdToDelete(id) {
    toggleCard('eliminar');
    id_producto_eliminar.value = id;
}

async function eliminarProducto(id) {
    const data = await $communicationManager.eliminarProducto(id);
    if (data.success) {
        const index = productos.findIndex(product => product.id === id);
        if (index !== -1) {
            productos.splice(index, 1);
            toggleCard('eliminar');
        }
    } else {
        // console.log('Error: ' + data.message);
    }
}

async function cambiarVisibilidad(id) {
    const data = ref();
    setTimeout(async () => {
        data.value = await $communicationManager.cambiarVisibilidad(id);
    }, 500);
    if (data.success && productos[id]) {
        productos[id].visible = !productos[id].visible
    }
}

const closeAll = (e) => {
    if (e.key === "Escape") {
        isOpen['editar'] = false;
        isOpen['eliminar'] = false;
        isOpen['crear'] = false;
        backgroundShadow.value = false;
    }
};

async function fetchSubcategorias(categoria_id) {
    const result = await $communicationManager.getSubcategoriasByCategoriaId(categoria_id);

    if (result && result.success && result.data) {
        return result.data;
    } else {
        console.error("No se pudieron obtener las subcategorías");
    }
};

function handleImageCrear(event) {
    const file = event.target.files[0];

    if (file) {
        productoNuevo.value.imagen = {
            file,
            url: URL.createObjectURL(file),
        };
    }
};

function handleImageEditar(event) {
    const file = event.target.files[0];

    if (file) {
        productoActual.value.imagen = {
            file,
            url: URL.createObjectURL(file),
        };
    }
};

async function editarProd(id) {
    toggleCard('editar');
    const data = await $communicationManager.infoProducto(id);
    productoActual.value = data;
}

async function guardarProd() {
    const formData = new FormData();
    // formData.append("id", productoActual.value.id);
    formData.append("nombre", productoActual.value.nombre);
    formData.append("descripcion", productoActual.value.descripcion);
    formData.append("subcategoria_id", productoActual.value.subcategoria_id);
    formData.append("comercio_id", comercio.value.id);
    formData.append("precio", productoActual.value.precio);
    if (productoActual.value.stock) {
        formData.append("stock", productoActual.value.stock);
    }
    if (productoActual.value.imagen !== null && productoActual.value.imagen.file) {
        formData.append("imagen", productoActual.value.imagen.file);
    }

    const data = await $communicationManager.guardarProducto(formData, productoActual.value.id);
    if (data.data) {
        const index = productos.findIndex(prod => prod.id === data.data.id);
        if (index !== -1) {
            productos[index] = { ...productoActual.value };
        }
    }
    toggleCard('editar');
}

async function crearProducto() {
    const formData = new FormData();
    formData.append("nombre", productoNuevo.value.nombre);
    formData.append("descripcion", productoNuevo.value.descripcion);
    formData.append("subcategoria_id", productoNuevo.value.subcategoria_id);
    formData.append("comercio_id", comercio.value.id);
    formData.append("precio", productoNuevo.value.precio || "");
    formData.append("stock", productoNuevo.value.stock);
    formData.append("imagen", productoNuevo.value.imagen.file);

    // for (const [key, value] of formData.entries()) {
    //     console.log(`${key}:`, value);
    // }
    const result = await $communicationManager.createProducto(formData);
    // console.log(formData);

    if (result && result.success) {
        toggleCard('crear');
        productoNuevo.value = result.data.producto;
        productoNuevo.value.subcategoria = result.data.producto.subcategoria.name;
        // console.log("PRODUCTO NUEVO:", productoNuevo.value);
        productos.push(productoNuevo.value);
        productoNuevo.value = {
            'nombre': '',
            'descripcion': '',
            'subcategoria_id': '',
            'subcategoria': '',
            'precio': '',
            'stock': '',
            'imagen': null,
        };
    } else {
        console.error("Error en la creación del producto:", result?.message || "Error desconocido");
    }
};

onMounted(async () => {
    document.addEventListener('keydown', closeAll);
    subcategorias.value = await fetchSubcategorias(comercio?.value?.categoria_id);
    // console.log(comercio?.value?.categoria_id);

    // console.log('Comercio (toRaw):', toRaw(authStore.comercio)); // Muestra el objeto real
    // º('Comercio (JSON):', JSON.stringify(authStore.comercio, null, 2)); // JSON legible
    // console.log('Comercio (copia):', { ...authStore.comercio }); // Copia sin reactividad
});

onBeforeMount(async () => {
    const data = await $communicationManager.getByComercio();
    Object.assign(productos, data);
    // console.log(productos);
});
</script>