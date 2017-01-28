# Library System

> A library system develop in Vue.js

## Build Setup

``` bash
# install dependencies
npm install

# serve with hot reload at localhost:8080
npm run dev

# build for production with minification
npm run build
```

---

Este sistema irá atender as necessidades da Biblioteca do Portugal Névis, Escola Estadual do Estado do Rio de Janeiro, no município de Duque de Caxias. As tecnologias utilizadas para a construção de tal sistema são:

+ Biblioteca para a constução de componentes: [**Vue.js**](https://vuejs.org/);
+ Framework para a compilação do Sistema, visando a criação de uma *app* para Desktop: [**Electron**](http://electron.atom.io/);
+ Biblioteca css para a construção de componentes: [Bulma](http://bulma.io/) em conjunto com o [Font-Awesome](http://fontawesome.io/) para alguns ícones no projeto.
+ Banco de dados local: foi usado o [PouchDB](https://pouchdb.com/) como banco de dados local, por ser de 'fácil acesso' ao sistema. Usou-se os plugins:
  * [pouchdb-browser](https://www.npmjs.com/package/pouchdb-browser
) para emular um ambiente de navegador dentro do app;
  * [pouchdb-find](https://github.com/nolanlawson/pouchdb-find) para realizar algumas buscas que seriam um tanto complexas com a API do PouchDB;
  * [pouchdb-replication-stream](https://github.com/nolanlawson/pouchdb-replication-stream) para fazer um *dump* (*backup*) do banco e também um *load* (restauração) do mesmo;
---

Neste repositório, além dos arquivos para a *build* e afins, há também uma pequena documentação do sistema, mostrando as entidades do banco de dados, os requisitos que o sistema atende e afins.

Confira a doc [aqui](documentation.md).
