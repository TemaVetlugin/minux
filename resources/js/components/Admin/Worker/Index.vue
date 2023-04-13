<template>
    <div>
        <div>
            <h2 class="text-dark">Добавить участника команды </h2>
            <input v-model="name" type="text" class="form-control mt-3 mb-3 w-75" placeholder="Имя">
            <input v-model="job" type="text" class="form-control mt-3 mb-3 w-75" placeholder="Должность">
            <div class="mb-3">
                <h4 class="text-dark">Добавить фото</h4>
                <input v-on:change="onFileSelected" class="form-control w-75" type="file" id="formFile">
            </div>
            <p class="text-dark">(добавлять квадратные фото, чтобы не растягивать верстку)</p>
            <a href="#" class="btn btn-success mb-5" @click.prevent="addWorker">Добавить</a>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Имя</th>
                <th scope="col">Должность</th>
                <th scope="col">Фото</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            <template v-for="worker in workers">
                <tr v-if="worker.id!==this.editId">
                    <th scope="row">{{ worker.id }}</th>
                    <td>{{ worker.name }}</td>
                    <td>{{ worker.job }}</td>
                    <td><img class="table-img" :src="'/storage/'+worker.main_image" alt="No Image"></td>
                    <td>
                        <a class="text-decoration-none btn btn-primary me-2" href="#"
                           @click.prevent="this.isEditWorker(worker.id, worker.name, worker.job)"> Редактировать</a>
                        <a class="text-decoration-none btn btn-danger" href="#"
                           @click.prevent="deleteWorker(worker.id)">
                            Удалить</a>
                    </td>
                </tr>
                <tr v-if="worker.id===this.editId">
                    <th scope="row">{{ worker.id }}</th>
                    <td><input v-model="editName" type="text" class="form-control w-50"
                               placeholder="Категория"></td>
                    <td><input v-model="editJob" type="text" class="form-control w-50" placeholder="Название">
                    </td>
                    <td>
                        <a class="text-decoration-none btn btn-primary me-2" href="#"
                           @click.prevent="editWorker(worker.id)"> Изменить</a>
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
            workers: null,
            api: null,
            job: null,
            name: null,
            editId: null,
            editName: null,
            editJob: null,

            main_image: null,
        }
    },

    mounted() {
        this.getWorkers()
    },


    methods: {

        isEditWorker(id, name, job) {
            this.editId = id;
            this.editName = name;
            this.editJob = job;
        },
        getWorkers() {
            api.get('/api/auth/workers')
                .then(res => {
                    this.workers = res.data.data
                })
                .catch(err => {
                    console.log(err.response);
                })
        },
        editWorker(id) {
            api.patch('/api/auth/workers/' + id, {name: this.editName, job: this.editJob})
                .then(res => {
                    this.editId = null
                    this.getWorkers()
                })
        },
        deleteWorker(worker) {
            api.delete('/api/auth/workers/' + worker)
                .then(res => {
                    this.getWorkers()
                })
        },
        addWorker() {
            let formData = new FormData();
            formData.append('name', this.name);
            formData.append('job', this.job);
            formData.append('main_image', this.main_image);
            api.post('/api/auth/workers/', formData,
                {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(res => {
                    this.getWorkers()
                    this.name = null;
                    this.job = null;
                })
        },
        onFileSelected(event) {
            this.main_image = event.target.files[0];
        },
    }
}
</script>

<style>

</style>
