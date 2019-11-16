function initialState() {
    return {
        item: {
            id: null,
            dateentree: null,
            interne: false,
            classe: null,
            circuit: null,
            niveau: null,
            anneescolaire: null,
            preinscription: null,
        },
        classesAll: [],
        circuitsAll: [],
        niveauxAll: [],
        anneescolairesAll: [],
        preinscriptionsAll: [],
        
        loading: false,
    }
}

const getters = {
    item: state => state.item,
    loading: state => state.loading,
    classesAll: state => state.classesAll,
    circuitsAll: state => state.circuitsAll,
    niveauxAll: state => state.niveauxAll,
    anneescolairesAll: state => state.anneescolairesAll,
    preinscriptionsAll: state => state.preinscriptionsAll,
    
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

            params.set('interne', state.item.interne ? 1 : 0)
            if (_.isEmpty(state.item.classe)) {
                params.set('classe_id', '')
            } else {
                params.set('classe_id', state.item.classe.id)
            }
            if (_.isEmpty(state.item.circuit)) {
                params.set('circuit_id', '')
            } else {
                params.set('circuit_id', state.item.circuit.id)
            }
            if (_.isEmpty(state.item.niveau)) {
                params.set('niveau_id', '')
            } else {
                params.set('niveau_id', state.item.niveau.id)
            }
            if (_.isEmpty(state.item.anneescolaire)) {
                params.set('anneescolaire_id', '')
            } else {
                params.set('anneescolaire_id', state.item.anneescolaire.id)
            }
            if (_.isEmpty(state.item.preinscription)) {
                params.set('preinscription_id', '')
            } else {
                params.set('preinscription_id', state.item.preinscription.id)
            }

            axios.post('/api/v1/inscriptions', params)
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

            params.set('interne', state.item.interne ? 1 : 0)
            if (_.isEmpty(state.item.classe)) {
                params.set('classe_id', '')
            } else {
                params.set('classe_id', state.item.classe.id)
            }
            if (_.isEmpty(state.item.circuit)) {
                params.set('circuit_id', '')
            } else {
                params.set('circuit_id', state.item.circuit.id)
            }
            if (_.isEmpty(state.item.niveau)) {
                params.set('niveau_id', '')
            } else {
                params.set('niveau_id', state.item.niveau.id)
            }
            if (_.isEmpty(state.item.anneescolaire)) {
                params.set('anneescolaire_id', '')
            } else {
                params.set('anneescolaire_id', state.item.anneescolaire.id)
            }
            if (_.isEmpty(state.item.preinscription)) {
                params.set('preinscription_id', '')
            } else {
                params.set('preinscription_id', state.item.preinscription.id)
            }

            axios.post('/api/v1/inscriptions/' + state.item.id, params)
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
        axios.get('/api/v1/inscriptions/' + id)
            .then(response => {
                commit('setItem', response.data.data)
            })

        dispatch('fetchClassesAll')
    dispatch('fetchCircuitsAll')
    dispatch('fetchNiveauxAll')
    dispatch('fetchAnneescolairesAll')
    dispatch('fetchPreinscriptionsAll')
    },
    fetchClassesAll({ commit }) {
        axios.get('/api/v1/classes')
            .then(response => {
                commit('setClassesAll', response.data.data)
            })
    },
    fetchCircuitsAll({ commit }) {
        axios.get('/api/v1/circuits')
            .then(response => {
                commit('setCircuitsAll', response.data.data)
            })
    },
    fetchNiveauxAll({ commit }) {
        axios.get('/api/v1/niveaux')
            .then(response => {
                commit('setNiveauxAll', response.data.data)
            })
    },
    fetchAnneescolairesAll({ commit }) {
        axios.get('/api/v1/anneescolaires')
            .then(response => {
                commit('setAnneescolairesAll', response.data.data)
            })
    },
    fetchPreinscriptionsAll({ commit }) {
        axios.get('/api/v1/preinscriptions')
            .then(response => {
                commit('setPreinscriptionsAll', response.data.data)
            })
    },
    setDateentree({ commit }, value) {
        commit('setDateentree', value)
    },
    setInterne({ commit }, value) {
        commit('setInterne', value)
    },
    setClasse({ commit }, value) {
        commit('setClasse', value)
    },
    setCircuit({ commit }, value) {
        commit('setCircuit', value)
    },
    setNiveau({ commit }, value) {
        commit('setNiveau', value)
    },
    setAnneescolaire({ commit }, value) {
        commit('setAnneescolaire', value)
    },
    setPreinscription({ commit }, value) {
        commit('setPreinscription', value)
    },
    resetState({ commit }) {
        commit('resetState')
    }
}

const mutations = {
    setItem(state, item) {
        state.item = item
    },
    setDateentree(state, value) {
        state.item.dateentree = value
    },
    setInterne(state, value) {
        state.item.interne = value
    },
    setClasse(state, value) {
        state.item.classe = value
    },
    setCircuit(state, value) {
        state.item.circuit = value
    },
    setNiveau(state, value) {
        state.item.niveau = value
    },
    setAnneescolaire(state, value) {
        state.item.anneescolaire = value
    },
    setPreinscription(state, value) {
        state.item.preinscription = value
    },
    setClassesAll(state, value) {
        state.classesAll = value
    },
    setCircuitsAll(state, value) {
        state.circuitsAll = value
    },
    setNiveauxAll(state, value) {
        state.niveauxAll = value
    },
    setAnneescolairesAll(state, value) {
        state.anneescolairesAll = value
    },
    setPreinscriptionsAll(state, value) {
        state.preinscriptionsAll = value
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
