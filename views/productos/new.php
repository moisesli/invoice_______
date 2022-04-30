<div id="app">
  <!-- Bread Crum -->
  <nav class="flex mb-5" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2">
      <li class="inline-flex items-center">
        <a href="#" class="text-gray-700 hover:text-gray-900 inline-flex items-center">
          <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20"
               xmlns="http://www.w3.org/2000/svg">
            <path
              d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
          </svg>
          Home
        </a>
      </li>
      <li>
        <div class="flex items-center">
          <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
               xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                  clip-rule="evenodd"></path>
          </svg>
          <a href="#" class="text-gray-700 hover:text-gray-900 ml-1 md:ml-2 text-sm font-medium">
            Productos
          </a>
        </div>
      </li>
      <li>
        <div class="flex items-center">
          <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
               xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                  clip-rule="evenodd"></path>
          </svg>
          <span class="text-gray-400 ml-1 md:ml-2 text-sm font-medium" aria-current="page">
          Nuevo
        </span>
        </div>
      </li>
    </ol>
  </nav>

  <!-- Title -->
  <h1 class="text-xl sm:text-2xl mb-12 font-semibold text-gray-600">
    Nuevo Producto
  </h1>

  <div class="max-w-2xl mx-auto">
    <div class="flex flex-col bg-white px-6 py-8 rounded-lg shadow-md">
      <!-- Primera Fila -->
      <div class="flex flex-col md:flex-row">
        <div class="md:w-7/12 md:mr-3">
          <label_>Nombre del  Producto</label_>
          <input_ type="text" v-model="item.nombre" placeholder="Nombre del Producto"></input_>
        </div>
        <div class="md:w-3/12 md:mr-3">
          <label_>Codigo</label_>
          <input_ type="text" v-model="item.codigo" placeholder="Codigo"></input_>
        </div>
        <div class="md:w-2/12">
          <label_>Stock</label_>
          <input_ type="text" v-model="item.stock" placeholder="Stock"></input_>
        </div>
      </div>
      <!-- Segunda Fila -->
      <div class="flex flex-col md:flex-row mt-5">
        <div class="md:w-3/12 md:mr-3">
          <label_>Unidad</label_>
          <select v-model="item.unidad" class="bg-white pr-2 border border-gray-300 text-gray-900 sm:text-base rounded-lg focus:outline-none focus:border-cyan-600 focus:ring-cyan-600 focus:ring-2 block w-full p-2.5">
            <option value="1">UND</option>
            <option value="2">Kg</option>
          </select>
        </div>
        <div class="md:w-3/12 md:mr-3">
          <label_>Subtotal</label_>
          <input_ type="text" v-model="item.precio_sin_igv" class="text-right" placeholder="23.00"></input_>
        </div>
        <div class="md:w-3/12 md:mr-3">
          <label_>IGV</label_>
          <input_ type="text" class="text-right" v-model="item.igv" placeholder="Codigo"></input_>
        </div>
        <div class="md:w-3/12">
          <label_>Total</label_>
          <input_ type="text" v-model="item.precio_con_igv" class="text-right" placeholder="100.00"></input_>
        </div>
      </div>
      <!-- Button Guardar -->
      <div class="flex justify-end mt-5">
        <button_ color="cyan" @click="sendItem()"><i class="fa fa-save pr-1"></i> Guardar</button_>
      </div>
    </div>
  </div>
</div>
<script type="application/javascript">
  const {createApp} = Vue;
  const app = createApp({
    data() {
      return {
        item: {
          nombre: "Arroz Costenio Graneadito 1 Kg",
          codigo: "ARRZDF",
          stock: "234",
          unidad: "1",
          precio_sin_igv: "3.56",
          igv: "0.60",
          precio_con_igv: "4.20"
        }
      }
    },
    methods: {
      sendItem: function (){
        console.log(this.item)
      }
    }
  })
  app.component('input_', {
    template: `
      <input
        :type="type"
        :value="modelValue"
        @change="$emit('update:modelValue', $event.target.value)"
        class="
          bg-white
          border border-gray-300
          text-gray-700 sm:text-base
          rounded-lg
          focus:outline-none focus:border-cyan-600 focus:ring-cyan-600 focus:ring-2
          block w-full p-2.5"
        :placeholder="placeholder" />`,
    props: {
      type: String,
      placeholder: String,
      modelValue: String
    }
  });
  app.component('label_', {
    template: `<label class="text-xs font-medium text-gray-400 block mb-1"><slot></slot></label>`,
  });
  app.component('button_', {
    template: `<button type="button"
      :class="[
          this.color == 'cyan' ? 'text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-base px-5 py-3 w-full sm:w-auto text-center' : ''
      ]"
      :disabled="disabled"><slot></slot></button>`,
    props: {
      color: String,
      disabled: Boolean
    }
  });
  app.mount('#app');
</script>