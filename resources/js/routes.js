const Mostrar = () =>
    import ('./components/blog/Mostrar.vue')
const Editar = () =>
    import ('./components/blog/Editar.vue')

export const routes = [{
        name: 'mostrarPeoples',
        path: '/',
        component: Mostrar
    },
    {
        name: 'editarBlog',
        path: '/editar/:id',
        component: Editar
    }
]