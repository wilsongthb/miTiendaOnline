<template id="producto_detalle">

<div class="container">
    
    <div class="row">
        
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            
            <img :src="p.image_url" class="img-responsive" alt="Image" width="100%">
            
        </div>
        
        <div class="col-xs-12 col-sm-4 col-md-8 col-lg-8">

            <h3>{{p.nombre}} </h3>
            <h4><code>Precio S/. {{p.precio}} </code></h4>
            <h4>Stock: {{p.stock}}</h4>
            
            <form v-on:submit.prevent="agregarAlCarrito">
                Cantidad: <input type="number" v-model="comprar.cantidad" :max="p.stock" required>
                <button class=""><i class="fa fa-cart-plus"></i> Agregar al carrito</button>
            </form>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
             <pre><p>{{p.descripcion}}</p></pre>
        </div>
    </div>
    
</div>

</template>
<script>
const producto_detalle = {
    template: '#producto_detalle',
    props: ['id'],
    data () {
        return {
            p: {},
            comprar: {
                cantidad: 1
            }
        }
    },
    created () {
        this.$http.get(`/api/productos/${this.id}`).then(
            // success
            response => {
                this.p = response.data
            }
        )
    },
    methods: {
        agregarAlCarrito () {
            // console.warn('cc')
            // this.$emit('agregarAlCarrito', { producto: this.p, cantidad: this.comprar.cantidad })
            carrito.push(JSON.parse(JSON.stringify({ producto: this.p, cantidad: this.comprar.cantidad })))
            this.$router.replace('/')
        }
    }
}
</script>