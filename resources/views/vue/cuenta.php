<template id="cuenta">
<div class="container">
    
    <div class="row">
        
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <form v-on:submit.prevent="putUser">
                <legend>Cuenta</legend>
                <div class="form-group">
                    <label>name</label>
                    <input v-model="user.name" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>email</label>
                    <input v-model="user.email" type="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <button class="btn btn-default">Guardar Cambios</button>
                </div>
            </form>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <form v-on:submit.prevent="putClave">
                <legend>Contraseña</legend>
                <!-- <div class="form-group">
                    <label for="">Contraseña</label>
                    <input v-model="user.old_password" type="password" class="form-control" min="6" required>
                </div>  -->
                <div class="form-group">
                    <input type="checkbox" v-model="ver_clave"> Ver Contraseña
                    <label for="">Nueva contraseña</label>
                    <template v-if="ver_clave">
                        <input v-model="user.new_password" type="text" class="form-control" min="6" required>
                    </template>
                    <template v-else>
                        <input v-model="user.password" type="password" class="form-control" min="6" required>
                    </template>
                </div> 
                <div class="form-group">
                    <button class="btn btn-default">Cambiar Contraseña</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <form v-on:submit.prevent="putVendedor">
                <legend>Informacion de Vendedor</legend>
                <div class="form-group">
                    <label>pais</label>
                    <input v-model="vendedor.pais" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>region</label>
                    <input v-model="vendedor.region" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>codigo_postal</label>
                    <input v-model="vendedor.codigo_postal" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>direccion</label>
                    <input v-model="vendedor.direccion" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>ruc</label>
                    <input v-model="vendedor.ruc" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>razon_social</label>
                    <input v-model="vendedor.razon_social" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>nombres</label>
                    <input v-model="vendedor.nombres" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>apellido_paterno</label>
                    <input v-model="vendedor.apellido_paterno" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>apellido_materno</label>
                    <input v-model="vendedor.apellido_materno" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>dni</label>
                    <input v-model="vendedor.dni" type="text" class="form-control" required>
                </div>

                <legend>Clave para emitir comprobante electronico</legend>
                <div class="form-group">
                    <label>key_token</label>
                    <input v-model="vendedor.key_token" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <button class="btn btn-default">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
    



</div>
</template>
<script>
const cuenta = {
    template: '#cuenta',
    data () {
        return {
            ver_clave: false,
            user: {},
            vendedor: {},
            sunat: {},
        }
    },
    created () {
        this.leer()
    },
    methods: {
        leer () {
            this.$http.get('/api/cuenta', {
                params: {
                    user_id: APP_C.user.id
                }
            }).then(
                // success
                response => {
                    this.user = response.data.user
                    this.vendedor = response.data.vendedor
                }
            )
        },
        putUser () {
            this.$http.put('/api/cuenta/user', this.user).then(
                // success
                response => {

                }
            )
        },
        putVendedor () {
            this.vendedor.user_id = this.user.id
            this.$http.put('/api/cuenta/vendedor', this.vendedor).then(
                // success
                response => {

                }
            )
        },
        putClave () {
            this.$http.put('/api/cuenta/clave', this.user).then(
                // success
                response => {

                }
            )
        },
    }
}
</script>