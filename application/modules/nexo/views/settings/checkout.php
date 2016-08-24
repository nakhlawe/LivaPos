<?php

/**
 * Add support for Multi Store
 * @since 2.8
**/

global $store_id, $CurrentStore;

$option_prefix		=	'';

if( $store_id != null ) {
	$option_prefix	=	'store_' . $store_id . '_' ;
}

$this->Gui->col_width(1, 2);
$this->Gui->col_width(2, 2);

$this->Gui->add_meta(array(
    'namespace'        =>        'Nexo_checkout',
    'title'            =>        __('Réglages de la caisse', 'nexo'),
    'col_id'        =>        1,
    'gui_saver'        =>        true,
    'footer'        =>        array(
        'submit'    =>        array(
            'label'    =>        __('Sauvegarder les réglages', 'nexo')
        )
    ),
    'use_namespace'    =>        false,
));

$this->Gui->add_meta(array(
    'namespace'        =>        'Nexo_checkout2',
    'title'            =>        __('Réglages de la caisse', 'nexo'),
    'col_id'        =>        2,
    'gui_saver'        =>        true,
    'footer'        =>        array(
        'submit'    =>        array(
            'label'    =>        __('Sauvegarder les réglages', 'nexo')
        )
    ),
    'use_namespace'    =>        false,
));

$this->Gui->add_item(array(
    'type'        =>    'select',
    'name'        =>    $option_prefix . 'nexo_enable_vat',
    'label'        =>    __('Activer la TVA', 'nexo'),
    'options'    =>    array(
        'oui'        =>    __('Oui', 'nexo'),
        'non'        =>    __('Non', 'nexo')
    )
), 'Nexo_checkout', 1);

$this->Gui->add_item(array(
    'type'        =>    'select',
    'name'        =>    $option_prefix . 'nexo_enable_registers',
    'label'        =>    __('Utiliser les caisses enregistreuses', 'nexo'),
    'options'    =>    array(
        'oui'        =>    __('Oui', 'nexo'),
        'non'        =>    __('Non', 'nexo')
    )
), 'Nexo_checkout', 1);

$this->Gui->add_item(array(
    'type'        =>    'text',
    'label'        =>    __('Définir le taux de la TVA (%)', 'nexo'),
    'name'        =>    $option_prefix . 'nexo_vat_percent',
    'placeholder'    =>    __('Exemple : 20', 'nexo')
), 'Nexo_checkout', 1);

$this->Gui->add_item(array(
    'type'        =>    'dom',
    'content'    =>    '<h4>' . __('Configuration de la devise', 'nexo') . '</h4>'
), 'Nexo_checkout', 1);

$this->Gui->add_item(array(
    'type'        =>    'text',
    'name'        =>    $option_prefix . 'nexo_currency',
    'label'        =>    __('Symbole de la devise', 'nexo')
), 'Nexo_checkout', 1);

$this->Gui->add_item(array(
    'type'        =>    'text',
    'name'        =>    $option_prefix . 'nexo_currency_iso',
    'label'        =>    __('Format ISO de la devise', 'nexo')
), 'Nexo_checkout', 1);

$this->Gui->add_item(array(
    'type'        =>    'select',
    'name'        =>    $option_prefix . 'nexo_currency_position',
    'label'        =>    __('Position de la devise', 'nexo'),
    'options'    =>    array(
        'before'    =>    __('Avant le montant', 'nexo'),
        'after'        =>    __('Après le montant', 'nexo')
    )
), 'Nexo_checkout', 1);

$this->Gui->add_item(array(
    'type'        =>    'select',
    'name'        =>    $option_prefix . 'nexo_compact_enabled',
    'label'        =>    __('Activer le mode comptact', 'nexo'),
    'options'    =>    array(
		''		=>	__( 'Veuillez choisir une option', 'nexo' ),
        'no'    =>    __('Non', 'nexo'),
        'yes'        =>    __('Oui', 'nexo')
    ),
	'description'	=>	__( 'Permettra de masquer certains éléments inutiles sur l\'interface du point de vente.', 'nexo' )
), 'Nexo_checkout', 1);

$this->Gui->add_item(array(
    'type'        =>    'select',
    'name'        =>    $option_prefix . 'nexo_receipt_theme',
    'label'        =>    __('Thème des tickets de caisse', 'nexo'),
    'options'    =>    array(
        'default'    =>    __('Par défaut', 'nexo'),
    )
), 'Nexo_checkout2', 2);

/**
 * @since 2.3
**/

$this->Gui->add_item(array(
    'type'        =>    'select',
    'name'        =>    $option_prefix . 'nexo_enable_autoprint',
    'label'        =>    __('Activer l\'impression automatique des tickets de caisse ?', 'nexo'),
    'description'        =>    __('Par défaut vaut : "Non"', 'nexo'),
    'options'    =>    array(
        ''            =>    __('Veuillez choisir une option', 'nexo'),
        'yes'        =>    __('Oui', 'nexo'),
        'no'        =>    __('Non', 'nexo')
    )
), 'Nexo_checkout2', 2);

// @since 2.6.1

$this->Gui->add_item(array(
    'type'        =>    'select',
    'name'        =>    $option_prefix . 'nexo_enable_smsinvoice',
    'label'        =>    __('Envoyer une facture par SMS', 'nexo'),
    'description'        =>    __('Permet d\'envoyer une facture par SMS pour les commandes complètes aux clients enregistrés.', 'nexo'),
    'options'    =>    array(
        ''            =>    __('Veuillez choisir une option', 'nexo'),
        'yes'        =>    __('Oui', 'nexo'),
        'no'        =>    __('Non', 'nexo')
    )
), 'Nexo_checkout2', 2);

$this->Gui->add_item(array(
    'type'        =>    'select',
    'name'        =>    $option_prefix . 'nexo_enable_shadow_price',
    'label'        =>    __('Utiliser les prix fictif', 'nexo'),
    'description'        =>    __('Permet d\'afficher un prix fictif "discutable", qui ne doit pas être inférieure au prix de vente réel d\'un article.', 'nexo'),
    'options'    =>    array(
        ''            =>    __('Veuillez choisir une option', 'nexo'),
        'yes'        =>    __('Oui', 'nexo'),
        'no'        =>    __('Non', 'nexo')
    )
), 'Nexo_checkout2', 2);

$this->Gui->add_item(array(
    'type'        =>    'select',
    'name'        =>    $option_prefix . 'nexo_enable_numpad',
    'label'        =>    __('Activer le clavier numérique', 'nexo'),
    'options'    =>    array(
        'oui'        =>    __('Oui', 'nexo'),
        'non'        =>    __('Non', 'nexo')
    )
), 'Nexo_checkout2', 2);

$this->Gui->add_item(array(
    'type'        =>    'text',
    'label'        =>    __('Validité des commandes devis (en jours)', 'nexo'),
    'name'        =>    $option_prefix . 'nexo_devis_expiration',
    'placeholder'    =>    __('Par défaut: Illimité', 'nexo')
), 'Nexo_checkout2', 2);

$this->events->do_action('load_nexo_checkout_settings', $this->Gui);

$this->Gui->output();
