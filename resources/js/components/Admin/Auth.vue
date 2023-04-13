<template>
    <div class="display-flex">
        <div class="p-3 text-bg-dark col-4 d-flex flex-column flex-shrink-0" style="width: 280px; min-height: 100vh">
            <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">

                <span class="fs-4">Minux admin</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li>
                    <router-link class="text-decoration-none" v-if="this.access_token" :to="{name: 'admin.card'}"><span class="nav-link text-white"> Видеокарты </span>
                    </router-link>
                </li>
                <li>
                    <router-link class="text-decoration-none" v-if="this.access_token" :to="{name: 'admin.algorithm'}"><span class="nav-link text-white"> Алгоритмы </span>
                    </router-link>
                </li>
                <li>
                    <router-link class="text-decoration-none" v-if="this.access_token" :to="{name: 'admin.version'}"><span class="nav-link text-white"> Версии </span>
                    </router-link>
                </li>
                <li>
                    <router-link class="text-decoration-none" v-if="this.access_token" :to="{name: 'admin.feedback'}"><span class="nav-link text-white"> Фидбэк </span>
                    </router-link>
                </li>
                <li>
                    <router-link class="text-decoration-none" v-if="this.access_token" :to="{name: 'admin.roadmap'}"><span class="nav-link text-white"> Этапы разработки </span>
                    </router-link>
                </li>
                <li>
                    <router-link class="text-decoration-none" v-if="this.access_token" :to="{name: 'admin.worker'}"><span class="nav-link text-white"> Команда </span>
                    </router-link>
                </li>
                <li>
                    <router-link class="text-decoration-none" v-if="this.access_token" :to="{name: 'admin.screenshot'}"><span class="nav-link text-white"> Скриншоты </span>
                    </router-link>
                </li>
                <li>
                    <router-link class="text-decoration-none" v-if="!this.access_token" :to="{name: 'admin.login'}"><span class="nav-link text-white"> Login </span>
                    </router-link>
                </li>

                <li>
                    <a class="text-decoration-none nav-link text-white" v-if="this.access_token" href="#" @click.prevent="logout"> Logout</a>
                </li>


            </ul>
            <hr>

        </div>
        <div class="main p-5">
            <router-view :key="$route.fullPath"></router-view>
        </div>
    </div>
</template>

<script>
import api from '../../api'

export default {
    data() {
        return {
            access_token: null
        }
    },

    mounted() {
        this.getAccessToken()
    },

    updated() {
        this.getAccessToken()
    },

    methods: {

        getAccessToken() {
            this.access_token = localStorage.getItem('access_token')
        },

        logout() {
            api.post('/api/auth/logout')
                .then(res => {
                    localStorage.removeItem('access_token')
                    this.$router.push({name: 'admin.login'})
                })
        }
    }

}
</script>

<style>

</style>
