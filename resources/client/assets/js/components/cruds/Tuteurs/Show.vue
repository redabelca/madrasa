<template>
    <section class="content-wrapper" style="min-height: 100vh;">
        <section class="content-header">
            <h1>Tuteur</h1>
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
                                            <th>Prenom fr</th>
                                            <td>{{ item.prenom_fr }}</td>
                                            </tr>
                                        <tr>
                                            <th>Prenom ar</th>
                                            <td>{{ item.prenom_ar }}</td>
                                            </tr>
                                        <tr>
                                            <th>Nom fr</th>
                                            <td>{{ item.nom_fr }}</td>
                                            </tr>
                                        <tr>
                                            <th>Nom ar</th>
                                            <td>{{ item.nom_ar }}</td>
                                            </tr>
                                        <tr>
                                            <th>Adresse</th>
                                            <td>{{ item.adresse }}</td>
                                            </tr>
                                        <tr>
                                            <th>Cin</th>
                                            <td>{{ item.cin }}</td>
                                            </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>{{ item.email }}</td>
                                            </tr>
                                        <tr>
                                            <th>Tel</th>
                                            <td>{{ item.tel }}</td>
                                            </tr>
                                        <tr>
                                            <th>Ville</th>
                                            <td>{{ item.ville }}</td>
                                            </tr>
                                        <tr>
                                            <th>Profession</th>
                                            <td>{{ item.profession }}</td>
                                            </tr>
                                        <tr>
                                            <th>Lien Parente</th>
                                            <td>
                                                <span class="label label-info" v-if="item.lienparente !== null">
                                                    {{ item.lienparente.label }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Famille</th>
                                            <td>
                                                <span class="label label-info" v-if="item.famille !== null">
                                                    {{ item.famille.nom }}
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
        ...mapGetters('TuteursSingle', ['item'])
    },
    watch: {
        "$route.params.id": function() {
            this.resetState()
            this.fetchData(this.$route.params.id)
        }
    },
    methods: {
        ...mapActions('TuteursSingle', ['fetchData', 'resetState'])
    }
}
</script>


<style scoped>

</style>
