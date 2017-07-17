<script>
// const Foo = { template: '<div>foo</div>' }
// const Bar = { template: '<div>bar</div>' }
const router = new VueRouter({
    mode: 'history',
    routes: [
        { path: '/', component: productos },
        { path: '/productos', component: productos },
        // { path: '/foo', component: Foo },
        // { path: '/bar', component: Bar }
    ]
})
</script>