<template id="misproductos">
    <div class="container">
        
        <div class="list-group">
            <a href="#" class="list-group-item active">Item 1</a>
            <a href="#" class="list-group-item">Item 2</a>
            <a href="#" class="list-group-item">Item 3</a>
        </div>
        
    </div>
</template>
<script>
const misproductos = {
    routes: [

    ],
    template: '#misproductos',
    data () {
        return {
            lista: [],
            laravelData: {}
        }
    },
    methods: {
        leer () {
            this.$http.get('/api/misproductos').then(
                // success
                response => {
                    this.lista = response.data.data
                    this.laravelData = response.data

                    console.log(this.lista)
                }
            )
        }
    },
    created () {
        this.leer()
    }
}
</script>