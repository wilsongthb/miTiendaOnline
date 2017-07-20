<template id="app-template">
<div>
    <nav class="navbar navbar-default" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- <a class="navbar-brand" href="<?= url('') ?>"><?= config('app.name') ?></a> -->
            <router-link class="navbar-brand" to="/"><?= config('app.name') ?></router-link>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <!-- <router-link to="/productos">Productos</router-link> -->
                </li>
            </ul>
            <!-- <form v-on:submit.prevent="_buscar" class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Buscar" v-model="buscar" v-on:change="_buscar">
                </div>
                 <button type="submit" class="btn btn-default">Buscar</button> 
            </form> -->
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                <li><router-link to="/carrito"><i class="fa fa-cart-plus"></i> Carrito <span class="badge">{{carrito.length}} </span></router-link></li>
                <?php if(Auth::guest()){ ?>
                    <li><a href="<?= route('login') ?>">Login</a></li>
                    <li><a href="<?= route('register') ?>">Register</a></li>
                <?php }else{ ?>
                    <li>
                        <router-link to="/misproductos">Mis productos</router-link>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <?= Auth::user()->name ?> <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <router-link to="/cuenta">Cuenta</router-link>
                            </li>
                            <li>
                                <a href="<?= route('logout') ?>"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    Cerrar Sesion
                                </a>

                                <form id="logout-form" action="<?= route('logout') ?>" method="POST" style="display: none;">
                                    <?= csrf_field() ?>
                                </form>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </nav>

    <router-view></router-view>
</div>
</template>
<script>
// RUTAS DEL COMPONENTE
const router = new VueRouter({
    mode: 'history',
    routes: [
        { path: '/', component: productos },
        { path: '/buscar/:buscar', component: productos, props: true },
        { path: '/cuenta', component: cuenta },
        { path: '/misproductos', component: misproductos },
        { path: '/misproductos/agregar', component: misproductos_agregar },
        { path: '/producto/:id', component: producto_detalle, props: true },
        { path: '/carrito', component: carrito_component }
        // { path: '/componente', component: componente }
    ]
})
const app = {
    router,
    template: '#app-template',
    data () {
        return {
            buscar: '',
            carrito
        }
    },
    methods: {
        _buscar () {
            // this.$router.push({path: `/productos/buscar/${this.buscar}`, params: { buscar: this.buscar }})
            this.$router.push(`/buscar/${this.buscar}`)
        }
    },
    created () {
        if(this.$route.params.buscar){
            this.buscar = this.$route.params.buscar
        }
    }
}
</script>