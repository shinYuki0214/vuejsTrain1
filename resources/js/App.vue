<script setup>
import Counter from "./components/Counter.vue";
import UserComponent from "./components/UserComponent.vue";
import Tasks from "./components/Tasks.vue";
import logo from "../images/test.png";

</script>
<template>
    <div class="mv__wrapper">
        <div class="mv__innner">
            <h1 class="mv__title">
                Vueの練習
            </h1>
        </div>
    </div>
    <div class="c__area">
        <Tasks />
        <UserComponent />
        <section class="c__wrapper">
            <h2 class="c__title-01">画像の出力</h2>
            <img :src="logo" class="c__img sec-01__img">
        </section>
        <Counter />
    </div>
</template>