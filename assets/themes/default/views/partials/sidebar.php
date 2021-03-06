<!-- Main sidebar -->
<div class="sidebar sidebar-main  ">
    <div class="sidebar-fixed">
        <div class="sidebar-content">

            <!-- Main navigation -->
            <div class="sidebar-category sidebar-category-visible">
                <div class="category-title h6">
                    <span>Main sidebar</span>
                    <ul class="icons-list">
                        <li><a href="#" data-action="collapse"></a></li>
                    </ul>
                </div>

                <div class="category-content no-padding">
                    <ul class="navigation navigation-main navigation-accordion">

                        <!-- Main -->
                        <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                        <li><a href="<?=base_url();?>"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
                        <li <?php echo preg_match('/^(members)$/i', $this->uri->uri_string()) ? 'class="active open" ' : ''; ?>>
                            <a href="#"><i class="icon-stack"></i> <span>Members</span></a>
                            <ul>
                                <li
                                <?php echo preg_match('/^(members)/i', $this->uri->uri_string()) ? 'class="active open" ' : ''; ?>
                                ><a  href="<?=base_url('members/create');?>">Add Member</a></li>
                                <li ><a href="<?=base_url('members');?>">Member list</a></li>               
                               
                            </ul>
                        </li>
                        <li 
                        <?php echo preg_match('/^(auth)/i', $this->uri->uri_string()) ? 'class="active open" ' : ''; ?>
                        >
                            <a href="#"><i class="icon-stack"></i> <span>User</span></a>
                            <ul>
                                <li><a  href="<?=base_url('auth/create_user');?>">Add User</a></li>
                                <li ><a href="<?=base_url('auth');?>">User list</a></li>               
                               
                            </ul>
                        </li>
                       
                        <!-- /main -->

                    </ul>
                </div>
            </div>
            <!-- /main navigation -->

        </div>
    </div>
</div>
<!-- /main sidebar -->