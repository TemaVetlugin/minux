<template>
    <div class="container">
        <section class="product-title">
            <div class="title-wrapper">
                <h1 class="head-title">
                    MINUX OS
                </h1>
                <p class="title-description">
                    Первая операционная система для майнинга в России
                </p>
            </div>
        </section>



        <section class="product-info">
            <div class="product-info-title">
                <h2 class="header">О продукте</h2>
                <h5 class="sub-title">Разгонем и сконфигурируем</h5>
                <p class="info-p-offset">Нами разработаны узкоспециализированные продукты для майнинга. Сотрудничая с
                    нами, вы без проблем освоите майнинг. Мы за вас настроили ядро линукс, вам нужно только начать.
                </p>
                <div class="product-info-descr display-flex product-descr-mini">
                    <div class="product-info-descr-item">
                        <i class="fa-solid fa-bitcoin-sign info-icon"></i>
                        <h5 class="sub-title">Разгонем</h5>
                        <p>Мы предлагаем решение в виде узкоспециализированной операционной системы, основанной на ядре
                            Linux, которая будет давать вам больший доход с майнинга при тех же ресурсных затратах за
                            счет освобождения ресурсов системы. </p>
                    </div>
                    <div class="product-info-descr-item">
                        <i class="fa-solid fa-microchip info-icon"></i>
                        <h5 class="sub-title">Сконфигурируем</h5>
                        <p>Данная операционная система содержит в себе софт предназначенный для конфигурации и разгона
                            майнинг оборудования. Специальные алгоритмы выберут наиболее прибыльную на данный момент
                            криптовалюту.</p>
                    </div>
                </div>
            </div>
            <div class="product-info-img">
                <img src="/images/product-info.jpg" class="product-info-img" alt="">
            </div>
        </section>
        <section class="product-items">
            <div class="item-number"><h2 class="number">
                {{ this.countCards }}
            </h2></div>
            <div class="item-descr">
                <h3 class="header">Поддерживаемых видеокарт</h3>
                <a href="#" @click.prevent="showModalTwo"
                   class="sub-title text-decoration-none link">Подробнее</a>
            </div>
        </section>

        <section class="system row">

            <div class="system-wrapper system-mid col-lg-6 mx-auto">
                <h3 class="header">Системные требования:</h3>
                <p>- Двухядерный процессор с частотой 2ГГц</p>
                <p>- 4 Гб операционной памяти</p>
                <p>- 25 Гб свободной памяти на жестком диске</p>
                <p>- Стабильное интернет соединение</p>
                <p>- DVD или USB разъем для установочного устройства</p>
            </div>
            <div class="system-wrapper col-lg-6">
                <h3 class="header mx-auto">Скриншоты веб приложения:</h3>
                <!-- Slider main container -->
                <div class="slider-block  mt-10 ">
                    <swiper
                        :slides-per-view="1"
                        :loop="true"
                        :space-between="10"
                        @swiper="onSwiper"
                        @slideChange="onSlideChange"
                        :navigation="true"
                        class="h-full"
                    >
                        <template v-for="screenshot in screenshots">
                        <swiper-slide>
                            <div class="ts-swiper dark"><img :src="'/storage/'+screenshot.main_image" alt="No Image">
                            </div>
                        </swiper-slide>
                        </template>

                    </swiper>
                </div>

            </div>
        </section>

        <section class="product-items item-end">
            <div class="item-descr">
                <h3 class="header">Поддерживаемых алгоритмов</h3>
                <a href="#"  @click.prevent="showModal"
                   class="sub-title text-decoration-none link">Подробнее</a>
            </div>
            <div class="item-number"><h2 class="number">
                {{ this.countAlgorithms }}
            </h2></div>

        </section>

    </div>


    <modal-window ref="modal">
        <template v-slot:title class="modal-v-title">
            <h2 class="header">Поддерживаемые алгоритмы: </h2>
        </template>
        <template v-slot:body>
            <section class="algorithms modal-v-content">
                        <span v-for="(algorithm, index) in algorithms" :key="algorithm.name"><span
                            v-if="index">, </span><span class=" sub-title">{{ algorithm.title }}</span></span>
            </section>
        </template>
    </modal-window>

    <modal-window ref="modalTwo">
        <template v-slot:title class="modal-v-title">
            <h2 class="header">Поддерживаемые видеокарты: </h2>
        </template>
        <template v-slot:body>
            <section class="algorithms modal-v-content">
                <table class="table roadmap">
                    <thead>
                    <tr>
                        <th scope="col" class="text-table-medium">Производитель</th>
                        <th scope="col" class="text-table-medium">Модели</th>
                    </tr>
                    </thead>
                    <tbody>
                    <template v-for="cardCat in cardCategories">
                        <tr>
                            <td class="text-table-medium">{{ cardCat.category }}</td>
                            <td class="text-table-medium"> <span class="sub-title text-table-medium" v-for="cardTitle in cards"><span
                                v-if="cardCat.category===cardTitle.category">{{ cardTitle.title }}, </span>
            </span></td>

                        </tr>
                    </template>
                    </tbody>
                </table>
            </section>
        </template>
    </modal-window>
</template>

<script>
// Import Swiper Vue.js components
import {Swiper, SwiperSlide} from "swiper/vue";

// import Swiper core and required modules
import SwiperCore, {Pagination, Navigation} from "swiper";
// swiper bundle styles
import "swiper/swiper-bundle.min.css";

// swiper core styles
import "swiper/swiper.min.css";
import ModalWindow from '../modal-vue.vue'

SwiperCore.use([Pagination, Navigation]);


export default {
    name: "Product",
    components: {
        Swiper,
        SwiperSlide,
        ModalWindow,
    },
    data() {
        return {
            onSlideChange: null,
            onSwiper: null,
            algorithms: null,
            countAlgorithms: null,
            cards: null,
            countCards: null,
            tableCard: null,
            cardCategories: null,
            screenshots: null
        }
    },
    mounted() {
        this.getAlgorithms()
        this.getCards()
        this.getScreenshots()

    },
    methods: {
        getScreenshots() {
            axios.get('/api/auth/screenshots')
                .then(res => {
                    this.screenshots = res.data.data
                })
                .catch(err => {
                    console.log(err.response);
                })
        },
        showModal: function () {
            this.$refs.modal.show = true
        },
        showModalTwo: function () {
            this.$refs.modalTwo.show = true
        },
        getAlgorithms() {
            axios.get('/api/auth/algorithms')
                .then(res => {
                    this.algorithms = res.data.data
                    this.countAlgorithms = Object.keys(this.algorithms).length
                })
                .catch(err => {
                    console.log(err.response);
                })
        },

        getCards() {
            axios.get('/api/auth/cards')
                .then(res => {
                    this.cards = res.data.data
                    this.countCards = Object.keys(this.cards).length
                    const table = {};
                    this.cardCategories = this.cards.filter(({category}) => (!table[category] && (table[category] = 1)));
                })
                .catch(err => {
                    console.log(err.response);
                })
        },


    },


}

</script>

<style lang="scss">
body {
    font-family: 'Source Sans Pro', sans-serif;
    margin: 0;
    padding: 0;
    height: 100vh;
}

.page {
    position: relative;
    width: 100%;
    min-height: 100%;
}
</style>
