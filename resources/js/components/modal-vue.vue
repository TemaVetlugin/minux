<template>
    <transition name="modal-v">
    <div v-if="show" class="modal-shadow" @click.self="closeModal">
        <div class="modal-v">
            <div class="modal-v-close" @click="closeModal">&#10006;</div>
            <slot name="title">
                <h3 class="modal-v-title">Заголовок</h3>
            </slot>
            <slot name="body">
                <div class="modal-v-content">
                    Дефолтный контент модального окна
                </div>
            </slot>
        </div>
    </div>
    </transition>
</template>
<script>
export default {
    name: "ModalWindow",
    data: function () {
        return {
            show: false
        }
    },
    methods: {
        closeModal: function () {
            this.show = false
        }
    }
}
</script>

<style scoped
       lang="scss">


</style>
