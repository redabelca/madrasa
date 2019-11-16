<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Tuteur</h1>
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
                                    <label for="adresse">Adresse *</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="adresse"
                                            placeholder="Enter Adresse *"
                                            :value="item.adresse"
                                            @input="updateAdresse"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="cin">Cin</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="cin"
                                            placeholder="Enter Cin"
                                            :value="item.cin"
                                            @input="updateCin"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="email"
                                            placeholder="Enter Email"
                                            :value="item.email"
                                            @input="updateEmail"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="tel">Tel *</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="tel"
                                            placeholder="Enter Tel *"
                                            :value="item.tel"
                                            @input="updateTel"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="ville">Ville</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="ville"
                                            placeholder="Enter Ville"
                                            :value="item.ville"
                                            @input="updateVille"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="profession">Profession</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="profession"
                                            placeholder="Enter Profession"
                                            :value="item.profession"
                                            @input="updateProfession"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="lienparente">Lien Parente</label>
                                    <v-select
                                            name="lienparente"
                                            label="label"
                                            @input="updateLienparente"
                                            :value="item.lienparente"
                                            :options="lienparentesAll"
                                            />
                                </div>
                                <div class="form-group">
                                    <label for="famille">Famille</label>
                                    <v-select
                                            name="famille"
                                            label="nom"
                                            @input="updateFamille"
                                            :value="item.famille"
                                            :options="famillesAll"
                                            />
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
        ...mapGetters('TuteursSingle', ['item', 'loading', 'lienparentesAll', 'famillesAll'])
    },
    created() {
        this.fetchLienparentesAll(),
        this.fetchFamillesAll()
    },
    destroyed() {
        this.resetState()
    },
    methods: {
        ...mapActions('TuteursSingle', ['storeData', 'resetState', 'setPrenom_fr', 'setPrenom_ar', 'setNom_fr', 'setNom_ar', 'setAdresse', 'setCin', 'setEmail', 'setTel', 'setVille', 'setProfession', 'setLienparente', 'setFamille', 'fetchLienparentesAll', 'fetchFamillesAll']),
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
        updateAdresse(e) {
            this.setAdresse(e.target.value)
        },
        updateCin(e) {
            this.setCin(e.target.value)
        },
        updateEmail(e) {
            this.setEmail(e.target.value)
        },
        updateTel(e) {
            this.setTel(e.target.value)
        },
        updateVille(e) {
            this.setVille(e.target.value)
        },
        updateProfession(e) {
            this.setProfession(e.target.value)
        },
        updateLienparente(value) {
            this.setLienparente(value)
        },
        updateFamille(value) {
            this.setFamille(value)
        },
        submitForm() {
            this.storeData()
                .then(() => {
                    this.$router.push({ name: 'tuteurs.index' })
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
