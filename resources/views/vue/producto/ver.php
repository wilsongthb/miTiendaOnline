<template id="producto-template">
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">{{ p.nombre }}</h3>
    </div>
    <div class="panel-body">
        <img :src="p.image_url" width="100%" height="230px" alt="Imagen">
    </div>
    <div class="panel-footer">
        <h4><code>S/. {{ p.precio }}</code></h4>
        <!-- <h4>Cantidad {{p.cantidad}}</h4>
        <h4>Vendidos {{p.comprado}}</h4> -->
        <h4>Stock {{p.stock}} Unidades</h4>
    </div>
</div>
</template>
<script>
const producto = {
    template: '#producto-template',
    props: {
        p: Object
    }
}
</script>