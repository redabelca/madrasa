<template>
    <section class="content-wrapper" style="min-height: 100vh;">
        <section class="content-header">
            <h1>Niveau</h1>
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
                                    <label for="label_ar">Label ar</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="label_ar"
                                            placeholder="Enter Label ar"
                                            :value="item.label_ar"
                                            @input="updateLabel_ar"
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
        ...mapGetters('NiveauxSingle', ['item', 'loading']),
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
        ...mapActions('NiveauxSingle', ['fetchData', 'updateData', 'resetState', 'setLabel_fr', 'setLabel_ar']),
        updateLabel_fr(e) {
            this.setLabel_fr(e.target.value)
        },
        updateLabel_ar(e) {
            this.setLabel_ar(e.target.value)
        },
        submitForm() {
            this.updateData()
                .then(() => {
                    this.$router.push({ name: 'niveaux.index' })
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
