<script setup>
import { ref } from "vue";
const count = ref(0);

const addCount = () => {
    count.value = count.value + 1;
};
</script>

<template>
    <section class="c__wrapper">
        <h2 class="c__title-01">簡易カウンター</h2>
        <div class="sec-02__parts">Count:<span class="sec-02__parts-num">{{ count }}</span></div>
        <button @click="addCount" class="sec-02__btn">Add</button>
    </section>
</template>