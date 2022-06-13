<template>
<main>
    <router-link to="/map">Go to Map</router-link>
    <router-view></router-view>
</main>
</template>

<script>
export default {

};
</script>

<style lang="scss" scoped>
    a{
        position: fixed;
        top: 90%;
        left: 50%;
        z-index: 90;
        transform: translateX(-50%);

        background-color: black;
        color: white;
        border-radius: 2em;
        padding: 0.5em 1em;
    }
</style>>
