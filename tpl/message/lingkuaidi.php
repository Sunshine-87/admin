<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 消息管理 <span class="c-gray en">&gt;</span> 领快递<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="Hui-article">
		<article class="cl pd-20">
			<div class="mt-20">
				<table class="table table-border table-bordered table-hover table-bg table-sort">
					<thead>
						<tr class="text-c">
							<th width="25"><input type="checkbox" name="" value=""></th>
							<th width="80">ID</th>
							<th width="100">用户</th>
							<th width="90">快递点</th>
							<th width="150">目标地点</th>
							<th width="130">发布时间</th>
							<th width="70">状态</th>
							<th width="100">操作</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if (!empty($kuaidi)) {
							foreach ($kuaidi as $kuaidi) {
							
						?>
							<tr class="text-c">
								<td><input type="checkbox" value="1" name=""></td>
								<td><?php echo $kuaidi['id']; ?></td>
								<td><u style="cursor:pointer" class="text-primary" onclick="member_show('<?php echo $kuaidi['nickname']; ?>','index.php?c=member&m=membershow&id=<?php echo $kuaidi['userid']; ?>','10001','360','400')"><?php echo $kuaidi['nickname']; ?></u></td>
								<td><?php echo $kuaidi['place']; ?></td>
								<td><?php echo $kuaidi['destination']; ?></td>
								<!-- <td class="text-l">北京市 海淀区</td> -->
								<td><?php echo $kuaidi['publish_time']; ?></td>
								<td class="td-status"><span class="label label-<?php echo ($kuaidi['passed'] == false)? 'success':'failed' ?> radius"><?php echo ($kuaidi['passed'] == false)? '未过期':'已过期' ?></span></td>
								<td class="td-manage"><a title="删除" href="javascript:;" onclick="member_del('<?php echo $kuaidi['id']; ?>')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
							</tr>
						<?php
							}
						}
						?>
					</tbody>
				</table>
			</div>
		</article>
	</div>
</section>

<script type="text/javascript" src="vendor/HuiLib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="vendor/HuiLib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="vendor/HuiLib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
$(function(){
	$('.table-sort').dataTable({
		"aaSorting": [[ 1, "desc" ]],//默认第几个排序
		"bStateSave": true
	});
	$('.table-sort tbody').on( 'click', 'tr', function () {
		if ( $(this).hasClass('selected') ) {
			$(this).removeClass('selected');
		}
		else {
			table.$('tr.selected').removeClass('selected');
			$(this).addClass('selected');
		}
	});
});
/*用户-添加*/
function member_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*用户-查看*/
function member_show(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*用户-停用*/
function member_stop(obj,id){
	layer.confirm('确认要停用吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_start(this,id)" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已停用</span>');
		$(obj).remove();
		layer.msg('已停用!',{icon: 5,time:1000});
	});
}

/*用户-启用*/
function member_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_stop(this,id)" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
		$(obj).remove();
		layer.msg('已启用!',{icon: 6,time:1000});
	});
}
/*用户-编辑*/
function member_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*密码-修改*/
function change_password(title,url,id,w,h){
	layer_show(title,url,w,h);	
}
/*用户-删除*/
function member_del(id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			async: true,
			url: 'index.php?c=message&m=messagedel',
			dataType: 'json',
			type: 'post',
			data: {id: id, type: 'lingkuaidi'},
			success: function(data) {
				if (data.status == 1) {
					layer.msg('已删除！',{icon:1,time:1000});
					location.reload();
				} else {
					layer.msg('出错！请联系管理员',{icon:2,time:1000});
				}
			}
		});
	});
}
</script>