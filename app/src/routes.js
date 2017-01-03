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
    path: '/plus-book',
    name: 'plus-book',
    component: require('components/Forms/Book/PlusBook')
  },
  {
    path: '/delete-book',
    name: 'delete-book',
    component: require('components/Forms/Book/DeleteBook')
  },
  {
    path: '/search-book',
    name: 'search-book',
    component: require('components/Forms/Book/SearchBook')
  },
  {
    path: '/plus-people',
    name: 'plus-people',
    component: require('components/Forms/People/PlusPeople')
  },
  {
    path: '/delete-people',
    name: 'delete-people',
    component: require('components/Forms/People/DeletePeople')
  },
  {
    path: '*',
    redirect: '/'
  }
]
