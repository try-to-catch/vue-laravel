import {createRouter, createWebHashHistory} from "vue-router";

const routes = [
    {
        name: 'user.index',
        path: '/users',
        component: () => import("./views/User/Index.vue")
    },
    {
        name: 'user.create',
        path: '/users/create',
        component: () => import("./views/User/Create.vue")
    },
    {
        name: 'user.show',
        path: '/users/:user',
        component: () => import("./views/User/Show.vue")
    },
    {
        name: 'user.edit',
        path: '/users/:user/edit',
        component: () => import("./views/User/Edit.vue")
    },
    {
        path: '/:pathMatch(.*)*',
        name: 'NotFound',
        component: () => import("./views/Codes/NotFount.vue")
    },
];

export default createRouter({
    history: createWebHashHistory(),
    routes,
})

