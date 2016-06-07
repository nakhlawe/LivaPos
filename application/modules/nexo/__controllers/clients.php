<?php
class Nexo_Clients extends CI_Model
{
    public function __construct($args)
    {
        parent::__construct();
        if (is_array($args) && count($args) > 1) {
            if (method_exists($this, $args[1])) {
                return call_user_func_array(array( $this, $args[1] ), array_slice($args, 2));
            } else {
                return $this->defaults();
            }
        }
        return $this->defaults();
    }

    public function crud_header()
    {
        if (
            ! User::can('create_shop_customers')  &&
            ! User::can('edit_shop_customers') &&
            ! User::can('delete_shop_customers')
        ) {
            redirect(array( 'dashboard', 'access-denied' ));
        }

        $crud = new grocery_CRUD();
        $crud->set_subject(__('Clients', 'nexo'));
        $crud->set_table($this->db->dbprefix('nexo_clients'));
        $crud->set_theme('bootstrap');
        $crud->columns('REF_GROUP', 'NOM', 'PRENOM', 'OVERALL_COMMANDES', 'TEL', 'EMAIL');
        $crud->fields('REF_GROUP', 'NOM', 'PRENOM', 'EMAIL', 'TAILLE', 'PREFERENCE', 'TEL', 'DATE_NAISSANCE', 'ADRESSE', 'DESCRIPTION');

        $crud->display_as('NOM', __('Nom du client', 'nexo'));
        $crud->display_as('EMAIL', __('Email du client', 'nexo'));
        $crud->display_as('OVERALL_COMMANDES', __('Achats effectués', 'nexo'));
        $crud->display_as('NBR_COMMANDES', __('Nbr Commandes (sess courante)', 'nexo'));
        $crud->display_as('TEL', __('Téléphone du client', 'nexo'));
        $crud->display_as('PRENOM', __('Prénom du client', 'nexo'));
        $crud->display_as('PREFERENCE', __('Préférence du client', 'nexo'));
        $crud->display_as('DATE_NAISSANCE', __('Date de naissance', 'nexo'));
        $crud->display_as('ADRESSE', __('Adresse', 'nexo'));
        $crud->display_as('TAILLE', __('Taille', 'nexo'));
        $crud->display_as('DESCRIPTION', __('Description', 'nexo'));
        $crud->display_as('REF_GROUP', __('Groupe', 'nexo'));
        
        // XSS Cleaner
        $this->events->add_filter('grocery_callback_insert', array( $this->grocerycrudcleaner, 'xss_clean' ));
        $this->events->add_filter('grocery_callback_update', array( $this->grocerycrudcleaner, 'xss_clean' ));

        $crud->required_fields('NOM', 'REF_GROUP');
        $crud->set_relation('REF_GROUP', 'nexo_clients_groups', 'NAME');
        
        $crud->set_rules('EMAIL', __('Email', 'nexo'), 'valid_email');

        $crud->unset_jquery();
        $output = $crud->render();

        foreach ($output->js_files as $files) {
            $this->enqueue->js(substr($files, 0, -3), '');
        }
        foreach ($output->css_files as $files) {
            $this->enqueue->css(substr($files, 0, -4), '');
        }

        return $output;
    }

    public function lists($page = 'index', $id = null)
    {
        if ($page == 'index') {
            $this->Gui->set_title(__('Liste des clients &mdash; Nexo', 'nexo'));
        } elseif ($page == 'delete') {
            nexo_permission_check('delete_shop_customers');
            
            // Checks whether an item is in use before delete
            nexo_availability_check($id, array(
                array( 'col'    =>    'REF_CLIENT', 'table'    =>    'nexo_commandes' )
            ));
        } else {
            $this->Gui->set_title(__('Liste des clients &mdash; Nexo', 'nexo'));
        }
        
        $data[ 'crud_content' ]    =    $this->crud_header();
        $_var1                    =    'clients';
        $this->load->view('../modules/nexo/views/' . $_var1 . '-list.php', $data);
    }

    public function add()
    {
        if (! User::can('create_shop_customers')) {
            redirect(array( 'dashboard', 'access-denied' ));
        }
        
        $data[ 'crud_content' ]    =    $this->crud_header();
        $_var1                    =    'clients';
        $this->Gui->set_title(__('Ajouter un nouveau client &mdash; Nexo', 'nexo'));
        $this->load->view('../modules/nexo/views/' . $_var1 . '-list.php', $data);
    }

    /**
     * User Groups header
     *
    **/

    public function groups_header()
    {
        if (
            ! User::can('create_shop_customers_groups')  &&
            ! User::can('edit_shop_customers_groups') &&
            ! User::can('delete_shop_customers_groups')
        ) {
            redirect(array( 'dashboard', 'access-denied' ));
        }

        $crud = new grocery_CRUD();
        $crud->set_subject(__('Groupes d\'utilisateurs', 'nexo'));
        $crud->set_table($this->db->dbprefix('nexo_clients_groups'));
        $crud->set_theme('bootstrap');

        $crud->columns('NAME', 'AUTHOR', 'DISCOUNT_TYPE', 'DISCOUNT_PERCENT', 'DISCOUNT_AMOUNT', 'DATE_CREATION', 'DATE_MODIFICATION');
        $crud->fields('NAME', 'DISCOUNT_TYPE', 'DISCOUNT_PERCENT', 'DISCOUNT_AMOUNT', 'DISCOUNT_ENABLE_SCHEDULE', 'DISCOUNT_START', 'DISCOUNT_END', 'DESCRIPTION',  'AUTHOR', 'DATE_CREATION', 'DATE_MODIFICATION');

        $crud->display_as('NAME', __('Nom', 'nexo'));
        $crud->display_as('DESCRIPTION', __('Description', 'nexo'));
        $crud->display_as('AUTHOR', __('Auteur', 'nexo'));
        $crud->display_as('DATE_CREATION', __('Date de création', 'nexo'));
        $crud->display_as('DISCOUNT_TYPE', __('Type de remise', 'nexo'));
        $crud->display_as('DISCOUNT_PERCENT', __('Pourcentage de remise (Sans "%")', 'nexo'));
        $crud->display_as('DISCOUNT_AMOUNT', __('Montant de la remise', 'nexo'));
        $crud->display_as('DISCOUNT_ENABLE_SCHEDULE', __('Activer la planification', 'nexo'));
        $crud->display_as('DISCOUNT_START', __('Début de la planification', 'nexo'));
        $crud->display_as('DISCOUNT_END', __('Fin de la planification', 'nexo'));
        $crud->display_as('DATE_MODIFICATION', __('Date de modification', 'nexo'));
        
        $crud->set_relation('AUTHOR', 'aauth_users', 'name');
        
        // Load Field Type
        $crud->field_type('DISCOUNT_TYPE', 'dropdown', $this->config->item('nexo_discount_type'));
        $crud->field_type('DISCOUNT_ENABLE_SCHEDULE', 'dropdown', $this->config->item('nexo_true_false'));

        // Callback avant l'insertion
        $crud->callback_before_insert(array( $this, '__group_insert' ));
        $crud->callback_before_update(array( $this, '__group_update' ));
        
        // XSS Cleaner
        $this->events->add_filter('grocery_callback_insert', array( $this->grocerycrudcleaner, 'xss_clean' ));
        $this->events->add_filter('grocery_callback_update', array( $this->grocerycrudcleaner, 'xss_clean' ));

        // Field Visibility
        $crud->change_field_type('DATE_CREATION', 'invisible');
        $crud->change_field_type('DATE_MODIFICATION', 'invisible');
        $crud->change_field_type('AUTHOR', 'invisible');

        $crud->required_fields('NAME', 'DISCOUNT_TYPE');

        $crud->unset_jquery();
        $output = $crud->render();

        foreach ($output->js_files as $files) {
            $this->enqueue->js(substr($files, 0, -3), '');
        }
        foreach ($output->css_files as $files) {
            $this->enqueue->css(substr($files, 0, -4), '');
        }

        return $output;
    }

    /**
     * Groups
    **/

    public function groups($page = 'index', $id = null)
    {
        if ($page == 'index') {
            $this->Gui->set_title(__('Groupes &mdash; Nexo', 'nexo'));
        } elseif ($page == 'delete') {
            nexo_permission_check('delete_shop_customers_groups');
            
            // Checks whether an item is in use before delete
            nexo_availability_check($id, array(
                array( 'col'    =>    'REF_GROUP', 'table'    =>    'nexo_clients' )
            ));
        } else {
            $this->Gui->set_title(__('Ajouter/Modifier un groupe de clients &mdash; Nexo', 'nexo'));
        }
        
        $data[ 'crud_content' ]    =    $this->groups_header();
        $this->load->view('../modules/nexo/views/user-groups.php', $data);
    }

    /**
     * Callback
    **/

    public function __group_insert($data)
    {
        $data[ 'DATE_CREATION' ]    =    date_now();
        $data[ 'AUTHOR' ]            =    User::id();
        return $data;
    }

    public function __group_update($data)
    {
        $data[ 'DATE_MODIFICATION' ]    =    date_now();
        $data[ 'AUTHOR' ]                =    User::id();
        return $data;
    }

    public function defaults()
    {
        $this->lists();
    }
}
new Nexo_Clients($this->args);
