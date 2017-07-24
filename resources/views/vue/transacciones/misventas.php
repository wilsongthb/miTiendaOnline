<template id="misventas">
<div class="container">
    <h3>Mis Ventas</h3>
        
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID Transaccion</th>
                <th>ID</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Comprador </th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="v in ventas">
                <td>{{v.transacciones_id}} </td>
                <td>{{v.id}} </td>
                <td>{{v.nombre}} </td>
                <td>{{v.cantidad}} </td>
                <td>{{v.comprador}} </td>
                <td>
                    <a :href="APP_C.url + '/comprobante/' + v.id" title="Generar comprobante de pago"><i class="fa fa-indent"></i> </a>
                </td>
            </tr>
        </tbody>
    </table>
    
</div>
</template>
<script>
const misventas = {
    template: '#misventas',
    data () {
        return {
            APP_C,
            ventas: []
        }
    },
    methods: {
        leer() {
            this.$http.get('/api/compras', {
                params: {
                    user_id: APP_C.user.id
                }
            }).then(
                // success
                response => {
                    this.ventas = response.data
                }
            )
        }
    },
    created () {
        this.leer()
    }
}
</script>