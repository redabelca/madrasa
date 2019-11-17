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
                                            <th>Matricule</th>
                                            <td>{{ item.matricule }}</td>
                                            </tr>
                                        <tr>
                                            <th>Photo</th>
                                            <td v-html="item.img_path_link"></td>
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
                                            <th>Sexe</th>
                                            <td v-if="item.sexe==0">{{ 'Feminin' }}</td>
                                            <td v-if="item.sexe==1">{{ 'Masculin' }}</td>
                                            </tr>
                                        <tr>
                                            <th>Cin</th>
                                            <td>{{ item.cin }}</td>
                                            </tr>
                                        <tr>
                                            <th>Cne</th>
                                            <td>{{ item.cne }}</td>
                                            </tr>
                                        <tr>
                                            <th>Massar</th>
                                            <td>{{ item.idmassar }}</td>
                                            </tr>
                                        <tr>
                                            <th>Tel</th>
                                            <td>{{ item.tel }}</td>
                                            </tr>
                                        <tr>
                                            <th>Adresse</th>
                                            <td>{{ item.adresse }}</td>
                                            </tr>
                                        <tr>
                                            <th>Date Naissance</th>
                                            <td>{{ item.datenaissance }}</td>
                                            </tr>
                                        <tr>
                                            <th>Date Premiere Entree</th>
                                            <td>{{ item.datepremiereentree }}</td>
                                            </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>{{ item.email }}</td>
                                            </tr>
                                        <tr>
                                            <th>Nationalite</th>
                                            <td>{{ item.nationalite }}</td>
                                            </tr>
                                        <tr>
                                            <th>Groupesangin</th>
                                            <td>{{ item.groupesangin }}</td>
                                            </tr>
                                        <tr>
                                            <th>Handicap</th>
                                            <td>{{ item.is_handicaped }}</td>
                                            </tr>
                                        <tr>
                                            <th>Pediatre Nom</th>
                                            <td>{{ item.pediatrenom }}</td>
                                            </tr>
                                        <tr>
                                            <th>Tele Pediatre</th>
                                            <td>{{ item.telpediatre }}</td>
                                            </tr>
                                        <tr>
                                            <th>Allergies</th>
                                            <td>{{ item.allergies }}</td>
                                            </tr>
                                        <tr>
                                            <th>Particularites</th>
                                            <td>{{ item.particularites }}</td>
                                            </tr>
                                        <tr>
                                            <th>Traitement</th>
                                            <td>{{ item.traitement }}</td>
                                            </tr>
                                        <tr>
                                            <th>nbr Annee Double</th>
                                            <td>{{ item.nbreanneedouble }}</td>
                                            </tr>
                                        <tr>
                                            <th>Allergie Alimentaire</th>
                                            <td>{{ item.allergiealimentaire }}</td>
                                            </tr>
                                        <tr>
                                            <th>Intolerance Alimentaire</th>
                                            <td>{{ item.intolerancealimentaire }}</td>
                                            </tr>
                                        <tr>
                                            <th>Comportement Alimentaire</th>
                                            <td>{{ item.comportementalimentaire }}</td>
                                            </tr>
                                        <tr>
                                            <th>Famille</th>
                                            <td>
                                                <span class="label label-info" v-if="item.famille !== null">
                                                    {{ item.famille.nom }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Tuteur</th>
                                            <td>
                                                <span class="label label-info" v-if="item.tuteur !== null">
                                                    {{ item.tuteur.prenom_fr }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Quartier</th>
                                            <td>
                                                <span class="label label-info" v-if="item.quartier !== null">
                                                    {{ item.quartier.label }}
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
        ...mapGetters('ElevesSingle', ['item'])
    },
    watch: {
        "$route.params.id": function() {
            this.resetState()
            this.fetchData(this.$route.params.id)
        }
    },
    methods: {
        ...mapActions('ElevesSingle', ['fetchData', 'resetState'])
    }
}
</script>


<style scoped>

</style>
