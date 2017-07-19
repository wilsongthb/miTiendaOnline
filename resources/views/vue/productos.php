<template id="productos-template">
<div class="container">
    <div class="row">
         <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3" v-for="(p, index) in laravelData.data" :key="index">
              <producto :p="p"></producto>
        </div>
    </div>
    <pagination :data="laravelData" @pagination-change-page="cambiarPagina"></pagination>
</div>
</template>
<script>
const productos = {
    template: '#productos-template',
    components: {
        producto,
        pagination: laravel_vue_pagination
    },
    data () {
        return {
            buscar: '',
            laravelData: {},
            pagina: 1
        }
    },
    created () {
        this.leer()
    },
    methods: {
        cambiarPagina (p) {
            console.warn(arguments)
            this.pagina = p
            this.leer()
        },
        leer () {
            this.$http.get('/api/productos', {
                params: {
                    search: this.buscar,
                    page: this.pagina
                }
            }).then(
                // success
                response => {
                    this.laravelData = response.data
                }
            )
        }
    }
}
</script>