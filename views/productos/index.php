<?php include './views/layouts/dashboard/header.php'; ?>
  <div class="m-3" id="app">

    <!-- Bread Crum -->
    <nav class="flex mb-5" aria-label="Breadcrumb">
      <ol class="inline-flex items-center space-x-1 md:space-x-2">
        <li class="inline-flex items-center">
          <a href="#" class="text-gray-700 hover:text-gray-900 inline-flex items-center">
            <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
            </svg>
            Home
          </a>
        </li>
        <li>
          <div class="flex items-center">
            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
            </svg>
            <a href="#" class="text-gray-700 hover:text-gray-900 ml-1 md:ml-2 text-sm font-medium">E-commerce</a>
          </div>
        </li>
        <li>
          <div class="flex items-center">
            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
            </svg>
            <span class="text-gray-400 ml-1 md:ml-2 text-sm font-medium" aria-current="page">Products</span>
          </div>
        </li>
      </ol>
    </nav>

    <!-- Title -->
    <h1 class="text-xl sm:text-2xl mb-12 font-semibold text-gray-900">
      Todos los Productos
    </h1>

    <!-- Table -->
    <div class="max-w-4xl mx-auto">
      <div class="flex flex-col">
        <!-- Button New -->
        <div class="flex justify-end">
          <a href="/productos/new" class="px-2 py-2.5 bg-cyan-600 m-2 rounded-md text-white font-medium text-sm">
            <i class="fa fa-plus px-1 font-bold"></i>
            Nuevo Producto
          </a>
        </div>
        <div class="overflow-x-auto shadow-md sm:rounded-lg">
          <div class="inline-block min-w-full align-middle">
            <div class="overflow-hidden ">
              <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700">
                <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                  <th scope="col" class="py-3 px-6 text-xs font-medium text-left dark:text-gray-400">
                    #
                  </th>
                  <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                    Producto Nombre
                  </th>
                  <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                    Codigo
                  </th>
                  <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                    Subtotal
                  </th>
                  <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                    IGV
                  </th>
                  <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                    Total
                  </th>
                  <th scope="col" class="py-3 px-6 text-xs font-medium text-left text-gray-700 uppercase dark:text-gray-400">
                    Acciones
                  </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700" v-for="(item, index) in items">
                  <td class="p-4 w-4 text-sm font-medium text-gray-900 dark:text-white">
                    {{index+1}}
                  </td>
                  <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ item.nombre }}
                  </td>
                  <td class="py-4 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">
                    {{ item.codigo }}
                  </td>
                  <td class="py-4 px-6 text-sm font-medium text-right text-gray-900 whitespace-nowrap dark:text-white">
                    {{ item.precio_sin_igv }}
                  </td>
                  <td class="py-4 px-6 text-sm font-medium text-right text-gray-900 whitespace-nowrap dark:text-white">
                    {{ item.igv }}
                  </td>
                  <td class="py-4 px-6 text-sm font-medium text-right text-gray-900 whitespace-nowrap dark:text-white">
                    {{ item.precio_con_igv }}
                  </td>
                  <td class="py-2 px-6 text-sm font-medium whitespace-nowrap text-center">
                    <i class="fa-solid fa-ellipsis-vertical text-xl text-gray-700 px-2 dark:text-white"></i>
                  </td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <script type="application/javascript">
    const {createApp} = Vue;
    const app = createApp({
      data() {
        return {
          name: "moises",
          items: []
        }
      },
      methods: {
        loadItems(){
          axios.post('./api/productos/list').then(res => {
              this.items = res.data.items
                console.log(res.data)
          })
        }
      },
      mounted(){
        this.loadItems();
      }
    });
    app.mount('#app');
  </script>
<?php include './views/layouts/dashboard/footer.php'; ?>