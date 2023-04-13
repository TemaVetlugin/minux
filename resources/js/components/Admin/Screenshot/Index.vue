<template>
    <div>
        <div>
            <h2 class="text-dark">Добавить скриншот</h2>
            <div class="mb-3">
                <input v-on:change="onFileSelected" class="form-control w-75" type="file" id="formFile">
            </div>
            <a href="#" class="btn btn-success mb-5" @click.prevent="addScreenshot">Добавить</a>
        </div>
        <table class="table ">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Фото</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            <template v-for="screenshot in screenshots">
                <tr >
                    <th scope="row">{{ screenshot.id }}</th>
                    <td><img class="table-img-big" :src="'/storage/'+screenshot.main_image" alt="No Image"></td>
                    <td>
                        <a class="text-decoration-none btn btn-danger" href="#"
                           @click.prevent="deleteScreenshot(screenshot.id)">
                            Удалить</a>
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
            screenshots: null,
            api: null,
            main_image: null,
        }
    },

    mounted() {
        this.getScreenshots()
    },


    methods: {

        getScreenshots() {
            api.get('/api/auth/screenshots')
                .then(res => {
                    this.screenshots = res.data.data
                })
                .catch(err => {
                    console.log(err.response);
                })
        },
        deleteScreenshot(screenshot) {
            api.delete('/api/auth/screenshots/' + screenshot)
                .then(res => {
                    this.getScreenshots()
                })
        },
        addScreenshot() {
            let formData = new FormData();
            formData.append('name', this.name);
            formData.append('job', this.job);
            formData.append('main_image', this.main_image);
            api.post('/api/auth/screenshots/', formData,
                {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(res => {
                    this.getScreenshots()
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
