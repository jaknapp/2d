$.fn.options = function(options, defaults) {
	var keys = defaults || options;
	var values = options || defaults;		if (!keys && !values) {		return this;	}		var target = this[0];
	$.each(keys, function(key, value) {
		target[key] = values[key];
	});	
	return this;
};