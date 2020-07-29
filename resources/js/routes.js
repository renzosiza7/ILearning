import config from './config'

import ErrorIndexComponent from './components/errors/index'
import ErrorCreateComponent from './components/errors/create'

import SolutionIndexComponent from './components/solutions/index'
import SolutionCreateComponent from './components/solutions/create'

const routes = [    
    { path: '/', name: 'inicio', component: ErrorIndexComponent },    
    { path: '/errors', name: 'errors.index', component: ErrorIndexComponent },     
    { path: '/errors/create', name: 'errors.create', component: ErrorCreateComponent },
    { path: '/solutions', name: 'solutions.index', component: SolutionIndexComponent, props: true },     
    { path: '/solutions/create', name: 'solutions.create', component: SolutionCreateComponent, props: true },
]

export default routes