<template>
    <div class="container roadmap">
        <h1 class="header-big mt-5 mb-5 ms-0">Этапы разработки</h1>

        <template v-for="year in years">
            <div class="roadmap-item mt-4 mb-4 display-flex roadmap-item-medium">
                <div class="display-flex-around row w-100">
                    <template v-for="roadmap in roadmaps">
                        <div class="col-6 display-flex-around" v-if="roadmap.year===year.year">
                            <div class="card mt-3 mb-3">
                                <div class="card-body">
                                    <h2 v-if="roadmap.season==1">Зима</h2>
                                    <h2 v-if="roadmap.season==2">Весна</h2>
                                    <h2 v-if="roadmap.season==3">Лето</h2>
                                    <h2 v-if="roadmap.season==4">Осень</h2>
                                    <hr>
                                    <h5 class="card-title sub-title">{{ roadmap.title }}</h5>
                                    <p class="card-text">{{ roadmap.descr }}</p>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
                    <h2 class="number year">{{ year.year }}</h2>

            </div>
            <div class="roadmap-item mt-4 mb-4 cards-medium">
                <h2 class="number year-normal  mx-auto">{{ year.year }}</h2>
                <div>
                    <div class="slider-block  mt-10 ">
                        <swiper
                            :slides-per-view="1"
                            :loop="false"
                            :space-between="10"
                            @swiper="onSwiper"
                            @slideChange="onSlideChange"
                            :navigation="true"
                            class="h-full"
                        >
                            <template v-for="roadmap in roadmaps">
                                <swiper-slide v-if="roadmap.year===year.year">
                                    <div class="ts-swiper dark">
                                        <div class="card mt-3 mb-3">
                                            <div class="card-body">
                                                <h2 v-if="roadmap.season==1">Зима</h2>
                                                <h2 v-if="roadmap.season==2">Весна</h2>
                                                <h2 v-if="roadmap.season==3">Лето</h2>
                                                <h2 v-if="roadmap.season==4">Осень</h2>
                                                <hr>
                                                <h5 class="card-title sub-title">{{ roadmap.title }}</h5>
                                                <p class="card-text">{{ roadmap.descr }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </swiper-slide>
                            </template>

                        </swiper>
                    </div>
                </div>
            </div>
        </template>

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
    name: "RoadMap",
    components: {
        Swiper,
        SwiperSlide,
    },
    data() {
        return {
            roadmaps: null,
            years: null,
            onSlideChange: null,
            onSwiper: null,
        }
    },

    mounted() {
        this.getRoadmaps()
    },

    methods: {
        getRoadmaps() {
            axios.get('/api/auth/roadmaps')
                .then(res => {
                    this.roadmaps = res.data.data
                    const table = {};
                    this.years = this.roadmaps.filter(({year}) => (!table[year] && (table[year] = 1)));
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
