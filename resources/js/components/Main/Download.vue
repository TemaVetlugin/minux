<template class="download">
<div class="container ">
    <section class="download-title card">
        <h1 class="head-title">
            Minux OS
        </h1>
        <p class="mt-4 mb-4">
             Версия <span v-if="lastVersion">
            {{ lastVersion.title }}
        </span> доступна для скачивания
        </p>

        <div class="display-flex download-mini row">
            <div class="download-img col-lg-12 ">
                <img v-if="lastVersion" :src="'/storage/'+lastVersion.main_image"  class="card-img-top mx-auto" alt="...">
            </div>
            <div class="download-info">
                <div class="display-flex-between w-100">
                    <span>Версия</span><span v-if="lastVersion">{{ lastVersion.title }}</span>
                </div>
                <hr>
                <div class="display-flex-between w-100">
                    <span>Дата выпуска</span><span v-if="lastVersion">{{ lastVersion.date }}</span>
                </div>
                <hr>
                <div class="display-flex-between w-100">
                    <span>Размер</span><span v-if="lastVersion">{{ lastVersion.size }}</span>
                </div>
                <a v-if="lastVersion" class="btn mt-5 simple-link header" :href="lastVersion.link">Скачать</a>
            </div>
        </div>
        <h2 class="header mt-4" >
            Что нового?
        </h2>
        <p class="mt-4" v-if="lastVersion">
            {{lastVersion.feature }}
        </p>
    </section>
    <section class="previos-versions card">
    <h2 class="header">Предыдущие версии</h2>
    <table class="table roadmap">
            <thead>
            <tr>

                <th class="text-table-small" scope="col">Название</th>
    <div class="date-small line-bottom"><th class="text-table-small" scope="col ">Дата выпуска</th></div>
                <th class="text-table-small" scope="col">Что нового</th>
                <th class="text-table-small" scope="col ">Ссылка</th>
            </tr>
            </thead>
            <tbody>
            <template v-for="version in versions">
                <tr>
                    <td class="text-table-small">{{ version.title }}</td>
                    <td class="date-small">{{ version.date }}</td>
                    <td class="text-table-small">{{ version.feature }}</td>
                    <td class="text-table-small"><a :href="version.link" class="simple-link nav-link" >Скачать</a></td>
                </tr>

            </template>
            </tbody>
        </table>

    </section>

    <div class="feedback-form  card">
        <div class="feedback-form-wrapper">
        <h2 class="header">Оставить отзыв</h2>
        <input v-model="email" type="email" class="form-control mt-3 mb-3 w-100" placeholder="email">
        <textarea v-model="title" type="text" class="form-control mt-3 mb-3 w-100" placeholder="Сообщение"></textarea>
        <a href="#" class="btn mt-2 simple-link header" @click.prevent="addFeedback">Отправить</a>
        <p class="sub-title">{{this.message}}</p>
        </div>
    </div>
</div>

</template>

<script>
import api from "../../api.js"

export default {
    name: "Download",

    data(){
        return{
            versions:null,
            email:null,
            title: null,
            message:null,
            lastVersion: null
        }
    },

    mounted() {
        this.getVersions()
    },
    methods: {
        getVersions() {
            axios.get('/api/auth/versions')
                .then(res => {
                    this.versions = res.data.data
                    this.lastVersion=this.versions[0]
                    this.versions.shift()
                })
                .catch(err => {
                    console.log(err.response);
                })
        },
        addFeedback() {
            api.post('/api/auth/feedbacks/', {email: this.email, title: this.title})
                .then(res => {
                    this.email=null
                    this.title=null
                    if(res.status===200) this.message="Сообщение отправлено";
                })
        }
    }
}
</script>

<style scoped>

</style>
