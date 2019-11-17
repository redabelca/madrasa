@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

            <li>
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('quickadmin.qa_dashboard')</span>
                </a>
            </li>

            <li v-if="$can('preinscription_access')">
                <router-link :to="{ name: 'preinscriptions.index' }">
                    <i class="fa fa-gears"></i>
                    <span>@lang('quickadmin.preinscription.title')</span>
                </router-link>
            </li>
            <li v-if="$can('inscription_access')">
                <router-link :to="{ name: 'inscriptions.index' }">
                    <i class="fa fa-gears"></i>
                    <span>@lang('quickadmin.inscription.title')</span>
                </router-link>
            </li>
            <li class="treeview" v-if="$can('user_management_access')">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>@lang('quickadmin.user-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li v-if="$can('permission_access')">
                        <router-link :to="{ name: 'permissions.index' }">
                            <i class="fa fa-briefcase"></i>
                            <span>@lang('quickadmin.permissions.title')</span>
                        </router-link>
                    </li>
                    <li v-if="$can('role_access')">
                        <router-link :to="{ name: 'roles.index' }">
                            <i class="fa fa-briefcase"></i>
                            <span>@lang('quickadmin.roles.title')</span>
                        </router-link>
                    </li>
                    <li v-if="$can('user_access')">
                        <router-link :to="{ name: 'users.index' }">
                            <i class="fa fa-user"></i>
                            <span>@lang('quickadmin.users.title')</span>
                        </router-link>
                    </li>
                    <li v-if="$can('user_action_access')">
                        <router-link :to="{ name: 'user_actions.index' }">
                            <i class="fa fa-th-list"></i>
                            <span>@lang('quickadmin.user-actions.title')</span>
                        </router-link>
                    </li>
                </ul>
            </li>
            <li class="treeview" v-if="$can('parametre_access')">
                <a href="#">
                    <i class="fa fa-gear"></i>
                    <span>@lang('quickadmin.parametres.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li v-if="$can('anneescolaire_access')">
                        <router-link :to="{ name: 'anneescolaires.index' }">
                            <i class="fa fa-gears"></i>
                            <span>@lang('quickadmin.anneescolaire.title')</span>
                        </router-link>
                    </li>
                    <li class="treeview" v-if="$can('gestion_des_class_access')">
                        <a href="#">
                            <i class="fa fa-address-card"></i>
                            <span>@lang('quickadmin.gestion-des-classes.title')</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li v-if="$can('cycle_access')">
                                <router-link :to="{ name: 'cycles.index' }">
                                    <i class="fa fa-gears"></i>
                                    <span>@lang('quickadmin.cycle.title')</span>
                                </router-link>
                            </li>
                            <li v-if="$can('niveau_access')">
                                <router-link :to="{ name: 'niveaux.index' }">
                                    <i class="fa fa-gears"></i>
                                    <span>@lang('quickadmin.niveau.title')</span>
                                </router-link>
                            </li>
                            <li v-if="$can('branche_access')">
                                <router-link :to="{ name: 'branches.index' }">
                                    <i class="fa fa-gears"></i>
                                    <span>@lang('quickadmin.branche.title')</span>
                                </router-link>
                            </li>
                            <li v-if="$can('classe_access')">
                                <router-link :to="{ name: 'classes.index' }">
                                    <i class="fa fa-gears"></i>
                                    <span>@lang('quickadmin.classe.title')</span>
                                </router-link>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview" v-if="$can('transport_access')">
                        <a href="#">
                            <i class="fa fa-bus"></i>
                            <span>@lang('quickadmin.transport.title')</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li v-if="$can('quartier_access')">
                                <router-link :to="{ name: 'quartiers.index' }">
                                    <i class="fa fa-gears"></i>
                                    <span>@lang('quickadmin.quartier.title')</span>
                                </router-link>
                            </li>
                            <li v-if="$can('vehicule_access')">
                                <router-link :to="{ name: 'vehicules.index' }">
                                    <i class="fa fa-gears"></i>
                                    <span>@lang('quickadmin.vehicule.title')</span>
                                </router-link>
                            </li>
                            <li v-if="$can('circuit_access')">
                                <router-link :to="{ name: 'circuits.index' }">
                                    <i class="fa fa-gears"></i>
                                    <span>@lang('quickadmin.circuit.title')</span>
                                </router-link>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="treeview" v-if="$can('etudiant_access')">
                <a href="#">
                    <i class="fa fa-address-book-o"></i>
                    <span>@lang('quickadmin.etudiant.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li v-if="$can('eleve_access')">
                        <router-link :to="{ name: 'eleves.index' }">
                            <i class="fa fa-gears"></i>
                            <span>@lang('quickadmin.eleve.title')</span>
                        </router-link>
                    </li>
                    <li v-if="$can('famille_access')">
                        <router-link :to="{ name: 'familles.index' }">
                            <i class="fa fa-gears"></i>
                            <span>@lang('quickadmin.famille.title')</span>
                        </router-link>
                    </li>
                    <li v-if="$can('tuteur_access')">
                        <router-link :to="{ name: 'tuteurs.index' }">
                            <i class="fa fa-gears"></i>
                            <span>@lang('quickadmin.tuteur.title')</span>
                        </router-link>
                    </li>
                </ul>
            </li>
            {{-- <li v-if="$can('lienparente_access')">
                <router-link :to="{ name: 'lienparentes.index' }">
                    <i class="fa fa-gears"></i>
                    <span>@lang('quickadmin.lienparente.title')</span>
                </router-link>
            </li>
            <li v-if="$can('commune_access')">
                <router-link :to="{ name: 'communes.index' }">
                    <i class="fa fa-gears"></i>
                    <span>@lang('quickadmin.commune.title')</span>
                </router-link>
            </li> --}}

            <li>
                <router-link :to="{ name: 'auth.change_password' }">
                    <i class="fa fa-key"></i>
                    <span class="title">@lang('quickadmin.qa_change_password')</span>
                </router-link>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('quickadmin.qa_logout')</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
