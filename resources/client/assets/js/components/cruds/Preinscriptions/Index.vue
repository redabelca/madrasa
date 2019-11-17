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
              <h3 class="box-title">List</h3>
            </div>

            <div class="box-body">
              <div class="btn-group">
                  <!-- :to="{ name: xprops.route + '.create' }" -->
                <router-link
                  v-if="$can(xprops.permission_prefix + 'create')"
                  :to="{ name: 'custom-eleves.create' }"
                  class="btn btn-success btn-sm"
                >
                  <i class="fa fa-plus"></i> Add new
                </router-link>

                <button type="button" class="btn btn-default btn-sm" @click="fetchData">
                  <i class="fa fa-refresh" :class="{'fa-spin': loading}"></i> Refresh
                </button>
              </div>
            </div>

            <div class="box-body">
              <div class="row" v-if="loading">
                <div class="col-xs-4 col-xs-offset-4">
                  <div class="alert text-center">
                    <i class="fa fa-spin fa-refresh"></i> Loading
                  </div>
                </div>
              </div>

              <datatable
                v-if="!loading"
                :columns="filteredColumns"
                :data="myCustomData"
                :total="total"
                :query="query"
                :xprops="xprops"
              />
            </div>
          </div>
        </div>
      </div>
    </section>
  </section>
</template>


<script>
import { mapGetters, mapActions } from "vuex";
import DatatableActions from "../../dtmodules/DatatableActions";
import DatatableSingle from "../../dtmodules/DatatableSingle";
import DatatableList from "../../dtmodules/DatatableList";
import DatatableCheckbox from "../../dtmodules/DatatableCheckbox";

export default {
  data() {
    return {
      columns: [
        { title: "#", field: "id", sortable: true, colStyle: "width: 50px;" },
        {
          title: "Nom Professeur Test",
          field: "nomprofesseurtest",
          sortable: true
        },

        { title: "Note Test", field: "notetest", sortable: true },
        { title: "Resultat Test", field: "resultattest", sortable: true },
        {
          title: "Test Accepte",
          field: "is_acceptedintest",
          tdComp: DatatableCheckbox,
          colStyle: "width: 50px;",
          shouldShow: true
        },
        { title: "Frais Test", field: "fraistest", sortable: true },
        {
          title: "Frais Payed",
          field: "fraispayed",
          tdComp: DatatableCheckbox,
          colStyle: "width: 50px;"
        },
        {
          title: "Transport",
          field: "transport",
          tdComp: DatatableCheckbox,
          colStyle: "width: 50px;"
        },
        { title: "Date Test", field: "datetest", sortable: true },
        {
          title: "Date Limite Inscription",
          field: "datelimiteinscription",
          sortable: true,
          shouldShow: true
        },
        { title: "Observations", field: "observations", sortable: true },
        {
          title: "Annees colaire",
          field: "anneescolaire",
          tdComp: DatatableSingle
        },
        {
          title: "Eleve",
          field: "eleve",
          tdComp: DatatableSingle,
        },
        {
          title: "Prenom",
          field: "prenom_fr",
          shouldShow: true
        },
        {
          title: "Nom",
          field: "nom_fr",
          shouldShow: true
        },
        {
          title: "Actions",
          tdComp: DatatableActions,
          visible: true,
          thClass: "text-right",
          tdClass: "text-right",
          colStyle: "width: 130px;",
          shouldShow: true
        }
      ],
      query: { sort: "id", order: "desc" },
      xprops: {
        module: "PreinscriptionsIndex",
        route: "preinscriptions",
        permission_prefix: "preinscription_"
      }
    };
  },
  created() {
    this.$root.relationships = this.relationships;
    this.fetchData();
  },
  destroyed() {
    this.resetState();
  },
  computed: {
    ...mapGetters("PreinscriptionsIndex", [
      "data",
      "total",
      "loading",
      "relationships"
    ]),
    filteredColumns() {
      return this.columns.filter(column => column.shouldShow);
    },
    myCustomData() {
      return this.data.map(item => {
        item.nom_fr = item.eleve.nom_fr;
        item.prenom_fr = item.eleve.prenom_fr;
        return item;
      });
    }
  },
  watch: {
    query: {
      handler(query) {
        this.setQuery(query);
      },
      deep: true
    }
  },
  methods: {
    ...mapActions("PreinscriptionsIndex", [
      "fetchData",
      "setQuery",
      "resetState"
    ])
  }
};
</script>


<style scoped>
</style>
