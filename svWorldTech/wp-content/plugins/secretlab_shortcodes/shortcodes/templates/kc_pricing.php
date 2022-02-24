<?php
$show_icon_header = $icon_header = $title = $subtitle = $price = $price_suffix = $currency = $show_on_top = $duration = $duration_position = $desc = $show_icon = $icon = $show_button = $button_text = $button_link = $custom_class = $data_icon_header = $data_title = $data_price = $data_currency = $data_duration = $data_desc = $data_button = $sticker  = $stikertext = $stickerout = $description = $data_description = $prefix = $suffix = $show_svg = $svg = $button_icon = $button_svg = $button_img = $b_i = $after_button_description = $data_after_button_description = '';
$button_icon_type = 'none';
$button_icon_position = 'before';
$button_img_size = 'full';
$layout = 1;
$prefix_position = $suffix_position = $price_suffix_position = 'span';
$wrap_class	= apply_filters( 'kc-el-class', $atts );

extract( $atts );

$wrap_class[] = 'kc-pricing-tables';
$wrap_class[] = 'kc-pricing-layout-' . $layout;
if ( !empty( $custom_class ) )
	$wrap_class[] = $custom_class;

if ( $show_on_top == 'yes' )
	$wrap_class[] = 'kc-price-before-currency';

switch ( $sticker ) {
	case '0':
		$stickerout = '';
		break;
    case '1':
        $stickerout = '<div class="sticker st1">'.$stikertext.'</div>';
        break;
    case '2':
        $stickerout = '<div class="sticker st2"><div>'.$stikertext.'</div></div>';
        break;
	case '3':
		$stickerout = '<div class="sticker st3"><div>'.$stikertext.'</div></div>';
		break;
}

/*
if ($sticker == '1') {
   $stickerout = '<div class="sticker st1">'.$stikertext.'</div>';
} elseif ($sticker == '2') {
   $stickerout = '<div class="sticker st2"><div>'.$stikertext.'</div></div>';
}*/

//print_r($stickerout);
if ( $show_icon_header == 'yes' ) {
   if( empty($icon_header) || $icon_header == '__empty__')
	   $icon_header = 'fa-rocket';

if ( $show_svg == 'yes' && '' !== $svg ) {
	$data_icon_header .= '<div class="content-svg-header" data-ssc-svg="' . $svg . '">' . ssc_process_svg( $svg ) . '</div>';
} else {
	$data_icon_header .= '<div class="content-icon-header">' . '<i class="'. $icon_header .'"></i>' . '</div>';
}

}

if ( !empty( $title ) ) {

   $data_title .= '<div class="content-title">';
	   if ( !empty( $subtitle ) ) {
		   $data_title .= '<div>' . $title . '</div>';
		   $data_title .= '<div class="content-sub-title">' . $subtitle . '</div>';
	   } else {
		   $data_title .= $title;
	   }
   $data_title .= '</div>';

}


if ( !empty( $price ) ) {
	if(!empty($price_suffix)){
		$price_suffix = '<' . $price_suffix_position . '>' . $price_suffix . '</' . $price_suffix_position . '>';
	}

   $data_price .= '<span class="content-price">' . $price . $price_suffix . '</span>';

}

if ( !empty( $currency ) ) {

   $data_currency .= '<span class="content-currency">' . $currency . '</span>';

}

if ( !empty( $duration ) ) {

   $data_duration .= '<span class="content-duration">' . $duration . '</span>';

}
if ( !empty( $description ) ) {

   $data_description .= '<div class="description">' . $description . '</div>';

}
if ( !empty( $after_button_description ) ) {

	$data_after_button_description .= '<div class="after-button-description">' . $after_button_description . '</div>';
}

if ( !empty( $desc ) ) {

   $pros = explode( "\n", $desc );
   if( count( $pros ) ) {

	   $data_desc .= '<ul class="content-desc">';

	   foreach( $pros as $pro ) {
		   if ( $show_icon == 'yes' ) {
			   $data_desc .= '<li><i class="'. $icon .'"></i> '. $pro .' </li>';
		   } else {
			   $data_desc .= '<li>'. $pro .' </li>';
		   }
	   }

	   $data_desc .= '</ul>';

   }

}

if ( $show_button == 'yes' ) {

	switch ( $button_icon_type ) {
		case 'svg':
		    if( '' !== $button_svg ){
			    $b_i = '<div class="button-svg" data-ssc-svg="' . $button_svg . '">' . ssc_process_svg( $button_svg ) . '</div>';
            }
			break;
		case 'icon':
			if( '' !== $button_icon ) {
				$b_i = '<div class="button-icon"><i class="' . $button_icon . '"></i></div>';
			}
			break;
		case 'img':
		    if( '' !== $button_img ){
			    $button_image = image_downsize( $button_img, $button_img_size );
			    $b_i = '<div class="button-img"><img src="'.$button_image[0].'" alt="'.$title.'"></div>';
            }
			break;
	}

   if ( !empty( $button_link ) ) {
	   $link_arr = explode( '|', $button_link );
	   if ( !empty( $link_arr[0] ) ) {
		   $link_url = $link_arr[0];
	   } else {
		   $link_url = '#';
	   }
   } else {
	   $link_url = '#';
   }

	if('5' == $layout){

		if ( $show_on_top == 'yes' ) {
		    if ( 'yes' === $duration_position ) {
			    $button_price = $data_duration.$data_price.$data_currency;
            } else {
			    $button_price = $data_price.$data_currency.$data_duration;
            }
		} else {
			if ( 'yes' === $duration_position ) {
				$button_price =  $data_duration.$data_currency.$data_price;
			} else {
				$button_price =  $data_currency.$data_price.$data_duration;
			}
		}

		if(!empty($prefix)){
			$prefix = '<' . $prefix_position . '>' . $prefix . '</' . $prefix_position . '>';
		}

		if(!empty($suffix)){
			$suffix = '<' . $suffix_position . '>' . $suffix . '</' . $suffix_position . '>';
		}

		$button_text = $prefix . ' ' . $button_text . ' ' . $button_price . ' ' . $suffix;
	}

	$data_button .= '<div class="content-button">';
        if ( 'before' == $button_icon_position ) {
            $data_button .= '<a href="' . $link_url . '">' . $b_i . $button_text . '</a>';
        } else if ( 'after' == $button_icon_position ) {
            $data_button .= '<a href="' . $link_url . '">' . $button_text . $b_i . '</a>';
        } else {
            $data_button .= '<a href="' . $link_url . '">' . $button_text . '</a>';
        }
	$data_button .= '</div>';

}

?>

<div class="<?php echo implode( ' ', $wrap_class ); ?>">

   <?php switch ( $layout ) {
	   case '2':
		   echo $stickerout.'<div class="header-pricing">';
		   echo $data_title;
		   echo $data_description;
		   echo '<div class="kc-pricing-price">';
			   if ( $show_on_top == 'yes' ) {
				   if ( 'yes' === $duration_position ) {
					   echo $data_duration.$data_price.$data_currency;
				   } else {
					   echo $data_price.$data_currency.$data_duration;
				   }
			   } else {
				   if ( 'yes' === $duration_position ) {
					   echo $data_duration.$data_currency.$data_price;
				   } else {
					   echo $data_currency.$data_price.$data_duration;
				   }
			   }
		   echo '</div>';
		   echo '</div>';
		   echo $data_desc;
		   echo $data_button;
		   echo $data_after_button_description;
	   break;
	   case '3':

		   echo $stickerout.$data_icon_header.$data_title;
		   echo $data_description;
		   echo $data_desc;
		   echo '<div class="kc-pricing-price">';
			   if ( $show_on_top == 'yes' ) {
				   if ( 'yes' === $duration_position ) {
					   echo $data_duration.$data_price.$data_currency;
				   } else {
					   echo $data_price.$data_currency.$data_duration;
				   }
			   } else {
				   if ( 'yes' === $duration_position ) {
					   echo $data_duration.$data_currency.$data_price;
				   } else {
					   echo $data_currency.$data_price.$data_duration;
				   }
			   }
		   echo '</div>';
		   echo $data_button;
		   echo $data_after_button_description;
	   break;
	   case '4':
		   echo $stickerout.'<div class="header-pricing">';
		   echo $data_icon_header;
		   echo $data_title;
		   echo '<div class="kc-pricing-price">';
			   if ( $show_on_top == 'yes' ) {
				   if ( 'yes' === $duration_position ) {
					   echo $data_duration.$data_price.$data_currency;
				   } else {
					   echo $data_price.$data_currency.$data_duration;
				   }
			   } else {
				   if ( 'yes' === $duration_position ) {
					   echo $data_duration.$data_currency.$data_price;
				   } else {
					   echo $data_currency.$data_price.$data_duration;
				   }
			   }
		   echo '</div>';
		   echo '</div>';
		   echo $data_description;
		   echo $data_desc;
		   echo $data_button;
		   echo $data_after_button_description;
	   break;
	   case '5':
		   echo $stickerout.'<div class="header-pricing">';
		   echo $data_icon_header;
		   echo $data_title;
		   echo '</div>';
		   echo $data_description;
		   echo $data_desc;
		   echo $data_button;
		   echo $data_after_button_description;
	   break;

	   default:
		   echo $stickerout.'<div class="header-pricing">';
		   echo $data_title;
		   echo $data_icon_header;

		   echo '<div class="kc-pricing-price">';
			   if ( $show_on_top == 'yes' ) {
				   if ( 'yes' === $duration_position ) {
					   echo $data_duration.$data_price.$data_currency;
				   } else {
					   echo $data_price.$data_currency.$data_duration;
				   }
			   } else {
				   if ( 'yes' === $duration_position ) {
					   echo $data_duration.$data_currency.$data_price;
				   } else {
					   echo $data_currency.$data_price.$data_duration;
				   }
			   }
		   echo '</div>';
		   echo '</div>';
		   echo $data_description;
		   echo $data_desc;
		   echo $data_button;
		   echo $data_after_button_description;
	   break;
   }

   ?>

</div>
