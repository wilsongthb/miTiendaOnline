<template id="producto-template">
<a href="#">
    
    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" :src="p.image_url" alt="Image">
        </a>
        <div class="media-body">
            <h4 class="media-heading">{{p.nombre}}</h4>
            <p>{{p.descripcion}} </p>
        </div>
    </div>
</a>
</template>
<script>
const producto = {
    template: '#producto-template',
    props: {
        p: Object
    }
}
</script>