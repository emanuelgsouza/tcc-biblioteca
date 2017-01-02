export default [
  {
    path: '/',
    name: 'landing-page',
    component: require('components/Home')
  },
  {
    path: '/plus-student',
    name: 'plus-student',
    component: require('components/Forms/PlusStudent')
  },
  {
    path: '/delete-student',
    name: 'delete-student',
    component: require('components/Forms/DeleteStudent')
  },
  {
    path: '*',
    redirect: '/'
  }
]
