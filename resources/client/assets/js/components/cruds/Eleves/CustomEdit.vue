<template>
    <section class="content-wrapper" style="min-height: 100vh;">
        <section class="content-header">
            <h1>Eleve</h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <form @submit.prevent="submitForm" novalidate>
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Edit</h3>
                            </div>

                            <div class="box-body">
                                <back-buttton></back-buttton>
                            </div>

                            <bootstrap-alert />

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="matricule">Matricule</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="matricule"
                                            placeholder="Enter Matricule"
                                            :value="item.matricule"
                                            @input="updateMatricule"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="img_path">Photo</label>
                                    <input
                                            type="file"
                                            class="form-control"
                                            @change="updateImg_path"
                                    >
                                    <ul v-if="item.img_path" class="list-unstyled">
                                        <li>
                                            {{ item.img_path.name || item.img_path.file_name }}
                                            <button class="btn btn-xs btn-danger"
                                                    type="button"
                                                    @click="removeImg_path"
                                            >
                                                Remove file
                                            </button>
                                        </li>
                                    </ul>
                                </div>
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
                                    <input
                                            type="number"
                                            class="form-control"
                                            name="sexe"
                                            placeholder="Enter Sexe"
                                            :value="item.sexe"
                                            @input="updateSexe"
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
                                    <label for="cne">Cne</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="cne"
                                            placeholder="Enter Cne"
                                            :value="item.cne"
                                            @input="updateCne"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="idmassar">Massar</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="idmassar"
                                            placeholder="Enter Massar"
                                            :value="item.idmassar"
                                            @input="updateIdmassar"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="tel">Tel</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="tel"
                                            placeholder="Enter Tel"
                                            :value="item.tel"
                                            @input="updateTel"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="adresse">Adresse</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="adresse"
                                            placeholder="Enter Adresse"
                                            :value="item.adresse"
                                            @input="updateAdresse"
                                            >
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
                                    <label for="datepremiereentree">Date Premiere Entree</label>
                                    <date-picker
                                            :value="item.datepremiereentree"
                                            :config="$root.dpconfigDate"
                                            name="datepremiereentree"
                                            placeholder="Enter Date Premiere Entree"
                                            @dp-change="updateDatepremiereentree"
                                            >
                                    </date-picker>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email *</label>
                                    <input
                                            type="email"
                                            class="form-control"
                                            name="email"
                                            placeholder="Enter Email *"
                                            :value="item.email"
                                            @input="updateEmail"
                                            >
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
                                <div class="form-group">
                                    <label for="groupesangin">Groupesangin</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="groupesangin"
                                            placeholder="Enter Groupesangin"
                                            :value="item.groupesangin"
                                            @input="updateGroupesangin"
                                            >
                                </div>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input
                                                    type="checkbox"
                                                    name="is_handicaped"
                                                    :value="item.is_handicaped"
                                                    :checked="item.is_handicaped == true"
                                                    @change="updateIs_handicaped"
                                                    >
                                            Handicap
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="pediatrenom">Pediatre Nom</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="pediatrenom"
                                            placeholder="Enter Pediatre Nom"
                                            :value="item.pediatrenom"
                                            @input="updatePediatrenom"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="telpediatre">Tele Pediatre</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="telpediatre"
                                            placeholder="Enter Tele Pediatre"
                                            :value="item.telpediatre"
                                            @input="updateTelpediatre"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="allergies">Allergies</label>
                                    <textarea
                                            rows="3"
                                            class="form-control"
                                            name="allergies"
                                            placeholder="Enter Allergies"
                                            :value="item.allergies"
                                            @input="updateAllergies"
                                            >
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="particularites">Particularites</label>
                                    <textarea
                                            rows="3"
                                            class="form-control"
                                            name="particularites"
                                            placeholder="Enter Particularites"
                                            :value="item.particularites"
                                            @input="updateParticularites"
                                            >
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="traitement">Traitement</label>
                                    <textarea
                                            rows="3"
                                            class="form-control"
                                            name="traitement"
                                            placeholder="Enter Traitement"
                                            :value="item.traitement"
                                            @input="updateTraitement"
                                            >
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="nbreanneedouble">nbr Annee Double</label>
                                    <input
                                            type="number"
                                            class="form-control"
                                            name="nbreanneedouble"
                                            placeholder="Enter nbr Annee Double"
                                            :value="item.nbreanneedouble"
                                            @input="updateNbreanneedouble"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="allergiealimentaire">Allergie Alimentaire</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="allergiealimentaire"
                                            placeholder="Enter Allergie Alimentaire"
                                            :value="item.allergiealimentaire"
                                            @input="updateAllergiealimentaire"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="intolerancealimentaire">Intolerance Alimentaire</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="intolerancealimentaire"
                                            placeholder="Enter Intolerance Alimentaire"
                                            :value="item.intolerancealimentaire"
                                            @input="updateIntolerancealimentaire"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="comportementalimentaire">Comportement Alimentaire</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="comportementalimentaire"
                                            placeholder="Enter Comportement Alimentaire"
                                            :value="item.comportementalimentaire"
                                            @input="updateComportementalimentaire"
                                            >
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
                                <div class="form-group">
                                    <label for="tuteur">Tuteur</label>
                                    <v-select
                                            name="tuteur"
                                            label="prenom_fr"
                                            @input="updateTuteur"
                                            :value="item.tuteur"
                                            :options="tuteursAll"
                                            />
                                </div>
                                <div class="form-group">
                                    <label for="quartier">Quartier</label>
                                    <v-select
                                            name="quartier"
                                            label="label"
                                            @input="updateQuartier"
                                            :value="item.quartier"
                                            :options="quartiersAll"
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
        ...mapGetters('ElevesSingle', ['item', 'loading', 'famillesAll', 'tuteursAll', 'quartiersAll']),
    },
    created() {
        this.fetchData(this.$route.params.id)
    },
    destroyed() {
        this.resetState()
    },
    watch: {
        "$route.params.id": function() {
            this.resetState()
            this.fetchData(this.$route.params.id)
        }
    },
    methods: {
        ...mapActions('ElevesSingle', ['fetchData', 'updateData', 'resetState', 'setMatricule', 'setImg_path', 'setPrenom_fr', 'setPrenom_ar', 'setNom_fr', 'setNom_ar', 'setSexe', 'setCin', 'setCne', 'setIdmassar', 'setTel', 'setAdresse', 'setDatenaissance', 'setDatepremiereentree', 'setEmail', 'setNationalite', 'setGroupesangin', 'setIs_handicaped', 'setPediatrenom', 'setTelpediatre', 'setAllergies', 'setParticularites', 'setTraitement', 'setNbreanneedouble', 'setAllergiealimentaire', 'setIntolerancealimentaire', 'setComportementalimentaire', 'setFamille', 'setTuteur', 'setQuartier']),
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
            this.updateData()
                .then(() => {
                    this.$router.push({ name: 'eleves.index' })
                    this.$eventHub.$emit('update-success')
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
