<template>
    <section class="content-wrapper" style="min-height: 100vh;">
        <section class="content-header">
            <h1>Eleve</h1>
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
                                <router-link
                                        v-if="$can(xprops.permission_prefix + 'create')"
                                        :to="{ name: xprops.route + '.create' }"
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
                                    :columns="columns"
                                    :data="data"
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
import { mapGetters, mapActions } from 'vuex'
import DatatableActions from '../../dtmodules/DatatableActions'
import DatatableSingle from '../../dtmodules/DatatableSingle'
import DatatableList from '../../dtmodules/DatatableList'
import DatatableCheckbox from '../../dtmodules/DatatableCheckbox'
import DatatableImgPathField from './dtmodules/DatatableImgPathField'

export default {
    data() {
        return {
            columns: [
                { title: '#', field: 'id', sortable: true, colStyle: 'width: 50px;' },
                { title: 'Matricule', field: 'matricule', sortable: true },
                { title: 'Photo', tdComp: DatatableImgPathField, sortable: false },
                { title: 'Prenom fr', field: 'prenom_fr', sortable: true },
                { title: 'Prenom ar', field: 'prenom_ar', sortable: true },
                { title: 'Nom fr', field: 'nom_fr', sortable: true },
                { title: 'Nom ar', field: 'nom_ar', sortable: true },
                { title: 'Sexe', field: 'sexe', sortable: true },
                { title: 'Cin', field: 'cin', sortable: true },
                { title: 'Cne', field: 'cne', sortable: true },
                { title: 'Massar', field: 'idmassar', sortable: true },
                { title: 'Tel', field: 'tel', sortable: true },
                { title: 'Adresse', field: 'adresse', sortable: true },
                { title: 'Date Naissance', field: 'datenaissance', sortable: true },
                { title: 'Date Premiere Entree', field: 'datepremiereentree', sortable: true },
                { title: 'Email', field: 'email', sortable: true },
                { title: 'Nationalite', field: 'nationalite', sortable: true },
                { title: 'Groupesangin', field: 'groupesangin', sortable: true },
                { title: 'Handicap', field: 'is_handicaped', tdComp: DatatableCheckbox, colStyle: 'width: 50px;' },
                { title: 'Pediatre Nom', field: 'pediatrenom', sortable: true },
                { title: 'Tele Pediatre', field: 'telpediatre', sortable: true },
                { title: 'Allergies', field: 'allergies', sortable: true },
                { title: 'Particularites', field: 'particularites', sortable: true },
                { title: 'Traitement', field: 'traitement', sortable: true },
                { title: 'nbr Annee Double', field: 'nbreanneedouble', sortable: true },
                { title: 'Allergie Alimentaire', field: 'allergiealimentaire', sortable: true },
                { title: 'Intolerance Alimentaire', field: 'intolerancealimentaire', sortable: true },
                { title: 'Comportement Alimentaire', field: 'comportementalimentaire', sortable: true },
                { title: 'Famille', field: 'famille', tdComp: DatatableSingle },
                { title: 'Tuteur', field: 'tuteur', tdComp: DatatableSingle },
                { title: 'Quartier', field: 'quartier', tdComp: DatatableSingle },
                { title: 'Actions', tdComp: DatatableActions, visible: true, thClass: 'text-right', tdClass: 'text-right', colStyle: 'width: 130px;' }
            ],
            query: { sort: 'id', order: 'desc' },
            xprops: {
                module: 'ElevesIndex',
                route: 'eleves',
                permission_prefix: 'eleve_'
            }
        }
    },
    created() {
        this.$root.relationships = this.relationships
        this.fetchData()
    },
    destroyed() {
        this.resetState()
    },
    computed: {
        ...mapGetters('ElevesIndex', ['data', 'total', 'loading', 'relationships']),
    },
    watch: {
        query: {
            handler(query) {
                this.setQuery(query)
            },
            deep: true
        }
    },
    methods: {
        ...mapActions('ElevesIndex', ['fetchData', 'setQuery', 'resetState']),
    }
}
</script>


<style scoped>

</style>
