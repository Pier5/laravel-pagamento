<template>
    <div id="map"></div>
</template>

<script>
import tt from '@tomtom-international/web-sdk-maps'

export default {
    mounted() {
        const map = tt.map({
        key: 'Oy5FeMobhbOv0274dEpqyZNDta4FXJyA',
        container: 'map',
        })
    },
}
</script>

<style lang="scss" scoped>
    #map{
        width: 100%;
        height: 80vh;
    }
</style>
