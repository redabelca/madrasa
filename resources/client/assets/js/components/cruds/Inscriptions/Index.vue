<template>
  <section class="content-wrapper" style="min-height: 100vh;">
    <section class="content-header">
      <h1>Inscription</h1>
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
                <!-- <router-link
                  v-if="$can(xprops.permission_prefix + 'create')"
                  :to="{ name: xprops.route + '.create' }"
                  class="btn btn-success btn-sm"
                >
                  <i class="fa fa-plus"></i> Add new
                </router-link> -->

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
        {
          title: "#",
          field: "id",
          sortable: true,
          colStyle: "width: 50px;",
          shouldShow: true
        },
        {
          title: "Prenom",
          field: "prenom_fr",
          sortable: true,
          shouldShow: true
        },
        { title: "Nom", field: "nom_fr", sortable: true, shouldShow: true },
        {
          title: "Date Entree",
          field: "dateentree",
          sortable: true,
          shouldShow: true
        },
        {
          title: "Interne",
          field: "interne",
          tdComp: DatatableCheckbox,
          colStyle: "width: 50px;"
        },
        {
          title: "Classe",
          field: "classe",
          tdComp: DatatableSingle,
          shouldShow: true
        },
        { title: "Circuit", field: "circuit", tdComp: DatatableSingle },
        { title: "Niveau", field: "niveau", tdComp: DatatableSingle },
        {
          title: "Anneescolaire",
          field: "anneescolaire",
          tdComp: DatatableSingle,
          shouldShow: true
        },
        {
          title: "Preinscription",
          field: "preinscription",
          tdComp: DatatableSingle
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
        module: "InscriptionsIndex",
        route: "inscriptions",
        permission_prefix: "inscription_"
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
    ...mapGetters("InscriptionsIndex", [
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
        item.nom_fr = item.preinscription.eleve.nom_fr;
        item.prenom_fr = item.preinscription.eleve.prenom_fr;
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
    ...mapActions("InscriptionsIndex", ["fetchData", "setQuery", "resetState"])
  }
};
</script>


<style scoped>
</style>
