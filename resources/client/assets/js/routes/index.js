import Vue from 'vue'
import VueRouter from 'vue-router'

import ChangePassword from '../components/ChangePassword.vue'
import PreinscriptionsIndex from '../components/cruds/Preinscriptions/Index.vue'
import PreinscriptionsCreate from '../components/cruds/Preinscriptions/Create.vue'
import CustomPreinscriptionsCreate from '../components/cruds/Preinscriptions/CustomCreate.vue'
import PreinscriptionsShow from '../components/cruds/Preinscriptions/Show.vue'
import PreinscriptionsEdit from '../components/cruds/Preinscriptions/Edit.vue'
import InscriptionsIndex from '../components/cruds/Inscriptions/Index.vue'
import InscriptionsCreate from '../components/cruds/Inscriptions/Create.vue'
import CustomInscriptionsCreate from '../components/cruds/Inscriptions/CustomCreate.vue'
import InscriptionsShow from '../components/cruds/Inscriptions/Show.vue'
import InscriptionsEdit from '../components/cruds/Inscriptions/Edit.vue'
import PermissionsIndex from '../components/cruds/Permissions/Index.vue'
import PermissionsCreate from '../components/cruds/Permissions/Create.vue'
import PermissionsShow from '../components/cruds/Permissions/Show.vue'
import PermissionsEdit from '../components/cruds/Permissions/Edit.vue'
import RolesIndex from '../components/cruds/Roles/Index.vue'
import RolesShow from '../components/cruds/Roles/Show.vue'
import UsersIndex from '../components/cruds/Users/Index.vue'
import UsersCreate from '../components/cruds/Users/Create.vue'
import UsersShow from '../components/cruds/Users/Show.vue'
import UsersEdit from '../components/cruds/Users/Edit.vue'
import UserActionsIndex from '../components/cruds/UserActions/Index.vue'
import AnneescolairesIndex from '../components/cruds/Anneescolaires/Index.vue'
import AnneescolairesCreate from '../components/cruds/Anneescolaires/Create.vue'
import AnneescolairesShow from '../components/cruds/Anneescolaires/Show.vue'
import AnneescolairesEdit from '../components/cruds/Anneescolaires/Edit.vue'
import CyclesIndex from '../components/cruds/Cycles/Index.vue'
import CyclesCreate from '../components/cruds/Cycles/Create.vue'
import CyclesShow from '../components/cruds/Cycles/Show.vue'
import CyclesEdit from '../components/cruds/Cycles/Edit.vue'
import NiveauxIndex from '../components/cruds/Niveaux/Index.vue'
import NiveauxCreate from '../components/cruds/Niveaux/Create.vue'
import NiveauxShow from '../components/cruds/Niveaux/Show.vue'
import NiveauxEdit from '../components/cruds/Niveaux/Edit.vue'
import BranchesIndex from '../components/cruds/Branches/Index.vue'
import BranchesCreate from '../components/cruds/Branches/Create.vue'
import BranchesShow from '../components/cruds/Branches/Show.vue'
import BranchesEdit from '../components/cruds/Branches/Edit.vue'
import ClassesIndex from '../components/cruds/Classes/Index.vue'
import ClassesCreate from '../components/cruds/Classes/Create.vue'
import ClassesShow from '../components/cruds/Classes/Show.vue'
import ClassesEdit from '../components/cruds/Classes/Edit.vue'
import QuartiersIndex from '../components/cruds/Quartiers/Index.vue'
import QuartiersCreate from '../components/cruds/Quartiers/Create.vue'
import QuartiersShow from '../components/cruds/Quartiers/Show.vue'
import QuartiersEdit from '../components/cruds/Quartiers/Edit.vue'
import VehiculesIndex from '../components/cruds/Vehicules/Index.vue'
import VehiculesCreate from '../components/cruds/Vehicules/Create.vue'
import VehiculesShow from '../components/cruds/Vehicules/Show.vue'
import VehiculesEdit from '../components/cruds/Vehicules/Edit.vue'
import CircuitsIndex from '../components/cruds/Circuits/Index.vue'
import CircuitsCreate from '../components/cruds/Circuits/Create.vue'
import CircuitsShow from '../components/cruds/Circuits/Show.vue'
import CircuitsEdit from '../components/cruds/Circuits/Edit.vue'
import ElevesIndex from '../components/cruds/Eleves/Index.vue'
import ElevesCreate from '../components/cruds/Eleves/Create.vue'
import CustomElevesCreate from '../components/cruds/Eleves/CustomCreate.vue'
import ElevesShow from '../components/cruds/Eleves/Show.vue'
import ElevesEdit from '../components/cruds/Eleves/Edit.vue'
import CustomElevesEdit from '../components/cruds/Eleves/CustomEdit.vue'
import FamillesIndex from '../components/cruds/Familles/Index.vue'
import FamillesCreate from '../components/cruds/Familles/Create.vue'
import FamillesShow from '../components/cruds/Familles/Show.vue'
import FamillesEdit from '../components/cruds/Familles/Edit.vue'
import TuteursIndex from '../components/cruds/Tuteurs/Index.vue'
import TuteursCreate from '../components/cruds/Tuteurs/Create.vue'
import TuteursShow from '../components/cruds/Tuteurs/Show.vue'
import TuteursEdit from '../components/cruds/Tuteurs/Edit.vue'
import LienparentesIndex from '../components/cruds/Lienparentes/Index.vue'
import LienparentesCreate from '../components/cruds/Lienparentes/Create.vue'
import LienparentesShow from '../components/cruds/Lienparentes/Show.vue'
import LienparentesEdit from '../components/cruds/Lienparentes/Edit.vue'
import CommunesIndex from '../components/cruds/Communes/Index.vue'
import CommunesCreate from '../components/cruds/Communes/Create.vue'
import CommunesShow from '../components/cruds/Communes/Show.vue'
import CommunesEdit from '../components/cruds/Communes/Edit.vue'

Vue.use(VueRouter)

const routes = [{
        path: '/change-password',
        component: ChangePassword,
        name: 'auth.change_password'
    },
    {
        path: '/preinscriptions',
        component: PreinscriptionsIndex,
        name: 'preinscriptions.index'
    },
    {
        path: '/preinscriptions/custom-create/:eleveID',
        component: CustomPreinscriptionsCreate,
        name: 'custom-preinscriptions.create',
        props: true
    },
    {
        path: '/preinscriptions/create',
        component: PreinscriptionsCreate,
        name: 'preinscriptions.create'
    },
    {
        path: '/preinscriptions/:id',
        component: PreinscriptionsShow,
        name: 'preinscriptions.show'
    },
    {
        path: '/preinscriptions/:id/edit',
        component: PreinscriptionsEdit,
        name: 'preinscriptions.edit'
    },
    {
        path: '/inscriptions',
        component: InscriptionsIndex,
        name: 'inscriptions.index'
    },
    {
        path: '/inscriptions/create',
        component: InscriptionsCreate,
        name: 'inscriptions.create'
    },
    {
        path: '/inscriptions/custom-create/:preinscriptionID',
        component: CustomInscriptionsCreate,
        name: 'custom-inscriptions.create'
    },
    {
        path: '/inscriptions/:id',
        component: InscriptionsShow,
        name: 'inscriptions.show'
    },
    {
        path: '/inscriptions/:id/edit',
        component: InscriptionsEdit,
        name: 'inscriptions.edit'
    },
    {
        path: '/permissions',
        component: PermissionsIndex,
        name: 'permissions.index'
    },
    {
        path: '/permissions/create',
        component: PermissionsCreate,
        name: 'permissions.create'
    },
    {
        path: '/permissions/:id',
        component: PermissionsShow,
        name: 'permissions.show'
    },
    {
        path: '/permissions/:id/edit',
        component: PermissionsEdit,
        name: 'permissions.edit'
    },
    {
        path: '/roles',
        component: RolesIndex,
        name: 'roles.index'
    },
    {
        path: '/roles/:id',
        component: RolesShow,
        name: 'roles.show'
    },
    {
        path: '/users',
        component: UsersIndex,
        name: 'users.index'
    },
    {
        path: '/users/create',
        component: UsersCreate,
        name: 'users.create'
    },
    {
        path: '/users/:id',
        component: UsersShow,
        name: 'users.show'
    },
    {
        path: '/users/:id/edit',
        component: UsersEdit,
        name: 'users.edit'
    },
    {
        path: '/user-actions',
        component: UserActionsIndex,
        name: 'user_actions.index'
    },
    {
        path: '/anneescolaires',
        component: AnneescolairesIndex,
        name: 'anneescolaires.index'
    },
    {
        path: '/anneescolaires/create',
        component: AnneescolairesCreate,
        name: 'anneescolaires.create'
    },
    {
        path: '/anneescolaires/:id',
        component: AnneescolairesShow,
        name: 'anneescolaires.show'
    },
    {
        path: '/anneescolaires/:id/edit',
        component: AnneescolairesEdit,
        name: 'anneescolaires.edit'
    },
    {
        path: '/cycles',
        component: CyclesIndex,
        name: 'cycles.index'
    },
    {
        path: '/cycles/create',
        component: CyclesCreate,
        name: 'cycles.create'
    },
    {
        path: '/cycles/:id',
        component: CyclesShow,
        name: 'cycles.show'
    },
    {
        path: '/cycles/:id/edit',
        component: CyclesEdit,
        name: 'cycles.edit'
    },
    {
        path: '/niveaux',
        component: NiveauxIndex,
        name: 'niveaux.index'
    },
    {
        path: '/niveaux/create',
        component: NiveauxCreate,
        name: 'niveaux.create'
    },
    {
        path: '/niveaux/:id',
        component: NiveauxShow,
        name: 'niveaux.show'
    },
    {
        path: '/niveaux/:id/edit',
        component: NiveauxEdit,
        name: 'niveaux.edit'
    },
    {
        path: '/branches',
        component: BranchesIndex,
        name: 'branches.index'
    },
    {
        path: '/branches/create',
        component: BranchesCreate,
        name: 'branches.create'
    },
    {
        path: '/branches/:id',
        component: BranchesShow,
        name: 'branches.show'
    },
    {
        path: '/branches/:id/edit',
        component: BranchesEdit,
        name: 'branches.edit'
    },
    {
        path: '/classes',
        component: ClassesIndex,
        name: 'classes.index'
    },
    {
        path: '/classes/create',
        component: ClassesCreate,
        name: 'classes.create'
    },
    {
        path: '/classes/:id',
        component: ClassesShow,
        name: 'classes.show'
    },
    {
        path: '/classes/:id/edit',
        component: ClassesEdit,
        name: 'classes.edit'
    },
    {
        path: '/quartiers',
        component: QuartiersIndex,
        name: 'quartiers.index'
    },
    {
        path: '/quartiers/create',
        component: QuartiersCreate,
        name: 'quartiers.create'
    },
    {
        path: '/quartiers/:id',
        component: QuartiersShow,
        name: 'quartiers.show'
    },
    {
        path: '/quartiers/:id/edit',
        component: QuartiersEdit,
        name: 'quartiers.edit'
    },
    {
        path: '/vehicules',
        component: VehiculesIndex,
        name: 'vehicules.index'
    },
    {
        path: '/vehicules/create',
        component: VehiculesCreate,
        name: 'vehicules.create'
    },
    {
        path: '/vehicules/:id',
        component: VehiculesShow,
        name: 'vehicules.show'
    },
    {
        path: '/vehicules/:id/edit',
        component: VehiculesEdit,
        name: 'vehicules.edit'
    },
    {
        path: '/circuits',
        component: CircuitsIndex,
        name: 'circuits.index'
    },
    {
        path: '/circuits/create',
        component: CircuitsCreate,
        name: 'circuits.create'
    },
    {
        path: '/circuits/:id',
        component: CircuitsShow,
        name: 'circuits.show'
    },
    {
        path: '/circuits/:id/edit',
        component: CircuitsEdit,
        name: 'circuits.edit'
    },
    {
        path: '/eleves',
        component: ElevesIndex,
        name: 'eleves.index'
    },
    {
        path: '/eleves/custom-create',
        component: CustomElevesCreate,
        name: 'custom-eleves.create'
    },
    {
        path: '/eleves/create',
        component: ElevesCreate,
        name: 'eleves.create'
    },
    {
        path: '/eleves/:id',
        component: ElevesShow,
        name: 'eleves.show'
    },
    {
        path: '/eleves/:id/edit',
        component: ElevesEdit,
        name: 'eleves.edit'
    },
    {
        path: '/eleves/:id/custom-edit/:preinscriptionID',
        component: CustomElevesEdit,
        name: 'custom-eleves.edit'
    },
    {
        path: '/familles',
        component: FamillesIndex,
        name: 'familles.index'
    },
    {
        path: '/familles/create',
        component: FamillesCreate,
        name: 'familles.create'
    },
    {
        path: '/familles/:id',
        component: FamillesShow,
        name: 'familles.show'
    },
    {
        path: '/familles/:id/edit',
        component: FamillesEdit,
        name: 'familles.edit'
    },
    {
        path: '/tuteurs',
        component: TuteursIndex,
        name: 'tuteurs.index'
    },
    {
        path: '/tuteurs/create',
        component: TuteursCreate,
        name: 'tuteurs.create'
    },
    {
        path: '/tuteurs/:id',
        component: TuteursShow,
        name: 'tuteurs.show'
    },
    {
        path: '/tuteurs/:id/edit',
        component: TuteursEdit,
        name: 'tuteurs.edit'
    },
    {
        path: '/lienparentes',
        component: LienparentesIndex,
        name: 'lienparentes.index'
    },
    {
        path: '/lienparentes/create',
        component: LienparentesCreate,
        name: 'lienparentes.create'
    },
    {
        path: '/lienparentes/:id',
        component: LienparentesShow,
        name: 'lienparentes.show'
    },
    {
        path: '/lienparentes/:id/edit',
        component: LienparentesEdit,
        name: 'lienparentes.edit'
    },
    {
        path: '/communes',
        component: CommunesIndex,
        name: 'communes.index'
    },
    {
        path: '/communes/create',
        component: CommunesCreate,
        name: 'communes.create'
    },
    {
        path: '/communes/:id',
        component: CommunesShow,
        name: 'communes.show'
    },
    {
        path: '/communes/:id/edit',
        component: CommunesEdit,
        name: 'communes.edit'
    },
]

export default new VueRouter({
    mode: 'history',
    base: '/admin',
    routes
})
