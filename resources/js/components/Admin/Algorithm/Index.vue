<template>
    <div>
        <div>
            <h2 class="text-dark">Добавить Алгоритм</h2>
            <input v-model="title" type="text" class="form-control mt-3 mb-3 w-75" placeholder="Название">
            <a href="#" class="btn btn-success mb-5" @click.prevent="addAlgorithm">Добавить</a>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Название</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            <template v-for="algorithm in algorithms">
                <tr v-if="algorithm.id!==this.editId">
                    <th scope="row">{{ algorithm.id }}</th>
                    <td>{{ algorithm.title }}</td>
                    <td>
                        <a class="text-decoration-none btn btn-primary me-2" href="#"
                           @click.prevent="this.isEditAlgorithm(algorithm.id, algorithm.title)"> Редактировать</a>
                        <a class="text-decoration-none btn btn-danger" href="#" @click.prevent="deleteAlgorithm(algorithm.id)">
                            Удалить</a>
                    </td>
                </tr>
                <tr v-if="algorithm.id===this.editId">
                    <th scope="row">{{ algorithm.id }}</th>
                    <td><input v-model="editTitle" type="text" class="form-control w-50" placeholder="Название">
                    </td>
                    <td>
                        <a class="text-decoration-none btn btn-primary me-2" href="#"
                           @click.prevent="editAlgorithm(algorithm.id)"> Изменить</a>
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
            algorithms: null,
            api: null,
            title: null,
            editId: null,
            editTitle: null,
        }
    },

    mounted() {
        this.getAlgorithms()
    },


    methods: {

        isEditAlgorithm(id, title){
            this.editId=id;
            this.editTitle=title;
        },
        getAlgorithms() {
            api.get('/api/auth/algorithms')
                .then(res => {
                    this.algorithms = res.data.data
                })
                .catch(err => {
                    console.log(err.response);
                })
        },
        editAlgorithm(id){
            api.patch('/api/auth/algorithms/' + id, {title:this.editTitle})
                .then(res=>{
                    this.editId=null
                    this.getAlgorithms()
                })
        },
        deleteAlgorithm(algorithm) {
            api.delete('/api/auth/algorithms/' + algorithm)
                .then(res => {
                    this.getAlgorithms()
                })
        },
        addAlgorithm() {
            api.post('/api/auth/algorithms/', { title: this.title})
                .then(res => {
                    this.getAlgorithms()
                    this.title=null;
                })
        }

    }
}
</script>

<style>

</style>
