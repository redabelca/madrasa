import Vue from 'vue'
import Vuex from 'vuex'
import Alert from './modules/alert'
import ChangePassword from './modules/change_password'
import Rules from './modules/rules'
import PreinscriptionsIndex from './modules/Preinscriptions'
import PreinscriptionsSingle from './modules/Preinscriptions/single'
import InscriptionsIndex from './modules/Inscriptions'
import InscriptionsSingle from './modules/Inscriptions/single'
import PermissionsIndex from './modules/Permissions'
import PermissionsSingle from './modules/Permissions/single'
import RolesIndex from './modules/Roles'
import RolesSingle from './modules/Roles/single'
import UsersIndex from './modules/Users'
import UsersSingle from './modules/Users/single'
import UserActionsIndex from './modules/UserActions'
import AnneescolairesIndex from './modules/Anneescolaires'
import AnneescolairesSingle from './modules/Anneescolaires/single'
import CyclesIndex from './modules/Cycles'
import CyclesSingle from './modules/Cycles/single'
import NiveauxIndex from './modules/Niveaux'
import NiveauxSingle from './modules/Niveaux/single'
import BranchesIndex from './modules/Branches'
import BranchesSingle from './modules/Branches/single'
import ClassesIndex from './modules/Classes'
import ClassesSingle from './modules/Classes/single'
import QuartiersIndex from './modules/Quartiers'
import QuartiersSingle from './modules/Quartiers/single'
import VehiculesIndex from './modules/Vehicules'
import VehiculesSingle from './modules/Vehicules/single'
import CircuitsIndex from './modules/Circuits'
import CircuitsSingle from './modules/Circuits/single'
import ElevesIndex from './modules/Eleves'
import ElevesSingle from './modules/Eleves/single'
import FamillesIndex from './modules/Familles'
import FamillesSingle from './modules/Familles/single'
import TuteursIndex from './modules/Tuteurs'
import TuteursSingle from './modules/Tuteurs/single'
import LienparentesIndex from './modules/Lienparentes'
import LienparentesSingle from './modules/Lienparentes/single'
import CommunesIndex from './modules/Communes'
import CommunesSingle from './modules/Communes/single'

Vue.use(Vuex)

const debug = process.env.NODE_ENV !== 'production'

export default new Vuex.Store({
    modules: {
        Alert,
        ChangePassword,
        Rules,
        PreinscriptionsIndex,
        PreinscriptionsSingle,
        InscriptionsIndex,
        InscriptionsSingle,
        PermissionsIndex,
        PermissionsSingle,
        RolesIndex,
        RolesSingle,
        UsersIndex,
        UsersSingle,
        UserActionsIndex,
        AnneescolairesIndex,
        AnneescolairesSingle,
        CyclesIndex,
        CyclesSingle,
        NiveauxIndex,
        NiveauxSingle,
        BranchesIndex,
        BranchesSingle,
        ClassesIndex,
        ClassesSingle,
        QuartiersIndex,
        QuartiersSingle,
        VehiculesIndex,
        VehiculesSingle,
        CircuitsIndex,
        CircuitsSingle,
        ElevesIndex,
        ElevesSingle,
        FamillesIndex,
        FamillesSingle,
        TuteursIndex,
        TuteursSingle,
        LienparentesIndex,
        LienparentesSingle,
        CommunesIndex,
        CommunesSingle,
    },
    strict: debug,
})
