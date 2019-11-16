<?php

use Illuminate\Database\Seeder;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'title' => 'user_management_access',],
            ['id' => 2, 'title' => 'permission_access',],
            ['id' => 3, 'title' => 'permission_create',],
            ['id' => 4, 'title' => 'permission_edit',],
            ['id' => 5, 'title' => 'permission_view',],
            ['id' => 6, 'title' => 'permission_delete',],
            ['id' => 7, 'title' => 'role_access',],
            ['id' => 8, 'title' => 'role_create',],
            ['id' => 9, 'title' => 'role_edit',],
            ['id' => 10, 'title' => 'role_view',],
            ['id' => 11, 'title' => 'role_delete',],
            ['id' => 12, 'title' => 'user_access',],
            ['id' => 13, 'title' => 'user_create',],
            ['id' => 14, 'title' => 'user_edit',],
            ['id' => 15, 'title' => 'user_view',],
            ['id' => 16, 'title' => 'user_delete',],
            ['id' => 17, 'title' => 'user_action_access',],
            ['id' => 18, 'title' => 'parametre_access',],
            ['id' => 19, 'title' => 'etudiant_access',],
            ['id' => 20, 'title' => 'gestion_des_class_access',],
            ['id' => 21, 'title' => 'transport_access',],
            ['id' => 27, 'title' => 'anneescolaire_access',],
            ['id' => 28, 'title' => 'anneescolaire_create',],
            ['id' => 29, 'title' => 'anneescolaire_edit',],
            ['id' => 30, 'title' => 'anneescolaire_view',],
            ['id' => 31, 'title' => 'anneescolaire_delete',],
            ['id' => 32, 'title' => 'cycle_access',],
            ['id' => 33, 'title' => 'cycle_create',],
            ['id' => 34, 'title' => 'cycle_edit',],
            ['id' => 35, 'title' => 'cycle_view',],
            ['id' => 36, 'title' => 'cycle_delete',],
            ['id' => 37, 'title' => 'niveau_access',],
            ['id' => 38, 'title' => 'niveau_create',],
            ['id' => 39, 'title' => 'niveau_edit',],
            ['id' => 40, 'title' => 'niveau_view',],
            ['id' => 41, 'title' => 'niveau_delete',],
            ['id' => 42, 'title' => 'branche_access',],
            ['id' => 43, 'title' => 'branche_create',],
            ['id' => 44, 'title' => 'branche_edit',],
            ['id' => 45, 'title' => 'branche_view',],
            ['id' => 46, 'title' => 'branche_delete',],
            ['id' => 47, 'title' => 'classe_access',],
            ['id' => 48, 'title' => 'classe_create',],
            ['id' => 49, 'title' => 'classe_edit',],
            ['id' => 50, 'title' => 'classe_view',],
            ['id' => 51, 'title' => 'classe_delete',],
            ['id' => 52, 'title' => 'quartier_access',],
            ['id' => 53, 'title' => 'quartier_create',],
            ['id' => 54, 'title' => 'quartier_edit',],
            ['id' => 55, 'title' => 'quartier_view',],
            ['id' => 56, 'title' => 'quartier_delete',],
            ['id' => 57, 'title' => 'vehicule_access',],
            ['id' => 58, 'title' => 'vehicule_create',],
            ['id' => 59, 'title' => 'vehicule_edit',],
            ['id' => 60, 'title' => 'vehicule_view',],
            ['id' => 61, 'title' => 'vehicule_delete',],
            ['id' => 62, 'title' => 'circuit_access',],
            ['id' => 63, 'title' => 'circuit_create',],
            ['id' => 64, 'title' => 'circuit_edit',],
            ['id' => 65, 'title' => 'circuit_view',],
            ['id' => 66, 'title' => 'circuit_delete',],
            ['id' => 67, 'title' => 'famille_access',],
            ['id' => 68, 'title' => 'famille_create',],
            ['id' => 69, 'title' => 'famille_edit',],
            ['id' => 70, 'title' => 'famille_view',],
            ['id' => 71, 'title' => 'famille_delete',],
            ['id' => 72, 'title' => 'lienparente_access',],
            ['id' => 73, 'title' => 'lienparente_create',],
            ['id' => 74, 'title' => 'lienparente_edit',],
            ['id' => 75, 'title' => 'lienparente_view',],
            ['id' => 76, 'title' => 'lienparente_delete',],
            ['id' => 77, 'title' => 'commune_access',],
            ['id' => 78, 'title' => 'commune_create',],
            ['id' => 79, 'title' => 'commune_edit',],
            ['id' => 80, 'title' => 'commune_view',],
            ['id' => 81, 'title' => 'commune_delete',],
            ['id' => 82, 'title' => 'tuteur_access',],
            ['id' => 83, 'title' => 'tuteur_create',],
            ['id' => 84, 'title' => 'tuteur_edit',],
            ['id' => 85, 'title' => 'tuteur_view',],
            ['id' => 86, 'title' => 'tuteur_delete',],
            ['id' => 87, 'title' => 'eleve_access',],
            ['id' => 88, 'title' => 'eleve_create',],
            ['id' => 89, 'title' => 'eleve_edit',],
            ['id' => 90, 'title' => 'eleve_view',],
            ['id' => 91, 'title' => 'eleve_delete',],
            ['id' => 92, 'title' => 'preinscription_access',],
            ['id' => 93, 'title' => 'preinscription_create',],
            ['id' => 94, 'title' => 'preinscription_edit',],
            ['id' => 95, 'title' => 'preinscription_view',],
            ['id' => 96, 'title' => 'preinscription_delete',],
            ['id' => 97, 'title' => 'inscription_access',],
            ['id' => 98, 'title' => 'inscription_create',],
            ['id' => 99, 'title' => 'inscription_edit',],
            ['id' => 100, 'title' => 'inscription_view',],
            ['id' => 101, 'title' => 'inscription_delete',],

        ];

        foreach ($items as $item) {
            \App\Permission::create($item);
        }
    }
}
