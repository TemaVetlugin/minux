<template>
    <div>
        <div>
            <h2 class="text-dark">Добавить Видеокарту</h2>
            <input v-model="category" type="text" class="form-control mt-3 mb-3 w-75" placeholder="Категория">
            <input v-model="title" type="text" class="form-control mt-3 mb-3 w-75" placeholder="Название">
            <a href="#" class="btn btn-success mb-5" @click.prevent="addCard">Добавить</a>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">категория</th>
                <th scope="col">Название</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            <template v-for="card in cards">
                <tr v-if="card.id!==this.editId">
                    <th scope="row">{{ card.id }}</th>
                    <td>{{ card.category }}</td>
                    <td>{{ card.title }}</td>
                    <td>
                        <a class="text-decoration-none btn btn-primary me-2" href="#"
                           @click.prevent="this.isEditCard(card.id, card.category, card.title)"> Редактировать</a>
                        <a class="text-decoration-none btn btn-danger" href="#" @click.prevent="deleteCard(card.id)">
                            Удалить</a>
                    </td>
                </tr>
                <tr v-if="card.id===this.editId">
                    <th scope="row">{{ card.id }}</th>
                    <td><input v-model="editCategory"  type="text" class="form-control w-50"
                               placeholder="Категория"></td>
                    <td><input v-model="editTitle" type="text" class="form-control w-50" placeholder="Название">
                    </td>
                    <td>
                        <a class="text-decoration-none btn btn-primary me-2" href="#"
                           @click.prevent="editCard(card.id)"> Изменить</a>
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
            cards: null,
            api: null,
            title: null,
            category: null,
            editId: null,
            editCategory: null,
            editTitle: null,
        }
    },

    mounted() {
        this.getCards()
    },


    methods: {

        isEditCard(id, category, title){
            this.editId=id;
            this.editCategory=category;
            this.editTitle=title;
        },
        getCards() {
            api.get('/api/auth/cards')
                .then(res => {
                    this.cards = res.data.data
                })
                .catch(err => {
                    console.log(err.response);
                })
        },
        editCard(id){
            api.patch('/api/auth/cards/' + id, {category: this.editCategory, title:this.editTitle})
                .then(res=>{
                    this.editId=null
                    this.getCards()
                })
        },
        deleteCard(card) {
            api.delete('/api/auth/cards/' + card)
                .then(res => {
                    this.getCards()
                })
        },
        addCard() {
            api.post('/api/auth/cards/', {category: this.category, title: this.title})
                .then(res => {
                    this.getCards()
                    this.category=null;
                    this.title=null;
                })
        }

    }
}
</script>

<style>

</style>
