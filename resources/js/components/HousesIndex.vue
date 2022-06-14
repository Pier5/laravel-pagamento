<template>
  <div class="container py-5" id="infiniteScroll">
    <div class="row row-cols-4">
        <!-- <div class="col" v-for="house in houses" :key="house.id">
            <div class="card h-100">
                <img :src="house.poster" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>
        </div> -->

        <div v-if="houses.length" v-observe-visibility="handleScrolledToBottom"></div>
    </div>
  </div>
</template>

<script>
// import Vuex from 'vuex';
// Vue.use(Vuex);
export default {
  name: 'HousesIndex',
  computed: {
    houses() {
      return this.$store.state.houses;
    },
    page() {
      return this.$store.state.page;
    },
    lastPage() {
      return this.$store.state.lastPage;
    }
  },
  methods: {
    getHouses() {
      Axios.get(`/api/houses?page=${this.page}`)
        .then(response => {
          this.houses.push(...response.data.data);
          this.lastPage = response.data.last_page;
        })
        .catch(error => {
          console.log(error);
        });
    },
    handleScrolledToBottom(isVisible) {
        if (!isVisible) {
            return;
        }
      if (this.page < this.lastPage) {
        this.$store.commit('pageIncrement');
        this.$store.commit('search');
      }
    }
},
  created() {
    //  console.log(this.$refs)
    this.$store.commit('search');
  },
   mounted() {
        console.log(this.$store.state.count);
    },
};
</script>

<style lang="scss" scoped>
</style>
