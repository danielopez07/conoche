'use strict';

module.exports = {
	theme: {
		slug: 'conoche',
		name: 'Proyecto Conoche',
		author: 'Sandstorm Agency'
	},
	dev: {
		browserSync: {
			live: true,
			proxyURL: 'http://127.0.0.1:8080/wordpress/',
			bypassPort: '8181'
		},
		browserslist: [ // See https://github.com/browserslist/browserslist
			'> 1%',
			'last 2 versions'
		],
		debug: {
			styles: false, // Render verbose CSS for debugging.
			scripts: false // Render verbose JS for debugging.
		}
	},
	export: {
		compress: true
	}
};
