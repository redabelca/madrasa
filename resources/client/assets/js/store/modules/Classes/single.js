function initialState() {
    return {
        item: {
            id: null,
            code: null,
            label_fr: null,
            idmassar: null,
            capacite: null,
            niveau: null,
            branche: null,
        },
        niveauxAll: [],
        branchesAll: [],
        
        loading: false,
    }
}

const getters = {
    item: state => state.item,
    loading: state => state.loading,
    niveauxAll: state => state.niveauxAll,
    branchesAll: state => state.branchesAll,
    
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

            if (_.isEmpty(state.item.niveau)) {
                params.set('niveau_id', '')
            } else {
                params.set('niveau_id', state.item.niveau.id)
            }
            if (_.isEmpty(state.item.branche)) {
                params.set('branche_id', '')
            } else {
                params.set('branche_id', state.item.branche.id)
            }

            axios.post('/api/v1/classes', params)
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

            if (_.isEmpty(state.item.niveau)) {
                params.set('niveau_id', '')
            } else {
                params.set('niveau_id', state.item.niveau.id)
            }
            if (_.isEmpty(state.item.branche)) {
                params.set('branche_id', '')
            } else {
                params.set('branche_id', state.item.branche.id)
            }

            axios.post('/api/v1/classes/' + state.item.id, params)
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
        axios.get('/api/v1/classes/' + id)
            .then(response => {
                commit('setItem', response.data.data)
            })

        dispatch('fetchNiveauxAll')
    dispatch('fetchBranchesAll')
    },
    fetchNiveauxAll({ commit }) {
        axios.get('/api/v1/niveaux')
            .then(response => {
                commit('setNiveauxAll', response.data.data)
            })
    },
    fetchBranchesAll({ commit }) {
        axios.get('/api/v1/branches')
            .then(response => {
                commit('setBranchesAll', response.data.data)
            })
    },
    setCode({ commit }, value) {
        commit('setCode', value)
    },
    setLabel_fr({ commit }, value) {
        commit('setLabel_fr', value)
    },
    setIdmassar({ commit }, value) {
        commit('setIdmassar', value)
    },
    setCapacite({ commit }, value) {
        commit('setCapacite', value)
    },
    setNiveau({ commit }, value) {
        commit('setNiveau', value)
    },
    setBranche({ commit }, value) {
        commit('setBranche', value)
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
    setLabel_fr(state, value) {
        state.item.label_fr = value
    },
    setIdmassar(state, value) {
        state.item.idmassar = value
    },
    setCapacite(state, value) {
        state.item.capacite = value
    },
    setNiveau(state, value) {
        state.item.niveau = value
    },
    setBranche(state, value) {
        state.item.branche = value
    },
    setNiveauxAll(state, value) {
        state.niveauxAll = value
    },
    setBranchesAll(state, value) {
        state.branchesAll = value
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
