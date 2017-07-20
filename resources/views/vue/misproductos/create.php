
<template id="misproductos_agregar">
<div class="container">
    <h3>Agregar Nuevo Producto</h3>
    <!-- <form v-on:submit.prevent="enviar"> -->
    <form action="<?= url('/api/misproductos') ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <?php if(!Auth::guest()){ ?>
            <input type="hidden" name="user_id" value="<?= Auth::user()->id ?>">
        <?php } ?>
        <div class="form-group">
            <label>Nombre</label>
            <input v-model="registro.nombre" name="nombre" type="text" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Palabras Clave</label>
            <input v-model="registro.palabras_clave" name="palabras_clave" type="text" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Metadatos</label>
            <textarea v-model="registro.metadatos" name="metadatos" class="form-control" rows="2"></textarea>
        </div>
        <div class="form-group">
            <label>Descripcion</label>
            <textarea v-model="registro.descripcion" name="descripcion" class="form-control" rows="5" required></textarea>
        </div>
        <div class="form-group">
            <label>Precio</label>
            <input v-model="registro.precio" name="precio" type="text" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Cantidad</label>
            <input v-model="registro.cantidad" name="cantidad" type="text" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Imagen</label>
            <input name="imagen" type="file" class="form-control">
        </div>
        <button class="btn btn-primary">Guardar</button>
    </form>
</div>

</template>
<script>
const misproductos_agregar = {
    template: '#misproductos_agregar',
    data () {
        return {
            registro: {},
            APP_C
        }
    },
    methods: {
        // enviar () {
        //     this.registro.user_id = APP_C.user_id
        //     this.$http.post('/api/misproductos', this.registro).then(
        //         // success
        //         response => {
        //             this.$router.push('/misproductos')
        //         }
        //     )
        // }
    },
    // created: function () {
    //     console.warn('puedo halar')
    // }
}
</script>