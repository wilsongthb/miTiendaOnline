<template id="misproductos">
    <div class="container">
        
        <router-link to="agregar" append>
            <button type="button" class="btn btn-default"><i class="fa fa-plus"></i> Agregar productos</button>
        </router-link>
        <hr>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3" v-for="(p, index) in laravelData.data" :key="index">
                <producto :p="p"></producto>
            </div>
        </div>
        <pagination :data="laravelData" @pagination-change-page="cambiarPagina"></pagination>
    </div>
</template>
<script>
const misproductos = {
    template: '#misproductos',
    components: {
        producto,
        pagination: laravel_vue_pagination
    },
    data () {
        return {
            lista: [],
            laravelData: {},
            pagina: 1
        }
    },
    methods: {
        cambiarPagina (p) {
            console.warn(arguments)
            this.pagina = p
            this.leer()
        },
        leer () {
            this.$http.get('/api/misproductos', {
                params: {
                    user_id: APP_C.user_id
                }
            }).then(
                // success
                response => {
                    this.lista = response.data.data
                    this.laravelData = response.data
                    // console.log(this.lista)
                }
            )
        }
    },
    created () {
        this.leer()
    }
}
</script>