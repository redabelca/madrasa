<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Vehicule</h1>
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
                                    <label for="code">Code</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="code"
                                            placeholder="Enter Code"
                                            :value="item.code"
                                            @input="updateCode"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="marque">Marque</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="marque"
                                            placeholder="Enter Marque"
                                            :value="item.marque"
                                            @input="updateMarque"
                                            >
                                </div>
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
                                    <label for="datemiseencirculation">Date Mise Encirculation</label>
                                    <date-picker
                                            :value="item.datemiseencirculation"
                                            :config="$root.dpconfigDatetime"
                                            name="datemiseencirculation"
                                            placeholder="Enter Date Mise Encirculation"
                                            @dp-change="updateDatemiseencirculation"
                                            >
                                    </date-picker>
                                </div>
                                <div class="form-group">
                                    <label for="dateacquisition">Date Acquisition</label>
                                    <date-picker
                                            :value="item.dateacquisition"
                                            :config="$root.dpconfigDatetime"
                                            name="dateacquisition"
                                            placeholder="Enter Date Acquisition"
                                            @dp-change="updateDateacquisition"
                                            >
                                    </date-picker>
                                </div>
                                <div class="form-group">
                                    <label for="echeanceassurance">Echeance Assurance</label>
                                    <date-picker
                                            :value="item.echeanceassurance"
                                            :config="$root.dpconfigDatetime"
                                            name="echeanceassurance"
                                            placeholder="Enter Echeance Assurance"
                                            @dp-change="updateEcheanceassurance"
                                            >
                                    </date-picker>
                                </div>
                                <div class="form-group">
                                    <label for="nombredeplace">Nombre de Place *</label>
                                    <input
                                            type="number"
                                            class="form-control"
                                            name="nombredeplace"
                                            placeholder="Enter Nombre de Place *"
                                            :value="item.nombredeplace"
                                            @input="updateNombredeplace"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="echeancevisitetechnique">Echeance Visite Technique</label>
                                    <date-picker
                                            :value="item.echeancevisitetechnique"
                                            :config="$root.dpconfigDatetime"
                                            name="echeancevisitetechnique"
                                            placeholder="Enter Echeance Visite Technique"
                                            @dp-change="updateEcheancevisitetechnique"
                                            >
                                    </date-picker>
                                </div>
                                <div class="form-group">
                                    <label for="echeanceautorisation">Echeance Autorisation</label>
                                    <date-picker
                                            :value="item.echeanceautorisation"
                                            :config="$root.dpconfigDatetime"
                                            name="echeanceautorisation"
                                            placeholder="Enter Echeance Autorisation"
                                            @dp-change="updateEcheanceautorisation"
                                            >
                                    </date-picker>
                                </div>
                                <div class="form-group">
                                    <label for="consommationmin">Consommation Minimal</label>
                                    <input
                                            type="number"
                                            class="form-control"
                                            name="consommationmin"
                                            placeholder="Enter Consommation Minimal"
                                            :value="item.consommationmin"
                                            @input="updateConsommationmin"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="consommationmax">Consommation Maximal</label>
                                    <input
                                            type="number"
                                            class="form-control"
                                            name="consommationmax"
                                            placeholder="Enter Consommation Maximal"
                                            :value="item.consommationmax"
                                            @input="updateConsommationmax"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="vidange">Vidange</label>
                                    <input
                                            type="number"
                                            class="form-control"
                                            name="vidange"
                                            placeholder="Enter Vidange"
                                            :value="item.vidange"
                                            @input="updateVidange"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="observations">Observations</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="observations"
                                            placeholder="Enter Observations"
                                            :value="item.observations"
                                            @input="updateObservations"
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
        ...mapGetters('VehiculesSingle', ['item', 'loading'])
    },
    created() {
        // Code ...
    },
    destroyed() {
        this.resetState()
    },
    methods: {
        ...mapActions('VehiculesSingle', ['storeData', 'resetState', 'setCode', 'setMarque', 'setMatricule', 'setDatemiseencirculation', 'setDateacquisition', 'setEcheanceassurance', 'setNombredeplace', 'setEcheancevisitetechnique', 'setEcheanceautorisation', 'setConsommationmin', 'setConsommationmax', 'setVidange', 'setObservations']),
        updateCode(e) {
            this.setCode(e.target.value)
        },
        updateMarque(e) {
            this.setMarque(e.target.value)
        },
        updateMatricule(e) {
            this.setMatricule(e.target.value)
        },
        updateDatemiseencirculation(e) {
            this.setDatemiseencirculation(e.target.value)
        },
        updateDateacquisition(e) {
            this.setDateacquisition(e.target.value)
        },
        updateEcheanceassurance(e) {
            this.setEcheanceassurance(e.target.value)
        },
        updateNombredeplace(e) {
            this.setNombredeplace(e.target.value)
        },
        updateEcheancevisitetechnique(e) {
            this.setEcheancevisitetechnique(e.target.value)
        },
        updateEcheanceautorisation(e) {
            this.setEcheanceautorisation(e.target.value)
        },
        updateConsommationmin(e) {
            this.setConsommationmin(e.target.value)
        },
        updateConsommationmax(e) {
            this.setConsommationmax(e.target.value)
        },
        updateVidange(e) {
            this.setVidange(e.target.value)
        },
        updateObservations(e) {
            this.setObservations(e.target.value)
        },
        submitForm() {
            this.storeData()
                .then(() => {
                    this.$router.push({ name: 'vehicules.index' })
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
