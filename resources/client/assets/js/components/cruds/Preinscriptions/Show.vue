<template>
  <section class="content-wrapper" style="min-height: 100vh;">
    <section class="content-header">
      <h1>Preinscription</h1>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">View</h3>
            </div>

            <div class="box-body">
              <back-buttton></back-buttton>
            </div>

            <div class="box-body">
              <div class="row">
                <div class="col-xs-6">
                  <table class="table table-bordered table-striped">
                    <tbody>
                      <tr>
                        <th>#</th>
                        <td>{{ item.id }}</td>
                      </tr>
                      <tr>
                        <th>Nom Professeur Test</th>
                        <td>{{ item.nomprofesseurtest }}</td>
                      </tr>
                      <tr>
                        <th>Note Test</th>
                        <td>{{ item.notetest }}</td>
                      </tr>
                      <tr>
                        <th>Resultat Test</th>
                        <td>{{ item.resultattest }}</td>
                      </tr>
                      <tr>
                        <th>Test Accepte</th>
                        <td>{{ item.is_acceptedintest }}</td>
                      </tr>
                      <tr>
                        <th>Frais Test</th>
                        <td>{{ item.fraistest }}</td>
                      </tr>
                      <tr>
                        <th>Frais Payed</th>
                        <td>{{ item.fraispayed }}</td>
                      </tr>
                      <tr>
                        <th>Transport</th>
                        <td>{{ item.transport }}</td>
                      </tr>
                      <tr>
                        <th>Date Test</th>
                        <td>{{ item.datetest }}</td>
                      </tr>
                      <tr>
                        <th>Date Limite Inscription</th>
                        <td>{{ item.datelimiteinscription }}</td>
                      </tr>
                      <tr>
                        <th>Observations</th>
                        <td>{{ item.observations }}</td>
                      </tr>
                      <tr>
                        <th>Annees colaire</th>
                        <td>
                          <span
                            class="label label-info"
                            v-if="item.anneescolaire !== null"
                          >{{ item.anneescolaire.label }}</span>
                        </td>
                      </tr>
                      <tr>
                        <th>Eleve</th>
                        <td>
                          <span
                            class="label label-info"
                            v-if="item.eleve !== null"
                          >{{ item.eleve.nom_fr +' '+ item.eleve.prenom_fr }}</span>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
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
  created() {
    this.fetchData(this.$route.params.id);
  },
  destroyed() {
    this.resetState();
  },
  computed: {
    ...mapGetters("PreinscriptionsSingle", ["item"])
  },
  watch: {
    "$route.params.id": function() {
      this.resetState();
      this.fetchData(this.$route.params.id);
    }
  },
  methods: {
    ...mapActions("PreinscriptionsSingle", ["fetchData", "resetState"])
  }
};
</script>


<style scoped>
</style>
