<?php

add_post_type_support( 'page', 'excerpt' );
/* ==========================================================================
   01. Lang
   ========================================================================== 



/* Get Current Lang
   ========================================================================== */

   include(locate_template('lang/lang.php'));
   
  function currlang() {
    $currlang = explode("_", get_locale());
    return $currlang[0];
   }


/*  ==========================================================================
    02. Register Menus
    ========================================================================== */
function register_my_menus() {
  register_nav_menus(
    array(
      'top-menu' => __( 'Top Menu' ),
      'footer-menu' => __( 'Footer Menu' ),
      'services' => __( 'Services' ),
      'social' => __( 'Social Network ' )
    )
  );
}
add_action( 'init', 'register_my_menus' );



/* ==========================================================================
   03. Current Page URL
   ========================================================================== */
function current_page_url() {
  $pageURL = 'http';
  if( isset($_SERVER["HTTPS"]) ) {
    if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
  }
  $pageURL .= "://";
  if ($_SERVER["SERVER_PORT"] != "80") {
    $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
  } else {
    $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
  }
  return $pageURL;
}



/* ==========================================================================
   04. Get ID By Slug / Usage: get_id_by_slug('any-page-slug'); /
   ========================================================================== */
function get_id_by_slug($page_slug) {
  $page = get_page_by_path($page_slug);
  if ($page) {
    return $page->ID;
  } 
  else {
    return null;
  }
}



/* ==========================================================================
   05. Basic Email Delivery Using Mandrill
   ========================================================================== */
/**
 * mandrill.com
 * Username: admin@ultraweb.ae
 * Password: Pavilion23xi!
 */
class SendForm {
  
  public $phpmailer;
  public $from = 'info@starsdomerealty.com';
  public $fromName = 'StarsDomeRealty.com';

  public function __construct() {
    include(locate_template('assets/plugins/phpmailer/PHPMailerAutoload.php'));
    include(locate_template('assets/plugins/phpmailer/class.smtp.php'));
    include(locate_template('assets/plugins/phpmailer/class.pop3.php'));
    include(locate_template('assets/plugins/phpmailer/class.phpmailer.php'));
    $this->phpmailer = new PHPMailer();
    $this->phpmailer->CharSet = 'utf-8';
    //$this->phpmailer->IsSMTP();                                      // Set mailer to use SMTP
    //$this->phpmailer->Host = 'smtp.mandrillapp.com';                 // Specify main and backup server
    //$this->phpmailer->Port = 587;                                    // Set the SMTP port
    //$this->phpmailer->SMTPAuth = true;                               // Enable SMTP authentication
    //$this->phpmailer->Username = 'admin@ultraweb.ae';                // SMTP username
    //$this->phpmailer->Password = 'R7Zl6mB8tKaLIa3at7w3Iw';           // SMTP password
    //$this->phpmailer->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
    $this->phpmailer->From = $this->from;
    $this->phpmailer->FromName = $this->fromName;
    $this->phpmailer->IsHTML(true);                                  // Set email format to HTML
  }


  /* Aultoload
       ========================================================================== */
  private function _template($body) {
    include(locate_template('assets/plugins/phpmailer/PHPMailerAutoload.php'));
  }


  /* Google Recaptcha
       ========================================================================== */
  private function _google_recaptcha_check($responce) {
    if( $curl = curl_init() ) {
     curl_setopt($curl, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($curl, CURLOPT_POST, true);
     curl_setopt($curl, CURLOPT_POSTFIELDS, "secret=6LcSzxMTAAAAAEQ-OI2o-vq1NAwrI9EPxSXi8ieJ&response=".strip_tags(urlencode($responce)));
     $out = curl_exec($curl);
     curl_close($curl);
     $result = json_decode($out);
     if($result->success == 'true') {
      return true;
     }
     return false;
    }
  }


  /* Error Message
       ========================================================================== */
  private function _send() {
    if(!$this->phpmailer->Send()) {
      exit(json_encode(
        array(
            'type' => 'mailer',
            'message' => '<div class="alert alert-warning">'.pll__('Message could not be sent! Mailer Error:') . $this->phpmailer->ErrorInfo.'</div>',
          )
        )
      );
    }
  }


  /* Add Address
       ========================================================================== */
  public function AddAddress($email, $name) {
    $this->phpmailer->AddAddress($email, $name);
  }


  /* Send Message
       ========================================================================== */
  public function SendItem($mailSubject, $mailTitle = false, $formItem, $pageItem = false) {
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
      $recaptcha = $this->_google_recaptcha_check($_POST['g-recaptcha-response']);


      /* Google Recaptcha Error Message
             ========================================================================== */
      if( ! $recaptcha) {
        exit(json_encode(
          array(
              'type' => 'warning',
              'message' => '<div class="alert alert-warning">'.pll__('Google Recaptcha is incorrect!').'</div>',
            )
          )
        );
      }
      
      /* HTML Template
             ========================================================================== */
          $theme_path = get_template_directory();
      $mailBody = file_get_contents(get_template_directory().'/assets/plugins/mailTemplate/feedback.html');

      // Form Items
      if ($formItem != "") {
        $formItemCount = count($formItem);
        $formItemNum = 1;
        foreach ($formItem as $key => $value) {
          if ($formItemCount != $formItemNum) {
            $formItemBorder = "border-bottom:1px solid #ccd2d6;";
          } else {
            $formItemBorder = "";
          }
          $formItems.= '<tr style="font-size:15px; color:#475152;">
                            <td width="50%" align="right" style="padding-bottom:15px; padding-top:15px; padding-right:10px; '.$formItemBorder.' font-weight:bold;">'.$key.':</td>
                            <td width="50%" align="left" style="padding-bottom:15px; padding-top:15px; padding-left:10px; '.$formItemBorder.' line-height:22px;">'.$value.'</td>
                            </tr>';
          $formItemNum++;
        }
      }

      // Page Items
      if ($pageItem != "") {
        $mailBody = str_replace("[PAGE.VISIBLE]", "block", $mailBody);
        $mailBody = str_replace("[TYPE.TITLE]", $pageItem['pageTitle'], $mailBody);
        $mailBody = str_replace("[PAGE.TITLE]", $pageItem['title'], $mailBody);
        $mailBody = str_replace("[PAGE.DES]", $pageItem['des'], $mailBody);
        $mailBody = str_replace("[PAGE.LINK]", $pageItem['link'], $mailBody);
        $mailBody = str_replace("[PAGE.POSTER]", $pageItem['poster'], $mailBody);

        if ($pageItem['pageType'] == "property") {
          $mailBody = str_replace("[PROPERTY.VISIBLE]", "block", $mailBody);
          $mailBody = str_replace("[PROPERTY.PRICE]", $pageItem['price'], $mailBody);
          $mailBody = str_replace("[PROPERTY.BEDROOMS]", $pageItem['bedrooms']." ".pll__('Bedrooms'), $mailBody);
          $mailBody = str_replace("[PROPERTY.BATHROOMS]", $pageItem['bathrooms']." ".pll__('Bathrooms'), $mailBody);
          $mailBody = str_replace("[PROPERTY.COLLECTION]", $pageItem['collection'], $mailBody);
          $mailBody = str_replace("[PROPERTY.SQFT]", $pageItem['sqft']." ".pll__('sq.ft.'), $mailBody);
          $mailBody = str_replace("[PROPERTY.TYPE]", pll__('For')." ".$pageItem['propertyType'], $mailBody);

          if ($pageItem['propertyType'] == "Rent") {
            $mailBody = str_replace("[PROPERTY.TYPE.COLOR]", "color:#a45dc5;background-color:#f4e4fb;", $mailBody);
          }
          else {
            $mailBody = str_replace("[PROPERTY.TYPE.COLOR]", "color:#a88936;background-color:#ffefc4;", $mailBody);
          }

          $this->phpmailer->AddEmbeddedImage($theme_path."/assets/images/mail-imgs/ico-price.png", 'icoPrice', "ico-price.png", "base64");
          $this->phpmailer->AddEmbeddedImage($theme_path."/assets/images/mail-imgs/ico-bedroom.png", 'icoBedroom', "ico-bedroom.png", "base64");
          $this->phpmailer->AddEmbeddedImage($theme_path."/assets/images/mail-imgs/ico-bathroom.png", 'icoBathroom', "ico-bathroom.png", "base64");
                    
        }
        else {
          $mailBody = str_replace("[PROPERTY.VISIBLE]", "none", $mailBody);
        }
      }
      else {
        $mailBody = str_replace("[PAGE.VISIBLE]", "none", $mailBody);
      }

      // Mail Item
      $mailBody = str_replace("[SITE.NAME]", "Stars Dome Realty", $mailBody);
      $mailBody = str_replace("[MAIL.TITLE]", $mailTitle, $mailBody);
      $mailBody = str_replace("[MAIL.SUBJECT]", $mailSubject, $mailBody);
      $mailBody = str_replace("[FORM.ITEM]", $formItems, $mailBody);
      $mailBody = str_replace("[CLIENTS.SITE.URL]", "http://starsdomerealty.com", $mailBody);
      $mailBody = str_replace("[CLIENTS.COMPANY.NAME]", "StarsDomeRealty.com", $mailBody);
      $mailBody = str_replace("[CLIENTS.ADDRESS]", pll__('G-13 & 14, Ibn Battuta Gate Dubai,<br> United Arab Emirates'), $mailBody);
      $mailBody = str_replace("[CLIENTS.EMAIL]", pll__('info@starsdomerealty.com'), $mailBody);
      $mailBody = str_replace("[CLIENTS.PHONE]", pll__('Toll Free: 800 - 555 444'), $mailBody);

      // Social
      $mailBody = str_replace("[SOCIAL.FACEBOOK]", "http://www.facebook.com/pages/Dubai/Stars-Dome-Realty/111760492212176", $mailBody);
      $mailBody = str_replace("[SOCIAL.TWITTER]", "http://twitter.com/StarsDomeRealty", $mailBody);
      $mailBody = str_replace("[SOCIAL.LINKEDIN]", "http://www.linkedin.com/companies/stars-dome-realty", $mailBody);
      $mailBody = str_replace("[SOCIAL.INSTAGRAM]", "http://instagram.com/starsdomerealty", $mailBody);
      $mailBody = str_replace("[SOCIAL.GPLUS]", "http://plus.google.com/", $mailBody);
      $mailBody = str_replace("[SOCIAL.YOUTUBE]", "http://youtube.com/", $mailBody);

      // Images
      $this->phpmailer->AddEmbeddedImage($theme_path."/assets/images/mail-imgs/logo.png", 'logo', "logo.png", "base64");
      $this->phpmailer->AddEmbeddedImage($theme_path."/assets/images/mail-imgs/ico-phone.png", 'icoPhone', "ico-phone.png", "base64");
      $this->phpmailer->AddEmbeddedImage($theme_path."/assets/images/mail-imgs/ico-email.png", 'icoEmail', "ico-email.png", "base64");
      $this->phpmailer->AddEmbeddedImage($theme_path."/assets/images/mail-imgs/ico-address.png", 'icoAddress', "ico-address.png", "base64");

      $this->phpmailer->AddEmbeddedImage($theme_path."/assets/images/mail-imgs/fb.png", 'socialFB', "fb.png", "base64");
      $this->phpmailer->AddEmbeddedImage($theme_path."/assets/images/mail-imgs/tw.png", 'socialTW', "tw.png", "base64");
      $this->phpmailer->AddEmbeddedImage($theme_path."/assets/images/mail-imgs/in.png", 'socialIN', "in.png", "base64");
      $this->phpmailer->AddEmbeddedImage($theme_path."/assets/images/mail-imgs/ins.png", 'socialINS', "ins.png", "base64");
      $this->phpmailer->AddEmbeddedImage($theme_path."/assets/images/mail-imgs/gp.png", 'socialGP', "gp.png", "base64");
      $this->phpmailer->AddEmbeddedImage($theme_path."/assets/images/mail-imgs/yt.png", 'socialYT', "yt.png", "base64");

      $this->phpmailer->Subject = $mailSubject;
      $this->phpmailer->Body    = $mailBody;
      $this->phpmailer->AltBody = 'This is the body in plain text for non-HTML mail clients';
      $this->_send();

      // if ($pageItem != "") {
      //  $this->phpmailer->ClearAddresses();
      //  $this->phpmailer->AddAddress($formItem['Email'], $formItem['Full Name']);

      //  $this->phpmailer->Subject = $mailSubject;
      //  $this->phpmailer->Body    = $userBody;
      //  $this->phpmailer->AltBody = __my('Thank you for your request! Our managers will contact you as soon as possible');
      //  $this->_send();
      // }


      /* Success Message
             ========================================================================== */
      exit(json_encode(
        array(
            'type' => 'success',
            'message' => '<div class="alert alert-success">'.pll__('Thank you! We will contact you as soon as possible!').'</div>',
          )
        )
      );
    }
  }
}



/* ==========================================================================
   06. Cleareing The Data
   ========================================================================== */
function checkfield($field) {
  return trim(mysql_escape_string(strip_tags(htmlspecialchars($field))));
}
// ------------------------------------------------------------------------



/* ==========================================================================
   07. Image Sizes
   ========================================================================== */
add_image_size('property_thumb', 0, 500, false);
add_image_size('property-min-thumb', 450, 450, true);
add_image_size('photo_thumb', 500, 0, false);
add_image_size('plan_thumb', 600, 0, false);
add_image_size('mail_poster', 580, 200, false);
// ------------------------------------------------------------------------



/* ==========================================================================
   08. The Excerpt
   ========================================================================== */
function the_excerpt_max_charlength( $charlength ) { 
  $excerpt = get_the_excerpt(); 
  $charlength++; 
  if ( mb_strlen( $excerpt ) > $charlength ) { 
    $subex = mb_substr( $excerpt, 0, $charlength - 5 ); 
    $exwords = explode( ' ', $subex ); 
    $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) ); 
    if ( $excut < 0 ) { 
      echo mb_substr( $subex, 0, $excut ); 
    } 
    else { 
      echo $subex; 
    } echo '...'; 
  } 
  else { 
    echo $excerpt; 
  } 
}


/* ==========================================================================
   09. Meta
   ========================================================================== */
add_filter( 'meta_content', 'wptexturize'        );
add_filter( 'meta_content', 'convert_smilies'    );
add_filter( 'meta_content', 'convert_chars'      );
add_filter( 'meta_content', 'wpautop'            );
add_filter( 'meta_content', 'shortcode_unautop'  );
add_filter( 'meta_content', 'prepend_attachment' );



/* ==========================================================================
   10. Get Menu
   ========================================================================== */
function get_menu($menu_name) {
  $locations = get_nav_menu_locations();
  $menu_id = $locations[ $menu_name ] ;
  $menu = wp_get_nav_menu_object ($menu_id);
  $menu_items = wp_get_nav_menu_items($menu->term_id);
  $menu_tree = array();
  foreach($menu_items as $item):
    $menu_tree[ $item->menu_item_parent  ][] = $item;
    $id_list[$item->ID] = get_post_meta( $item->ID, '_menu_item_object_id', true );
  endforeach;
  return $menu_tree;
}



/* ==========================================================================
   11. Giving back Taxonomy names by Post ID and term name
   ========================================================================== */
function get_taxonomy_names($post_id, $term_name) {
  $collections = wp_get_post_terms($post_id, $term_name, array("fields" => "all"));
  $count       = count($collections);
  $return = '';
  if($count > 0) {
    $i = 1;
    foreach($collections as $collection) {
      $return .= $collection->name;
      if($count > 1) {
        if($count == $i) {
          continue;
        }
        $return .= ', ';
      }
      $i++;
    }
  }
  return $return;
}


/* ==========================================================================
   12. Giving back Areas by Post ID
   ========================================================================== */
function get_property_area($post_id, $taxonomy) {
  $collections = wp_get_post_terms($post_id, $taxonomy, array("fields" => "all"));
  $return = array();
  if(count($collections)) {
    foreach($collections as $collection) {
      if($collection->parent == 0) {
        $return['emirate'][$collection->name] = clearString($collection->name);
      }
      else {
        $return['area'][$collection->name] = clearString($collection->name);
      }
    }
  }
  return $return;
}


/* ==========================================================================
   13. Javascript Isotope Filter Helper
   ========================================================================== */
function isotope_filter() {
  $filters = array();
  $result = array();
  $filter_string = '';
  $filters['type'] = get_request_string_to_array('type');
  $filters['collection'] = get_request_string_to_array('collection');
  $filters['emirate'] = get_request_string_to_array('emirate');
  $filters['area'] = get_request_string_to_array('area');

  foreach($filters as $filter) {
    if ($filter != "") {
      $filter_string .= ".".$filter;
    }
  }
  $result['filters'] = $filters;
  $result['class'] = $filter_string;
  $result['priceRange'] = get_request_string_to_array('priceRange');
  $result['bedrooms'] = get_request_string_to_array('bedrooms');

  return $result;
}

/* ==========================================================================
   14. Checks string for and making array
   ========================================================================== */
function get_request_string_to_array($get_field) {
  if(isset($_GET[$get_field])) {
    return strip_tags($_GET[$get_field]);
  }
}


function isotope_checked($key, $value, $default = false) {
  if(isset($_GET[$key]) and $_GET[$key] == $value) {
    return 'checked';
  } elseif($default) {
    return 'checked';
  }
}


function clearString($value) {
  return str_replace(" ", "-", mb_strtolower($value));
}

add_image_size( 'portfolio', 265, 263, true);
add_image_size( 'small-portfolio', 265, 263, true);

function pagination_bar( $custom_query ) {

    $total_pages = $custom_query->max_num_pages;
    $big = 999999999; // need an unlikely integer

    if ($total_pages > 1){
        $current_page = max(1, get_query_var('paged'));

        echo paginate_links(array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => $current_page,
            'total' => $total_pages,
        ));
    }
}