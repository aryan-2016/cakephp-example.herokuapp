<section class="main">
	<div class="clearfix"></div>
	<div class="action-strip">
		<img src="<?php echo $this->webroot; ?>img/check.png"> Project Name

		<span class="mobile-menu"></span>
	</div>
	<div class="content-box">
		<nav class="navigation">
			<ul>
				<li class="has-childs open">
					<a href="<?php echo Configure::read('App.Url');?>userProjects/index">Projects</a>
					<div class="childs" style="display:block;">
						<ul>
						<li><a href="" class="create-project">Create Project</a></li>						
						<?php if(count($userProjects) > 0): ?>
								<?php foreach($userProjects as $project): ?>
										<li 
										<?php if($project['id'] == $projectId): ?> 
												style="background-color: yellow;" 
										<?php endif; ?>
										>
											<a href="<?php echo Configure::read('App.Url') . 'criticalPaths/index/' . $project['id']; ?>"><?php echo $project['name']; ?></a>
										</li>
								<?php endforeach; ?>
						<?php else: ?>						
								<li>No Project Found</li>
						<?php endif; ?>
					</ul>
					<div class="breif-text">
						<p>
						Lorem Ipsum is simply dummy
						text of the printing and typesetting
						industry. Lorem Ipsum has been
						the industry's standard. 
						</p>
					</div>
					</div>
				</li>
				<li style="background: #a04d00 none repeat scroll 0 0;font-weight: 600;"><a href="<?php echo Configure::read('App.Url');?>criticalPaths/index">Critical Path</a></li>
				<li><a href="<?php echo Configure::read('App.Url');?>hacks/addHack">Hacks</a></li>
				<li><a href="">Strategy</a></li>
				<li><a href="">Community</a></li>
				<li><a href="">University</a></li>				
			</ul>
		</nav>
		<div class="related-html">
			<h1>Critical Path</h1>
			<form method="post" action="" name="CriticalPath">
				<div class="action-buttons pull-right">
					<!-- <button class="edit">Edit</button> -->
					<button type="submit" class="save">Save</button>
				</div>
				<label>Defined Goal</label>			
				<input type="text" name="data[CriticalPath][critical_path_goal]" value="<?php echo $viewProject['ManageProject']['critical_path_goal']; ?>" placeholder="Increase users by 5000 in 6 Weeks" required/>
			</form>
			<?php echo $this->Session->flash('save_success'); ?>
			<p class="h3">Milestones <a class="pull-right add-milestone">Add Milestone</a></p>

			<div class="milestones">
				<?php if(count($projectMilestones) > 0): ?>								
						<div class="milestone" >							
							<div class="col-md-9">								
								<input type="text" name="data[Milestone][name]" value="<?php echo ''; ?>" placeholder="Milestone" required/>
							</div>
							<div class="col-md-3">
								<button name="data[Milestone][save]" class="save" style="background: #334762 none repeat scroll 0 0;border: medium none;color: #fff;font-size: 16px;height: 42px;margin-left: 7px;padding: 0 40px;">Save</button>
							</div>							
						</div>						
						<div class="milestone">
							Milestone  <div class="pull-right actions"><a href="" class="edit"></a><a href="" class="remove"></a></div>
						</div>						
				<?php else: ?>
						<h3 class="alert-danger"><?php echo Configure::read('no_milestones'); ?></h3>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</section>

<script type="text/javascript">
	$(document).ready(function ()
	{
		var newMileStoneId = 1;
		$('.add-milestone').click(function() {
			$('.milestones').append('<div class="milestone" ><div class="col-md-9"><input type="text" id="addedMilestone'+newMileStoneId+'" name="data[Milestone][name'+newMileStoneId+']" value="" placeholder="Milestone" required/></div><div class="col-md-3"><button id="saveAddedMilestone" class="save saveAddedMilestone" style="background: #334762 none repeat scroll 0 0;border: medium none;color: #fff;font-size: 16px;height: 42px;margin-left: 7px;padding: 0 40px;">Save</button></div></div>');
			newMileStoneId++;
		});
				
		$(document).on('click', '.saveAddedMilestone', function(){
			 var addedMilestoneName = $(this).parent().parent().find('input[type=text]').val();

			$.ajax({
				  type: 'post',
				  url: '<?php echo Configure::read('App.Url'); ?>criticalPaths/saveMilestone',
				  data: { 
					'milestone_name': addedMilestoneName, 
					'project_id': '<?php echo $projectId; ?>'
				  },
				  dataType: "json",
				  success: function (response) {
					alert(response.status);
					alert('response='+response.status);
				  },
				  error: function () {
					alert("error");
				  }
			  });
		 });
	});
</script>


http://www.synapse.asia/pmportal_8095/criticalPaths/index/1
