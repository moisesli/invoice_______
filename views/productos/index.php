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
      Todos los Productos {{name}}
    </h1>

    <!-- Table -->
    <div class="max-w-2xl mx-auto">
      <div class="flex flex-col">
        <div class="overflow-x-auto shadow-md sm:rounded-lg">
          <div class="inline-block min-w-full align-middle">
            <div class="overflow-hidden ">
              <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700">
                <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                  <th scope="col" class="p-4">
                    <div class="flex items-center">
                      <input id="checkbox-all" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                      <label for="checkbox-all" class="sr-only">checkbox</label>
                    </div>
                  </th>
                  <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                    Producto Nombre
                  </th>
                  <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                    Categoria
                  </th>
                  <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                    Precio
                  </th>
                  <th scope="col" class="p-4">
                    <span class="sr-only">Edit</span>
                  </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700" v-for="item in items">
                  <td class="p-4 w-4">
                    <div class="flex items-center">
                      <input id="checkbox-table-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                      <label for="checkbox-table-1" class="sr-only">checkbox</label>
                    </div>
                  </td>
                  <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">Apple Imac 27"</td>
                  <td class="py-4 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">Desktop PC</td>
                  <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">$1999</td>
                  <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                    <a href="#" class="text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
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