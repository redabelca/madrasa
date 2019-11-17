<template>
    <section class="content-wrapper" style="min-height: 100vh;">
        <section class="content-header">
            <h1>Etape 1 : Eleve</h1>
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
                                    <label for="prenom_fr">Prenom fr *</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="prenom_fr"
                                            placeholder="Enter Prenom fr *"
                                            :value="item.prenom_fr"
                                            @input="updatePrenom_fr"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="prenom_ar">Prenom ar</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="prenom_ar"
                                            placeholder="Enter Prenom ar"
                                            :value="item.prenom_ar"
                                            @input="updatePrenom_ar"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="nom_fr">Nom fr *</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="nom_fr"
                                            placeholder="Enter Nom fr *"
                                            :value="item.nom_fr"
                                            @input="updateNom_fr"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="nom_ar">Nom ar</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="nom_ar"
                                            placeholder="Enter Nom ar"
                                            :value="item.nom_ar"
                                            @input="updateNom_ar"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="sexe">Sexe</label>
                                    <br>
                                    <span>
                                        <input type="radio" name="sexe" 
                                              :value="1"
                                            @input="updateSexe">
                                        Masculin
                                    </span>
                                    <span>
                                        <input type="radio" name="sexe"
                                            :value="2"
                                            @input="updateSexe">
                                        Feminin
                                    </span> 
                                </div>
                                <div class="form-group">
                                    <label for="datenaissance">Date Naissance *</label>
                                    <date-picker
                                            :value="item.datenaissance"
                                            :config="$root.dpconfigDate"
                                            name="datenaissance"
                                            placeholder="Enter Date Naissance *"
                                            @dp-change="updateDatenaissance"
                                            >
                                    </date-picker>
                                </div>
                                <div class="form-group">
                                    <label for="nationalite">Nationalite</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="nationalite"
                                            placeholder="Enter Nationalite"
                                            :value="item.nationalite"
                                            @input="updateNationalite"
                                            >
                                </div>
                            </div>

                            <div class="box-footer">
                                <vue-button-spinner
                                        class="btn btn-primary btn-sm"
                                        :isLoading="loading"
                                        :disabled="loading"
                                        >
                                    Save
                                </vue-button-spinner>
                            </div>
                        </div>
                    </form>
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
    computed: {
        ...mapGetters('ElevesSingle', ['item', 'loading', 'famillesAll', 'tuteursAll', 'quartiersAll'])
    },
    created() {
        this.fetchFamillesAll(),
        this.fetchTuteursAll(),
        this.fetchQuartiersAll()
    },
    destroyed() {
        this.resetState()
    },
    methods: {
        ...mapActions('ElevesSingle', ['storeData', 'resetState', 'setMatricule', 'setImg_path', 'setPrenom_fr', 'setPrenom_ar', 'setNom_fr', 'setNom_ar', 'setSexe', 'setCin', 'setCne', 'setIdmassar', 'setTel', 'setAdresse', 'setDatenaissance', 'setDatepremiereentree', 'setEmail', 'setNationalite', 'setGroupesangin', 'setIs_handicaped', 'setPediatrenom', 'setTelpediatre', 'setAllergies', 'setParticularites', 'setTraitement', 'setNbreanneedouble', 'setAllergiealimentaire', 'setIntolerancealimentaire', 'setComportementalimentaire', 'setFamille', 'setTuteur', 'setQuartier', 'fetchFamillesAll', 'fetchTuteursAll', 'fetchQuartiersAll']),
        updateMatricule(e) {
            this.setMatricule(e.target.value)
        },
        removeImg_path(e, id) {
            this.$swal({
                title: 'Are you sure?',
                text: "To fully delete the file submit the form.",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                confirmButtonColor: '#dd4b39',
                focusCancel: true,
                reverseButtons: true
            }).then(result => {
                if (typeof result.dismiss === "undefined") {
                    this.setImg_path('');
                }
            })
        },
        updateImg_path(e) {
            this.setImg_path(e.target.files[0]);
            this.$forceUpdate();
        },
        updatePrenom_fr(e) {
            this.setPrenom_fr(e.target.value)
        },
        updatePrenom_ar(e) {
            this.setPrenom_ar(e.target.value)
        },
        updateNom_fr(e) {
            this.setNom_fr(e.target.value)
        },
        updateNom_ar(e) {
            this.setNom_ar(e.target.value)
        },
        updateSexe(e) {
            this.setSexe(e.target.value)
        },
        updateCin(e) {
            this.setCin(e.target.value)
        },
        updateCne(e) {
            this.setCne(e.target.value)
        },
        updateIdmassar(e) {
            this.setIdmassar(e.target.value)
        },
        updateTel(e) {
            this.setTel(e.target.value)
        },
        updateAdresse(e) {
            this.setAdresse(e.target.value)
        },
        updateDatenaissance(e) {
            this.setDatenaissance(e.target.value)
        },
        updateDatepremiereentree(e) {
            this.setDatepremiereentree(e.target.value)
        },
        updateEmail(e) {
            this.setEmail(e.target.value)
        },
        updateNationalite(e) {
            this.setNationalite(e.target.value)
        },
        updateGroupesangin(e) {
            this.setGroupesangin(e.target.value)
        },
        updateIs_handicaped(e) {
            this.setIs_handicaped(e.target.checked)
        },
        updatePediatrenom(e) {
            this.setPediatrenom(e.target.value)
        },
        updateTelpediatre(e) {
            this.setTelpediatre(e.target.value)
        },
        updateAllergies(e) {
            this.setAllergies(e.target.value)
        },
        updateParticularites(e) {
            this.setParticularites(e.target.value)
        },
        updateTraitement(e) {
            this.setTraitement(e.target.value)
        },
        updateNbreanneedouble(e) {
            this.setNbreanneedouble(e.target.value)
        },
        updateAllergiealimentaire(e) {
            this.setAllergiealimentaire(e.target.value)
        },
        updateIntolerancealimentaire(e) {
            this.setIntolerancealimentaire(e.target.value)
        },
        updateComportementalimentaire(e) {
            this.setComportementalimentaire(e.target.value)
        },
        updateFamille(value) {
            this.setFamille(value)
        },
        updateTuteur(value) {
            this.setTuteur(value)
        },
        updateQuartier(value) {
            this.setQuartier(value)
        },
        submitForm() {
            this.storeData()
                .then((eleveID) => {
                    // this.$router.push({ name: 'eleves.index' })
                    this.$router.push({ name: 'custom-preinscriptions.create', params: { eleveID } })
                    this.$eventHub.$emit('create-success')
                })
                .catch((error) => {
                    console.error(error)
                })
        }
    }
}
</script>


<style scoped>

</style>
