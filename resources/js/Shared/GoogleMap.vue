<template>
  <GmapMap
      :center="mapConfig"
      :zoom="14"
      map-type-id="roadmap"

  >
    <GmapMarker
        :position="mapConfig"
    />
  </GmapMap>
</template>

<script>

export default {
  name: "GoogleMap",
  props: {
    mapConfig: Object,
  },
}
</script>

<style scoped>

</style>