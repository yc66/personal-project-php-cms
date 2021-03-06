<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<title><?php echo $this->_vars['webname'];?></title>
<link rel="stylesheet" href="../style/admin.css">
<script src="../js/admin_user.js"></script>
</head>
<body id="main">



<div class="main">

	<div class="map">
		管理首页&gt;&gt;会员管理&gt;&gt;<strong id="navtie"><?php echo $this->_vars['title'];?></strong>
	</div>
	
	<ol>
		<li><a href="user.php?action=show" class="selected">会员列表</a></li>
		<li><a href="user.php?action=add">新增会员</a></li>
		<?php if (@$this->_vars['update']) {?>
		<li><a href="user.php?action=update&id=<?php echo $this->_vars['id'];?>">修改会员</a></li>
		<?php } ?>
	</ol>
	
	<?php if (@$this->_vars['show']) {?>
	<table>
		<tr><th>编号</th><th>用户名</th><th>电子邮件</th><th>状态</th><th>操作</th></tr>
		<?php if (@$this->_vars['AllUser']) {?>
		<?php foreach ($this->_vars['AllUser'] as $key=>$value) { ?>
		<tr>
			<td><script>document.write(<?php echo $key+1?>+<?php echo $this->_vars['num'];?>);</script></td>
			<td><?php echo $value->user?></td>
			<td><?php echo $value->email?></td>
			<td><?php echo $value->state?></td>
			<td><a href="user.php?action=update&id=<?php echo $value->id?>">修改</a> | <a href="user.php?action=delete&id=<?php echo $value->id?>" onclick="return confirm('你确定删除吗') ? true : false">删除</a></td>
		</tr>
		<?php } ?>
		<?php } else { ?>
		<tr><td colspan="6">对不起没有任何数据</td></tr>
		<?php } ?>
	</table>
	<div id="page"><?php echo $this->_vars['showpage'];?></div>
	<?php } ?>
	
	<?php if (@$this->_vars['add']) {?>
	<form method="post" name="reg">
		<table class="left">
			<tr><td>用 户 名 ：<input type="text" class="text" name="user"> <span class="orange"> [必填]</span>　(用户名2~23位之间)</td></tr>
			<tr><td>密　　码：<input type="password" class="text" name="pass"> <span class="orange"> [必填]</span>　(密码不得小于6位)</td></tr>
			<tr><td>密码确认：<input type="password" class="text" name="notpass"> <span class="orange"> [必填]</span>　(和密码必须一致)</td></tr>
			<tr><td>电子邮件：<input type="text" class="text" name="email"> <span class="orange"> [必填]</span>　(每个邮件只能注册一次)</td></tr>
			<tr><td>选择头像：<select name="face">
										<?php foreach ($this->_vars['OptionFaceOne'] as $key=>$value) { ?>
										<option value="0<?php echo $value?>.gif">0<?php echo $value?>.gif</option>
										<?php } ?>
										<?php foreach ($this->_vars['OptionFaceTwo'] as $key=>$value) { ?>
										<option value="<?php echo $value?>.gif"><?php echo $value?>.gif</option>
										<?php } ?>
									</select>
			</td></tr>
			<tr><td><img src="../images/06.gif" name="faceimg" style="margin-left: 60px;"></td></tr>
			<tr><td>安全问题：<select name="question">
										<option value="">没有任何安全问题</option>
										<option value="你父亲的姓名？">您父亲的姓名？</option>
										<option value="你母亲的姓名？">您母亲的姓名？</option>
										<option value="你配偶的姓名？">您配偶的姓名？</option>
									</select>
			</td></tr>
			<tr><td>问题回答：<input type="text" class="text" name="anwser"></td></tr>
			<tr><td>设置权限：<input type="radio" name="state" class="radio" value="0"> 被封禁的会员
											<input type="radio" name="state" class="radio" value="1"> 待审核的会员
											<input type="radio" name="state" class="radio" value="2" checked="checked"> 初级会员
											<input type="radio" name="state" class="radio" value="3"> 中级会员
											<input type="radio" name="state" class="radio" value="4"> 高级会员
											<input type="radio" name="state" class="radio" value="5"> VIP会员
			<tr><td><input type="submit" name="send" class="submit" onclick="return checkReg()" value="注册会员" style="margin-left: 60px;"></td></tr>
		</table>
	</form>
	<?php } ?>
	
	<?php if (@$this->_vars['update']) {?>
	<form method="post" name="reg">
		<input type="hidden" name="id" value="<?php echo $this->_vars['id'];?>">
		<input type="hidden" name="ppass" value="<?php echo $this->_vars['pass'];?>">
		<input type="hidden" name="prev_url" value="<?php echo $this->_vars['prev_url'];?>">
		<table class="left">
			<tr><td>用 户 名 ：<input type="text" class="text" name="user" value="<?php echo $this->_vars['user'];?>"></td></tr>
			<tr><td>密　　码：<input type="password" class="text" name="pass"> (留空不修改)</td></tr>
			<tr><td>电子邮件：<input type="text" class="text" name="email" value="<?php echo $this->_vars['email'];?>"> <span class="orange"> [必填]</span>　(每个邮件只能注册一次)</td></tr>
			<tr><td>选择头像：<select name="face">
												<?php echo $this->_vars['face'];?>
											</select>
			</td></tr>
			<tr><td><img src="../images/<?php echo $this->_vars['facesrc'];?>" name="faceimg" style="margin-left: 60px;"></td></tr>
			<tr><td>安全问题：<select name="question">
												<?php echo $this->_vars['question'];?>
											</select>
			</td></tr>
			<tr><td>问题回答：<input type="text" class="text" name="anwser" value="<?php echo $this->_vars['anwser'];?>"></td></tr>
			<tr><td>设置权限：<?php echo $this->_vars['state'];?>
			<tr><td><input type="submit" name="send" class="submit" onclick="return checkUpdate()" value="修改会员" style="margin-left: 60px;"> [<a href="<?php echo $this->_vars['prev_url'];?>">返回</a>]</td></tr>
		</table>
	</form>
	<?php } ?>
		
</div>



</body>
</html>
