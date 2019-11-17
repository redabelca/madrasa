<template>
  <div>
    <router-link
      v-if="row.is_acceptedintest"
      :to="{ name: 'custom-eleves.edit', params: { id: row.eleve.id  , preinscriptionID : row.id } }"
      class="btn btn-success"
    >S'Inscrire</router-link>
  </div>
</template>

<script>
export default {
  props: ["row"]
};
</script>

<style>
</style>