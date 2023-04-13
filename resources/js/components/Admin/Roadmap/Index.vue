<template>
    <div>
        <div>
            <h2 class="text-dark">Добавить Версию</h2>
            <input v-model="title" type="text" class="form-control mt-3 mb-3 w-75" placeholder="Заголовок">
            <textarea rows="6" v-model="descr" type="text" class="form-control mt-3 mb-3 w-75" placeholder="Описание"></textarea>
            <input v-model="date" type="text" class="form-control mt-3 mb-3 w-75" placeholder="Дата окончания">
            <input v-model="year" type="text" class="form-control mt-3 mb-3 w-50" placeholder="Год">
            <select v-model="season" class="form-select w-50 mb-3" aria-label="Default select example">
                <option value="null">Выберите квартал</option>
                <option  value="1">Зима</option>
                <option value="2">Весна</option>
                <option value="3">Лето</option>
                <option value="4">Осень</option>
            </select>
            <a href="#" class="btn btn-success mb-5" @click.prevent="addRoadmap">Добавить</a>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Заголовок работы</th>
                <th scope="col">Описание</th>
                <th scope="col">Дата окончания</th>
                <th scope="col">Год</th>
                <th scope="col">Квартал</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            <template v-for="roadmap in roadmaps">
                <tr v-if="roadmap.id!==this.editId">
                    <th scope="row">{{ roadmap.id }}</th>
                    <td>{{ roadmap.title }}</td>
                    <td>{{ roadmap.descr }}</td>
                    <td>{{ roadmap.date }}</td>
                    <td>{{ roadmap.year }}</td>
                    <td>{{ roadmap.season }}</td>
                    <td>
                        <a class="text-decoration-none btn btn-primary me-2 mb-2" href="#"
                           @click.prevent="this.isEditRoadmap(roadmap.id, roadmap.title, roadmap.descr, roadmap.date, roadmap.year, roadmap.season)"> Редактировать</a>
                        <a class="text-decoration-none btn btn-danger" href="#" @click.prevent="deleteRoadmap(roadmap.id)">
                            Удалить</a>
                    </td>
                </tr>
                <tr v-if="roadmap.id===this.editId">
                    <th scope="row">{{ roadmap.id }}</th>
                    <td><input v-model="editTitle" type="text" class="form-control w-100" placeholder="Название">
                    </td>
                    <td><textarea  rows="4" v-model="editDescr" type="text" class="form-control w-100" placeholder="Что нового"></textarea></td>
                    <td><input v-model="editDate"  type="text" class="form-control w-100" placeholder="Дата выпуска"></td>
                    <td><input v-model="editYear"  type="text" class="form-control w-100" placeholder="Год"></td>
                    <td><select v-model="editSeason" class="form-select w-100" aria-label="Default select example">
                        <option  value="1">Зима</option>
                        <option value="2">Весна</option>
                        <option value="3">Лето</option>
                        <option value="4">Осень</option>
                    </select></td>
                    <td>
                        <a class="text-decoration-none btn btn-primary me-2" href="#"
                           @click.prevent="editRoadmap(roadmap.id)"> Изменить</a>
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
            roadmaps: null,
            api: null,
            title: null,
            descr: null,
            date: null,
            editId: null,
            editDescr: null,
            editTitle: null,
            editDate: null,
            editYear: null,
            editSeason: null,
            year: null,
            season: null
        }
    },

    mounted() {
        this.getRoadmaps()
    },


    methods: {

        isEditRoadmap(id, title, descr, date, year, season){
            this.editId=id;
            this.editDescr=descr;
            this.editTitle=title;
            this.editDate=date;
            this.editYear=year;
            this.editSeason=season;
        },
        getRoadmaps() {
            api.get('/api/auth/roadmaps')
                .then(res => {
                    this.roadmaps = res.data.data
                })
                .catch(err => {
                    console.log(err.response);
                })
        },
        editRoadmap(id){
            api.patch('/api/auth/roadmaps/' + id, {descr: this.editDescr, title:this.editTitle, date: this.editDate, year: this.editYear, season: this.editSeason})
                .then(res=>{
                    this.editId=null
                    this.getRoadmaps()
                })
        },
        deleteRoadmap(roadmap) {
            api.delete('/api/auth/roadmaps/' + roadmap)
                .then(res => {
                    this.getRoadmaps()
                })
        },
        addRoadmap() {
            api.post('/api/auth/roadmaps/', {descr: this.descr, title: this.title, date: this.date, year: this.year, season: this.season})
                .then(res => {
                    this.getRoadmaps()
                    this.descr=null;
                    this.title=null;
                    this.date=null;
                    this.year=null;
                    this.season=null;
                })
        }

    }
}
</script>

<style>

</style>
