<?php
// Collection

$this->db->insert('nexo_arrivages', array(
    'TITRE'            =>    __('Collection 1', 'nexo'),
    'DESCRIPTION'    =>    __('Collection spéciale pour vêtements d\'hiver', 'nexo'),
    'DATE_CREATION'    =>    date_now(),
    'AUTHOR'        =>    User::id(),
    'FOURNISSEUR_REF_ID'    =>    1
));

$this->db->insert('nexo_arrivages', array(
    'TITRE'            =>    __('Collection 2', 'nexo'),
    'DESCRIPTION'    =>    __('Collection spéciale pour vêtements d\'été', 'nexo'),
    'DATE_CREATION'    =>    date_now(),
    'AUTHOR'        =>    User::id(),
    'FOURNISSEUR_REF_ID'    =>    2
));

// Registers

$this->db->insert('nexo_registers', array(
    'NAME'            =>    __( 'Caisse A', 'nexo' ),
    'STATUS'            =>    'closed',
    'DATE_CREATION'    =>    date_now(),
    'AUTHOR'        	=>    User::id(),
));

$this->db->insert('nexo_registers', array(
    'NAME'            =>    __( 'Caisse B', 'nexo' ),
    'STATUS'            =>    'closed',
    'DATE_CREATION'    =>    date_now(),
    'AUTHOR'        	=>    User::id(),
));

$this->db->insert('nexo_registers', array(
    'NAME'            =>    __( 'Caisse C', 'nexo' ),
    'STATUS'            =>    'locked',
    'DATE_CREATION'    =>    date_now(),
    'AUTHOR'        	=>    User::id(),
));

// Fournisseurs

$this->db->insert('nexo_fournisseurs', array(
    'NOM'            =>    __('Fournisseurs 1', 'nexo'),
    'EMAIL'            =>    'vendor@tendoo.org',
    'DATE_CREATION'    =>    date_now(),
    'AUTHOR'        =>    User::id(),
));

$this->db->insert('nexo_fournisseurs', array(
    'NOM'            =>    __('Fournisseurs 2', 'nexo'),
    'EMAIL'            =>    'vendor@tendoo.org',
    'DATE_CREATION'    =>    date_now(),
    'AUTHOR'        =>    User::id(),
));

$this->db->insert('nexo_fournisseurs', array(
    'NOM'            =>    __('Fournisseurs 3', 'nexo'),
    'EMAIL'            =>    'vendor@tendoo.org',
    'DATE_CREATION'    =>    date_now(),
    'AUTHOR'        =>    User::id(),
));

$this->db->insert('nexo_fournisseurs', array(
    'NOM'            =>    __('Fournisseurs 4', 'nexo'),
    'EMAIL'            =>    'vendor@tendoo.org',
    'DATE_CREATION'    =>    date_now(),
    'AUTHOR'        =>    User::id(),
));

// Rayons création

$this->db->insert('nexo_rayons', array(
    'TITRE'            =>    __('Hommes', 'nexo'),
    'DESCRIPTION'    =>    __('Rayon des hommes', 'nexo'),
    'DATE_CREATION'    =>    date_now(),
    'AUTHOR'        =>    User::id()
));

$this->db->insert('nexo_rayons', array(
    'TITRE'            =>    __('Femmes', 'nexo'),
    'DESCRIPTION'    =>    __('Rayon des Femmes', 'nexo'),
    'DATE_CREATION'    =>    date_now(),
    'AUTHOR'        =>    User::id()
));

$this->db->insert('nexo_rayons', array(
    'TITRE'            =>    __('Enfants', 'nexo'),
    'DESCRIPTION'    =>    __('Rayon des enfants', 'nexo'),
    'DATE_CREATION'    =>    date_now(),
    'AUTHOR'        =>    User::id()
));

$this->db->insert('nexo_rayons', array(
    'TITRE'            =>    __('Cadeaux', 'nexo'),
    'DESCRIPTION'    =>    __('Rayon des cadeaux', 'nexo'),
    'DATE_CREATION'    =>    date_now(),
    'AUTHOR'        =>    User::id()
));

// Creation des catégories
$this->db->insert('nexo_categories', array(
    'NOM'            	=>    __('Vêtements', 'nexo'),
    'DESCRIPTION'    	=>    __('Catégorie vêtements', 'nexo'),
    'AUTHOR'        	=>    User::id(),
    'DATE_CREATION'    	=>    date_now()
));

$this->db->insert('nexo_categories', array(
    'NOM'            	=>    __('Musique', 'nexo'),
    'DESCRIPTION'    	=>    __('Catégorie musique', 'nexo'),
    'AUTHOR'        	=>    User::id(),
    'DATE_CREATION'    	=>    date_now()
));

$this->db->insert('nexo_categories', array(
    'NOM'            	=>    __('Restaurant', 'nexo'),
    'DESCRIPTION'    	=>    __('Catégorie restaurant', 'nexo'),
    'AUTHOR'        	=>    User::id(),
    'DATE_CREATION'    	=>    date_now()
));

// Sub categories

$this->db->insert('nexo_categories', array(
    'NOM'            =>        __('Hommes', 'nexo'),
    'DESCRIPTION'    =>        __('Catégorie pour articles d\'hommes.', 'nexo'),
    'AUTHOR'        =>        User::id(),
    'DATE_CREATION'    =>        date_now(),
	'PARENT_REF_ID'	=>	1, // Catégorie parent Vêtements
));

$this->db->insert('nexo_categories', array(
    'NOM'            =>        __('Femmes', 'nexo'),
    'DESCRIPTION'    =>        __('Catégorie pour articles de femmes.', 'nexo'),
    'AUTHOR'        =>        User::id(),
    'DATE_CREATION'    =>        date_now(),
	'PARENT_REF_ID'	=>	1, // Catégorie parent Vêtements
));

$this->db->insert('nexo_categories', array(
    'NOM'            =>        __('Enfants', 'nexo'),
    'DESCRIPTION'    =>        __('Catégorie pour articles pour enfants.', 'nexo'),
    'AUTHOR'        =>        User::id(),
    'DATE_CREATION'    =>        date_now(),
	'PARENT_REF_ID'	=>	1, // Catégorie parent Vêtements
));

$this->db->insert('nexo_categories', array(
    'NOM'            =>        __('Cadeaux', 'nexo'),
    'DESCRIPTION'    =>        __('Catégorie pour articles en cadeaux.', 'nexo'),
    'AUTHOR'        =>        User::id(),
    'DATE_CREATION'    =>        date_now(),
	'PARENT_REF_ID'	=>	1, // Catégorie parent Vêtements
));

// Music
$this->db->insert('nexo_categories', array(
    'NOM'            =>        __('Rock', 'nexo'),
    'DESCRIPTION'    =>        __('Catégorie pour CD de Rock.', 'nexo'),
    'AUTHOR'        =>        User::id(),
    'DATE_CREATION'    =>        date_now(),
	'PARENT_REF_ID'	=>	2, // Catégorie parent Musique
));

$this->db->insert('nexo_categories', array(
    'NOM'            =>        __('RnB', 'nexo'),
    'DESCRIPTION'    =>        __('Catégorie pour CD de RnB.', 'nexo'),
    'AUTHOR'        =>        User::id(),
    'DATE_CREATION'    =>        date_now(),
	'PARENT_REF_ID'	=>	2, // Catégorie parent Musique
));

$this->db->insert('nexo_categories', array(
    'NOM'            =>        __('Jazz', 'nexo'),
    'DESCRIPTION'    =>        __('Catégorie pour CD de Jazz.', 'nexo'),
    'AUTHOR'        =>        User::id(),
    'DATE_CREATION'    =>        date_now(),
	'PARENT_REF_ID'	=>	2, // Catégorie parent Musique
));

$this->db->insert('nexo_categories', array(
    'NOM'            =>        __('Pop', 'nexo'),
    'DESCRIPTION'    =>        __('Catégorie pour CD de Pop.', 'nexo'),
    'AUTHOR'        =>        User::id(),
    'DATE_CREATION'    =>        date_now(),
	'PARENT_REF_ID'	=>	2, // Catégorie parent Musique
));

// Products 1

$this->db->insert('nexo_articles', array(
    'DESIGN'            =>        __('Article 1', 'nexo'),
    'REF_RAYON'            =>        1, // Hommes
    'REF_SHIPPING'        =>        1, // Sample Shipping
    'REF_CATEGORIE'        =>        1, // Hommes
    'QUANTITY'            =>        80550,
    'SKU'                =>        'UGS1',
    'QUANTITE_RESTANTE'    =>    80550,
    'QUANTITE_VENDU'    =>    0,
    'DEFECTUEUX'        =>    0,
    'PRIX_DACHAT'        =>    65, // $
    'PRIX_DE_VENTE'        =>    100,
	'SHADOW_PRICE'			=>	130,
    'TAUX_DE_MARGE'        =>    ((100 - (65 + 5)) / 65) * 100,
    'FRAIS_ACCESSOIRE'    =>    5, // $
    'COUT_DACHAT'        =>    65 + 5, // PA + FA
    'TAILLE'            =>    38, // Pouce
    'POIDS'                =>    300, //g
    'COULEUR'            =>    __('Rouge', 'nexo'),
    'HAUTEUR'            =>    25, // cm
    'LARGEUR'            =>    8, // cm
    'AUTHOR'            =>    User::id(),
    'DATE_CREATION'        =>    date_now(),
    'APERCU'            =>    '../modules/nexo/images/produit-1.jpg',
    'CODEBAR'            =>    147852,
	'STOCK_ENABLED'		=>	1,
	'TYPE'				=>	1,
	'STATUS'			=>	1
));

// Produits 2

$this->db->insert('nexo_articles', array(
    'DESIGN'            =>        __('Article 2', 'nexo'),
    'REF_RAYON'            =>        4, // cadeaux
    'REF_SHIPPING'        =>        1, // Sample Shipping
    'REF_CATEGORIE'        =>        4, // cadeaux
    'QUANTITY'            =>        6058,
    'SKU'                =>        'UGS2',
    'QUANTITE_RESTANTE'    =>    6058,
    'QUANTITE_VENDU'    =>    0,
    'DEFECTUEUX'        =>    0,
    'PRIX_DACHAT'        =>    10, // $
    'PRIX_DE_VENTE'        =>    15,
	'SHADOW_PRICE'			=>	30,
    'TAUX_DE_MARGE'        =>    ((15 - (10 + 3)) / 10) * 100,
    'FRAIS_ACCESSOIRE'    =>    3, // $
    'COUT_DACHAT'        =>    10 + 3, // PA + FA
    'POIDS'                =>    10, //g
    'COULEUR'            =>    __('Jaune', 'nexo'),
    'HAUTEUR'            =>    3, // cm
    'LARGEUR'            =>    1, // cm
    'AUTHOR'            =>    User::id(),
    'DATE_CREATION'        =>    date_now(),
    'APERCU'            =>    '../modules/nexo/images/produit-2.jpg',
    'CODEBAR'            =>    258741,
	'STOCK_ENABLED'		=>	1,
	'TYPE'				=>	1,
	'STATUS'			=>	1
));

// Produits 3

$this->db->insert('nexo_articles', array(
    'DESIGN'            =>        __('Article 3', 'nexo'),
    'REF_RAYON'            =>        3, // Enfants
    'REF_SHIPPING'        =>        1, // Sample Shipping
    'REF_CATEGORIE'        =>        3, // Enfants
    'QUANTITY'            =>        8000,
    'SKU'                =>        'UGS3',
    'QUANTITE_RESTANTE'    =>    7000,
    'DEFECTUEUX'        =>    1000,
    'PRIX_DACHAT'        =>    100, // $
    'PRIX_DE_VENTE'        =>    150,
	'SHADOW_PRICE'			=>	180,
    'TAUX_DE_MARGE'        =>    ((150 - (100 + 20)) / 100) * 100,
    'FRAIS_ACCESSOIRE'    =>    20, // $
    'COUT_DACHAT'        =>    100 + 20, // PA + FA
    'POIDS'                =>    10, //g
    'COULEUR'            =>    __('Bleu', 'nexo'),
    'HAUTEUR'            =>    3, // cm
    'LARGEUR'            =>    1, // cm
    'AUTHOR'            =>    User::id(),
    'DATE_CREATION'        =>    date_now(),
    'APERCU'            =>    '../modules/nexo/images/produit-3.jpg',
    'CODEBAR'            =>    258963,
	'STOCK_ENABLED'		=>	1,
	'TYPE'				=>	1,
	'STATUS'			=>	1
));

// Produits 4

$this->db->insert('nexo_articles', array(
    'DESIGN'            =>        __('Article 4', 'nexo'),
    'REF_RAYON'            =>        2, // Femmes
    'REF_SHIPPING'        =>        1, // Sample Shipping
    'REF_CATEGORIE'        =>        2, // Hommes
    'QUANTITY'            =>        30000,
    'SKU'                =>        'UGS4',
    'QUANTITE_RESTANTE'    =>    30000,
    'QUANTITE_VENDU'    =>    0,
    'DEFECTUEUX'        =>    0,
    'PRIX_DACHAT'        =>    120, // $
	'SHADOW_PRICE'			=>	150,
    'PRIX_DE_VENTE'        =>    190,
    'TAUX_DE_MARGE'        =>    ((190 - (120 + 20)) / 120) * 100,
    'FRAIS_ACCESSOIRE'    =>    20, // $
    'COUT_DACHAT'        =>    120 + 20, // PA + FA
    'POIDS'                =>    10, //g
    'COULEUR'            =>    __('Rose', 'nexo'),
    'HAUTEUR'            =>    3, // cm
    'LARGEUR'            =>    1, // cm
    'AUTHOR'            =>    User::id(),
    'DATE_CREATION'        =>    date_now(),
    'APERCU'            =>    '../modules/nexo/images/produit-4.jpg',
    'CODEBAR'            =>    369852,
	'STOCK_ENABLED'		=>	1,
	'TYPE'				=>	1,
	'STATUS'			=>	1
));

$this->db->insert('nexo_articles', array(
    'DESIGN'            =>        __('Article 5', 'nexo'),
    'REF_RAYON'            =>        2, // Femmes
    'REF_SHIPPING'        =>        1, // Sample Shipping
    'REF_CATEGORIE'        =>        2, // Hommes
    'QUANTITY'            =>        30000,
    'SKU'                =>        'UGS5',
    'QUANTITE_RESTANTE'    =>    30000,
    'QUANTITE_VENDU'    =>    0,
    'DEFECTUEUX'        =>    0,
    'PRIX_DACHAT'        =>    120, // $
    'PRIX_DE_VENTE'        =>    190,
	'SHADOW_PRICE'			=>	200,
    'TAUX_DE_MARGE'        =>    ((190 - (120 + 20)) / 120) * 100,
    'FRAIS_ACCESSOIRE'    =>    20, // $
    'COUT_DACHAT'        =>    120 + 20, // PA + FA
    'POIDS'                =>    10, //g
    'COULEUR'            =>    __('Noir', 'nexo'),
    'HAUTEUR'            =>    3, // cm
    'LARGEUR'            =>    1, // cm
    'AUTHOR'            =>    User::id(),
    'DATE_CREATION'        =>    date_now(),
    'APERCU'            =>    '../modules/nexo/images/produit-5.jpg',
    'CODEBAR'            =>    987456,
	'STOCK_ENABLED'		=>	1,
	'TYPE'				=>	1,
	'STATUS'			=>	1
));

$this->db->insert('nexo_articles', array(
    'DESIGN'            =>        __('Article 6', 'nexo'),
    'REF_RAYON'            =>        2, // Femmes
    'REF_SHIPPING'        =>        1, // Sample Shipping
    'REF_CATEGORIE'        =>        2, // Hommes
    'QUANTITY'            =>        155000,
    'SKU'                =>        'UGS6',
    'QUANTITE_RESTANTE'    =>    155000,
    'QUANTITE_VENDU'    =>    0,
    'DEFECTUEUX'        =>    0,
    'PRIX_DACHAT'        =>    80, // $
    'PRIX_DE_VENTE'        =>    120,
	'SHADOW_PRICE'			=>	155,
    'TAUX_DE_MARGE'        =>    ((120 - (80 + 20)) / 80) * 100,
    'FRAIS_ACCESSOIRE'    =>    20, // $
    'COUT_DACHAT'        =>    80 + 20, // PA + FA
    'POIDS'                =>    8, //g
    'COULEUR'            =>    __('Noir', 'nexo'),
    'HAUTEUR'            =>    3, // cm
    'LARGEUR'            =>    1, // cm
    'AUTHOR'            =>    User::id(),
    'DATE_CREATION'        =>    date_now(),
    'APERCU'            =>    '../modules/nexo/images/produit-6.jpg',
    'CODEBAR'            =>    781124,
	'STOCK_ENABLED'		=>	1,
	'TYPE'				=>	1,
	'STATUS'			=>	1
));

$this->db->insert('nexo_articles', array(
    'DESIGN'            =>        __('Article 7', 'nexo'),
    'REF_RAYON'            =>        2, // Femmes
    'REF_SHIPPING'        =>        1, // Sample Shipping
    'REF_CATEGORIE'        =>        2, // Hommes
    'QUANTITY'            =>        10005,
    'SKU'                =>        'UGS7',
    'QUANTITE_RESTANTE'    =>    10005,
    'QUANTITE_VENDU'    =>    0,
    'DEFECTUEUX'        =>    0,
    'PRIX_DACHAT'        =>    80, // $
    'PRIX_DE_VENTE'        =>    120,
	'SHADOW_PRICE'			=>	150,
    'TAUX_DE_MARGE'        =>    ((120 - (80 + 20)) / 80) * 100,
    'FRAIS_ACCESSOIRE'    =>    20, // $
    'COUT_DACHAT'        =>    80 + 20, // PA + FA
    'POIDS'                =>    8, //g
    'COULEUR'            =>    __('Cyan', 'nexo'),
    'HAUTEUR'            =>    3, // cm
    'LARGEUR'            =>    1, // cm
    'AUTHOR'            =>    User::id(),
    'DATE_CREATION'        =>    date_now(),
    'APERCU'            =>    '../modules/nexo/images/produit-7.jpg',
    'CODEBAR'            =>    789654,
	'STOCK_ENABLED'		=>	1,
	'TYPE'				=>	1,
	'STATUS'			=>	1
));

$this->db->insert('nexo_articles', array(
    'DESIGN'            =>        __('Article 8', 'nexo'),
    'REF_RAYON'            =>        2, // Femmes
    'REF_SHIPPING'        =>        1, // Sample Shipping
    'REF_CATEGORIE'        =>        2, // Hommes
    'QUANTITY'            =>        15000,
    'SKU'                =>        'UGS8',
    'QUANTITE_RESTANTE'    =>    15000,
    'QUANTITE_VENDU'    =>    0,
    'DEFECTUEUX'        =>    0,
    'PRIX_DACHAT'        =>    120, // $
    'PRIX_DE_VENTE'        =>    300,
	'SHADOW_PRICE'			=>	350,
    'TAUX_DE_MARGE'        =>    ((300 - (120 + 20)) / 120) * 100,
    'FRAIS_ACCESSOIRE'    =>    15, // $
    'COUT_DACHAT'        =>    120 + 15, // PA + FA
    'POIDS'                =>    8, //g
    'COULEUR'            =>    __('Jaune', 'nexo'),
    'HAUTEUR'            =>    3, // cm
    'LARGEUR'            =>    1, // cm
    'AUTHOR'            =>    User::id(),
    'DATE_CREATION'        =>    date_now(),
    'APERCU'            =>    '../modules/nexo/images/produit-8.jpg',
    'CODEBAR'            =>    456987,
	'STOCK_ENABLED'		=>	1,
	'TYPE'				=>	1,
	'STATUS'			=>	1
));

$this->db->insert('nexo_articles', array(
    'DESIGN'            =>        __('Article 9', 'nexo'),
    'REF_RAYON'            =>        2, // Femmes
    'REF_SHIPPING'        =>        1, // Sample Shipping
    'REF_CATEGORIE'        =>        2, // Hommes
    'QUANTITY'            =>        8000,
    'SKU'                =>        'UGS9',
    'QUANTITE_RESTANTE'    =>    8000,
    'QUANTITE_VENDU'    =>    0,
    'DEFECTUEUX'        =>    0,
    'PRIX_DACHAT'        =>    120, // $
    'PRIX_DE_VENTE'        =>    300,
	'SHADOW_PRICE'			=>	345,
    'TAUX_DE_MARGE'        =>    ((300 - (120 + 20)) / 120) * 100,
    'FRAIS_ACCESSOIRE'    =>    15, // $
    'COUT_DACHAT'        =>    120 + 15, // PA + FA
    'POIDS'                =>    8, //g
    'COULEUR'            =>    __('Jaune', 'nexo'),
    'HAUTEUR'            =>    3, // cm
    'LARGEUR'            =>    1, // cm
    'AUTHOR'            =>    User::id(),
    'DATE_CREATION'        =>    date_now(),
    'APERCU'            =>    '../modules/nexo/images/produit-9.jpg',
    'CODEBAR'            =>    874569,
	'STOCK_ENABLED'		=>	1,
	'TYPE'				=>	1,
	'STATUS'			=>	1
));

$this->db->insert('nexo_articles', array(
    'DESIGN'            =>        __('Article 10', 'nexo'),
    'REF_RAYON'            =>        2, // Femmes
    'REF_SHIPPING'        =>        1, // Sample Shipping
    'REF_CATEGORIE'        =>        2, // Hommes
    'QUANTITY'            =>        9000,
    'SKU'                =>        'UGS10',
    'QUANTITE_RESTANTE'    =>    9000,
    'QUANTITE_VENDU'    =>    0,
    'DEFECTUEUX'        =>    0,
    'PRIX_DACHAT'        =>    120, // $
    'PRIX_DE_VENTE'        =>    300,
	'SHADOW_PRICE'			=>	330,
    'TAUX_DE_MARGE'        =>    ((300 - (120 + 20)) / 120) * 100,
    'FRAIS_ACCESSOIRE'    =>    15, // $
    'COUT_DACHAT'        =>    120 + 15, // PA + FA
    'POIDS'                =>    8, //g
    'COULEUR'            =>    __('Jaune', 'nexo'),
    'HAUTEUR'            =>    3, // cm
    'LARGEUR'            =>    1, // cm
    'AUTHOR'            =>    User::id(),
    'DATE_CREATION'        =>    date_now(),
    'APERCU'            =>    '../modules/nexo/images/produit-10.jpg',
    'CODEBAR'            =>    896547
));

$this->db->insert('nexo_articles', array(
    'DESIGN'            =>        __('Earl Klugh(CD)', 'nexo'),
    'REF_RAYON'            =>        2, // Femmes
    'REF_SHIPPING'        =>        1, // Sample Shipping
    'REF_CATEGORIE'        =>        10, // Jazz
    'QUANTITY'            =>        80000,
    'SKU'                =>        'EKBF',
    'QUANTITE_RESTANTE'    =>    80000,
    'QUANTITE_VENDU'    =>    0,
    'DEFECTUEUX'        =>    0,
    'PRIX_DACHAT'        =>    20, // $
    'PRIX_DE_VENTE'        =>    35,
	'SHADOW_PRICE'			=>	40,
    'TAUX_DE_MARGE'        =>    ((35 - (20 + 20)) / 20) * 100,
    'FRAIS_ACCESSOIRE'    =>    15, // $
    'COUT_DACHAT'        =>    120 + 15, // PA + FA
    'POIDS'                =>    8, //g
    'COULEUR'            =>    __('Black Pocket', 'nexo'),
    'HAUTEUR'            =>    3, // cm
    'LARGEUR'            =>    1, // cm
    'AUTHOR'            =>    User::id(),
    'DATE_CREATION'        =>    date_now(),
    'APERCU'            =>    '../modules/nexo/images/produit-9.jpg',
    'CODEBAR'            =>    877774,
	'STOCK_ENABLED'		=>	2,
	'TYPE'				=>	2,
	'STATUS'			=>	1
));

// Clients

$this->db->query("INSERT INTO `{$this->db->dbprefix}nexo_clients` (`ID`, `NOM`, `PRENOM`, `POIDS`, `TEL`, `EMAIL`, `DESCRIPTION`, `DATE_NAISSANCE`, `ADRESSE`, `NBR_COMMANDES`, `DISCOUNT_ACTIVE`) VALUES
(1, '". __('Compte Client', 'nexo')    ."', 	'', 0, 0, 'user@tendoo.org', 				'', '0000-00-00 00:00:00', '', 0, 0),
(2, '". __('John Doe', 'nexo')        ."', 	'', 0, 0, 'johndoe@tendoo.org', 				'',	'0000-00-00 00:00:00', '', 0, 0),
(3, '". __('Jane Doe', 'nexo')        ."', 	'', 0, 0, 'janedoe@tendoo.org', 				'',	'0000-00-00 00:00:00', '', 0, 0),
(4, '". __('Blair Jersyer', 'nexo')    ."', 	'', 0, 0, 'carlosjohnsonluv2004@gmail.com', 	'',	'0000-00-00 00:00:00', '', 0, 0);");

// Options
$this->load->model('Options');

$this->options        =    new Options;

$this->options->set('nexo_currency', '$', true);

$this->options->set('nexo_currency_iso', 'USD', true);

$this->options->set('nexo_currency_position', 'before', true);

$this->options->set('nexo_enable_sound', 'enable');

// Disabling discount
$this->options->set('discount_type', 'disable', true);
