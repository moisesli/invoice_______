<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lineysoft</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
  <link rel="stylesheet" href="https://demo.themesberg.com/windster/app.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <script src="https://unpkg.com/vue@next"></script>
</head>

<body class="bg-gray-50">
<main class="bg-gray-50" id="app">
  <div class="mx-auto md:h-screen flex flex-col justify-center items-center px-6 pt-8 pt:mt-0">
    <a href="https://demo.themesberg.com/windster/"
       class="text-2xl font-semibold flex justify-center items-center mb-8 lg:mb-10">
      <img src="https://demo.themesberg.com/windster/images/logo.svg" class="h-10 mr-4" alt="Windster Logo">
      <span class="self-center text-2xl font-bold whitespace-nowrap">Lineysoft</span>
    </a>

    <div class="bg-white shadow rounded-lg md:mt-0 w-full sm:max-w-screen-sm xl:p-0">
      <div class="p-6 sm:p-8 lg:p-16 space-y-8">
        <h2 class="text-2xl lg:text-3xl font-bold text-gray-900">
          Create una Cuenta
        </h2>
        <form class="mt-8 space-y-6" action="#">
          <div>
            <label for="email" class="text-sm font-medium text-gray-900 block mb-2">Your email</label>
            <inputform type="email" v-model="item.email" placeholder="elnaufrago2009@gmail.com"></inputform>
          </div>
          <div>
            <label for="password" class="text-sm font-medium text-gray-900 block mb-2">Your password</label>
            <input type="password" name="password" id="password" placeholder="••••••••"
                   class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                   required>
          </div>
          <div>
            <label for="confirm-password" class="text-sm font-medium text-gray-900 block mb-2">Confirm password</label>
            <input type="password" name="confirm-password" id="confirm-password" placeholder="••••••••"
                   class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                   required>
          </div>
          <inputform></inputform>
          <div class="flex items-start">
            <div class="flex items-center h-5">
              <input id="remember" aria-describedby="remember" name="remember" type="checkbox" class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-cyan-200 h-4 w-4 rounded" required>
            </div>
            <div class="text-sm ml-3">
              <label for="re2member" class="font-medium text-gray-900">I accept the
                <a href="#" class="text-teal-500 hover:underline">Terms and Conditions</a>
              </label>
            </div>
          </div>
          <button type="submit" class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-base px-5 py-3 w-full sm:w-auto text-center">
            Create account
          </button>
          <div class="text-sm font-medium text-gray-500">
            Already have an account?
            <a href="https://demo.themesberg.com/windster/authentication/sign-in/" class="text-teal-500 hover:underline">Login here</a>
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
        item: {
          email: ''
        }
      }
    },
    methods: {}
  });

  app.component('inputform',{
    template: `
      <input :type="type" :value="modelValue" @change="$emit('update:modelValue', $event.target.value)" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" :placeholder="placeholder" />
    `,
    props: {
      type: String,
      placeholder: String,
      modelValue: String
    }
  });
  app.mount('#app');
</script>
</body>

</html>