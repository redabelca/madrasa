<template>
  <div>
    <span v-if="row.sexe == 1">Masculin</span>
    <span v-if="row.sexe == 0">Feminin</span>
  </div>
</template>

<script>
export default {
  props: ["row"]
};
</script>

<style>
</style>