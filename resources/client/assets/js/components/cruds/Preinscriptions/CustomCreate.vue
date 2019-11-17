<template>
  <section class="content-wrapper" style="min-height: 100vh;">
    <section class="content-header">
      <h1>Etape 2 : Preinscription</h1>
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
                  <label for="nomprofesseurtest">Nom Professeur Test</label>
                  <input
                    type="text"
                    class="form-control"
                    name="nomprofesseurtest"
                    placeholder="Enter Nom Professeur Test"
                    :value="item.nomprofesseurtest"
                    @input="updateNomprofesseurtest"
                  />
                </div>
                <div class="form-group">
                  <label for="notetest">Note Test</label>
                  <input
                    type="text"
                    class="form-control"
                    name="notetest"
                    placeholder="Enter Note Test"
                    :value="item.notetest"
                    @input="updateNotetest"
                  />
                </div>
                <div class="form-group">
                  <label for="resultattest">Resultat Test</label>
                  <input
                    type="text"
                    class="form-control"
                    name="resultattest"
                    placeholder="Enter Resultat Test"
                    :value="item.resultattest"
                    @input="updateResultattest"
                  />
                </div>
                <div class="form-group">
                  <div class="checkbox">
                    <label>
                      <input
                        type="checkbox"
                        name="is_acceptedintest"
                        :value="item.is_acceptedintest"
                        :checked="item.is_acceptedintest == true"
                        @change="updateIs_acceptedintest"
                      />
                      Test Accepte
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="fraistest">Frais Test</label>
                  <input
                    type="number"
                    class="form-control"
                    name="fraistest"
                    placeholder="Enter Frais Test"
                    :value="item.fraistest"
                    @input="updateFraistest"
                  />
                </div>
                <div class="form-group">
                  <div class="checkbox">
                    <label>
                      <input
                        type="checkbox"
                        name="fraispayed"
                        :value="item.fraispayed"
                        :checked="item.fraispayed == true"
                        @change="updateFraispayed"
                      />
                      Frais Payed
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <div class="checkbox">
                    <label>
                      <input
                        type="checkbox"
                        name="transport"
                        :value="item.transport"
                        :checked="item.transport == true"
                        @change="updateTransport"
                      />
                      Transport
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="datetest">Date Test</label>
                  <date-picker
                    :value="item.datetest"
                    :config="$root.dpconfigDatetime"
                    name="datetest"
                    placeholder="Enter Date Test"
                    @dp-change="updateDatetest"
                  ></date-picker>
                </div>
                <div class="form-group">
                  <label for="datelimiteinscription">Date Limite Inscription</label>
                  <date-picker
                    :value="item.datelimiteinscription"
                    :config="$root.dpconfigDatetime"
                    name="datelimiteinscription"
                    placeholder="Enter Date Limite Inscription"
                    @dp-change="updateDatelimiteinscription"
                  ></date-picker>
                </div>
                <div class="form-group">
                  <label for="observations">Observations</label>
                  <textarea
                    rows="3"
                    class="form-control"
                    name="observations"
                    placeholder="Enter Observations"
                    :value="item.observations"
                    @input="updateObservations"
                  ></textarea>
                </div>
                <div class="form-group">
                  <label for="anneescolaire">Annees colaire *</label>
                  <v-select
                    name="anneescolaire"
                    label="label"
                    @input="updateAnneescolaire"
                    :value="item.anneescolaire"
                    :options="anneescolairesAll"
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
  props: ["eleveID"],
  data() {
    return {
      eleve: {}
    };
  },
  computed: {
    ...mapGetters("PreinscriptionsSingle", [
      "item",
      "loading",
      "anneescolairesAll",
      "elevesAll"
    ])
  },
  async created() {
    this.fetchAnneescolairesAll(), this.fetchElevesAll();
    this.setEleve(
      (await axios.get("/api/v1/eleves/" + this.eleveID)).data.data
    );
  },
  destroyed() {
    this.resetState();
  },
  methods: {
    ...mapActions("PreinscriptionsSingle", [
      "storeData",
      "resetState",
      "setNomprofesseurtest",
      "setNotetest",
      "setResultattest",
      "setIs_acceptedintest",
      "setFraistest",
      "setFraispayed",
      "setTransport",
      "setDatetest",
      "setDatelimiteinscription",
      "setObservations",
      "setAnneescolaire",
      "setEleve",
      "fetchAnneescolairesAll",
      "fetchElevesAll"
    ]),
    updateNomprofesseurtest(e) {
      this.setNomprofesseurtest(e.target.value);
    },
    updateNotetest(e) {
      this.setNotetest(e.target.value);
    },
    updateResultattest(e) {
      this.setResultattest(e.target.value);
    },
    updateIs_acceptedintest(e) {
      this.setIs_acceptedintest(e.target.checked);
    },
    updateFraistest(e) {
      this.setFraistest(e.target.value);
    },
    updateFraispayed(e) {
      this.setFraispayed(e.target.checked);
    },
    updateTransport(e) {
      this.setTransport(e.target.checked);
    },
    updateDatetest(e) {
      this.setDatetest(e.target.value);
    },
    updateDatelimiteinscription(e) {
      this.setDatelimiteinscription(e.target.value);
    },
    updateObservations(e) {
      this.setObservations(e.target.value);
    },
    updateAnneescolaire(value) {
      this.setAnneescolaire(value);
    },
    updateEleve(value) {
      this.setEleve(value);
    },
    submitForm() {
      this.storeData()
        .then(() => {
          this.$router.push({ name: "preinscriptions.index" });
          this.$eventHub.$emit("create-success");
        })
        .catch(error => {
          console.error(error);
        });
    }
  }
};
</script>


<style scoped>
</style>
