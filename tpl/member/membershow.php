<title>用户查看</title>
</head>
<body>
<div class="cl pd-20" style=" background-color:#5bacb6">
  <img class="avatar size-XL l" src="<?php echo $member['head_photo'] ?>">
  <dl style="margin-left:80px; color:#fff">
    <dt><span class="f-18"><?php echo $member['nickname'] ?></span></dt>
    <!-- <dd class="pt-10 f-12" style="margin-left:0">这家伙很懒，什么也没有留下</dd> -->
  </dl>
</div>
<div class="pd-20">
  <table class="table">
    <tbody>
      <tr>
        <th class="text-r" width="80">性别：</th>
        <td><?php echo $member['sex'] ?></td>
      </tr>
      <!-- <tr>
        <th class="text-r">地址：</th>
        <td>北京市 海淀区</td>
      </tr> -->
    </tbody>
  </table>
</div>