export default [
  {
    path: '/',
    name: 'landing-page',
    component: require('components/Home')
  },
  {
    path: '/plus-student',
    name: 'plus-student',
    component: require('components/Forms/Student/PlusStudent')
  },
  {
    path: '/delete-student',
    name: 'delete-student',
    component: require('components/Forms/Student/DeleteStudent')
  },
  {
    path: '/exchange-student',
    name: 'exchange-student',
    component: require('components/Forms/Student/ExchangeStudent')
  },
  {
    path: '*',
    redirect: '/'
  }
]
