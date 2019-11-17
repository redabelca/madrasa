<template>
    <section class="content-wrapper" style="min-height: 100vh;">
        <section class="content-header">
            <h1>Vehicule</h1>
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


export default {
    data() {
        return {
            columns: [
                { title: '#', field: 'id', sortable: true, colStyle: 'width: 50px;' },
                { title: 'Code', field: 'code', sortable: true },
                { title: 'Marque', field: 'marque', sortable: true },
                { title: 'Matricule', field: 'matricule', sortable: true },
                { title: 'Date Mise Encirculation', field: 'datemiseencirculation', sortable: true },
                { title: 'Date Acquisition', field: 'dateacquisition', sortable: true },
                { title: 'Echeance Assurance', field: 'echeanceassurance', sortable: true },
                { title: 'Nombre de Place', field: 'nombredeplace', sortable: true },
                { title: 'Echeance Visite Technique', field: 'echeancevisitetechnique', sortable: true },
                { title: 'Echeance Autorisation', field: 'echeanceautorisation', sortable: true },
                { title: 'Consommation Minimal', field: 'consommationmin', sortable: true },
                { title: 'Consommation Maximal', field: 'consommationmax', sortable: true },
                { title: 'Vidange', field: 'vidange', sortable: true },
                { title: 'Observations', field: 'observations', sortable: true },
                { title: 'Actions', tdComp: DatatableActions, visible: true, thClass: 'text-right', tdClass: 'text-right', colStyle: 'width: 130px;' }
            ],
            query: { sort: 'id', order: 'desc' },
            xprops: {
                module: 'VehiculesIndex',
                route: 'vehicules',
                permission_prefix: 'vehicule_'
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
        ...mapGetters('VehiculesIndex', ['data', 'total', 'loading', 'relationships']),
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
        ...mapActions('VehiculesIndex', ['fetchData', 'setQuery', 'resetState']),
    }
}
</script>


<style scoped>

</style>
