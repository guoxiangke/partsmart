<?php

function partsmart_preprocess_page(&$vars, $hook) {
    $body_classes = array($vars['body_classes']);

    if (user_access('administer blocks')) {
        $body_classes[] = 'admin';
    }
    if (theme_get_setting('basic_wireframe')) {
        $body_classes[] = 'with-wireframes'; // Optionally add the wireframes style.
    }
    if (!empty($vars['primary_links']) or !empty($vars['secondary_links'])) {
        $body_classes[] = 'with-navigation';
    }
    if (!empty($vars['secondary_links'])) {
        $body_classes[] = 'with-secondary';
    }
    if (module_exists('taxonomy') && $vars['node']->nid) {
        foreach (taxonomy_node_get_terms($vars['node']) as $term) {
            $body_classes[] = 'tax-' . eregi_replace('[^a-z0-9]', '-', $term->name);
        }
    }



    $arg0 = arg(0);
    $breadcrumb[] = l(t('Home'), '<front>');


    switch ($arg0) {
      
        case 'news':
            $vars['breadcrumb'] = l('About Us', 'content/about-us') . ' > Headline';
            $vars['category_name'] = 'Company Headline';
            break;

        case 'customer-support':
            if (arg(1) == 'contact-us') {
                $vars['template_files'][] = "page-contact-us";
                $vars['breadcrumb'] = l('About Us', 'content/about-us') . ' > Headline';
                $vars['category_name'] = 'Contact Partsmart';
                $vars['head_title'] = 'Partsmart';
            } else {
                $vars['breadcrumb'] = l('About Us', 'content/about-us') . ' > Headline';
            }
            break;


       
		case 'printer':
			$breadcrumb[] = 'Printer Parts';
			$vars['breadcrumb'] = implode(' > ', $breadcrumb);
			$vars['category_name'] = t('Explore Printer Parts');
			if(arg(1) == 'brand' || arg(1) == 'category'){
				$vars['left'] = 0;
			}
			else{
				$vars['left'] = 1;
			}
		break;
		
		case 'copier':
			$breadcrumb[] = 'Copier Parts';
			$vars['breadcrumb'] = implode(' > ', $breadcrumb);
			$vars['category_name'] = t('Explore Copier Parts');
			if(arg(1) == 'brand'){
				$vars['left'] = 0;
			}
			else{
				$vars['left'] = 1;
			}
		break;
		
		case 'cartridge':
			$breadcrumb[] = 'Cartridge Parts';
			$vars['breadcrumb'] = implode(' > ', $breadcrumb);
			$vars['category_name'] = t('Explore Cartridge Parts');
			if(arg(1) == 'brand'){
				$vars['left'] = 0;
			}
			else{
				$vars['left'] = 1;
			}
		break;
		
		case 'user':
			$breadcrumb[] = 'USER';
			$vars['breadcrumb'] = implode(' > ', $breadcrumb);
			
			$vars['left'] = 2;
		break;
		
		case 'parts_list':
			$breadcrumb[] = 'Parts_list';
			$vars['breadcrumb'] = implode(' > ', $breadcrumb);
			
			$vars['left'] = 3;
		break;
		
     
    case 'cart':
			$breadcrumb[] = 'Printer Parts';
			$vars['breadcrumb'] = implode(' > ', $breadcrumb);
			$vars['category_name'] = t('Explore Printer Parts');
    break;
		default :
			$vars['left'] = 2;
		break;
    }

    if ($vars['node']->type == 'cartridge' || $vars['node']->type == 'printer' || $vars['node']->type == 'copier') {
        $vars['template_files'][] = "page-product";

        $vars['breadcrumb'] = implode(' > ', $breadcrumb);
        unset($vars['title']);
    } else if ($vars['node']->type == 'printer_model' || $vars['node']->type == 'printer_submodel') {
        unset($vars['title']);
			}
			
		if ($vars['node']->type == 'news') {
        $vars['breadcrumb'] = 'About Us > Company Profile';
        $vars['category_name'] = 'Company Profile';
        $vars['template_files'][] = "page-headlines";
    }


    $vars['body_classess'] = implode(' ', $body_classes); // Concatenate with spaces
}

function ps_comm_settings($tid, $navname, $pid=0) {
    $breadcrumb[] = l(t('Home'), '<front>');
    $term = taxonomy_get_term($tid);
    $breadcrumb[] = l(t($term->name), 'taxonomy/term/' . $term->tid);
    $breadcrumb[] = t($navname);
    $vars['breadcrumb'] = implode(' > ', $breadcrumb);
    $vars['category_name'] = t('Explore') . ' ' . t($term->name);
    if ($tid == 1) {
        $m_vid = 2;
        $category_vid = 3;
    } else if ($tid == 2) {
        $m_vid = 5;
        $category_vid = 6;
    } else if ($tid == 3) {
        $m_vid = 2;
        $category_vid = 4;
    }

    $vars['left_manufacturers'] = ps_pages_get_terms_byvid($m_vid, 0, -1, 1, $tid);
    $vars['left_partscategory'] = ps_pages_get_terms_byvid($category_vid, $pid, -1, 1);

    return $vars;
}

function partsmart_preprocess_node(&$vars, $hook) {

    $node = $vars['node'];
    if ($node->type == 'product') {

        unset($vars['links']);
    }
}