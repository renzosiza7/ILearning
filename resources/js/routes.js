import config from './config'

import ErrorIndexComponent from './components/errors/index'
import ErrorCreateComponent from './components/errors/create'

const routes = [    
    { path: '/', name: 'inicio', component: ErrorIndexComponent, props: { ruta: config.API_URL } },
    //{ path: '/error', component: ErrorComponent, name: 'error', props: true },                      
    { path: '/errors', name: 'errors.index', component: ErrorIndexComponent, props: { ruta: config.API_URL } },     
    {
        path: '/errors/create',
        name: 'errors.create',
        component: ErrorCreateComponent,
        props: { ruta: config.API_URL }
    },
]

export default routes