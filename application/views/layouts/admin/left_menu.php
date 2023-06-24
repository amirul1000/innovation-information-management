<!--Left Menu-->
<nav>
	<ul class="sidebar-menu" data-widget="tree">
		<li class="sidemenu-user-profile d-flex align-items-center">
			<div class="user-thumbnail">
                <?php
				$this->load->helper(array('cookie', 'url','utility')); 
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
				<!--<span>Pro User</span>-->
			</div>
		</li>
		<li <?php if($this->router->fetch_class()=="homecontroller"){?>
			class="active" <?php }?>><a
			href="<?php echo site_url('admin/homecontroller'); ?>"><i
				class="icon_lifesaver"></i> <span><?=tr_en_bn('Dashboard')?></span></a></li>
        <?php
        $menu_open = false;
        if (
		$this->router->fetch_class() == "department" || 
		$this->router->fetch_class() == "profile" || $this->router->fetch_class() == "country" || $this->router->fetch_class() == "company" || $this->router->fetch_class() == "users" || $this->router->fetch_class() == "category") {
            $menu_open = true;
        }
        ?>
        <li
			class="treeview <?php if($menu_open==true){?>menu-open<?php }?>"><a
			href="javascript:void(0)"><i class="icon_document_alt"></i> <span><?=tr_en_bn('Settings')?></span>
				<i class="fa fa-angle-right"></i></a>
			<ul class="treeview-menu" <?php if($menu_open==true){?>
				style="display: block;" <?php }?>>
				 <li <?php if($this->router->fetch_class()=="department"){?>
                    class="active" <?php }?>><a
                    href="<?php echo site_url('admin/department/index'); ?>">- <?=tr_en_bn('Department')?></a></li>
				<li <?php if($this->router->fetch_class()=="profile"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/profile/index'); ?>">- <?=tr_en_bn('Profile')?></a></li>
				<!--<li <?php if($this->router->fetch_class()=="country"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/country/index'); ?>">- Country</a></li>-->
				<li <?php if($this->router->fetch_class()=="company"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/company/index'); ?>">- Company</a></li>
				<li <?php if($this->router->fetch_class()=="users"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/users/index'); ?>">- <?=tr_en_bn('Users')?></a></li>
			</ul></li>
            
         <?php
        $menu_open = false;
        if (		
		$this->router->fetch_class() == "predefined_objectives" || 
		$this->router->fetch_class() == "predefined_activities" || 
		$this->router->fetch_class() == "predefined_innovation_plan" ||
		$this->router->fetch_class() == "financial_year" ||
		$this->router->fetch_class() == "predefined_objectives_column" ||
		$this->router->fetch_class() == "predefined_innovation_plan_column_data" ||
		$this->router->fetch_class() == "predefined_innovation_plan_distribution") {
            $menu_open = true;
        }
        ?>
        <li
			class="treeview <?php if($menu_open==true){?>menu-open<?php }?>"><a
			href="javascript:void(0)"><i class="icon_document_alt"></i> <span>কর্মপরিকল্পনা</span>
				<i class="fa fa-angle-right"></i></a>
			<ul class="treeview-menu" <?php if($menu_open==true){?>
				style="display: block;" <?php }?>>
               
                <li <?php if($this->router->fetch_class()=="financial_year"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/financial_year/index'); ?>">- কর্মপরিকল্পনার বছর</a></li>
				<li <?php if($this->router->fetch_class()=="predefined_objectives"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/predefined_objectives/index'); ?>">- Predefined objectives</a></li>
				<li <?php if($this->router->fetch_class()=="country"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/predefined_activities/index'); ?>">- Predefined activities</a></li>
				<li <?php if($this->router->fetch_class()=="predefined_innovation_plan"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/predefined_innovation_plan/index'); ?>">- Predefined innovation plan</a></li>				
			    <br>
                 <li <?php if($this->router->fetch_class()=="predefined_objectives_column"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/predefined_objectives_column/index'); ?>">- <?=tr_en_bn('Predefined objectives column')?></a></li>
                <br>   
                <li <?php if($this->router->fetch_class()=="predefined_innovation_plan_column_data"){?>
					class="active" <?php }?>><a
					href="<?php echo site_url('admin/predefined_innovation_plan_column_data/index'); ?>">- Predefined innovation plan column data</a></li>	
                 <br>   
               
            </ul></li> 
		<li <?php if($this->router->fetch_class()=="innovation_plan"){?>
			class="active" <?php }?>><a
			href="<?php echo site_url('admin/innovation_plan/index'); ?>"><i
				class="icon_table"></i><?=tr_en_bn('Innovation Plan')?></a></li>
       <li <?php if($this->router->fetch_class()=="innovation_team"){?>
			class="active" <?php }?>><a
			href="<?php echo site_url('admin/innovation_team/index'); ?>"><i
				class="icon_table"></i><?=tr_en_bn('Innovation team')?></a></li>   
       <li <?php if($this->router->fetch_class()=="translation"){?>
			class="active" <?php }?>><a
			href="<?php echo site_url('admin/translation/index'); ?>"><i
				class="icon_table"></i><?=tr_en_bn('Translation')?></a></li>                
                
	</ul>
</nav>
<!--End of Left Menu//-->