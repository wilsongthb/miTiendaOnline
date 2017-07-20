<template id="carrito_component">
<div class="container">
    <h3>Carrito de compras</h3>
    <!-- <div class="list-group">
        <a href="#" class="list-group-item active">
            <h4 class="list-group-item-heading">List group item heading</h4>
            <p class="list-group-item-text">Content goes here</p>
        </a>
    </div> -->
    
    <!-- <div class="media" v-for="p in carrito">
        <a class="pull-left" href="#">
            <img class="media-object" :src="p.producto.image_url" alt="Image" width="150">
        </a>
        <div class="media-body">
            <h4 class="media-heading">{{p.producto.nombre}} </h4>
            <p>Cantidad: {{p.cantidad}} </p>
        </div>
    </div> -->

    
    <table class="table table-condensed table-hover">
        <thead>
            <tr>
                <th>Nº</th>
                <th></th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Subtotal</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(p, index) in carrito">
                <td>{{index+1}} </td>
                <td>
                    <img :src="p.producto.image_url" alt="Img" width="50px">
                </td>
                <td>{{p.producto.nombre}} </td>
                <!-- <td>{{p.cantidad}} </td> -->
                <td>
                    <input type="number" v-model="p.cantidad">
                </td>
                <td>S/. {{p.producto.precio}} </td>
                <td>S/. {{p.producto.precio * p.cantidad}} </td>
                <td title="Eliminar"><button class="btn-danger" @click="carrito.splice(index, 1)"><i class="fa fa-trash"></i> </button></td>
            </tr>
            <tr>
                <td></td>
                <th colspan="4">TOTAL</th>
                <td>S/. {{total}} </td>
            </tr>
        </tbody>
    </table>
    
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
            <legend>Datos para registrar la transaccion</legend>
            <form v-on:submit.prevent="comprar">
                <div class="form-group">
                    <label>pais</label>
                    <input v-model="transaccion.pais" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>region</label>
                    <input v-model="transaccion.region" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>codigo_postal</label>
                    <input v-model="transaccion.codigo_postal" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>direccion</label>
                    <input v-model="transaccion.direccion" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>nombre</label>
                    <input v-model="transaccion.nombre" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>tipo_documento</label>
                    <!-- <input v-model="transaccion.tipo_documento" type="text" class="form-control" required> -->
                    <select v-model="transaccion.tipo_documento" class="form-control" required>
                        <option v-for="t in tipo_documento" :value="t">{{t}} </option>
                    </select>
                </div>
                <div class="form-group">
                    <label>numero_documento</label>
                    <input v-model="transaccion.numero_documento" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>email</label>
                    <input v-model="transaccion.email" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>telefono</label>
                    <input v-model="transaccion.telefono" type="text" class="form-control" required>
                </div>
                <button class="btn btn-success">Comprar </button>
            </form>
        </div>
    </div>
    

    
</div>
</template>
<script>
const carrito_component = {
    template: '#carrito_component',
    data () {
        return {
            carrito,
            tipo_documento: <?= json_encode(config('miconfig.documento')) ?>,
            transaccion: {}
        }
    },
    props: {
        buscar: String
    },
    computed: {
        total () {
            var total = 0
            for(i in this.carrito){
                var fila = this.carrito[i]
                total += (fila.producto.precio) * (fila.cantidad)
            }
            return total
        }
    },
    methods: {
        comprar () {
            this.$http.post('/api/compras', {
                user: APP_C.user,
                carrito: this.carrito,
                transaccion: this.transaccion
            }).then(
                // success
                response => {
                    window.alert(response.data)
                    this.carrito = []
                    this.$router.push('/')
                }
            )
        }
    }
}
</script>