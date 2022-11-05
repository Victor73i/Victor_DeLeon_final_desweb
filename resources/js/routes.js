const Home = () => import('./components/Home.vue')

const Mostrar = () => import('./components/estudiante/Mostrar.vue')
const Crear = () => import('./components/estudiante/Crear.vue')
const Editar = () => import('./components/estudiante/Editar.vue')


export const routes = [

    //ROUTAS DEL PRODUCT
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'mostrarEstudiantes',
        path: '/estudiantes',
        component: Mostrar
    },
    {
        name: 'crearEstudiante',
        path: '/crear',
        component: Crear
    },
    {
        name: 'editarEstudiante',
        path: '/editar/:id',
        component: Editar
    },




]
