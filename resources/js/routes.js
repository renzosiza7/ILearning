import config from './config'

import ErrorComponent from './components/ErrorComponent'
import ErrorCreateComponent from './components/errors/create'

const routes = [    
    //{ path: '/', component: TramitesPage, name: 'inicio', props: { ruta: config.API_URL } },        
    //{ path: '/error', component: ErrorComponent, name: 'error', props: true },                      
    { path: '/error', name: 'error', component: ErrorComponent, props: { ruta: config.API_URL } },     
    {
        path: '/error/create',
        name: 'error-create',
        component: ErrorCreateComponent,
        props: { ruta: config.API_URL }
    },
]

export default routes