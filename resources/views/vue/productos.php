<template id="productos-template">
<div class="container">
    <div class="form-group">
        <input v-model="childBuscar" v-on:change="_buscar" type="text" class="form-control" placeholder="Buscar...">
    </div>
    <div class="row">
         <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3" v-for="(p, index) in laravelData.data" :key="index">
            <router-link :to="'/producto/' + p.id">
                <producto :p="p"></producto>
            </router-link>
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
    props: {
        buscar: String
    },
    data () {
        return {
            childBuscar: '',
            laravelData: {},
            pagina: 1
        }
    },
    created () {
        if(!this.parentBuscar){
            this.childBuscar = this.buscar
        }
        this.leer()
    },
    methods: {
        _buscar () {
            // this.$router.push({path: `/productos/buscar/${this.buscar}`, params: { buscar: this.buscar }})
            this.$router.push(`/buscar/${this.childBuscar}`)
            this.leer()
        },
        cambiarPagina (p) {
            console.warn(arguments)
            this.pagina = p
            this.leer()
        },
        leer () {
            this.$http.get('/api/productos', {
                params: {
                    search: this.childBuscar,
                    // search: this.$route.params.buscar,
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