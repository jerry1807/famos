<!-- SIDE MENU BAR -->
<aside class="app-sidebar"> 
    <div class="app-sidebar__logo">
        <a class="header-brand" href="<?php echo e(url('/')); ?>">
            <img src="<?php echo e(URL::asset('img/brand/logo.png')); ?>" class="header-brand-img desktop-lgo" alt="Admintro logo">
            <img src="<?php echo e(URL::asset('img/brand/favicon.png')); ?>" class="header-brand-img mobile-logo" alt="Admintro logo">
        </a>
    </div>
    <ul class="side-menu app-sidebar3">
        <li class="slide">
            <a class="side-menu__item" href="<?php echo e(route('aidash')); ?>">
            <span class="side-menu__icon lead-3 fa-solid fa-chart-tree-map"></span>
            <span class="side-menu__label"><?php echo e(__('HQ')); ?></span></a>
        </li> 

        <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'user|subscriber')): ?>
            <?php if(config('settings.wizard_feature_user') == 'allow'): ?>
                <li class="slide">
                    <a class="side-menu__item" href="<?php echo e(route('user.wizard')); ?>">
                    <span class="side-menu__icon lead-3 fs-18 fa-solid fa-sharp fa-sparkles"></span>
                    <span class="side-menu__label"><?php echo e(__('AI Article Wizard')); ?></span></a>
                </li> 
            <?php endif; ?>
        <?php endif; ?>
        <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'admin')): ?>
            <li class="slide">
                <a class="side-menu__item" href="<?php echo e(route('user.wizard')); ?>">
                <span class="side-menu__icon lead-3 fs-18 fa-solid fa-sharp fa-sparkles"></span>
                <span class="side-menu__label"><?php echo e(__('AI Article Wizard')); ?></span></a>
            </li> 
        <?php endif; ?>

        
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="<?php echo e(url('#')); ?>">
                <span class="side-menu__icon fa-solid fa-folder-bookmark"></span>
                <span class="side-menu__label"><?php echo e(__('AI Chats')); ?></span><i class="angle fa fa-angle-right"></i></a>

                
                <ul class="slide-menu">
                    <li><a href="<?php echo e(route('user.aibots')); ?>" class="slide-item"><?php echo e(__('My Chats')); ?></a></li>
                    <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'user|subscriber')): ?>
                        <?php if(config('settings.image_feature_user') == 'allow'): ?>
                            <li><a href="<?php echo e(route('user.documents.images')); ?>" class="slide-item"><?php echo e(__('Group Chats')); ?></a></li> 
                        <?php endif; ?> 
                    <?php endif; ?>
                    <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'admin')): ?>
                        <li><a href="<?php echo e(route('user.documents.images')); ?>" class="slide-item"><?php echo e(__('Group Chats')); ?></a></li>
                    <?php endif; ?>
                </ul>
        </li>




       
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="<?php echo e(url('#')); ?>">
                <span class="side-menu__icon fa-solid fa-microchip-ai fs-18"></span>
                <span class="side-menu__label">AI Toolkits</span><i class="angle fa fa-angle-right"></i></a>
                <ul class="slide-menu">         
                <li class="slide">
                <li><a href="<?php echo e(route('user.dashboard')); ?>" class="slide-item"><?php echo e(__('Dashboard')); ?></a></li>
                <li><a href="<?php echo e(route('user.templates')); ?>" class="slide-item"><?php echo e(__('Templates')); ?></a></li>
                <li><a href="<?php echo e(route('user.chat')); ?>" class="slide-item"><?php echo e(__('Chat')); ?></a></li>
                <li><a href="<?php echo e(route('user.images')); ?>" class="slide-item"><?php echo e(__('Images')); ?></a></li>
                <li><a href="<?php echo e(route('user.voiceover')); ?>" class="slide-item"><?php echo e(__('Voiceover')); ?></a></li>
                <li><a href="<?php echo e(route('user.transcribe')); ?>" class="slide-item"><?php echo e(__('Speech to Text')); ?></a></li>
                <li><a href="<?php echo e(route('user.codex')); ?>" class="slide-item"><?php echo e(__('Code')); ?></a></li>
                </ul>
                <li class="slide">
                  <a class="side-menu__item" data-toggle="slide" href="<?php echo e(url('#')); ?>">
                <span class="side-menu__icon fa-solid fa-folder-bookmark"></span>
                <span class="side-menu__label"><?php echo e(__('Ai Docs')); ?></span><i class="angle fa fa-angle-right"></i></a>

                
                <ul class="slide-menu">
                 
                <li><a href="<?php echo e(route('user.documents')); ?>" class="slide-item"><?php echo e(__('All Documents')); ?></a></li>
                    <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'user|subscriber')): ?>
                        <?php if(config('settings.image_feature_user') == 'allow'): ?>
                            <li><a href="<?php echo e(route('user.documents.images')); ?>" class="slide-item"><?php echo e(__('All Images')); ?></a></li> 
                        <?php endif; ?> 
                    <?php endif; ?>
                    <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'admin')): ?>
                        <li><a href="<?php echo e(route('user.documents.images')); ?>" class="slide-item"><?php echo e(__('All Images')); ?></a></li>
                    <?php endif; ?>
                    <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'user|subscriber')): ?>
                        <?php if(config('settings.voiceover_feature_user') == 'allow'): ?>
                            <li><a href="<?php echo e(route('user.documents.voiceovers')); ?>" class="slide-item"><?php echo e(__('All Voiceover')); ?></a></li> 
                        <?php endif; ?> 
                    <?php endif; ?>
                    <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'admin')): ?>
                        <li><a href="<?php echo e(route('user.documents.voiceovers')); ?>" class="slide-item"><?php echo e(__('All Voiceover')); ?></a></li> 
                    <?php endif; ?>




                    <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'user|subscriber')): ?>
                        <?php if(config('settings.whisper_feature_user') == 'allow'): ?>
                            <li><a href="<?php echo e(route('user.documents.transcripts')); ?>" class="slide-item"><?php echo e(__('All Transcripts')); ?></a></li> 
                        <?php endif; ?> 
                    <?php endif; ?>
                    <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'admin')): ?>
                        <li><a href="<?php echo e(route('user.documents.transcripts')); ?>" class="slide-item"><?php echo e(__('All Transcripts')); ?></a></li> 
                    <?php endif; ?>
                    <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'user|subscriber')): ?>
                        <?php if(config('settings.code_feature_user') == 'allow'): ?>
                            <li><a href="<?php echo e(route('user.documents.codes')); ?>" class="slide-item"><?php echo e(__('All Codes')); ?></a></li> 
                        <?php endif; ?> 
                    <?php endif; ?>
                    <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'admin')): ?>
                        <li><a href="<?php echo e(route('user.documents.codes')); ?>" class="slide-item"><?php echo e(__('All Codes')); ?></a></li> 
                    <?php endif; ?>
                    
                    <li><a href="<?php echo e(route('user.workbooks')); ?>" class="slide-item"><?php echo e(__('Workbooks')); ?></a></li>   






                    
                </ul>
        </li>
        
        <li class="slide">
            <a class="side-menu__item" href="#">
            <span class="side-menu__icon lead-3 fa-solid fa-network-wired"></span>
            <span class="side-menu__label"><?php echo e(__('Connections ')); ?></span></a>
        </li> 

    




        

        <li class="slide">
            <a class="side-menu__item" href="<?php echo e(route('user.communications.index')); ?>">
            <span class="side-menu__icon lead-3 fa-regular fa-comments"></span>
            <span class="side-menu__label"><?php echo e(__('Communications')); ?></span></a>
        </li> 
        </li>









        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="<?php echo e(url('#')); ?>">
                <span class="side-menu__icon fa-solid fa-folder-bookmark"></span>
                <span class="side-menu__label"><?php echo e(__('Drive')); ?></span><i class="angle fa fa-angle-right"></i></a>

                
                <ul class="slide-menu">
                    <li><a href="<?php echo e(route('user.addfiles')); ?>" class="slide-item"><?php echo e(__('Add files')); ?></a></li>
                    <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'user|subscriber')): ?>
                        <?php if(config('settings.image_feature_user') == 'allow'): ?>
                            <li><a href="<?php echo e(route('user.documents.images')); ?>" class="slide-item"><?php echo e(__('Manage files')); ?></a></li> 
                        <?php endif; ?> 
                    <?php endif; ?>
                    <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'admin')): ?>
                        <li><a href="<?php echo e(route('user.documents')); ?>" class="slide-item"><?php echo e(__('Manage files')); ?></a></li>
                    <?php endif; ?>
                
                
                

                    
                </ul>
        </li>
        



  






        <hr class="w-90 text-center m-auto">
        <li class="side-item side-item-category mt-4 mb-3"><?php echo e(__('Account')); ?></li>



        
      


        <li class="slide">
            <a class="side-menu__item" href="<?php echo e(route('user.profile')); ?>">
            <span class="side-menu__icon lead-3 fa-solid fa-id-badge"></span>
            <span class="side-menu__label"><?php echo e(__('My Account')); ?></span></a>
        </li>

        <li class="slide">
            <a class="side-menu__item" href="<?php echo e(route('user.plans')); ?>">
            <span class="side-menu__icon lead-3 fa-solid fa-box-circle-check"></span>
            <span class="side-menu__label"><?php echo e(__('Subscription Plans')); ?></span></a>
        </li>
        <?php if(config('settings.team_members_feature') == 'enable'): ?>
            <li class="slide">
                <a class="side-menu__item" href="<?php echo e(route('user.team')); ?>">
                <span class="side-menu__icon lead-3 fa-solid fa-people-arrows"></span>
                <span class="side-menu__label"><?php echo e(__('Team Members')); ?></span></a>
            </li>
        <?php endif; ?> 
        
        <?php if(config('payment.referral.enabled') == 'on'): ?>
            <li class="slide mb-3">
                <a class="side-menu__item" href="<?php echo e(route('user.referral')); ?>">
                <span class="side-menu__icon lead-3 fa-solid fa-badge-dollar"></span>
                <span class="side-menu__label"><?php echo e(__('Affiliate Program')); ?></span></a>
            </li>
        <?php endif; ?> 
        <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'admin')): ?>
            <hr class="w-90 text-center m-auto">
            <li class="side-item side-item-category mt-4 mb-3"><?php echo e(__('Admin Panel')); ?></li>
            <li class="slide">
                <a class="side-menu__item"  href="<?php echo e(route('admin.dashboard')); ?>">
                    <span class="side-menu__icon fa-solid fa-chart-tree-map"></span>
                    <span class="side-menu__label"><?php echo e(__('Dashboard')); ?></span>
                </a>
            </li>
            <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="<?php echo e(url('#')); ?>">
                        <span class="side-menu__icon fa-solid fa-microchip-ai fs-18"></span>
                        <span class="side-menu__label"><?php echo e(__('Davinci Management')); ?></span><i class="angle fa fa-angle-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li><a href="<?php echo e(route('admin.davinci.dashboard')); ?>" class="slide-item"><?php echo e(__('Davinci Dashboard')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.davinci.templates')); ?>" class="slide-item"><?php echo e(__('Davinci Templates')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.davinci.custom')); ?>" class="slide-item"><?php echo e(__('Custom Templates')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.davinci.custom.category')); ?>" class="slide-item"><?php echo e(__('Template Categories')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.davinci.voices')); ?>" class="slide-item"><?php echo e(__('Voices Customization')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.davinci.chats')); ?>" class="slide-item"><?php echo e(__('AI Chats Customization')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.davinci.configs')); ?>" class="slide-item"><?php echo e(__('Davinci Settings')); ?></a></li>
                    </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="<?php echo e(url('#')); ?>">
                    <span class="side-menu__icon fa-solid fa-id-badge"></span>
                    <span class="side-menu__label"><?php echo e(__('User Management')); ?></span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="<?php echo e(route('admin.user.dashboard')); ?>" class="slide-item"><?php echo e(__('User Dashboard')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.user.list')); ?>" class="slide-item"><?php echo e(__('User List')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.user.activity')); ?>" class="slide-item"><?php echo e(__('Activity Monitoring')); ?></a></li>
                    </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="<?php echo e(url('#')); ?>">
                    <span class="side-menu__icon fa-solid fa-sack-dollar"></span>
                    <span class="side-menu__label"><?php echo e(__('Finance Management')); ?></span>
                    <?php if(auth()->user()->unreadNotifications->where('type', 'App\Notifications\PayoutRequestNotification')->count()): ?>
                        <span class="badge badge-warning"><?php echo e(auth()->user()->unreadNotifications->where('type', 'App\Notifications\PayoutRequestNotification')->count()); ?></span>
                    <?php else: ?>
                        <i class="angle fa fa-angle-right"></i>
                    <?php endif; ?>
                </a>
                    <ul class="slide-menu">
                        <li><a href="<?php echo e(route('admin.finance.dashboard')); ?>" class="slide-item"><?php echo e(__('Finance Dashboard')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.finance.transactions')); ?>" class="slide-item"><?php echo e(__('Transactions')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.finance.plans')); ?>" class="slide-item"><?php echo e(__('Subscription Plans')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.finance.prepaid')); ?>" class="slide-item"><?php echo e(__('Prepaid Plans')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.finance.subscriptions')); ?>" class="slide-item"><?php echo e(__('Subscribers')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.finance.promocodes')); ?>" class="slide-item"><?php echo e(__('Promocodes')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.referral.settings')); ?>" class="slide-item"><?php echo e(__('Referral System')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.referral.payouts')); ?>" class="slide-item"><?php echo e(__('Referral Payouts')); ?>

                                <?php if((auth()->user()->unreadNotifications->where('type', 'App\Notifications\PayoutRequestNotification')->count())): ?>
                                    <span class="badge badge-warning ml-5"><?php echo e(auth()->user()->unreadNotifications->where('type', 'App\Notifications\PayoutRequestNotification')->count()); ?></span>
                                <?php endif; ?>
                            </a>
                        </li>
                        <li><a href="<?php echo e(route('admin.settings.invoice')); ?>" class="slide-item"><?php echo e(__('Invoice Settings')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.finance.settings')); ?>" class="slide-item"><?php echo e(__('Payment Settings')); ?></a></li>
                    </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item"  href="<?php echo e(route('admin.support')); ?>">
                    <span class="side-menu__icon fa-solid fa-message-question"></span>
                    <span class="side-menu__label"><?php echo e(__('Support Requests')); ?></span>
                    <?php if(App\Models\SupportTicket::where('status', 'Open')->count()): ?>
                        <span class="badge badge-warning"><?php echo e(App\Models\SupportTicket::where('status', 'Open')->count()); ?></span>
                    <?php endif; ?> 
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="<?php echo e(url('#')); ?>">
                    <span class="side-menu__icon fa-solid fa-message-exclamation"></span>
                    <span class="side-menu__label"><?php echo e(__('Notifications')); ?></span>
                        <?php if(auth()->user()->unreadNotifications->where('type', '<>', 'App\Notifications\GeneralNotification')->count()): ?>
                            <span class="badge badge-warning" id="total-notifications-a"></span>
                        <?php else: ?>
                            <i class="angle fa fa-angle-right"></i>
                        <?php endif; ?>
                    </a>                     
                    <ul class="slide-menu">
                        <li><a href="<?php echo e(route('admin.notifications')); ?>" class="slide-item"><?php echo e(__('Mass Notifications')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.notifications.system')); ?>" class="slide-item"><?php echo e(__('System Notifications')); ?> 
                                <?php if((auth()->user()->unreadNotifications->where('type', '<>', 'App\Notifications\GeneralNotification')->count())): ?>
                                    <span class="badge badge-warning ml-5" id="total-notifications-b"></span>
                                <?php endif; ?>
                            </a>
                        </li>
                    </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="<?php echo e(url('#')); ?>">
                    <span class="side-menu__icon fa-solid fa-earth-americas"></span>
                    <span class="side-menu__label"><?php echo e(__('Frontend Management')); ?></span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="<?php echo e(route('admin.settings.frontend')); ?>" class="slide-item"><?php echo e(__('Frontend Settings')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.settings.appearance')); ?>" class="slide-item"><?php echo e(__('SEO & Logos')); ?></a></li>                        
                        <li><a href="<?php echo e(route('admin.settings.blog')); ?>" class="slide-item"><?php echo e(__('Blogs Manager')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.settings.faq')); ?>" class="slide-item"><?php echo e(__('FAQs Manager')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.settings.review')); ?>" class="slide-item"><?php echo e(__('Reviews Manager')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.settings.terms')); ?>" class="slide-item"><?php echo e(__('T&C Pages Manager')); ?></a></li>                           
                        <li><a href="<?php echo e(route('admin.settings.adsense')); ?>" class="slide-item"><?php echo e(__('Google Adsense')); ?></a></li>                           
                    </ul>
            </li>
            <li class="slide mb-3">
                <a class="side-menu__item" data-toggle="slide" href="<?php echo e(url('#')); ?>">
                    <span class="side-menu__icon fa fa-sliders"></span>
                    <span class="side-menu__label"><?php echo e(__('General Settings')); ?></span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="<?php echo e(route('admin.settings.global')); ?>" class="slide-item"><?php echo e(__('Global Settings')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.settings.oauth')); ?>" class="slide-item"><?php echo e(__('Auth Settings')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.settings.registration')); ?>" class="slide-item"><?php echo e(__('Registration Settings')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.settings.smtp')); ?>" class="slide-item"><?php echo e(__('SMTP Settings')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.settings.backup')); ?>" class="slide-item"><?php echo e(__('Database Backup')); ?></a></li>
                        <li><a href="<?php echo e(route('admin.settings.activation')); ?>" class="slide-item"><?php echo e(__('Activation')); ?></a></li>     
                        <li><a href="<?php echo e(route('admin.settings.upgrade')); ?>" class="slide-item"><?php echo e(__('Upgrade Software')); ?></a></li>                 
                        <li><a href="<?php echo e(route('admin.settings.clear')); ?>" class="slide-item"><?php echo e(__('Clear Cache')); ?></a></li>                 
                    </ul>
            </li>
        <?php endif; ?>
        
    </ul>
</aside>
<!-- END SIDE MENU BAR -->
<?php /**PATH C:\xampp\htdocs\famosnew\resources\views/layouts/nav-aside.blade.php ENDPATH**/ ?>