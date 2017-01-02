export default [
  {
    path: '/',
    name: 'landing-page',
    component: require('components/LandingPageView')
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
