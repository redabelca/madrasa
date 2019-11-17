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
                                            <th>Date Entree</th>
                                            <td>{{ item.dateentree }}</td>
                                            </tr>
                                        <tr>
                                            <th>Interne</th>
                                            <td>{{ item.interne }}</td>
                                            </tr>
                                        <tr>
                                            <th>Classe</th>
                                            <td>
                                                <span class="label label-info" v-if="item.classe !== null">
                                                    {{ item.classe.label_fr }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Circuit</th>
                                            <td>
                                                <span class="label label-info" v-if="item.circuit !== null">
                                                    {{ item.circuit.label }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Niveau</th>
                                            <td>
                                                <span class="label label-info" v-if="item.niveau !== null">
                                                    {{ item.niveau.label_fr }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Anneescolaire</th>
                                            <td>
                                                <span class="label label-info" v-if="item.anneescolaire !== null">
                                                    {{ item.anneescolaire.label }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Preinscription</th>
                                            <td>
                                                <span class="label label-info" v-if="item.preinscription !== null">
                                                    {{ item.preinscription.datetest }}
                                                </span>
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
import { mapGetters, mapActions } from 'vuex'

export default {
    data() {
        return {
            // Code...
        }
    },
    created() {
        this.fetchData(this.$route.params.id)
    },
    destroyed() {
        this.resetState()
    },
    computed: {
        ...mapGetters('InscriptionsSingle', ['item'])
    },
    watch: {
        "$route.params.id": function() {
            this.resetState()
            this.fetchData(this.$route.params.id)
        }
    },
    methods: {
        ...mapActions('InscriptionsSingle', ['fetchData', 'resetState'])
    }
}
</script>


<style scoped>

</style>
