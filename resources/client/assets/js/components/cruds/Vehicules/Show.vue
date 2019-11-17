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
                                            <th>Code</th>
                                            <td>{{ item.code }}</td>
                                            </tr>
                                        <tr>
                                            <th>Marque</th>
                                            <td>{{ item.marque }}</td>
                                            </tr>
                                        <tr>
                                            <th>Matricule</th>
                                            <td>{{ item.matricule }}</td>
                                            </tr>
                                        <tr>
                                            <th>Date Mise Encirculation</th>
                                            <td>{{ item.datemiseencirculation }}</td>
                                            </tr>
                                        <tr>
                                            <th>Date Acquisition</th>
                                            <td>{{ item.dateacquisition }}</td>
                                            </tr>
                                        <tr>
                                            <th>Echeance Assurance</th>
                                            <td>{{ item.echeanceassurance }}</td>
                                            </tr>
                                        <tr>
                                            <th>Nombre de Place</th>
                                            <td>{{ item.nombredeplace }}</td>
                                            </tr>
                                        <tr>
                                            <th>Echeance Visite Technique</th>
                                            <td>{{ item.echeancevisitetechnique }}</td>
                                            </tr>
                                        <tr>
                                            <th>Echeance Autorisation</th>
                                            <td>{{ item.echeanceautorisation }}</td>
                                            </tr>
                                        <tr>
                                            <th>Consommation Minimal</th>
                                            <td>{{ item.consommationmin }}</td>
                                            </tr>
                                        <tr>
                                            <th>Consommation Maximal</th>
                                            <td>{{ item.consommationmax }}</td>
                                            </tr>
                                        <tr>
                                            <th>Vidange</th>
                                            <td>{{ item.vidange }}</td>
                                            </tr>
                                        <tr>
                                            <th>Observations</th>
                                            <td>{{ item.observations }}</td>
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
        ...mapGetters('VehiculesSingle', ['item'])
    },
    watch: {
        "$route.params.id": function() {
            this.resetState()
            this.fetchData(this.$route.params.id)
        }
    },
    methods: {
        ...mapActions('VehiculesSingle', ['fetchData', 'resetState'])
    }
}
</script>


<style scoped>

</style>
