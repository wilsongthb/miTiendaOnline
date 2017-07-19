<template id="producto-template">
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">{{ p.nombre }}</h3>
    </div>
    <div class="panel-body">
       <img :src="p.image_path" alt="">
    </div>
    <div class="panel-footer">
        $/. {{ p.precio }}
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