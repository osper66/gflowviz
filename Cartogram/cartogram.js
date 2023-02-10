//カルトグラム初期設定
var cartogram = d3.cartogram()
	.projection(d3.geo.albersUsa()) //d3.projectionをラップ
	.value(function(d) {
		return Math.random() * 100; //ランダムに変形
	});
	 
 //topoJSONデータを読み込み
d3.json("path/to/hoge.topojson", function(topology) {
	
	//カルトグラム変換
	var features = cartogram(topology);
	
	//地形描画
	d3.select("svg").selectAll("path")
		.data(features)
		.enter()
		.append("path")
		.attr("d", cartogram.path);
});
