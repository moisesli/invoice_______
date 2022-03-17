<?php include './views/layouts/header.php'; ?>
    <div id="app">
        {{ item.correousuario }}
    </div>
    <script type="application/javascript">
        const {
            createApp
        } = Vue;
        const app = createApp({
            data() {
                return {
                    item: {
                        correousuario: 'elnaufrago2009@gmail.com',
                        password: 'moiseslinar3s',
                    },
                    error: {
                        success: false,
                        message: "Algunos datos introducidos no estan correctos o la contraseña es invalida."
                    }
                }
            },
            methods: {
            }
        });
        app.mount('#app');
    </script>
<?php include './views/layouts/footer.php'; ?>