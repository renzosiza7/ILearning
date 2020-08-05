import ErrorIndexComponent from './components/errors/index'
import ErrorCreateComponent from './components/errors/create'
import ErrorEditComponent from './components/errors/edit'

import SolutionIndexComponent from './components/solutions/index'
import SolutionCreateComponent from './components/solutions/create'
import SolutionEditComponent from './components/solutions/edit'

import LinkIndexComponent from './components/links/index'
import LinkCreateComponent from './components/links/create'
import LinkEditComponent from './components/links/edit'

const routes = [    
    { path: '/', name: 'inicio', component: ErrorIndexComponent },    
    { path: '/errors', name: 'errors.index', component: ErrorIndexComponent },     
    { path: '/errors/create', name: 'errors.create', component: ErrorCreateComponent },
    { path: '/errors/edit', name: 'errors.edit', component: ErrorEditComponent, props: true },
    { path: '/solutions', name: 'solutions.index', component: SolutionIndexComponent, props: true },     
    { path: '/solutions/create', name: 'solutions.create', component: SolutionCreateComponent, props: true },
    { path: '/solutions/edit', name: 'solutions.edit', component: SolutionEditComponent, props: true },
    { path: '/links', name: 'links.index', component: LinkIndexComponent, props: true },     
    { path: '/links/create', name: 'links.create', component: LinkCreateComponent, props: true },
    { path: '/links/edit', name: 'links.edit', component: LinkEditComponent, props: true },
]

export default routes