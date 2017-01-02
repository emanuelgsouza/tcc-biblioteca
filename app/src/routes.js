export default [
  {
    path: '/',
    name: 'landing-page',
    component: require('components/Home')
  },
  {
    path: '/plus-student',
    name: 'plus-student',
    component: require('components/PlusStudent')
  },
  {
    path: '*',
    redirect: '/'
  }
]
