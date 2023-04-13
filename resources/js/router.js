import { createWebHistory, createRouter, createRouterMatcher } from "vue-router";

const routes = [
    {
        path: '/admin/cards', component: ()=> import('./components/Admin/Card/Index.vue'), name:'admin.card'
    },
    {
        path: '/admin/algorithms', component: ()=> import('./components/Admin/Algorithm/Index.vue'), name:'admin.algorithm'
    },
    {
        path: '/admin/versions', component: ()=> import('./components/Admin/Version/Index.vue'), name:'admin.version'
    },
    {
        path: '/admin/workers', component: ()=> import('./components/Admin/Worker/Index.vue'), name:'admin.worker'
    },
    {
        path: '/admin/screenshots', component: ()=> import('./components/Admin/Screenshot/Index.vue'), name:'admin.screenshot'
    },
    {
        path: '/admin/feedbacks', component: ()=> import('./components/Admin/Feedback/Index.vue'), name:'admin.feedback'
    },
    {
        path: '/admin/login', component: ()=> import('./components/Admin/User/Login.vue'), name:'admin.login'
    },
    {
        path: '/admin/roadmaps', component: ()=> import('./components/Admin/Roadmap/Index.vue'), name:'admin.roadmap'
    },
    //-------------------------
    {
        path: '/main', component: ()=> import('./components/Main/Product.vue'), name:'main'
    },
    {
        path: '/main/company', component: ()=> import('./components/Main/Company.vue'), name:'main.company'
    },
    {
        path: '/main/download', component: ()=> import('./components/Main/Download.vue'), name:'main.download'
    },
    {
        path: '/main/product', component: ()=> import('./components/Main/Product.vue'), name:'main.product'
    },
    {
        path: '/main/roadmap', component: ()=> import('./components/Main/RoadMap.vue'), name:'main.roadmap'
    },



    {
        path: '/#', component: ()=> import('./components/Admin/User/Login.vue'), name:'404'
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to,from,next)=>{

    const accessToken = localStorage.getItem('access_token');
    if(to.name ==='main'){
        return next({name: 'main.product'})
    }
    if(!accessToken){
    if(to.name ==='admin.login'){
            return next()
        }
        else if(to.name&&to.name.indexOf('admin.') ===0){
            return next({name: 'admin.login'})
        }

    }

    if(to.name ==='admin.login'){
        if(accessToken){
            return next({name: 'algorithm.index'})
        }
    }

    next();
});

export default router;
