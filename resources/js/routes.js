import {createRouter, createWebHistory} from "vue-router";

const Welcome = () => import('./components/Welcome.vue' /* webpackChunkName: "resource/js/components/welcome" */)

//todo
const TodoList = () => import('./components/todo/Display.vue')
const TodoAdd = () => import('./components/todo/Add.vue')
const TodoEdit = () => import('./components/todo/Edit.vue')

//user
const UserList = () => import('./components/user/Display.vue')
const UserAdd = () => import('./components/user/Add.vue')
const UserEdit = () => import('./components/user/Edit.vue')

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Welcome
    },
    {
        name: 'DisplayTodo',
        path: '/todo',
        component: TodoList
    },
    {
        name: 'AddTodo',
        path: '/todo/add',
        component: TodoAdd
    },
    {
        name: 'EditTodo',
        path: '/todo/:id/edit',
        component: TodoEdit
    },

    {
        name: 'DisplayUser',
        path: '/users',
        component: UserList
    },
    {
        name: 'AddUser',
        path: '/users/add',
        component: UserAdd
    },
    {
        name: 'EditUser',
        path: '/users/:id/edit',
        component: UserEdit
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router