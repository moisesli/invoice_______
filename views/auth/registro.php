<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lineysoft</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <script src="https://unpkg.com/vue@next"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body class="bg-gray-100">
<main class="bg-gray-50" id="app">
  
  <div class="mx-auto md:h-screen flex flex-col justify-center items-center px-6 pt-8 pt:mt-0">
    
    <div class="bg-white shadow rounded-lg md:mt-0 w-full sm:max-w-screen-md">
      <div class="px-16 py-11 ">
        
        <a href="#" class="font-semibold flex  items-center mb-8 lg:mb-10">
          <img src="https://demo.themesberg.com/windster/images/logo.svg" class="h-10 mr-4" alt="Windster Logo">
          <span class="self-center text-3xl font-bold whitespace-nowrap">Lineysoft</span> - <span class="text-gray-600 font-normal text-2xl pl-2">Registro</span>
        </a>
        
        <form class="mt-8 space-y-6" v-on:submit.prevent="sendRegistro">
          
          <!-- Nombre y correo -->
          <div class="flex">
            <div class="w-6/12 mr-2">
              <label_>Nombre</label_>
              <input_ type="text" v-model="register.nombre" placeholder="Juan Perez"></input_>
            </div>
            <div class="w-6/12 pl-2">
              <label_>Correo</label_>
              <input_ type="email" v-model="register.email" placeholder="tucorreo@gmail.com"></input_>
            </div>
          </div>
          
          <!-- Password -->
          <div class="flex">
            <div class="w-1/2 mr-2">
              <label_>Contraseña</label_>
              <input_ type="password" v-model="register.password" placeholder="********"></input_>
            </div>
            <div class="w-1/2 pl-2">
              <label_>Repetir Contraseña</label_>
              <input_ type="password" v-model="register.repassword" placeholder="********"></input_>
            </div>
          </div>
          
          <!-- Ruc and Razon Social -->
          <div class="flex">
            <div class="w-4/12 mr-2">
              <label_>RUC</label_>
              <input_ type="text" v-model="register.ruc" placeholder="elnaufrago2009@gmail.com"></input_>
            </div>
            <div class="w-8/12 pl-2">
              <label_>Razon Social</label_>
              <input_ type="text" v-model="register.razon_social" placeholder="elnaufrago2009@gmail.com"></input_>
            </div>
          </div>
  
          <!-- Telefono and Address -->
          <div class="flex">
            <div class="w-4/12 mr-2">
              <label_>Telefono (opcional)</label_>
              <input_ type="text" v-model="register.telefono" placeholder="elnaufrago2009@gmail.com"></input_>
            </div>
            <div class="w-8/12 pl-2">
              <label_>Direccion</label_>
              <input_ type="text" v-model="register.direccion" placeholder="Av. los proceres #567 cerca a juan more"></input_>
            </div>
          </div>
          
          
          <div class="flex items-start">
            <div class="flex items-center h-5">
              <input id="remember" aria-describedby="remember" name="remember" type="checkbox" class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-cyan-200 h-4 w-4 rounded">
            </div>
            <div class="text-sm ml-3">
              <label for="re2member" class="font-medium text-gray-900">Aceptar
                <a href="#" class="text-teal-500 hover:underline">Los terminos y condiciones</a>
              </label>
            </div>
          </div>
          <button__><i class="fa fa-cog"></i> Registrar</button__>
          <div class="text-sm font-medium text-gray-500">
            Ya tienes una cuenta?
            <a href="/"
               class="text-teal-500 hover:underline">Entra Aqui</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>
<script type="application/javascript">
  const {createApp} = Vue;
  const app = createApp({
    data() {
      return {
        message: 'salio',
        register: {
          email: 'elnaufrago2009@gmail.com',
          nombre: 'Juan Perez Mamani Mamani',
          password: 'moiseslinar3s',
          repassword: 'moiseslinar3s',
          ruc: '10425162530',
          razon_social: 'Lineysoft Sociedad Anonima Cerrada S.A.C.',
          telefono: '954763896',
          direccion: 'Av. los proceres #567 cerca a juan more'
        },
        item: {
          email: 'elnaufrago2009@gmail.com',
          password: 'moiseslinar3s'
        }
      }
    },
    methods: {
      sendRegistro: function () {
        console.log(this.register)
        /*axios.post('./api/registro', JSON.stringify(this.register)).then(res => {
          console.log(res.data);
        })*/
      }
    }
  });
  
  //components
  <?php require_once "./views/components/input_.js"; ?>
  <?php require_once "./views/components/label_.js"; ?>
  <?php require_once "./views/components/button__.js"; ?>
  app.mount('#app');
</script>
</body>

</html>