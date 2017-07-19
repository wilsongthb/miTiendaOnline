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
            <a class="navbar-brand" href="<?= url('') ?>"><?= config('app.name') ?></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <router-link to="/productos">Productos</router-link>
                </li>
            </ul>
            <!-- <div class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search" v-model="buscar" v-on:change="leer()">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Link</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </li>
            </ul> -->
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
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
                                <a href="<?= route('logout') ?>"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    Logout
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
        { path: '/productos', component: productos },
        { path: '/misproductos', component: misproductos }
    ]
})
const app = {
    router,
    template: '#app-template'
}
</script>