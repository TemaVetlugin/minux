<template>
    <div>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">email</th>
                <th scope="col">Сообщение</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            <template v-for="feedback in feedbacks">
                <tr>
                    <th scope="row">{{ feedback.id }}</th>
                    <td>{{ feedback.email }}</td>
                    <td>{{ feedback.title }}</td>
                    <td>
                        <a class="text-decoration-none btn btn-danger" href="#" @click.prevent="deleteFeedback(feedback.id)">
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
            feedbacks: null,
            api: null,
            title: null,
            email: null,
        }
    },

    mounted() {
        this.getFeedbacks()
    },


    methods: {
        getFeedbacks() {
            api.get('/api/auth/feedbacks')
                .then(res => {
                    this.feedbacks = res.data.data
                })
                .catch(err => {
                    console.log(err.response);
                })
        },
        deleteFeedback(feedback) {
            api.delete('/api/auth/feedbacks/' + feedback)
                .then(res => {
                    this.getFeedbacks()
                })
        },
        addFeedback() {
            api.post('/api/auth/feedbacks/', {email: this.email, title: this.title})
                .then(res => {
                    this.getFeedbacks()
                })
        }

    }
}
</script>

<style>

</style>
