<template>
<section class="dark wrapper">
    <div class="container">
    <nav class=" navbar-expand-lg ">


            <div class="display-flex">
                <router-link class="nav-item nav-link simple-link  me-2 my-auto" :to="{name: 'main.product'}">
                <img class="logo p-1" src="/images/Logo.svg" alt="logo">
                </router-link>
                <router-link class="nav-item nav-link simple-link  me-2 my-auto" :to="{name: 'main.product'}">
                    <span >Minux</span>
                </router-link>
                <router-link class="nav-item nav-link simple-link  mx-2 my-auto" :to="{name: 'main.download'}">Скачать </router-link>
                <router-link class="nav-item nav-link simple-link  mx-2 my-auto" :to="{name: 'main.company'}">О нас</router-link>
                <router-link class="nav-item nav-link simple-link mx-2 my-auto" :to="{name: 'main.roadmap'}">Этапы разработки</router-link>
            </div>

    </nav>
    </div>


    <main class="main">

    <router-view v-if="this.$route.matched.length"></router-view>
        <Product v-if="!this.$route.matched.length">siu</Product>
    </main>


    <!-- Footer -->
    <footer class="text-center">
        <!-- Grid container -->
        <div class="container p-4">

            <!-- Main: Form -->

            <!-- Main: Form -->

            <!-- Main: Text -->
            <section class="mb-4">
                <hr>
            </section>
            <!-- Main: Text -->

            <!-- Main: Links -->
            <section class="">
                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Партнеры</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="https://sbi.tusur.ru/" class="text-white "><img class="logo p-1" src="/images/SBI.png" alt="logo"></a>
                            </li>
                            <li>
                                <a href="https://fasie.ru/" class="text-white"><img class="logo p-1" src="/images/FSI.svg" alt="logo"></a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->
                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0 nav-small">
                        <h5 class="text-uppercase">Партнеры</h5>

                        <ul class="list-unstyled mb-0">

                            <li>
                                <a href="https://sbi.tusur.ru/" class="nav-item nav-link simple-link-small">СБИ Тусур</a>
                            </li>
                            <li>
                                <a href="https://fasie.ru/" class="nav-item nav-link simple-link-small mt-2">Фонд содействия инновациям</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->
                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0 nav-small">
                        <h5 class="text-uppercase">Навигация</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <router-link class="nav-item nav-link simple-link-small  me-2 my-auto" :to="{name: 'main.product'}">
                                    <span >Minux</span>
                                </router-link>
                            </li>
                            <li>
                                <router-link class="nav-item nav-link simple-link-small  mx-2 my-auto" :to="{name: 'main.download'}">Скачать </router-link>
                            </li>
                            <li>
                                <router-link class="nav-item nav-link simple-link-small  mx-2 my-auto" :to="{name: 'main.company'}">О нас</router-link>
                            </li>
                            <li>
                                <router-link class="nav-item nav-link simple-link-small mx-2 my-auto" :to="{name: 'main.roadmap'}">Этапы разработки</router-link>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Контакты</h5>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="#!" class="nav-item nav-link simple-link-small">ghaghal93@gmail.com</a>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->





                </div>
                <!--Grid row-->
            </section>
            <!-- Main: Links -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2023 ООО Майнукс
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
</section>
</template>

<script>
import Product from "./Main/Product.vue";
export default {
    name: "Index",
    components: {Product}
}
</script>

<style scoped>

</style>
