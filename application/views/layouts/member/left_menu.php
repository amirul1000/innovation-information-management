<!--Left Menu-->
<nav>
	<ul class="sidebar-menu" data-widget="tree">
		<li class="sidemenu-user-profile d-flex align-items-center">
			<div class="user-thumbnail">
                <?php
                if (is_file(APPPATH . '../public/' . $this->session->userdata['file_picture']) && file_exists(APPPATH . '../public/' . $this->session->userdata['file_picture'])) {
                    ?>
					  <img
					src="<?php echo base_url().'public/'.$this->session->userdata['file_picture']?>"
					alt="">
				<?php
                } else {
                    ?>
					  <img class="border-radius-50"
					src="<?php echo base_url()?>public/uploads/no_image.jpg">
				<?php
                }
                ?>
            </div>
			<div class="user-content">
				<h6><?php echo $this->session->userdata['first_name']?> <?php echo $this->session->userdata['last_name']?></h6>
				<span> <?php
				         $this->CI = & get_instance();
                         $this->CI->load->database();
						 $this->CI->load->model('Department_model'); 
						 $depart = $this->CI->Department_model->get_department($this->session->userdata['department_id']);
						 echo $depart['department']."<br>";
						 echo ucfirst($this->session->userdata['user_type']);
					   ?></span>
			</div>
		</li>
		<li <?php if($this->router->fetch_class()=="homecontroller"){?>
			class="active" <?php }?>><a
			href="<?php echo site_url('member/homecontroller'); ?>"><i
				class="icon_lifesaver"></i> <span><?=tr_en_bn('Dashboard')?></span></a></li>
        <?php
        $menu_open = false;
        if ($this->router->fetch_class() == "profile"||
		$this->router->fetch_class() == "department"||
		$this->router->fetch_class() == "users") {
            $menu_open = true;
        }
        ?>
        <li
			class="treeview <?php if($menu_open==true){?>menu-open<?php }?>"><a
			href="javascript:void(0)"><i class="icon_document_alt"></i> <span><?=tr_en_bn('Settings')?></span>
				<i class="fa fa-angle-right"></i></a>
			<ul class="treeview-menu" <?php if($menu_open==true){?>
				style="display: block;" <?php }?>>
				
				<li <?php if($this->router->fetch_class()=="profile"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('member/profile/index'); ?>">- <?=tr_en_bn('Profile')?></a></li>
				 <?php
				 if( $this->session->userdata('evaluator')==true){
				?>   	
			     <li <?php if($this->router->fetch_class()=="department"){?>
                    class="active" <?php }?>><a
                    href="<?php echo site_url('member/department/index'); ?>">- <?=tr_en_bn('Organization')?></a></li>		
                
                <li <?php if($this->router->fetch_class()=="users"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('member/users/index'); ?>">- <?=tr_en_bn('Users')?></a></li> 
                <?php
				 }
                ?>       
			</ul></li>
		<li <?php if($this->router->fetch_class()=="innovation_plan"){?>
			class="active" <?php }?>><a
			href="<?php echo site_url('member/innovation_plan/index'); ?>"><i
				class="icon_table"></i><?=tr_en_bn('Innovation Plan')?></a></li>
		<!--<li <?php if($this->router->fetch_class()=="documents"){?>
			class="active" <?php }?>><a
			href="<?php echo site_url('member/documents/index'); ?>"><i
				class="icon_table"></i>Documents</a></li>-->
         <?php
			 if( $this->session->userdata('evaluator')==true){
			?>   	        
		<li <?php if($this->router->fetch_class()=="report_compare"){?>
			class="active" <?php }?>><a
			href="<?php echo site_url('member/report_compare/index'); ?>"><i
				class="icon_table"></i><?=tr_en_bn('report compare')?></a></li>		
		<li <?php if($this->router->fetch_class()=="final_submit_permission"){?>
			class="active" <?php }?>><a
			href="<?php echo site_url('member/final_submit_permission/index'); ?>"><i
				class="icon_table"></i><?=tr_en_bn('Final submit permission')?></a></li>			
         <?php
			 }
			?>   
	</ul>
</nav>
<!--End of Left Menu//-->