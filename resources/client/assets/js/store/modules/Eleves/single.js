function initialState() {
    return {
        item: {
            id: null,
            matricule: null,
            img_path: null,
            prenom_fr: null,
            prenom_ar: null,
            nom_fr: null,
            nom_ar: null,
            sexe: null,
            cin: null,
            cne: null,
            idmassar: null,
            tel: null,
            adresse: null,
            datenaissance: null,
            datepremiereentree: null,
            email: null,
            nationalite: null,
            groupesangin: null,
            is_handicaped: false,
            pediatrenom: null,
            telpediatre: null,
            allergies: null,
            particularites: null,
            traitement: null,
            nbreanneedouble: null,
            allergiealimentaire: null,
            intolerancealimentaire: null,
            comportementalimentaire: null,
            famille: null,
            tuteur: null,
            quartier: null,
        },
        famillesAll: [],
        tuteursAll: [],
        quartiersAll: [],
        
        loading: false,
    }
}

const getters = {
    item: state => state.item,
    loading: state => state.loading,
    famillesAll: state => state.famillesAll,
    tuteursAll: state => state.tuteursAll,
    quartiersAll: state => state.quartiersAll,
    
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

            if (state.item.img_path === null) {
                params.delete('img_path');
            }
            params.set('is_handicaped', state.item.is_handicaped ? 1 : 0)
            if (_.isEmpty(state.item.famille)) {
                params.set('famille_id', '')
            } else {
                params.set('famille_id', state.item.famille.id)
            }
            if (_.isEmpty(state.item.tuteur)) {
                params.set('tuteur_id', '')
            } else {
                params.set('tuteur_id', state.item.tuteur.id)
            }
            if (_.isEmpty(state.item.quartier)) {
                params.set('quartier_id', '')
            } else {
                params.set('quartier_id', state.item.quartier.id)
            }

            axios.post('/api/v1/eleves', params)
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

            if (state.item.img_path === null) {
                params.delete('img_path');
            }
            params.set('is_handicaped', state.item.is_handicaped ? 1 : 0)
            if (_.isEmpty(state.item.famille)) {
                params.set('famille_id', '')
            } else {
                params.set('famille_id', state.item.famille.id)
            }
            if (_.isEmpty(state.item.tuteur)) {
                params.set('tuteur_id', '')
            } else {
                params.set('tuteur_id', state.item.tuteur.id)
            }
            if (_.isEmpty(state.item.quartier)) {
                params.set('quartier_id', '')
            } else {
                params.set('quartier_id', state.item.quartier.id)
            }

            axios.post('/api/v1/eleves/' + state.item.id, params)
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
        axios.get('/api/v1/eleves/' + id)
            .then(response => {
                commit('setItem', response.data.data)
            })

        dispatch('fetchFamillesAll')
    dispatch('fetchTuteursAll')
    dispatch('fetchQuartiersAll')
    },
    fetchFamillesAll({ commit }) {
        axios.get('/api/v1/familles')
            .then(response => {
                commit('setFamillesAll', response.data.data)
            })
    },
    fetchTuteursAll({ commit }) {
        axios.get('/api/v1/tuteurs')
            .then(response => {
                commit('setTuteursAll', response.data.data)
            })
    },
    fetchQuartiersAll({ commit }) {
        axios.get('/api/v1/quartiers')
            .then(response => {
                commit('setQuartiersAll', response.data.data)
            })
    },
    setMatricule({ commit }, value) {
        commit('setMatricule', value)
    },
    setImg_path({ commit }, value) {
        commit('setImg_path', value)
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
    setSexe({ commit }, value) {
        commit('setSexe', value)
    },
    setCin({ commit }, value) {
        commit('setCin', value)
    },
    setCne({ commit }, value) {
        commit('setCne', value)
    },
    setIdmassar({ commit }, value) {
        commit('setIdmassar', value)
    },
    setTel({ commit }, value) {
        commit('setTel', value)
    },
    setAdresse({ commit }, value) {
        commit('setAdresse', value)
    },
    setDatenaissance({ commit }, value) {
        commit('setDatenaissance', value)
    },
    setDatepremiereentree({ commit }, value) {
        commit('setDatepremiereentree', value)
    },
    setEmail({ commit }, value) {
        commit('setEmail', value)
    },
    setNationalite({ commit }, value) {
        commit('setNationalite', value)
    },
    setGroupesangin({ commit }, value) {
        commit('setGroupesangin', value)
    },
    setIs_handicaped({ commit }, value) {
        commit('setIs_handicaped', value)
    },
    setPediatrenom({ commit }, value) {
        commit('setPediatrenom', value)
    },
    setTelpediatre({ commit }, value) {
        commit('setTelpediatre', value)
    },
    setAllergies({ commit }, value) {
        commit('setAllergies', value)
    },
    setParticularites({ commit }, value) {
        commit('setParticularites', value)
    },
    setTraitement({ commit }, value) {
        commit('setTraitement', value)
    },
    setNbreanneedouble({ commit }, value) {
        commit('setNbreanneedouble', value)
    },
    setAllergiealimentaire({ commit }, value) {
        commit('setAllergiealimentaire', value)
    },
    setIntolerancealimentaire({ commit }, value) {
        commit('setIntolerancealimentaire', value)
    },
    setComportementalimentaire({ commit }, value) {
        commit('setComportementalimentaire', value)
    },
    setFamille({ commit }, value) {
        commit('setFamille', value)
    },
    setTuteur({ commit }, value) {
        commit('setTuteur', value)
    },
    setQuartier({ commit }, value) {
        commit('setQuartier', value)
    },
    resetState({ commit }) {
        commit('resetState')
    }
}

const mutations = {
    setItem(state, item) {
        state.item = item
    },
    setMatricule(state, value) {
        state.item.matricule = value
    },
    setImg_path(state, value) {
        state.item.img_path = value
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
    setSexe(state, value) {
        state.item.sexe = value
    },
    setCin(state, value) {
        state.item.cin = value
    },
    setCne(state, value) {
        state.item.cne = value
    },
    setIdmassar(state, value) {
        state.item.idmassar = value
    },
    setTel(state, value) {
        state.item.tel = value
    },
    setAdresse(state, value) {
        state.item.adresse = value
    },
    setDatenaissance(state, value) {
        state.item.datenaissance = value
    },
    setDatepremiereentree(state, value) {
        state.item.datepremiereentree = value
    },
    setEmail(state, value) {
        state.item.email = value
    },
    setNationalite(state, value) {
        state.item.nationalite = value
    },
    setGroupesangin(state, value) {
        state.item.groupesangin = value
    },
    setIs_handicaped(state, value) {
        state.item.is_handicaped = value
    },
    setPediatrenom(state, value) {
        state.item.pediatrenom = value
    },
    setTelpediatre(state, value) {
        state.item.telpediatre = value
    },
    setAllergies(state, value) {
        state.item.allergies = value
    },
    setParticularites(state, value) {
        state.item.particularites = value
    },
    setTraitement(state, value) {
        state.item.traitement = value
    },
    setNbreanneedouble(state, value) {
        state.item.nbreanneedouble = value
    },
    setAllergiealimentaire(state, value) {
        state.item.allergiealimentaire = value
    },
    setIntolerancealimentaire(state, value) {
        state.item.intolerancealimentaire = value
    },
    setComportementalimentaire(state, value) {
        state.item.comportementalimentaire = value
    },
    setFamille(state, value) {
        state.item.famille = value
    },
    setTuteur(state, value) {
        state.item.tuteur = value
    },
    setQuartier(state, value) {
        state.item.quartier = value
    },
    setFamillesAll(state, value) {
        state.famillesAll = value
    },
    setTuteursAll(state, value) {
        state.tuteursAll = value
    },
    setQuartiersAll(state, value) {
        state.quartiersAll = value
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
