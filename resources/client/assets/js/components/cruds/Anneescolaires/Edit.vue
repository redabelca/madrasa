<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Annee scolaire</h1>
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
                                    <label for="datedebut">Date Debut</label>
                                    <date-picker
                                            :value="item.datedebut"
                                            :config="$root.dpconfigDate"
                                            name="datedebut"
                                            placeholder="Enter Date Debut"
                                            @dp-change="updateDatedebut"
                                            >
                                    </date-picker>
                                </div>
                                <div class="form-group">
                                    <label for="datefin">Date Fin</label>
                                    <date-picker
                                            :value="item.datefin"
                                            :config="$root.dpconfigDatetime"
                                            name="datefin"
                                            placeholder="Enter Date Fin"
                                            @dp-change="updateDatefin"
                                            >
                                    </date-picker>
                                </div>
                                <div class="form-group">
                                    <label for="label">Label *</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="label"
                                            placeholder="Enter Label *"
                                            :value="item.label"
                                            @input="updateLabel"
                                            >
                                </div>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input
                                                    type="checkbox"
                                                    name="anneeactive"
                                                    :value="item.anneeactive"
                                                    :checked="item.anneeactive == true"
                                                    @change="updateAnneeactive"
                                                    >
                                            Annee Active
                                        </label>
                                    </div>
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
        ...mapGetters('AnneescolairesSingle', ['item', 'loading']),
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
        ...mapActions('AnneescolairesSingle', ['fetchData', 'updateData', 'resetState', 'setDatedebut', 'setDatefin', 'setLabel', 'setAnneeactive']),
        updateDatedebut(e) {
            this.setDatedebut(e.target.value)
        },
        updateDatefin(e) {
            this.setDatefin(e.target.value)
        },
        updateLabel(e) {
            this.setLabel(e.target.value)
        },
        updateAnneeactive(e) {
            this.setAnneeactive(e.target.checked)
        },
        submitForm() {
            this.updateData()
                .then(() => {
                    this.$router.push({ name: 'anneescolaires.index' })
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
