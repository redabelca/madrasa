<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Classe</h1>
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
                                    <label for="label_fr">Label fr *</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="label_fr"
                                            placeholder="Enter Label fr *"
                                            :value="item.label_fr"
                                            @input="updateLabel_fr"
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
                                    <label for="capacite">Capacite *</label>
                                    <input
                                            type="number"
                                            class="form-control"
                                            name="capacite"
                                            placeholder="Enter Capacite *"
                                            :value="item.capacite"
                                            @input="updateCapacite"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="niveau">Niveau</label>
                                    <v-select
                                            name="niveau"
                                            label="label_fr"
                                            @input="updateNiveau"
                                            :value="item.niveau"
                                            :options="niveauxAll"
                                            />
                                </div>
                                <div class="form-group">
                                    <label for="branche">Branche</label>
                                    <v-select
                                            name="branche"
                                            label="label_fr"
                                            @input="updateBranche"
                                            :value="item.branche"
                                            :options="branchesAll"
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
        ...mapGetters('ClassesSingle', ['item', 'loading', 'niveauxAll', 'branchesAll'])
    },
    created() {
        this.fetchNiveauxAll(),
        this.fetchBranchesAll()
    },
    destroyed() {
        this.resetState()
    },
    methods: {
        ...mapActions('ClassesSingle', ['storeData', 'resetState', 'setCode', 'setLabel_fr', 'setIdmassar', 'setCapacite', 'setNiveau', 'setBranche', 'fetchNiveauxAll', 'fetchBranchesAll']),
        updateCode(e) {
            this.setCode(e.target.value)
        },
        updateLabel_fr(e) {
            this.setLabel_fr(e.target.value)
        },
        updateIdmassar(e) {
            this.setIdmassar(e.target.value)
        },
        updateCapacite(e) {
            this.setCapacite(e.target.value)
        },
        updateNiveau(value) {
            this.setNiveau(value)
        },
        updateBranche(value) {
            this.setBranche(value)
        },
        submitForm() {
            this.storeData()
                .then(() => {
                    this.$router.push({ name: 'classes.index' })
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
