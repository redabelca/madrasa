function initialState() {
    return {
        item: {
            id: null,
            code: null,
            marque: null,
            matricule: null,
            datemiseencirculation: null,
            dateacquisition: null,
            echeanceassurance: null,
            nombredeplace: null,
            echeancevisitetechnique: null,
            echeanceautorisation: null,
            consommationmin: null,
            consommationmax: null,
            vidange: null,
            observations: null,
        },
        
        
        loading: false,
    }
}

const getters = {
    item: state => state.item,
    loading: state => state.loading,
    
    
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

            

            axios.post('/api/v1/vehicules', params)
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

            

            axios.post('/api/v1/vehicules/' + state.item.id, params)
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
        axios.get('/api/v1/vehicules/' + id)
            .then(response => {
                commit('setItem', response.data.data)
            })

        
    },
    
    setCode({ commit }, value) {
        commit('setCode', value)
    },
    setMarque({ commit }, value) {
        commit('setMarque', value)
    },
    setMatricule({ commit }, value) {
        commit('setMatricule', value)
    },
    setDatemiseencirculation({ commit }, value) {
        commit('setDatemiseencirculation', value)
    },
    setDateacquisition({ commit }, value) {
        commit('setDateacquisition', value)
    },
    setEcheanceassurance({ commit }, value) {
        commit('setEcheanceassurance', value)
    },
    setNombredeplace({ commit }, value) {
        commit('setNombredeplace', value)
    },
    setEcheancevisitetechnique({ commit }, value) {
        commit('setEcheancevisitetechnique', value)
    },
    setEcheanceautorisation({ commit }, value) {
        commit('setEcheanceautorisation', value)
    },
    setConsommationmin({ commit }, value) {
        commit('setConsommationmin', value)
    },
    setConsommationmax({ commit }, value) {
        commit('setConsommationmax', value)
    },
    setVidange({ commit }, value) {
        commit('setVidange', value)
    },
    setObservations({ commit }, value) {
        commit('setObservations', value)
    },
    resetState({ commit }) {
        commit('resetState')
    }
}

const mutations = {
    setItem(state, item) {
        state.item = item
    },
    setCode(state, value) {
        state.item.code = value
    },
    setMarque(state, value) {
        state.item.marque = value
    },
    setMatricule(state, value) {
        state.item.matricule = value
    },
    setDatemiseencirculation(state, value) {
        state.item.datemiseencirculation = value
    },
    setDateacquisition(state, value) {
        state.item.dateacquisition = value
    },
    setEcheanceassurance(state, value) {
        state.item.echeanceassurance = value
    },
    setNombredeplace(state, value) {
        state.item.nombredeplace = value
    },
    setEcheancevisitetechnique(state, value) {
        state.item.echeancevisitetechnique = value
    },
    setEcheanceautorisation(state, value) {
        state.item.echeanceautorisation = value
    },
    setConsommationmin(state, value) {
        state.item.consommationmin = value
    },
    setConsommationmax(state, value) {
        state.item.consommationmax = value
    },
    setVidange(state, value) {
        state.item.vidange = value
    },
    setObservations(state, value) {
        state.item.observations = value
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
