import config from './config'

import ErrorComponent from './components/ErrorComponent'

const routes = [    
    //{ path: '/', component: TramitesPage, name: 'inicio', props: { ruta: config.API_URL } },        
    //{ path: '/error', component: ErrorComponent, name: 'error', props: true },                      
    { path: '/error', component: ErrorComponent, name: 'error', props: { ruta: config.API_URL } },     
]

export default routes