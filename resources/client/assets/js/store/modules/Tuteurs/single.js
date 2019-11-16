function initialState() {
    return {
        item: {
            id: null,
            prenom_fr: null,
            prenom_ar: null,
            nom_fr: null,
            nom_ar: null,
            adresse: null,
            cin: null,
            email: null,
            tel: null,
            ville: null,
            profession: null,
            lienparente: null,
            famille: null,
        },
        lienparentesAll: [],
        famillesAll: [],
        
        loading: false,
    }
}

const getters = {
    item: state => state.item,
    loading: state => state.loading,
    lienparentesAll: state => state.lienparentesAll,
    famillesAll: state => state.famillesAll,
    
}

const actions = {
    storeData({ commit, state, dispatch }) {
        commit('setLoading', true)
        dispatch('Alert/resetState', null, { root: true })

        return new Promise((resolve, reject) => {
            let params = new FormData();

            for (let fieldName in state.item) {
                let fieldValue = state.item[fieldName];
                if (typeof fieldValue !== 'object') {
                    params.set(fieldName, fieldValue);
                } else {
                    if (fieldValue && typeof fieldValue[0] !== 'object') {
                        params.set(fieldName, fieldValue);
                    } else {
                        for (let index in fieldValue) {
                            params.set(fieldName + '[' + index + ']', fieldValue[index]);
                        }
                    }
                }
            }

            if (_.isEmpty(state.item.lienparente)) {
                params.set('lienparente_id', '')
            } else {
                params.set('lienparente_id', state.item.lienparente.id)
            }
            if (_.isEmpty(state.item.famille)) {
                params.set('famille_id', '')
            } else {
                params.set('famille_id', state.item.famille.id)
            }

            axios.post('/api/v1/tuteurs', params)
                .then(response => {
                    commit('resetState')
                    resolve()
                })
                .catch(error => {
                    let message = error.response.data.message || error.message
                    let errors  = error.response.data.errors

                    dispatch(
                        'Alert/setAlert',
                        { message: message, errors: errors, color: 'danger' },
                        { root: true })

                    reject(error)
                })
                .finally(() => {
                    commit('setLoading', false)
                })
        })
    },
    updateData({ commit, state, dispatch }) {
        commit('setLoading', true)
        dispatch('Alert/resetState', null, { root: true })

        return new Promise((resolve, reject) => {
            let params = new FormData();
            params.set('_method', 'PUT')

            for (let fieldName in state.item) {
                let fieldValue = state.item[fieldName];
                if (typeof fieldValue !== 'object') {
                    params.set(fieldName, fieldValue);
                } else {
                    if (fieldValue && typeof fieldValue[0] !== 'object') {
                        params.set(fieldName, fieldValue);
                    } else {
                        for (let index in fieldValue) {
                            params.set(fieldName + '[' + index + ']', fieldValue[index]);
                        }
                    }
                }
            }

            if (_.isEmpty(state.item.lienparente)) {
                params.set('lienparente_id', '')
            } else {
                params.set('lienparente_id', state.item.lienparente.id)
            }
            if (_.isEmpty(state.item.famille)) {
                params.set('famille_id', '')
            } else {
                params.set('famille_id', state.item.famille.id)
            }

            axios.post('/api/v1/tuteurs/' + state.item.id, params)
                .then(response => {
                    commit('setItem', response.data.data)
                    resolve()
                })
                .catch(error => {
                    let message = error.response.data.message || error.message
                    let errors  = error.response.data.errors

                    dispatch(
                        'Alert/setAlert',
                        { message: message, errors: errors, color: 'danger' },
                        { root: true })

                    reject(error)
                })
                .finally(() => {
                    commit('setLoading', false)
                })
        })
    },
    fetchData({ commit, dispatch }, id) {
        axios.get('/api/v1/tuteurs/' + id)
            .then(response => {
                commit('setItem', response.data.data)
            })

        dispatch('fetchLienparentesAll')
    dispatch('fetchFamillesAll')
    },
    fetchLienparentesAll({ commit }) {
        axios.get('/api/v1/lienparentes')
            .then(response => {
                commit('setLienparentesAll', response.data.data)
            })
    },
    fetchFamillesAll({ commit }) {
        axios.get('/api/v1/familles')
            .then(response => {
                commit('setFamillesAll', response.data.data)
            })
    },
    setPrenom_fr({ commit }, value) {
        commit('setPrenom_fr', value)
    },
    setPrenom_ar({ commit }, value) {
        commit('setPrenom_ar', value)
    },
    setNom_fr({ commit }, value) {
        commit('setNom_fr', value)
    },
    setNom_ar({ commit }, value) {
        commit('setNom_ar', value)
    },
    setAdresse({ commit }, value) {
        commit('setAdresse', value)
    },
    setCin({ commit }, value) {
        commit('setCin', value)
    },
    setEmail({ commit }, value) {
        commit('setEmail', value)
    },
    setTel({ commit }, value) {
        commit('setTel', value)
    },
    setVille({ commit }, value) {
        commit('setVille', value)
    },
    setProfession({ commit }, value) {
        commit('setProfession', value)
    },
    setLienparente({ commit }, value) {
        commit('setLienparente', value)
    },
    setFamille({ commit }, value) {
        commit('setFamille', value)
    },
    resetState({ commit }) {
        commit('resetState')
    }
}

const mutations = {
    setItem(state, item) {
        state.item = item
    },
    setPrenom_fr(state, value) {
        state.item.prenom_fr = value
    },
    setPrenom_ar(state, value) {
        state.item.prenom_ar = value
    },
    setNom_fr(state, value) {
        state.item.nom_fr = value
    },
    setNom_ar(state, value) {
        state.item.nom_ar = value
    },
    setAdresse(state, value) {
        state.item.adresse = value
    },
    setCin(state, value) {
        state.item.cin = value
    },
    setEmail(state, value) {
        state.item.email = value
    },
    setTel(state, value) {
        state.item.tel = value
    },
    setVille(state, value) {
        state.item.ville = value
    },
    setProfession(state, value) {
        state.item.profession = value
    },
    setLienparente(state, value) {
        state.item.lienparente = value
    },
    setFamille(state, value) {
        state.item.famille = value
    },
    setLienparentesAll(state, value) {
        state.lienparentesAll = value
    },
    setFamillesAll(state, value) {
        state.famillesAll = value
    },
    
    setLoading(state, loading) {
        state.loading = loading
    },
    resetState(state) {
        state = Object.assign(state, initialState())
    }
}

export default {
    namespaced: true,
    state: initialState,
    getters,
    actions,
    mutations
}
