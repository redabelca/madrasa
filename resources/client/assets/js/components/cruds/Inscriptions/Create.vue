<template>
  <section class="content-wrapper" style="min-height: 100vh;">
    <section class="content-header">
      <h1>Inscription</h1>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <form @submit.prevent="submitForm" novalidate>
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Create</h3>
              </div>

              <div class="box-body">
                <back-buttton></back-buttton>
              </div>

              <bootstrap-alert />

              <div class="box-body">
                <div class="form-group">
                  <label for="dateentree">Date Entree</label>
                  <date-picker
                    :value="item.dateentree"
                    :config="$root.dpconfigDatetime"
                    name="dateentree"
                    placeholder="Enter Date Entree"
                    @dp-change="updateDateentree"
                  ></date-picker>
                </div>
                <div class="form-group">
                  <div class="checkbox">
                    <label>
                      <input
                        type="checkbox"
                        name="interne"
                        :value="item.interne"
                        :checked="item.interne == true"
                        @change="updateInterne"
                      />
                      Interne
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="classe">Classe *</label>
                  <v-select
                    name="classe"
                    label="label_fr"
                    @input="updateClasse"
                    :value="item.classe"
                    :options="classesAll"
                  />
                </div>
                <div class="form-group">
                  <label for="circuit">Circuit</label>
                  <v-select
                    name="circuit"
                    label="label"
                    @input="updateCircuit"
                    :value="item.circuit"
                    :options="circuitsAll"
                  />
                </div>
                <div class="form-group">
                  <label for="niveau">Niveau</label>
                  <v-select
                    name="niveau"
                    label="label_fr"
                    @input="updateNiveau"
                    :value="item.niveau"
                    :options="niveauxAll"
                  />
                </div>
                <div class="form-group">
                  <label for="anneescolaire">Anneescolaire *</label>
                  <v-select
                    name="anneescolaire"
                    label="label"
                    @input="updateAnneescolaire"
                    :value="item.anneescolaire"
                    :options="anneescolairesAll"
                  />
                </div>
                <div class="form-group">
                  <label for="preinscription">Preinscription</label>
                  <v-select
                    name="preinscription"
                    label="datetest"
                    @input="updatePreinscription"
                    :value="item.preinscription"
                    :options="preinscriptionsAll"
                  />
                </div>
              </div>

              <div class="box-footer">
                <vue-button-spinner
                  class="btn btn-primary btn-sm"
                  :isLoading="loading"
                  :disabled="loading"
                >Save</vue-button-spinner>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
  </section>
</template>


<script>
import { mapGetters, mapActions } from "vuex";

export default {
  data() {
    return {
      // Code...
    };
  },
  computed: {
    ...mapGetters("InscriptionsSingle", [
      "item",
      "loading",
      "classesAll",
      "circuitsAll",
      "niveauxAll",
      "anneescolairesAll",
      "preinscriptionsAll"
    ])
  },
  async created() {
    this.fetchClassesAll(),
      this.fetchCircuitsAll(),
      this.fetchNiveauxAll(),
      this.fetchAnneescolairesAll(),
      this.fetchPreinscriptionsAll();
    this.setPreinscription(
      await this.getPreinscription(this.$route.params.preinscriptionID)
    );
  },
  destroyed() {
    this.resetState();
  },
  methods: {
    ...mapActions("InscriptionsSingle", [
      "storeData",
      "resetState",
      "setDateentree",
      "setInterne",
      "setClasse",
      "setCircuit",
      "setNiveau",
      "setAnneescolaire",
      "setPreinscription",
      "fetchClassesAll",
      "fetchCircuitsAll",
      "fetchNiveauxAll",
      "fetchAnneescolairesAll",
      "fetchPreinscriptionsAll"
    ]),
    updateDateentree(e) {
      this.setDateentree(e.target.value);
    },
    updateInterne(e) {
      this.setInterne(e.target.checked);
    },
    updateClasse(value) {
      this.setClasse(value);
    },
    updateCircuit(value) {
      this.setCircuit(value);
    },
    updateNiveau(value) {
      this.setNiveau(value);
    },
    updateAnneescolaire(value) {
      this.setAnneescolaire(value);
    },
    updatePreinscription(value) {
      this.setPreinscription(value);
    },
    submitForm() {
      this.storeData()
        .then(() => {
          this.$router.push({ name: "inscriptions.index" });
          this.$eventHub.$emit("create-success");
        })
        .catch(error => {
          console.error(error);
        });
    },
    getPreinscription(id) {
      return axios.get("/api/v1/preinscriptions/" + id).then(response => {
        return response.data.data;
      });
    }
  }
};
</script>


<style scoped>
</style>
