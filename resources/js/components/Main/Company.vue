<template>
    <div class="container">
        <section class="company-title">
            <div class="title-wrapper">
                <h1 class="head-title">
                    ООО “МАЙНУКС”
                </h1>
                <p class="title-description">
                    Адрес: Калужская область, город Обнинск
                </p>
            </div>
        </section>

        <section class="about-us display-flex">

            <div class="descr-item product-info-img-small">
                <div>
                    <img src="/images/company-descr.png" class="about-us-img" alt="">
                </div>
            </div>
            <div class="descr-item ms-1 ms-md-5">
                <h3 class="header">О компании</h3>
                <h5 class="mt-4 sub-title mb-3">Цели и решения</h5>
                <p class="mt-3">ООО “МАЙНУКС” – Российская компания, специализирующаяся на разработке IT-продуктов в сфере майнинга криптовалюты, а так же блокчейн-технологий.</p>
                <p class="mt-3">Наша главная цель – облегчить процесс майнинга криптовалюты.</p>
                <p class="mt-3">Наши разрабатываемые решения основаны на ядре Linux и собственной сборке Ubuntu, что позволяет нам тонко настроить ОС для майнинга.</p>
            </div>

        </section>


        <section class="products">
            <h2 class="header-big mx-auto mx-md-0 max-content">Наши продукты:</h2>
            <div class="display-flex-around row cards-big">
                <div class="col-6 display-flex-around">
                    <div class="card col-8 mt-5" style="width: 18rem;">
                        <img src="/images/Logo.svg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Операционная система для майнинга (MINUX-OS)</h5>
                            <p class="card-text">в разработке</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 display-flex-around">
                    <div class="card mt-4" style="width: 18rem;">
                        <img src="/images/coming.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Мобильное приложение для управления фермой (MINUX-control)</h5>
                            <p class="card-text">в дальнейших планах</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 display-flex-around">
                <div class="card mt-5" style="width: 18rem;">
                    <img src="/images/coming.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Майнинг пул (MINUX-pool)</h5>
                        <p class="card-text">в дальнейших планах</p>
                    </div>
                </div></div>
                <div class="col-6 display-flex-around">
                <div class="card mt-5" style="width: 18rem;">
                    <img src="/images/coming.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Трейдинг бот криптовалютой (MINUX-trader)</h5>
                        <p class="card-text">в дальнейших планах</p>
                    </div>
                </div></div>
            </div>
            <div class="slider-block cards-small mt-10 ">
                <swiper
                    :slides-per-view="1"
                    :loop="true"
                    :space-between="10"
                    @swiper="onSwiper"
                    @slideChange="onSlideChange"
                    :navigation="false"
                    class="h-full"
                >
                        <swiper-slide>
                            <div class="ts-swiper dark">
                                <div class="card mt-2 mt-sm-5" style="width: 18rem;">
                                    <img src="/images/Logo.svg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Операционная система для майнинга (MINUX-OS)</h5>
                                        <p class="card-text">в разработке</p>
                                    </div>
                                </div>
                            </div>
                        </swiper-slide>
                        <swiper-slide>
                            <div class="ts-swiper dark">
                                <div class="card mt-2 mt-sm-5" style="width: 18rem;">
                                    <img src="/images/coming.png" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Мобильное приложение для управления фермой (MINUX-control)</h5>
                                        <p class="card-text">в дальнейших планах</p>
                                    </div>
                                </div>
                            </div>
                        </swiper-slide>
                        <swiper-slide>
                            <div class="ts-swiper dark">
                                <div class="card mt-2 mt-sm-5" style="width: 18rem;">
                                    <img src="/images/coming.png" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Майнинг пул (MINUX-pool)</h5>
                                        <p class="card-text">в дальнейших планах</p>
                                    </div>
                                </div>
                            </div>
                        </swiper-slide>
                        <swiper-slide>
                            <div class="ts-swiper dark">
                                <div class="card mt-2 mt-sm-5" style="width: 18rem;">
                                    <img src="/images/coming.png" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Трейдинг бот криптовалютой (MINUX-trader)</h5>
                                        <p class="card-text">в дальнейших планах</p>
                                    </div>
                                </div>
                            </div>
                        </swiper-slide>

                </swiper>
            </div>
        </section>

        <section class="team">
            <h2 class="header-big mx-auto mx-md-0 max-content">Наша команда:</h2>
            <div  class="display-flex-around row cards-big">
                <div class="col-md-4 col-6 display-flex-around" v-for="worker in workers">
                    <div class="card mt-5" style="width: 18rem;">
                        <img :src="'/storage/'+worker.main_image"  class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{worker.name}}</h5>
                            <p class="card-text">{{worker.job}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slider-block cards-small mt-10 ">
                <swiper
                    :slides-per-view="1"
                    :loop="false"
                    :space-between="10"
                    @swiper="onSwiper"
                    @slideChange="onSlideChange"
                    :navigation="true"
                    class="h-full"
                >
                    <template v-for="worker in workers">
                        <swiper-slide>
                            <div class="ts-swiper dark">
                                <div class="card mt-2 mt-sm-5" style="width: 18rem;">
                                    <img :src="'/storage/'+worker.main_image"  class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{worker.name}}</h5>
                                        <p class="card-text">{{worker.job}}</p>
                                    </div>
                                </div>
                            </div>
                        </swiper-slide>
                    </template>

                </swiper>
            </div>
        </section>
    </div>
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

SwiperCore.use([Pagination, Navigation]);

export default {
    name: "Company",
    components: {
        Swiper,
        SwiperSlide,
    },
    data() {
        return {
            workers: null,
            onSlideChange: null,
            onSwiper: null,
        }
    },

    mounted() {
        this.getWorkers()
    },


    methods: {
        getWorkers() {
            axios.get('/api/auth/workers')
                .then(res => {
                    this.workers = res.data.data
                })
                .catch(err => {
                    console.log(err.response);
                })
        },
    }
}
</script>

<style scoped>

</style>
