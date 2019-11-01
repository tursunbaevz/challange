require('./bootstrap');
window.Vue = require('vue');
window.VueRouter = require('vue-router').default;
window.VueAxios = require('vue-axios').default;
window.Axios = require('axios').default;
let AppLayout = require('./components/App.vue');
Vue.use(VueRouter, VueAxios, axios);

const GoalIndex = Vue.component('goal-index', require('./components/GoalIndex.vue').default);
const GoalCreate = Vue.component('goal-create', require('./components/GoalCreate.vue').default);
const GoalEdit = Vue.component('goal-edit', require('./components/GoalEdit.vue').default);

const routes = [
    {
        name: 'goalIndex',
        path: '/goals',
        component: GoalIndex,
    },
    {
        name: 'goalCreate',
        path: '/goals/create',
        component: GoalCreate,
    },
    {
        name: 'goalEdit',
        path: '/goals/edit/:id',
        component: GoalEdit,
    },

];

const router = new VueRouter({mode: 'history', routes: routes});

new Vue(
    Vue.util.extend(
        {router},
        AppLayout
    )
).$mount('#app');


