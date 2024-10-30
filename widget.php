<?php
class CurrencyCalculate extends WP_Widget {

	function __construct() 
	{
		parent::__construct( false, 'Currency Calculate Widget' );
	}

	function widget( $args, $instance ) {
		$title = (isset($instance[ 'title' ])) ? apply_filters( 'widget_title', $instance[ 'title' ] ) : "";
		$width = (isset($instance[ 'width' ])) ? $instance[ 'width' ] : "";
		$height = (isset($instance[ 'height' ])) ? $instance[ 'height' ] : "";
		$fromCurr = (isset($instance[ 'fromCurr' ])) ? $instance[ 'fromCurr' ] : "BTC";
		$toCurr =  (isset($instance[ 'toCurr' ])) ? $instance[ 'toCurr' ] : "USD";
		$defAmount = (isset($instance[ 'defAmount' ])) ? $instance[ 'defAmount' ] : "1";
		$defLang = (isset($instance[ 'defLang' ])) ? $instance[ 'defLang' ] : "us";
		
		$widget = $args['before_widget'] . $args['before_title'] . $title . $args['after_title'];
		$uniq_id = uniqid();
		
		$atts = array(
			'w' => ($width != "") ? $width : "100%",
			'h' => ($height != "") ? $height : "355px",
			't' => ($title != "") ? $title : "Cryptocurrency Calculator and Converter",
			'fC' => ($fromCurr != "") ? $fromCurr : "BTC",
			'tC' => ($toCurr != "") ? $toCurr : "USD",
			'dA' => ($defAmount != "") ? $defAmount : "1",
			'Lang' =>($defLang != "") ? $defLang : "us"
		);

		ob_start();
		?>

		<div id="currency-calculate-<?php echo $uniq_id; ?>" class="currency-calculate"></div>
		<script type="text/javascript">
		var ypFrame = document.createElement("IFRAME");
		function widgetTrigger(ypFrame) {
			var uniqID = '<?php echo $uniq_id; ?>';
			ypFrame.id = uniqID;
            ypFrame.class = "iframe";
			ypFrame.name = uniqID;
			ypFrame.style = "border:0!important;";
			ypFrame.width = "<?php echo $atts['w']; ?>";
			ypFrame.height = "<?php echo $atts['h']; ?>";
			ypFrame.sandbox="allow-same-origin allow-scripts allow-popups allow-forms";
			document.getElementById("currency-calculate-"+uniqID).appendChild(ypFrame);
			var url = "https://www.currencycalculate.com/<?php echo $atts["Lang"];?>/converter/embed/<?php echo $atts['fC']; ?>-<?php echo $atts['tC']; ?>?m=<?php echo $atts['dA']; ?>";
			ypFrame.setAttribute("src", url);
		}
		widgetTrigger(ypFrame);
		</script>
		<style>
	        .currency-calculate iframe {border:none; outline: none;overflow: hidden}
	    </style>
		<?php
		$widget .= ob_get_clean();
		echo $widget .= $args['after_widget'];
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
		$instance[ 'width' ] = strip_tags( $new_instance[ 'width' ] );
		$instance[ 'height' ] = strip_tags( $new_instance[ 'height' ] );	
		$instance[ 'fromCurr' ] = strip_tags( $new_instance[ 'fromCurr' ] );
		$instance[ 'toCurr' ] = strip_tags( $new_instance[ 'toCurr' ] );	
		$instance[ 'defAmount' ] = strip_tags( $new_instance[ 'defAmount' ] );		
		$instance[ 'defLang' ] = strip_tags( $new_instance[ 'defLang' ] );	
		return $instance;	}

	function form( $instance ) {
		?>
		<h2><?php echo _e("Widget Parameters"); ?></h2>
		<?php
		$uniq_id = uniqid();
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$width = ! empty( $instance['width'] ) ? $instance['width'] : '';
		$height = ! empty( $instance['height'] ) ? $instance['height'] : '';

		$fromCurr = ! empty( $instance['fromCurr'] ) ? $instance['fromCurr'] : 'BTC';
		$toCurr = ! empty( $instance['toCurr'] ) ? $instance['toCurr'] : 'USD';
		$defAmount = ! empty( $instance['defAmount'] ) ? $instance['defAmount'] : '1';		
		$defLang = ! empty( $instance['defLang'] ) ? $instance['defLang'] : 'us';	
	
		?>
		<table>
			<tr>
				<td>
					<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo _e("Title"); ?>:</label>
				</td>
				<td>
					<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo ($title != "") ? esc_attr( $title ) : 'Crypto Currency Calculator and Convertor'; ?>" style="max-width: 160px;" />
				</td>
			</tr>
			
<tr>
				<td>
					<label for="<?php echo $this->get_field_id( 'defLang' ); ?>"><?php echo _e("Language"); ?>:</label>
				</td>
				<td>
					 
					<select style="min-width: 160px !important;"  id="<?php echo $this->get_field_id( 'defLang' ); ?>" name="<?php echo $this->get_field_name( 'defLang' ); ?>">
						<option value="<?php echo ($defLang != "") ? esc_attr( $defLang ) : 'US'; ?>" selected="selected"><?php echo ($defLang != "") ? esc_attr( $defLang ) : 'US'; ?></option>
						<option value="AF">AF</option>
						<option value="AF">AF</option>
						<option value="AX">AX</option>
						<option value="AL">AL</option>
						<option value="DZ">DZ</option>
						<option value="AS">AS</option>
						<option value="AD">AD</option>
						<option value="AO">AO</option>
						<option value="AI">AI</option>
						<option value="AQ">AQ</option>
						<option value="AG">AG</option>
						<option value="AR">AR</option>
						<option value="AM">AM</option>
						<option value="AW">AW</option>
						<option value="AC">AC</option>
						<option value="AU">AU</option>
						<option value="AT">AT</option>
						<option value="AZ">AZ</option>
						<option value="BS">BS</option>
						<option value="BH">BH</option>
						<option value="BD">BD</option>
						<option value="BB">BB</option>
						<option value="BY">BY</option>
						<option value="BE">BE</option>
						<option value="BZ">BZ</option>
						<option value="BJ">BJ</option>
						<option value="BM">BM</option>
						<option value="BT">BT</option>
						<option value="BO">BO</option>
						<option value="BA">BA</option>
						<option value="BW">BW</option>
						<option value="BR">BR</option>
						<option value="IO">IO</option>
						<option value="VG">VG</option>
						<option value="BN">BN</option>
						<option value="BG">BG</option>
						<option value="BF">BF</option>
						<option value="BI">BI</option>
						<option value="KH">KH</option>
						<option value="CM">CM</option>
						<option value="CA">CA</option>
						<option value="IC">IC</option>
						<option value="CV">CV</option>
						<option value="BQ">BQ</option>
						<option value="KY">KY</option>
						<option value="CF">CF</option>
						<option value="EA">EA</option>
						<option value="TD">TD</option>
						<option value="CL">CL</option>
						<option value="CN">CN</option>
						<option value="CX">CX</option>
						<option value="CC">CC</option>
						<option value="CO">CO</option>
						<option value="KM">KM</option>
						<option value="CG">CG</option>
						<option value="CD">CD</option>
						<option value="CK">CK</option>
						<option value="CR">CR</option>
						<option value="CI">CI</option>
						<option value="HR">HR</option>
						<option value="CU">CU</option>
						<option value="CW">CW</option>
						<option value="CY">CY</option>
						<option value="CZ">CZ</option>
						<option value="DK">DK</option>
						<option value="DG">DG</option>
						<option value="DJ">DJ</option>
						<option value="DM">DM</option>
						<option value="DO">DO</option>
						<option value="EC">EC</option>
						<option value="EG">EG</option>
						<option value="SV">SV</option>
						<option value="GQ">GQ</option>
						<option value="ER">ER</option>
						<option value="EE">EE</option>
						<option value="ET">ET</option>
						<option value="FK">FK</option>
						<option value="FO">FO</option>
						<option value="FJ">FJ</option>
						<option value="FI">FI</option>
						<option value="FR">FR</option>
						<option value="GF">GF</option>
						<option value="PF">PF</option>
						<option value="TF">TF</option>
						<option value="GA">GA</option>
						<option value="GM">GM</option>
						<option value="GE">GE</option>
						<option value="DE">DE</option>
						<option value="GH">GH</option>
						<option value="GI">GI</option>
						<option value="GR">GR</option>
						<option value="GL">GL</option>
						<option value="GD">GD</option>
						<option value="GP">GP</option>
						<option value="GU">GU</option>
						<option value="GT">GT</option>
						<option value="GG">GG</option>
						<option value="GN">GN</option>
						<option value="GW">GW</option>
						<option value="GY">GY</option>
						<option value="HT">HT</option>
						<option value="HN">HN</option>
						<option value="HK">HK</option>
						<option value="HU">HU</option>
						<option value="IS">IS</option>
						<option value="IN">IN</option>
						<option value="ID">ID</option>
						<option value="IR">IR</option>
						<option value="IQ">IQ</option>
						<option value="IE">IE</option>
						<option value="IM">IM</option>
						<option value="IL">IL</option>
						<option value="IT">IT</option>
						<option value="JM">JM</option>
						<option value="JP">JP</option>
						<option value="JE">JE</option>
						<option value="JO">JO</option>
						<option value="KZ">KZ</option>
						<option value="KE">KE</option>
						<option value="KI">KI</option>
						<option value="XK">XK</option>
						<option value="KW">KW</option>
						<option value="KG">KG</option>
						<option value="LA">LA</option>
						<option value="LV">LV</option>
						<option value="LB">LB</option>
						<option value="LS">LS</option>
						<option value="LR">LR</option>
						<option value="LY">LY</option>
						<option value="LI">LI</option>
						<option value="LT">LT</option>
						<option value="LU">LU</option>
						<option value="MO">MO</option>
						<option value="MK">MK</option>
						<option value="MG">MG</option>
						<option value="MW">MW</option>
						<option value="MY">MY</option>
						<option value="MV">MV</option>
						<option value="ML">ML</option>
						<option value="MT">MT</option>
						<option value="MH">MH</option>
						<option value="MQ">MQ</option>
						<option value="MR">MR</option>
						<option value="MU">MU</option>
						<option value="YT">YT</option>
						<option value="MX">MX</option>
						<option value="FM">FM</option>
						<option value="MD">MD</option>
						<option value="MC">MC</option>
						<option value="MN">MN</option>
						<option value="ME">ME</option>
						<option value="MS">MS</option>
						<option value="MA">MA</option>
						<option value="MZ">MZ</option>
						<option value="MM">MM</option>
						<option value="NA">NA</option>
						<option value="NR">NR</option>
						<option value="NP">NP</option>
						<option value="NL">NL</option>
						<option value="NC">NC</option>
						<option value="NZ">NZ</option>
						<option value="NI">NI</option>
						<option value="NE">NE</option>
						<option value="NG">NG</option>
						<option value="NU">NU</option>
						<option value="NF">NF</option>
						<option value="KP">KP</option>
						<option value="MP">MP</option>
						<option value="NO">NO</option>
						<option value="OM">OM</option>
						<option value="PK">PK</option>
						<option value="PW">PW</option>
						<option value="PS">PS</option>
						<option value="PA">PA</option>
						<option value="PG">PG</option>
						<option value="PY">PY</option>
						<option value="PE">PE</option>
						<option value="PH">PH</option>
						<option value="PN">PN</option>
						<option value="PL">PL</option>
						<option value="PT">PT</option>
						<option value="PR">PR</option>
						<option value="QA">QA</option>
						<option value="RE">RE</option>
						<option value="RO">RO</option>
						<option value="RU">RU</option>
						<option value="RW">RW</option>
						<option value="WS">WS</option>
						<option value="SM">SM</option>
						<option value="ST">ST</option>
						<option value="SA">SA</option>
						<option value="SN">SN</option>
						<option value="RS">RS</option>
						<option value="SC">SC</option>
						<option value="SL">SL</option>
						<option value="SG">SG</option>
						<option value="SX">SX</option>
						<option value="SK">SK</option>
						<option value="SI">SI</option>
						<option value="SB">SB</option>
						<option value="SO">SO</option>
						<option value="ZA">ZA</option>
						<option value="GS">GS</option>
						<option value="KR">KR</option>
						<option value="SS">SS</option>
						<option value="ES">ES</option>
						<option value="LK">LK</option>
						<option value="BL">BL</option>
						<option value="SH">SH</option>
						<option value="KN">KN</option>
						<option value="LC">LC</option>
						<option value="MF">MF</option>
						<option value="PM">PM</option>
						<option value="VC">VC</option>
						<option value="SD">SD</option>
						<option value="SR">SR</option>
						<option value="SJ">SJ</option>
						<option value="SZ">SZ</option>
						<option value="SE">SE</option>
						<option value="CH">CH</option>
						<option value="SY">SY</option>
						<option value="TW">TW</option>
						<option value="TJ">TJ</option>
						<option value="TZ">TZ</option>
						<option value="TH">TH</option>
						<option value="TL">TL</option>
						<option value="TG">TG</option>
						<option value="TK">TK</option>
						<option value="TO">TO</option>
						<option value="TT">TT</option>
						<option value="TA">TA</option>
						<option value="TN">TN</option>
						<option value="TR">TR</option>
						<option value="TM">TM</option>
						<option value="TC">TC</option>
						<option value="TV">TV</option>
						<option value="UM">UM</option>
						<option value="VI">VI</option>
						<option value="UG">UG</option>
						<option value="UA">UA</option>
						<option value="AE">AE</option>
						<option value="GB">GB</option>
						<option value="US">US</option>
						<option value="UY">UY</option>
						<option value="UZ">UZ</option>
						<option value="VU">VU</option>
						<option value="VA">VA</option>
						<option value="VE">VE</option>
						<option value="VN">VN</option>
						<option value="WF">WF</option>
						<option value="EH">EH</option>
						<option value="YE">YE</option>
						<option value="ZM">ZM</option>
						<option value="ZW">ZW</option>	
					</select>
				</td>
			</tr>
			
			<tr>
				<td>
					<label for="<?php echo $this->get_field_id( 'fromCurr' ); ?>"><?php echo _e("From Currency"); ?>:</label>
				</td>
				<td>
					<input type="text" id="<?php echo $this->get_field_id( 'fromCurr' ); ?>" name="<?php echo $this->get_field_name( 'fromCurr' ); ?>" value="<?php echo ($fromCurr != "") ? esc_attr( $fromCurr ) : 'BTC'; ?>" style="max-width: 160px;" />
				</td>
			</tr>
			<tr>
				<td>
					<label for="<?php echo $this->get_field_id( 'toCurr' ); ?>"><?php echo _e("To Currency"); ?>:</label>
				</td>
				<td>
					<input type="text" id="<?php echo $this->get_field_id( 'toCurr' ); ?>" name="<?php echo $this->get_field_name( 'toCurr' ); ?>" value="<?php echo ($toCurr != "") ? esc_attr( $toCurr ) : 'USD'; ?>" style="max-width: 160px;" />
				</td>
			</tr>
			<tr>
				<td>
					<label for="<?php echo $this->get_field_id( 'defAmount' ); ?>"><?php echo _e("Default Value"); ?>:</label>
				</td>
				<td>
					<input type="text" id="<?php echo $this->get_field_id( 'defAmount' ); ?>" name="<?php echo $this->get_field_name( 'defAmount' ); ?>" value="<?php echo ($defAmount != "") ? esc_attr( $defAmount ) : '1'; ?>" style="max-width: 160px;" />
				</td>
			</tr>			
			<tr>
				<td>
					<label for="<?php echo $this->get_field_id( 'width' ); ?>"><?php echo _e("Width"); ?>:</label>
				</td>
				<td>
					<input type="text" class="width" id="<?php echo $this->get_field_id( 'width' ); ?>" name="<?php echo $this->get_field_name( 'width' ); ?>" value="<?php echo ($width != '') ? esc_attr( $width ) : '100%'; ?>" />
				</td>
			</tr>
			<tr>
				<td>
					<label for="<?php echo $this->get_field_id( 'height' ); ?>"><?php echo _e("Height"); ?>:</label>
				</td>
				<td>
					<input type="text" class="height" id="<?php echo $this->get_field_id( 'height' ); ?>" name="<?php echo $this->get_field_name( 'height' ); ?>" value="<?php echo ($height != '') ? esc_attr( $height ) : '355px'; ?>" />
				</td>
			</tr>			
		</table>
		<?php
	}
}

function currencycalculatecom_register_widgets() {
	register_widget( 'CurrencyCalculate' );
}
add_action( 'widgets_init', 'currencycalculatecom_register_widgets' );
?>