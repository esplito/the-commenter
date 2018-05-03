const path = require('path');

module.exports = {
	mode: "development",
	entry: {
		App: "./app/assets/scripts/App.js",
		Vendor: "./app/assets/scripts/Vendor.js"
	},
	output: {
		path: path.resolve(__dirname, "./app/temp/scripts"),
		filename: "[name].js"
	},
	module: {
		rules: [{
			test: /\.js$/,
			loader: 'babel-loader',
			options: {
				presets: ['es2015']
			},
			exclude: /node_modules/
		}]		
	}
}