import ErrorIndexComponent from './components/errors/index'
import ErrorCreateComponent from './components/errors/create'
import ErrorEditComponent from './components/errors/edit'

import SolutionIndexComponent from './components/solutions/index'
import SolutionCreateComponent from './components/solutions/create'

import LinkIndexComponent from './components/links/index'
import LinkCreateComponent from './components/links/create'

const routes = [    
    { path: '/', name: 'inicio', component: ErrorIndexComponent },    
    { path: '/errors', name: 'errors.index', component: ErrorIndexComponent },     
    { path: '/errors/create', name: 'errors.create', component: ErrorCreateComponent },
    { path: '/errors/edit', name: 'errors.edit', component: ErrorEditComponent, props: true },
    { path: '/solutions', name: 'solutions.index', component: SolutionIndexComponent, props: true },     
    { path: '/solutions/create', name: 'solutions.create', component: SolutionCreateComponent, props: true },
    { path: '/links', name: 'links.index', component: LinkIndexComponent, props: true },     
    { path: '/links/create', name: 'links.create', component: LinkCreateComponent, props: true },
]

export default routes