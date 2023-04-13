<template>
    <div>
        <div>
            <h2 class="text-dark">Добавить Версию</h2>
            <input v-model="title" type="text" class="form-control mt-3 mb-3 w-75" placeholder="Название">
            <input v-model="date" type="text" class="form-control mt-3 mb-3 w-75" placeholder="Дата выпуска">
            <textarea rows="6" v-model="feature" type="text" class="form-control mt-3 mb-3 w-75" placeholder="Что нового"></textarea>
            <textarea v-model="link" type="text" class="form-control mt-3 mb-3 w-75" placeholder="Ссылка"></textarea>
            <input v-model="size" type="text" class="form-control mt-3 mb-3 w-75" placeholder="Размер билда">
            <div class="mb-3">
                <h4 class="text-dark">Добавить главное изображение</h4>
                <input v-on:change="onFileSelected" class="form-control w-75" type="file" id="formFile">
            </div>
            <a href="#" class="btn btn-success mb-5" @click.prevent="addVersion">Добавить</a>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Название</th>
                <th scope="col">Дата выпуска</th>
                <th scope="col">Что нового</th>
                <th scope="col">Ссылка</th>
                <th scope="col">Размер</th>
                <th scope="col">Изображение</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            <template v-for="version in versions">
                <tr v-if="version.id!==this.editId">
                    <th scope="row">{{ version.id }}</th>
                    <td>{{ version.title }}</td>
                    <td>{{ version.date }}</td>
                    <td>{{ version.feature }}</td>
                    <td>{{ version.link }}</td>
                    <td>{{ version.size }}</td>
                    <td><img class="table-img" :src="'/storage/'+version.main_image" alt="No Image"></td>
                    <td>
                        <a class="text-decoration-none btn btn-primary me-2 mb-2" href="#"
                           @click.prevent="this.isEditVersion(version.id, version.title, version.date, version.feature, version.link, version.size)"> Редактировать</a>
                        <a class="text-decoration-none btn btn-danger" href="#" @click.prevent="deleteVersion(version.id)">
                            Удалить</a>
                    </td>
                </tr>
                <tr v-if="version.id===this.editId">
                    <th scope="row">{{ version.id }}</th>
                    <td><input v-model="editTitle" type="text" class="form-control w-100" placeholder="Название">
                    </td>
                    <td><input v-model="editDate"  type="text" class="form-control w-100"
                               placeholder="Дата выпуска"></td>
                    <td><textarea  rows="4" v-model="editFeature" type="text" class="form-control w-100" placeholder="Что нового"></textarea></td>
                    <td><textarea v-model="editLink" type="text" class="form-control w-100" placeholder="Ссылка"></textarea>
                    </td>
                    <td><input v-model="editSize"  type="text" class="form-control w-100"
                               placeholder="Размер билда"></td>
                    <td>
                        <a class="text-decoration-none btn btn-primary me-2" href="#"
                           @click.prevent="editVersion(version.id)"> Изменить</a>
                    </td>
                </tr>
            </template>
            </tbody>
        </table>
    </div>
</template>

<script>
import api from "../../../api.js"
export default {
    data() {
        return {
            versions: null,
            api: null,
            title: null,
            date: null,
            feature: null,
            link: null,
            size: null,
            editId: null,
            editDate: null,
            editTitle: null,
            editFeature: null,
            editLink: null,
            editSize: null,
            main_image:null,
        }
    },

    mounted() {
        this.getVersions()
    },


    methods: {

        isEditVersion(id, title, date, feature, link, size){
            this.editId=id;
            this.editDate=date;
            this.editTitle=title;
            this.editFeature=feature;
            this.editLink=link;
            this.editSize=size;
        },
        getVersions() {
            api.get('/api/auth/versions')
                .then(res => {
                    this.versions = res.data.data
                    console.log(this.versions);
                })
                .catch(err => {
                    console.log(err.response);
                })
        },
        editVersion(id){
            api.patch('/api/auth/versions/' + id, {date: this.editDate, title:this.editTitle, feature: this.editFeature, link:this.editLink,  size:this.editSize})
                .then(res=>{
                    this.editId=null
                    this.getVersions()
                })
        },
        deleteVersion(version) {
            api.delete('/api/auth/versions/' + version)
                .then(res => {
                    this.getVersions()
                })
        },
        addVersion() {
            let formData = new FormData();
            formData.append('date', this.date);
            formData.append('title', this.title);
            formData.append('feature', this.feature);
            formData.append('link', this.link);
            formData.append('size', this.size);
            formData.append('main_image', this.main_image);
            api.post('/api/auth/versions/', formData,
                {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(res => {
                    this.getVersions()
                    this.date=null;
                    this.title=null;
                    this.feature=null;
                    this.link=null;
                    this.size=null;
                })
        },
        onFileSelected(event) {
            this.main_image = event.target.files[0];
        },
        // getImageUrl(imageName) {
        //     return require(`@/storage/vresions/${imageName}`);
        // }

    }
}
</script>

<style>

</style>
