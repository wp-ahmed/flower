jQuery(document).ready(function(){
	jQuery('#wpfSettingsSaveBtn').click(function(){
		jQuery('#wpfSettingsForm').submit();
		return false;
	});
	jQuery('#wpfSettingsForm').submit(function(){
		jQuery(this).sendFormWpf({
			btn: jQuery('#wpfSettingsSaveBtn')
		});
		return false;
	});
	/*Connected options: some options need to be visible  only if in other options selected special value (e.g. if send engine SMTP - show SMTP options)*/
	var $connectOpts = jQuery('#wpfSettingsForm').find('[data-connect]');
	if($connectOpts && $connectOpts.size()) {
		var $connectedTo = {};
		$connectOpts.each(function(){
			var connectToData = jQuery(this).data('connect').split(':')
			,	$connectTo = jQuery('#wpfSettingsForm').find('[name="opt_values['+ connectToData[ 0 ]+ ']"]')
			,	connected = $connectTo.data('connected');
			if(!connected) connected = {};
			if(!connected[ connectToData[1] ]) connected[ connectToData[1] ] = [];
			connected[ connectToData[1] ].push( this );
			$connectTo.data('connected', connected);
			if(!$connectTo.data('binded')) {
				$connectTo.change(function(){
					var connected = jQuery(this).data('connected')
					,	value = jQuery(this).val();
					if(connected) {
						for(var connectVal in connected) {
							if(connected[ connectVal ] && connected[ connectVal ].length) {
								var show = connectVal == value;
								for(var i = 0; i < connected[ connectVal ].length; i++) {
									show 
									? jQuery(connected[ connectVal ][ i ]).show() 
									: jQuery(connected[ connectVal ][ i ]).hide();
								}
							}
						}
					}
				});
				$connectTo.data('binded', 1);
			}
			$connectedTo[ connectToData[ 0 ] ] = $connectTo;
		});
		for(var connectedName in $connectedTo) {
			$connectedTo[ connectedName ].change();
		}
	}

	jQuery('.chooseLoaderIcon').on('click', function(e){
		e.preventDefault();
		wpfChooseIconPopup();
	});
	jQuery('#wpfFormOptDetails_loader_icon').removeClass('wpfOptDetailsShell');

	jQuery('[name="opt_values[loader_icon_color]"]').on('input change',function(){
        var color = jQuery(this).val();
        jQuery('.supsystic-filter-loader').css({color:color});
	});

	function wpfChooseIconPopup() {
		var colorInput = jQuery('input[name="opt_values[loader_icon_color]"]');
		jQuery('body').on('click', '#chooseIconPopup .item-inner', function (e) {
			e.preventDefault();
			var el = jQuery(this)
			,	name = el.find('.preicon_img').attr('data-name')
			,	color = colorInput.val()
			,	countDiv = el.find('.preicon_img').attr('data-items');

			jQuery('input[name="opt_values[loader_icon]"]').val(name+'|'+countDiv);
			jQuery('.wpfIconPreview').html('');
			if (name === 'default') {
				jQuery('.wpfIconPreview').html('<div class="supsystic-filter-loader" style="color: ' + color + ';"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i></div>');
			} else {
				var htmlIcon = ' <div class="supsystic-filter-loader la-' + name + ' la-2x" style="color: ' + color + ';">';
				for (var i = 0; i < countDiv; i++) {
					htmlIcon += '<div></div>';
				}
				htmlIcon += '</div>';
				jQuery('.wpfIconPreview').html(htmlIcon);
			}
			$container.empty();
			$container.dialog('close');
		});
		var $container = jQuery('<div id="chooseIconPopup" style="display: none;" title="" /></div>').dialog({
			modal: true
			, autoOpen: false
			, width: 900
			, height: 750
			, buttons: {
				OK: function () {
					$container.empty();
					$container.dialog('close');
				}
				, Cancel: function () {
					$container.empty();
					$container.dialog('close');
				}
			}
		});

		var contentHtml = jQuery('.wpfLoaderIconTemplate').clone().removeClass('wpfHidden');
		contentHtml.find('div.preicon_img').css({'color':colorInput.val()});
		$container.append(contentHtml);

		var title = jQuery('.chooseLoaderIcon').text();
		$container.dialog("option", "title", title);
		$container.dialog('open');
		return false;
	}
});