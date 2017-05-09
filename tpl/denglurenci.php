<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 平台营业情况 <span class="c-gray en">&gt;</span> 日活动人数 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="Hui-article">
		<article class="cl pd-20">
			<div id="container" style="min-width:700px;height:400px"></div>
		</article>
	</div>
</section>

<script type="text/javascript" src="vendor/HuiLib/hcharts/Highcharts/5.0.6/js/highcharts.js"></script>
<script type="text/javascript" src="vendor/HuiLib/hcharts/Highcharts/5.0.6/js/modules/exporting.js"></script>
<script type="text/javascript">
function dateFormat(date) {
	Y = date.getFullYear();
	M = date.getMonth()+1;
	D = date.getDate();
	return Y+'-'+M+'-'+D;
}

function getWeek() {
	datetime = 86400000;
	now = new Date();
	Week = [];
	for (var i = 6; i >= 0; i--) {
		Week.push(new Date(now - i*datetime));
	}
	return Week;
}

$(function () {
	var categories = [];
	var week = getWeek();
	$.each(week,function(key,value) {
		categories.push(dateFormat(value));
	});
	// categories.push('2017-05-04');
    $('#container').highcharts({
        title: {
            text: '日活',
            x: -20 //center
        },
        xAxis: {
            categories: categories
        },
        yAxis: {
            title: {
                text: '人'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }],
            min: 0
        },
        tooltip: {
            valueSuffix: '人'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0,
            enabled: false
        },
        series: [{
            name: '日活',
            data: <?php $rh = array();
            foreach ($rihuo as $rihuo) {
                array_push($rh, $rihuo['login_num']);
            }
            $rh = implode(',', $rh);
            echo '['.$rh.']'; ?>
        }],
        credits: {
        	enabled: false
        }
    });
});
</script>