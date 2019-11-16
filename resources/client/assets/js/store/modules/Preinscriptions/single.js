function initialState() {
    return {
        item: {
            id: null,
            nomprofesseurtest: null,
            notetest: null,
            resultattest: null,
            is_acceptedintest: false,
            fraistest: null,
            fraispayed: false,
            transport: false,
            datetest: null,
            datelimiteinscription: null,
            observations: null,
            anneescolaire: null,
            eleve: null,
        },
        anneescolairesAll: [],
        elevesAll: [],
        
        loading: false,
    }
}

const getters = {
    item: state => state.item,
    loading: state => state.loading,
    anneescolairesAll: state => state.anneescolairesAll,
    elevesAll: state => state.elevesAll,
    
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

            params.set('is_acceptedintest', state.item.is_acceptedintest ? 1 : 0)
            params.set('fraispayed', state.item.fraispayed ? 1 : 0)
            params.set('transport', state.item.transport ? 1 : 0)
            if (_.isEmpty(state.item.anneescolaire)) {
                params.set('anneescolaire_id', '')
            } else {
                params.set('anneescolaire_id', state.item.anneescolaire.id)
            }
            if (_.isEmpty(state.item.eleve)) {
                params.set('eleve_id', '')
            } else {
                params.set('eleve_id', state.item.eleve.id)
            }

            axios.post('/api/v1/preinscriptions', params)
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

            params.set('is_acceptedintest', state.item.is_acceptedintest ? 1 : 0)
            params.set('fraispayed', state.item.fraispayed ? 1 : 0)
            params.set('transport', state.item.transport ? 1 : 0)
            if (_.isEmpty(state.item.anneescolaire)) {
                params.set('anneescolaire_id', '')
            } else {
                params.set('anneescolaire_id', state.item.anneescolaire.id)
            }
            if (_.isEmpty(state.item.eleve)) {
                params.set('eleve_id', '')
            } else {
                params.set('eleve_id', state.item.eleve.id)
            }

            axios.post('/api/v1/preinscriptions/' + state.item.id, params)
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
        axios.get('/api/v1/preinscriptions/' + id)
            .then(response => {
                commit('setItem', response.data.data)
            })

        dispatch('fetchAnneescolairesAll')
    dispatch('fetchElevesAll')
    },
    fetchAnneescolairesAll({ commit }) {
        axios.get('/api/v1/anneescolaires')
            .then(response => {
                commit('setAnneescolairesAll', response.data.data)
            })
    },
    fetchElevesAll({ commit }) {
        axios.get('/api/v1/eleves')
            .then(response => {
                commit('setElevesAll', response.data.data)
            })
    },
    setNomprofesseurtest({ commit }, value) {
        commit('setNomprofesseurtest', value)
    },
    setNotetest({ commit }, value) {
        commit('setNotetest', value)
    },
    setResultattest({ commit }, value) {
        commit('setResultattest', value)
    },
    setIs_acceptedintest({ commit }, value) {
        commit('setIs_acceptedintest', value)
    },
    setFraistest({ commit }, value) {
        commit('setFraistest', value)
    },
    setFraispayed({ commit }, value) {
        commit('setFraispayed', value)
    },
    setTransport({ commit }, value) {
        commit('setTransport', value)
    },
    setDatetest({ commit }, value) {
        commit('setDatetest', value)
    },
    setDatelimiteinscription({ commit }, value) {
        commit('setDatelimiteinscription', value)
    },
    setObservations({ commit }, value) {
        commit('setObservations', value)
    },
    setAnneescolaire({ commit }, value) {
        commit('setAnneescolaire', value)
    },
    setEleve({ commit }, value) {
        commit('setEleve', value)
    },
    resetState({ commit }) {
        commit('resetState')
    }
}

const mutations = {
    setItem(state, item) {
        state.item = item
    },
    setNomprofesseurtest(state, value) {
        state.item.nomprofesseurtest = value
    },
    setNotetest(state, value) {
        state.item.notetest = value
    },
    setResultattest(state, value) {
        state.item.resultattest = value
    },
    setIs_acceptedintest(state, value) {
        state.item.is_acceptedintest = value
    },
    setFraistest(state, value) {
        state.item.fraistest = value
    },
    setFraispayed(state, value) {
        state.item.fraispayed = value
    },
    setTransport(state, value) {
        state.item.transport = value
    },
    setDatetest(state, value) {
        state.item.datetest = value
    },
    setDatelimiteinscription(state, value) {
        state.item.datelimiteinscription = value
    },
    setObservations(state, value) {
        state.item.observations = value
    },
    setAnneescolaire(state, value) {
        state.item.anneescolaire = value
    },
    setEleve(state, value) {
        state.item.eleve = value
    },
    setAnneescolairesAll(state, value) {
        state.anneescolairesAll = value
    },
    setElevesAll(state, value) {
        state.elevesAll = value
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
