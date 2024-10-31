<?php
/*
Plugin Name: Ramazan İmsakiyesi
Plugin URI: http://wordpress.org/extend/plugins/ramazan-imsakiyesi/
Description: Bu eklenti, Ramazan ayı boyunca, sitenizde il il İmsak (Sahur), Güneş, Öğle, İkindi, Akşam (İftar), Yatsı saatlerini gösterir.
Version: 2010.2
Author: Süleyman ÜSTÜN
Author URI: http://suleymanustun.com
*/

add_action("plugins_loaded", "ri_widget_create");

function ri_widget_create() {
	$options = array('classname' => 'ri_widget', 'description' => "Ramazan ayı boyunca, sitenizde il il İmsak (Sahur), Güneş, Öğle, İkindi, Akşam (İftar), Yatsı saatlerini gösterir." );
	wp_register_sidebar_widget('ri_widget', 'Ramazan İmsakiyesi', 'ri_widget_init', $options);
}

function ri_widget_init($args) {
	extract($args);
	echo $before_widget;
	echo $before_title.'Ramazan İmsakiyesi'.$after_title;
	ri_widget_show();
	echo $after_widget;
}

add_action('init', 'ri_init_method');

function ri_init_method() {
    wp_register_script('namaz', '/wp-content/plugins/ramazan-imsakiyesi/function.js');
	wp_enqueue_script('namaz');
}

function ri_widget_show() {	
	$citys = array('ADANA','ADIYAMAN','AFYON','AGRI','AKSARAY','AMASYA','ANKARA','ANTALYA','ARDAHAN','ARTVIN','AYDIN','BALIKESIR','BARTIN','BATMAN','BAYBURT','BILECIK','BINGOL','BITLIS','BOLU','BURDUR','BURSA','CANAKKALE','CANKIRI','CORUM','DENIZLI','DIYARBAKIR','DUZCE','EDIRNE','ELAZIG','ERZINCAN','ERZURUM','ESKISEHIR','GAZIANTEP','GIRESUN','GUMUSHANE','HAKKARI','HATAY','IGDIR','ISPARTA','ISTANBUL','IZMIR','KAHRAMANMARAS','KARABUK','KARAMAN','KARS','KASTAMONU','KAYSERI','KILIS','KIRIKKALE','KIRKLARELI','KIRSEHIR','KOCAELI','KONYA','KUTAHYA','MALATYA','MANISA','MARDIN','MERSIN','MUGLA','MUS','NEVSEHIR','NIGDE','ORDU','OSMANIYE','RIZE','SAKARYA','SAMSUN','SANLIURFA','SIIRT','SINOP','SIRNAK','SIVAS','TEKIRDAG','TOKAT','TRABZON','TUNCELI','USAK','VAN','YALOVA','YOZGAT','ZONGULDAK');
	echo '<select onchange="getTimes(this.options[this.selectedIndex].text)" style="width:100%">';
	echo '<option>ŞEHİR</option>';
	foreach ($citys as $city) {
		echo '<option>'.$city.'</option>';
	}
	echo '</select>';
	echo '<div id="namaz"></div>';
}

?>