// // config
// Vue.use(VueResource);
// // Vue.http.options.root = '/root';
// // Vue.http.headers.common['Authorization'] = 'Basic YXBpOnBhc3N3b3Jk';

// // componentes globales
// Vue.component('pagination', module.exports);

// const producto = {
//     template: '#producto-template',
//     props: {
//         p: Object
//     }
// }

// const productos = {
//     template: '#productos-template',
//     components: {
//         'producto': producto
//     },
//     props: {
//         productos: Object 
//     }
// }



var appRoot = new Vue({
    el: '#app',
    components: {
        'app': app
    }
})