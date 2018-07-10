jQuery(function(){
	jQuery(".daily-horoscope-star").change(function(){
		jQuery.get(dailyHoroscopeGlobal.base_url+"data/index.php",{type:jQuery(this).val()},function(data){
			jQuery(".daily-horoscope-display").empty().append(data);
		},'json');
	});
});