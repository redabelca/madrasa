<template>
    <section class="content-wrapper" style="min-height: 100vh;">
        <section class="content-header">
            <h1>Circuit</h1>
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
                                    <label for="vehicule">Vehicule</label>
                                    <v-select
                                            name="vehicule"
                                            label="matricule"
                                            @input="updateVehicule"
                                            :value="item.vehicule"
                                            :options="vehiculesAll"
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
        ...mapGetters('CircuitsSingle', ['item', 'loading', 'vehiculesAll'])
    },
    created() {
        this.fetchVehiculesAll()
    },
    destroyed() {
        this.resetState()
    },
    methods: {
        ...mapActions('CircuitsSingle', ['storeData', 'resetState', 'setLabel', 'setVehicule', 'fetchVehiculesAll']),
        updateLabel(e) {
            this.setLabel(e.target.value)
        },
        updateVehicule(value) {
            this.setVehicule(value)
        },
        submitForm() {
            this.storeData()
                .then(() => {
                    this.$router.push({ name: 'circuits.index' })
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
