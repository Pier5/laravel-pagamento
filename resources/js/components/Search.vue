<template>
  <form @submit.prevent = "research">
    <input type="text" v-model="filter" placeholder="Search...">
    <button>sub</button>
  </form>
</template>

<script>
// import Vuex from 'vuex';
// Vue.use(Vuex);
export default {
    data () {
        return {
            filter: null,
        }
    },
    methods: {
        research() {
            this.$store.commit('filterSet', this.filter);
        }
    },
    mounted() {
        console.log(this.$store.state.count);
    },
}
</script>

<style>

</style>
