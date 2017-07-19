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

        }
    },
    methods: {
        leer () {
            http.$get('/api/')
        }
    }
}
</script>