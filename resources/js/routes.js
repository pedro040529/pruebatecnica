

const List = () => import('./components/peliculas/ListPelicula.vue');
const Create = () => import('./components/peliculas/CreatePelicula.vue');
const Edit = () => import('./components/peliculas/EditPelicula.vue');
const ListT = () => import('./components/turnos/ListTurnos.vue');
const CreateT = () => import('./components/turnos/CreateTurnos.vue');
const EditT = () => import('./components/turnos/EditTurnos.vue');

export const routes = [
    {
        name:'listarPeliculas',
        path: '/',
        component: List
    },
    {
        name:'crearPeliculas',
        path: '/create',
        component: Create
    },
    {
        name:'editarPeliculas',
        path: '/edit/:id',
        component: Edit
    },
    {
        name:'listarTurnos',
        path: '/turnos',
        component: ListT
    },
    {
        name:'crearTurnos',
        path: '/createturnos',
        component: CreateT
    },
    {
        name:'editarTurnos',
        path: '/editturnos/:id',
        component: EditT    
    },
];